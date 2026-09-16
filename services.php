<?php
$base_path = '';
$page_title = 'Services | Quantum Infoway — AI-Native Software Engineering';
$page_description = 'Ship AI products to production without rebuilding your engineering team. Browse Quantum Infoway services across AI, engineering, cloud, data, and design.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);
$si = $bp . 'assets/images/services/';
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

$svc_groups = [
    [
        'eyebrow' => 'AI & Machine Learning',
        'title' => 'AI development that ships to <span class="gradient-text">production</span>',
        'lead' => 'From foundation models to agentic workflows. Production systems, not demos.',
        'cards' => [
            ['services/ai-development.php', 'AI Development', 'Custom AI from scratch. Computer vision, NLP, classification, recommendation, and fine tuning, built on PyTorch and TensorFlow with foundation LLMs on top.'],
            ['services/agentic-ai.php', 'Agentic AI', 'Autonomous agents that handle multistep workflows with tool use, MCP servers, and human in the loop checkpoints.'],
            ['services/generative-ai.php', 'Generative AI', 'Production LLM apps, RAG pipelines, fine tuning, and multimodal AI on Claude, Gemini, Llama, and the Hugging Face ecosystem.'],
            ['services/conversational-ai.php', 'Conversational AI', 'Chatbots, voice agents, and assistants for web, mobile, WhatsApp, and voice. Multilingual and transaction ready.'],
            ['services/ai-integration.php', 'AI Integration', 'Plug AI into existing products without rebuilding your stack. Semantic search, document AI, and AI powered analytics.'],
            ['services/ai-automation.php', 'AI Automation', 'Automate document processing, support triage, and back office workflows with agentic AI, RAG, and human in the loop oversight.'],
        ],
    ],
    [
        'eyebrow' => 'Engineering & Apps',
        'title' => 'Software that scales with your <span class="gradient-text">business</span>',
        'lead' => 'Web, mobile, and full stack engineering with AI built into the workflow.',
        'cards' => [
            ['services/custom-software-development.php', 'Custom Software Development', 'Custom platforms, internal systems, integrations, and AI powered products, built for your exact workflow with published pricing.'],
            ['services/enterprise-application-development.php', 'Enterprise Application Development', 'Custom enterprise platforms, system integration, legacy modernization, and AI powered software — built to scale across an organization.'],
            ['services/web-app-development.php', 'Web App Development', 'React, Next.js, Node.js, Python, and Java, from MVP to enterprise scale SaaS. AI augmented engineering throughout.'],
            ['services/react-development.php', 'React Development', 'React web apps, dashboards, and SaaS in React, Next.js, and TypeScript, with performance and AI interfaces built in.'],
            ['services/node-js-development.php', 'Node.js Development', 'APIs, real time systems, microservices, and AI product backends in NestJS, Express, and strict TypeScript.'],
            ['services/no-code-development.php', 'No-Code & Low-Code Development', 'Webflow, Bubble, Xano, WeWeb, and FlutterFlow. MVPs and internal tools shipped in weeks, with a clean path to custom code as you scale.'],
            ['services/mvp-development.php', 'MVP Build & Rescue', 'Build a production MVP, or scale, rebuild, secure, and take over one built on Supabase, Lovable, Xano, or WeWeb.'],
            ['services/xano-development.php', 'Xano Development', 'Scalable Xano backends. Database, APIs, and business logic in one platform, built AI ready and rescued at scale.'],
            ['services/lovable-development.php', 'Lovable Development', 'Production apps built on Lovable with Supabase backends, hardened and scaled by senior engineers, with a clean path to custom code as you grow.'],
            ['services/mobile-app-development.php', 'Mobile App Development', 'Native iOS (Swift) and Android (Kotlin), plus cross platform Flutter and React Native. App Store and Play Store launch support.'],
            ['services/real-estate-app-development.php', 'Real Estate App Development', 'Property discovery, brokerage tools, and operations platforms with AI, across shipped real estate products with published metrics.'],
            ['services/travel-app-development.php', 'Travel App Development', 'Booking engines, host and operations tools, and AI recommendations for travel and hospitality platforms.'],
            ['services/fintech-app-development.php', 'Fintech App Development', 'Payments, lending, neobanking, wealthtech, and insurtech, built security first with KYC, AML, and PCI DSS readiness.'],
            ['services/healthcare-app-development.php', 'Healthcare App Development', 'Telemedicine, remote monitoring, EHR integration, and clinical AI, built HIPAA ready with HL7 and FHIR interoperability.'],
            ['services/web-mobile-applications.php', 'Web & Mobile Applications', 'End to end builds with shared codebases where it fits, native performance where it matters.'],
            ['services/ai-powered-qa-testing.php', 'AI-Powered QA & Testing', 'Playwright with LLM generated specs, visual regression, and flaky test detection. Shorter regression cycles without sacrificing coverage.'],
            ['services/claude-code-ai-for-teams.php', 'Claude Code AI for Teams', 'Roll out Claude Code across your engineering team. Secure setup, MCP servers, agent skills, and productivity coaching.'],
        ],
    ],
    [
        'eyebrow' => 'Cloud & Data',
        'title' => 'Infrastructure and insights, optimised <span class="gradient-text">together</span>',
        'lead' => 'From cloud architecture to data products that drive decisions.',
        'cards' => [
            ['services/cloud-and-devops.php', 'Cloud & DevOps', 'AWS, GCP, Azure. Kubernetes, Terraform, CI/CD, observability, and FinOps cost optimisation for production workloads.'],
            ['services/data-analytics-and-science.php', 'Data Analytics & Data Science', 'Data pipelines, warehouses, BI dashboards, predictive ML, and custom analytics applications.'],
            ['services/google-workspace.php', 'Google Workspace', 'Google Workspace setup, migration, AppSheet automation, security hardening, and team training.'],
        ],
    ],
    [
        'eyebrow' => 'Design',
        'title' => 'Product design that <span class="gradient-text">ships</span>',
        'lead' => 'Discovery, design systems, and prototypes built for engineering handoff.',
        'cards' => [
            ['services/ui-ux-design.php', 'UI/UX Design', 'Product discovery, design systems, rapid prototyping, AI interface design, and data visualisation.'],
        ],
    ],
];

$faqs = [
    ['How do I know which Quantum Infoway service I need?', 'Quantum Infoway recommends starting with a free discovery call when the right service mix is not obvious. We map your goal to the right combination of services, whether that is AI strategy, engineering, design, or staff augmentation. Most projects combine 2 to 3 services, for example AI Development plus Cloud plus UI/UX. The initial call typically includes a written recommendation within one business day.'],
    ['What sizes of project do you take on?', 'Quantum Infoway works with startups (MVPs from $25K), mid market companies (scaling existing products, $100K to $500K), and enterprises (transformations and modernisations, $500K+). What stays constant is production grade engineering, regardless of budget. The discovery call helps scope an engagement that fits.'],
    ['Do you work with regulated industries (healthcare, fintech)?', 'Yes. Projects are configured to meet GDPR, HIPAA, PCI DSS, and sector specific requirements as part of discovery. For sensitive workloads, deployments use private cloud endpoints (Azure OpenAI, AWS Bedrock, Vertex AI) or self hosted open weight models on customer infrastructure.'],
    ['How do I work with Quantum Infoway, as a project, a dedicated team, or staff augmentation?', 'Quantum Infoway offers three engagement models. (1) Project based, with fixed scope, timeline, and budget for defined deliverables. (2) Dedicated team, where engineers and designers work exclusively on the customer project, integrated with the tools the customer already uses. (3) Staff augmentation, where individual developers slot into the existing customer team via our hire roles. Most dedicated and staff augmentation engagements begin within 1 to 2 weeks of the discovery call.'],
    ['Where is your team based?', 'Quantum Infoway is headquartered in India, with a US presence. The engineering team works across 10+ countries. Time zone overlap with US, EU, and APAC clients is standard. Most projects use a hybrid sync/async cadence. Daily standups run in the customer time zone, and deep work hours follow the engineer.'],
    ['How long does a typical engagement run?', 'An MVP at Quantum Infoway runs 4 to 12 weeks. Mid complexity SaaS or AI applications run 3 to 6 months. Enterprise transformations run 6 to 12+ months. A short discovery program is a structured entry point for teams that want to start small and scope iteratively.'],
    ['How do you protect our IP and source code?', 'Every Quantum Infoway engagement assigns 100% IP and source code ownership to the customer on signing of the master agreement. Code is developed in customer owned repositories (GitHub, GitLab, Bitbucket) where possible, with isolated branches per engagement. Every engineer has signed a confidentiality agreement with Quantum Infoway. Access controls, data classification, and incident response follow industry standard practices.'],
    ['What does support look like after launch?', 'Every Quantum Infoway project ships with monitoring, observability, and runbooks in place. Ongoing maintenance retainers cover performance, security patches, dependency updates, and feature work. The same engineers who built the product stay on, so no knowledge is lost.'],
];
?>

<main class="page-service page-hire page-directory">
    <section class="hero service-hero has-media" id="service-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">AI-Native Software Engineering</span>
                <h1>Ship AI products to production without rebuilding your <span class="gradient-text">engineering team</span></h1>
                <p>The AI native engineering partner for SaaS and enterprise teams that have outgrown demos. Same engineers from discovery through ongoing partnership.</p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
                    <a href="#service-directory" class="btn btn-ghost btn-lg">Browse Services</a>
                </div>
                <div class="hero-trust-pills" aria-label="Delivery highlights">
                    <span>AI, engineering, cloud &amp; design</span>
                    <span>Same team end to end</span>
                    <span>Production, not demos</span>
                </div>
                <div class="contact-hero-stats reveal reveal-up">
                    <div class="chs-item"><strong>150+</strong><span>Happy Clients</span></div>
                    <div class="chs-item"><strong>12+</strong><span>Years Delivery</span></div>
                    <div class="chs-item"><strong>10+</strong><span>Countries Served</span></div>
                    <div class="chs-item"><strong>24h</strong><span>Response Window</span></div>
                </div>
            </div>
            <div class="svc-hero-media reveal reveal-up" aria-hidden="true">
                <img src="<?php echo $si; ?>services__ai-development__hero.png" width="560" height="420" alt="Quantum Infoway services">
            </div>
        </div>
    </section>

    <div class="svc-showcase" aria-hidden="true">
        <div class="svc-showcase-track">
            <?php
            $show = [
                'services__ai-development__marquee-1.png',
                'services__custom-software-development__marquee-1.png',
                'services__cloud-and-devops__marquee-1.png',
                'services__fintech-app-development__marquee-1.png',
                'services__ui-ux-design__marquee-1.png',
                'services__no-code-development__marquee-1.png',
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
            <a href="#service-directory">All Services</a>
            <a href="#engagement">Ways to Work</a>
            <a href="#process">How It Works</a>
            <a href="#hire-cross">Hire Talent</a>
            <a href="#faq">FAQ</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <section class="section services-alt" id="service-directory">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">27 services. One partner.</span>
                <h2>Pick what you need, or talk to us and we will architect the right <span class="gradient-text">combination</span></h2>
                <p>AI, engineering, cloud, and design — combined for your goal.</p>
            </div>

            <?php foreach ($svc_groups as $gi => $g): ?>
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

    <section class="section services-alt" id="engagement">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Ways to Work Together</span>
                <h2>Pick the engagement model that <span class="gradient-text">fits</span></h2>
                <p>Three ways to bring Quantum Infoway into your stack. Switch between models as your needs evolve.</p>
            </div>
            <div class="hire-engage reveal-stagger">
                <article class="hire-engage-card reveal reveal-up">
                    <span class="hire-engage-index">01</span>
                    <h3>Dedicated Team</h3>
                    <p>A full team of engineers, designers, and a tech lead works exclusively on your project, integrated with your tools and workflows.</p>
                    <span class="hire-engage-best">Best for: Ongoing product development and roadmaps that span quarters</span>
                </article>
                <article class="hire-engage-card reveal reveal-up">
                    <span class="hire-engage-index">02</span>
                    <h3>Project Based</h3>
                    <p>Fixed scope, timeline, and budget. We deliver the project against a written spec and hand off the codebase with documentation.</p>
                    <span class="hire-engage-best">Best for: Defined deliverables such as MVPs, integrations, and migrations</span>
                </article>
                <article class="hire-engage-card reveal reveal-up">
                    <span class="hire-engage-index">03</span>
                    <h3>Staff Augmentation</h3>
                    <p>Plug individual engineers into your existing team. Vetted, production experienced developers ready within 1 to 2 weeks.</p>
                    <span class="hire-engage-best">Best for: Scaling capacity, filling a specific role gap</span>
                </article>
            </div>
        </div>
    </section>

    <section class="section" id="process">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">How It Works</span>
                <h2>How a project <span class="gradient-text">flows</span></h2>
                <p>Discovery to ongoing partnership, with the same engineers end to end.</p>
            </div>
            <div class="hire-steps reveal-stagger">
                <article class="hire-step reveal reveal-up">
                    <span class="hire-step-num">01</span>
                    <h3>Discovery &amp; Architecture</h3>
                    <p>Goals, constraints, data, and success metrics. We push back on scope that will not ship. You get a tech spec, a cost, and a timeline.</p>
                </article>
                <article class="hire-step reveal reveal-up">
                    <span class="hire-step-num">02</span>
                    <h3>Build &amp; Iterate</h3>
                    <p>AI augmented engineering. Weekly demos. Real users from week 3. Course correct early instead of polishing a wrong solution.</p>
                </article>
                <article class="hire-step reveal reveal-up">
                    <span class="hire-step-num">03</span>
                    <h3>Ship &amp; Instrument</h3>
                    <p>Monitoring, evals, runbooks, and on call setup. Live before launch, not after. Performance budgets enforced at deploy.</p>
                </article>
                <article class="hire-step reveal reveal-up">
                    <span class="hire-step-num">04</span>
                    <h3>Maintain &amp; Evolve</h3>
                    <p>Retainers for performance, security, and feature work. Same engineers stay on, so no knowledge is lost.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section dark-band" id="hire-cross">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Need talent instead of a project team?</h2>
                <p>Sometimes you need engineers, not a project. Browse specialised hire roles and find vetted developers ready to plug into your team.</p>
                <a href="<?php echo route_attr('hire'); ?>" class="btn btn-primary btn-lg">Browse Hire Roles</a>
            </div>
        </div>
    </section>

    <section class="section" id="faq">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">FAQ</span>
                <h2>Common <span class="gradient-text">questions</span></h2>
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

    <section class="section dark-band" id="service-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Tell us what you are evaluating</h2>
                <p>Share what you are building or hiring for. We respond within one business day with a read on fit and a proposed next step.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
