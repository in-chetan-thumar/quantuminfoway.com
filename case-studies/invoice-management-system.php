<?php
$base_path = '../';
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/case-studies-data.php';
$cs = case_study_get('invoice-management-system');
$page_title = $cs['title'] . ' | Quantum Infoway';
$page_description = $cs['tagline'];
$page_og_image = rtrim(SITE_URL, '/') . '/' . ltrim($cs['hero_image'], '/');
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/case-study-sections.php';
cs_render_page($cs);
require_once __DIR__ . '/../includes/footer.php';
