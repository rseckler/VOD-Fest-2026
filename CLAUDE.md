# CLAUDE.md - VOD Fest 2026

This file provides comprehensive guidance to Claude Code when working on the VOD Fest 2026 project.

## Project Status: ✅ LIVE & PRODUCTION

**Last Updated:** February 7, 2026
**Status:** Fully implemented and deployed on VPS
**Live URL:** http://72.62.148.205:8080

---

## Quick Access

### URLs
- **Website:** http://72.62.148.205:8080
- **Admin:** http://72.62.148.205:8080/wp-admin
- **Lineup:** http://72.62.148.205:8080/lineup/
- **Festival 2025 Recap:** http://72.62.148.205:8080/festival-2025/
- **User Login:** http://72.62.148.205:8080/login/
- **User Register:** http://72.62.148.205:8080/register/
- **User Dashboard:** http://72.62.148.205:8080/dashboard/

### Server Access
```bash
# SSH to VPS
ssh root@72.62.148.205

# WordPress Directory
cd /var/www/vodfest

# WP-CLI Commands
wp --allow-root [command]
```

### Credentials
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
- **Theme:** Custom "VOD Fest 2026" Theme (v1.0.2)
- **Server:** Hostinger VPS (Ubuntu 24.04.3 LTS)
- **IP:** 72.62.148.205
- **Port:** 8080
- **Database:** MySQL/MariaDB

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
- `_thumbnail_id` - Featured image

**Taxonomies:**
- `festival_day` - Friday, Saturday, Sunday
- `stage` - Outside Stage, Venue Inside
- `band_genre` - Industrial, Experimental, Post-Punk, etc.

### ✅ 2. Band Images
**Status:** 19 of 21 bands have real images from Bandcamp
**Missing:** IRSOL (Post 97), CRASH COURSE IN SCIENCE (Post 99)

**All 21 Bands:**
1. JOACHIM IRMLER (FAUST) - Post ID 94
2. NO MORE - Post ID 95
3. DIETRICH VON EULER DONNERSPERG - Post ID 96
4. IRSOL - Post ID 97 ❌ No image
5. O YUKI CONJUGATE - Post ID 98
6. CRASH COURSE IN SCIENCE - Post ID 99 ❌ No image
7. HUNTING LODGE - Post ID 100
8. DAS SYNTHETISCHE MISCHGEWEBE - Post ID 101
9. MARC HURTADO / LYDIA LUNCH - Post ID 102
10. RAPOON - Post ID 103
11. NORMA LOY - Post ID 104
12. CLAIR OBSCUR - Post ID 105
13. THE ANTI GROUP - Post ID 106
14. ESPLENDOR GEOMETRICO - Post ID 107
15. PLUS INSTRUMENTS - Post ID 108
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
**Database:** `wp_vod_fest_newsletter` table
**Features:**
- Email validation
- Duplicate prevention (UNIQUE email constraint)
- IP address logging
- GDPR-compliant text

**Active on:**
- All band detail pages (bottom)
- Festival 2025 Recap page
- Can be added to any page/post

**Export Newsletter Subscribers:**
```sql
SELECT email FROM wp_vod_fest_newsletter ORDER BY subscribed_at DESC;
```

### ✅ 5. Social Media Integration
**Customizer Settings:** Appearance → Customize → Social Media

**Configured URLs:**
- Facebook: https://www.facebook.com/vinylondemandrecords
- Instagram: https://instagram.com/vodfest
- YouTube: https://youtube.com/@vodfest
- Bandcamp: https://vodrecords.bandcamp.com

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
**Page:** http://72.62.148.205:8080/festival-2025/ (Post ID 138)
**Added to navigation:** Primary Menu (position 9)

**Sections:**
- Hero with 2025 branding
- Statistics cards (19 bands, 3 days, 2 stages, 100+ attendees)
- Photo gallery (20 real photos in responsive grid)
- Video gallery (9 YouTube embeds via youtube-nocookie.com)
- Artist testimonials (3 cards - editable in template)
- Newsletter CTA

**Photos:** 20 images served from `/wp-content/uploads/images/fest-2025/` (4 by E. Gabriel Edvy, 16 by Cheesy). Hover effects: grayscale-to-color, zoom, caption overlay with credits.

**Videos:** YouTube embeds (unlisted). To add more, add entries to the `$videos` array in `template-2025-recap.php`:
```php
array('id' => 'YOUTUBE_VIDEO_ID', 'title' => 'Band Name', 'type' => 'Teaser'),
```

### ✅ 9. Cookie Consent Banner (GDPR)
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

### ✅ 9. Navigation Menu
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
- **Travel & Accommodation** (Post ID 82) - Hotels, transport
- **Timetable** (Post ID 85) - Schedule overview
- **Venue** (Post ID 84) - Kulturhaus Caserne info + gallery

### Legal Pages (content sourced from vod-records.com)
- **Impressum** (Post ID 73) - §5 TMG site notice (Alpenstrasse 25/1, USt-IdNr DE232493058)
- **Datenschutzerklärung** (Post ID 75) - Full GDPR/DSGVO privacy policy (6 sections incl. PayPal, Google Fonts, Newsletter)
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
- Simple contact form for ticket orders
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
**Current:** HTTP only (port 8080)
**TODO:** Configure SSL certificate for production domain

---

## TODO & Future Enhancements

### Content Tasks
- [x] Add Bandcamp/YouTube embeds for all 21 bands
- [ ] Find images for IRSOL and CRASH COURSE IN SCIENCE
- [x] Replace 2025 Recap placeholders with real photos/videos
- [ ] Update artist testimonials with real quotes
- [ ] Add band bios/descriptions to all band posts
- [ ] Upload remaining ~5 festival videos to YouTube (unlisted) and add IDs to template

### Technical Enhancements
- [ ] Add reCAPTCHA to registration form (prevent spam)
- [ ] Email verification for new users
- [ ] Automated welcome emails
- [ ] Newsletter export to Mailchimp/Brevo
- [ ] SSL certificate for production domain
- [ ] Multilingual support (WPML/Polylang)
- [ ] Performance optimization (caching, CDN)
- [ ] Google Analytics integration
- [x] Cookie consent banner (GDPR)

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

### v1.0.2 (February 7, 2026) - Current
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

**Last Updated:** February 7, 2026 by Claude Code
**Next Review:** Before VOD Fest 2026 (July 2026)
