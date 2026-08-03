<?php
$page_title = 'Contact Us | Quantum Infoway — Talk to a Technology Partner';
$page_description = 'Contact Quantum Infoway for a free consultation. Talk to an AI-native technology partner about custom software, web and mobile apps, and product engineering.';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-contact">
    <!-- Premium hero -->
    <section class="hero contact-hero" id="contact-hero">
        <div class="hero-orbs" aria-hidden="true">
            <span class="orb orb-1"></span>
            <span class="orb orb-2"></span>
            <span class="orb orb-3"></span>
        </div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">Talk to a real human</span>
                <h1>Talk to a <span class="gradient-text">Technology Partner</span></h1>
                <p>Whether you are scoping a fresh idea, scaling a product, or evaluating an AI integration — start with a conversation. We listen first, then map the shortest path to a working solution.</p>
                <div class="hero-actions">
                    <a href="#contact-form" class="btn btn-primary btn-lg">Talk to an Expert</a>
                    <a href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>" class="btn btn-ghost btn-lg">Email Us Directly</a>
                </div>
                <div class="contact-hero-stats reveal reveal-up">
                    <div class="chs-item">
                        <strong>150+</strong>
                        <span>Happy Clients</span>
                    </div>
                    <div class="chs-item">
                        <strong>12+</strong>
                        <span>Years Delivery</span>
                    </div>
                    <div class="chs-item">
                        <strong>13+</strong>
                        <span>Countries Served</span>
                    </div>
                    <div class="chs-item">
                        <strong>24h</strong>
                        <span>Response Window</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Consultation -->
    <section class="section contact-consult" id="consultation">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Free Consultation</span>
                <h2>Get a free consultation with a <span class="gradient-text">senior partner</span></h2>
                <p>Start with a focused conversation. We listen first, then map the shortest path to a working solution.</p>
            </div>

            <div class="contact-steps reveal-stagger reveal reveal-up">
                <article class="contact-step">
                    <span class="contact-step-num">01</span>
                    <h3>Share your goals</h3>
                    <p>Tell us about the product, timeline, and outcomes you care about — even if the idea is still early.</p>
                </article>
                <article class="contact-step">
                    <span class="contact-step-num">02</span>
                    <h3>30-minute discovery</h3>
                    <p>A senior engineering partner joins the call to clarify scope, risks, and the fastest delivery path.</p>
                </article>
                <article class="contact-step">
                    <span class="contact-step-num">03</span>
                    <h3>Clear next steps</h3>
                    <p>You leave with guidance on tech, approach, and what happens next — not a generic sales deck.</p>
                </article>
            </div>

            <div class="contact-consult-grid">
                <div class="contact-consult-copy reveal reveal-left">
                    <p><?php echo htmlspecialchars(SITE_NAME); ?> has delivered for <strong>150+ clients</strong> across <strong>13+ countries</strong>, with <strong>12+ years</strong> of shipping websites, web apps, mobile products, and AI-powered platforms for startups, mid-market companies, and enterprises.</p>
                    <p>We build with modern stacks such as <strong>Laravel, PHP, React, Angular, Node.js, WordPress, iOS, and Android</strong> — plus AI integrations, agents, and conversational experiences.</p>
                    <div class="contact-consult-links">
                        <a href="/#services" class="pill-link">Product Development →</a>
                        <a href="/#ai-services" class="pill-link">AI Services →</a>
                    </div>
                    <div class="contact-async">
                        <span class="contact-async-label">Prefer async?</span>
                        <p>Email <a href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>"><?php echo htmlspecialchars(SITE_EMAIL); ?></a> with scope, timeline, and budget range — you will hear back within one business day.</p>
                    </div>
                </div>
                <aside class="contact-consult-aside reveal reveal-right">
                    <div class="contact-aside-card">
                        <div class="contact-aside-glow" aria-hidden="true"></div>
                        <span class="eyebrow">Direct line</span>
                        <h3>Reach Quantum Infoway</h3>
                        <ul class="contact-aside-list">
                            <li>
                                <span class="cal-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.5-1.1a2 2 0 0 1 2.1-.5c.8.3 1.7.5 2.6.6a2 2 0 0 1 1.7 2z"/></svg>
                                </span>
                                <div>
                                    <strong>Phone</strong>
                                    <a href="tel:+918511108041"><?php echo htmlspecialchars(SITE_PHONE); ?></a>
                                </div>
                            </li>
                            <li>
                                <span class="cal-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4h16v16H4z"/><path d="m4 4 8 8 8-8"/></svg>
                                </span>
                                <div>
                                    <strong>Email</strong>
                                    <a href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>"><?php echo htmlspecialchars(SITE_EMAIL); ?></a>
                                </div>
                            </li>
                            <li>
                                <span class="cal-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                </span>
                                <div>
                                    <strong>Hours</strong>
                                    <span><?php echo htmlspecialchars(SITE_HOURS); ?></span>
                                </div>
                            </li>
                            <li>
                                <span class="cal-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                </span>
                                <div>
                                    <strong>HQ</strong>
                                    <span>India</span>
                                </div>
                            </li>
                        </ul>
                        <a href="#contact-form" class="btn btn-primary btn-block">Talk to an Expert</a>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- Form band -->
    <section class="section contact dark-band contact-form-band" id="contact-form">
        <div class="contact-bg" aria-hidden="true"></div>
        <div class="contact-form-aura" aria-hidden="true"></div>
        <div class="container contact-page-grid">
            <div class="contact-copy reveal reveal-left">
                <span class="eyebrow">Let's Connect</span>
                <h2>Let's build the next <span class="gradient-text">big thing</span></h2>
                <p>Fill in the form to map out a path to success. A partner reviews every inquiry personally.</p>
                <ul class="contact-promise">
                    <li>
                        <span class="cp-dot" aria-hidden="true"></span>
                        Senior review on every lead
                    </li>
                    <li>
                        <span class="cp-dot" aria-hidden="true"></span>
                        Reply within one business day
                    </li>
                    <li>
                        <span class="cp-dot" aria-hidden="true"></span>
                        No spam — only project follow-ups
                    </li>
                </ul>
                <div class="contact-copy-cta">
                    <a href="tel:+918511108041" class="btn btn-ghost btn-lg">Call <?php echo htmlspecialchars(SITE_PHONE); ?></a>
                </div>
            </div>

            <form class="inquiry-form contact-page-form reveal reveal-right" id="contactPageForm" action="/form-handler" method="post" novalidate>
                <div class="contact-form-head">
                    <span class="contact-form-badge">Free consultation</span>
                    <h3>Talk to an Expert</h3>
                    <p>Share a few details and we will get back with next steps.</p>
                </div>
                <input type="hidden" name="page_source" value="contact">
                <div class="form-row two-col">
                    <div>
                        <label for="name">Full name *</label>
                        <input type="text" id="name" name="name" required autocomplete="name" placeholder="Your name" maxlength="120">
                    </div>
                    <div>
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" autocomplete="organization" placeholder="Company name" maxlength="120">
                    </div>
                </div>
                <div class="form-row two-col">
                    <div>
                        <label for="phone">Phone number</label>
                        <input type="tel" id="phone" name="phone" autocomplete="tel" placeholder="+91 ..." maxlength="20">
                    </div>
                    <div>
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" autocomplete="country-name" placeholder="Your country" maxlength="80">
                    </div>
                </div>
                <div class="form-row">
                    <label for="email">Business email *</label>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="you@company.com" maxlength="190">
                </div>
                <div class="form-row">
                    <label for="service">Service</label>
                    <select id="service" name="service">
                        <option value="">Select a service</option>
                        <option>Web App Development</option>
                        <option>Mobile App Development</option>
                        <option>CMS &amp; E-Commerce</option>
                        <option>UX/UI Design</option>
                        <option>AI Agents &amp; Integration</option>
                        <option>Conversational AI</option>
                        <option>Testing</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-row">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="4" required placeholder="Tell us about scope, timeline, and goals..." maxlength="5000"></textarea>
                </div>
                <div class="form-row">
                    <label for="source">How did you hear about us? (optional)</label>
                    <select id="source" name="source">
                        <option value="">Select an option</option>
                        <option>Google search</option>
                        <option>ChatGPT or another AI assistant</option>
                        <option>Clutch</option>
                        <option>GoodFirms</option>
                        <option>DesignRush</option>
                        <option>LinkedIn</option>
                        <option>Referral from a person</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="hp-field" aria-hidden="true">
                    <label for="qx_hp_field_contact">Leave blank</label>
                    <input type="text" id="qx_hp_field_contact" name="qx_hp_field" value="" tabindex="-1" autocomplete="new-password" inputmode="none">
                </div>
                <p class="form-privacy">By submitting, you agree to our <a href="<?php echo route_attr('privacy-policy'); ?>">Privacy Policy</a> and <a href="<?php echo route_attr('terms-and-conditions'); ?>">Terms &amp; Conditions</a>.</p>
                <button type="submit" class="btn btn-primary btn-block" id="contactSubmitBtn">
                    <span class="btn-text">Talk to an Expert</span>
                    <span class="btn-loading" aria-hidden="true">
                        <span class="btn-spinner"></span>
                        <span>Sending...</span>
                    </span>
                </button>
                <div class="form-status" id="contactFormStatus" role="status" aria-live="polite"></div>
            </form>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
