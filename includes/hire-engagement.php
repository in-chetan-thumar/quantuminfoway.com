<?php
/**
 * Shared engagement models.
 * Requires: $hire_tech (e.g. "Xano")
 * Optional:
 *   $hire_engage_dedicated_best, $hire_engage_managed_best, $hire_engage_project_best
 *   $hire_engage_mid_title (default Managed Team; Node uses Extended Team)
 *   $hire_engage_dedicated_body, $hire_engage_mid_body, $hire_engage_project_body
 *   $hire_engage_perks (array of perk strings)
 */
$hire_tech = isset($hire_tech) ? $hire_tech : 'Developer';
$hire_engage_dedicated_best = isset($hire_engage_dedicated_best) ? $hire_engage_dedicated_best : ('Ongoing ' . $hire_tech . ' ownership and iteration');
$hire_engage_managed_best = isset($hire_engage_managed_best) ? $hire_engage_managed_best : ('Building a ' . $hire_tech . ' product end-to-end with a lead');
$hire_engage_project_best = isset($hire_engage_project_best) ? $hire_engage_project_best : ('New builds, rebuilds, and integration work');
$hire_engage_mid_title = isset($hire_engage_mid_title) ? $hire_engage_mid_title : 'Managed Team';
$hire_engage_dedicated_body = isset($hire_engage_dedicated_body)
    ? $hire_engage_dedicated_body
    : ('A ' . $hire_tech . ' developer works exclusively on your project, integrated with your team’s tools and workflows.');
$hire_engage_mid_body = isset($hire_engage_mid_body)
    ? $hire_engage_mid_body
    : ('We assemble and manage a ' . $hire_tech . ' team with a tech lead, handling delivery end-to-end against your requirements.');
$hire_engage_project_body = isset($hire_engage_project_body)
    ? $hire_engage_project_body
    : 'Fixed scope, timeline, and budget. We deliver the project and hand off the codebase with documentation.';
if (!isset($hire_engage_perks) || !is_array($hire_engage_perks)) {
    $hire_engage_perks = [
        'Start within a week',
        'Flexible scale-up / scale-down',
        'No long-term lock-in',
        'Dedicated technical lead',
    ];
}
$bp = htmlspecialchars(isset($base_path) ? $base_path : '');
?>
<section class="section services-alt" id="engagement">
    <div class="container">
        <div class="section-head reveal reveal-up">
            <span class="eyebrow">Engagement Models</span>
            <h2>How you can hire <span class="gradient-text"><?php echo htmlspecialchars($hire_tech); ?> talent</span></h2>
        </div>
        <div class="hire-engage reveal-stagger">
            <article class="hire-engage-card reveal reveal-up">
                <div class="hire-engage-media"><img src="<?php echo isset($hi) ? $hi : (htmlspecialchars(isset($base_path) ? $base_path : '') . 'assets/images/hire/'); ?>hire___shared__engagement-1.webp" alt=""></div>
                <span class="hire-engage-index">01</span>
                <h3>Dedicated Developer</h3>
                <p><?php echo htmlspecialchars($hire_engage_dedicated_body); ?></p>
                <span class="hire-engage-best">Best for: <?php echo htmlspecialchars($hire_engage_dedicated_best); ?></span>
            </article>
            <article class="hire-engage-card reveal reveal-up">
                <div class="hire-engage-media"><img src="<?php echo isset($hi) ? $hi : (htmlspecialchars(isset($base_path) ? $base_path : '') . 'assets/images/hire/'); ?>hire___shared__engagement-2.webp" alt=""></div>
                <span class="hire-engage-index">02</span>
                <h3><?php echo htmlspecialchars($hire_engage_mid_title); ?></h3>
                <p><?php echo htmlspecialchars($hire_engage_mid_body); ?></p>
                <span class="hire-engage-best">Best for: <?php echo htmlspecialchars($hire_engage_managed_best); ?></span>
            </article>
            <article class="hire-engage-card reveal reveal-up">
                <div class="hire-engage-media"><img src="<?php echo isset($hi) ? $hi : (htmlspecialchars(isset($base_path) ? $base_path : '') . 'assets/images/hire/'); ?>hire___shared__engagement-3.webp" alt=""></div>
                <span class="hire-engage-index">03</span>
                <h3>Project-Based</h3>
                <p><?php echo htmlspecialchars($hire_engage_project_body); ?></p>
                <span class="hire-engage-best">Best for: <?php echo htmlspecialchars($hire_engage_project_best); ?></span>
            </article>
        </div>
        <ul class="hire-engage-perks reveal reveal-up">
            <?php foreach ($hire_engage_perks as $perk): ?>
            <li><?php echo htmlspecialchars($perk); ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="svc-soft-cta reveal reveal-up" style="margin-top: 2rem;">
            <div>
                <h3>Tell us which model fits — we will recommend the leanest path.</h3>
                <p>Quantum Infoway scopes every engagement before any quote becomes final.</p>
            </div>
            <a href="<?php echo $bp; ?>contact-us.php" class="btn btn-primary">Talk to an Expert</a>
        </div>
    </div>
</section>
