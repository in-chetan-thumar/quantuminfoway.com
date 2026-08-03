<?php
/**
 * Shared hire work / case studies strip using QI assets.
 * Optional: $hire_work_title, $hire_work_eyebrow
 * Optional: $hire_work_cards — array of cards; defaults to Highlands + FranchiseLab + Instant-ex
 */
$si = isset($si) ? $si : (htmlspecialchars(isset($base_path) ? $base_path : '') . 'assets/images/services/');
$hire_work_eyebrow = isset($hire_work_eyebrow) ? $hire_work_eyebrow : 'Our Work';
$hire_work_title = isset($hire_work_title) ? $hire_work_title : 'Products our teams have shipped';

if (!isset($hire_work_cards) || !is_array($hire_work_cards)) {
    $hire_work_cards = [
        [
            'tags' => ['Education', 'USA'],
            'images' => [
                'case-studies__highlands-brain__redesign__solution-mockup.webp',
                'case-studies__highlands-brain__redesign__hero-1.webp',
                'case-studies__highlands-brain__redesign__hero-2.webp',
            ],
            'alt' => 'Highlands Community Charter AI learning platform',
            'title' => 'Integrated AI features that reduced compliance effort by 97% for 15,000+ learners',
            'bullets' => [
                'Brain AI knowledge base answering student and staff queries instantly',
                'English Master adaptive language module with pronunciation feedback',
                'Two-way live translation for multilingual student populations',
                'Compliance document generation for audit-ready reports',
            ],
            'metrics' => [
                ['97%', 'Compliance effort reduction'],
                ['25%', 'Faster English acquisition'],
                ['15,000+', 'Learners supported'],
            ],
        ],
        [
            'tags' => ['Franchise / SaaS', 'Australia'],
            'images' => [
                'case-studies__franchiselab__mockup.webp',
                'case-studies__franchiselab__hero-1.webp',
                'case-studies__franchiselab__hero-2.webp',
            ],
            'alt' => 'FranchiseLab recruitment platform',
            'title' => 'Data-driven franchise recruitment and network development',
            'bullets' => [
                'Platform for franchisee recruitment and onboarding',
                'Performance assessments and structured interview guides',
                'Real-time tracking for data-driven oversight',
            ],
            'metrics' => [
                ['40%', 'Recruitment success lift'],
                ['35%', 'Lower operational costs'],
                ['30%', 'Higher franchisee retention'],
            ],
        ],
        [
            'tags' => ['Fintech', 'Poland'],
            'images' => [
                'case-studies__instant-ex__redesign__solution-mockup.webp',
                'case-studies__instant-ex__redesign__hero-1.webp',
                'case-studies__instant-ex__redesign__hero-2.webp',
            ],
            'alt' => 'Instant-ex cross-border remittance app',
            'title' => 'Cross-border money transfer app with 85% of transfers under 10 minutes',
            'bullets' => [
                'FlutterFlow + Xano stack for disciplined time-to-market',
                'Multi-corridor remittance from Europe to African markets',
                'Mobile money and bank-deposit payouts with live tracking',
            ],
            'metrics' => [
                ['85%', 'Transfers under 10 min'],
                ['5', 'Remittance corridors'],
                ['4.2★', 'Store rating'],
            ],
        ],
    ];
}
?>
<section class="section" id="work">
    <div class="container">
        <div class="section-head reveal reveal-up">
            <span class="eyebrow"><?php echo htmlspecialchars($hire_work_eyebrow); ?></span>
            <h2><?php echo $hire_work_title; ?></h2>
        </div>
        <div class="work-grid reveal-stagger">
            <?php foreach ($hire_work_cards as $card): ?>
            <article class="work-card reveal reveal-up">
                <?php if (!empty($card['tags'])): ?>
                <div class="case-tags">
                    <?php foreach ($card['tags'] as $tag): ?>
                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="work-media">
                    <?php foreach ($card['images'] as $img): ?>
                    <img src="<?php echo $si . htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($card['alt'] ?? ''); ?>">
                    <?php endforeach; ?>
                </div>
                <h3><?php echo htmlspecialchars($card['title']); ?></h3>
                <?php if (!empty($card['bullets'])): ?>
                <ul class="check-list">
                    <?php foreach ($card['bullets'] as $b): ?>
                    <li><?php echo htmlspecialchars($b); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if (!empty($card['metrics'])): ?>
                <div class="case-metrics">
                    <?php foreach ($card['metrics'] as $m): ?>
                    <div><strong><?php echo htmlspecialchars($m[0]); ?></strong><span><?php echo htmlspecialchars($m[1]); ?></span></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
