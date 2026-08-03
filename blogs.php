<?php
$base_path = '';
$page_title = 'Blogs | Quantum Infoway — AI & Technology Insights';
$page_description = 'Guides, comparisons, and engineering practice from Quantum Infoway — AI, agents, no-code, cloud, mobile, and web.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);
$si = $bp . 'assets/images/services/';

$blog_data = require __DIR__ . '/includes/blog-posts.php';
$hero_title = isset($blog_data['hero_title']) ? $blog_data['hero_title'] : 'AI & Technology Insights';
$hero_sub = isset($blog_data['hero_sub']) ? $blog_data['hero_sub'] : '';
$posts = isset($blog_data['posts']) && is_array($blog_data['posts']) ? $blog_data['posts'] : [];

$tags = [];
foreach ($posts as $p) {
    $t = isset($p['tag']) ? $p['tag'] : '';
    if ($t !== '' && !in_array($t, $tags, true)) {
        $tags[] = $t;
    }
}
sort($tags);

$tag_icons = [
    'AI' => 'icons__Robot.webp',
    'AI Agents' => 'icons__Sparkle.webp',
    'Engineering' => 'icons__CodeBlock.webp',
    'Mobile Apps' => 'icons__DeviceMobile.webp',
    'Web Apps' => 'icons__Browsers.webp',
    'Costs & Pricing' => 'icons__TrendUp.webp',
    'DevOps & Cloud' => 'icons__CloudCheck.webp',
    'No-Code' => 'icons__RocketLaunch.webp',
    'Google Workspace' => 'icons__Link.webp',
    'UI UX Design' => 'icons__TreeStructure.webp',
];

$featured = array_slice($posts, 0, 5);
$fallback_img = $si . 'case-studies__ai-learning-platform-concept__mockup.webp';

function blog_tag_slug($tag) {
    $s = strtolower(trim($tag));
    $s = preg_replace('/[^a-z0-9]+/', '-', $s);
    return trim($s, '-');
}

function blog_img_src($p, $bp, $fallback) {
    if (!empty($p['image'])) {
        return $bp . htmlspecialchars($p['image']);
    }
    return $fallback;
}
?>

<main class="page-service page-hire page-directory page-blogs">
    <section class="hero service-hero has-media" id="blog-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">Insights from Quantum Infoway</span>
                <h1><?php
                    $ht = htmlspecialchars($hero_title);
                    if (stripos($hero_title, 'Insights') !== false) {
                        echo preg_replace('/Insights/i', '<span class="gradient-text">Insights</span>', $ht, 1);
                    } else {
                        echo $ht;
                    }
                ?></h1>
                <p><?php echo htmlspecialchars($hero_sub); ?></p>
                <div class="hero-actions">
                    <a href="#blog-grid" class="btn btn-primary btn-lg">Browse Articles</a>
                    <a href="<?php echo $bp; ?>contact-us.php" class="btn btn-ghost btn-lg">Talk to an Expert</a>
                </div>
                <div class="hero-trust-pills" aria-label="Topic highlights">
                    <span><?php echo count($posts); ?> articles</span>
                    <span><?php echo count($tags); ?> topics</span>
                    <span>Written by practising engineers</span>
                </div>
            </div>
            <div class="svc-hero-media blog-hero-stack reveal reveal-up" aria-hidden="true">
                <?php
                $hero_stack = array_slice($posts, 0, 3);
                foreach ($hero_stack as $hi => $hp):
                ?>
                <div class="blog-hero-shot" style="--tint:<?php echo htmlspecialchars(isset($hp['tint']) ? $hp['tint'] : '#EEF0F8'); ?>">
                    <img src="<?php echo blog_img_src($hp, $bp, $fallback_img); ?>" alt="" loading="<?php echo $hi === 0 ? 'eager' : 'lazy'; ?>">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="svc-showcase" aria-hidden="true">
        <div class="svc-showcase-track">
            <?php
            $show_posts = array_slice($posts, 0, 8);
            foreach (array_merge($show_posts, $show_posts) as $i => $sp):
                $tint = isset($sp['tint']) ? $sp['tint'] : '#EEF0F8';
            ?>
            <div class="svc-show-card blog-show-card" style="background:<?php echo htmlspecialchars($tint); ?>">
                <img src="<?php echo blog_img_src($sp, $bp, $fallback_img); ?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <section class="section blog-topics-section" id="blog-topics">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Topics</span>
                <h2>Explore by <span class="gradient-text">category</span></h2>
                <p>Jump into the subjects our engineers write about most.</p>
            </div>
            <div class="blog-topic-grid reveal reveal-up">
                <?php foreach ($tags as $tag):
                    $ico = isset($tag_icons[$tag]) ? $tag_icons[$tag] : 'icons__Sparkle.webp';
                    $count = 0;
                    foreach ($posts as $p) {
                        if ((isset($p['tag']) ? $p['tag'] : '') === $tag) $count++;
                    }
                ?>
                <a class="blog-topic-card" href="#blog-grid" data-jump-filter="<?php echo htmlspecialchars(blog_tag_slug($tag)); ?>">
                    <span class="blog-topic-ico"><img src="<?php echo $si . $ico; ?>" alt=""></span>
                    <strong><?php echo htmlspecialchars($tag); ?></strong>
                    <span><?php echo (int) $count; ?> articles</span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php if (count($featured) >= 3):
        $lead = $featured[0];
        $side = array_slice($featured, 1, 2);
    ?>
    <section class="section services-alt" id="blog-featured">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Featured</span>
                <h2>Latest from the <span class="gradient-text">field</span></h2>
                <p>Recent guides and comparisons — each linked to the Quantum Infoway service that matches the topic.</p>
            </div>
            <div class="blog-featured-layout">
                <a class="blog-lead-card reveal reveal-up" href="<?php echo $bp . htmlspecialchars(isset($lead['service']) ? $lead['service'] : 'services/ai-development.php'); ?>">
                    <div class="blog-lead-media" style="background:<?php echo htmlspecialchars(isset($lead['tint']) ? $lead['tint'] : '#EEF0F8'); ?>">
                        <img src="<?php echo blog_img_src($lead, $bp, $fallback_img); ?>" alt="" loading="eager">
                    </div>
                    <div class="blog-lead-body">
                        <div class="blog-card-meta">
                            <span class="blog-card-date"><?php echo htmlspecialchars(isset($lead['date']) ? $lead['date'] : ''); ?></span>
                            <span class="blog-card-tag"><?php echo htmlspecialchars(isset($lead['tag']) ? $lead['tag'] : ''); ?></span>
                            <span class="blog-card-read"><?php echo htmlspecialchars(isset($lead['read']) ? $lead['read'] : ''); ?></span>
                        </div>
                        <strong><?php echo htmlspecialchars(isset($lead['title']) ? $lead['title'] : ''); ?></strong>
                        <p><?php echo htmlspecialchars(isset($lead['excerpt']) ? $lead['excerpt'] : ''); ?></p>
                        <span class="blog-card-cta">Read insight →</span>
                    </div>
                </a>
                <div class="blog-side-stack">
                    <?php foreach ($side as $p): ?>
                    <a class="blog-side-card reveal reveal-up" href="<?php echo $bp . htmlspecialchars(isset($p['service']) ? $p['service'] : 'services/ai-development.php'); ?>">
                        <div class="blog-side-media" style="background:<?php echo htmlspecialchars(isset($p['tint']) ? $p['tint'] : '#EEF0F8'); ?>">
                            <img src="<?php echo blog_img_src($p, $bp, $fallback_img); ?>" alt="" loading="lazy">
                        </div>
                        <div class="blog-side-body">
                            <div class="blog-card-meta">
                                <span class="blog-card-tag"><?php echo htmlspecialchars(isset($p['tag']) ? $p['tag'] : ''); ?></span>
                                <span class="blog-card-date"><?php echo htmlspecialchars(isset($p['date']) ? $p['date'] : ''); ?></span>
                            </div>
                            <strong><?php echo htmlspecialchars(isset($p['title']) ? $p['title'] : ''); ?></strong>
                            <span class="blog-card-cta">Read insight →</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section" id="blog-grid">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">All articles</span>
                <h2>Filter by <span class="gradient-text">topic</span></h2>
                <p>Browse every insight. Cards open the related Quantum Infoway service.</p>
            </div>

            <div class="blog-filters reveal reveal-up" role="toolbar" aria-label="Filter articles by category">
                <button type="button" class="blog-filter is-active" data-filter="all">All <em><?php echo count($posts); ?></em></button>
                <?php foreach ($tags as $tag):
                    $count = 0;
                    foreach ($posts as $p) {
                        if ((isset($p['tag']) ? $p['tag'] : '') === $tag) $count++;
                    }
                ?>
                <button type="button" class="blog-filter" data-filter="<?php echo htmlspecialchars(blog_tag_slug($tag)); ?>"><?php echo htmlspecialchars($tag); ?> <em><?php echo (int) $count; ?></em></button>
                <?php endforeach; ?>
            </div>

            <div class="blog-grid" id="blogGrid">
                <?php foreach ($posts as $i => $p):
                    $slug = blog_tag_slug(isset($p['tag']) ? $p['tag'] : '');
                    $href = $bp . htmlspecialchars(isset($p['service']) ? $p['service'] : 'services/ai-development.php');
                    $tint = isset($p['tint']) ? $p['tint'] : '#EEF0F8';
                ?>
                <a class="blog-card reveal reveal-up" href="<?php echo $href; ?>" data-tag="<?php echo htmlspecialchars($slug); ?>">
                    <div class="blog-card-media" style="background:<?php echo htmlspecialchars($tint); ?>">
                        <img src="<?php echo blog_img_src($p, $bp, $fallback_img); ?>" alt="" loading="lazy" decoding="async">
                    </div>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <span class="blog-card-date"><?php echo htmlspecialchars(isset($p['date']) ? $p['date'] : ''); ?></span>
                            <span class="blog-card-tag"><?php echo htmlspecialchars(isset($p['tag']) ? $p['tag'] : ''); ?></span>
                        </div>
                        <strong><?php echo htmlspecialchars(isset($p['title']) ? $p['title'] : ''); ?></strong>
                        <p><?php echo htmlspecialchars(isset($p['excerpt']) ? $p['excerpt'] : ''); ?></p>
                        <div class="blog-card-foot">
                            <span class="blog-card-read"><?php echo htmlspecialchars(isset($p['read']) ? $p['read'] : ''); ?></span>
                            <span class="blog-card-cta">Read insight →</span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <p class="blog-empty" id="blogEmpty" hidden>No articles in this category.</p>
        </div>
    </section>

    <section class="section dark-band" id="blog-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo $bp; ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Building something these insights describe?</h2>
                <p>Share what you are evaluating. We respond within one business day with a read on fit and a proposed next step.</p>
                <a href="<?php echo $bp; ?>contact-us.php" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>
</main>

<script>
(function () {
  var filters = document.querySelectorAll('.blog-filter');
  var cards = document.querySelectorAll('.blog-card');
  var empty = document.getElementById('blogEmpty');
  var jumps = document.querySelectorAll('[data-jump-filter]');
  if (!filters.length || !cards.length) return;

  function apply(filter) {
    var visible = 0;
    cards.forEach(function (card) {
      var tag = card.getAttribute('data-tag') || '';
      var show = filter === 'all' || tag === filter;
      card.hidden = !show;
      if (show) visible++;
    });
    if (empty) empty.hidden = visible > 0;
  }

  function activate(filter) {
    filters.forEach(function (b) {
      var active = (b.getAttribute('data-filter') || 'all') === filter;
      b.classList.toggle('is-active', active);
    });
    apply(filter);
  }

  filters.forEach(function (btn) {
    btn.addEventListener('click', function () {
      activate(btn.getAttribute('data-filter') || 'all');
    });
  });

  jumps.forEach(function (el) {
    el.addEventListener('click', function () {
      var filter = el.getAttribute('data-jump-filter') || 'all';
      activate(filter);
    });
  });
})();
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
