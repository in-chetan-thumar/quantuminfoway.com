<?php
/**
 * Inquiry email helpers — premium HTML templates + SMTP send.
 */

require_once __DIR__ . '/config.php';

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Absolute public site URL (no trailing slash).
 */
function email_site_url(): string
{
    $url = trim(env_value('APP_URL', SITE_URL !== '' ? SITE_URL : 'https://quantuminfoway.com'));
    return rtrim($url, '/');
}

/**
 * Filesystem path to email logo PNG.
 */
function email_logo_path(): string
{
    $dark = dirname(__DIR__) . '/assets/images/brand/logo-email-dark.png';
    if (is_file($dark)) {
        return $dark;
    }
    return dirname(__DIR__) . '/assets/images/brand/logo-email.png';
}

/**
 * Public URL for email logo (fallback when CID not used).
 */
function email_logo_url(): string
{
    $file = is_file(dirname(__DIR__) . '/assets/images/brand/logo-email-dark.png')
        ? 'logo-email-dark.png'
        : 'logo-email.png';
    return email_site_url() . '/assets/images/brand/' . $file;
}

/**
 * @return PHPMailer
 */
function create_mailer(): PHPMailer
{
    if (MAIL_HOST === '') {
        throw new RuntimeException('Mail is not configured.');
    }

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = MAIL_HOST;
    $mail->Port       = MAIL_PORT;
    $mail->SMTPAuth   = MAIL_USERNAME !== '' || MAIL_PASSWORD !== '';
    $mail->Timeout    = 30;
    $mail->SMTPKeepAlive = false;

    if ($mail->SMTPAuth) {
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
    }

    $encryption = strtolower(MAIL_ENCRYPTION);
    if ($encryption === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } elseif ($encryption === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    } else {
        $mail->SMTPSecure = false;
        $mail->SMTPAutoTLS = false;
    }

    $mail->CharSet  = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->setFrom(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
    $mail->Sender = MAIL_FROM_ADDRESS;

    return $mail;
}

/**
 * Safe display name for PHPMailer addAddress / addReplyTo.
 */
function email_safe_name(string $name): string
{
    $name = trim(preg_replace('/[\r\n\t]+/', ' ', $name) ?? '');
    return mb_substr($name, 0, 120);
}

/**
 * Append mail failure details for debugging.
 */
function log_mail_error(string $context, Throwable $e, ?PHPMailer $mail = null): void
{
    $detail = $e->getMessage();
    if ($mail instanceof PHPMailer && $mail->ErrorInfo !== '') {
        $detail .= ' | PHPMailer: ' . $mail->ErrorInfo;
    }
    @file_put_contents(
        dirname(__DIR__) . '/data/mail-errors.log',
        date('c') . ' [' . $context . '] ' . $detail . PHP_EOL,
        FILE_APPEND | LOCK_EX
    );
}

/**
 * Reset recipients/attachments between two sends on a keep-alive connection.
 */
function reset_mailer_recipients(PHPMailer $mail): void
{
    $mail->clearAddresses();
    $mail->clearCCs();
    $mail->clearBCCs();
    $mail->clearReplyTos();
    $mail->clearAttachments();
    $mail->clearCustomHeaders();
}

/**
 * Attach logo as inline CID image when available.
 */
function attach_email_logo(PHPMailer $mail): string
{
    $path = email_logo_path();
    if (is_file($path)) {
        $mail->addEmbeddedImage($path, 'qi_logo', 'logo-email.png');
        return 'cid:qi_logo';
    }
    return email_logo_url();
}

function email_escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Brand header with logo + title.
 */
function email_brand_header(string $logoSrc, string $eyebrow, string $title, string $subtitle = ''): string
{
    $site = email_escape(SITE_NAME);
    $eyebrowHtml = email_escape($eyebrow);
    $titleHtml = email_escape($title);
    $subtitleHtml = $subtitle !== '' ? email_escape($subtitle) : '';

    $subRow = $subtitleHtml !== ''
        ? '<p style="margin:10px 0 0;font-size:14px;line-height:1.55;color:rgba(255,255,255,0.82);">' . $subtitleHtml . '</p>'
        : '';

    return '<tr>
      <td style="background:#0b0e1c;padding:0;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td style="padding:22px 32px 18px;border-bottom:1px solid rgba(255,255,255,0.08);">
              <a href="' . email_escape(email_site_url()) . '" style="text-decoration:none;">
                <img src="' . email_escape($logoSrc) . '" alt="' . $site . '" width="210" height="48" style="display:block;border:0;outline:none;height:48px;width:auto;max-width:210px;">
              </a>
            </td>
          </tr>
          <tr>
            <td style="padding:28px 32px 30px;background:linear-gradient(135deg,#1a1240 0%,#122045 42%,#0b2a4a 100%);">
              <p style="margin:0 0 10px;font-size:11px;letter-spacing:0.16em;text-transform:uppercase;color:#9bb0ff;font-weight:700;">' . $eyebrowHtml . '</p>
              <h1 style="margin:0;font-size:26px;line-height:1.25;color:#ffffff;font-weight:700;letter-spacing:-0.02em;">' . $titleHtml . '</h1>
              ' . $subRow . '
            </td>
          </tr>
          <tr>
            <td style="height:4px;background:linear-gradient(90deg,#6d4df6 0%,#2f6bff 55%,#0ec2e8 100%);font-size:0;line-height:0;">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>';
}

/**
 * Shared premium email chrome.
 *
 * @param 'company'|'thanks' $variant
 */
function email_layout(string $preheader, string $eyebrow, string $title, string $bodyHtml, string $footerNote = '', string $logoSrc = '', string $variant = 'thanks'): string
{
    $site = email_escape(SITE_NAME);
    $phone = email_escape(SITE_PHONE);
    $hours = email_escape(SITE_HOURS);
    $to = email_escape(MAIL_TO_ADDRESS);
    $pre = email_escape($preheader);
    $note = $footerNote !== '' ? email_escape($footerNote) : 'We build reliable digital products for ambitious teams.';
    $siteUrl = email_escape(email_site_url());
    $logo = $logoSrc !== '' ? $logoSrc : email_logo_url();

    $subtitle = $variant === 'company'
        ? 'A new lead is ready for your review.'
        : 'Our specialists usually reply within one business day.';

    $header = email_brand_header($logo, $eyebrow, $title, $subtitle);

    return '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>' . email_escape($title) . '</title>
<!--[if mso]>
<style type="text/css">
  body, table, td { font-family: Arial, Helvetica, sans-serif !important; }
</style>
<![endif]-->
</head>
<body style="margin:0;padding:0;background:#e8ecf5;font-family:Segoe UI,Roboto,Helvetica Neue,Arial,sans-serif;color:#10162b;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;mso-hide:all;">' . $pre . '</div>
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#e8ecf5;padding:36px 14px;">
    <tr>
      <td align="center">
        <table role="presentation" width="640" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:640px;background:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 24px 60px rgba(16,22,43,0.14);">
          ' . $header . '
          <tr>
            <td style="padding:34px 32px 10px;">
              ' . $bodyHtml . '
            </td>
          </tr>
          <tr>
            <td style="padding:18px 32px 30px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background:linear-gradient(160deg,#0b0e1c 0%,#12182e 100%);border-radius:16px;">
                <tr>
                  <td style="padding:24px 24px 10px;">
                    <img src="' . email_escape($logo) . '" alt="' . $site . '" width="160" height="36" style="display:block;border:0;height:36px;width:auto;max-width:160px;opacity:0.95;">
                  </td>
                </tr>
                <tr>
                  <td style="padding:0 24px 8px;">
                    <p style="margin:0;font-size:13px;line-height:1.65;color:#98a1bc;">' . $note . '</p>
                  </td>
                </tr>
                <tr>
                  <td style="padding:12px 24px 22px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td style="padding:0 14px 0 0;font-size:12px;line-height:1.5;color:#c5cce0;">
                          <a href="tel:' . email_escape(preg_replace('/\s+/', '', SITE_PHONE)) . '" style="color:#c5cce0;text-decoration:none;">' . $phone . '</a>
                        </td>
                        <td style="padding:0 14px;font-size:12px;line-height:1.5;color:#5d6780;">|</td>
                        <td style="padding:0 14px;font-size:12px;line-height:1.5;color:#c5cce0;">' . $hours . '</td>
                        <td style="padding:0 14px;font-size:12px;line-height:1.5;color:#5d6780;">|</td>
                        <td style="padding:0;font-size:12px;line-height:1.5;">
                          <a href="mailto:' . $to . '" style="color:#0ec2e8;text-decoration:none;">' . $to . '</a>
                        </td>
                      </tr>
                    </table>
                    <p style="margin:14px 0 0;">
                      <a href="' . $siteUrl . '" style="display:inline-block;padding:10px 18px;border-radius:999px;background:rgba(109,77,246,0.18);border:1px solid rgba(109,77,246,0.35);color:#d7dcff;font-size:12px;font-weight:600;text-decoration:none;">Visit website</a>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <p style="margin:20px 0 0;font-size:11px;line-height:1.5;color:#8a93ab;">© ' . date('Y') . ' ' . $site . '. All rights reserved.</p>
      </td>
    </tr>
  </table>
</body>
</html>';
}

/**
 * @param array<string, string> $rows
 */
function email_detail_rows(array $rows): string
{
    $html = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e4e9f5;border-radius:14px;overflow:hidden;">';
    $i = 0;
    foreach ($rows as $label => $value) {
        if ($value === '') {
            continue;
        }
        $bg = ($i % 2 === 0) ? '#f7f9fd' : '#ffffff';
        $html .= '<tr>'
            . '<td style="padding:13px 16px;width:32%;font-size:11px;letter-spacing:0.07em;text-transform:uppercase;color:#6b7490;font-weight:700;background:' . $bg . ';border-bottom:1px solid #e8ecf5;vertical-align:top;">'
            . email_escape($label)
            . '</td>'
            . '<td style="padding:13px 16px;font-size:14px;color:#10162b;background:' . $bg . ';border-bottom:1px solid #e8ecf5;vertical-align:top;font-weight:500;">'
            . email_escape($value)
            . '</td>'
            . '</tr>';
        $i++;
    }
    $html .= '</table>';
    return $html;
}

function email_primary_button(string $href, string $label): string
{
    return '<a href="' . email_escape($href) . '" style="display:inline-block;padding:14px 26px;background:linear-gradient(120deg,#6d4df6 0%,#2f6bff 100%);color:#ffffff;text-decoration:none;border-radius:999px;font-size:14px;font-weight:700;letter-spacing:0.01em;box-shadow:0 10px 24px rgba(47,107,255,0.28);">'
        . email_escape($label)
        . '</a>';
}

/**
 * @param array{
 *   id:int,name:string,email:string,phone:string,company:string,country:string,
 *   service:string,source:string,message:string,page_source:string,ip:string
 * } $data
 * @return array{subject:string,html:string,text:string}
 */
function build_company_inquiry_email(array $data, string $logoSrc = ''): array
{
    $name = $data['name'];
    $subject = 'New Inquiry from ' . $name . ' — ' . SITE_NAME;

    $rows = [
        'Name'    => $data['name'],
        'Email'   => $data['email'],
        'Phone'   => $data['phone'],
        'Company' => $data['company'],
        'Country' => $data['country'],
        'Service' => $data['service'],
        'Source'  => $data['source'],
        'Page'    => $data['page_source'],
        'IP'      => $data['ip'],
        'Ref #'   => '#' . $data['id'],
    ];

    $body = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 22px;">'
        . '<tr>'
        . '<td style="padding:14px 16px;background:#f3f0ff;border:1px solid #ddd6fe;border-radius:12px;">'
        . '<p style="margin:0;font-size:13px;color:#5b21b6;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;">New lead alert</p>'
        . '<p style="margin:6px 0 0;font-size:15px;line-height:1.55;color:#4c1d95;">' . email_escape($name) . ' just submitted a project inquiry. Review the details and reply when ready.</p>'
        . '</td>'
        . '</tr>'
        . '</table>'
        . email_detail_rows($rows)
        . '<p style="margin:24px 0 10px;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:#6b7490;font-weight:700;">Message</p>'
        . '<div style="padding:18px 18px;background:#f7f9fd;border-left:4px solid #6d4df6;border-radius:0 14px 14px 0;font-size:15px;line-height:1.7;color:#10162b;">'
        . nl2br(email_escape($data['message']))
        . '</div>'
        . '<p style="margin:28px 0 8px;">'
        . email_primary_button(
            'mailto:' . $data['email'] . '?subject=' . rawurlencode('Re: Your inquiry to ' . SITE_NAME),
            'Reply to ' . $name
        )
        . '</p>';

    $html = email_layout(
        'New inquiry from ' . $name . ' — open to respond.',
        'Sales notification',
        'New project inquiry',
        $body,
        'Internal alert · Reference #' . $data['id'] . ' · Respond promptly to keep momentum.',
        $logoSrc,
        'company'
    );

    $text = "New inquiry received (#{$data['id']}):\n\n"
        . "Name: {$data['name']}\n"
        . "Email: {$data['email']}\n"
        . "Phone: {$data['phone']}\n"
        . "Company: {$data['company']}\n"
        . "Country: {$data['country']}\n"
        . "Service: {$data['service']}\n"
        . "Source: {$data['source']}\n"
        . "Page: {$data['page_source']}\n"
        . "Message:\n{$data['message']}\n\n"
        . "IP: {$data['ip']}\n"
        . 'Time: ' . date('c') . "\n";

    return ['subject' => $subject, 'html' => $html, 'text' => $text];
}

/**
 * @param array{name:string,service:string,message:string,id:int} $data
 * @return array{subject:string,html:string,text:string}
 */
function build_thank_you_email(array $data, string $logoSrc = ''): array
{
    $name = $data['name'];
    $first = trim(explode(' ', $name)[0] ?: $name);
    $subject = 'Thank you for contacting ' . SITE_NAME;

    $serviceChip = $data['service'] !== ''
        ? '<td style="padding:0 0 18px;">'
            . '<span style="display:inline-block;padding:7px 12px;border-radius:999px;background:rgba(109,77,246,0.1);border:1px solid rgba(109,77,246,0.18);color:#5b21b6;font-size:12px;font-weight:700;">'
            . email_escape($data['service'])
            . '</span></td>'
        : '';

    $body = '<p style="margin:0 0 8px;font-size:18px;line-height:1.4;color:#10162b;font-weight:700;">Hi ' . email_escape($first) . ',</p>'
        . '<p style="margin:0 0 20px;font-size:15px;line-height:1.7;color:#5d6780;">Thank you for reaching out to <strong style="color:#10162b;">' . email_escape(SITE_NAME) . '</strong>. We have received your inquiry and our team is already reviewing it. You can expect a thoughtful reply with next steps soon.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"><tr>' . $serviceChip . '</tr></table>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 22px;background:#f7f9fd;border:1px solid #e4e9f5;border-radius:14px;">'
        . '<tr><td style="padding:18px 18px 8px;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:#6b7490;font-weight:700;">Your message</td></tr>'
        . '<tr><td style="padding:0 18px 18px;font-size:14px;line-height:1.7;color:#10162b;">' . nl2br(email_escape($data['message'])) . '</td></tr>'
        . '</table>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 24px;">'
        . '<tr>'
        . '<td width="33%" style="padding:12px;background:#f3f0ff;border-radius:12px;text-align:center;"><p style="margin:0;font-size:18px;font-weight:800;color:#6d4df6;">01</p><p style="margin:6px 0 0;font-size:11px;color:#5d6780;font-weight:600;">We review</p></td>'
        . '<td width="8"></td>'
        . '<td width="33%" style="padding:12px;background:#eef5ff;border-radius:12px;text-align:center;"><p style="margin:0;font-size:18px;font-weight:800;color:#2f6bff;">02</p><p style="margin:6px 0 0;font-size:11px;color:#5d6780;font-weight:600;">We reply</p></td>'
        . '<td width="8"></td>'
        . '<td width="33%" style="padding:12px;background:#e8fafc;border-radius:12px;text-align:center;"><p style="margin:0;font-size:18px;font-weight:800;color:#0891b2;">03</p><p style="margin:6px 0 0;font-size:11px;color:#5d6780;font-weight:600;">We plan</p></td>'
        . '</tr></table>'
        . '<p style="margin:0 0 22px;font-size:14px;line-height:1.65;color:#5d6780;">Want to add timeline, budget, or reference links? Just reply to this email — it reaches our team directly.</p>'
        . '<p style="margin:0 0 24px;">'
        . email_primary_button(email_site_url() . '/contact-us', 'Explore more with us')
        . '</p>'
        . '<p style="margin:0;font-size:15px;line-height:1.6;color:#10162b;">Warm regards,<br><strong>The ' . email_escape(SITE_NAME) . ' Team</strong></p>';

    $html = email_layout(
        'We received your inquiry — thank you for choosing ' . SITE_NAME . '.',
        'Confirmation',
        'We got your message',
        $body,
        'Reference #' . $data['id'] . ' · Usually we respond within one business day.',
        $logoSrc,
        'thanks'
    );

    $text = "Hi {$first},\n\n"
        . 'Thank you for contacting ' . SITE_NAME . ". We have received your inquiry and will get back to you shortly.\n\n"
        . ($data['service'] !== '' ? "Interest: {$data['service']}\n\n" : '')
        . "Your message:\n{$data['message']}\n\n"
        . 'Reference #' . $data['id'] . "\n\n"
        . '— The ' . SITE_NAME . " Team\n"
        . SITE_PHONE . ' · ' . MAIL_TO_ADDRESS . "\n";

    return ['subject' => $subject, 'html' => $html, 'text' => $text];
}

/**
 * Send company notification + user thank-you emails.
 *
 * @param array{
 *   id:int,name:string,email:string,phone:string,company:string,country:string,
 *   service:string,source:string,message:string,page_source:string,ip:string
 * } $data
 * @return array{company:bool,user:bool,all:bool}
 */
function send_inquiry_emails(array $data): array
{
    $companyOk = false;
    $userOk = false;

    if (MAIL_HOST === '' || MAIL_ENQUIRY_TO === '') {
        log_mail_error('inquiry', new RuntimeException('Mail host or SMTP_ENQUIRY_TO is not configured.'));
        return ['company' => false, 'user' => false, 'all' => false];
    }

    $userEmail = trim((string) ($data['email'] ?? ''));
    if ($userEmail === '' || !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        log_mail_error('inquiry.user', new RuntimeException('Invalid applicant email: ' . $userEmail));
        // Still try company notification below
    }

    $mail = null;
    try {
        $mail = create_mailer();
        $mail->SMTPKeepAlive = true;
        $logoSrc = attach_email_logo($mail);

        // 1) Company notification
        try {
            $companyMail = build_company_inquiry_email($data, $logoSrc);
            $mail->addAddress(MAIL_ENQUIRY_TO);
            if (MAIL_ENQUIRY_CC !== '' && strcasecmp(MAIL_ENQUIRY_CC, MAIL_ENQUIRY_TO) !== 0) {
                $mail->addCC(MAIL_ENQUIRY_CC);
            }
            if ($userEmail !== '' && filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($userEmail, email_safe_name((string) $data['name']));
            }
            $mail->Subject = $companyMail['subject'];
            $mail->isHTML(true);
            $mail->Body    = $companyMail['html'];
            $mail->AltBody = $companyMail['text'];
            $mail->send();
            $companyOk = true;
        } catch (Throwable $e) {
            log_mail_error('inquiry.company', $e, $mail);
            $companyOk = false;
        }

        // 2) User thank-you
        if ($userEmail !== '' && filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            try {
                reset_mailer_recipients($mail);
                // Re-attach logo after clearAttachments()
                $logoSrc = attach_email_logo($mail);
                $thanksMail = build_thank_you_email([
                    'id'      => $data['id'],
                    'name'    => $data['name'],
                    'service' => $data['service'],
                    'message' => $data['message'],
                ], $logoSrc);
                $mail->addAddress($userEmail, email_safe_name((string) $data['name']));
                // Visitor replies go to the public business inbox; From stays SMTP-configured.
                $mail->addReplyTo(SITE_EMAIL, MAIL_FROM_NAME);
                $mail->Subject = $thanksMail['subject'];
                $mail->isHTML(true);
                $mail->Body    = $thanksMail['html'];
                $mail->AltBody = $thanksMail['text'];
                $mail->send();
                $userOk = true;
            } catch (Throwable $e) {
                log_mail_error('inquiry.user', $e, $mail);
                $userOk = false;
            }
        }
    } catch (Throwable $e) {
        log_mail_error('inquiry.setup', $e, $mail);
    }

    if ($mail instanceof PHPMailer) {
        try {
            $mail->smtpClose();
        } catch (Throwable $e) {
            // ignore close errors
        }
    }

    return [
        'company' => $companyOk,
        'user'    => $userOk,
        'all'     => $companyOk && $userOk,
    ];
}

/**
 * @param array{
 *   id:int,name:string,email:string,phone:string,position:string,experience:string,
 *   linkedin:string,portfolio:string,city:string,message:string,ip:string,
 *   cv_original_name:string
 * } $data
 * @return array{subject:string,html:string,text:string}
 */
function build_company_career_email(array $data, string $logoSrc = ''): array
{
    $name = $data['name'];
    $subject = 'New career application from ' . $name . ' — ' . SITE_NAME;

    $rows = [
        'Name'       => $data['name'],
        'Email'      => $data['email'],
        'Phone'      => $data['phone'],
        'Position'   => $data['position'],
        'Experience' => $data['experience'],
        'LinkedIn'   => $data['linkedin'],
        'Portfolio'  => $data['portfolio'],
        'City'       => $data['city'],
        'CV file'    => $data['cv_original_name'],
        'IP'         => $data['ip'],
        'Ref #'      => '#' . $data['id'],
    ];

    $body = '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 22px;">'
        . '<tr>'
        . '<td style="padding:14px 16px;background:#f3f0ff;border:1px solid #ddd6fe;border-radius:12px;">'
        . '<p style="margin:0;font-size:13px;color:#5b21b6;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;">Careers alert</p>'
        . '<p style="margin:6px 0 0;font-size:15px;line-height:1.55;color:#4c1d95;">' . email_escape($name) . ' applied for <strong>' . email_escape($data['position']) . '</strong>. CV is attached.</p>'
        . '</td>'
        . '</tr>'
        . '</table>'
        . email_detail_rows($rows)
        . '<p style="margin:24px 0 10px;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:#6b7490;font-weight:700;">Cover letter</p>'
        . '<div style="padding:18px 18px;background:#f7f9fd;border-left:4px solid #6d4df6;border-radius:0 14px 14px 0;font-size:15px;line-height:1.7;color:#10162b;">'
        . nl2br(email_escape($data['message']))
        . '</div>'
        . '<p style="margin:28px 0 8px;">'
        . email_primary_button(
            'mailto:' . $data['email'] . '?subject=' . rawurlencode('Re: Your application to ' . SITE_NAME),
            'Reply to ' . $name
        )
        . '</p>';

    $html = email_layout(
        'New career application from ' . $name . ' — review CV.',
        'Careers notification',
        'New team application',
        $body,
        'Internal alert · Reference #' . $data['id'] . ' · CV attached.',
        $logoSrc,
        'company'
    );

    $text = "New career application (#{$data['id']}):\n\n"
        . "Name: {$data['name']}\n"
        . "Email: {$data['email']}\n"
        . "Phone: {$data['phone']}\n"
        . "Position: {$data['position']}\n"
        . "Experience: {$data['experience']}\n"
        . "LinkedIn: {$data['linkedin']}\n"
        . "Portfolio: {$data['portfolio']}\n"
        . "City: {$data['city']}\n"
        . "CV: {$data['cv_original_name']}\n"
        . "Cover letter:\n{$data['message']}\n\n"
        . "IP: {$data['ip']}\n"
        . 'Time: ' . date('c') . "\n";

    return ['subject' => $subject, 'html' => $html, 'text' => $text];
}

/**
 * @param array{name:string,position:string,message:string,id:int} $data
 * @return array{subject:string,html:string,text:string}
 */
function build_career_thank_you_email(array $data, string $logoSrc = ''): array
{
    $name = $data['name'];
    $first = trim(explode(' ', $name)[0] ?: $name);
    $subject = 'We received your application — ' . SITE_NAME;

    $body = '<p style="margin:0 0 8px;font-size:18px;line-height:1.4;color:#10162b;font-weight:700;">Hi ' . email_escape($first) . ',</p>'
        . '<p style="margin:0 0 20px;font-size:15px;line-height:1.7;color:#5d6780;">Thank you for applying to join <strong style="color:#10162b;">' . email_escape(SITE_NAME) . '</strong>. We have received your application for <strong style="color:#10162b;">' . email_escape($data['position']) . '</strong> and our hiring team will review it shortly.</p>'
        . '<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0 0 22px;background:#f7f9fd;border:1px solid #e4e9f5;border-radius:14px;">'
        . '<tr><td style="padding:18px 18px 8px;font-size:11px;letter-spacing:0.1em;text-transform:uppercase;color:#6b7490;font-weight:700;">Your cover letter</td></tr>'
        . '<tr><td style="padding:0 18px 18px;font-size:14px;line-height:1.7;color:#10162b;">' . nl2br(email_escape($data['message'])) . '</td></tr>'
        . '</table>'
        . '<p style="margin:0 0 22px;font-size:14px;line-height:1.65;color:#5d6780;">If your profile is a strong match, we will reach out with next steps. No need to resend your CV unless we ask.</p>'
        . '<p style="margin:0 0 24px;">'
        . email_primary_button(email_site_url() . '/hire#join-our-team', 'View open roles')
        . '</p>'
        . '<p style="margin:0;font-size:15px;line-height:1.6;color:#10162b;">Warm regards,<br><strong>The ' . email_escape(SITE_NAME) . ' Team</strong></p>';

    $html = email_layout(
        'We received your application — thank you for your interest in ' . SITE_NAME . '.',
        'Confirmation',
        'Application received',
        $body,
        'Reference #' . $data['id'] . ' · Our hiring team reviews applications regularly.',
        $logoSrc,
        'thanks'
    );

    $text = "Hi {$first},\n\n"
        . 'Thank you for applying to ' . SITE_NAME . ". We have received your application for {$data['position']} and will review it shortly.\n\n"
        . "Your cover letter:\n{$data['message']}\n\n"
        . 'Reference #' . $data['id'] . "\n\n"
        . '— The ' . SITE_NAME . " Team\n"
        . SITE_PHONE . ' · ' . MAIL_TO_ADDRESS . "\n";

    return ['subject' => $subject, 'html' => $html, 'text' => $text];
}

/**
 * Send company career notification (with CV) + applicant thank-you.
 *
 * @param array{
 *   id:int,name:string,email:string,phone:string,position:string,experience:string,
 *   linkedin:string,portfolio:string,city:string,message:string,
 *   cv_path:string,cv_original_name:string,ip:string
 * } $data
 * @return array{company:bool,user:bool,all:bool}
 */
function send_career_emails(array $data): array
{
    $companyOk = false;
    $userOk = false;
    $careersTo = MAIL_APPLY_TO !== '' ? MAIL_APPLY_TO : MAIL_ENQUIRY_TO;

    if (MAIL_HOST === '' || $careersTo === '') {
        log_mail_error('career', new RuntimeException('Mail host or SMTP_APPLY_TO is not configured.'));
        return ['company' => false, 'user' => false, 'all' => false];
    }

    $userEmail = trim((string) ($data['email'] ?? ''));
    $mail = null;

    try {
        $mail = create_mailer();
        $mail->SMTPKeepAlive = true;
        $logoSrc = attach_email_logo($mail);

        // 1) Company / HR notification (+ CV)
        try {
            $companyMail = build_company_career_email($data, $logoSrc);
            $mail->addAddress($careersTo);
            if ($userEmail !== '' && filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($userEmail, email_safe_name((string) $data['name']));
            }
            $mail->Subject = $companyMail['subject'];
            $mail->isHTML(true);
            $mail->Body    = $companyMail['html'];
            $mail->AltBody = $companyMail['text'];

            $cvPath = (string) ($data['cv_path'] ?? '');
            $cvName = (string) ($data['cv_original_name'] ?? 'cv.pdf');
            if ($cvPath !== '' && is_file($cvPath) && is_readable($cvPath)) {
                $mail->addAttachment($cvPath, $cvName);
            }

            $mail->send();
            $companyOk = true;
        } catch (Throwable $e) {
            log_mail_error('career.company', $e, $mail);
            $companyOk = false;
        }

        // 2) Applicant thank-you
        if ($userEmail !== '' && filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            try {
                reset_mailer_recipients($mail);
                $logoSrc = attach_email_logo($mail);
                $thanksMail = build_career_thank_you_email([
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'position' => $data['position'],
                    'message'  => $data['message'],
                ], $logoSrc);
                $mail->addAddress($userEmail, email_safe_name((string) $data['name']));
                $mail->addReplyTo(MAIL_FROM_ADDRESS, MAIL_FROM_NAME);
                $mail->Subject = $thanksMail['subject'];
                $mail->isHTML(true);
                $mail->Body    = $thanksMail['html'];
                $mail->AltBody = $thanksMail['text'];
                $mail->send();
                $userOk = true;
            } catch (Throwable $e) {
                log_mail_error('career.user', $e, $mail);
                $userOk = false;
            }
        } else {
            log_mail_error('career.user', new RuntimeException('Invalid applicant email: ' . $userEmail));
        }
    } catch (Throwable $e) {
        log_mail_error('career.setup', $e, $mail);
    }

    if ($mail instanceof PHPMailer) {
        try {
            $mail->smtpClose();
        } catch (Throwable $e) {
            // ignore close errors
        }
    }

    return [
        'company' => $companyOk,
        'user'    => $userOk,
        'all'     => $companyOk && $userOk,
    ];
}
