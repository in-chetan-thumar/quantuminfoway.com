<?php
$base_path = '../';
$page_title = '.NET Development Company & Services | Quantum Infoway';
$page_description = '.NET development for business applications, APIs, and Azure systems. ASP.NET Core, C#, Entity Framework, and SQL Server. Published pricing.';
require_once __DIR__ . '/../includes/header.php';
$si = htmlspecialchars($base_path) . 'assets/images/services/';
?>

<main class="page-service">
    <section class="hero service-hero has-media" id="service-hero">
        <div class="hero-orbs" aria-hidden="true">
            <span class="orb orb-1"></span>
            <span class="orb orb-2"></span>
            <span class="orb orb-3"></span>
        </div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">.NET Development</span>
                <h1>.NET development for business systems that <span class="gradient-text">stay maintainable</span></h1>
                <p>ASP.NET Core applications, APIs, and internal platforms in C#. SQL Server or PostgreSQL, Azure when that is your cloud, and a clean path off older .NET Framework code.</p>
                <div class="hero-actions">
                    <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
                    <a href="#capabilities" class="btn btn-ghost btn-lg">What We Build</a>
                </div>
                <div class="hero-trust-pills" aria-label="Delivery highlights">
                    <span>ASP.NET Core &amp; C#</span>
                    <span>Azure or your cloud</span>
                    <span>Source you own</span>
                </div>
                <div class="contact-hero-stats reveal reveal-up">
                    <div class="chs-item"><strong>150+</strong><span>Happy Clients</span></div>
                    <div class="chs-item"><strong>12+</strong><span>Years Delivery</span></div>
                    <div class="chs-item"><strong>10+</strong><span>Countries Served</span></div>
                    <div class="chs-item"><strong>24h</strong><span>Response Window</span></div>
                </div>
            </div>
            <div class="svc-hero-media reveal reveal-up" aria-hidden="true">
                <img src="<?php echo $si; ?>services__enterprise-application-development__hero.png" width="560" height="420" alt=".NET development for business applications">
            </div>
        </div>
    </section>

    <div class="svc-showcase" aria-hidden="true">
        <div class="svc-showcase-track">
            <div class="svc-show-card" style="background:#E8F5BD"><img src="<?php echo $si; ?>case-studies__highlands-brain__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#FFF6C0"><img src="<?php echo $si; ?>case-studies__ecomm-pulse__redesign__device.webp" alt=""></div>
            <div class="svc-show-card" style="background:#BDE8F5"><img src="<?php echo $si; ?>case-studies__franchiselab__mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#E8F5BD"><img src="<?php echo $si; ?>case-studies__instant-ex__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#FFF6C0"><img src="<?php echo $si; ?>case-studies__sergo__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#BDE8F5"><img src="<?php echo $si; ?>case-studies__meeveem__mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#E8F5BD"><img src="<?php echo $si; ?>case-studies__highlands-brain__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#FFF6C0"><img src="<?php echo $si; ?>case-studies__ecomm-pulse__redesign__device.webp" alt=""></div>
            <div class="svc-show-card" style="background:#BDE8F5"><img src="<?php echo $si; ?>case-studies__franchiselab__mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#E8F5BD"><img src="<?php echo $si; ?>case-studies__instant-ex__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#FFF6C0"><img src="<?php echo $si; ?>case-studies__sergo__redesign__solution-mockup.webp" alt=""></div>
            <div class="svc-show-card" style="background:#BDE8F5"><img src="<?php echo $si; ?>case-studies__meeveem__mockup.webp" alt=""></div>
        </div>
    </div>

    <nav class="svc-subnav" aria-label="On this page">
        <div class="container svc-subnav-inner">
            <a href="#difference">Approach</a>
            <a href="#capabilities">Capabilities</a>
            <a href="#stack">Stack</a>
            <a href="#work">Work</a>
            <a href="#guide">Guide</a>
            <a href="#faq">FAQ</a>
            <a href="<?php echo route_attr('contact-us'); ?>">Contact</a>
        </div>
    </nav>

    <section class="section" id="difference">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">How We Work</span>
                <h2>.NET that fits the systems you <span class="gradient-text">already run</span></h2>
                <p>Most .NET work sits next to SQL Server, Active Directory, and line-of-business tools. We design the application around that, ship it in increments, and leave the code in a repository you own.</p>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="capabilities">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">What We Deliver</span>
                <h2>.NET systems Quantum Infoway <span class="gradient-text">ships</span></h2>
            </div>
            <div class="cap-grid reveal-stagger">
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__CodeBlock.webp" alt=""></div><span class="cap-index">01</span></div>
                    <h3>ASP.NET Core applications</h3>
                    <p>Web apps and internal tools with role-based access, audit history, and admin screens your operations team can actually use.</p>
                </article>
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__TreeStructure.webp" alt=""></div><span class="cap-index">02</span></div>
                    <h3>APIs for web and mobile</h3>
                    <p>Versioned REST APIs, and gRPC where services talk to each other. OpenAPI docs, auth, and rate limits included from the start.</p>
                </article>
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__Link.webp" alt=""></div><span class="cap-index">03</span></div>
                    <h3>Microsoft and business integrations</h3>
                    <p>SQL Server, Microsoft 365, Active Directory or Entra ID, ERPs, and payment or CRM APIs connected on one data model.</p>
                </article>
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__CloudCheck.webp" alt=""></div><span class="cap-index">04</span></div>
                    <h3>Azure deployment</h3>
                    <p>App Service, Azure Functions, Azure SQL, and container hosting, with CI/CD and the same option to run on AWS when that is the standard.</p>
                </article>
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__Chats.webp" alt=""></div><span class="cap-index">05</span></div>
                    <h3>Blazor and SignalR</h3>
                    <p>Interactive C# interfaces and live updates for dashboards, approvals, and operations screens that should not wait on a page refresh.</p>
                </article>
                <article class="cap-card reveal reveal-up">
                    <div class="cap-top"><div class="cap-ico"><img src="<?php echo $si; ?>icons__ShieldCheck.webp" alt=""></div><span class="cap-index">06</span></div>
                    <h3>.NET Framework modernization</h3>
                    <p>Audits, tests, and a staged move from .NET Framework or Web Forms to ASP.NET Core, one area at a time, without a freeze on the business.</p>
                </article>
            </div>
            <div class="svc-soft-cta reveal reveal-up" style="margin-top: 2.5rem;">
                <div>
                    <h3>Need engineers on your team instead?</h3>
                    <p>Dedicated .NET developers work in your tools and hours. Project delivery stays on this page.</p>
                </div>
                <a href="<?php echo route_attr('hire/dotnet-developer'); ?>" class="btn btn-primary">Hire .NET Developers</a>
            </div>
        </div>
    </section>

    <section class="section tech dark-band" id="stack">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Technology We Work With</span>
                <h2>The .NET stack we <span class="gradient-text">build on</span></h2>
            </div>
            <div class="stack-bands reveal reveal-up">
                <div class="stack-band"><h4>Application</h4><div class="tech-grid"><span class="tech-chip">C#</span><span class="tech-chip">ASP.NET Core</span><span class="tech-chip">Blazor</span><span class="tech-chip">SignalR</span></div></div>
                <div class="stack-band"><h4>Data</h4><div class="tech-grid"><span class="tech-chip">Entity Framework Core</span><span class="tech-chip">SQL Server</span><span class="tech-chip">PostgreSQL</span><span class="tech-chip">Redis</span></div></div>
                <div class="stack-band"><h4>Cloud</h4><div class="tech-grid"><span class="tech-chip">Azure</span><span class="tech-chip">Azure SQL</span><span class="tech-chip">Docker</span><span class="tech-chip">AWS</span></div></div>
            </div>
        </div>
    </section>

    <section class="section" id="work">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">What a build includes</span>
                <h2>A .NET engagement, <span class="gradient-text">end to end</span></h2>
            </div>
            <div class="work-grid reveal-stagger">
                <article class="work-card reveal reveal-up">
                    <div class="work-media work-media-single">
                        <img src="<?php echo $si; ?>case-studies__franchiselab__mockup.webp" alt="Operations application interface">
                    </div>
                    <h3>Internal platforms and customer portals</h3>
                    <ul class="check-list">
                        <li>Roles, approvals, and an audit trail on the actions that matter</li>
                        <li>Admin screens for the people who run the process day to day</li>
                        <li>Staging you can click through before anything reaches production</li>
                    </ul>
                </article>
                <article class="work-card reveal reveal-up">
                    <div class="work-media work-media-single">
                        <img src="<?php echo $si; ?>case-studies__sergo__redesign__solution-mockup.webp" alt="Connected business workflow interface">
                    </div>
                    <h3>Integrations beside the systems you keep</h3>
                    <ul class="check-list">
                        <li>SQL Server and existing Microsoft identity, reused rather than replaced</li>
                        <li>ERP, CRM, and payment connections with reconciliation you can inspect</li>
                        <li>One data model instead of spreadsheets between tools</li>
                    </ul>
                </article>
                <article class="work-card reveal reveal-up">
                    <div class="work-media work-media-single">
                        <img src="<?php echo $si; ?>services__enterprise-application-development__hero.png" alt="Enterprise application interface">
                    </div>
                    <h3>Takeover and modernization</h3>
                    <ul class="check-list">
                        <li>A written audit of the current .NET codebase before a roadmap</li>
                        <li>Tests around the behaviour you cannot afford to break</li>
                        <li>A move to ASP.NET Core in slices, with the old system still running</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <section class="section services-alt" id="guide">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Guide</span>
                <h2>How we think about <span class="gradient-text">.NET work</span></h2>
            </div>
            <div class="guide-block reveal reveal-up">
                <article class="guide-item">
                    <h3>What is .NET development?</h3>
                    <p>.NET development is building applications in C# on the .NET platform. For most companies that means ASP.NET Core web apps and APIs, Entity Framework against SQL Server or PostgreSQL, and deployment on Azure or another cloud you already use. A .NET development company designs, builds, tests, and hands over that system. Hiring a .NET developer into your own team is a separate model. We do both.</p>
                </article>
                <article class="guide-item">
                    <h3>When .NET is the right backend</h3>
                    <p>.NET fits teams that already run Microsoft identity, SQL Server, or a large C# codebase, and products that need strong typing, transactions, and a long maintenance life. Node.js is a better fit for event-heavy APIs. Python is a better fit when the product is mostly machine learning. Java Spring Boot is the closer alternative when the enterprise standard is the JVM. We build those stacks too, and we will say so if .NET is the wrong choice.</p>
                </article>
                <article class="guide-item">
                    <h3>How much .NET development costs</h3>
                    <p>A focused API or internal tool is typically $15,000 to $50,000. A multi-role platform with integrations is $50,000 to $150,000 over several months. Larger enterprise systems run $150,000 and up. The blended rate is $25 to $50 per hour. Integrations, permissions, and data migration move the number more than the count of screens.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section dark-band" id="service-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo $si; ?>brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Tell us what the .NET system needs to do</h2>
                <p>We will come back with a scoped next step, including whether a project team or a dedicated developer is the better fit.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Talk to an Expert</a>
            </div>
        </div>
    </section>

    <section class="section" id="faq">
        <div class="container">
            <div class="section-head reveal reveal-up"><span class="eyebrow">FAQ</span><h2>.NET development <span class="gradient-text">FAQs</span></h2></div>
            <div class="faq-list reveal reveal-up">
                <details class="faq-item"><summary>Do you build new .NET applications and take over existing ones?</summary><div class="faq-body">Yes. New work is ASP.NET Core in C#. Takeover work starts with an audit of the current solution, including .NET Framework, Web Forms, and WCF where those are still in production, then a staged plan. We do not recommend a full rewrite as the first step.</div></details>
                <details class="faq-item"><summary>Which .NET versions do you use?</summary><div class="faq-body">Current supported .NET and ASP.NET Core for new work. Entity Framework Core for data access, with Dapper when a query needs to stay close to SQL. Older Framework applications are maintained or migrated, depending on what the audit shows.</div></details>
                <details class="faq-item"><summary>Can you deploy .NET on Azure?</summary><div class="faq-body">Yes. App Service, Azure Functions, Azure SQL, containers, and Entra ID are common. We also deploy ASP.NET Core to AWS or a server you already operate. The application code does not have to be locked to one cloud.</div></details>
                <details class="faq-item"><summary>Do you build Blazor applications?</summary><div class="faq-body">Yes, when a C# UI is the right interface, especially for internal tools used by teams that already live in .NET. Public marketing sites and highly interactive consumer apps are often a better fit for React, which we also build and can put in front of the same ASP.NET Core API.</div></details>
                <details class="faq-item"><summary>How long does a .NET project take?</summary><div class="faq-body">A focused API or internal tool is often 4 to 10 weeks. A platform with several integrations is measured in months. You get a staging environment early, not a single handover at the end.</div></details>
                <details class="faq-item"><summary>Can we hire a .NET developer instead of a project team?</summary><div class="faq-body">Yes. Dedicated .NET developers join your team, your repository, and your standups. See the hire .NET developers page for rates, vetting, and engagement models. This page is for project delivery.</div></details>
            </div>
            <div class="related-strip reveal reveal-up" style="margin-top: 3rem;">
                <a class="related-card" href="<?php echo route_attr('hire/dotnet-developer'); ?>"><span>Related</span><strong>Hire .NET Developers →</strong><p>Dedicated C# and ASP.NET Core engineers.</p></a>
                <a class="related-card" href="<?php echo route_attr('services/enterprise-application-development'); ?>"><span>Related</span><strong>Enterprise Apps →</strong><p>Platforms, integrations, and modernization.</p></a>
                <a class="related-card" href="<?php echo route_attr('hire/azure-developer'); ?>"><span>Related</span><strong>Azure Developers →</strong><p>Identity, App Service, and Azure SQL.</p></a>
                <a class="related-card" href="<?php echo route_attr('services/custom-software-development'); ?>"><span>Related</span><strong>Custom Software →</strong><p>When the workflow does not fit a package.</p></a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
