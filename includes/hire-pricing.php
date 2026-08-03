<?php
/**
 * Shared hire pricing band.
 * Requires: $hire_tech
 * Optional: $hire_rate_low, $hire_rate_high, $hire_fixed_from, $hire_pricing_note
 */
$hire_tech = isset($hire_tech) ? $hire_tech : 'Developer';
$hire_rate_low = isset($hire_rate_low) ? $hire_rate_low : '25';
$hire_rate_high = isset($hire_rate_high) ? $hire_rate_high : '50';
$hire_fixed_from = isset($hire_fixed_from) ? $hire_fixed_from : '15,000';
$hire_pricing_note = isset($hire_pricing_note)
    ? $hire_pricing_note
    : 'US specialists typically bill $150 to $300 per hour for comparable scope. Every engagement is scoped individually before any number becomes a quote.';
$bp = htmlspecialchars(isset($base_path) ? $base_path : '');
?>
<section class="section dark-band" id="pricing">
    <div class="container">
        <div class="section-head reveal reveal-up">
            <span class="eyebrow">Pricing</span>
            <h2>Transparent <?php echo htmlspecialchars($hire_tech); ?> developer rates, <span class="gradient-text">published</span></h2>
        </div>
        <div class="hire-pricing reveal reveal-up">
            <div class="hire-price-card">
                <span class="hire-price-label">Hourly dedicated</span>
                <p class="hire-price-amount">$<?php echo htmlspecialchars($hire_rate_low); ?> to $<?php echo htmlspecialchars($hire_rate_high); ?> <small>per hour</small></p>
                <p>Dedicated <?php echo htmlspecialchars($hire_tech); ?> developers, by seniority</p>
            </div>
            <div class="hire-price-card">
                <span class="hire-price-label">Fixed-scope builds</span>
                <p class="hire-price-amount">From $<?php echo htmlspecialchars($hire_fixed_from); ?></p>
                <p>Focused builds with clear deliverables and documentation</p>
            </div>
            <div class="hire-price-note">
                <p><?php echo htmlspecialchars($hire_pricing_note); ?></p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary">Get a scoped quote</a>
            </div>
        </div>
    </div>
</section>
