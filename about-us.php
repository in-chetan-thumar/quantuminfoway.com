<?php
$base_path = '';
$page_title = 'About Us | Quantum Infoway — AI-Native Software Partner';
$page_description = 'Meet the team behind 250+ products shipped across 10+ countries. Quantum Infoway is an AI-native software partner building web, mobile, and AI systems since 2020.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);
$ai = $bp . 'assets/images/about/';
$si = $bp . 'assets/images/services/';

$proof = [
    [
        'img' => 'case-studies__highlands-brain__redesign__solution-mockup.webp',
        'name' => 'Highlands Community Charter',
        'metric' => '15,000+',
        'label' => 'Students served',
        'blurb' => 'Students served by the unified web and mobile learning platform we built for one of the largest charter school operators in California.',
    ],
    [
        'img' => 'case-studies__abc-carpet-home__redesign__hero-1.webp',
        'name' => 'ABC Carpet & Home',
        'metric' => '+25%',
        'label' => 'Sales lift',
        'blurb' => 'Sales lift for the New York luxury home and design retailer after we rebuilt commerce as a progressive web app across 200,000+ SKUs.',
    ],
    [
        'img' => 'case-studies__stay-vista__redesign__hero-1.webp',
        'name' => 'StayVista',
        'metric' => '1,000+',
        'label' => 'Properties',
        'blurb' => 'Properties across 80+ destinations on the vacation rental platform we took from prototype to a 50% lift in booking capacity.',
    ],
    [
        'img' => 'case-studies__deep-meditate__redesign__app-01.webp',
        'name' => 'Deep Meditate',
        'metric' => '500K+',
        'label' => 'Downloads',
        'blurb' => 'Downloads at a 4.8 star rating for the meditation app we built with native Swift and Kotlin.',
    ],
];

$journey = [
    ['2020', 'Founded in Ahmedabad', 'Quantum Infoway was founded in Ahmedabad in 2020. The first work was websites and web applications for clients.'],
    ['2022', 'Mobile development', 'We started building mobile apps alongside the web work, for products that needed an iOS or Android experience.'],
    ['2024', 'Shopify Partner', 'Quantum Infoway became a Shopify Partner, building stores, themes, and commerce work for clients.'],
    ['2026', 'Web, mobile, and AI', 'Six years on, the same company ships websites, web apps, mobile products, and AI features, with one team from first scope through launch.'],
];

$process = [
    ['01', 'Discover and scope', 'We start with your goals and constraints and return a scoped estimate within days, on fixed scope or retainer terms.'],
    ['02', 'Design and build', 'Senior engineers and designers ship in weekly increments, with AI-assisted development and reviews raising quality and speed.'],
    ['03', 'Launch', 'Products go live under our security and quality practices, with delivery measured in weeks.'],
    ['04', 'Operate and improve', 'We stay accountable after launch, running support, measuring outcomes, and building against your current priorities.'],
];

$leaders = [
    [
        'img' => 'team-avatar.png',
        'name' => 'Chetan',
        'role' => 'CEO & Director',
        'bio' => 'Chetan leads Quantum Infoway as CEO & Director, setting product direction and partnering with founders and engineering leaders to ship AI-native software that scales across markets.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Bipin',
        'role' => 'Business Development',
        'bio' => 'Bipin leads business development for new leads, working with founders and product leaders on the first conversation and how an engagement starts.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Abhishek',
        'role' => 'Senior Full Stack Developer & AI Expert',
        'bio' => 'Abhishek builds end-to-end web products and AI features, from architecture through launch, with a focus on clean APIs, modern frontends, and production-ready LLM integrations.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Vishal',
        'role' => 'Senior Full Stack Developer & AI Expert',
        'bio' => 'Vishal designs and ships full stack applications with AI capabilities, owning delivery across the stack so teams get reliable, maintainable products on aggressive timelines.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Hardik',
        'role' => 'QA & AI Expert',
        'bio' => 'Hardik owns quality across releases, combining rigorous test strategy with AI-assisted validation so products ship stable, secure, and ready for real users.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Nihar',
        'role' => 'Senior Full Stack Developer & AI Expert',
        'bio' => 'Nihar delivers senior full stack engineering with AI expertise, building scalable backends and polished interfaces that turn complex requirements into shipped software.',
    ],
    [
        'img' => 'team-avatar.png',
        'name' => 'Amit',
        'role' => 'Mobile App Developer',
        'bio' => 'Amit builds native and cross-platform mobile apps focused on performance, smooth UX, and reliable release pipelines from prototype through store launch.',
    ],
];

$partners = [
    ['partner-shopify.svg', 'Shopify Partner'],
    ['partner-hostinger.svg', 'Hostinger Partner'],
];
?>

<main class="page-service page-hire page-directory page-about">
    <section class="hero service-hero" id="about-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">About Quantum Infoway</span>
                <h1>We build and scale custom <span class="gradient-text">digital products</span></h1>
                <p>Quantum Infoway is an AI-native software development company headquartered in Ahmedabad, founded in 2020, serving clients in 10+ countries including the United States. We combine the speed of visual development, the depth of traditional engineering, and the power of AI to ship modern, maintainable products, from rapid MVPs to enterprise-grade systems.</p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
                    <a href="#proof" class="btn btn-ghost btn-lg">See proof</a>
                </div>
                <div class="hero-trust-pills" aria-label="Company highlights">
                    <span>Trusted by customers</span>
                    <span>250+ products delivered</span>
                    <span>10+ countries served</span>
                </div>
            </div>
        </div>
    </section>

    <div class="about-clients">
        <?php
        require_once __DIR__ . '/includes/client-logos.php';
        render_client_logo_marquee();
        ?>
    </div>

    <section class="section about-stats-band" id="about-stats">
        <div class="container">
            <div class="about-stats reveal reveal-up">
                <div class="about-stat"><strong>6+</strong><span>Years of Experience</span></div>
                <div class="about-stat"><strong>250+</strong><span>Products Delivered</span></div>
                <div class="about-stat"><strong>10+</strong><span>Countries Served</span></div>
                <div class="about-stat"><strong>150+</strong><span>Happy Clients</span></div>
            </div>
        </div>
    </section>

    <nav class="svc-subnav" aria-label="On this page">
        <div class="container svc-subnav-inner">
            <a href="#proof">Proof</a>
            <a href="#journey">Journey</a>
            <a href="#vision">Vision</a>
            <a href="#how-we-work">How we work</a>
            <a href="#leadership">Leadership</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <section class="section" id="proof">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Proof</span>
                <h2>Results you can <span class="gradient-text">verify</span></h2>
                <p>Every number below is published in a full case study, one click away.</p>
            </div>
            <div class="about-proof-grid">
                <?php foreach ($proof as $p): ?>
                <a class="about-proof-card reveal reveal-up" href="<?php echo route_attr('#portfolio'); ?>">
                    <div class="about-proof-media">
                        <img src="<?php echo $si . htmlspecialchars($p['img']); ?>" alt="" loading="lazy">
                    </div>
                    <div class="about-proof-body">
                        <span class="about-proof-name"><?php echo htmlspecialchars($p['name']); ?></span>
                        <strong class="about-proof-metric"><?php echo htmlspecialchars($p['metric']); ?></strong>
                        <span class="about-proof-label"><?php echo htmlspecialchars($p['label']); ?></span>
                        <p><?php echo htmlspecialchars($p['blurb']); ?></p>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="journey">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Our journey</span>
                <h2>Shipping software since <span class="gradient-text">2020</span></h2>
            </div>
            <div class="about-timeline reveal reveal-up">
                <?php foreach ($journey as $j): ?>
                <article class="about-timeline-item">
                    <span class="about-timeline-year"><?php echo htmlspecialchars($j[0]); ?></span>
                    <div>
                        <h3><?php echo htmlspecialchars($j[1]); ?></h3>
                        <p><?php echo htmlspecialchars($j[2]); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" id="vision">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Valued by clients worldwide</span>
                <h2>Vision &amp; <span class="gradient-text">mission</span></h2>
            </div>
            <div class="about-vm-grid">
                <article class="about-vm-card reveal reveal-up">
                    <span class="eyebrow">Vision</span>
                    <ul class="about-check-list">
                        <li>Make AI-native development the default for ambitious teams, so every product ships with intelligence built in.</li>
                        <li>Prove that an Ahmedabad engineering hub can be the best product partner for companies anywhere in the world.</li>
                    </ul>
                </article>
                <article class="about-vm-card reveal reveal-up">
                    <span class="eyebrow">Mission</span>
                    <ul class="about-check-list">
                        <li>Design, build, and scale digital products that deliver measurable outcomes for the businesses that run on them.</li>
                        <li>Give every client senior engineers, honest scoped estimates, and delivery measured in weeks, not quarters.</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="how-we-work">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">How we work</span>
                <h2>One accountable team from idea to <span class="gradient-text">operations</span></h2>
            </div>
            <div class="about-process-grid">
                <?php foreach ($process as $step): ?>
                <article class="about-process-card reveal reveal-up">
                    <span class="about-process-num"><?php echo htmlspecialchars($step[0]); ?></span>
                    <h3><?php echo htmlspecialchars($step[1]); ?></h3>
                    <p><?php echo htmlspecialchars($step[2]); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="leadership">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Leadership</span>
                <h2>The people accountable to <span class="gradient-text">you</span></h2>
            </div>
            <div class="about-leaders-grid">
                <?php foreach ($leaders as $i => $person): ?>
                <article class="about-leader-card<?php echo $i === 0 ? ' about-leader-card--lead' : ''; ?> reveal reveal-up">
                    <div class="about-leader-photo">
                        <img src="<?php echo $ai . htmlspecialchars($person['img']); ?>" alt="<?php echo htmlspecialchars($person['name']); ?>" loading="lazy" width="112" height="112">
                    </div>
                    <div class="about-leader-body">
                        <h3><?php echo htmlspecialchars($person['name']); ?></h3>
                        <span class="about-leader-role"><?php echo htmlspecialchars($person['role']); ?></span>
                        <p><?php echo htmlspecialchars($person['bio']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" id="partners">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Partnerships</span>
                <h2>Platforms we <span class="gradient-text">partner with</span></h2>
            </div>
            <div class="about-certs reveal reveal-up">
                <?php foreach ($partners as $c): ?>
                <div class="about-cert">
                    <img src="<?php echo $ai . htmlspecialchars($c[0]); ?>" alt="<?php echo htmlspecialchars($c[1]); ?>" loading="lazy">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="quote">
        <div class="container">
            <div class="about-quote reveal reveal-up">
                <img class="about-quote-avatar" src="<?php echo $ai; ?>team-avatar.png" alt="Chetan Thumar" loading="lazy">
                <blockquote>
                    <p>At Quantum Infoway, we build fast, intelligent, and scalable digital products that make a real impact. Whether you are looking to accelerate your roadmap, unlock new capabilities with AI, or deploy at scale, we are here to help.</p>
                    <footer>
                        <strong>Chetan Thumar</strong>
                        <span>CEO &amp; Director, Quantum Infoway</span>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>

    <section class="section dark-band" id="about-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Let&rsquo;s build the next big thing</h2>
                <p>Fill in the form or talk to our team to map out a path to success.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
