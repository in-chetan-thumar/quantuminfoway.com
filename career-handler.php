<?php
/**
 * Career / Join Our Team Form Handler — MySQL + PHPMailer SMTP + CV upload
 */
ini_set('display_errors', '0');
error_reporting(E_ALL);
ob_start();

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/mail.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$honeypot = trim((string) ($_POST['qx_hp_field'] ?? ''));
if ($honeypot !== '') {
    echo json_encode([
        'success' => false,
        'message' => 'Unable to submit. Please refresh the page and try again.',
        'ignored' => true,
    ]);
    exit;
}

$name       = trim((string) ($_POST['name'] ?? ''));
$email      = trim((string) ($_POST['email'] ?? ''));
$phone      = trim((string) ($_POST['phone'] ?? ''));
$position   = trim((string) ($_POST['position'] ?? ''));
$experience = trim((string) ($_POST['experience'] ?? ''));
$linkedin   = trim((string) ($_POST['linkedin'] ?? ''));
$portfolio  = trim((string) ($_POST['portfolio'] ?? ''));
$city       = trim((string) ($_POST['city'] ?? ''));
$message    = trim((string) ($_POST['message'] ?? ''));
$ip         = $_SERVER['REMOTE_ADDR'] ?? '';

$allowedPositions = [
    'Laravel',
    'React',
    'Angular',
    'Node.js',
    'Python',
    'Full Stack',
    'AI Engineer',
    'Flutter',
    'DevOps',
    'UI/UX',
    'QA',
    'Other',
];

$allowedExperience = [
    'Fresher',
    '1–2',
    '3–5',
    '6–8',
    '9+',
];

$errors = [];

if ($name === '' || mb_strlen($name) < 2) {
    $errors['name'] = 'Please enter your name (at least 2 characters).';
} elseif (mb_strlen($name) > 120) {
    $errors['name'] = 'Name must be 120 characters or fewer.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
} elseif (mb_strlen($email) > 190) {
    $errors['email'] = 'Email must be 190 characters or fewer.';
}

if ($phone === '' || !preg_match('/^[\d\s\+\-\(\)]{7,20}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number.';
}

if (!in_array($position, $allowedPositions, true)) {
    $errors['position'] = 'Please select a position.';
}

if (!in_array($experience, $allowedExperience, true)) {
    $errors['experience'] = 'Please select your years of experience.';
}

if ($linkedin !== '') {
    if (mb_strlen($linkedin) > 255 || !filter_var($linkedin, FILTER_VALIDATE_URL)) {
        $errors['linkedin'] = 'Please enter a valid LinkedIn URL.';
    }
}

if ($portfolio !== '') {
    if (mb_strlen($portfolio) > 255 || !filter_var($portfolio, FILTER_VALIDATE_URL)) {
        $errors['portfolio'] = 'Please enter a valid portfolio or GitHub URL.';
    }
}

if ($city !== '' && mb_strlen($city) > 80) {
    $errors['city'] = 'City must be 80 characters or fewer.';
}

if ($message === '' || mb_strlen($message) < 10) {
    $errors['message'] = 'Please enter a cover letter (at least 10 characters).';
} elseif (mb_strlen($message) > 5000) {
    $errors['message'] = 'Cover letter must be 5000 characters or fewer.';
}

$maxCvBytes = 5 * 1024 * 1024;
$allowedExtensions = ['pdf', 'doc', 'docx'];
$allowedMimes = [
    'application/pdf',
    'application/msword',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/octet-stream',
];

$cvFile = $_FILES['cv'] ?? null;
$cvOriginalName = '';
$cvStoredPath = '';

if (!is_array($cvFile) || !isset($cvFile['error']) || (int) $cvFile['error'] === UPLOAD_ERR_NO_FILE) {
    $errors['cv'] = 'Please upload your CV / resume.';
} elseif ((int) $cvFile['error'] !== UPLOAD_ERR_OK) {
    $errors['cv'] = 'CV upload failed. Please try again.';
} else {
    $cvOriginalName = (string) ($cvFile['name'] ?? '');
    $cvSize = (int) ($cvFile['size'] ?? 0);
    $tmpPath = (string) ($cvFile['tmp_name'] ?? '');
    $ext = strtolower(pathinfo($cvOriginalName, PATHINFO_EXTENSION));

    if ($cvSize <= 0 || $cvSize > $maxCvBytes) {
        $errors['cv'] = 'CV must be a file up to 5 MB.';
    } elseif (!in_array($ext, $allowedExtensions, true)) {
        $errors['cv'] = 'CV must be a PDF, DOC, or DOCX file.';
    } elseif ($tmpPath === '' || !is_uploaded_file($tmpPath)) {
        $errors['cv'] = 'CV upload failed. Please try again.';
    } else {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = (string) $finfo->file($tmpPath);
        if (!in_array($mime, $allowedMimes, true)) {
            // Some servers report DOC/DOCX as zip/octet; allow if extension is ok and mime is common
            $softOk = in_array($mime, [
                'application/zip',
                'application/x-zip-compressed',
                'application/vnd.ms-office',
            ], true) && in_array($ext, ['doc', 'docx'], true);
            if (!$softOk) {
                $errors['cv'] = 'CV must be a PDF, DOC, or DOCX file.';
            }
        }
    }
}

if ($errors) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => implode(' ', array_values($errors)),
        'errors'  => $errors,
    ]);
    exit;
}

$cvDir = __DIR__ . '/data/cvs';
if (!is_dir($cvDir) && !mkdir($cvDir, 0750, true) && !is_dir($cvDir)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Unable to store your CV. Please try again later.',
    ]);
    exit;
}

$safeBase = preg_replace('/[^a-zA-Z0-9._-]+/', '_', pathinfo($cvOriginalName, PATHINFO_FILENAME));
$safeBase = trim((string) $safeBase, '._-');
if ($safeBase === '') {
    $safeBase = 'cv';
}
$safeBase = mb_substr($safeBase, 0, 80);
$ext = strtolower(pathinfo($cvOriginalName, PATHINFO_EXTENSION));
$storedName = uniqid('cv_', true) . '_' . $safeBase . '.' . $ext;
$absoluteCvPath = $cvDir . '/' . $storedName;
$relativeCvPath = 'data/cvs/' . $storedName;

if (!move_uploaded_file((string) $cvFile['tmp_name'], $absoluteCvPath)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Unable to store your CV. Please try again later.',
    ]);
    exit;
}
@chmod($absoluteCvPath, 0640);
$cvStoredPath = $relativeCvPath;

try {
    $pdo = db();
    $stmt = $pdo->prepare(
        'INSERT INTO career_applications
            (name, email, phone, position, experience, linkedin, portfolio, city, message, cv_path, cv_original_name, ip, mail_sent)
         VALUES
            (:name, :email, :phone, :position, :experience, :linkedin, :portfolio, :city, :message, :cv_path, :cv_original_name, :ip, 0)'
    );
    $stmt->execute([
        ':name'             => $name,
        ':email'            => $email,
        ':phone'            => $phone,
        ':position'         => $position,
        ':experience'       => $experience,
        ':linkedin'         => $linkedin !== '' ? $linkedin : null,
        ':portfolio'        => $portfolio !== '' ? $portfolio : null,
        ':city'             => $city !== '' ? $city : null,
        ':message'          => $message,
        ':cv_path'          => $cvStoredPath,
        ':cv_original_name' => $cvOriginalName,
        ':ip'               => $ip !== '' ? $ip : null,
    ]);
    $applicationId = (int) $pdo->lastInsertId();
} catch (Throwable $e) {
    @unlink($absoluteCvPath);
    @file_put_contents(
        __DIR__ . '/data/career-errors.log',
        date('c') . ' DB: ' . $e->getMessage() . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Unable to save your application. Please try again later.',
    ]);
    exit;
}

$mailResult = send_career_emails([
    'id'               => $applicationId,
    'name'             => $name,
    'email'            => $email,
    'phone'            => $phone,
    'position'         => $position,
    'experience'       => $experience,
    'linkedin'         => $linkedin,
    'portfolio'        => $portfolio,
    'city'             => $city,
    'message'          => $message,
    'cv_path'          => $absoluteCvPath,
    'cv_original_name' => $cvOriginalName,
    'ip'               => $ip,
]);

$mailSent = !empty($mailResult['company']) || !empty($mailResult['user']);

if ($mailSent && $applicationId > 0) {
    try {
        $update = db()->prepare('UPDATE career_applications SET mail_sent = 1 WHERE id = :id');
        $update->execute([':id' => $applicationId]);
    } catch (Throwable $e) {
        // Application already saved; ignore mail flag update failure
    }
}

$responseMessage = 'Thank you! Your application has been received. We will be in touch soon.';
if (!$mailSent) {
    $responseMessage = 'Thank you! Your application has been saved. We will be in touch soon.';
}

echo json_encode([
    'success'        => true,
    'message'        => $responseMessage,
    'mail_sent'      => $mailSent,
    'mail_company'   => !empty($mailResult['company']),
    'mail_thank_you' => !empty($mailResult['user']),
]);
