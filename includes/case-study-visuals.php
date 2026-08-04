<?php
/**
 * Lightweight visual helpers for premium case study pages.
 */

if (!function_exists('cs_render_role_architecture')) {
    function cs_render_role_architecture(array $roles): void
    {
        ?>
        <div class="cs-arch" aria-hidden="true">
            <div class="cs-arch-core">Platform Core</div>
            <div class="cs-arch-roles">
                <?php foreach ($roles as $role): ?>
                    <div class="cs-arch-role">
                        <strong><?php echo htmlspecialchars($role['name']); ?></strong>
                        <span><?php echo htmlspecialchars($role['desc']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('cs_render_process_diagram')) {
    function cs_render_process_diagram(array $steps): void
    {
        $count = count($steps);
        $mid = (int) ceil($count / 2);
        $row1 = array_slice($steps, 0, $mid);
        $row2 = array_slice($steps, $mid);
        ?>
        <div class="cs-process" aria-label="Process flow diagram">
            <div class="cs-process-row">
                <?php foreach ($row1 as $i => $step): ?>
                    <div class="cs-process-step">
                        <span class="cs-process-num"><?php echo str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                        <span class="cs-process-label"><?php echo htmlspecialchars($step); ?></span>
                    </div>
                    <?php if ($i < count($row1) - 1): ?><span class="cs-process-arrow" aria-hidden="true"></span><?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php if ($row2): ?>
                <div class="cs-process-row">
                    <?php foreach ($row2 as $i => $step): ?>
                        <div class="cs-process-step">
                            <span class="cs-process-num"><?php echo str_pad((string) ($mid + $i + 1), 2, '0', STR_PAD_LEFT); ?></span>
                            <span class="cs-process-label"><?php echo htmlspecialchars($step); ?></span>
                        </div>
                        <?php if ($i < count($row2) - 1): ?><span class="cs-process-arrow" aria-hidden="true"></span><?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

if (!function_exists('cs_render_image_frame')) {
    function cs_render_image_frame(string $src, string $alt, string $variant = 'web'): void
    {
        $isMobile = $variant === 'mobile';
        ?>
        <div class="cs-device <?php echo $isMobile ? 'cs-device-phone-frame' : 'cs-device-web'; ?>" aria-hidden="true">
            <?php if (!$isMobile): ?>
                <div class="cs-device-chrome">
                    <span></span><span></span><span></span>
                    <div class="cs-device-url">app.quantuminfoway.com</div>
                </div>
            <?php endif; ?>
            <div class="cs-device-shot<?php echo $isMobile ? ' is-mobile' : ''; ?>">
                <img src="<?php echo htmlspecialchars($src); ?>" alt="<?php echo htmlspecialchars($alt); ?>" loading="lazy" width="960" height="540">
            </div>
        </div>
        <?php
    }
}
