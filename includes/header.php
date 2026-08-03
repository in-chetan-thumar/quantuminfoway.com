<?php
require_once __DIR__ . '/config.php';
$page_title = isset($page_title) ? $page_title : SITE_NAME . ' | Premium IT Solutions';
$page_description = isset($page_description)
    ? $page_description
    : 'Quantum Infoway — AI-native product development, custom web applications, mobile apps, and intelligent IT solutions.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($base_path); ?>assets/images/favicon.png">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($base_path); ?>assets/css/style.css">
    <script>
      document.documentElement.classList.add("js");
      if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        document.documentElement.classList.add("preload");
      }
    </script>
</head>
<body class="is-loading">
    <!-- Premium page loader -->
    <div class="page-loader" id="pageLoader" role="status" aria-live="polite" aria-label="Loading">
        <div class="loader-inner">
            <div class="loader-mark-wrap">
                <svg class="loader-ring" viewBox="0 0 80 80" aria-hidden="true">
                    <circle class="loader-ring-track" cx="40" cy="40" r="34"/>
                    <circle class="loader-ring-progress" cx="40" cy="40" r="34"/>
                </svg>
                <span class="loader-mark">Q</span>
            </div>
            <p class="loader-brand">Quantum<em>Infoway</em></p>
            <div class="loader-bar" aria-hidden="true"><span></span></div>
        </div>
    </div>

    <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>
    <div class="page-glow" aria-hidden="true"></div>

    <!-- Side section progress rail -->
    <nav class="scroll-rail" id="scrollRail" aria-label="Section navigation">
        <span class="scroll-rail-track" aria-hidden="true"></span>
        <span class="scroll-rail-fill" id="scrollRailFill" aria-hidden="true"></span>
        <div class="scroll-rail-dots" id="scrollRailDots"></div>
    </nav>

    <header class="site-header" id="siteHeader">
        <div class="container header-inner">
            <a href="<?php echo htmlspecialchars($base_path); ?>index.php" class="brand" aria-label="<?php echo htmlspecialchars(SITE_NAME); ?>">
                <span class="brand-mark">Q</span>
                <span class="brand-text">Quantum<em>Infoway</em></span>
            </a>

            <nav class="nav" id="mainNav" aria-label="Primary">
                <!-- Services -->
                <div class="nav-item" data-dropdown>
                    <button type="button" class="nav-link drop-trigger" aria-expanded="false" aria-haspopup="true">
                        Services
                        <svg class="chev" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="mega-menu mega-services">
                        <div class="mega-body">
                            <div class="mega-col">
                                <span class="mega-title">AI &amp; Automation</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/ai-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3l1.2 3.6L17 8l-3.8 1.4L12 13l-1.2-3.6L7 8l3.8-1.4L12 3z"/><path d="M18.5 14.5l.7 2.1 2.1.7-2.1.7-.7 2.1-.7-2.1-2.1-.7 2.1-.7.7-2.1z"/></svg></span>
                                    AI Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/agentic-ai.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="7" y="8" width="10" height="9" rx="3"/><path d="M9 8V6a3 3 0 0 1 6 0v2M9 17v2M15 17v2M5 12h2M17 12h2"/><circle cx="10" cy="12.5" r="0.8" fill="currentColor"/><circle cx="14" cy="12.5" r="0.8" fill="currentColor"/></svg></span>
                                    AI Agents
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/ai-automation.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="6" cy="12" r="2.5"/><circle cx="18" cy="7" r="2.5"/><circle cx="18" cy="17" r="2.5"/><path d="M8.3 11.2l7-3.4M8.3 12.8l7 3.4"/></svg></span>
                                    AI Automation
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/ai-integration.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3"/></svg></span>
                                    AI Integration
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/conversational-ai.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span>
                                    Conversational AI
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/claude-code-ai-for-teams.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M13 2 4 14h7l-1 8 10-14h-7l1-6z"/></svg></span>
                                    Claude Code for Teams
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/generative-ai.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M9 4l.9 2.7L12.5 7.5 9.9 8.3 9 11l-.9-2.7L5.5 7.5l2.6-.8L9 4z"/><path d="M16.5 10l.7 2.1 2.1.7-2.1.7-.7 2.1-.7-2.1-2.1-.7 2.1-.7.7-2.1z"/><path d="M14 16.5l.5 1.5 1.5.5-1.5.5-.5 1.5-.5-1.5-1.5-.5 1.5-.5.5-1.5z"/></svg></span>
                                    Generative AI
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/ai-powered-qa-testing.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3 4 7v5c0 5 3.4 8.4 8 9 4.6-.6 8-4 8-9V7l-8-4z"/><path d="m9 12 2 2 4-4"/></svg></span>
                                    AI QA &amp; Testing
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">Web, Mobile &amp; Product</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/custom-software-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/></svg></span>
                                    Custom Software Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/enterprise-application-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 21V9l8-5 8 5v12"/><path d="M9 21V12h6v9"/><path d="M4 9h16"/></svg></span>
                                    Enterprise App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/react-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="2.2"/><ellipse cx="12" cy="12" rx="9" ry="3.8"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(120 12 12)"/></svg></span>
                                    React Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/web-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.8 2.5 15.2 0 18M12 3c-2.5 2.8-2.5 15.2 0 18"/></svg></span>
                                    Web App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/mobile-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
                                    Mobile App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/ui-ux-design.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.6 7.6"/></svg></span>
                                    UI/UX Design
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/web-mobile-applications.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2" y="4" width="13" height="10" rx="1.5"/><rect x="11" y="10" width="7" height="10" rx="1.5"/><path d="M5 18h4"/></svg></span>
                                    Web &amp; Mobile Applications
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">No-Code, Backend &amp; MVP</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/no-code-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 3 3 8l9 5 9-5-9-5z"/><path d="M3 12l9 5 9-5"/><path d="M3 16l9 5 9-5"/></svg></span>
                                    No-Code &amp; Low-Code
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/xano-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v6c0 1.7 3.6 3 8 3s8-1.3 8-3V5"/><path d="M4 11v6c0 1.7 3.6 3 8 3s8-1.3 8-3v-6"/></svg></span>
                                    Xano Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/mvp-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M5 19c1-6 4-9 7-11l1 4 4 1c-2 3-5 6-11 6z"/><path d="M13 8l3-5 1 4 4 1-5 3"/></svg></span>
                                    MVP Build &amp; Rescue
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/lovable-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M20.8 5.6a5.5 5.5 0 0 0-7.8 0L12 6.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 22l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg></span>
                                    Lovable Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/node-js-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="4" width="18" height="4" rx="1"/><rect x="3" y="10" width="18" height="4" rx="1"/><rect x="3" y="16" width="18" height="4" rx="1"/></svg></span>
                                    Node.js Development
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">Cloud, Data &amp; Workspace</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/cloud-and-devops.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M18 10h-1.3A5.5 5.5 0 0 0 7.1 9.2 4 4 0 0 0 7 17h11a3.5 3.5 0 0 0 0-7z"/></svg></span>
                                    Cloud &amp; DevOps
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/data-analytics-and-science.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 19V9M10 19V5M16 19v-7M22 19V8"/></svg></span>
                                    Data Analytics &amp; Data Science
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/google-workspace.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span>
                                    Google Workspace Partner
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">Industry Solutions</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/fintech-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 21h18M5 21V10l7-5 7 5v11"/><path d="M9 21v-6h6v6"/><path d="M9 13h6"/></svg></span>
                                    Fintech App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/healthcare-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M7 12h10"/></svg></span>
                                    Healthcare App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/real-estate-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 10.5 12 3l9 7.5V21a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1v-10.5z"/></svg></span>
                                    Real Estate App Development
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>services/travel-app-development.php" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 20-7z"/></svg></span>
                                    Travel App Development
                                </a>
                            </div>
                        </div>
                        <div class="mega-foot">
                            <a href="<?php echo htmlspecialchars($base_path); ?>services.php">View all services →</a>
                        </div>
                    </div>
                </div>

                <!-- Hire Developer -->
                <?php $hire_ico = htmlspecialchars($base_path) . 'assets/images/services/'; $hire_href = htmlspecialchars($base_path) . 'contact-us.php'; $hire_base = htmlspecialchars($base_path) . 'hire/'; ?>
                <div class="nav-item" data-dropdown>
                    <button type="button" class="nav-link drop-trigger" aria-expanded="false" aria-haspopup="true">
                        Hire Developer
                        <svg class="chev" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="mega-menu mega-hire">
                        <div class="mega-body">
                            <div class="mega-col">
                                <span class="mega-title">No-Code Development</span>
                                <a href="<?php echo $hire_base; ?>xano-developer.php" class="mega-link" title="Xano">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__xano-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Xano
                                </a>
                                <a href="<?php echo $hire_base; ?>weweb-developer.php" class="mega-link" title="WeWeb">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__weweb-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    WeWeb
                                </a>
                                <a href="<?php echo $hire_base; ?>webflow-developer.php" class="mega-link" title="Webflow">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__webflow-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Webflow
                                </a>
                                <a href="<?php echo $hire_base; ?>bubble-developer.php" class="mega-link" title="Bubble">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__bubble-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Bubble
                                </a>
                                <a href="<?php echo $hire_base; ?>flutterflow-developer.php" class="mega-link" title="FlutterFlow">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__flutterflow-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    FlutterFlow
                                </a>
                                <a href="<?php echo $hire_base; ?>supabase-developer.php" class="mega-link" title="Supabase">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__supabase-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Supabase
                                </a>
                                <a href="<?php echo $hire_base; ?>lovable-developer.php" class="mega-link" title="Lovable">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__lovable-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Lovable
                                </a>
                            </div>
                            <div class="mega-col mega-col-wide">
                                <span class="mega-title">Code Stacks</span>
                                <div class="mega-col-grid">
                                    <a href="<?php echo $hire_base; ?>node-js-developer.php" class="mega-link" title="Node.js">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__nodejs-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Node.js
                                    </a>
                                    <a href="<?php echo $hire_base; ?>laravel-developer.php" class="mega-link" title="Laravel">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__laravel-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Laravel
                                    </a>
                                    <a href="<?php echo $hire_base; ?>react-developer.php" class="mega-link" title="React">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__reactjs-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        React
                                    </a>
                                    <a href="<?php echo $hire_base; ?>angular-developer.php" class="mega-link" title="Angular">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__angular-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Angular
                                    </a>
                                    <a href="<?php echo $hire_base; ?>flutter-developer.php" class="mega-link" title="Flutter">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__flutter-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Flutter
                                    </a>
                                    <a href="<?php echo $hire_base; ?>shopify-developer.php" class="mega-link" title="Shopify">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__shopify-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Shopify
                                    </a>
                                    <a href="<?php echo $hire_base; ?>wordpress-developer.php" class="mega-link" title="WordPress">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__wordpress-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        WordPress
                                    </a>
                                    <a href="<?php echo $hire_base; ?>swift-ios-developer.php" class="mega-link" title="iOS">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__ios-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        iOS
                                    </a>
                                    <a href="<?php echo $hire_base; ?>kotlin-android-developer.php" class="mega-link" title="Android">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__android-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Android
                                    </a>
                                    <a href="<?php echo $hire_base; ?>nextjs-developer.php" class="mega-link" title="Next.js">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__nextjs-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Next.js
                                    </a>
                                    <a href="<?php echo $hire_base; ?>python-developer.php" class="mega-link" title="Python">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__python-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Python
                                    </a>
                                    <a href="<?php echo $hire_base; ?>java-spring-boot-developer.php" class="mega-link" title="Java">
                                        <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__java-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                        Java
                                    </a>
                                    <a href="<?php echo $hire_base; ?>full-stack-developer.php" class="mega-link" title="Full Stack">
                                        <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/></svg></span>
                                        Full Stack
                                    </a>
                                </div>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">AI &amp; Analytics</span>
                                <a href="<?php echo $hire_base; ?>langchain-developer.php" class="mega-link" title="LangChain">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__langchain-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    LangChain
                                </a>
                                <a href="<?php echo $hire_base; ?>chatgpt-developer.php" class="mega-link" title="ChatGPT">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__chatgpt-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    ChatGPT
                                </a>
                                <a href="<?php echo $hire_base; ?>whisper-developer.php" class="mega-link" title="Whisper">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 10v3"/><path d="M6 6v11"/><path d="M10 3v18"/><path d="M14 8v7"/><path d="M18 5v13"/><path d="M22 10v3"/></svg></span>
                                    Whisper
                                </a>
                                <a href="<?php echo $hire_base; ?>ai-engineer.php" class="mega-link" title="AI Engineer">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 8V4H8"/><rect width="16" height="12" x="4" y="8" rx="2"/><path d="M2 14h2"/><path d="M20 14h2"/><path d="M15 13v2"/><path d="M9 13v2"/></svg></span>
                                    AI Engineer
                                </a>
                                <a href="<?php echo $hire_base; ?>data-scientist.php" class="mega-link" title="Data Science">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 3v16a2 2 0 0 0 2 2h16"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg></span>
                                    Data Science
                                </a>
                                <a href="<?php echo $hire_base; ?>claude-developer.php" class="mega-link" title="Claude">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__claude-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Claude
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">Managed Cloud &amp; DevOps</span>
                                <a href="<?php echo $hire_base; ?>gcp-developer.php" class="mega-link" title="GCP">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__gcp-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    GCP
                                </a>
                                <a href="<?php echo $hire_base; ?>azure-developer.php" class="mega-link" title="Azure">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__azure-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    Azure
                                </a>
                                <a href="<?php echo $hire_base; ?>aws-developer.php" class="mega-link" title="AWS">
                                    <span class="mega-ico mega-ico-logo"><img src="<?php echo $hire_ico; ?>tech__nav__aws-nav.svg" alt="" width="28" height="28" loading="lazy"></span>
                                    AWS
                                </a>
                                <a href="<?php echo $hire_base; ?>devops-engineer.php" class="mega-link" title="DevOps">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 0 0 0-8c-2 0-4 1.33-6 4Z"/></svg></span>
                                    DevOps
                                </a>
                            </div>
                        </div>
                        <div class="mega-foot">
                            <a href="<?php echo htmlspecialchars($base_path); ?>hire.php">Browse all roles →</a>
                        </div>
                    </div>
                </div>

                <!-- Case Studies -->
                <div class="nav-item" data-dropdown>
                    <button type="button" class="nav-link drop-trigger" aria-expanded="false" aria-haspopup="true">
                        Case Studies
                        <svg class="chev" viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2"><path d="m6 9 6 6 6-6"/></svg>
                    </button>
                    <div class="mega-menu mega-cases">
                        <div class="mega-body">
                            <div class="mega-col">
                                <span class="mega-title">Web &amp; E-Commerce</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg></span>
                                    Full-Scale E-Commerce Platform
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></span>
                                    Brand Platform CMS
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="2" y="4" width="20" height="14" rx="2"/><path d="M8 21h8"/></svg></span>
                                    Product Marketing Site
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">AI &amp; Platforms</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></span>
                                    Operations Management Web App
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M12 2a4 4 0 0 1 4 4v1h1a3 3 0 0 1 0 6h-1v1a4 4 0 0 1-8 0v-1H7a3 3 0 0 1 0-6h1V6a4 4 0 0 1 4-4z"/></svg></span>
                                    AI Student Management Platform
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M3 3v18h18"/><path d="M7 14l4-4 4 3 5-6"/></svg></span>
                                    AI E-Commerce Analytics
                                </a>
                            </div>
                            <div class="mega-col">
                                <span class="mega-title">Mobile Apps</span>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
                                    Customer-Facing Mobile App
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></span>
                                    Loyalty &amp; Booking App
                                </a>
                                <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio" class="mega-link">
                                    <span class="mega-ico"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg></span>
                                    Push Notification Platform
                                </a>
                            </div>
                        </div>
                        <div class="mega-foot">
                            <a href="<?php echo htmlspecialchars($base_path); ?>index.php#portfolio">View all case studies →</a>
                        </div>
                    </div>
                </div>

                <a href="<?php echo htmlspecialchars($base_path); ?>blogs.php" class="nav-link">Blogs</a>
                <a href="<?php echo htmlspecialchars($base_path); ?>about-us.php" class="nav-link">About Us</a>
                <a href="<?php echo htmlspecialchars($base_path); ?>contact-us.php" class="btn btn-primary btn-sm nav-cta">Contact Us <span aria-hidden="true">→</span></a>
            </nav>

            <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>
