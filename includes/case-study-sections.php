<?php
/**
 * Premium enterprise case study page renderer.
 */
require_once __DIR__ . '/case-studies-data.php';
require_once __DIR__ . '/case-study-visuals.php';

if (!function_exists('cs_render_page')) {
    function cs_render_page(array $cs): void
    {
        global $base_path;
        $bp = htmlspecialchars($base_path ?? '/');
        $hero = htmlspecialchars($bp . ltrim($cs['hero_image'], '/'));
        $platform = $cs['platform'] ?? 'web-only';
        $isMobile = $platform === 'mobile';

        $pair = null;
        if (!empty($cs['pair_slug'])) {
            $pair = case_study_get($cs['pair_slug']);
        }

        $related = [];
        foreach ($cs['related'] ?? [] as $slug) {
            $item = case_study_get($slug);
            if ($item) {
                $related[] = $item;
            }
        }
        ?>
<main class="page-case page-case-premium page-case-editorial<?php echo $isMobile ? ' is-mobile-case' : ' is-web-case'; ?>" data-platform="<?php echo htmlspecialchars($platform); ?>">

    <section class="hero cs-hero-band" id="case-hero">
        <div class="hero-orbs" aria-hidden="true">
            <span class="orb orb-1"></span>
            <span class="orb orb-2"></span>
            <span class="orb orb-3"></span>
        </div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="cs-hero-band-bg" aria-hidden="true"></div>
        <div class="container cs-hero-band-inner">
            <div class="cs-hero-copy hero-content reveal reveal-scale">
                <div class="cs-hero-meta">
                    <span class="eyebrow"><?php echo htmlspecialchars($cs['eyebrow']); ?></span>
                    <span class="cs-platform-pill"><?php echo htmlspecialchars($cs['platform_label'] ?? 'Platform'); ?></span>
                </div>
                <p class="cs-industry-badge"><?php echo htmlspecialchars($cs['industry']); ?></p>
                <h1><?php echo htmlspecialchars($cs['title']); ?></h1>
                <p class="cs-hero-tagline"><?php echo htmlspecialchars($cs['tagline']); ?></p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Discuss This Solution</a>
                    <?php if ($pair): ?>
                        <a href="<?php echo route_attr('case-studies/' . $pair['slug']); ?>" class="btn btn-ghost btn-lg">
                            View <?php echo htmlspecialchars($pair['platform_label'] ?? 'Sibling'); ?> →
                        </a>
                    <?php else: ?>
                        <a href="#overview" class="btn btn-ghost btn-lg">Read the full case</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cs-hero-visual reveal reveal-up">
                <div class="cs-hero-frame">
                    <img src="<?php echo $hero; ?>" width="720" height="405" alt="<?php echo htmlspecialchars($cs['title']); ?> illustration" loading="eager">
                </div>
            </div>
        </div>
        <div class="cs-hero-facts">
            <div class="container cs-hero-facts-inner">
                <div><span>Industry</span><strong><?php echo htmlspecialchars($cs['industry']); ?></strong></div>
                <div><span>Engagement</span><strong><?php echo htmlspecialchars($cs['engagement'] ?? $cs['platform_label']); ?></strong></div>
                <div><span>Delivery</span><strong><?php echo htmlspecialchars($cs['duration'] ?? 'Enterprise program'); ?></strong></div>
                <div><span>Team</span><strong><?php echo htmlspecialchars($cs['team'] ?? 'Cross-functional delivery'); ?></strong></div>
            </div>
        </div>
    </section>

    <nav class="svc-subnav cs-subnav-premium" aria-label="On this page">
        <div class="container svc-subnav-inner">
            <a href="#overview">Overview</a>
            <a href="#challenge">Challenge</a>
            <a href="#approach">Approach</a>
            <a href="#solution">Solution</a>
            <a href="#workflow">Workflow</a>
            <a href="#modules">Modules</a>
            <a href="#roles">Roles</a>
            <a href="#screens">Screens</a>
            <a href="#impact">Impact</a>
            <a href="#future">Future</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <?php if (!empty($cs['quote'])): ?>
    <section class="cs-quote-band" aria-label="Project highlight">
        <div class="container">
            <blockquote class="cs-quote reveal reveal-up">
                <p>“<?php echo htmlspecialchars($cs['quote']); ?>”</p>
            </blockquote>
        </div>
    </section>
    <?php endif; ?>

    <section class="section cs-section-overview" id="overview">
        <div class="container">
            <div class="cs-editorial-grid reveal reveal-up">
                <div class="cs-editorial-aside">
                    <span class="eyebrow">Project Overview</span>
                    <h2>The business context</h2>
                    <p class="cs-aside-note">How the engagement started, what was broken, and why a platform investment was required.</p>
                </div>
                <div class="cs-editorial-body">
                    <?php if (!empty($cs['client_context'])): ?>
                        <p class="cs-prose"><?php echo htmlspecialchars($cs['client_context']); ?></p>
                    <?php endif; ?>
                    <p class="cs-prose"><?php echo htmlspecialchars($cs['overview']); ?></p>
                    <?php if (!empty($cs['overview_extra'])): ?>
                        <p class="cs-prose cs-prose-muted"><?php echo htmlspecialchars($cs['overview_extra']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($cs['discovery'])): ?>
                        <div class="cs-callout">
                            <h3>Discovery</h3>
                            <p><?php echo htmlspecialchars($cs['discovery']); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($cs['delivery_highlights'])): ?>
                        <div class="cs-detail-strip cs-detail-strip-left">
                            <?php foreach ($cs['delivery_highlights'] as $h): ?>
                                <div class="cs-detail-chip"><?php echo htmlspecialchars($h); ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="challenge">
        <div class="container">
            <div class="cs-editorial-grid reveal reveal-up">
                <div class="cs-editorial-aside">
                    <span class="eyebrow">Business Challenge</span>
                    <h2>What was holding the operation back</h2>
                </div>
                <div class="cs-editorial-body">
                    <?php if (!empty($cs['challenge_intro'])): ?>
                        <p class="cs-prose"><?php echo htmlspecialchars($cs['challenge_intro']); ?></p>
                    <?php endif; ?>
                    <div class="cs-challenge-grid reveal-stagger">
                        <?php foreach ($cs['challenges'] as $i => $item): ?>
                            <article class="cs-challenge-card reveal reveal-up">
                                <span class="cs-challenge-idx"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                                <p><?php echo htmlspecialchars($item); ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($cs['approach'])): ?>
    <section class="section" id="approach">
        <div class="container">
            <div class="cs-editorial-grid reveal reveal-up">
                <div class="cs-editorial-aside">
                    <span class="eyebrow">Our Approach</span>
                    <h2>How Quantum Infoway delivered</h2>
                    <p class="cs-aside-note">A consulting-led build: discover, design operating model, ship vertical slices, harden for audit.</p>
                </div>
                <div class="cs-editorial-body">
                    <?php if (!empty($cs['solution_intro'])): ?>
                        <p class="cs-prose"><?php echo htmlspecialchars($cs['solution_intro']); ?></p>
                    <?php endif; ?>
                    <ol class="cs-approach-list">
                        <?php foreach ($cs['approach'] as $i => $para): ?>
                            <li>
                                <span><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                                <p><?php echo htmlspecialchars($para); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                    <?php if (!empty($cs['delivery_story'])): ?>
                        <div class="cs-callout cs-callout-violet">
                            <h3>Delivery story</h3>
                            <p><?php echo htmlspecialchars($cs['delivery_story']); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section services-alt" id="solution">
        <div class="container">
            <div class="cs-editorial-grid reveal reveal-up">
                <div class="cs-editorial-aside">
                    <span class="eyebrow">Solution Overview</span>
                    <h2>What we built</h2>
                </div>
                <div class="cs-editorial-body">
                    <p class="cs-prose"><?php echo htmlspecialchars($cs['solution']); ?></p>
                    <?php if (!empty($cs['mobile_apps'])): ?>
                        <div class="cs-app-pills cs-app-pills-left">
                            <?php foreach ($cs['mobile_apps'] as $app): ?>
                                <span><?php echo htmlspecialchars($app); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($cs['security']) || !empty($cs['integrations'])): ?>
                        <div class="cs-two-col">
                            <?php if (!empty($cs['integrations'])): ?>
                                <div class="cs-info-panel">
                                    <h3>Integrations</h3>
                                    <ul>
                                        <?php foreach ($cs['integrations'] as $item): ?>
                                            <li><?php echo htmlspecialchars($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($cs['security'])): ?>
                                <div class="cs-info-panel">
                                    <h3>Security &amp; Governance</h3>
                                    <ul>
                                        <?php foreach ($cs['security'] as $item): ?>
                                            <li><?php echo htmlspecialchars($item); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="workflow">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Business Workflow</span>
                <h2>End-to-end <span class="gradient-text">lifecycle</span></h2>
                <p>Every operational step digitized into a single accountable chain.</p>
            </div>
            <ol class="cs-workflow cs-workflow-premium reveal reveal-up">
                <?php foreach ($cs['workflow'] as $i => $step): ?>
                    <li>
                        <span class="cs-wf-num"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <span class="cs-wf-label"><?php echo htmlspecialchars($step); ?></span>
                    </li>
                <?php endforeach; ?>
            </ol>
            <div class="reveal reveal-up cs-process-wrap">
                <h3 class="cs-screens-label">Process flow diagram</h3>
                <?php cs_render_process_diagram($cs['workflow']); ?>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="modules">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Modules Developed</span>
                <h2>Platform capability <span class="gradient-text">map</span></h2>
            </div>
            <div class="cs-modules cs-modules-premium reveal-stagger">
                <?php foreach ($cs['modules'] as $group => $items): ?>
                    <article class="cs-module-card reveal reveal-up">
                        <h3><?php echo htmlspecialchars($group); ?></h3>
                        <ul>
                            <?php foreach ($items as $item): ?>
                                <li><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" id="roles">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">User Roles &amp; Journeys</span>
                <h2>Who uses the platform — and <span class="gradient-text">how</span></h2>
            </div>
            <div class="cs-roles-grid reveal-stagger">
                <?php foreach ($cs['roles'] as $role): ?>
                    <article class="cs-role-card reveal reveal-up">
                        <h3><?php echo htmlspecialchars($role['name']); ?></h3>
                        <p><?php echo htmlspecialchars($role['desc']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($cs['role_journeys'])): ?>
                <div class="cs-journeys reveal-stagger">
                    <?php foreach ($cs['role_journeys'] as $j): ?>
                        <article class="cs-journey-card reveal reveal-up">
                            <span class="eyebrow"><?php echo htmlspecialchars($j['role']); ?></span>
                            <p><?php echo htmlspecialchars($j['journey']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="reveal reveal-up" style="margin-top:2rem">
                <?php cs_render_role_architecture($cs['roles']); ?>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="screens">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Product Experience</span>
                <h2><?php echo $isMobile ? 'Mobile application' : 'Web &amp; admin'; ?> <span class="gradient-text">screens</span></h2>
                <p>Enterprise UI illustrations representing the operational experience delivered in this engagement.</p>
            </div>

            <?php if (!empty($cs['dashboard_image'])): ?>
                <div class="cs-screens-block reveal reveal-up">
                    <h3 class="cs-screens-label">Web Operations Dashboard</h3>
                    <?php cs_render_image_frame($bp . ltrim($cs['dashboard_image'], '/'), $cs['title'] . ' dashboard', 'web'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($cs['admin_image']) && ($cs['admin_image'] !== ($cs['dashboard_image'] ?? null))): ?>
                <div class="cs-screens-block reveal reveal-up">
                    <h3 class="cs-screens-label">Admin Portal</h3>
                    <?php cs_render_image_frame($bp . ltrim($cs['admin_image'], '/'), $cs['title'] . ' admin portal', 'web'); ?>
                </div>
            <?php elseif (!empty($cs['admin_image']) && empty($cs['dashboard_image'])): ?>
                <div class="cs-screens-block reveal reveal-up">
                    <h3 class="cs-screens-label">Admin Portal</h3>
                    <?php cs_render_image_frame($bp . ltrim($cs['admin_image'], '/'), $cs['title'] . ' admin portal', 'web'); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($cs['mobile_screens_image'])): ?>
                <div class="cs-screens-block reveal reveal-up">
                    <h3 class="cs-screens-label">Mobile Application Screens</h3>
                    <?php cs_render_image_frame($bp . ltrim($cs['mobile_screens_image'], '/'), $cs['title'] . ' mobile screens', 'mobile'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section" id="stack">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Technology Stack</span>
                <h2>Built for <span class="gradient-text">enterprise scale</span></h2>
            </div>
            <div class="cs-stack reveal reveal-up">
                <?php foreach ($cs['tech_stack'] as $tech): ?>
                    <span class="cs-stack-chip"><?php echo htmlspecialchars($tech); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section services-alt cs-impact-section" id="impact">
        <div class="container">
            <div class="cs-editorial-grid reveal reveal-up">
                <div class="cs-editorial-aside">
                    <span class="eyebrow">Business Results</span>
                    <h2>Impact &amp; outcomes</h2>
                </div>
                <div class="cs-editorial-body">
                    <?php if (!empty($cs['outcome_narrative'])): ?>
                        <p class="cs-prose"><?php echo htmlspecialchars($cs['outcome_narrative']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($cs['why_it_matters'])): ?>
                        <p class="cs-prose cs-prose-muted"><?php echo htmlspecialchars($cs['why_it_matters']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="cs-results cs-results-premium reveal-stagger">
                <?php foreach ($cs['results'] as $r): ?>
                    <div class="cs-result-card reveal reveal-up">
                        <strong><?php echo htmlspecialchars($r[0]); ?></strong>
                        <span><?php echo htmlspecialchars($r[1]); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="cs-benefits reveal-stagger" style="margin-top:2rem">
                <?php foreach ($cs['benefits'] as $b): ?>
                    <div class="cs-benefit-item reveal reveal-up">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                        <?php echo htmlspecialchars($b); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="cs-features reveal-stagger" style="margin-top:2.25rem" id="features">
                <?php foreach ($cs['features'] as $f): ?>
                    <article class="cs-feature-card reveal reveal-up">
                        <span class="cs-feature-dot" aria-hidden="true"></span>
                        <h3><?php echo htmlspecialchars($f); ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" id="future">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Future Scope</span>
                <h2>Roadmap beyond <span class="gradient-text">launch</span></h2>
            </div>
            <ol class="cs-future reveal-stagger">
                <?php foreach ($cs['future_scope'] as $i => $item): ?>
                    <li class="reveal reveal-up">
                        <span><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <p><?php echo htmlspecialchars($item); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <?php if ($related): ?>
    <section class="section services-alt" id="related">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Related Solutions</span>
                <h2>Continue exploring <span class="gradient-text">enterprise work</span></h2>
            </div>
            <div class="cs-related reveal-stagger">
                <?php foreach ($related as $rel): ?>
                    <a class="cs-related-card reveal reveal-up" href="<?php echo route_attr('case-studies/' . $rel['slug']); ?>">
                        <img src="<?php echo htmlspecialchars($bp . ltrim($rel['hero_image'], '/')); ?>" alt="" loading="lazy" width="400" height="225">
                        <div>
                            <span class="cs-platform-pill cs-platform-pill-sm"><?php echo htmlspecialchars($rel['platform_label'] ?? ''); ?></span>
                            <span class="eyebrow"><?php echo htmlspecialchars($rel['industry']); ?></span>
                            <h3><?php echo htmlspecialchars($rel['short_title']); ?></h3>
                            <p><?php echo htmlspecialchars($rel['tagline']); ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="section cs-cta-band">
        <div class="container cs-cta-inner reveal reveal-up">
            <div>
                <span class="eyebrow">Next Step</span>
                <h2>Ready to digitize this workflow for your enterprise?</h2>
                <p>Talk with our team about scope, integrations, and a delivery plan tailored to your operations — the same rigor we apply to every enterprise case study engagement.</p>
            </div>
            <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
        </div>
    </section>
</main>
        <?php
    }
}

if (!function_exists('cs_render_hub')) {
    function cs_render_hub(): void
    {
        global $base_path;
        $bp = htmlspecialchars($base_path ?? '/');
        $groups = case_studies_hub_groups();
        ?>
<main class="page-case page-case-hub page-case-premium page-case-editorial">
    <section class="hero cs-hero-band cs-hub-hero-band" id="case-hub-hero">
        <div class="hero-orbs" aria-hidden="true">
            <span class="orb orb-1"></span>
            <span class="orb orb-2"></span>
            <span class="orb orb-3"></span>
        </div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="cs-hero-band-bg" aria-hidden="true"></div>
        <div class="container cs-hero-band-inner cs-hub-hero-inner">
            <div class="cs-hero-copy hero-content reveal reveal-scale">
                <span class="eyebrow">Enterprise Solutions</span>
                <h1>Case studies in <span class="gradient-text">digital operations</span></h1>
                <p class="cs-hero-tagline">Premium web platforms and field mobile apps for dealers, EV infrastructure, finance, and automotive retail — designed for scale, compliance, and measurable outcomes.</p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Start a Conversation</a>
                    <a href="#solutions" class="btn btn-ghost btn-lg">Browse Solutions</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="solutions">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Portfolio</span>
                <h2>Enterprise platforms. Distinct web &amp; mobile stories.</h2>
                <p>Each engagement below is documented as a consulting-grade case study — challenge, approach, solution architecture, and business results.</p>
            </div>
            <div class="cs-hub-grid cs-hub-grid-premium reveal-stagger">
                <?php foreach ($groups as $g): ?>
                    <article class="cs-hub-card cs-hub-card-premium reveal reveal-up">
                        <div class="cs-hub-media">
                            <img src="<?php echo htmlspecialchars($bp . ltrim($g['hero'], '/')); ?>" alt="<?php echo htmlspecialchars($g['title']); ?>" loading="lazy" width="560" height="315">
                            <?php if ($g['web'] && $g['mobile']): ?>
                                <div class="cs-hub-badges">
                                    <span>Web</span><span>Mobile</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="cs-hub-body">
                            <span class="eyebrow"><?php echo htmlspecialchars($g['industry']); ?></span>
                            <h3><?php echo htmlspecialchars($g['title']); ?></h3>
                            <p><?php echo htmlspecialchars($g['tagline']); ?></p>
                            <div class="cs-hub-actions">
                                <?php if ($g['single']): ?>
                                    <a class="btn btn-primary btn-sm" href="<?php echo route_attr('case-studies/' . $g['single']['slug']); ?>">View case study</a>
                                <?php else: ?>
                                    <?php if ($g['web']): ?>
                                        <a class="btn btn-primary btn-sm" href="<?php echo route_attr('case-studies/' . $g['web']['slug']); ?>">Web Platform</a>
                                    <?php endif; ?>
                                    <?php if ($g['mobile']): ?>
                                        <a class="btn btn-ghost btn-sm" href="<?php echo route_attr('case-studies/' . $g['mobile']['slug']); ?>">Mobile Apps</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section cs-cta-band">
        <div class="container cs-cta-inner reveal reveal-up">
            <div>
                <span class="eyebrow">Engage</span>
                <h2>Need a similar platform for your network?</h2>
                <p>We design and ship enterprise workflows with the same rigor as top IT consulting engagements.</p>
            </div>
            <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Contact Us</a>
        </div>
    </section>
</main>
        <?php
    }
}
