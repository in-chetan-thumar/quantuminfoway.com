<?php
$base_path = '';
$page_title = 'Privacy Policy | Quantum Infoway';
$page_description = 'How Quantum Infoway collects, uses, shares, and protects personal data when you visit our website or contact us through it.';
require_once __DIR__ . '/includes/header.php';
$bp = htmlspecialchars($base_path);
$email = htmlspecialchars(SITE_EMAIL);
$phone = htmlspecialchars(SITE_PHONE);
?>

<main class="page-service page-legal page-legal-premium">
    <section class="hero service-hero legal-hero has-media" id="legal-hero">
        <div class="hero-orbs" aria-hidden="true"><span class="orb orb-1"></span><span class="orb orb-2"></span><span class="orb orb-3"></span></div>
        <div class="hero-particles" id="heroParticles" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal reveal-scale">
                <span class="eyebrow">Legal · Quantum Infoway</span>
                <h1>Privacy <span class="gradient-text">Policy</span></h1>
                <p class="legal-updated">Effective date: 3 August 2026</p>
                <p>How Quantum Infoway collects, uses, shares, and protects personal data when you visit our website or contact us through it.</p>
                <div class="hero-actions">
                    <a href="#legal-body" class="btn btn-primary btn-lg">Read the policy</a>
                    <a href="<?php echo route_attr('terms-and-conditions'); ?>" class="btn btn-ghost btn-lg">Terms &amp; Conditions</a>
                </div>
                <div class="hero-trust-pills" aria-label="Policy highlights">
                    <span>India data fiduciary</span>
                    <span>EU / UK controller</span>
                    <span>No sale of personal data</span>
                </div>
            </div>
            <div class="svc-hero-media legal-hero-panel reveal reveal-up" aria-hidden="true">
                <div class="legal-hero-card">
                    <span class="legal-hero-card-label">At a glance</span>
                    <ul>
                        <li>Contact &amp; enquiry data</li>
                        <li>Analytics &amp; security logs</li>
                        <li>Rights under DPDP / GDPR</li>
                        <li>Grievance redressal</li>
                    </ul>
                    <a href="#contact">Contact privacy team →</a>
                </div>
            </div>
        </div>
    </section>

    <nav class="svc-subnav legal-subnav" aria-label="On this page">
        <div class="container svc-subnav-inner">
            <a href="#intro">Overview</a>
            <a href="#collect">Data we collect</a>
            <a href="#purpose">Why we process</a>
            <a href="#cookies">Cookies</a>
            <a href="#recipients">Recipients</a>
            <a href="#rights">Your rights</a>
            <a href="#contact">Contact</a>
        </div>
    </nav>

    <section class="section" id="legal-body">
        <div class="container legal-layout">
            <aside class="legal-toc reveal reveal-up" aria-label="Contents">
                <strong>Contents</strong>
                <ol>
                    <li><a href="#collect">Personal data we collect</a></li>
                    <li><a href="#purpose">Why we process this data</a></li>
                    <li><a href="#cookies">Cookies and similar technologies</a></li>
                    <li><a href="#recipients">Who receives your data</a></li>
                    <li><a href="#transfers">International transfers</a></li>
                    <li><a href="#retention">How long we keep data</a></li>
                    <li><a href="#rights">Your rights</a></li>
                    <li><a href="#grievance">Grievance redressal</a></li>
                    <li><a href="#security">Security</a></li>
                    <li><a href="#ai">Automated decisions and AI</a></li>
                    <li><a href="#changes">Changes</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ol>
            </aside>

            <article class="legal-panel legal-prose reveal reveal-up" id="intro">
                <p>This Privacy Policy describes how Quantum Infoway (“Quantum Infoway”, “we”, “us”, or “our”), with its principal place of business in India, collects, uses, shares, and protects personal data when you visit this website (the “Site”) or contact us through it.</p>
                <p>For visitors in India, Quantum Infoway acts as the data fiduciary for the processing described here. For visitors in the European Union, the United Kingdom, and similar jurisdictions, Quantum Infoway acts as the data controller.</p>
                <p>This Privacy Policy applies only to personal data we collect as a controller or fiduciary through the Site. It does not cover personal data we process on behalf of our clients as a data processor under separate service agreements, including data inside the applications we build and operate for them, which is governed by those agreements and by the privacy policies of the respective clients.</p>

                <h2 id="collect">1. Personal data we collect</h2>
                <p>We collect the following categories of personal data, depending on how you use the Site:</p>
                <ul>
                    <li><strong>Contact form data.</strong> When you submit our contact or inquiry form: your name, business email address, phone number, company or service interest, your message, and your optional answer to how you heard about us.</li>
                    <li><strong>Scheduling data.</strong> If you book a call through a scheduling link we share: the name, email address, and meeting details you provide to that scheduling provider.</li>
                    <li><strong>Visit attribution data.</strong> To understand how visitors find us, the Site may store in your browser (localStorage and cookies, for up to 90 days): the website that referred you to us, any campaign parameters in the link you used, the page you landed on, and a short history of pages you visit on the Site. If you submit a contact form, this attribution data may be attached to your enquiry.</li>
                    <li><strong>Analytics data.</strong> Through analytics tools we configure (for example Google Tag Manager and Google Analytics, where enabled): approximate location, device and browser type, pages viewed, and interaction events, associated with analytics identifiers stored in cookies.</li>
                    <li><strong>Technical log data.</strong> Our hosting provider records IP addresses and request data in server logs for security and operations.</li>
                    <li><strong>Bot protection signals.</strong> To protect our forms from spam and automated abuse, we and our security providers may process limited technical signals when you interact with a form, such as your IP address and browser type, solely to help distinguish human visitors from bots.</li>
                    <li><strong>Communication data.</strong> If you choose to contact us by email, phone, or messaging apps, we receive the messages and contact details you send us there. Use of those apps is also governed by their own terms and privacy policies.</li>
                </ul>
                <p>We do not knowingly collect data from children. The Site is intended for business audiences and is not directed to persons under 18 years of age.</p>

                <h2 id="purpose">2. Why we process this data</h2>
                <div class="legal-table-wrap">
                    <table class="legal-table">
                        <thead>
                            <tr>
                                <th>Purpose</th>
                                <th>Data used</th>
                                <th>Basis (EU and UK visitors)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Responding to your enquiry and providing a quote or consultation</td>
                                <td>Contact form data, scheduling data</td>
                                <td>Steps prior to entering a contract</td>
                            </tr>
                            <tr>
                                <td>Sales follow-up on a business enquiry</td>
                                <td>Contact form data, attribution data</td>
                                <td>Legitimate interest in B2B business development</td>
                            </tr>
                            <tr>
                                <td>Understanding which channels bring visitors and enquiries</td>
                                <td>Attribution data, analytics data</td>
                                <td>Consent</td>
                            </tr>
                            <tr>
                                <td>Improving Site content and performance</td>
                                <td>Analytics data</td>
                                <td>Consent</td>
                            </tr>
                            <tr>
                                <td>Site security, abuse prevention, and operations</td>
                                <td>Technical log data, bot protection signals</td>
                                <td>Legitimate interest in securing the Site</td>
                            </tr>
                            <tr>
                                <td>Complying with law and responding to lawful requests</td>
                                <td>Any of the above</td>
                                <td>Legal obligation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>For visitors in India, we process the data you give us when you submit a form on the basis of your voluntary provision of it for the stated purpose, and other data as permitted by applicable law.</p>

                <h2 id="cookies">3. Cookies and similar technologies</h2>
                <p><strong>Microsoft Clarity.</strong> If you accept analytics, we load Microsoft Clarity to understand site usage through session recordings and heatmaps. Our integration masks enquiry forms and keeps advertising storage consent denied. We store your analytics choice in localStorage for 180 days. Use <strong>Cookie preferences</strong> in the footer to change your choice. Rejecting on your first visit prevents Clarity from loading. If you withdraw consent after it has loaded, we send a denied consent signal; Clarity may continue limited cookieless measurement on that page, and will not load on subsequent pages while your choice remains rejected. See <a href="https://privacy.microsoft.com/privacystatement" target="_blank" rel="noopener noreferrer">Microsoft’s Privacy Statement</a>.</p>
                <p>The Site may use the following:</p>
                <div class="legal-table-wrap">
                    <table class="legal-table">
                        <thead>
                            <tr>
                                <th>Technology</th>
                                <th>What it does</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Analytics cookies (for example Google Tag Manager / Analytics, where enabled)</td>
                                <td>Analytics measurement of visits and interactions</td>
                                <td>Per provider cookie settings, typically up to 2 years</td>
                            </tr>
                            <tr>
                                <td>First-party attribution storage</td>
                                <td>Records the source that brought you to the Site and your page history on the Site</td>
                                <td>Up to 90 days for attribution; session scope for page history</td>
                            </tr>
                            <tr>
                                <td>Scheduling embed cookies</td>
                                <td>Operate any scheduling widget we embed or link to</td>
                                <td>Set by the scheduling provider</td>
                            </tr>
                            <tr>
                                <td>Security / bot protection</td>
                                <td>Helps detect and block automated bots on our forms (strictly necessary security)</td>
                                <td>Session or short-lived</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p>Visitors in the European Union, the European Economic Area, and the United Kingdom may be shown a consent mechanism before non-essential analytics and attribution technologies run, where we implement one. All visitors can manage or delete cookies and localStorage through their browser settings at any time. Disabling some cookies may affect site functionality.</p>

                <h2 id="recipients">4. Who receives your data</h2>
                <p>We share personal data only as described here, and we do not sell personal data or share it for cross-context behavioural advertising:</p>
                <ul>
                    <li><strong>Service providers (processors).</strong> Tools that help us manage enquiries, email, analytics, hosting, form security, and scheduling, each under its own contractual and security commitments.</li>
                    <li><strong>Within Quantum Infoway.</strong> Our sales and delivery teams, on a need-to-know basis.</li>
                    <li><strong>Authorities.</strong> Where required to comply with a legal obligation, court order, or lawful request, or to protect our rights, users, or the public.</li>
                    <li><strong>Business transfers.</strong> If Quantum Infoway is involved in a merger, acquisition, or asset sale, personal data may be transferred as part of that transaction under equivalent protections.</li>
                </ul>

                <h2 id="transfers">5. International transfers</h2>
                <p>Quantum Infoway operates from India and may work with team members and service providers in other countries, including the USA. Our providers may store data in data centres located in India, the USA, or elsewhere. Where data of EU or UK visitors is transferred outside the EU or UK, we rely on appropriate safeguards, including Standard Contractual Clauses and other mechanisms implemented by our providers in their data processing terms, where applicable. We do not transfer personal data to any country or territory restricted by a notification of the Central Government of India under the Digital Personal Data Protection Act, 2023.</p>

                <h2 id="retention">6. How long we keep data</h2>
                <ul>
                    <li><strong>Enquiry and CRM data:</strong> for as long as needed to handle your enquiry and maintain a business relationship, reviewed periodically, and no longer than 5 years after our last meaningful contact unless a longer period is required by law or an active engagement.</li>
                    <li><strong>Visit attribution data:</strong> up to 90 days in your browser; if attached to an enquiry, it is retained with the enquiry record.</li>
                    <li><strong>Analytics data:</strong> per the retention period configured in our analytics tools and provider policies.</li>
                    <li><strong>Server logs:</strong> for a short rolling period for security and operations.</li>
                </ul>
                <p>When data is no longer needed for its stated purpose, we delete or anonymise it.</p>

                <h2 id="rights">7. Your rights</h2>
                <p>If you are in India, you have the right under the Digital Personal Data Protection Act, 2023 to: access a summary of your personal data and the processing applied to it, correct or complete inaccurate data, request erasure of data that is no longer necessary, nominate a person to exercise your rights in case of death or incapacity, withdraw consent where processing is based on consent (withdrawal is as easy as giving consent), and raise a grievance with us. If you are not satisfied with our response, you may complain to the Data Protection Board of India.</p>
                <p>If you are in the EU or UK, you have the right to: access your personal data, rectify it, erase it, restrict or object to its processing (including an absolute right to object to direct marketing), receive it in a portable format, withdraw consent at any time without affecting prior processing, and lodge a complaint with your supervisory authority, such as your national data protection authority or the UK Information Commissioner.</p>
                <p>If you are in the USA, most state privacy laws apply above visitor volume thresholds that this Site may not meet, and generally exempt data about individuals acting in a business capacity. We nonetheless honour reasonable access, correction, and deletion requests from any US visitor. We do not sell personal information.</p>
                <p>Visitors in Canada, Australia, Singapore, the UAE, and elsewhere may exercise equivalent rights by contacting us as described below.</p>
                <p>To exercise any right, email <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> with the subject line “Privacy Request”. We will verify your identity and respond within the time required by applicable law.</p>

                <h2 id="grievance">8. Grievance redressal</h2>
                <p>In accordance with Indian law, you may raise any grievance regarding the processing of your personal data with our Grievance Officer at Quantum Infoway, India. Email: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> (subject line “Grievance”). Phone: <a href="tel:+918511108041"><?php echo $phone; ?></a>.</p>
                <p>We acknowledge grievances promptly and aim to resolve them within one month, and in any case within the period required by applicable law.</p>

                <h2 id="security">9. Security</h2>
                <p>We apply reasonable and appropriate technical and organisational measures to protect personal data, including encryption in transit where appropriate, access controls, and the security programmes of our providers. No method of transmission or storage is completely secure, and we cannot guarantee absolute security. In the event of a personal data breach affecting you, we will notify you and the relevant authorities as required by applicable law.</p>

                <h2 id="ai">10. Automated decisions and AI</h2>
                <p>We do not use personal data collected through this Site to train artificial intelligence models, and we do not make decisions producing legal or similarly significant effects about you by solely automated means.</p>

                <h2 id="changes">11. Changes to this policy</h2>
                <p>We may update this Privacy Policy from time to time. Material changes will be posted on this page with a new effective date. Please review this page periodically. Continued use of the Site after an update constitutes acknowledgement of the updated policy.</p>

                <h2 id="contact">12. Contact</h2>
                <p>For any question about this Privacy Policy or our data practices, contact <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>, call <a href="tel:+918511108041"><?php echo $phone; ?></a>, or use our <a href="<?php echo route_attr('contact-us'); ?>">contact page</a>.</p>
                <p class="legal-cross">Also see our <a href="<?php echo route_attr('terms-and-conditions'); ?>">Terms &amp; Conditions</a>.</p>
            </article>
        </div>
    </section>

    <section class="section dark-band" id="legal-cta">
        <div class="container">
            <div class="service-cta-band has-rays reveal reveal-up">
                <img class="cta-rays" src="<?php echo htmlspecialchars($base_path); ?>assets/images/services/brand__light-rays-effect-bg.webp" alt="" aria-hidden="true">
                <h2>Have a privacy or data question?</h2>
                <p>Reach out and we will respond within one business day.</p>
                <a href="<?php echo route_attr('contact-us'); ?>" class="btn btn-primary btn-lg">Contact Us</a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
