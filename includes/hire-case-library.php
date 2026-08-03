<?php
/**
 * Reusable hire work case cards mapped to QI service images.
 * Pages assign $hire_work_cards = [ hire_case('highlands'), ... ];
 */
if (!function_exists('hire_case')) {
    function hire_case($key)
    {
        static $cases = null;
        if ($cases === null) {
            $cases = [
                'highlands' => [
                    'tags' => ['Education', 'USA'],
                    'images' => [
                        'case-studies__highlands-brain__redesign__solution-mockup.webp',
                        'case-studies__highlands-brain__redesign__hero-1.webp',
                        'case-studies__highlands-brain__redesign__hero-2.webp',
                    ],
                    'alt' => 'Highlands Community Charter AI learning platform',
                    'title' => 'Integrated three AI features that reduced compliance effort by 97% for 15,000+ learners',
                    'bullets' => [
                        'Brain AI knowledge base answering student and staff queries instantly',
                        'English Master adaptive language module with pronunciation feedback',
                        'Two-way live translation for multilingual student populations',
                        'Compliance document generation for audit-ready reports',
                    ],
                    'metrics' => [
                        ['97%', 'Compliance effort reduction'],
                        ['25%', 'Faster English acquisition'],
                        ['15,000+', 'Learners supported'],
                    ],
                ],
                'highlands_short' => [
                    'tags' => ['Education', 'USA'],
                    'images' => [
                        'case-studies__highlands-brain__redesign__solution-mockup.webp',
                        'case-studies__highlands-brain__redesign__hero-1.webp',
                        'case-studies__highlands-brain__redesign__hero-2.webp',
                    ],
                    'alt' => 'AI learning platform',
                    'title' => 'Integrated three AI features that reduced compliance effort by 97% for 15,000+ learners',
                    'bullets' => [
                        'Brain AI knowledge base answering student and staff queries instantly',
                        'Two-way live translation enabling multilingual communication',
                        'Adaptive language learning with real-time pronunciation feedback',
                    ],
                    'metrics' => [
                        ['97%', 'Compliance effort reduction'],
                        ['25%', 'Faster English acquisition'],
                        ['15,000+', 'Multilingual support'],
                    ],
                ],
                'fintech_loan' => [
                    'tags' => ['Fintech', 'USA'],
                    'images' => [
                        'case-studies__digital-wealth-onboarding__mockup.webp',
                        'case-studies__digital-wealth-onboarding__hero-1.webp',
                        'case-studies__digital-wealth-onboarding__hero-2.webp',
                    ],
                    'alt' => 'Fintech loan and compliance platform',
                    'title' => 'Delivered 99.9% transaction accuracy and 100% regulatory compliance pass rate',
                    'bullets' => [
                        'Tested loan origination workflows end-to-end from application to disbursement',
                        'Validated KYC verification processes for accuracy and regulatory adherence',
                        'Performed security testing of payment processing and EMI management flows',
                        'Verified mobile app reliability across devices and network conditions',
                    ],
                    'metrics' => [
                        ['99.9%', 'Transaction accuracy'],
                        ['100%', 'Regulatory compliance pass rate'],
                        ['60%', 'Faster release cycles'],
                    ],
                ],
                'franchiselab' => [
                    'tags' => ['Operations SaaS', 'Australia'],
                    'images' => [
                        'case-studies__franchiselab__mockup.webp',
                        'case-studies__franchiselab__hero-1.webp',
                        'case-studies__franchiselab__hero-2.webp',
                    ],
                    'alt' => 'FranchiseLab recruitment platform',
                    'title' => 'Data-driven franchise recruitment and network development',
                    'bullets' => [
                        'Platform for franchisee recruitment and onboarding',
                        'Performance assessments and structured interview guides',
                        'Real-time tracking for data-driven oversight',
                    ],
                    'metrics' => [
                        ['40%', 'Recruitment success lift'],
                        ['35%', 'Lower operational costs'],
                        ['30%', 'Higher franchisee retention'],
                    ],
                ],
                'ai_coach' => [
                    'tags' => ['Consumer'],
                    'images' => [
                        'case-studies__ai-chat-platform-consumer-wellness__mockup.webp',
                        'case-studies__ai-chat-platform-consumer-wellness__hero-1.webp',
                        'case-studies__ai-chat-platform-consumer-wellness__hero-2.webp',
                    ],
                    'alt' => 'Conversational AI coach',
                    'title' => 'Built a conversational AI coach achieving 4.2/5 user satisfaction with 65% return rate',
                    'bullets' => [
                        'Personalized relationship guidance through empathetic, context-aware dialogue',
                        'Session continuity and conversation history for ongoing coaching',
                        'Emotional intelligence to recognize sentiment shifts and adjust tone',
                        'Structured exercises and reflection prompts based on conversation themes',
                    ],
                    'metrics' => [
                        ['4.2/5', 'User satisfaction'],
                        ['3x', 'Average session length'],
                        ['65%', 'Return rate'],
                    ],
                ],
                'edtech_content' => [
                    'tags' => ['EdTech'],
                    'images' => [
                        'case-studies__ai-learning-platform-concept__mockup.webp',
                        'case-studies__ai-learning-platform-concept__hero-1.webp',
                        'case-studies__ai-learning-platform-concept__hero-2.webp',
                    ],
                    'alt' => 'AI-powered learning platform',
                    'title' => 'Reduced content creation time by 60% with an AI-powered learning platform',
                    'bullets' => [
                        'Converts uploaded documents into structured course modules',
                        'Auto-generates quizzes calibrated to learning objectives',
                        'Interactive presentations with speaker notes and engagement prompts',
                        'Conversational tutor for guided Q&A and concept reinforcement',
                    ],
                    'metrics' => [
                        ['60%', 'Less content creation time'],
                        ['35%', 'Higher learner engagement'],
                        ['10,000+', 'Active learners'],
                    ],
                ],
                'vc_webflow' => [
                    'tags' => ['Finance', 'India'],
                    'images' => [
                        'case-studies__blue-kite__mockup.webp',
                        'case-studies__blue-kite__hero-1.webp',
                        'case-studies__blue-kite__hero-2.webp',
                    ],
                    'alt' => 'Venture capital firm website',
                    'title' => 'Designed a modern digital presence for a venture capital firm managing 30+ portfolio companies',
                    'bullets' => [
                        'Investor-grade website design reflecting enterprise software focus',
                        'Dynamic portfolio showcase with filtering by sector and stage',
                        'Founder community landing page with program details and applications',
                        'Team profile pages with leadership bios and investment thesis',
                    ],
                    'metrics' => [
                        ['30+', 'Portfolio companies showcased'],
                        ['2x', 'Inbound inquiries'],
                        ['<2s', 'Page load time'],
                    ],
                ],
                'nirvan' => [
                    'tags' => ['Real Estate'],
                    'images' => [
                        'case-studies__nirvan-realty__mockup.webp',
                        'case-studies__nirvan-realty__hero-1.webp',
                        'case-studies__nirvan-realty__hero-2.webp',
                    ],
                    'alt' => 'Student housing marketplace on Bubble',
                    'title' => 'Built a student housing marketplace connecting universities and accommodation providers on Bubble',
                    'bullets' => [
                        'Dynamic property listing pages with photos, amenities, pricing, and campus proximity',
                        'Advanced search by location, budget, room type, and distance',
                        'Student inquiry and booking workflow with document verification',
                        'Owner dashboard for listings, availability, and tenant communications',
                    ],
                    'metrics' => [
                        ['500+', 'Listings managed'],
                        ['60%', 'Faster tenant matching'],
                        ['40%', 'Less manual coordination'],
                    ],
                ],
                'instant_ex' => [
                    'tags' => ['Fintech', 'Poland'],
                    'images' => [
                        'case-studies__instant-ex__redesign__solution-mockup.webp',
                        'case-studies__instant-ex__redesign__hero-1.webp',
                        'case-studies__instant-ex__redesign__hero-2.webp',
                    ],
                    'alt' => 'Instant-ex cross-border remittance app',
                    'title' => 'Shipped a cross-border money transfer app delivering 85% of transfers in under 10 minutes',
                    'bullets' => [
                        'FlutterFlow with a Xano backend for disciplined time-to-market',
                        'Multi-corridor remittance from Europe to African markets',
                        'Mobile money and direct bank-deposit payouts',
                        'Real-time transfer tracking with delivery confirmation',
                    ],
                    'metrics' => [
                        ['85%', 'Transfers under 10 min'],
                        ['5', 'Remittance corridors'],
                        ['4.2★', 'Store rating'],
                    ],
                ],
                'ip_legal' => [
                    'tags' => ['Legal Tech', 'Ireland'],
                    'images' => [
                        'case-studies__online-dispute-resolution-platform__device.webp',
                        'case-studies__ai-document-intelligence__hero-1.webp',
                        'case-studies__ai-document-intelligence__hero-2.webp',
                    ],
                    'alt' => 'AI-powered IP management app',
                    'title' => 'Developed an AI-powered IP management app that accelerates patent and trademark workflows',
                    'bullets' => [
                        'Structured intake for IP assets and filing status',
                        'Document intelligence for prior-art and submission prep',
                        'Dashboards for portfolio owners and counsel',
                    ],
                    'metrics' => [
                        ['Faster', 'Filing prep cycles'],
                        ['AI', 'Document review'],
                        ['Cloud', 'Portfolio access'],
                    ],
                ],
                'nl_analytics' => [
                    'tags' => ['E-Commerce SaaS', 'India'],
                    'images' => [
                        'case-studies__ecomm-pulse__redesign__solution-mockup.webp',
                        'case-studies__ecomm-pulse__redesign__hero-1.webp',
                        'case-studies__ecomm-pulse__redesign__hero-2.webp',
                    ],
                    'alt' => 'Natural language analytics bot',
                    'title' => 'Democratized data access with a natural language analytics bot cutting reporting time by 50%',
                    'bullets' => [
                        'Users query marketplace data in plain English without SQL',
                        'Results as interactive tables, summaries, or visualizations',
                        'Cross-table queries spanning multiple data sources',
                        'Query history and saved reports for recurring questions',
                    ],
                    'metrics' => [
                        ['50%', 'Faster reporting'],
                        ['NLQ', 'Natural language query'],
                        ['Self-serve', 'Democratized data access'],
                    ],
                ],
                'distributor' => [
                    'tags' => ['Manufacturing', 'India'],
                    'images' => [
                        'case-studies__manufacturing-sales-operations__mockup.webp',
                        'case-studies__manufacturing-sales-operations__hero-1.webp',
                        'case-studies__manufacturing-sales-operations__hero-2.webp',
                    ],
                    'alt' => 'Distributor portal for industrial products',
                    'title' => 'Designed a distributor portal that cut order processing time by 35%',
                    'bullets' => [
                        'Complex SKU navigation with multi-level filtering for 1,000+ products',
                        'Self-service ordering flow integrated with ERP backends',
                        'Search UX optimized for technical specs and part numbers',
                        'Responsive layouts for field sales teams on tablets',
                    ],
                    'metrics' => [
                        ['35%', 'Faster order processing'],
                        ['2x', 'Product discovery speed'],
                        ['40%', 'Fewer support queries'],
                    ],
                ],
                'meditation' => [
                    'tags' => ['Health', 'USA'],
                    'images' => [
                        'case-studies__deep-meditate__redesign__app-01.webp',
                        'case-studies__deep-meditate__redesign__app-02.webp',
                        'case-studies__deep-meditate__redesign__app-03.webp',
                    ],
                    'alt' => 'Meditation app redesign',
                    'title' => 'Redesigned a meditation app to drive 500K+ downloads and 15% paid conversion growth',
                    'bullets' => [
                        'Onboarding redesigned to reduce drop-off and guide first sessions',
                        'Personalized recommendations and category navigation',
                        'Visual hierarchy to surface premium content',
                        'Consistent design system across iOS and Android',
                    ],
                    'metrics' => [
                        ['500K+', 'Downloads'],
                        ['15%', 'Paid conversion growth'],
                        ['iOS+Android', 'Unified design system'],
                    ],
                ],
                'smart_home' => [
                    'tags' => ['Smart Home IoT', 'India'],
                    'images' => [
                        'case-studies__nuos__redesign__solution-mockup.webp',
                        'case-studies__nuos__redesign__hero-1.webp',
                        'case-studies__nuos__redesign__hero-2.webp',
                    ],
                    'alt' => 'Smart home IoT mobile app',
                    'title' => 'Elevating smart living through seamless app experiences',
                    'bullets' => [
                        'Consumer app with intuitive controls for lights, appliances, and scenes',
                        'Configurator app to simplify technician setup across rooms and floors',
                        'Improved device integration, real-time sync, and remote access',
                    ],
                    'metrics' => [
                        ['2x', 'User satisfaction'],
                        ['40%', 'Faster smart home setup'],
                        ['30%', 'Higher product adoption'],
                    ],
                ],
                'travel_booking' => [
                    'tags' => ['Travel & Hospitality', 'India'],
                    'images' => [
                        'case-studies__stay-vista__stay-vista.webp',
                        'case-studies__stay-vista__redesign__hero-1.webp',
                        'case-studies__stay-vista__redesign__hero-2.webp',
                    ],
                    'alt' => 'AI-powered property matching for travel bookings',
                    'title' => 'Increased booking conversion by 20% with AI-powered property matching',
                    'bullets' => [
                        'Recommendation engine analyzing guest preferences, booking history, and behavioral signals',
                        'Personalized property suggestions from 1,000+ listings in real time',
                        'AI suggestions integrated into search and booking without disrupting UX',
                        'A/B testing framework to measure conversion impact of recommendation placements',
                    ],
                    'metrics' => [
                        ['60%', 'Higher booking conversion'],
                        ['35%', 'More property views'],
                        ['1,000+', 'Listings matched'],
                    ],
                ],
                'dispute' => [
                    'tags' => ['AI Demo', 'Cross-Industry'],
                    'images' => [
                        'case-studies__online-dispute-resolution-platform__device.webp',
                        'case-studies__ai-document-intelligence__hero-1.webp',
                        'case-studies__ai-document-intelligence__hero-2.webp',
                    ],
                    'alt' => 'Dispute resolution platform',
                    'title' => 'Maintained and enhanced a dispute resolution platform managing 10,000+ cases across two continents',
                    'bullets' => [
                        'Case management for intake, scheduling, panel assignments, and document sharing',
                        'White-label capability for branded dispute-resolution centers',
                        'Financial module with invoicing, fee tracking, and automated billing',
                        'Integrations for e-signature, practice management, and calendar sync',
                    ],
                    'metrics' => [
                        ['10,000+', 'Cases managed'],
                        ['2', 'Regions (AU & US)'],
                        ['35%', 'Faster case resolution'],
                    ],
                ],
                'abc_luxury' => [
                    'tags' => ['E-Commerce', 'India'],
                    'images' => [
                        'case-studies__abc-carpet-home__redesign__hero-1.webp',
                        'case-studies__abc-carpet-home__redesign__hero-2.webp',
                        'case-studies__abc-carpet-home__redesign__hero-3.webp',
                    ],
                    'alt' => 'Luxury e-commerce experience on Shopify',
                    'title' => 'Designed a luxury e-commerce experience for 200,000+ SKUs on Shopify',
                    'bullets' => [
                        'Product detail pages with rich imagery, material swatches, and room-scene visualization',
                        'Collection and category navigation for 200,000+ SKUs across furniture, rugs, and decor',
                        'Responsive storefront with consistent luxury brand experience on mobile and desktop',
                        'Inventory management interfaces for staff-facing operational tools',
                    ],
                    'metrics' => [
                        ['50%', 'Inventory management efficiency'],
                        ['25%', 'Sales boost'],
                        ['30%', 'Engagement increase'],
                    ],
                ],
                'dicom_phi' => [
                    'tags' => ['Healthcare AI', 'Europe'],
                    'images' => [
                        'case-studies__dicom-imaging-phi-detection__mockup.webp',
                        'case-studies__dicom-imaging-phi-detection__hero-1.webp',
                        'case-studies__dicom-imaging-phi-detection__hero-2.webp',
                    ],
                    'alt' => 'PHI redaction pipeline for medical imaging',
                    'title' => 'Built a PHI redaction pipeline for medical imaging that preserved diagnostic quality',
                    'bullets' => [
                        'Three layers of detection across PHI surfaces in DICOM files',
                        'Diagnostic image quality treated as a hard constraint',
                        'Network-isolated, in-house deployment for sensitive data',
                        'Complete per-file audit trail, defensible in a compliance review',
                    ],
                    'metrics' => [
                        ['3 layers', 'Of PHI protection'],
                        ['Intact', 'Diagnostic quality'],
                        ['In-network', 'Deployment'],
                    ],
                ],
                'worxogo' => [
                    'tags' => ['Enterprise SaaS', 'AI', 'India'],
                    'images' => [
                        'case-studies__fleet-management-platform__mockup.webp',
                        'case-studies__fleet-management-platform__hero-1.webp',
                        'case-studies__fleet-management-platform__hero-2.webp',
                    ],
                    'alt' => 'Enterprise AI behavioural nudge platform on Laravel',
                    'title' => 'Built the Laravel platform behind an enterprise AI behavioural nudge product',
                    'bullets' => [
                        'Laravel backend architected for enterprise procurement on security and scale',
                        'AI engineer embedded alongside platform engineers for model and data architecture',
                        'Behavioural nudge model serving contextual prompts at the individual employee level',
                        'Platform foundation used to onboard large enterprise customers',
                    ],
                    'metrics' => [
                        ['Laravel', 'Enterprise platform backend'],
                        ['Embedded', 'AI engineer on the team'],
                        ['Enterprise', 'Customers onboarded'],
                    ],
                ],
                'wealth_onboarding' => [
                    'tags' => ['Fintech', 'Wealth'],
                    'images' => [
                        'case-studies__digital-wealth-onboarding__mockup.webp',
                        'case-studies__digital-wealth-onboarding__hero-1.webp',
                        'case-studies__digital-wealth-onboarding__hero-2.webp',
                    ],
                    'alt' => 'Digital wealth onboarding for HNI clients',
                    'title' => 'Digital wealth onboarding for HNI clients',
                    'bullets' => [
                        'Digital onboarding flow with automated KYC and document verification',
                        'Secure client portal for real-time portfolio tracking and communication',
                        'Streamlined advisor workflows for compliance and service efficiency',
                    ],
                    'metrics' => [
                        ['50%', 'Faster onboarding'],
                        ['25%', 'Higher client satisfaction'],
                        ['2x', 'Advisor productivity'],
                    ],
                ],
            ];
        }
        if (!isset($cases[$key])) {
            return $cases['highlands'];
        }
        return $cases[$key];
    }
}
