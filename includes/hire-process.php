<?php
/**
 * Shared hire "How It Works" steps.
 * Optional: $hire_process_role (e.g. "Xano developer") for copy nuance.
 */
$hire_process_role = isset($hire_process_role) ? $hire_process_role : 'developer';
$hi = isset($hi) ? $hi : (htmlspecialchars(isset($base_path) ? $base_path : '') . 'assets/images/hire/');
?>
<section class="section" id="process">
    <div class="container">
        <div class="section-head reveal reveal-up">
            <span class="eyebrow">How It Works</span>
            <h2>From first conversation to a developer shipping code on your <span class="gradient-text">project</span></h2>
            <p>The process is designed to be fast, transparent, and low-risk — whether you need a <?php echo htmlspecialchars($hire_process_role); ?>, a managed team, or a fixed-scope build.</p>
        </div>
        <div class="hire-steps reveal-stagger">
            <article class="hire-step reveal reveal-up">
                <div class="hire-step-media"><img src="<?php echo $hi; ?>hire___shared__how-it-works2.png" alt=""></div>
                <span class="hire-step-num">01</span>
                <h3>Share your goals</h3>
                <p>Tell us about the product, stack, timezone overlap, and whether you need a dedicated hire, managed team, or fixed-scope build.</p>
            </article>
            <article class="hire-step reveal reveal-up">
                <div class="hire-step-media"><img src="<?php echo $hi; ?>hire___shared__how-it-works-3.webp" alt=""></div>
                <span class="hire-step-num">02</span>
                <h3>Meet shortlisted engineers</h3>
                <p>We match vetted candidates to your requirements and share profiles, sample work, and availability within a few business days.</p>
            </article>
            <article class="hire-step reveal reveal-up">
                <div class="hire-step-media"><img src="<?php echo $hi; ?>hire___shared__how-it-works3.webp" alt=""></div>
                <span class="hire-step-num">03</span>
                <h3>Interview &amp; select</h3>
                <p>You interview directly. If the fit is not right, we continue until you are confident — no pressure to lock in early.</p>
            </article>
            <article class="hire-step reveal reveal-up">
                <div class="hire-step-media"><img src="<?php echo $hi; ?>hire___shared__how-it-works4.webp" alt=""></div>
                <span class="hire-step-num">04</span>
                <h3>Start within a week</h3>
                <p>Onboarding into your tools and channels is typically complete within 14 business days. Engagements run monthly with flexible scale.</p>
            </article>
        </div>
    </div>
</section>
