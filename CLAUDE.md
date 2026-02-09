# CLAUDE.md - VOD Fest 2026

This file provides comprehensive guidance to Claude Code when working on the VOD Fest 2026 project.

## Project Status: ✅ LIVE & PRODUCTION

**Last Updated:** February 9, 2026
**Status:** Fully implemented and deployed on VPS
**Live URL:** https://www.vod-records.com/vod-fest/

---

## Quick Access

### URLs
- **Production:** https://www.vod-records.com/vod-fest/
- **Direct VPS:** http://72.62.148.205/vod-fest/
- **Admin:** https://www.vod-records.com/vod-fest/wp-admin (⚠️ Direktzugriff via IP `72.62.148.205/wp-admin` geht NICHT — WordPress leitet auf die Proxy-URL um)
- **Lineup:** https://www.vod-records.com/vod-fest/lineup/
- **Festival 2025 Recap:** https://www.vod-records.com/vod-fest/festival-2025/
- **User Login:** https://www.vod-records.com/vod-fest/login/
- **User Register:** https://www.vod-records.com/vod-fest/register/
- **User Dashboard:** https://www.vod-records.com/vod-fest/dashboard/
- **Main Site:** https://www.vod-records.com (Hetzner, legacy PHP CMS)

### Server Access
```bash
# SSH to VPS (Hostinger)
ssh root@72.62.148.205

# SSH to Hetzner (legacy site + reverse proxy)
ssh -p 222 maier@dedi99.your-server.de  # Password: LQq6XoRU

# WordPress Directory
cd /var/www/vodfest

# WP-CLI Commands
wp --allow-root [command]
```

### Credentials
- **WP Admin:** https://www.vod-records.com/vod-fest/wp-admin — User: `VOD`, Password: see `.env`
- See `.env` file for all credentials
- **NEVER commit .env to git!**

---

## Project Overview

**VOD Fest 2026 Website** - A bilingual (German/English) music festival website for a 3-day underground/experimental music event in Friedrichshafen, Germany.

### Festival Details
- **Event:** VOD Fest 2026
- **Dates:** July 17-19, 2026 (Friday-Sunday)
- **Location:** Kulturhaus Caserne, Fallenbrunnen 17, 88045 Friedrichshafen, Germany
- **Hours:** 17:00-24:00 each evening
- **Artists:** 21 bands over 3 days
- **Stages:** 2 (Outside Stage, Venue Inside)
- **Ticket Price:** €333 per person, €666 for two
- **Organizer:** Frank Bull (VOD Records)
- **Contact:** frank@vod-records.com

### Key Bands
Hunting Lodge, Esplendor Geométrico, Lydia Lunch/Marc Hurtado, No More, Crash Course in Science, Joachim Irmler (Faust), O Yuki Conjugate, Rapoon, Clair Obscur, The Anti Group, Norma Loy, and 10 more.

---

## Technology Stack

### Core Platform
- **CMS:** WordPress 6.x
- **Theme:** Custom "VOD Fest 2026" Theme (v1.0.4)
- **Server:** Hostinger VPS (Ubuntu 24.04.3 LTS)
- **IP:** 72.62.148.205
- **Port:** 80 (proxied from Hetzner via mod_proxy)
- **Database:** MySQL/MariaDB
- **Reverse Proxy:** Hetzner (vod-records.com) → VPS (72.62.148.205:80)
- **Analytics:** Google Analytics G-53ZSWBBTD2

### Custom Theme
**Location:** `/var/www/vodfest/wp-content/themes/vod-fest-2026/`

**Key Files:**
- `functions.php` - Theme setup, custom post types, meta boxes, shortcodes
- `style.css` - Theme header
- `header.php` - Site header with navigation
- `footer.php` - Site footer with social media
- `front-page.php` - Homepage
- `single-band.php` - Band detail pages (with embeds)
- `archive-band.php` - Lineup overview page
- `template-2025-recap.php` - Festival 2025 recap page template
- `page.php` - Standard pages
- `404.php` - Error page

**CSS Architecture:**
```
/assets/css/
├── variables.css       - CSS custom properties (colors, fonts, spacing)
├── global.css          - Base styles, typography, layout
├── components.css      - UI components (buttons, cards, forms)
├── animations.css      - Keyframe animations
└── cookie-consent.css  - GDPR cookie consent banner & settings modal
```

**JavaScript:**
```
/assets/js/
├── main.js           - Mobile menu, scroll animations, form interactions
└── cookie-consent.js - Cookie consent logic (localStorage, categories, public API)
```

**Templates:**
```
/templates/
└── cookie-consent-banner.php - Cookie consent banner & settings modal (wp_footer hook)
```

**Images:**
```
/assets/images/
├── favicon.svg         - Full VOD FEST 2026 logo
└── favicon-simple.svg  - Simplified "V" icon (active as site icon)
```

### Custom Plugin
**VOD Fest User Area** (v1.0.0)
**Location:** `/var/www/vodfest/wp-content/plugins/vod-fest-user-area/`

**Features:**
- User registration with AJAX
- Login/logout system
- User dashboard with festival info
- Profile editor (name, email, country, phone)
- Newsletter subscription tracking
- Responsive design matching theme

**Plugin Structure:**
```
vod-fest-user-area/
├── vod-fest-user-area.php  - Main plugin file
├── templates/
│   ├── login-form.php      - Login form template
│   ├── register-form.php   - Registration form template
│   ├── dashboard.php       - User dashboard template
│   └── profile.php         - Profile editor template
└── assets/
    ├── style.css           - User area styling
    └── script.js           - AJAX handlers for forms
```

**Auto-Created Pages:**
- `/login/` - Login Form
- `/register/` - Registration Form
- `/dashboard/` - User Dashboard
- `/profile/` - User Profile Editor

---

## Implemented Features

### ✅ 1. Custom Post Types & Taxonomies

**Band Post Type:**
- Slug: `band`
- Archive: `/lineup/`
- Single: `/band/[band-name]/`

**Custom Fields (Meta Boxes):**
- `_band_start_time` - Performance start time
- `_band_end_time` - Performance end time
- `_band_bandcamp_link` - Bandcamp URL
- `_band_bandcamp_embed` - Bandcamp iframe embed code
- `_band_youtube_id` - YouTube video ID
- `_band_website_url` - Official band/artist website URL
- `_thumbnail_id` - Featured image

**Taxonomies:**
- `festival_day` - Friday, Saturday, Sunday
- `stage` - Outside Stage, Venue Inside
- `band_genre` - Industrial, Experimental, Post-Punk, etc.

### ✅ 2. Band Images
**Status:** All 21 bands have images

**All 21 Bands:**
1. JOACHIM IRMLER (FAUST) - Post ID 94
2. NO MORE - Post ID 95
3. DIETRICH VON EULER-DONNERSPERG - Post ID 96
4. IRSOL - Post ID 97 (Media ID 150)
5. O YUKI CONJUGATE - Post ID 98
6. CRASH COURSE IN SCIENCE - Post ID 99 (Media ID 146)
7. HUNTING LODGE - Post ID 100
8. DAS SYNTHETISCHE MISCHGEWEBE - Post ID 101 (Media ID 151)
9. MARC HURTADO / LYDIA LUNCH - Post ID 102
10. RAPOON - Post ID 103
11. NORMA LOY - Post ID 104
12. CLAIR OBSCUR - Post ID 105 (Media ID 152)
13. THE ANTI GROUP - Post ID 106
14. ESPLENDOR GEOMETRICO - Post ID 107
15. PLUS INSTRUMENTS - Post ID 108 (Media ID 149)
16. PARADE GROUND - Post ID 109
17. ETANT DONNES - Post ID 110
18. CLUB MORAL - Post ID 111
19. BAND OF HOLY JOY - Post ID 112
20. ZOSKIA - Post ID 113
21. SUTCLIFFE NO MORE - Post ID 114

### ✅ 3. Bandcamp/YouTube Embeds
**Location:** Single band pages (`single-band.php`)
**Status:** All 21 bands have embeds (20 Bandcamp + YouTube, IRSOL YouTube only)
**Embed style:** Theme-colored Bandcamp players (`bgcol=0D0000`, `linkcol=D4AF37`)

**How to use:**
1. Edit band in wp-admin
2. Scroll to "Media Embeds" meta box
3. Paste Bandcamp iframe code OR enter YouTube video ID
4. Embeds appear automatically in "Listen & Watch" section

### ✅ 4. Newsletter Signup
**Shortcode:** `[newsletter]`
**Method:** mailto:frank@vod-records.com (replaced broken DB form in v1.0.5)

**Active on:**
- All band detail pages (bottom) — via `[newsletter]` shortcode
- Homepage "STAY IN THE LOOP" section — hardcoded in `front-page.php`
- Festival 2025 Recap page — via `[newsletter]` shortcode

**Legacy DB table** (no longer used for new signups):
```sql
SELECT email FROM wp_vod_fest_newsletter ORDER BY subscribed_at DESC;
```

### ✅ 5. Social Media Integration
**Customizer Settings:** Appearance → Customize → Social Media

**Footer Social Link:**
- Facebook only: https://www.facebook.com/vinylondemandrecords (hardcoded in `footer.php` since v1.0.5)

**Footer Website Links:**
- VOD Records: https://www.vod-records.com
- Tape Magazine: https://tape-mag.com

**Display:** Footer on all pages (with hover effects)

### ✅ 6. Favicon
**File:** `/assets/images/favicon-simple.svg`
**Status:** Active as WordPress Site Icon (Media ID 139)
**Display:** Browser tabs on all pages

### ✅ 7. User Area System
**Plugin:** VOD Fest User Area v1.0.0
**Status:** Active

**Features:**
- ✅ User registration with validation
- ✅ Login/logout with remember me
- ✅ User dashboard with festival info
- ✅ Profile editor (name, email, country, phone)
- ✅ AJAX-based forms (no page reloads)
- ✅ Responsive design

**Pages:**
- `/login/` - Post ID 134
- `/register/` - Post ID 135
- `/dashboard/` - Post ID 136
- `/profile/` - Post ID 137

### ✅ 8. Festival 2025 Recap Page
**Template:** `template-2025-recap.php`
**Page:** https://www.vod-records.com/vod-fest/festival-2025/ (Post ID 138)
**Added to navigation:** Primary Menu (position 9)

**Sections:**
- Hero with YouTube video background (Laibach teaser), static image fallback on mobile
- Statistics cards (18 bands, 3 days, 2 stages, 444 attendees)
- Photo gallery (20 real photos in responsive grid)
- Video gallery (9 YouTube embeds via youtube-nocookie.com)
- Artist testimonials (3 cards - editable in template)
- Newsletter CTA

**Photos:** 20 images served from `/wp-content/uploads/images/fest-2025/` (4 by E. Gabriel Edvy, 16 by Cheesy). Hover effects: grayscale-to-color, zoom, caption overlay with credits.

**Videos:** YouTube embeds (unlisted). To add more, add entries to the `$videos` array in `template-2025-recap.php`:
```php
array('id' => 'YOUTUBE_VIDEO_ID', 'title' => 'Band Name', 'type' => 'Teaser'),
```

### ✅ 9. Enhanced Hero Sections
**Files:** `page.php`, `template-2025-recap.php`, `archive-band.php`, `assets/css/animations.css`
**Status:** Active on all content pages

**Page Heroes (Info, Tickets, Contact, Travel, Venue):**
- Background photos from optimized `/uploads/images/fest-2025/heroes/` (266-682KB each)
- Dark gradient overlay (60% → 75% → 85% opacity, top to bottom)
- `heroSlowZoom` animation (20s infinite alternate, scale 1 → 1.08)
- Title: `fadeInDown` (0.3s delay), Tagline: `fadeIn` (0.8s delay)
- Heights: 28vh mobile, 30vh desktop (1024px+)
- Pages without assigned image fall back to solid `--color-blood-red`

**Photo assignments per page slug:**
| Slug | Photo | Source |
|------|-------|--------|
| `info` | `finalprogram_0219bw_e.gabrieledvy.jpg` | E. Gabriel Edvy |
| `tickets` | `laibach-01-cheesy.jpg` | Cheesy |
| `contact` | `abc_0414_e.gabrieledvy.jpg` | E. Gabriel Edvy |
| `travel-accommodation` | `clockdva_0455_e.gabrieledvy.jpg` | E. Gabriel Edvy |
| `venue` | `esplendorg-03-cheesy.jpg` | Cheesy |

**Festival 2025 Recap Hero:**
- YouTube video background (Laibach teaser `IEYvPU_mykc`), muted, looping, no controls
- Static image fallback (`laibach-01-cheesy.jpg`) — always visible on mobile (< 768px, no YT player loaded)
- 1.5s fade-in transition when video is ready (`.is-ready` class)
- Height: 35vh
- YouTube IFrame API loaded via inline `<script>` before footer

**Lineup Hero:**
- Height reduced to 25vh (from 50vh)

**Image optimization:**
- Original festival photos (up to 8MB) resized to max 1920px width, quality 80 via ImageMagick
- Stored in `/wp-content/uploads/images/fest-2025/heroes/` on VPS

### ✅ 10. Cookie Consent Banner (GDPR)
**Files:** `assets/css/cookie-consent.css`, `assets/js/cookie-consent.js`, `templates/cookie-consent-banner.php`
**Loaded via:** `wp_footer` hook in `functions.php`

**Features:**
- Three cookie categories: Necessary (always on), Analytics, Marketing
- Granular toggle switches per category
- Stores consent in `localStorage` key `vod_cookie_consent` (JSON with version tracking)
- Consent version bump triggers re-consent
- Privacy-nocookie YouTube embeds (DSGVO-compliant)
- Keyboard accessible: focus trapping, Escape closes modal
- Fires `cookie-consent-updated` custom event for future integrations

**Public API:**
```js
window.vodCookieConsent.getConsent('analytics')  // true/false
window.vodCookieConsent.showSettings()           // open settings modal
```

### ✅ 11. Reverse Proxy (vod-records.com/vod-fest/)
**Status:** Live since February 8, 2026

**Architecture:**
```
Browser → Hetzner (vod-records.com) → [mod_proxy] → VPS (72.62.148.205:80) → WordPress
```

**Hetzner Side** (`/usr/www/users/maier/neu2013/.htaccess`):
```apache
RewriteRule ^vod-fest(/.*)?$ http://72.62.148.205/vod-fest$1 [P,L]
Header edit Location ^http://72.62.148.205/ https://www.vod-records.com/ env=REDIRECT_STATUS
```

**VPS Side:**
- **VirtualHost** (`/etc/apache2/sites-available/vodfest.conf`): DocumentRoot `/var/www/vodfest`, `AllowOverride All`, `SetEnvIf X-Forwarded-Proto`
- **WordPress `.htaccess`**: Strips `/vod-fest/` prefix via `RewriteRule ^vod-fest/(.*)$ $1 [L]` before standard WordPress rewrite rules
- **wp-config.php**: `WP_HOME`/`WP_SITEURL` = `https://www.vod-records.com/vod-fest`, HTTPS detection via `X-Forwarded-Host` header, `HTTP_HOST` override to `www.vod-records.com` (fixes trailing-slash redirects using VPS IP), cookie paths set to `/vod-fest/`
- **Apache port**: Changed from 8080 to 80 (Docker/Traefik moved to 8880/8443)

**Key files on VPS:**
- `/etc/apache2/sites-available/vodfest.conf` — VirtualHost config
- `/etc/apache2/ports.conf` — Listen 80
- `/var/www/vodfest/.htaccess` — WordPress rewrite + vod-fest prefix strip
- `/var/www/vodfest/wp-config.php` — URLs, HTTPS, cookies

### ✅ 12. Google Analytics
**Measurement ID:** `G-53ZSWBBTD2`
**Status:** Active on entire vod-records.com (main site + /vod-fest/)

**VOD Fest (WordPress):**
- Loaded via `wp_head` hook in `functions.php` (priority 1)
- Uses **Google Consent Mode v2** for GDPR compliance:
  - `analytics_storage` defaults to `denied` (no cookies until consent)
  - Updates to `granted` when user accepts analytics in cookie consent banner
  - Listens for `cookie-consent-updated` custom event for live updates
- Skipped in wp-admin (`is_admin()` check)

**Main vod-records.com (Hetzner):**
- GA tag injected into all 15 `tmpl_*.html` template files
- Standard tracking (no consent gate — legacy site has no consent system)
- Template location: `/usr/www/users/maier/neu2013/tmpl_*.html`
- Backup: `tmpl_standard.html.bak`

### ✅ 14. SEO (Yoast SEO)
**Plugin:** Yoast SEO 26.9 (free)
**Status:** Active since February 9, 2026

**Features:**
- Meta descriptions for all pages + band/lineup templates
- Open Graph tags (og:title, og:description, og:image, og:url)
- Twitter Cards (summary_large_image)
- XML Sitemap: https://www.vod-records.com/vod-fest/sitemap_index.xml
- Canonical URLs on all pages
- JSON-LD MusicEvent schema on homepage (dates, venue, €333 offer, 21 performers)

**JSON-LD Schema (homepage):**
- `@type`: MusicEvent
- `startDate`: 2026-07-17T17:00:00+02:00
- `endDate`: 2026-07-19T24:00:00+02:00
- `location`: Kulturhaus Caserne, Friedrichshafen
- `organizer`: VOD Records
- `offers`: €333 3-Day Pass
- `performer`: All 21 bands with URLs

**Band Page SEO Template:**
- Title: `BAND NAME - VOD Fest 2026 Lineup`
- Description: `BAND NAME live at VOD Fest 2026, July 17-19 in Friedrichshafen...`
- og:image: Band featured image (automatic)

### ✅ 13. Navigation Menu
**Primary Menu** (9 items):
1. Home
2. Lineup
3. Info
4. Tickets
5. Contact
6. Travel
7. Schedule
8. Venue
9. Festival 2025

**Footer Menu** (3 items):
1. Impressum
2. Datenschutzerklärung
3. Terms & Conditions

---

## Pages & Content

### Core Pages
- **Home** (Post ID 5) - Front page with hero, lineup preview
- **Lineup** - Archive of all 21 bands at `/lineup/`
- **Info** (Post ID 6) - Festival info, philosophy, venue
- **Tickets** (Post ID 7) - Pricing, payment info, order form
- **Contact** (Post ID 8) - Contact info + Haftungsausschluss (from vod-records.com)
- **Travel & Accommodation** (Post ID 45) - Hotels, transport
- **Timetable** (Post ID 49) - Schedule overview
- **Venue** (Post ID 84) - Kulturhaus Caserne info + gallery

### Legal Pages (content sourced from vod-records.com)
- **Impressum** (Post ID 73) - §5 TMG site notice (Alpenstrasse 25/1, USt-IdNr DE232493058)
- **Datenschutzerklärung** (Post ID 3) - Full GDPR/DSGVO privacy policy (7 sections incl. Google Analytics, PayPal, Google Fonts, Newsletter)
- **Terms & Conditions** (Post ID 74) - AGB Deutschland/Ausland + Widerrufsbelehrung + Disclaimer

### User Pages
- **Login** (Post ID 134) - `[vod_login]` shortcode
- **Register** (Post ID 135) - `[vod_register]` shortcode
- **Dashboard** (Post ID 136) - `[vod_dashboard]` shortcode
- **My Profile** (Post ID 137) - `[vod_profile]` shortcode

### Special Pages
- **Festival 2025 Recap** (Post ID 138) - Template-based page

---

## Design System

### Color Palette
```css
--color-gold: #D4AF37;         /* Primary accent */
--color-blood-red: #4A0000;    /* Dark background */
--color-black: #0D0000;        /* Darker background */
--color-brass: #BFA160;        /* Muted accent */
--color-cream: #F5F5DC;        /* Body text */
--color-orange: #FF6B35;       /* Hover states */
```

### Typography
```css
--font-display: "Bebas Neue", Impact, sans-serif;  /* Headings */
--font-body: "Inter", system-ui, sans-serif;       /* Body text */
--font-mono: "Roboto Mono", monospace;             /* Code */
```

### Spacing Scale
```css
--space-xs: 0.25rem;   /* 4px */
--space-sm: 0.5rem;    /* 8px */
--space-md: 1rem;      /* 16px */
--space-lg: 1.5rem;    /* 24px */
--space-xl: 2rem;      /* 32px */
--space-2xl: 3rem;     /* 48px */
--space-3xl: 4rem;     /* 64px */
--space-4xl: 6rem;     /* 96px */
--space-5xl: 8rem;     /* 128px */
```

### Component Classes
- `.btn` - Base button
- `.btn-primary` - Gold button (CTA)
- `.btn-secondary` - Outlined button
- `.card` - Content card with border
- `.badge` - Small label/tag
- `.badge-day` - Festival day badge
- `.badge-stage-inside` - Inside stage badge
- `.badge-stage-outside` - Outside stage badge
- `.form-input` - Text input field
- `.band-card` - Band preview card
- `.waveform` - Audio waveform animation

---

## Shortcodes

### Newsletter
```php
[newsletter]
[newsletter title="Custom Title" subtitle="Custom subtitle"]
```

### User Area
```php
[vod_login]      - Login form
[vod_register]   - Registration form
[vod_dashboard]  - User dashboard
[vod_profile]    - Profile editor
```

---

## Database Schema

### Custom Tables

**Newsletter Subscribers:**
```sql
CREATE TABLE wp_vod_fest_newsletter (
    id bigint(20) AUTO_INCREMENT PRIMARY KEY,
    email varchar(100) NOT NULL UNIQUE,
    subscribed_at datetime NOT NULL,
    ip_address varchar(45) NOT NULL
);
```

### Custom Post Meta
- `_band_start_time` - varchar(10) - "18:00"
- `_band_end_time` - varchar(10) - "19:30"
- `_band_bandcamp_link` - text - Full URL
- `_band_bandcamp_embed` - longtext - Full iframe HTML
- `_band_youtube_id` - varchar(20) - Video ID only
- `_band_website_url` - text - Official band/artist website URL

### Theme Mods (Options)
- `vod_fest_facebook` - Facebook URL
- `vod_fest_instagram` - Instagram URL
- `vod_fest_youtube` - YouTube URL
- `vod_fest_bandcamp` - Bandcamp URL
- `site_icon` - Favicon media ID

---

## Development Workflow

### Local Development
Files are in: `/Users/robin/Documents/4_AI/VOD_Fest/`

```
VOD_Fest/
├── .env                        - Credentials (DO NOT COMMIT)
├── .env.example               - Template for credentials
├── CLAUDE.md                  - This file
├── VOD_Fest_Details.md       - Original requirements
├── VOD_Fest_CI.md            - Brand identity guidelines
├── VOD_Fest_Mockups.md       - Site structure & mockups
├── VOD_Fest_Lineup.csv       - Band schedule data
├── wordpress-theme/
│   └── vod-fest-2026/        - Custom theme
└── wordpress-plugins/
    └── vod-fest-user-area/   - User area plugin
```

### Deploy to VPS
```bash
# Upload theme files
cd /Users/robin/Documents/4_AI/VOD_Fest/wordpress-theme/vod-fest-2026
scp -r * root@72.62.148.205:/var/www/vodfest/wp-content/themes/vod-fest-2026/

# Upload plugin
cd /Users/robin/Documents/4_AI/VOD_Fest/wordpress-plugins
scp -r vod-fest-user-area root@72.62.148.205:/var/www/vodfest/wp-content/plugins/

# Clear WordPress cache
ssh root@72.62.148.205 "cd /var/www/vodfest && wp cache flush --allow-root"

# Verify deployment
curl -sI "https://www.vod-records.com/vod-fest/"
```

### Deploy to Hetzner (main vod-records.com)
```bash
# Upload files via SCP (port 222)
scp -P 222 localfile.php maier@dedi99.your-server.de:/usr/www/users/maier/neu2013/

# SSH access (password-based, use expect for automation)
ssh -p 222 maier@dedi99.your-server.de  # Password: LQq6XoRU

# DocumentRoot: /usr/www/users/maier/neu2013/
# Template files: /usr/www/users/maier/neu2013/tmpl_*.html
# .htaccess: /usr/www/users/maier/neu2013/.htaccess
```

### WP-CLI Common Commands
```bash
# SSH to VPS first
ssh root@72.62.148.205
cd /var/www/vodfest

# Posts & Pages
wp post list --post_type=band --fields=ID,post_title --allow-root
wp post create --post_type=page --post_title="Title" --allow-root

# Media
wp media import /path/to/image.jpg --title="Title" --allow-root
wp post meta update POST_ID _thumbnail_id IMAGE_ID --allow-root

# Plugins
wp plugin list --allow-root
wp plugin activate PLUGIN_NAME --allow-root

# Theme
wp theme list --allow-root
wp theme mod set SETTING_NAME "value" --allow-root
wp theme mod get SETTING_NAME --allow-root

# Options
wp option get site_icon --allow-root
wp option update site_icon MEDIA_ID --allow-root

# Menu
wp menu list --allow-root
wp menu item add-post MENU_ID POST_ID --title="Title" --allow-root

# Database
wp db query "SELECT * FROM wp_vod_fest_newsletter;" --allow-root

# Cache
wp cache flush --allow-root
```

---

## Payment Integration

### Bank Transfer (Preferred)
```
Account Holder: Frank Bull
Bank: Volksbank Überlingen
IBAN: DE35690618000060018316
BIC: GENODE61UBE
Reference: [Customer Name + Ticket Quantity]
```

### PayPal (Alternative)
```
Email: frank@vod-records.com
```

**Current Setup:**
- "Get Your Ticket" button on homepage opens mailto:frank@vod-records.com
- Manual processing by organizer
- Email confirmation sent manually
- No automated payment processing (by design - ~100 tickets only)

---

## Security & Best Practices

### What's Protected
- ✅ `.env` file in `.gitignore`
- ✅ AJAX requests use WordPress nonces
- ✅ Input sanitization (sanitize_text_field, sanitize_email, esc_url)
- ✅ Output escaping (esc_html, esc_attr, wp_kses_post, wp_kses with explicit iframe whitelist for embeds)
- ✅ SQL injection prevention (wpdb prepared statements)
- ✅ CSRF protection (wp_verify_nonce)

### Passwords
- WordPress admin password: See `.env` file
- Database password: On VPS only
- SSH key authentication for VPS

### SSL/HTTPS
**Current:** HTTPS via Hetzner reverse proxy (SSL terminates at Hetzner, proxied over HTTP to VPS)
**Production URL:** https://www.vod-records.com/vod-fest/

---

## TODO & Future Enhancements

### Content Tasks
- [x] Add Bandcamp/YouTube embeds for all 21 bands
- [x] Find images for IRSOL and CRASH COURSE IN SCIENCE
- [x] Replace 2025 Recap placeholders with real photos/videos
- [ ] Update artist testimonials with real quotes
- [x] Add band bios/descriptions to all band posts
- [ ] Upload remaining ~5 festival videos to YouTube (unlisted) and add IDs to template

### Technical Enhancements
- [ ] Add reCAPTCHA to registration form (prevent spam)
- [ ] Email verification for new users
- [ ] Automated welcome emails
- [ ] **Newsletter-Service Integration (Brevo empfohlen):** Brevo (ehem. Sendinblue) statt Mailchimp -- Free Plan hat unbegrenzte Kontakte + 300 E-Mails/Tag, EU-Server (DSGVO-konform), Starter ab ~$8/Monat. Bei ~5.000 Empfaengern ist Mailchimp Free unbrauchbar (nur 250 Kontakte). Brevo-API an bestehendes WordPress-Newsletter-Formular anbinden.
- [x] SSL/HTTPS via reverse proxy (vod-records.com)
- [ ] Multilingual support (WPML/Polylang)
- [ ] Performance optimization (caching, CDN)
- [x] Google Analytics integration (G-53ZSWBBTD2 with Consent Mode v2)
- [x] Cookie consent banner (GDPR)
- [x] SEO: Yoast SEO plugin (meta descriptions, OG tags, Twitter Cards, XML sitemap, JSON-LD Event schema)

### Plugin Enhancements
- [ ] User favorite bands feature
- [ ] Personal schedule builder
- [ ] Email notifications for schedule updates
- [ ] Ticket verification system
- [ ] Password strength meter
- [ ] Two-factor authentication

---

## Troubleshooting

### Images Not Showing
```bash
# Check file permissions
ssh root@72.62.148.205 "ls -la /var/www/vodfest/wp-content/uploads/2026/02/"

# Re-upload image
wp media import /path/to/image.jpg --title="Title" --allow-root
```

### Plugin Not Working
```bash
# Check plugin status
wp plugin status vod-fest-user-area --allow-root

# Reactivate
wp plugin deactivate vod-fest-user-area --allow-root
wp plugin activate vod-fest-user-area --allow-root
```

### Menu Not Showing
```bash
# Check menu locations
wp menu location list --allow-root

# Assign menu to location
wp menu location assign MENU_ID primary --allow-root
```

### Newsletter Not Saving
```bash
# Check if table exists
wp db query "SHOW TABLES LIKE 'wp_vod_fest_newsletter';" --allow-root

# Recreate table
wp db query "CREATE TABLE IF NOT EXISTS wp_vod_fest_newsletter (...);" --allow-root
```

### Bandcamp Embeds Not Rendering
WordPress `wp_kses_post()` strips `<iframe>` tags. The fix in `single-band.php` uses `wp_kses()` with an explicit whitelist:
```php
wp_kses($bandcamp_embed, array(
    'iframe' => array('style' => true, 'src' => true, 'seamless' => true, 'width' => true, 'height' => true, 'title' => true),
    'a' => array('href' => true),
));
```

### Reverse Proxy Issues
```bash
# Test VPS directly (bypassing proxy)
curl -sI "http://72.62.148.205/vod-fest/"

# Test through proxy
curl -sI "https://www.vod-records.com/vod-fest/"

# Check VPS Apache config
ssh root@72.62.148.205 "cat /etc/apache2/sites-available/vodfest.conf"

# Check WordPress .htaccess (must have vod-fest prefix strip rule)
ssh root@72.62.148.205 "cat /var/www/vodfest/.htaccess"

# Check Hetzner .htaccess (proxy rule)
# Via SSH: ssh -p 222 maier@dedi99.your-server.de
# File: /usr/www/users/maier/neu2013/.htaccess

# If static assets (CSS/JS/images) return 404:
# Verify .htaccess has: RewriteRule ^vod-fest/(.*)$ $1 [L]
# This must be BEFORE the WordPress RewriteCond/RewriteRule block

# If HTTPS URLs show as HTTP:
# Check wp-config.php has X-Forwarded-Host detection
ssh root@72.62.148.205 "grep -A3 'Force HTTPS' /var/www/vodfest/wp-config.php"
```

### Cache Issues
```bash
# Clear all caches
wp cache flush --allow-root
wp rewrite flush --allow-root

# Browser: CTRL+SHIFT+R (hard refresh)
```

---

## Support & Contact

### Project Contacts
- **Developer:** Robin Seckler (rseckler@gmail.com)
- **Organizer:** Frank Bull (frank@vod-records.com)
- **VPS:** Hostinger support

### Useful Links
- **WordPress Codex:** https://codex.wordpress.org/
- **WP-CLI Docs:** https://developer.wordpress.org/cli/commands/
- **Theme Handbook:** https://developer.wordpress.org/themes/
- **Plugin Handbook:** https://developer.wordpress.org/plugins/

---

## Version History

### v1.0.6 (February 9, 2026) - Current
- ✅ **Band bios**: All 21 bands have biographical descriptions (English, 80-120 words each)
- ✅ **Band website URL**: New `_band_website_url` meta field in functions.php + "Visit Website ↗" button on single-band.php
- ✅ **Updated band images**: IRSOL (Media ID 150), Plus Instruments (Media ID 149), Das Synthetische Mischgewebe (Media ID 151), Clair Obscur (Media ID 152)

### v1.0.5 (February 9, 2026)
- ✅ **Yoast SEO**: Installed and configured (meta descriptions, OG tags, Twitter Cards, XML sitemap)
- ✅ **JSON-LD Event Schema**: MusicEvent with all 21 performers, location, offers on homepage
- ✅ Fixed YouTube links for Anti Group, Clair Obscur, Marc Hurtado/Lydia Lunch (play Suicide), IRSOL
- ✅ Replaced broken newsletter forms with mailto:frank@vod-records.com (front-page + `[newsletter]` shortcode)
- ✅ All "Get Tickets" / "Get Your Ticket" buttons now open mailto:frank@vod-records.com
- ✅ Tickets page: added "Order Ticket Now" mailto button, updated to 21 performances, wristband pickup at VOD-Shop/Gallery
- ✅ Footer "Follow Us" reduced to Facebook only (removed Instagram, YouTube, Bandcamp)
- ✅ Festival 2025 stats corrected: 18 bands, 444 attendees
- ✅ Info page: replaced "coming soon" text with button linking to Festival 2025 recap page
- ✅ Fixed Post IDs in docs: Travel (45), Timetable (49)

### v1.0.4 (February 8, 2026)
- ✅ **Reverse proxy**: Site now live at `https://www.vod-records.com/vod-fest/` via Hetzner → VPS proxy
- ✅ **Google Analytics**: `G-53ZSWBBTD2` on entire vod-records.com; WordPress uses Consent Mode v2 (GDPR)
- ✅ VPS Apache moved from port 8080 to port 80; Docker/Traefik to 8880/8443
- ✅ WordPress URL prefix stripping via `.htaccess` (`RewriteRule ^vod-fest/(.*)$ $1 [L]`)
- ✅ HTTPS detection via `X-Forwarded-Host` header in wp-config.php
- ✅ Fixed menu URLs (Home, Lineup) for new /vod-fest/ path
- ✅ Fixed Venue page hardcoded image paths for /vod-fest/ prefix
- ✅ All 21 bands now have images (IRSOL Media ID 145, Crash Course in Science Media ID 146)
- ✅ Datenschutzerklärung published (Post ID 3, was draft) with Google Analytics section (Consent Mode v2, opt-out, legal basis)
- ✅ Fixed footer menu link for Datenschutz page
- ✅ Fixed reverse proxy redirects: Added `HTTP_HOST` override in wp-config.php so WordPress trailing-slash redirects (e.g. `/tickets` → `/tickets/`) use `www.vod-records.com` instead of VPS IP

### v1.0.3 (February 8, 2026)
- ✅ Enhanced hero sections: background photos with slow zoom, dark overlay, animated text for Info, Tickets, Contact, Travel, Venue pages
- ✅ Festival 2025 hero: YouTube video background (Laibach teaser) with static image fallback on mobile
- ✅ Reduced hero heights across all pages (28-35vh) for faster content visibility
- ✅ Optimized hero images on VPS (8MB → 266-682KB) in `heroes/` subdirectory
- ✅ Added `heroSlowZoom` keyframe animation

### v1.0.2 (February 7, 2026)
- ✅ GDPR cookie consent banner with granular category controls
- ✅ Festival 2025 photo gallery: 20 real photos with hover effects & credits
- ✅ Festival 2025 video highlights: 9 YouTube embeds (youtube-nocookie.com)
- ✅ Bandcamp + YouTube embeds for all 21 bands (theme-colored players)
- ✅ Fixed Bandcamp embed rendering: replaced `wp_kses_post()` with `wp_kses()` + explicit iframe attribute whitelist in `single-band.php`
- ✅ Facebook URL updated to vinylondemandrecords
- ✅ Footer links: VOD Records (vod-records.com) + Tape Magazine (tape-mag.com)
- ✅ Legal & contact pages updated with real content from vod-records.com (Impressum, Datenschutz, AGB, Contact)

### v1.0.1 (February 2, 2026)
- ✅ All 21 bands created with correct schedule
- ✅ 19 of 21 bands have real images from Bandcamp
- ✅ Bandcamp/YouTube embed system
- ✅ Newsletter signup with database storage
- ✅ Social media integration
- ✅ Favicon configured
- ✅ User area plugin (login, register, dashboard, profile)
- ✅ Festival 2025 Recap page
- ✅ All features deployed to VPS
- ✅ Navigation menu updated

### v1.0.0 (February 1, 2026)
- Initial WordPress theme development
- Custom post types (Band, Schedule)
- Custom taxonomies (Genre, Festival Day, Stage)
- Core pages (Home, Lineup, Info, Tickets, Contact, Venue)
- Legal pages (Impressum, Datenschutz, Terms)
- Responsive design with industrial aesthetic

---

## Git Repository

### Recommended .gitignore
```
# WordPress
wp-config.php
wp-content/uploads/
wp-content/cache/
wp-content/backup-db/

# Environment
.env
.env.local

# System
.DS_Store
Thumbs.db
*.log

# Dependencies
node_modules/
vendor/

# IDE
.idea/
.vscode/
*.swp
*.swo
```

---

## Related Projects

This repository is part of a multi-project workspace. See parent `CLAUDE.md` for other projects:
- **Blackfire_automation:** Python automation (stock sync)
- **Blackfire_service:** Next.js investment platform
- **Passive Income:** AI content generator
- **VOD_discogs:** Discogs integration (related to VOD Records)

**Shared VPS:** 72.62.148.205 (Hostinger Ubuntu 24.04.3 LTS)

---

**Last Updated:** February 9, 2026 by Claude Code
**Next Review:** Before VOD Fest 2026 (July 2026)
