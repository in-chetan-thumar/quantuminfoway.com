<?php
if (!defined('TURNSTILE_SITE_KEY') || TURNSTILE_SITE_KEY === '') {
    return;
}
?>
<?php $turnstileAction = (isset($turnstile_action) && $turnstile_action !== '') ? $turnstile_action : 'inquiry'; ?>
<div class="form-row turnstile-field">
    <div
        class="cf-turnstile"
        data-sitekey="<?php echo htmlspecialchars(TURNSTILE_SITE_KEY, ENT_QUOTES, 'UTF-8'); ?>"
        data-theme="light"
        data-action="<?php echo htmlspecialchars($turnstileAction, ENT_QUOTES, 'UTF-8'); ?>"
    ></div>
</div>
<?php if (!defined('TURNSTILE_SCRIPT_PRINTED')): ?>
<?php define('TURNSTILE_SCRIPT_PRINTED', true); ?>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<?php endif; ?>
