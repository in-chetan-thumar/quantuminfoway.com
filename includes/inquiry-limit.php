<?php
/**
 * Inquiry rate limit for Hostinger (PHP + MySQL).
 * The live site is behind Cloudflare, so the visitor IP is CF-Connecting-IP.
 */

function client_ip(): string
{
    $candidates = [];
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $candidates[] = (string) $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $candidates[] = (string) $_SERVER['REMOTE_ADDR'];
    }

    foreach ($candidates as $ip) {
        $ip = trim($ip);
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return $ip;
        }
    }

    $fallback = trim((string) ($_SERVER['REMOTE_ADDR'] ?? ''));
    return filter_var($fallback, FILTER_VALIDATE_IP) ? $fallback : '';
}

/**
 * True when this visitor or email already sent 3 rows in the last hour.
 * $table must be one of the known form tables.
 */
function submission_is_rate_limited(string $table, string $ip, string $email): bool
{
    $allowed = [
        'inquiries' => true,
        'career_applications' => true,
    ];
    if (!isset($allowed[$table])) {
        return true;
    }

    $email = strtolower(trim($email));
    $parts = [];
    $params = [];
    if ($ip !== '') {
        $parts[] = 'ip = :ip';
        $params[':ip'] = $ip;
    }
    if ($email !== '') {
        $parts[] = 'email = :email';
        $params[':email'] = $email;
    }
    if ($parts === []) {
        return false;
    }

    $stmt = db()->prepare(
        'SELECT COUNT(*) FROM ' . $table . '
         WHERE created_at >= (NOW() - INTERVAL 1 HOUR)
           AND (' . implode(' OR ', $parts) . ')'
    );
    $stmt->execute($params);

    return (int) $stmt->fetchColumn() >= 3;
}

function inquiry_is_rate_limited(string $ip, string $email): bool
{
    return submission_is_rate_limited('inquiries', $ip, $email);
}

function career_application_is_rate_limited(string $ip, string $email): bool
{
    return submission_is_rate_limited('career_applications', $ip, $email);
}
