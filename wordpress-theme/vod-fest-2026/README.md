# VOD Fest 2026 WordPress Theme

**Version:** 1.0.0
**Author:** Robin Seckler
**License:** GPL v2 or later

Custom WordPress theme for VOD Fest 2026 music festival website.

## Features

- ✅ Custom Post Types (Bands, Schedule)
- ✅ Custom Taxonomies (Genre, Festival Day, Stage)
- ✅ Fully Responsive Design
- ✅ Dark Industrial Aesthetic
- ✅ Bilingual Ready (WPML/Polylang)
- ✅ Block Editor Support
- ✅ Custom CSS Framework
- ✅ Optimized Performance
- ✅ SEO Friendly
- ✅ Accessibility Ready (WCAG AA)

## Installation

### 1. Upload Theme

**Via WordPress Admin:**
1. Go to Appearance → Themes → Add New
2. Click "Upload Theme"
3. Choose `vod-fest-2026.zip`
4. Click "Install Now"
5. Activate the theme

**Via FTP:**
1. Upload the `vod-fest-2026` folder to `/wp-content/themes/`
2. Go to Appearance → Themes
3. Activate "VOD Fest 2026"

### 2. Required Plugins

**Recommended:**
- **WPML** or **Polylang** - Multilingual support (EN/DE)
- **Advanced Custom Fields (ACF) PRO** - Custom fields for bands
- **Contact Form 7** - Contact forms
- **Yoast SEO** - SEO optimization

**Optional:**
- **WP Mail SMTP** - Reliable email delivery
- **Complianz GDPR** - Cookie consent management

### 3. Initial Setup

After activation:

1. **Configure Permalinks:**
   - Go to Settings → Permalinks
   - Select "Post name"
   - Click "Save Changes"

2. **Create Pages:**
   - Home
   - Lineup
   - Schedule
   - Festival Info
   - Travel & Accommodation
   - Tickets
   - Contact
   - Impressum
   - Privacy Policy

3. **Assign Homepage:**
   - Go to Settings → Reading
   - Select "A static page"
   - Homepage: Select "Home"
   - Click "Save Changes"

4. **Setup Menus:**
   - Go to Appearance → Menus
   - Create "Primary Menu"
   - Add pages: Home, Lineup, Schedule, Info, Travel, Tickets, Contact
   - Assign to "Primary Menu" location
   - Create "Footer Menu" (optional)

5. **Add Bands:**
   - Go to Bands → Add New
   - Add band name, description, photo
   - Assign Genre, Festival Day, Stage
   - Add custom fields (Bandcamp URL, Start Time, End Time)

6. **Configure Widgets:**
   - Go to Appearance → Widgets
   - Add widgets to Footer 1-4 areas

## Custom Post Types

### Bands

**Archive:** `/lineup`
**Single:** `/band/{band-name}`

**Taxonomies:**
- Genre (industrial, experimental, post-punk, etc.)
- Festival Day (Friday, Saturday, Sunday)
- Stage (Inside, Outside)

**Custom Fields (ACF):**
- `bandcamp_url` - Bandcamp link
- `start_time` - Performance start time
- `end_time` - Performance end time
- `duration` - Performance duration (minutes)
- `bio` - Extended biography
- `website` - Official website
- `social_links` - Social media links

### Schedule

**Archive:** `/schedule`

**Taxonomies:**
- Festival Day
- Stage

## Customizer Options

Go to Appearance → Customize:

**Site Identity:**
- Logo upload
- Site title & tagline

**VOD Fest Settings:**
- Contact email
- Social media links (Facebook, Instagram, YouTube, Bandcamp)
- Festival dates
- Venue information

**Colors** (optional overrides):
- Primary color
- Accent color

## Template Hierarchy

```
front-page.php      → Homepage
archive-band.php    → Lineup page
single-band.php     → Band detail page
archive-schedule.php → Schedule page
page.php            → Standard pages
single.php          → Blog posts
404.php             → 404 error page
```

## CSS Architecture

```
/assets/css/
├── variables.css    - CSS Custom Properties (colors, fonts, spacing)
├── global.css       - Base styles, typography, layout
├── components.css   - UI components (buttons, cards, forms)
└── animations.css   - Keyframe animations
```

All styles are based on `VOD_Fest_CI.md` specifications.

## JavaScript

```
/assets/js/
└── main.js - Theme JavaScript (mobile menu, scroll animations, tabs)
```

## Theme Structure

```
vod-fest-2026/
├── style.css               - Theme header & WordPress styles
├── functions.php           - Theme setup & functions
├── header.php              - Site header
├── footer.php              - Site footer
├── index.php               - Fallback template
├── front-page.php          - Homepage template
├── page.php                - Page template
├── single.php              - Single post template
├── archive-band.php        - Band archive (lineup)
├── single-band.php         - Single band template
├── archive-schedule.php    - Schedule archive
├── 404.php                 - 404 error page
├── searchform.php          - Search form
├── /inc/
│   ├── post-types.php      - Custom post types
│   ├── taxonomies.php      - Custom taxonomies
│   ├── template-tags.php   - Template helper functions
│   ├── customizer.php      - Customizer settings
│   ├── ajax-handlers.php   - AJAX functions
│   └── admin.php           - Admin customizations
├── /template-parts/
│   ├── content.php         - Default content template
│   ├── content-band.php    - Band content template
│   └── content-none.php    - No content found
├── /assets/
│   ├── /css/               - Stylesheets
│   ├── /js/                - JavaScript files
│   ├── /images/            - Theme images
│   └── /fonts/             - Custom fonts (if needed)
└── /languages/             - Translation files
```

## Development

### CSS Custom Properties

All design tokens are in `assets/css/variables.css`:

```css
:root {
  --color-gold: #D4AF37;
  --color-blood-red: #4A0000;
  --font-display: "Bebas Neue", Impact, sans-serif;
  /* ... */
}
```

### Adding New Components

1. Add component styles to `assets/css/components.css`
2. Use existing CSS custom properties
3. Follow BEM naming convention
4. Ensure mobile-first approach

### Translation

Theme is translation-ready. Use `__()`, `_e()`, `esc_html__()`, `esc_html_e()` functions.

**Text Domain:** `vod-fest`

Generate POT file:
```bash
wp i18n make-pot . languages/vod-fest.pot
```

## Support

**Documentation:** See `/VOD_Fest_CI.md` and `/VOD_Fest_Mockups.md` in root directory

**GitHub:** https://github.com/rseckler/VOD-Fest-2026

**Issues:** https://github.com/rseckler/VOD-Fest-2026/issues

## Changelog

### 1.0.0 (2026-02-02)
- Initial release
- Custom post types (Bands, Schedule)
- Custom taxonomies (Genre, Festival Day, Stage)
- Responsive design with dark industrial aesthetic
- WPML/Polylang ready
- Block editor support
- Performance optimized

## Credits

**Design & Development:** Robin Seckler with Claude Code
**Fonts:** Google Fonts (Bebas Neue, Inter, Roboto Slab)
**Based on:** VOD Fest 2026 Brand Identity Guidelines

## License

This theme is licensed under GPL v2 or later.
http://www.gnu.org/licenses/gpl-2.0.html
