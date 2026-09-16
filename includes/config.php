<?php
/**
 * Quantum Infoway — Site Configuration
 */

$projectRoot = dirname(__DIR__);

if (is_file($projectRoot . '/vendor/autoload.php')) {
    require_once $projectRoot . '/vendor/autoload.php';

    if (is_file($projectRoot . '/.env')) {
        Dotenv\Dotenv::createImmutable($projectRoot)->safeLoad();
    }
}

/**
 * Read an environment value with a default.
 */
function env_value(string $key, string $default = ''): string
{
    $value = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
    if ($value === false || $value === null || $value === '') {
        return $default;
    }
    return (string) $value;
}

define('SITE_NAME', 'Quantum Infoway');
define('SITE_TAGLINE', 'We Are Top IT Solutions');
define('SITE_EMAIL', 'hello@quantuminfoway.com');
define('SITE_PHONE', '+91 85111 08041');
define('SITE_HOURS', 'Mon-Fri 10am-7pm');
define('SITE_URL', env_value('APP_URL', 'https://quantuminfoway.com'));

define('DB_CONNECTION', env_value('DB_CONNECTION', 'mysql'));
define('DB_HOST', env_value('DB_HOST', '127.0.1.17'));
define('DB_PORT', env_value('DB_PORT', '3306'));
define('DB_NAME', env_value('DB_DATABASE', 'test_quantuminfoway'));
define('DB_USER', env_value('DB_USERNAME', 'root'));
define('DB_PASS', env_value('DB_PASSWORD', ''));
define('DB_CHARSET', env_value('DB_CHARSET', 'utf8mb4'));

define('MAIL_HOST', env_value('SMTP_HOST', ''));
define('MAIL_PORT', (int) env_value('SMTP_PORT', '587'));
define('MAIL_USERNAME', env_value('SMTP_USER', ''));
define('MAIL_PASSWORD', env_value('SMTP_PASS', ''));
define('MAIL_ENCRYPTION', env_value('SMTP_ENCRYPTION', 'tls'));
define('MAIL_FROM_ADDRESS', env_value('SMTP_FROM', 'noreply@quantuminfoway.com'));
define('MAIL_FROM_NAME', env_value('SMTP_FROM_NAME', SITE_NAME));

// Enquiry / contact form inbox (home, contact-us → form-handler)
define(
    'MAIL_ENQUIRY_TO',
    env_value('SMTP_ENQUIRY_TO', SITE_EMAIL)
);
define('MAIL_ENQUIRY_CC', env_value('SMTP_ENQUIRY_CC', 'chetan.thumar@quantuminfoway.com'));
// Apply Now / Join Our Team inbox (hire → career-handler)
define(
    'MAIL_APPLY_TO',
    env_value('SMTP_APPLY_TO', env_value('SMTP_CAREERS_TO', MAIL_ENQUIRY_TO))
);

// Backward-compatible aliases
define('MAIL_TO_ADDRESS', MAIL_ENQUIRY_TO);
define('MAIL_CAREERS_TO', MAIL_APPLY_TO);
define('INQUIRY_TO_EMAIL', MAIL_ENQUIRY_TO);
define('INQUIRY_FROM_EMAIL', MAIL_FROM_ADDRESS);
define('INQUIRY_LOG_FILE', __DIR__ . '/../data/inquiries.log');

define('SOCIAL_FACEBOOK', 'https://www.facebook.com/');
define('SOCIAL_TWITTER', 'https://twitter.com/');
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/');

/**
 * Path prefix for assets and root links.
 * Set $base_path = '../' on pages inside subdirectories (e.g. services/).
 * Root pages use '/' so assets still load when the URL has a trailing slash
 * (e.g. /hire/ — relative "assets/..." would otherwise resolve to /hire/assets/...).
 */
if (!isset($base_path)) {
    $base_path = '';
}
$base_path = rtrim(str_replace('\\', '/', (string) $base_path), '/');
if ($base_path === '' || $base_path === '.') {
    $base_path = '/';
} else {
    $base_path .= '/';
}

/**
 * Build a clean site route (no .php extension).
 *
 * Examples:
 *   route() / route('index') / route('/')  → /
 *   route('about-us')                      → /about-us
 *   route('about-us.php')                  → /about-us
 *   route('services/ai-development.php')   → /services/ai-development
 *   route('index.php#portfolio')           → /#portfolio
 *   route('#reviews')                      → /#reviews
 */
function route(string $path = ''): string
{
    $hash = '';
    if (($hashPos = strpos($path, '#')) !== false) {
        $hash = substr($path, $hashPos);
        $path = substr($path, 0, $hashPos);
    }

    $path = str_replace('\\', '/', trim($path));
    $path = preg_replace('/\.php$/i', '', $path) ?? $path;
    $path = trim($path, '/');

    if ($path === '' || strcasecmp($path, 'index') === 0) {
        return '/' . ($hash !== '' ? $hash : '');
    }

    return '/' . $path . $hash;
}

/**
 * HTML-escaped clean route for use in href/action attributes.
 */
function route_attr(string $path = ''): string
{
    return htmlspecialchars(route($path), ENT_QUOTES, 'UTF-8');
}

/**
 * Normalized current request path (no query string or hash).
 * Examples: /, /about-us, /services/ai-development
 */
function current_path(): string
{
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($uri, PHP_URL_PATH);
    if (!is_string($path) || $path === '') {
        $path = '/';
    }

    $path = str_replace('\\', '/', $path);
    $path = preg_replace('/\.php$/i', '', $path) ?? $path;

    if ($path !== '/') {
        $path = rtrim($path, '/');
    }

    if ($path === '' || strcasecmp($path, '/index') === 0) {
        return '/';
    }

    return $path === '' ? '/' : $path;
}

/**
 * Whether the current path matches a site route.
 * When $prefix is true, /services matches /services and /services/...
 */
function is_active_route(string $path, bool $prefix = false): bool
{
    $current = current_path();
    $target = route($path);

    if (($hashPos = strpos($target, '#')) !== false) {
        $target = substr($target, 0, $hashPos);
    }

    if ($target === '') {
        $target = '/';
    }

    if ($prefix) {
        if ($current === $target) {
            return true;
        }
        if ($target !== '/' && str_starts_with($current, $target . '/')) {
            return true;
        }
        return false;
    }

    return $current === $target;
}

/**
 * Returns ' active' when the route matches, otherwise ''.
 */
function nav_active_class(string $path, bool $prefix = false): string
{
    return is_active_route($path, $prefix) ? ' active' : '';
}

/**
 * Returns aria-current="page" attribute when the route matches.
 */
function nav_aria_current(string $path, bool $prefix = false): string
{
    return is_active_route($path, $prefix) ? ' aria-current="page"' : '';
}
