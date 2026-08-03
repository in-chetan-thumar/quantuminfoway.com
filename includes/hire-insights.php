<?php
/**
 * Insights-style strip linking to QI service pages (not external blogs).
 * Optional: $hire_insights_title, $hire_insights — array of [href, title, tag, blurb]
 */
$bp = htmlspecialchars(isset($base_path) ? $base_path : '');
$hire_insights_title = isset($hire_insights_title) ? $hire_insights_title : 'Related insights';
if (!isset($hire_insights) || !is_array($hire_insights) || !count($hire_insights)) {
    return;
}
?>
<section class="section services-alt" id="insights" style="padding-top: 0;">
    <div class="container">
        <div class="section-head reveal reveal-up">
            <span class="eyebrow">Insights</span>
            <h2><?php echo htmlspecialchars($hire_insights_title); ?></h2>
        </div>
        <div class="related-strip hire-insights-strip reveal reveal-up">
            <?php foreach ($hire_insights as $ins): ?>
            <a class="related-card" href="<?php echo $bp . htmlspecialchars($ins[0]); ?>">
                <span><?php echo htmlspecialchars(isset($ins[2]) ? $ins[2] : 'Guide'); ?></span>
                <strong><?php echo htmlspecialchars($ins[1]); ?></strong>
                <?php if (!empty($ins[3])): ?>
                <p><?php echo htmlspecialchars($ins[3]); ?></p>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
