<?php
/**
 * Join Our Team — career application form partial.
 * Expects $base_path from the including page when needed for assets; routes use route_attr().
 */
?>
<form class="inquiry-form join-team-form" id="joinTeamForm" action="<?php echo route_attr('career-handler'); ?>" method="post" enctype="multipart/form-data" novalidate>
    <div class="join-team-form-head">
        <span class="join-team-form-badge">Careers</span>
        <h3>Apply to join our team</h3>
        <p>Share your details and CV. We review every application carefully.</p>
    </div>

    <div class="form-row two-col">
        <div>
            <label for="jt_name">Full name *</label>
            <input type="text" id="jt_name" name="name" required autocomplete="name" placeholder="Your name" maxlength="120">
        </div>
        <div>
            <label for="jt_email">Email *</label>
            <input type="email" id="jt_email" name="email" required autocomplete="email" placeholder="you@example.com" maxlength="190">
        </div>
    </div>

    <div class="form-row two-col">
        <div>
            <label for="jt_phone">Phone *</label>
            <input type="tel" id="jt_phone" name="phone" required autocomplete="tel" placeholder="+91 ..." maxlength="20">
        </div>
        <div>
            <label for="jt_city">Current city</label>
            <input type="text" id="jt_city" name="city" autocomplete="address-level2" placeholder="City" maxlength="80">
        </div>
    </div>

    <div class="form-row two-col">
        <div>
            <label for="jt_position">Position applying for *</label>
            <select id="jt_position" name="position" required>
                <option value="">Select a role</option>
                <option>Laravel</option>
                <option>React</option>
                <option>Angular</option>
                <option>Node.js</option>
                <option>Python</option>
                <option>Full Stack</option>
                <option>AI Engineer</option>
                <option>Flutter</option>
                <option>DevOps</option>
                <option>UI/UX</option>
                <option>QA</option>
                <option>Other</option>
            </select>
        </div>
        <div>
            <label for="jt_experience">Years of experience *</label>
            <select id="jt_experience" name="experience" required>
                <option value="">Select experience</option>
                <option>Fresher</option>
                <option>1–2</option>
                <option>3–5</option>
                <option>6–8</option>
                <option>9+</option>
            </select>
        </div>
    </div>

    <div class="form-row two-col">
        <div>
            <label for="jt_linkedin">LinkedIn URL</label>
            <input type="url" id="jt_linkedin" name="linkedin" autocomplete="url" placeholder="https://linkedin.com/in/..." maxlength="255">
        </div>
        <div>
            <label for="jt_portfolio">Portfolio / GitHub URL</label>
            <input type="url" id="jt_portfolio" name="portfolio" autocomplete="url" placeholder="https://github.com/..." maxlength="255">
        </div>
    </div>

    <div class="form-row">
        <label for="jt_cv">CV / Resume * <span class="join-team-file-hint">(PDF, DOC, DOCX — max 5 MB)</span></label>
        <div class="join-team-file" id="joinTeamFileDrop">
            <input type="file" id="jt_cv" name="cv" required accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
            <label for="jt_cv" class="join-team-file-ui">
                <span class="join-team-file-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/>
                        <path d="M14 3v5h5"/>
                        <path d="M12 11v6"/>
                        <path d="m9.5 13.5 2.5-2.5 2.5 2.5"/>
                    </svg>
                </span>
                <span class="join-team-file-copy">
                    <strong class="join-team-file-title">Drop your CV here, or browse</strong>
                    <span class="join-team-file-meta" id="joinTeamFileMeta">PDF, DOC, or DOCX up to 5 MB</span>
                </span>
                <span class="join-team-file-btn">Browse files</span>
            </label>
        </div>
    </div>

    <div class="form-row">
        <label for="jt_message">Cover letter / Message *</label>
        <textarea id="jt_message" name="message" rows="4" required placeholder="Tell us about your background, strengths, and what you want to build with us..." maxlength="5000"></textarea>
    </div>

    <div class="hp-field" aria-hidden="true" hidden>
        <label for="qx_hp_field_career">Leave blank</label>
        <input type="text" id="qx_hp_field_career" name="qx_hp_field" value="" tabindex="-1" autocomplete="new-password" inputmode="none">
    </div>

    <p class="form-privacy">By submitting, you agree to our <a href="<?php echo route_attr('privacy-policy'); ?>">Privacy Policy</a> and <a href="<?php echo route_attr('terms-and-conditions'); ?>">Terms &amp; Conditions</a>.</p>

    <button type="submit" class="btn btn-primary btn-block" id="joinTeamSubmitBtn">
        <span class="btn-text">Submit application</span>
        <span class="btn-loading" aria-hidden="true" hidden>
            <span class="btn-spinner"></span>
            <span>Sending...</span>
        </span>
    </button>
    <div class="form-status" id="joinTeamFormStatus" role="status" aria-live="polite"></div>
</form>
