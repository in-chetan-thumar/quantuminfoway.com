<?php
http_response_code(404);
header('X-Robots-Tag: noindex, nofollow');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Page Not Found | Quantum Infoway</title>
    <link rel="icon" href="/assets/images/favicon.png">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; background: radial-gradient(ellipse at top left, #292055 0, transparent 55%), #0b0e1e; color: #f4f6ff; font: 16px/1.6 Arial, Helvetica, sans-serif; }
        header { max-width: 1120px; margin: auto; padding: 30px 24px; }
        header img { width: 240px; height: 48px; max-width: 100%; object-fit: contain; }
        main { max-width: 680px; margin: 6vh auto 0; padding: 24px 24px 64px; text-align: center; }
        .code { margin: 0; color: #a69aff; font-size: clamp(90px, 20vw, 156px); font-weight: 800; line-height: 1.1; letter-spacing: -6px; }
        h1 { font-size: clamp(28px, 5vw, 42px); margin: 20px 0 12px; line-height: 1.2; }
        p { color: #bdc5dc; max-width: 470px; margin: 0 auto 28px; }
        nav { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; }
        a { color: #c1b9ff; }
        .button { display: inline-block; padding: 12px 22px; border: 1px solid #514c74; border-radius: 10px; color: #fff; text-decoration: none; font-weight: 600; }
        .primary { background: #6350e8; border-color: #6350e8; }
        .button:hover { background: #39305f; }
        a:focus-visible { outline: 3px solid #b4caff; outline-offset: 5px; }
        .help { margin-top: 32px; font-size: 14px; }
    </style>
</head>
<body>
    <header><a href="/" aria-label="Quantum Infoway home"><img src="/assets/images/brand/logo-email-dark.png" alt="Quantum Infoway" width="240" height="48"></a></header>
    <main>
        <div class="code" aria-hidden="true">404</div>
        <h1>We couldn’t find that page.</h1>
        <p>The link may be outdated, or the address may have a typo. Let’s get you back to the right place.</p>
        <nav aria-label="Find your next page">
            <a class="button primary" href="/">Back to home</a>
            <a class="button" href="/services">Explore services</a>
        </nav>
        <p class="help">Need a hand? <a href="/contact-us">Contact our team</a></p>
    </main>
</body>
</html>
