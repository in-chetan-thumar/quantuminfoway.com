<?php
/**
 * Cloudflare Turnstile server-side check.
 * https://developers.cloudflare.com/turnstile/get-started/server-side-validation/
 */

function verify_turnstile(string $token, string $ip = ''): bool
{
    if (!defined('TURNSTILE_SECRET_KEY') || TURNSTILE_SECRET_KEY === '' || $token === '') {
        return false;
    }

    $payload = [
        'secret'   => TURNSTILE_SECRET_KEY,
        'response' => $token,
    ];
    if ($ip !== '') {
        $payload['remoteip'] = $ip;
    }

    $ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
    if ($ch === false) {
        return false;
    }

    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_CONNECTTIMEOUT => 5,
    ]);

    $raw  = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (!is_string($raw) || $raw === '' || $code !== 200) {
        return false;
    }

    $data = json_decode($raw, true);
    return is_array($data) && !empty($data['success']);
}
