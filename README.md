# Quantum Infoway Website

Marketing website for **Quantum Infoway** — IT solutions company pages covering services, hire-developer profiles, blogs, and contact/inquiry forms.

Built as a PHP site with Composer dependencies (PHPMailer + phpdotenv), MySQL for inquiry storage, and SMTP for email delivery.

## Requirements

- PHP **8.0+**
- [Composer](https://getcomposer.org/)
- MySQL or MariaDB
- A web server (OSPanel, Apache, or Nginx) with the document root pointed at this project folder

## Quick start

1. **Clone the repository**

   ```bash
   git clone <repository-url> quantuminfoway.com
   cd quantuminfoway.com
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Configure environment**

   ```bash
   cp .env.example .env
   ```

   Edit `.env` with your database and SMTP credentials. Never commit `.env`.

4. **Create the database**

   Import the schema:

   ```bash
   mysql -u root -p < database/schema.sql
   ```

   Or run the SQL in your MySQL client / phpMyAdmin. The default schema creates database `test_quantuminfoway` and an `inquiries` table.

5. **Point the vhost document root** at this project directory and open the site in your browser.

## Environment variables

| Variable | Purpose |
| --- | --- |
| `APP_URL` | Public site URL (used in config / absolute links) |
| `DB_CONNECTION` | Database driver (default: `mysql`) |
| `DB_HOST` | Database host (OSPanel often uses `127.0.1.17`) |
| `DB_PORT` | Database port (default: `3306`) |
| `DB_DATABASE` | Database name |
| `DB_USERNAME` | Database user |
| `DB_PASSWORD` | Database password |
| `DB_CHARSET` | Connection charset (default: `utf8mb4`) |
| `SMTP_HOST` | SMTP server hostname |
| `SMTP_PORT` | SMTP port (typically `587` for TLS) |
| `SMTP_ENCRYPTION` | Encryption (`tls` or `ssl`) |
| `SMTP_USER` | SMTP username / email |
| `SMTP_PASS` | SMTP password (use a Gmail **App Password**, not your login password) |
| `SMTP_FROM` | From address for inquiry emails |
| `SMTP_FROM_NAME` | From display name |
| `SMTP_TO` | Inbox that receives inquiry notifications |

Configuration is loaded in `includes/config.php` via `vlucas/phpdotenv`.

## Clean URL routing

Apache (OSPanel) uses [`.htaccess`](.htaccess) so pages are served without `.php` in the browser:

| Page | Clean route |
| --- | --- |
| Home | `/` |
| About | `/about-us` |
| Contact | `/contact-us` |
| Services index | `/services` |
| Service detail | `/services/ai-development` |
| Hire index | `/hire` |
| Hire detail | `/hire/react-developer` |
| Form endpoint | `/form-handler` |

- Old `*.php` URLs 301-redirect to the clean path.
- Build links with `route('about-us')` or `route_attr('services/ai-development')` from [`includes/config.php`](includes/config.php) (both accept optional `.php` and `#hash` suffixes).
- Requires Apache `mod_rewrite` and `AllowOverride` for `.htaccess` (default in OSPanel).

## Project structure

```
.
├── assets/              # CSS, JS, images
├── data/                # Runtime logs (inquiries.log is gitignored)
├── database/
│   └── schema.sql       # MySQL schema for inquiries
├── hire/                # Individual hire-developer landing pages
├── includes/            # Shared PHP (config, DB, mail, header/footer, hire sections)
├── services/            # Individual service pages
├── .env.example         # Environment template (copy to .env)
├── .htaccess            # Clean URL rewrites (Apache)
├── composer.json        # PHP dependencies
├── form-handler.php     # Contact/inquiry POST endpoint (JSON)
├── index.php            # Home
├── about-us.php
├── blogs.php
├── contact-us.php
├── hire.php             # Hire developers index
├── services.php         # Services index
├── privacy-policy.php
├── terms-and-conditions.php
└── sitemap.php
```

### Key includes

| File | Role |
| --- | --- |
| `includes/config.php` | Env loading, site constants, DB/mail settings |
| `includes/db.php` | MySQL connection helper |
| `includes/mail.php` | PHPMailer SMTP sending |
| `includes/header.php` / `footer.php` | Shared layout |

## Contact / inquiry flow

1. Visitor submits a form on Home or Contact Us.
2. Browser `POST`s to `form-handler.php`.
3. A honeypot field (`qx_hp_field`) silently rejects bots.
4. Valid submissions are stored in the MySQL `inquiries` table.
5. An email is sent via PHPMailer using the SMTP settings in `.env`.
6. Failures may also be appended to `data/inquiries.log` (directory is kept via `data/.gitkeep`).

Response format is JSON (`success` / `message`).

## Local development notes

- **OSPanel MySQL:** MariaDB/MySQL is often bound to `127.0.1.17` instead of `127.0.0.1`. Match `DB_HOST` in `.env` to your panel settings.
- **Gmail SMTP:** Enable 2-Step Verification, create an [App Password](https://support.google.com/accounts/answer/185833), and put that in `SMTP_PASS`. `SMTP_FROM` should match the same Gmail account as `SMTP_USER`.
- **Composer lock:** `composer.lock` is committed so `composer install` reproduces the same dependency versions.

## Contact

- **Site:** [quantuminfoway.com](https://quantuminfoway.com)
- **Email:** info@quantuminfoway.com
- **Phone:** +91 85111 08041
- **Hours:** Mon–Fri 10am–7pm
