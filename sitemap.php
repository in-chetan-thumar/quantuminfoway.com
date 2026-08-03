<?php
$base_path = '';
$page_title = 'Sitemap | Quantum Infoway';
$page_description = 'Browse every Quantum Infoway page — services, hire roles, insights, company, and legal.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);

$sitemap = [
    [
        'id' => 'company',
        'eyebrow' => 'Company',
        'title' => 'Core pages',
        'links' => [
            ['index.php', 'Home'],
            ['about-us.php', 'About Us'],
            ['index.php#portfolio', 'Case Studies'],
            ['index.php#reviews', 'Testimonials'],
            ['blogs.php', 'Blogs & Insights'],
            ['contact-us.php', 'Contact Us'],
            ['services.php', 'All Services'],
            ['hire.php', 'Hire Developers'],
        ],
    ],
    [
        'id' => 'services-ai',
        'eyebrow' => 'Services',
        'title' => 'AI & Machine Learning',
        'links' => [
            ['services/ai-development.php', 'AI Development'],
            ['services/agentic-ai.php', 'Agentic AI'],
            ['services/generative-ai.php', 'Generative AI'],
            ['services/conversational-ai.php', 'Conversational AI'],
            ['services/ai-integration.php', 'AI Integration'],
            ['services/ai-automation.php', 'AI Automation'],
            ['services/claude-code-ai-for-teams.php', 'Claude Code AI for Teams'],
            ['services/ai-powered-qa-testing.php', 'AI-Powered QA & Testing'],
        ],
    ],
    [
        'id' => 'services-eng',
        'eyebrow' => 'Services',
        'title' => 'Engineering & Apps',
        'links' => [
            ['services/custom-software-development.php', 'Custom Software Development'],
            ['services/enterprise-application-development.php', 'Enterprise Application Development'],
            ['services/web-app-development.php', 'Web App Development'],
            ['services/react-development.php', 'React Development'],
            ['services/node-js-development.php', 'Node.js Development'],
            ['services/no-code-development.php', 'No-Code & Low-Code Development'],
            ['services/mvp-development.php', 'MVP Build & Rescue'],
            ['services/xano-development.php', 'Xano Development'],
            ['services/lovable-development.php', 'Lovable Development'],
            ['services/mobile-app-development.php', 'Mobile App Development'],
            ['services/web-mobile-applications.php', 'Web & Mobile Applications'],
            ['services/real-estate-app-development.php', 'Real Estate App Development'],
            ['services/travel-app-development.php', 'Travel App Development'],
            ['services/fintech-app-development.php', 'Fintech App Development'],
            ['services/healthcare-app-development.php', 'Healthcare App Development'],
        ],
    ],
    [
        'id' => 'services-cloud',
        'eyebrow' => 'Services',
        'title' => 'Cloud, Data & Design',
        'links' => [
            ['services/cloud-and-devops.php', 'Cloud & DevOps'],
            ['services/data-analytics-and-science.php', 'Data Analytics & Data Science'],
            ['services/google-workspace.php', 'Google Workspace'],
            ['services/ui-ux-design.php', 'UI/UX Design'],
        ],
    ],
    [
        'id' => 'hire-ai',
        'eyebrow' => 'Hire',
        'title' => 'AI & Analytics',
        'links' => [
            ['hire/ai-engineer.php', 'AI Engineers'],
            ['hire/data-scientist.php', 'Data Scientists'],
            ['hire/chatgpt-developer.php', 'ChatGPT Developers'],
            ['hire/claude-developer.php', 'Claude Developers'],
            ['hire/langchain-developer.php', 'LangChain Developers'],
            ['hire/whisper-developer.php', 'Whisper Developers'],
        ],
    ],
    [
        'id' => 'hire-code',
        'eyebrow' => 'Hire',
        'title' => 'Code Stacks',
        'links' => [
            ['hire/react-developer.php', 'React Developers'],
            ['hire/nextjs-developer.php', 'Next.js Developers'],
            ['hire/angular-developer.php', 'Angular Developers'],
            ['hire/node-js-developer.php', 'Node.js Developers'],
            ['hire/python-developer.php', 'Python Developers'],
            ['hire/laravel-developer.php', 'Laravel Developers'],
            ['hire/java-spring-boot-developer.php', 'Java Spring Boot Developers'],
            ['hire/full-stack-developer.php', 'Full Stack Developers'],
            ['hire/flutter-developer.php', 'Flutter Developers'],
            ['hire/kotlin-android-developer.php', 'Kotlin Android Developers'],
            ['hire/swift-ios-developer.php', 'Swift iOS Developers'],
            ['hire/shopify-developer.php', 'Shopify Developers'],
            ['hire/wordpress-developer.php', 'WordPress Developers'],
            ['hire/supabase-developer.php', 'Supabase Developers'],
        ],
    ],
    [
        'id' => 'hire-nocode',
        'eyebrow' => 'Hire',
        'title' => 'No-Code & Low-Code',
        'links' => [
            ['hire/webflow-developer.php', 'Webflow Developers'],
            ['hire/weweb-developer.php', 'WeWeb Developers'],
            ['hire/xano-developer.php', 'Xano Developers'],
            ['hire/bubble-developer.php', 'Bubble Developers'],
            ['hire/flutterflow-developer.php', 'FlutterFlow Developers'],
            ['hire/lovable-developer.php', 'Lovable Developers'],
        ],
    ],
    [
        'id' => 'hire-cloud',
        'eyebrow' => 'Hire',
        'title' => 'Managed Cloud & DevOps',
        'links' => [
            ['hire/aws-developer.php', 'AWS Developers'],
            ['hire/azure-developer.php', 'Azure Developers'],
            ['hire/gcp-developer.php', 'Google Cloud Developers'],
            ['hire/devops-engineer.php', 'DevOps Engineers'],
        ],
    ],
    [
        'id' => 'legal',
        'eyebrow' => 'Legal',
        'title' => 'Policies',
        'links' => [
            ['privacy-policy.php', 'Privacy Policy'],
            ['terms-and-conditions.php', 'Terms & Conditions'],
            ['sitemap.php', 'Sitemap'],
        ],
    ],
];

$total = 0;
foreach ($sitemap as $g) {
    $total += count($g['links']);
}
?>

<main class="page-service page-directory page-sitemap page-legal-premium">
    <section class="hero service-hero has-media" id="sitemap-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">Site map</span>
                <h1>Find every <span class="gradient-text">Quantum Infoway</span> page</h1>
                <p>A complete index of company pages, services, hire roles, insights, and legal documents.</p>
                <div class="hero-actions">
                    <a href="#sitemap-index" class="btn btn-primary btn-lg">Browse index</a>
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-ghost btn-lg">Contact Us</a>
                </div>
                <div class="hero-trust-pills" aria-label="Sitemap stats">
                    <span><?php echo (int) $total; ?> links</span>
                    <span><?php echo count($sitemap); ?> sections</span>
                    <span>Services · Hire · Legal</span>
                </div>
            </div>
            <div class="svc-hero-media legal-hero-panel reveal reveal-up" aria-hidden="true">
                <div class="legal-hero-card">
                    <span class="legal-hero-card-label">Jump to</span>
                    <ul>
                        <li><a href="#company">Company</a></li>
                        <li><a href="#services-ai">Services</a></li>
                        <li><a href="#hire-ai">Hire roles</a></li>
                        <li><a href="#legal">Legal</a></li>
                    </ul>
                    <a href="<?php echo route_attr('services'); ?>">View all services →</a>
                </div>
            </div>
        </div>
    </section>

    <nav class="svc-subnav" aria-label="Sitemap sections">
        <div class="container svc-subnav-inner">
            <a href="#company">Company</a>
            <a href="#services-ai">Services</a>
            <a href="#hire-ai">Hire</a>
            <a href="#legal">Legal</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <section class="section" id="sitemap-index">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Full index</span>
                <h2>Everything on the <span class="gradient-text">site</span></h2>
                <p>Organised by company, services, hire talent, and legal pages.</p>
            </div>

            <div class="sitemap-grid">
                <?php foreach ($sitemap as $group): ?>
                <section class="sitemap-group reveal reveal-up" id="<?php echo htmlspecialchars($group['id']); ?>">
                    <div class="sitemap-group-head">
                        <span class="eyebrow"><?php echo htmlspecialchars($group['eyebrow']); ?></span>
                        <h3><?php echo htmlspecialchars($group['title']); ?></h3>
                    </div>
                    <ul class="sitemap-list">
                        <?php foreach ($group['links'] as $link): ?>
                        <li>
                            <a href="<?php echo route_attr($link[0]); ?>">
                                <span><?php echo htmlspecialchars($link[1]); ?></span>
                                <em aria-hidden="true">→</em>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section dark-band" id="sitemap-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Cannot find what you need?</h2>
                <p>Tell us what you are evaluating. We respond within one business day.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
