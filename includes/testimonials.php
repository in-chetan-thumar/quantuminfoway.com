<?php

function site_testimonials()
{
    return [
        [
            'quote' => "I've worked with Chetan Thumar and Quantum Infoway for more than four years, and he has become one of the partners I trust most. Chetan has real integrity. He always thinks about what's best for the customer and does the right thing, even when it isn't the easy option. He understands technology deeply, communicates clearly, and delivers reliably, project after project. He provides excellent value while maintaining a high standard of work. I recommend Chetan without hesitation.",
            'initials' => 'CL',
            'name' => 'Chandraprakash Loonker',
            'role' => 'Data Engineer, Anthropic',
        ],
        [
            'quote' => 'Quantum Infoway — fantastic agency. Very quick on the job. Great communication. Extremely professional. Posses range too!',
            'initials' => 'IG',
            'name' => 'Inodeas G.',
            'role' => 'Canada',
        ],
        [
            'quote' => 'Fast, reliable, knowledgeable and very responsive to meet my deadlines. I would definitely recommend Quantum Infoway!',
            'initials' => 'RC',
            'name' => 'Rene C.',
            'role' => 'United States',
        ],
        [
            'quote' => 'Quantum Infoway did a good job. Chetan kept on track and was very diligent in getting the job done.',
            'initials' => 'SS',
            'name' => 'Sean S.',
            'role' => 'United States',
        ],
        [
            'quote' => 'I have done several projects with Quantum Infoway — great and very responsive. He did everything I needed and very fast. Highly recommend.',
            'initials' => 'SO',
            'name' => 'Sohan',
            'role' => 'United States',
        ],
        [
            'quote' => 'Quantum Infoway had an incredibly meticulous approach from day one. They delivered a great product with a clean UX/UI while meeting the timelines. Their high-quality designs and professionalism were impressive.',
            'initials' => 'ST',
            'name' => 'Suhrid Thacker',
            'role' => 'CEO, KATALYSST',
        ],
        [
            'quote' => 'Quantum Infoway is well-versed in a wide range of capabilities. The team is consistently available, responds promptly to communications, and works efficiently. Their low-code skills are remarkable.',
            'initials' => 'MC',
            'name' => 'Mike Coulbourn',
            'role' => 'CEO, Skip-Tracing Tech',
        ],
        [
            'quote' => "Their strong point is that they deliver on what they promise when so many companies don't. They provided an excellent service, offering guidance and support throughout the development process.",
            'initials' => 'PG',
            'name' => 'Paul Gill',
            'role' => 'Founder, Barko Friends',
        ],
        [
            'quote' => "We're very impressed with their responsiveness and communication skills. Quantum Infoway has done an excellent job of managing their timelines to make sure each iteration is accomplished in a timely manner.",
            'initials' => 'BV',
            'name' => 'Bobby Valentine',
            'role' => 'Product Manager, Highlands Charter',
        ],
        [
            'quote' => "They have good uptake and communication and hit the expected deadlines. I'm impressed with their speed — it allowed us to deliver a finished product with all features under budget.",
            'initials' => 'E',
            'name' => 'Executive',
            'role' => 'Health Coaching Platform',
        ],
        [
            'quote' => "The team knows what they are doing! They take a business-first approach and understand the needs of the client before recommending tech solutions. We're highly satisfied.",
            'initials' => 'PS',
            'name' => 'Pratik Shah',
            'role' => 'Director, Printgraph Machinery',
        ],
        [
            'quote' => 'Founder and management clarity and commitment. The team culture and quality of communication were impressive. Very engaged, committed developers.',
            'initials' => 'C',
            'name' => 'COO',
            'role' => 'Rocketeer',
        ],
        [
            'quote' => 'We were always kept in the loop with the progress. The website serves as a great B2B tool. I trusted the team to do a great job, which they absolutely did!',
            'initials' => 'F',
            'name' => 'Founder',
            'role' => 'The Postcard Life',
        ],
        [
            'quote' => "They made modifications until everything was working. Thanks to Quantum Infoway's efforts, our crowdfunding received over 300 donation submissions through the custom form.",
            'initials' => 'SI',
            'name' => 'Stéphane Itschner',
            'role' => 'CEO, ALT Codes',
        ],
        [
            'quote' => 'Their knowledge of Xano and ability to partner with clients from the other side of the world are impressive. They successfully launched the product, generating value for our business.',
            'initials' => 'C',
            'name' => 'CPO',
            'role' => 'Payment Processing Co.',
        ],
        [
            'quote' => 'Quantum Infoway successfully delivered functional code that met the business requirements. The team was punctual, and we were impressed with their professional approach.',
            'initials' => 'PO',
            'name' => 'Product Owner',
            'role' => 'Real Estate Agency',
        ],
        [
            'quote' => 'They were highly responsive, transparent about progress, and quick to address questions or blockers. We received the complete backend development on time and within budget.',
            'initials' => 'C',
            'name' => 'CEO',
            'role' => 'FinTech Startup',
        ],
        [
            'quote' => 'Their ability to provide capable resources who quickly get up to speed is impressive. The team maintained clear and consistent communication throughout the project.',
            'initials' => 'DO',
            'name' => 'Director of Technology',
            'role' => 'Education Platform',
        ],
        [
            'quote' => 'They showcased impressive prototypes that helped us understand the service very well. Thanks to Quantum Infoway, we met our timelines for introducing new features.',
            'initials' => 'OH',
            'name' => 'Operations Head',
            'role' => 'Logistics Co.',
        ],
        [
            'quote' => 'They did an amazing job with the quality of work and speed of delivery. Quantum Infoway made my platform really chic, and their team was extremely punctual.',
            'initials' => 'F',
            'name' => 'Founder',
            'role' => 'Jewelry Brand',
        ],
    ];
}

function render_site_testimonials()
{
    static $rendered = false;
    if ($rendered) {
        return;
    }
    $rendered = true;

    $testimonials = site_testimonials();
    ?>
    <section class="section reviews" id="reviews">
        <div class="container">
            <div class="section-head reveal reveal-up">
                <span class="eyebrow">Client Love</span>
                <h2>Client <span class="gradient-text">Testimonials</span></h2>
                <p>We help private, public, and social business sectors realize their most important goals.</p>
            </div>

            <div class="testimonials reveal reveal-scale" id="testimonials">
                <div class="testimonial-track" id="testimonialTrack">
                    <?php foreach ($testimonials as $item): ?>
                    <article class="testimonial-card">
                        <div class="stars" aria-label="5 star rating">★★★★★</div>
                        <p>“<?php echo htmlspecialchars($item['quote'], ENT_QUOTES, 'UTF-8'); ?>”</p>
                        <div class="author">
                            <span class="avatar"><?php echo htmlspecialchars($item['initials'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <div>
                                <strong><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                <span><?php echo htmlspecialchars($item['role'], ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <div class="testimonial-controls">
                    <button type="button" class="ctrl-btn" id="prevReview" aria-label="Previous review">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <div class="dots" id="reviewDots"></div>
                    <button type="button" class="ctrl-btn" id="nextReview" aria-label="Next review">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <?php
}
