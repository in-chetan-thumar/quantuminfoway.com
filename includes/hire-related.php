<?php
/**
 * Related QI service cards for hire pages.
 * Optional: $hire_related — array of [href, label, blurb]
 */
$bp = htmlspecialchars(isset($base_path) ? $base_path : '');
if (!isset($hire_related) || !is_array($hire_related)) {
    $hire_related = [
        ['services/no-code-development.php', 'No-Code Development →', 'Ship fast on Xano, WeWeb, Webflow, Bubble, and Supabase.'],
        ['services/xano-development.php', 'Xano Development →', 'Production Xano backends with APIs, logic, and AI agents.'],
        ['services/mvp-development.php', 'MVP Build & Rescue →', 'Validate fast — or rescue an MVP that needs to scale.'],
        ['services/web-app-development.php', 'Web App Development →', 'React, Next.js, and Node.js apps built to scale.'],
    ];
}
?>
<div class="related-strip reveal reveal-up" style="margin-top: 3rem;">
    <?php foreach ($hire_related as $r): ?>
    <a class="related-card" href="<?php echo route_attr($r[0]); ?>">
        <span>Related</span>
        <strong><?php echo htmlspecialchars($r[1]); ?></strong>
        <p><?php echo htmlspecialchars($r[2]); ?></p>
    </a>
    <?php endforeach; ?>
</div>
