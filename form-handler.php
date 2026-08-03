<?php
/**
 * Inquiry Form Handler — MySQL + PHPMailer SMTP
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

// Honeypot — bots may fill this; humans should not (name avoids browser autofill)
$honeypot = trim((string) ($_POST['qx_hp_field'] ?? ''));
if ($honeypot !== '') {
    // Fake success for bots only — frontend treats ignored as failure for real users
    echo json_encode([
        'success' => false,
        'message' => 'Unable to submit. Please refresh the page and try again.',
        'ignored' => true,
    ]);
    exit;
}

$name        = trim((string) ($_POST['name'] ?? ''));
$email       = trim((string) ($_POST['email'] ?? ''));
$phone       = trim((string) ($_POST['phone'] ?? ''));
$company     = trim((string) ($_POST['company'] ?? ''));
$country     = trim((string) ($_POST['country'] ?? ''));
$service     = trim((string) ($_POST['service'] ?? ''));
$source      = trim((string) ($_POST['source'] ?? ''));
$message     = trim((string) ($_POST['message'] ?? ''));
$pageSource  = trim((string) ($_POST['page_source'] ?? ''));
$ip          = $_SERVER['REMOTE_ADDR'] ?? '';

$allowedPageSources = ['home', 'contact', ''];
if (!in_array($pageSource, $allowedPageSources, true)) {
    $pageSource = '';
}

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

if ($phone !== '' && !preg_match('/^[\d\s\+\-\(\)]{7,20}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number.';
}

if ($message === '' || mb_strlen($message) < 10) {
    $errors['message'] = 'Please enter a message (at least 10 characters).';
} elseif (mb_strlen($message) > 5000) {
    $errors['message'] = 'Message must be 5000 characters or fewer.';
}

if (mb_strlen($company) > 120) {
    $errors['company'] = 'Company must be 120 characters or fewer.';
}

if (mb_strlen($country) > 80) {
    $errors['country'] = 'Country must be 80 characters or fewer.';
}

$allowed_services = [
    'Web App Development',
    'Mobile App Development',
    'CMS & E-Commerce',
    'UX/UI Design',
    'AI Agents & Integration',
    'Conversational AI',
    'Testing',
    'Other',
    '',
];
if (!in_array($service, $allowed_services, true)) {
    $service = 'Other';
}

$allowed_sources = [
    'Google search',
    'ChatGPT or another AI assistant',
    'Clutch',
    'GoodFirms',
    'DesignRush',
    'LinkedIn',
    'Referral from a person',
    'Other',
    '',
];
if (!in_array($source, $allowed_sources, true)) {
    $source = '';
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

try {
    $pdo = db();
    $stmt = $pdo->prepare(
        'INSERT INTO inquiries
            (name, email, phone, company, country, service, source, message, page_source, ip, mail_sent)
         VALUES
            (:name, :email, :phone, :company, :country, :service, :source, :message, :page_source, :ip, 0)'
    );
    $stmt->execute([
        ':name'        => $name,
        ':email'       => $email,
        ':phone'       => $phone !== '' ? $phone : null,
        ':company'     => $company !== '' ? $company : null,
        ':country'     => $country !== '' ? $country : null,
        ':service'     => $service !== '' ? $service : null,
        ':source'      => $source !== '' ? $source : null,
        ':message'     => $message,
        ':page_source' => $pageSource !== '' ? $pageSource : null,
        ':ip'          => $ip !== '' ? $ip : null,
    ]);
    $inquiryId = (int) $pdo->lastInsertId();
} catch (Throwable $e) {
    @file_put_contents(
        __DIR__ . '/data/inquiry-errors.log',
        date('c') . ' DB: ' . $e->getMessage() . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Unable to save your inquiry. Please try again later.',
    ]);
    exit;
}

$mailResult = send_inquiry_emails([
    'id'          => $inquiryId,
    'name'        => $name,
    'email'       => $email,
    'phone'       => $phone,
    'company'     => $company,
    'country'     => $country,
    'service'     => $service,
    'source'      => $source,
    'message'     => $message,
    'page_source' => $pageSource,
    'ip'          => $ip,
]);

$mailSent = !empty($mailResult['all']);

if ($mailSent && $inquiryId > 0) {
    try {
        $update = db()->prepare('UPDATE inquiries SET mail_sent = 1 WHERE id = :id');
        $update->execute([':id' => $inquiryId]);
    } catch (Throwable $e) {
        // Inquiry already saved; ignore mail flag update failure
    }
}

$responseMessage = 'Thank you! Your inquiry has been received. We will contact you shortly.';
if (!$mailSent) {
    $responseMessage = 'Thank you! Your inquiry has been saved. We will contact you shortly.';
}

echo json_encode([
    'success'        => true,
    'message'        => $responseMessage,
    'mail_sent'      => $mailSent,
    'mail_company'   => !empty($mailResult['company']),
    'mail_thank_you' => !empty($mailResult['user']),
]);
