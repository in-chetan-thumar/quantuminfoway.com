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
                <?php if (count($testimonials) > 1): ?>
                <div class="testimonial-controls">
                    <button type="button" class="ctrl-btn" id="prevReview" aria-label="Previous review">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <div class="dots" id="reviewDots"></div>
                    <button type="button" class="ctrl-btn" id="nextReview" aria-label="Next review">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}
