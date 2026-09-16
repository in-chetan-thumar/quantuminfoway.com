<?php
$base_path = '';
$page_title = 'Hire Developers | Quantum Infoway — AI-Native Talent Across 30 Stacks';
$page_description = 'Hire top AI-native developers across 30 stacks. Pre-vetted engineers at $25–$50/hour all-in, with a 30-day replacement guarantee.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);
$si = $bp . 'assets/images/services/';
$hire_tech = 'Developer';
$dir_icons = [
    'icons__Robot.webp',
    'icons__Sparkle.webp',
    'icons__TreeStructure.webp',
    'icons__Chats.webp',
    'icons__Link.webp',
    'icons__RocketLaunch.webp',
    'icons__Browsers.webp',
    'icons__DeviceMobile.webp',
    'icons__CloudCheck.webp',
    'icons__TrendUp.webp',
    'icons__ShieldCheck.webp',
    'icons__CodeBlock.webp',
];
$dir_ico_i = 0;

$hire_groups = [
    [
        'eyebrow' => 'AI & Analytics',
        'title' => 'Hire AI engineers and data <span class="gradient-text">scientists</span>',
        'lead' => 'From foundation models to RAG pipelines and analytics: engineers who ship production AI systems, not demos.',
        'cards' => [
            ['hire/ai-engineer.php', 'AI Engineers', 'Production ML engineers: RAG, agents, fine-tuning, evals. Ship LLM systems that scale safely.'],
            ['hire/data-scientist.php', 'Data Scientists', 'Statisticians and ML practitioners who turn raw data into decisions, dashboards, and predictive models.'],
            ['hire/chatgpt-developer.php', 'ChatGPT Developers', 'OpenAI specialists building chatbots, copilots, and automations on GPT-4/o-series models.'],
            ['hire/claude-developer.php', 'Claude Developers', 'Anthropic Claude specialists: agents, document workflows, and computer-use applications on Claude models.'],
            ['hire/langchain-developer.php', 'LangChain Developers', 'LangChain and LangGraph engineers building multi-step AI workflows, RAG, and agentic systems.'],
            ['hire/whisper-developer.php', 'Whisper Developers', 'Voice AI engineers building transcription, voice agents, and audio workflows on OpenAI Whisper.'],
        ],
    ],
    [
        'eyebrow' => 'Code Stacks',
        'title' => 'Hire developers across modern <span class="gradient-text">stacks</span>',
        'lead' => 'Full-stack engineers fluent in the frameworks that ship today: from React and Next.js to Python, Laravel, and native mobile.',
        'cards' => [
            ['hire/react-developer.php', 'React Developers', 'Interfaces at scale: React, TypeScript, design systems, and Playwright testing as standard.'],
            ['hire/nextjs-developer.php', 'Next.js Developers', 'Fast, SEO-ready Next.js apps: App Router, RSC, ISR, and edge functions for production performance.'],
            ['hire/angular-developer.php', 'Angular Developers', 'Enterprise web applications on Angular: strong typing, RxJS, and component-driven architecture.'],
            ['hire/node-js-developer.php', 'Node.js Developers', 'Backend APIs and microservices: Express, NestJS, Fastify. Type-safe TypeScript with observability built in.'],
            ['hire/python-developer.php', 'Python Developers', 'Backend, AI, and data engineers: FastAPI, Django, Pandas, and AI/ML stacks. Production-grade Python at scale.'],
            ['hire/laravel-developer.php', 'Laravel Developers', 'Reliable PHP applications on Laravel: queues, jobs, broadcasting, and Filament admin panels.'],
            ['hire/java-spring-boot-developer.php', 'Java Spring Boot Developers', 'Enterprise-grade Java engineers: Spring Boot, microservices, Kafka, and JPA. Built for scale.'],
            ['hire/full-stack-developer.php', 'Full Stack Developers', 'End-to-end engineers: frontend, backend, database, infra. One engineer, the whole product.'],
            ['hire/flutter-developer.php', 'Flutter Developers', 'Cross-platform mobile and web apps from a single codebase: Dart, Riverpod, and pixel-perfect UI.'],
            ['hire/kotlin-android-developer.php', 'Kotlin Android Developers', 'Native Android engineers: Kotlin, Jetpack Compose, Coroutines, and Material 3 design.'],
            ['hire/swift-ios-developer.php', 'Swift iOS Developers', 'Native iOS engineers: Swift, SwiftUI, async/await, and App Store-ready performance and polish.'],
            ['hire/shopify-developer.php', 'Shopify Developers', 'Stores that convert: Liquid, Hydrogen, custom themes, and Shopify Plus migrations.'],
            ['hire/wordpress-developer.php', 'WordPress Developers', 'Custom themes, plugins, headless setups, and WooCommerce: engineers who treat WordPress as code.'],
            ['hire/supabase-developer.php', 'Supabase Developers', 'Modern backend on Supabase (Postgres, RLS, Edge Functions, and realtime), wired up cleanly.'],
        ],
    ],
    [
        'eyebrow' => 'No-Code & Low-Code',
        'title' => 'Hire no-code <span class="gradient-text">specialists</span>',
        'lead' => 'Build production apps without traditional code: engineers fluent in the no-code stacks that move faster.',
        'cards' => [
            ['hire/webflow-developer.php', 'Webflow Developers', 'Sites that convert: pixel-perfect Webflow builds with CMS, animations, and SEO baked in.'],
            ['hire/weweb-developer.php', 'WeWeb Developers', 'No-code frontend on WeWeb: wired to Xano, Supabase, or any REST/GraphQL API for full-stack speed.'],
            ['hire/xano-developer.php', 'Xano Developers', 'No-code backend on Xano: APIs, business logic, auth, and integrations without writing a server.'],
            ['hire/bubble-developer.php', 'Bubble Developers', 'No-code full-stack on Bubble: internal tools, MVPs, and SaaS apps shipped in weeks.'],
            ['hire/flutterflow-developer.php', 'FlutterFlow Developers', 'Fast mobile apps on FlutterFlow: visual builder with Flutter under the hood, deployed to iOS and Android.'],
            ['hire/lovable-developer.php', 'Lovable Developers', 'AI-native full-stack on Lovable: prompt-to-production apps with React, Vite, and Supabase wiring.'],
        ],
    ],
    [
        'eyebrow' => 'Managed Cloud & DevOps',
        'title' => 'Hire cloud and DevOps <span class="gradient-text">engineers</span>',
        'lead' => 'Infrastructure that scales, observability that catches issues before users do, and CI/CD that ships safely.',
        'cards' => [
            ['hire/aws-developer.php', 'AWS Developers', 'Scalable cloud engineers: ECS, Lambda, RDS, S3, and CloudFront. Cost-aware, secure by default.'],
            ['hire/azure-developer.php', 'Azure Developers', 'Enterprise cloud on Azure: App Service, Functions, AKS, Cosmos DB. Identity, governance, and compliance.'],
            ['hire/gcp-developer.php', 'Google Cloud Developers', 'Modern infrastructure on GCP: Cloud Run, BigQuery, Vertex AI, Firebase. AI-ready and analytics-ready.'],
            ['hire/devops-engineer.php', 'DevOps Engineers', 'Reliable infra: Terraform, Kubernetes, GitHub Actions, observability, and on-call setup. SRE practices, day one.'],
        ],
    ],
];

$compare_rows = [
    ['Time to start', 'From posting the requirement to engineer working', '8 to 12 weeks (you source, interview, offer, notice period)', '2 to 4 weeks (you post, vet, interview, contract)', 'Up to 2 weeks'],
    ['Speed to assign', 'From brief to engineer named for your team', '4 to 8 weeks (you source)', '24 to 72 hours shortlist (anonymous)', 'Same week from existing team'],
    ['Quality consistency', 'How predictable the engineer’s skill level is', 'You set the bar', 'Variable, marketplace-driven', 'Proven in-house team, same engineers across engagements'],
    ['Communication and English', 'How the engineer reads, writes, and runs meetings', 'Local language native', 'Variable, no minimum standard', 'C1 English minimum, screened in interview'],
    ['Security and compliance', 'NDAs and audit readiness', 'Your standards apply (you implement and audit)', 'Platform NDA, varies by freelancer', 'GDPR-aligned, company NDA + engineer confidentiality agreements'],
    ['Replacement if not a fit', 'How quickly we swap an engineer if the match is wrong', 'Months (re-recruit + re-onboard)', '1 to 2 weeks (re-hire from platform)', 'Within 30 days (replacement guarantee)'],
    ['Base hourly rate', 'The headline rate you see advertised', '$115 to $160 per hour', '$60 to $200 per hour', '$25 to $50 per hour'],
    ['Hidden costs and add-ons', 'What gets added on top of the headline rate', 'Recruiter fee (15 to 30% of first-year salary), benefits, payroll tax, equipment, office and infra', 'Platform fees (5 to 10%), deposits, contract initiation fees, currency conversion spreads', 'None. The rate above is your final, all-in cost'],
    ['IP and source code ownership', '', '100% yours', 'Depends on platform terms', '100% yours, signed in master agreement'],
    ['Long-term commitment', '', 'Full-time only', 'Project-only, churn risk', 'Monthly invoicing, 3-month initial engagement, scale freely after'],
    ['Time-zone matching', '', 'Limited to local market', 'Global lottery', '4 to 6 hours overlap with US and EU'],
];

$included = [
    'Pre-vetted engineer — live coding + system design + background verification passed.',
    'Engagement manager — single point of contact for HR, perf reviews, scheduling.',
    'Equipment + workspace — provisioned day one.',
    'Security + IP transfer — 100% IP and source-code ownership to you on contract signing.',
    '30-day replacement guarantee — if the engineer is not the right fit, we replace them at no extra cost.',
    'Compliance + payroll — we employ the engineer, you get the work.',
    'Standard tooling — engineer arrives onboarded into your existing stack.',
];

$not_charged = [
    'Recruiting or placement fees',
    'Setup or onboarding fees',
    'Equipment or laptop fees',
    'Background check fees',
    'Payroll, tax, or compliance overhead',
    'Severance if you scale down',
    'Visa or relocation costs',
    'Recurring platform or subscription fees',
];

$tz_rows = [
    ['United States (coast to coast)', 'EST–PST · UTC-5 to -8', '4h overlap'],
    ['UK', 'GMT/BST · UTC+0/+1', '5h overlap'],
    ['Western Europe', 'CET/CEST · UTC+1/+2', '5–6h overlap'],
    ['UAE & Middle East', 'GST · UTC+4', '7–8h overlap'],
    ['Singapore & Southeast Asia', 'SGT · UTC+8', '6h overlap'],
    ['Australia (East)', 'AEST/AEDT · UTC+10/+11', '4h overlap'],
];

$faqs = [
    ['How fast can a Quantum Infoway engineer start working with our team?', 'Up to 2 weeks from signed agreement. Engineers from our existing team can typically be assigned the same week. For niche stacks or seniorities where we do not have an immediate match, we may need 2 to 4 weeks to onboard a new hire who passes our four-stage vetting funnel.'],
    ['What does "pre-vetted" actually mean at Quantum Infoway?', 'Every Quantum Infoway engineer is a full-time employee who passed our multi-stage hiring funnel: an initial filter for stack, experience, and English; a recruiter screen for communication and motivation; a 90-minute live coding plus system-design interview; and a third-party background verification covering employment, education, and identity. Less than 1% of applicants make it onto the team. You are not getting an anonymous marketplace freelancer. You are getting our employee.'],
    ['How is the engineer integrated into our team?', 'We follow your team\'s existing process. Your standups, your code review workflow, your project tools (Jira, Linear, GitHub). The engineer reports to your tech lead day-to-day and is supported by a Quantum Infoway engagement manager who handles HR, performance reviews, and contract issues in the background.'],
    ['What happens if the engineer is not the right fit?', 'We offer a 30-day replacement guarantee. If the engineer is not the right fit for skills, communication, or culture, we replace them at no additional cost. Beyond 30 days, we still work with you on replacements through the engagement manager, scoped case-by-case.'],
    ['Is there a minimum engagement length?', 'Yes. We require a 3-month initial engagement so the engineer has time to onboard into your codebase, ship meaningful work, and prove fit. After 3 months, billing continues monthly and you can scale the team up or down freely.'],
    ['How does pricing compare to hiring direct or using a freelance platform?', 'Quantum Infoway rates run $25 to $50 per hour, all-in, depending on seniority and stack. By comparison, a US senior engineer costs $115 to $160 per hour fully loaded, and freelance platforms typically charge $60 to $200 per hour plus platform fees. The Quantum Infoway rate is your final rate.'],
    ['Can we hire multiple developers across different stacks?', 'Yes. Most Quantum Infoway engagements involve 2 to 8 engineers across complementary stacks. We co-design the team composition with you based on the project, then assign engineers from our existing team.'],
    ['What time zones do your engineers work in?', 'All engineers are based in India (IST · UTC+5:30). Our office runs 9:00 am to 8:00 pm IST, and engineers flex their hours to cover your shift. We aim for at least 4 hours of real-time overlap with every client.'],
    ['How do you protect our IP and source code?', 'Every engagement assigns 100% IP and source-code ownership to the customer on signing of the master agreement. Code is developed in customer-owned repositories where possible. Every engineer has signed a confidentiality agreement with Quantum Infoway.'],
    ['What security and compliance practices does Quantum Infoway follow?', 'Quantum Infoway follows GDPR-aligned practices and ISMS-style policies covering access control, data classification, and incident response. Every engineer has signed a confidentiality agreement with Quantum Infoway, and we provide audit-ready documentation for enterprise procurement teams.'],
    ['Do you offer a free trial of an engineer?', 'No. We do not offer a free trial period. Instead we offer a 30-day replacement guarantee: if the engineer is not the right fit in the first 30 days, we replace them at no additional cost.'],
    ['How are you different from other staff-augmentation vendors?', 'Three differences buyers tell us matter most: (1) Transparent hourly pricing published on this page. (2) Engineers are full-time Quantum Infoway employees, not a marketplace bench. (3) The Quantum Infoway rate is all-in — no platform fees, deposits, or recruiter fees.'],
];
?>

<main class="page-service page-hire page-directory">
    <section class="hero service-hero has-media" id="service-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">Hire AI-Native Developers</span>
                <h1>Hire top 1% AI-native developers across <span class="gradient-text">30 stacks</span></h1>
                <p>Skip the recruiting funnel. Pre-vetted developers and engineers fluent in AI-native workflows (Claude Code, agentic systems, RAG), across web, mobile, no-code, and cloud. Less than 1% of applicants make our team. $25–$50/hour all-in, with a 30-day replacement guarantee.</p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
                    <a href="#role-directory" class="btn btn-ghost btn-lg">Browse Roles</a>
                </div>
                <div class="hero-trust-pills" aria-label="Delivery highlights">
                    <span>Start within 2 weeks</span>
                    <span>$25–$50 / hour all-in</span>
                    <span>30-day replacement guarantee</span>
                </div>
                <div class="contact-hero-stats reveal reveal-up">
                    <div class="chs-item"><strong>150+</strong><span>Happy Clients</span></div>
                    <div class="chs-item"><strong>12+</strong><span>Years Delivery</span></div>
                    <div class="chs-item"><strong>10+</strong><span>Countries Served</span></div>
                    <div class="chs-item"><strong>24h</strong><span>Response Window</span></div>
                </div>
            </div>
            <div class="svc-hero-media reveal reveal-up" aria-hidden="true">
                <img src="<?php echo $si; ?>case-studies__fleet-management-platform__mockup.webp" width="560" height="420" alt="Hire Quantum Infoway developers">
            </div>
        </div>
    </section>

    <div class="svc-showcase" aria-hidden="true">
        <div class="svc-showcase-track">
            <?php
            $show = [
                'case-studies__highlands-brain__redesign__solution-mockup.webp',
                'case-studies__ai-chat-platform-consumer-wellness__mockup.webp',
                'case-studies__stay-vista__stay-vista.webp',
                'case-studies__fleet-management-platform__mockup.webp',
                'case-studies__franchiselab__mockup.webp',
                'case-studies__digital-wealth-onboarding__mockup.webp',
            ];
            $colors = ['#E8F5BD', '#FFF6C0', '#BDE8F5'];
            foreach (array_merge($show, $show) as $i => $img):
            ?>
            <div class="svc-show-card" style="background:<?php echo $colors[$i % 3]; ?>"><img src="<?php echo $si . $img; ?>" alt=""></div>
            <?php endforeach; ?>
        </div>
    </div>

    <nav class="svc-subnav" aria-label="On this page">
        <div class="container svc-subnav-inner">
            <a href="#compare">Compare</a>
            <a href="#vetting">Vetting</a>
            <a href="#role-directory">All Roles</a>
            <a href="#pricing">Pricing</a>
            <a href="#timezones">Time Zones</a>
            <a href="#faq">FAQ</a>
            <a href="#join-our-team">Join Our Team</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <section class="section services-alt" id="compare">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Compare Hiring Options</span>
                <h2>How Quantum Infoway compares to your other <span class="gradient-text">hiring options</span></h2>
                <p>Same senior engineer seat, three hiring models — compared across time-to-start, rate, hidden costs, replacement, and IP ownership.</p>
            </div>
            <div class="hire-compare-wrap reveal reveal-up">
                <table class="hire-compare">
                    <thead>
                        <tr>
                            <th scope="col">Dimension</th>
                            <th scope="col">Hire Direct (FTE)</th>
                            <th scope="col">Freelance Platform</th>
                            <th scope="col">Quantum Infoway</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compare_rows as $row): ?>
                        <tr>
                            <th scope="row">
                                <?php echo htmlspecialchars($row[0]); ?>
                                <?php if ($row[1] !== ''): ?><span class="hire-compare-note"><?php echo htmlspecialchars($row[1]); ?></span><?php endif; ?>
                            </th>
                            <td><?php echo htmlspecialchars($row[2]); ?></td>
                            <td><?php echo htmlspecialchars($row[3]); ?></td>
                            <td class="hire-compare-qi"><?php echo htmlspecialchars($row[4]); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php require __DIR__ . '/includes/hire-vetting.php'; ?>

    <section class="section services-alt" id="role-directory">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">30 roles. One roster.</span>
                <h2>Pick a stack, or talk to us and we will architect the right <span class="gradient-text">team</span></h2>
            </div>

            <?php foreach ($hire_groups as $g): ?>
            <div class="dir-group reveal reveal-up">
                <div class="dir-group-head">
                    <span class="eyebrow"><?php echo htmlspecialchars($g['eyebrow']); ?></span>
                    <h3><?php echo $g['title']; ?></h3>
                    <p><?php echo htmlspecialchars($g['lead']); ?></p>
                </div>
                <div class="dir-grid reveal-stagger">
                    <?php foreach ($g['cards'] as $ci => $c):
                        $ico = $dir_icons[$dir_ico_i % count($dir_icons)];
                        $dir_ico_i++;
                        $idx = str_pad((string) ($ci + 1), 2, '0', STR_PAD_LEFT);
                    ?>
                    <a class="dir-card reveal reveal-up" href="<?php echo route_attr($c[0]); ?>">
                        <div class="dir-card-top">
                            <span class="dir-card-ico"><img src="<?php echo $si . $ico; ?>" alt=""></span>
                            <span class="dir-card-index"><?php echo $idx; ?></span>
                        </div>
                        <strong><?php echo htmlspecialchars($c[1]); ?></strong>
                        <p><?php echo htmlspecialchars($c[2]); ?></p>
                        <span class="dir-card-cta">Explore →</span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section" id="pricing">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Pricing</span>
                <h2>Transparent rates. No hidden <span class="gradient-text">margins</span></h2>
                <p>One published hourly band covers junior through senior. Tech leads and specialised AI/ML roles are quoted custom above the band.</p>
            </div>
            <div class="hire-pricing-hero reveal reveal-up">
                <strong>$25 – $50 / hour</strong>
                <span>Depending on experience and stack rarity · all-in · no setup fees · no recruiter markup</span>
            </div>
            <div class="hire-tier-grid reveal-stagger">
                <article class="hire-tier-card reveal reveal-up">
                    <h3>Junior</h3>
                    <p>1–3 years · solid fundamentals, pairs well</p>
                    <ul class="hire-engage-perks"><li>Pre-vetted engineer</li><li>Engagement manager support</li><li>NDA + 100% IP assignment</li><li>30-day replacement guarantee</li></ul>
                </article>
                <article class="hire-tier-card reveal reveal-up is-featured">
                    <span class="hire-tier-badge">Most Hired</span>
                    <h3>Mid-Level</h3>
                    <p>3–5 years · production-ready, owns features</p>
                    <ul class="hire-engage-perks"><li>Pre-vetted engineer</li><li>Engagement manager support</li><li>NDA + 100% IP assignment</li><li>30-day replacement guarantee</li></ul>
                </article>
                <article class="hire-tier-card reveal reveal-up">
                    <h3>Senior</h3>
                    <p>5–8 years · system design, mentors juniors</p>
                    <ul class="hire-engage-perks"><li>Pre-vetted senior</li><li>Engagement manager support</li><li>NDA + 100% IP assignment</li><li>Direct hiring-manager interview</li></ul>
                </article>
                <article class="hire-tier-card reveal reveal-up">
                    <h3>Tech Lead</h3>
                    <p>8+ years · leads teams, sets architecture</p>
                    <ul class="hire-engage-perks"><li>Pre-vetted tech lead</li><li>Engagement manager support</li><li>NDA + 100% IP assignment</li><li>Custom quote for architecture reviews</li></ul>
                </article>
            </div>

            <div class="section-head reveal reveal-up" style="margin-top: 3rem;">
                <span class="eyebrow">Pricing Transparency</span>
                <h2>What every engagement <span class="gradient-text">includes</span></h2>
                <p>One flat monthly rate per engineer. No setup fees, no recruiter markup, no surprises in month three.</p>
            </div>
            <div class="hire-include-grid reveal-stagger">
                <article class="hire-include-card reveal reveal-up">
                    <h3>Included with every engineer</h3>
                    <ul class="hire-engage-perks">
                        <?php foreach ($included as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <article class="hire-include-card reveal reveal-up">
                    <h3>Not charged — you never pay for</h3>
                    <ul class="hire-engage-perks">
                        <?php foreach ($not_charged as $item): ?>
                        <li><?php echo htmlspecialchars($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="timezones">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Time Zones</span>
                <h2>Real time-zone overlap with major <span class="gradient-text">markets</span></h2>
                <p>Our office runs 9:00 am to 8:00 pm IST, and engineers flex within it to cover your shift. We hold at least 4 hours of real-time overlap with every client.</p>
            </div>
            <div class="hire-tz-grid reveal-stagger">
                <?php foreach ($tz_rows as $tz): ?>
                <article class="hire-tz-card reveal reveal-up">
                    <strong><?php echo htmlspecialchars($tz[0]); ?></strong>
                    <span><?php echo htmlspecialchars($tz[1]); ?></span>
                    <em><?php echo htmlspecialchars($tz[2]); ?></em>
                </article>
                <?php endforeach; ?>
            </div>
            <p class="hire-tz-note reveal reveal-up">Engineers flex their hours to match your shift. Overlap with the US and UK/Europe lands on an Indian evening shift; the Gulf and Asia-Pacific on a daytime shift. In AI-native development, shared context is the bottleneck — so we protect real-time overlap on every engagement.</p>
        </div>
    </section>

    <section class="section dark-band" id="services-cross">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Need a project team instead of individual engineers?</h2>
                <p>Sometimes you need outcomes, not bodies. Browse specialised services — managed project teams that deliver end-to-end.</p>
                <a href="<?php echo route_attr('services'); ?>" class="btn btn-primary btn-lg">See All Services</a>
            </div>
        </div>
    </section>

    <section class="section" id="faq">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">FAQ</span>
                <h2>Common questions about <span class="gradient-text">hiring</span></h2>
            </div>
            <div class="faq-list hire-faq-shared reveal reveal-up">
                <?php foreach ($faqs as $f): ?>
                <details class="faq-item">
                    <summary><?php echo htmlspecialchars($f[0]); ?></summary>
                    <div class="faq-body"><?php echo htmlspecialchars($f[1]); ?></div>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section join-team-section" id="join-our-team">
        <div class="container">
            <div class="join-team-layout">
                <div class="join-team-copy reveal reveal-left">
                    <div class="section-head">
                        <span class="eyebrow">Careers</span>
                        <h2>Join Our <span class="gradient-text">Team</span></h2>
                        <p>We hire builders who care about craft, ownership, and shipping real products. If that sounds like you, apply below — we read every application.</p>
                    </div>
                    <ul class="join-team-points">
                        <li>
                            <strong>Real production work</strong>
                            <span>Ship features for startups and enterprises — not throwaway demos or internal-only tasks.</span>
                        </li>
                        <li>
                            <strong>Remote-friendly culture</strong>
                            <span>Flexible schedules with clear overlap windows for US, UK/Europe, and APAC clients.</span>
                        </li>
                        <li>
                            <strong>Growth that compounds</strong>
                            <span>Mentorship, code reviews, and paths across engineering, AI, and product roles.</span>
                        </li>
                        <li>
                            <strong>AI-native toolkit</strong>
                            <span>Work with modern stacks and AI-assisted delivery — Claude, agents, and automation as day-to-day tools.</span>
                        </li>
                        <li>
                            <strong>Ownership &amp; trust</strong>
                            <span>Own features end-to-end: design trade-offs, implementation, testing, and production handoff.</span>
                        </li>
                        <li>
                            <strong>Competitive pay &amp; stability</strong>
                            <span>Fair compensation, long-running client engagements, and a team that values craft over crunch.</span>
                        </li>
                        <li>
                            <strong>Learning budget</strong>
                            <span>Support for courses, certifications, and conferences that sharpen your craft.</span>
                        </li>
                        <li>
                            <strong>Healthy delivery pace</strong>
                            <span>Sustainable sprints, clear priorities, and respect for deep-work time.</span>
                        </li>
                    </ul>
                </div>
                <div class="join-team-form-wrap reveal reveal-right">
                    <?php require __DIR__ . '/includes/join-team-form.php'; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section dark-band" id="service-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Tell us what you are hiring for</h2>
                <p>Share the role, stack, and timeline. We will respond within one business day with a proposed engineer match and next steps.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
