<?php
/**
 * Shared client logo marquee.
 * Home is the source list. Other pages include this instead of keeping a separate strip.
 */

function client_logo_items(): array
{
    return [
        ['src' => 'assets/images/client-canadian-wood.png', 'alt' => 'Canadian Wood'],
        ['src' => 'assets/images/client-fountains.png', 'alt' => 'Fountains'],
        ['src' => 'assets/images/client-kallony.jpg', 'alt' => 'Kallony'],
        ['src' => 'assets/images/client-rudrablessings.png', 'alt' => 'Rudra Blessings'],
        [
            'src' => 'assets/images/clients/ooltool.png',
            'alt' => 'OolTool',
            'href' => 'https://www.ooltool.com',
            'class' => 'client-logo-lockup',
        ],
        ['src' => 'assets/images/client1.jpg', 'alt' => 'Client'],
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
                    $img = '<img src="' . $src . '" alt="' . $alt . '"' . $class . '>';
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
