<footer class="site-footer">
        <div class="footer-glow" aria-hidden="true"></div>
        <div class="container footer-inner">

            <!-- CTA banner -->
            <div class="footer-cta reveal">
                <div class="footer-cta-copy">
                    <h2>Have an idea? <span class="gradient-text">Let's build it together.</span></h2>
                    <p>Free consultation — we respond within 24 hours.</p>
                </div>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg<?php echo nav_active_class('contact-us'); ?>">Talk to an Expert</a>
            </div>

            <!-- Link columns -->
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="<?php echo route_attr(''); ?>" class="brand footer-brand-logo">
                        <span class="brand-mark">Q</span>
                        <span class="brand-text">Quantum <em>Infoway</em></span>
                    </a>
                    <p><?php echo htmlspecialchars(SITE_NAME); ?> builds custom software, web and mobile products, AI features, and industry platforms — from concept to scale, with full ownership of the code.</p>
                    <div class="social-links">
                        <a href="<?php echo htmlspecialchars(SOCIAL_FACEBOOK); ?>" target="_blank" rel="noopener" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="<?php echo htmlspecialchars(SOCIAL_TWITTER); ?>" target="_blank" rel="noopener" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M22 5.8c-.7.3-1.5.5-2.3.6.8-.5 1.4-1.2 1.7-2.1-.8.5-1.6.8-2.5 1A4 4 0 0 0 12 8.5c0 .3 0 .6.1.9-3.3-.2-6.3-1.8-8.3-4.2-.3.6-.5 1.2-.5 1.9a4 4 0 0 0 1.8 3.3c-.6 0-1.2-.2-1.7-.5v.1a4 4 0 0 0 3.2 3.9c-.3.1-.7.1-1 .1-.2 0-.5 0-.7-.1a4 4 0 0 0 3.7 2.8A8 8 0 0 1 2 18.6a11.4 11.4 0 0 0 6.2 1.8c7.4 0 11.5-6.1 11.5-11.5v-.5c.8-.6 1.5-1.3 2-2.1z"/></svg>
                        </a>
                        <a href="<?php echo htmlspecialchars(SOCIAL_LINKEDIN); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2zM4 2a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="<?php echo route_attr('about-us'); ?>"<?php echo nav_active_class('about-us') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('about-us'); ?>>About Us</a></li>
                        <li><a href="<?php echo route_attr('#portfolio'); ?>">Case Studies</a></li>
                        <li><a href="<?php echo route_attr('#reviews'); ?>">Testimonials</a></li>
                        <li><a href="<?php echo route_attr('blogs'); ?>"<?php echo nav_active_class('blogs') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('blogs'); ?>>Blogs</a></li>
                        <li><a href="<?php echo route_attr('contact-us'); ?>"<?php echo nav_active_class('contact-us') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('contact-us'); ?>>Contact Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="<?php echo route_attr('services/custom-software-development'); ?>"<?php echo nav_active_class('services/custom-software-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/custom-software-development'); ?>>Custom Software</a></li>
                        <li><a href="<?php echo route_attr('services/web-app-development'); ?>"<?php echo nav_active_class('services/web-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/web-app-development'); ?>>Web Apps</a></li>
                        <li><a href="<?php echo route_attr('services/mobile-app-development'); ?>"<?php echo nav_active_class('services/mobile-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/mobile-app-development'); ?>>Mobile Apps</a></li>
                        <li><a href="<?php echo route_attr('services/ui-ux-design'); ?>"<?php echo nav_active_class('services/ui-ux-design') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/ui-ux-design'); ?>>UI/UX Design</a></li>
                        <li><a href="<?php echo route_attr('services/enterprise-application-development'); ?>"<?php echo nav_active_class('services/enterprise-application-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/enterprise-application-development'); ?>>Enterprise Apps</a></li>
                        <li><a href="<?php echo route_attr('services/ai-development'); ?>"<?php echo nav_active_class('services/ai-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/ai-development'); ?>>AI Development</a></li>
                        <li><a href="<?php echo route_attr('services/cloud-and-devops'); ?>"<?php echo nav_active_class('services/cloud-and-devops') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/cloud-and-devops'); ?>>Cloud &amp; DevOps</a></li>
                        <li><a href="<?php echo route_attr('services/data-analytics-and-science'); ?>"<?php echo nav_active_class('services/data-analytics-and-science') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/data-analytics-and-science'); ?>>Data Analytics</a></li>
                        <li><a href="<?php echo route_attr('services/google-workspace'); ?>"<?php echo nav_active_class('services/google-workspace') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/google-workspace'); ?>>Google Workspace</a></li>
                        <li><a href="<?php echo route_attr('services/mvp-development'); ?>"<?php echo nav_active_class('services/mvp-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/mvp-development'); ?>>MVP Build &amp; Rescue</a></li>
                        <li><a href="<?php echo route_attr('services'); ?>"<?php echo nav_active_class('services') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services'); ?>>View all services →</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Industries</h4>
                    <ul>
                        <li><a href="<?php echo route_attr('services/fintech-app-development'); ?>"<?php echo nav_active_class('services/fintech-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/fintech-app-development'); ?>>Fintech</a></li>
                        <li><a href="<?php echo route_attr('services/healthcare-app-development'); ?>"<?php echo nav_active_class('services/healthcare-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/healthcare-app-development'); ?>>Healthcare</a></li>
                        <li><a href="<?php echo route_attr('services/real-estate-app-development'); ?>"<?php echo nav_active_class('services/real-estate-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/real-estate-app-development'); ?>>Real Estate</a></li>
                        <li><a href="<?php echo route_attr('services/travel-app-development'); ?>"<?php echo nav_active_class('services/travel-app-development') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('services/travel-app-development'); ?>>Travel &amp; Hospitality</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Hire Developers</h4>
                    <ul>
                        <li><a href="<?php echo route_attr('hire/laravel-developer'); ?>"<?php echo nav_active_class('hire/laravel-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/laravel-developer'); ?>>Laravel</a></li>
                        <li><a href="<?php echo route_attr('hire/react-developer'); ?>"<?php echo nav_active_class('hire/react-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/react-developer'); ?>>React</a></li>
                        <li><a href="<?php echo route_attr('hire/angular-developer'); ?>"<?php echo nav_active_class('hire/angular-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/angular-developer'); ?>>Angular</a></li>
                        <li><a href="<?php echo route_attr('hire/node-js-developer'); ?>"<?php echo nav_active_class('hire/node-js-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/node-js-developer'); ?>>Node.js</a></li>
                        <li><a href="<?php echo route_attr('hire/python-developer'); ?>"<?php echo nav_active_class('hire/python-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/python-developer'); ?>>Python</a></li>
                        <li><a href="<?php echo route_attr('hire/full-stack-developer'); ?>"<?php echo nav_active_class('hire/full-stack-developer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/full-stack-developer'); ?>>Full Stack</a></li>
                        <li><a href="<?php echo route_attr('hire/ai-engineer'); ?>"<?php echo nav_active_class('hire/ai-engineer') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire/ai-engineer'); ?>>AI Engineer</a></li>
                        <li><a href="<?php echo route_attr('hire'); ?>"<?php echo nav_active_class('hire') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('hire'); ?>>View all roles →</a></li>
                    </ul>
                </div>

                <div class="footer-col footer-col-contact">
                    <h4>Get In Touch</h4>
                    <ul class="contact-list">
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/><path d="m4 4 8 8 8-8"/></svg>
                            <a href="mailto:<?php echo htmlspecialchars(SITE_EMAIL); ?>"><?php echo htmlspecialchars(SITE_EMAIL); ?></a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.5-1.1a2 2 0 0 1 2.1-.5c.8.3 1.7.5 2.6.6a2 2 0 0 1 1.7 2z"/></svg>
                            <a href="tel:+918511108041"><?php echo htmlspecialchars(SITE_PHONE); ?></a>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                            <?php echo htmlspecialchars(SITE_HOURS); ?>
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            India (HQ)
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars(SITE_NAME); ?>. All rights reserved.</p>
                <ul class="footer-legal">
                    <li><a href="<?php echo route_attr('privacy-policy'); ?>"<?php echo nav_active_class('privacy-policy') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('privacy-policy'); ?>>Privacy Policy</a></li>
                    <li><a href="<?php echo route_attr('terms-and-conditions'); ?>"<?php echo nav_active_class('terms-and-conditions') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('terms-and-conditions'); ?>>Terms &amp; Conditions</a></li>
                    <li><a href="<?php echo route_attr('sitemap'); ?>"<?php echo nav_active_class('sitemap') !== '' ? ' class="active"' : ''; ?><?php echo nav_aria_current('sitemap'); ?>>Sitemap</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-watermark" aria-hidden="true">QUANTUM</div>
    </footer>

    <button type="button" class="back-to-top" id="backToTop" aria-label="Back to top">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
    </button>

    <script src="<?php echo htmlspecialchars($base_path); ?>assets/js/main.js"></script>
</body>
</html>
