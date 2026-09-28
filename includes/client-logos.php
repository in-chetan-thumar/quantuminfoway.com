<?php
/**
 * Shared client logo marquee.
 * Home is the source list. Other pages include this instead of keeping a separate strip.
 */

function client_logo_items(): array
{
    return [
        ['src' => 'assets/images/client-canadian-wood.png', 'alt' => 'Canadian Wood', 'w' => 226, 'h' => 83],
        ['src' => 'assets/images/client-fountains.png', 'alt' => 'Fountains', 'w' => 271, 'h' => 164],
        ['src' => 'assets/images/client-kallony.jpg', 'alt' => 'Kallony', 'w' => 207, 'h' => 65],
        ['src' => 'assets/images/client-rudrablessings.png', 'alt' => 'Rudra Blessings', 'w' => 209, 'h' => 55],
        [
            'src' => 'assets/images/clients/ooltool.png',
            'alt' => 'OolTool',
            'href' => 'https://www.ooltool.com',
            'class' => 'client-logo-lockup',
            'w' => 1200,
            'h' => 242,
        ],
        ['src' => 'assets/images/client1.jpg', 'alt' => 'Client', 'w' => 296, 'h' => 103],
    ];
}

function render_client_logo_marquee(): void
{
    global $base_path;
    $prefix = (isset($base_path) && $base_path !== '') ? $base_path : '/';
    $items = client_logo_items();
    ?>
    <div class="clients-marquee" aria-label="Client logos">
        <div class="marquee-track">
            <?php foreach ([false, true] as $duplicate): ?>
                <?php foreach ($items as $item): ?>
                    <?php
                    $src = htmlspecialchars($prefix . $item['src'], ENT_QUOTES, 'UTF-8');
                    $alt = $duplicate ? '' : htmlspecialchars($item['alt'], ENT_QUOTES, 'UTF-8');
                    $class = isset($item['class'])
                        ? ' class="' . htmlspecialchars($item['class'], ENT_QUOTES, 'UTF-8') . '"'
                        : '';
                    $size = isset($item['w'], $item['h'])
                        ? ' width="' . (int) $item['w'] . '" height="' . (int) $item['h'] . '"'
                        : '';
                    $img = '<img src="' . $src . '" alt="' . $alt . '" loading="lazy" decoding="async"' . $size . $class . '>';
                    if (!empty($item['href'])) {
                        $href = htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8');
                        $hidden = $duplicate ? ' aria-hidden="true" tabindex="-1"' : '';
                        echo '<a class="client-logo-link" href="' . $href . '" target="_blank" rel="noopener noreferrer"' . $hidden . '>' . $img . '</a>';
                    } else {
                        echo $img;
                    }
                    ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
}
