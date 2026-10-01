<?php
$prompt_path = current_path();
if ($prompt_path === '/contact-us' || $prompt_path === '/hire') {
    return;
}

$prompt_slug = preg_replace('#[^A-Za-z0-9/_-]#', '', $prompt_path) ?? '/';
$prompt_source = substr('prompt:' . $prompt_slug, 0, 40);
$prompt_site_key = (defined('TURNSTILE_SITE_KEY') && TURNSTILE_SITE_KEY !== '') ? TURNSTILE_SITE_KEY : '';
?>
<aside class="inquiry-prompt" id="inquiryPrompt" hidden>
    <div class="inquiry-prompt-card" role="dialog" aria-labelledby="inquiryPromptTitle" aria-describedby="inquiryPromptText">
        <button type="button" class="inquiry-prompt-close" id="inquiryPromptClose" aria-label="Close">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
        <h2 id="inquiryPromptTitle">Planning a project?</h2>
        <p id="inquiryPromptText">Send a short note, or call <a href="tel:<?php echo htmlspecialchars(SITE_PHONE_TEL); ?>"><?php echo htmlspecialchars(SITE_PHONE); ?></a>.</p>
        <form class="inquiry-prompt-form" id="inquiryPromptForm" action="<?php echo route_attr('form-handler'); ?>" method="post" novalidate>
            <input type="hidden" name="page_source" value="<?php echo htmlspecialchars($prompt_source, ENT_QUOTES, 'UTF-8'); ?>">
            <div class="form-row">
                <label for="promptName">Name</label>
                <input type="text" id="promptName" name="name" required autocomplete="name" placeholder="Your name" maxlength="120">
            </div>
            <div class="form-row">
                <label for="promptEmail">Work email</label>
                <input type="email" id="promptEmail" name="email" required autocomplete="email" placeholder="you@company.com" maxlength="190">
            </div>
            <div class="form-row">
                <label for="promptMessage">What do you need?</label>
                <textarea id="promptMessage" name="message" rows="2" required placeholder="A sentence on the project is enough" maxlength="5000"></textarea>
            </div>
            <div class="hp-field" aria-hidden="true">
                <label for="promptHp">Leave blank</label>
                <input type="text" id="promptHp" name="qx_hp_field" value="" tabindex="-1" autocomplete="new-password" inputmode="none">
            </div>
            <?php if ($prompt_site_key !== ''): ?>
            <div class="form-row turnstile-field">
                <div id="inquiryPromptTurnstile" data-sitekey="<?php echo htmlspecialchars($prompt_site_key, ENT_QUOTES, 'UTF-8'); ?>"></div>
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary btn-block" id="inquiryPromptSubmit">
                <span class="btn-text">Send</span>
                <span class="btn-loading" aria-hidden="true" hidden><span class="btn-spinner"></span> Sending...</span>
            </button>
            <p class="form-status" id="inquiryPromptStatus" role="status" aria-live="polite"></p>
        </form>
    </div>
</aside>
