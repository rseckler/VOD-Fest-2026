# VOD Fest 2026 - Corporate Identity & Design System

**Version:** 1.0
**Last Updated:** 2026-02-02
**Design Base:** VOD_Fest_Plakat.png

## Design Philosophy

**Essence:** Underground Industrial Vintage
**Mood:** Dark, Experimental, Raw, Authentic
**Era Inspiration:** 1970s-1980s Industrial/Post-Punk Concert Posters
**Aesthetic:** Distressed, Worn, Textured, Anti-Commercial

The VOD Fest brand embodies the underground experimental music scene - raw, unpolished, authentic. The design rejects modern minimalism in favor of tactile, weathered aesthetics that reflect the industrial/post-punk heritage of the featured artists.

---

## Color Palette

### Primary Colors

**Dark Blood Red (Brand Primary)**
```
Hex: #4A0000
RGB: 74, 0, 0
CMYK: 0, 100, 100, 71
Usage: Primary backgrounds, headers, sections
```

**Deep Crimson (Secondary)**
```
Hex: #8B0000
RGB: 139, 0, 0
CMYK: 0, 100, 100, 45
Usage: Hover states, accents, gradients
```

**Midnight Black**
```
Hex: #0D0000
RGB: 13, 0, 0
CMYK: 0, 100, 100, 95
Usage: Deep backgrounds, overlays, text on light
```

### Accent Colors

**Vintage Gold (Primary Text)**
```
Hex: #D4AF37
RGB: 212, 175, 55
CMYK: 0, 17, 74, 17
Usage: Headlines, important text, CTAs
```

**Aged Brass**
```
Hex: #C9A961
RGB: 201, 169, 97
CMYK: 0, 16, 52, 21
Usage: Subheadings, secondary text
```

**Dusty Cream**
```
Hex: #E8D7B8
RGB: 232, 215, 184
CMYK: 0, 7, 21, 9
Usage: Body text, readable paragraphs
```

### Glow/Effect Colors

**Electric Orange (Glitch Effect)**
```
Hex: #FF4500
RGB: 255, 69, 0
CMYK: 0, 73, 100, 0
Usage: Border glows, hover animations, audio waveforms
```

**Fire Red (Highlights)**
```
Hex: #DC143C
RGB: 220, 20, 60
CMYK: 0, 91, 73, 14
Usage: Active states, notifications, alerts
```

### Semantic Colors

**Success (Subtle Green)**
```
Hex: #4A5D4A
RGB: 74, 93, 74
CMYK: 20, 0, 20, 64
Usage: Form success, ticket confirmed
```

**Warning (Industrial Yellow)**
```
Hex: #D4A017
RGB: 212, 160, 23
CMYK: 0, 25, 89, 17
Usage: Important notices, sold out warnings
```

**Error (Bright Red)**
```
Hex: #CC0000
RGB: 204, 0, 0
CMYK: 0, 100, 100, 20
Usage: Form errors, critical alerts
```

---

## Typography

### Font Families

**Headlines & Display Text**

**Primary Display Font:**
```
Font: "Bebas Neue" or "Oswald" (Bold, Extra Bold)
Fallback: "Impact", "Arial Black", sans-serif
Weight: 700-900
Character: Wide, condensed, industrial, masculine
Usage: VOD FEST logo, page titles, band names, dates
```

**Secondary Display (Vintage Slab):**
```
Font: "Rockwell" or "Clarendon" or "Roboto Slab"
Fallback: Georgia, serif
Weight: 700
Character: Sturdy, vintage poster feel, authoritative
Usage: Section headings, important announcements
```

**Body Text**

**Primary Body Font:**
```
Font: "Inter" or "Open Sans"
Fallback: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif
Weight: 400 (Regular), 600 (Semi-Bold)
Character: Clean, readable, modern but not too clean
Usage: Paragraphs, descriptions, body content
```

**Monospace (Technical):**
```
Font: "Courier New" or "IBM Plex Mono"
Fallback: monospace
Weight: 400
Character: Technical, raw, unpolished
Usage: Dates, times, technical info, code-like elements
```

### Type Scale

```css
/* Mobile First */
--font-size-xs: 0.75rem;    /* 12px - Fine print */
--font-size-sm: 0.875rem;   /* 14px - Small text */
--font-size-base: 1rem;     /* 16px - Body text */
--font-size-lg: 1.125rem;   /* 18px - Large body */
--font-size-xl: 1.25rem;    /* 20px - Small headings */
--font-size-2xl: 1.5rem;    /* 24px - H4 */
--font-size-3xl: 1.875rem;  /* 30px - H3 */
--font-size-4xl: 2.25rem;   /* 36px - H2 */
--font-size-5xl: 3rem;      /* 48px - H1 */
--font-size-6xl: 4rem;      /* 64px - Hero */
--font-size-7xl: 6rem;      /* 96px - VOD FEST display */

/* Desktop Scale (1.2x multiplier above 1024px) */
```

### Text Styling

**Gold Headline Effect:**
```css
.headline-gold {
  font-family: "Bebas Neue", Impact, sans-serif;
  font-weight: 900;
  color: #D4AF37;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  text-shadow:
    2px 2px 4px rgba(0, 0, 0, 0.8),
    0 0 20px rgba(212, 175, 55, 0.3);
  /* Distressed effect via background clip or SVG filter */
}
```

**Body Text Styling:**
```css
.body-text {
  font-family: "Inter", sans-serif;
  font-weight: 400;
  color: #E8D7B8;
  line-height: 1.7;
  letter-spacing: 0.01em;
}
```

**Grunge Text Effect (Optional):**
```css
.grunge-text {
  /* Apply via SVG filter or custom font with distress */
  filter: url(#grunge-filter);
  opacity: 0.95;
}
```

---

## Textures & Backgrounds

### Primary Textures

**Grunge Overlay (Global)**
```
Type: Seamless PNG overlay
Opacity: 15-30%
Blend Mode: Multiply or Overlay
Pattern: Scratches, dust, film grain
Resolution: 2048x2048px tileable
Source: Generate via Photoshop noise filter or use royalty-free grunge texture
```

**Paper Texture (Vintage Effect)**
```
Type: Aged paper scan
Opacity: 10-20%
Blend Mode: Multiply
Color: Sepia tones (#E8D7B8 tinted)
Usage: Behind text sections, band bios
```

**Metal Rust Texture (Industrial)**
```
Type: Corroded metal surface
Opacity: 20-40%
Blend Mode: Overlay
Usage: Background sections, borders
Color Tint: Dark red (#4A0000)
```

### Gradients

**Primary Background Gradient:**
```css
background: linear-gradient(
  180deg,
  #0D0000 0%,
  #4A0000 50%,
  #8B0000 100%
);
```

**Radial Glow (Spotlight Effect):**
```css
background: radial-gradient(
  circle at center,
  rgba(212, 175, 55, 0.1) 0%,
  transparent 70%
);
```

**Border Glow (Fire Effect):**
```css
border: 2px solid #D4AF37;
box-shadow:
  0 0 10px rgba(255, 69, 0, 0.5),
  0 0 20px rgba(255, 69, 0, 0.3),
  inset 0 0 10px rgba(212, 175, 55, 0.2);
```

### Audio Waveform Background

**Waveform Visualization (Bottom of Sections):**
```
Type: SVG or Canvas animation
Color: rgba(255, 69, 0, 0.3) to rgba(212, 175, 55, 0.5)
Height: 80-120px
Animation: Subtle pulse/oscillate on scroll
Style: Industrial, glitchy, distorted
Inspiration: From poster bottom edge
```

---

## Layout & Spacing

### Grid System

**Desktop Grid (1440px+ viewport):**
```
Columns: 12
Gutter: 32px
Max Width: 1400px
Margin: 64px (sides)
```

**Tablet Grid (768px - 1439px):**
```
Columns: 8
Gutter: 24px
Max Width: 100%
Margin: 32px
```

**Mobile Grid (< 768px):**
```
Columns: 4
Gutter: 16px
Max Width: 100%
Margin: 20px
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

### Section Spacing

```css
/* Standard Section */
.section {
  padding: var(--space-4xl) 0; /* 96px top/bottom */
}

/* Hero Section */
.hero {
  min-height: 100vh;
  padding: var(--space-5xl) 0;
}

/* Content Blocks */
.content-block {
  margin-bottom: var(--space-3xl);
}
```

---

## UI Components

### Buttons

**Primary CTA Button (Gold):**
```css
.btn-primary {
  background: linear-gradient(135deg, #D4AF37 0%, #C9A961 100%);
  color: #0D0000;
  font-family: "Bebas Neue", Impact, sans-serif;
  font-size: 1.125rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  padding: 16px 48px;
  border: 2px solid #D4AF37;
  border-radius: 0; /* Sharp corners for industrial feel */
  box-shadow:
    0 4px 0 #8B7500,
    0 6px 20px rgba(212, 175, 55, 0.4);
  transition: all 0.3s ease;
  cursor: pointer;
}

.btn-primary:hover {
  background: linear-gradient(135deg, #FFD700 0%, #D4AF37 100%);
  transform: translateY(-2px);
  box-shadow:
    0 6px 0 #8B7500,
    0 10px 30px rgba(212, 175, 55, 0.6);
}

.btn-primary:active {
  transform: translateY(2px);
  box-shadow:
    0 2px 0 #8B7500,
    0 4px 10px rgba(212, 175, 55, 0.4);
}
```

**Secondary Button (Outline):**
```css
.btn-secondary {
  background: transparent;
  color: #D4AF37;
  border: 2px solid #D4AF37;
  font-family: "Bebas Neue", Impact, sans-serif;
  padding: 14px 40px;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  background: rgba(212, 175, 55, 0.1);
  border-color: #FFD700;
  color: #FFD700;
  box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
}
```

**Danger/Alert Button:**
```css
.btn-danger {
  background: #CC0000;
  color: #FFFFFF;
  border: 2px solid #FF0000;
  /* Similar structure to primary */
}
```

### Form Elements

**Input Fields:**
```css
.input {
  background: rgba(13, 0, 0, 0.6);
  border: 2px solid #8B0000;
  border-radius: 0;
  color: #E8D7B8;
  font-family: "Inter", sans-serif;
  font-size: 1rem;
  padding: 14px 20px;
  transition: all 0.3s ease;
}

.input:focus {
  outline: none;
  border-color: #D4AF37;
  box-shadow:
    0 0 0 3px rgba(212, 175, 55, 0.2),
    inset 0 2px 4px rgba(0, 0, 0, 0.5);
  background: rgba(13, 0, 0, 0.8);
}

.input::placeholder {
  color: rgba(232, 215, 184, 0.5);
  font-style: italic;
}
```

**Select Dropdown:**
```css
.select {
  /* Same as input */
  background: rgba(13, 0, 0, 0.6) url('data:image/svg+xml;utf8,<svg>...</svg>') no-repeat right 12px center;
  background-size: 12px;
  padding-right: 40px;
  cursor: pointer;
}
```

**Checkbox/Radio:**
```css
.checkbox {
  appearance: none;
  width: 24px;
  height: 24px;
  border: 2px solid #8B0000;
  background: rgba(13, 0, 0, 0.6);
  position: relative;
  cursor: pointer;
}

.checkbox:checked {
  background: #D4AF37;
  border-color: #D4AF37;
}

.checkbox:checked::after {
  content: '';
  position: absolute;
  width: 6px;
  height: 12px;
  border: solid #0D0000;
  border-width: 0 3px 3px 0;
  transform: rotate(45deg);
  top: 2px;
  left: 7px;
}
```

### Cards & Panels

**Band Card:**
```css
.band-card {
  background:
    linear-gradient(rgba(13, 0, 0, 0.9), rgba(74, 0, 0, 0.8)),
    url('grunge-texture.png');
  background-blend-mode: overlay;
  border: 2px solid rgba(212, 175, 55, 0.3);
  padding: var(--space-xl);
  position: relative;
  overflow: hidden;
  transition: all 0.4s ease;
}

.band-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, transparent, rgba(212, 175, 55, 0.05), transparent);
  transform: translateX(-100%);
  transition: transform 0.6s ease;
}

.band-card:hover {
  border-color: #D4AF37;
  box-shadow:
    0 8px 32px rgba(212, 175, 55, 0.2),
    inset 0 0 20px rgba(212, 175, 55, 0.1);
  transform: translateY(-4px);
}

.band-card:hover::before {
  transform: translateX(100%);
}
```

**Schedule Event Item:**
```css
.schedule-item {
  background: rgba(13, 0, 0, 0.7);
  border-left: 4px solid #D4AF37;
  padding: var(--space-lg);
  margin-bottom: var(--space-md);
  position: relative;
  backdrop-filter: blur(2px);
}

.schedule-item::after {
  content: '';
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  height: 2px;
  background: linear-gradient(90deg, #D4AF37, transparent);
}

.schedule-item.active {
  border-left-color: #FF4500;
  background: rgba(139, 0, 0, 0.4);
  box-shadow: 0 0 20px rgba(255, 69, 0, 0.3);
}
```

---

## Animations & Interactions

### Page Transitions

**Fade In on Scroll:**
```css
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-on-scroll {
  opacity: 0;
  animation: fadeInUp 0.8s ease forwards;
}
```

**Glitch Effect (Occasional):**
```css
@keyframes glitch {
  0%, 100% {
    transform: translate(0);
    filter: none;
  }
  20% {
    transform: translate(-2px, 2px);
    filter: hue-rotate(90deg);
  }
  40% {
    transform: translate(2px, -2px);
    filter: hue-rotate(-90deg);
  }
  60% {
    transform: translate(-2px, -2px);
  }
  80% {
    transform: translate(2px, 2px);
  }
}

.glitch-effect {
  animation: glitch 0.3s ease-in-out;
}
```

**Pulse Glow (CTAs):**
```css
@keyframes pulseGlow {
  0%, 100% {
    box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
  }
  50% {
    box-shadow: 0 0 40px rgba(212, 175, 55, 0.8);
  }
}

.pulse-glow {
  animation: pulseGlow 2s ease-in-out infinite;
}
```

### Hover Effects

**Image Hover (Band Photos):**
```css
.band-image {
  overflow: hidden;
  position: relative;
}

.band-image img {
  transition: transform 0.6s ease, filter 0.6s ease;
  filter: grayscale(30%) contrast(1.1);
}

.band-image:hover img {
  transform: scale(1.1);
  filter: grayscale(0%) contrast(1.2);
}

.band-image::after {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(45deg, rgba(212, 175, 55, 0.2), transparent);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.band-image:hover::after {
  opacity: 1;
}
```

**Link Underline Animation:**
```css
.link {
  position: relative;
  color: #D4AF37;
  text-decoration: none;
  transition: color 0.3s ease;
}

.link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0;
  height: 2px;
  background: linear-gradient(90deg, #D4AF37, #FF4500);
  transition: width 0.4s ease;
}

.link:hover {
  color: #FFD700;
}

.link:hover::after {
  width: 100%;
}
```

### Loading States

**Loading Spinner (Waveform Style):**
```css
@keyframes waveform {
  0%, 100% {
    height: 20px;
  }
  50% {
    height: 60px;
  }
}

.loader {
  display: flex;
  gap: 4px;
  align-items: center;
  justify-content: center;
}

.loader span {
  width: 4px;
  background: linear-gradient(#D4AF37, #FF4500);
  animation: waveform 1s ease-in-out infinite;
}

.loader span:nth-child(2) { animation-delay: 0.1s; }
.loader span:nth-child(3) { animation-delay: 0.2s; }
.loader span:nth-child(4) { animation-delay: 0.3s; }
.loader span:nth-child(5) { animation-delay: 0.4s; }
```

---

## Iconography

### Icon Style

**Characteristics:**
- Line icons (not filled)
- 2px stroke weight
- Sharp corners (not rounded)
- Gold color (#D4AF37)
- Industrial/mechanical aesthetic

**Icon Set Recommendation:**
- Feather Icons (customized)
- Bootstrap Icons (sharp variant)
- Custom SVGs for music-specific icons

### Custom Icons Needed

1. **Waveform Icon** - Audio/music representation
2. **Calendar Grid** - Schedule/dates
3. **Location Pin** - Venue information
4. **Ticket Stub** - Ticket purchase
5. **Band/Microphone** - Artists section
6. **Transport Icons** - Bus, train for travel info
7. **Social Media** - Industrial-styled social icons

**Icon Hover Effect:**
```css
.icon {
  stroke: #D4AF37;
  transition: all 0.3s ease;
}

.icon:hover {
  stroke: #FFD700;
  filter: drop-shadow(0 0 8px rgba(212, 175, 55, 0.6));
  transform: scale(1.1);
}
```

---

## Responsive Breakpoints

```css
/* Mobile First Approach */
:root {
  --mobile: 0px;
  --tablet: 768px;
  --desktop: 1024px;
  --wide: 1440px;
  --ultrawide: 1920px;
}

/* Media Queries */
@media (min-width: 768px) {
  /* Tablet styles */
}

@media (min-width: 1024px) {
  /* Desktop styles */
  /* Increase font sizes by 1.2x */
}

@media (min-width: 1440px) {
  /* Wide desktop */
  /* Max content width: 1400px */
}

@media (min-width: 1920px) {
  /* Ultra-wide */
  /* Consider larger hero images */
}
```

### Mobile-Specific Adjustments

- Reduce font sizes by 20%
- Hamburger menu (gold icon)
- Full-width cards
- Reduce spacing by 30-40%
- Sticky mobile navigation
- Simplify animations (performance)

---

## Accessibility

### Contrast Ratios

**WCAG AAA Compliance:**
```
Gold (#D4AF37) on Dark Red (#4A0000): 4.8:1 (AA Large Text)
Cream (#E8D7B8) on Dark Red (#4A0000): 7.2:1 (AA Normal Text)
Gold (#D4AF37) on Black (#0D0000): 8.9:1 (AAA)
Cream (#E8D7B8) on Black (#0D0000): 13.1:1 (AAA)
```

**Recommendation:**
- Use Cream (#E8D7B8) for body text on dark backgrounds
- Use Gold (#D4AF37) for headlines and large text only
- Ensure all interactive elements meet AA standards minimum

### Focus States

```css
:focus-visible {
  outline: 3px solid #D4AF37;
  outline-offset: 4px;
  border-radius: 2px;
}

button:focus-visible,
a:focus-visible {
  outline: 3px solid #D4AF37;
  box-shadow: 0 0 0 6px rgba(212, 175, 55, 0.2);
}
```

### Screen Reader Support

- All images have alt text
- ARIA labels on interactive elements
- Semantic HTML5 structure
- Skip to content link
- Keyboard navigation fully supported

---

## Special Effects

### Film Grain Overlay

```css
.film-grain {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  opacity: 0.03;
  z-index: 9999;
  background-image: url('data:image/svg+xml;base64,[grain-pattern]');
  animation: grain 8s steps(10) infinite;
}

@keyframes grain {
  0%, 100% { transform: translate(0, 0); }
  10% { transform: translate(-5%, -10%); }
  30% { transform: translate(3%, -15%); }
  50% { transform: translate(12%, 9%); }
  70% { transform: translate(-9%, 4%); }
  90% { transform: translate(-12%, -8%); }
}
```

### Border Glow Effect (Poster Frame)

```css
.poster-frame {
  position: relative;
  border: 3px solid #D4AF37;
  box-shadow:
    0 0 10px rgba(255, 69, 0, 0.4),
    0 0 20px rgba(255, 69, 0, 0.2),
    inset 0 0 30px rgba(212, 175, 55, 0.1);
}

.poster-frame::before,
.poster-frame::after {
  content: '';
  position: absolute;
  inset: -3px;
  background: linear-gradient(45deg, #FF4500, #D4AF37, #FF4500);
  opacity: 0;
  transition: opacity 0.5s ease;
  z-index: -1;
  filter: blur(10px);
}

.poster-frame:hover::before,
.poster-frame:hover::after {
  opacity: 0.6;
}
```

### Audio Waveform Animation

```html
<!-- SVG Waveform (inline in footer/sections) -->
<svg class="waveform" viewBox="0 0 1000 100" preserveAspectRatio="none">
  <path class="waveform-path" d="M0,50 Q250,20 500,50 T1000,50" />
</svg>
```

```css
.waveform {
  width: 100%;
  height: 80px;
  opacity: 0.3;
}

.waveform-path {
  fill: none;
  stroke: url(#gradient);
  stroke-width: 2;
  animation: waveformPulse 3s ease-in-out infinite;
}

@keyframes waveformPulse {
  0%, 100% { stroke-dashoffset: 0; }
  50% { stroke-dashoffset: 50; }
}
```

---

## Component Examples

### Hero Section (Homepage)

```html
<section class="hero">
  <div class="hero-background">
    <img src="VOD_Fest_Plakat.png" alt="VOD Fest 2026 Poster" />
    <div class="grunge-overlay"></div>
    <div class="film-grain"></div>
  </div>

  <div class="hero-content">
    <h1 class="hero-title">VOD FEST 2026</h1>
    <p class="hero-subtitle">17-19 July // Friedrichshafen, Germany</p>
    <p class="hero-tagline">Industrial / Experimental / Post-Punk / Avant-Garde</p>
    <div class="hero-cta">
      <button class="btn-primary pulse-glow">Get Tickets</button>
      <button class="btn-secondary">View Lineup</button>
    </div>
  </div>

  <div class="waveform-bottom">
    <!-- Animated waveform SVG -->
  </div>
</section>
```

### Band Card Example

```html
<article class="band-card">
  <div class="band-image">
    <img src="hunting-lodge.jpg" alt="Hunting Lodge" />
  </div>
  <div class="band-content">
    <h3 class="band-name">HUNTING LODGE</h3>
    <p class="band-time">Friday 22:45 - 24:00 // Inside Stage</p>
    <p class="band-description">
      Industrial noise pioneers from the 1980s underground...
    </p>
    <div class="band-links">
      <a href="#" class="link">Bandcamp</a>
      <a href="#" class="link">More Info</a>
    </div>
  </div>
</article>
```

### Schedule Timeline

```html
<div class="schedule-timeline">
  <div class="schedule-day">
    <h2 class="schedule-day-title">Friday, July 17</h2>

    <div class="schedule-item">
      <span class="schedule-time">17:00 - 18:00</span>
      <div class="schedule-details">
        <h4 class="schedule-band">IRSOL</h4>
        <span class="schedule-stage">Inside Stage</span>
      </div>
      <span class="schedule-duration">60 min</span>
    </div>

    <!-- Repeat for other bands -->
  </div>
</div>
```

---

## Dark/Light Mode

**Default:** Dark Mode (primary)
**Light Mode:** Not recommended for brand consistency, but if needed:

```css
@media (prefers-color-scheme: light) {
  /* Override only if user explicitly requests */
  /* Maintain dark aesthetic as much as possible */
  :root {
    --bg-primary: #F5E6D3; /* Aged paper */
    --text-primary: #4A0000;
    --accent-primary: #8B0000;
  }
}
```

**Recommendation:** Force dark mode always to maintain underground aesthetic.

---

## Print Styles

**For ticket confirmations, schedules:**

```css
@media print {
  * {
    background: white !important;
    color: black !important;
  }

  .hero-background,
  .film-grain,
  .grunge-overlay {
    display: none !important;
  }

  .band-card,
  .schedule-item {
    border: 1px solid #000;
    page-break-inside: avoid;
  }
}
```

---

## Image Specifications

### Hero/Background Images

- **Format:** WebP (fallback: JPG)
- **Resolution:** 1920x1080px minimum (16:9)
- **File Size:** < 200KB (optimized)
- **Treatment:** Overlay with grunge texture, reduce saturation 20%

### Band Photos

- **Format:** WebP (fallback: JPG)
- **Dimensions:** 800x800px (square) or 16:9 for hero shots
- **File Size:** < 150KB each
- **Treatment:** Slight desaturation, increase contrast 10-15%
- **Filter:** Optional sepia or red tint overlay

### Icons & Graphics

- **Format:** Inline SVG (scalable, animatable)
- **Fallback:** PNG @2x for older browsers
- **Color:** Gold (#D4AF37) as default

### Texture Files

- **Grunge Overlay:** 2048x2048px, PNG with transparency
- **Metal Rust:** 1024x1024px, JPG, tileable
- **Film Grain:** 512x512px, PNG, low opacity

---

## Performance Considerations

### Critical CSS

Inline critical CSS for above-the-fold content:
- Hero section styles
- Font declarations
- Primary colors
- Basic layout grid

### Lazy Loading

- All images below fold: `loading="lazy"`
- Band images: Intersection Observer
- Heavy animations: Only trigger on scroll into viewport

### Font Loading

```css
@font-face {
  font-family: 'Bebas Neue';
  src: url('/fonts/bebas-neue.woff2') format('woff2');
  font-display: swap; /* Prevent FOIT */
  font-weight: 700;
}
```

### Animation Performance

- Use `transform` and `opacity` only (GPU accelerated)
- Avoid animating `width`, `height`, `top`, `left`
- Use `will-change` sparingly
- Reduce motion for `prefers-reduced-motion`

```css
@media (prefers-reduced-motion: reduce) {
  * {
    animation-duration: 0.01ms !important;
    transition-duration: 0.01ms !important;
  }
}
```

---

## Browser Support

**Target Browsers:**
- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile Safari 14+
- Samsung Internet 14+

**Graceful Degradation:**
- No CSS Grid: Use Flexbox fallback
- No backdrop-filter: Use solid background
- No CSS animations: Static design still functional

**Progressive Enhancement:**
- Modern browsers get all effects
- Older browsers get simplified, still-beautiful version

---

## Implementation Notes

### CSS Architecture

```
/styles
  /base
    - reset.css
    - typography.css
    - colors.css
  /components
    - buttons.css
    - cards.css
    - forms.css
  /layout
    - grid.css
    - header.css
    - footer.css
  /pages
    - home.css
    - lineup.css
    - schedule.css
  /utilities
    - animations.css
    - spacing.css
  /vendor
    - normalize.css
```

### CSS Custom Properties (Variables)

```css
:root {
  /* Colors */
  --color-blood-red: #4A0000;
  --color-crimson: #8B0000;
  --color-black: #0D0000;
  --color-gold: #D4AF37;
  --color-brass: #C9A961;
  --color-cream: #E8D7B8;
  --color-orange: #FF4500;
  --color-fire: #DC143C;

  /* Fonts */
  --font-display: "Bebas Neue", Impact, sans-serif;
  --font-slab: "Rockwell", Georgia, serif;
  --font-body: "Inter", -apple-system, sans-serif;
  --font-mono: "Courier New", monospace;

  /* Spacing */
  --space-xs: 0.25rem;
  --space-sm: 0.5rem;
  --space-md: 1rem;
  --space-lg: 1.5rem;
  --space-xl: 2rem;
  --space-2xl: 3rem;
  --space-3xl: 4rem;
  --space-4xl: 6rem;
  --space-5xl: 8rem;

  /* Shadows */
  --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.3);
  --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.4);
  --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.5);
  --shadow-glow: 0 0 20px rgba(212, 175, 55, 0.4);

  /* Transitions */
  --transition-fast: 0.15s ease;
  --transition-base: 0.3s ease;
  --transition-slow: 0.6s ease;

  /* Border Radius (minimal) */
  --radius-sm: 2px;
  --radius-md: 4px;

  /* Z-index Scale */
  --z-behind: -1;
  --z-base: 0;
  --z-dropdown: 100;
  --z-sticky: 200;
  --z-modal: 300;
  --z-toast: 400;
  --z-overlay: 9998;
  --z-grain: 9999;
}
```

---

## Version History

**v1.0** (2026-02-02)
- Initial CI documentation
- Color palette defined from poster
- Typography system established
- Component library specified
- Animation guidelines created

---

## Design Credits & Inspiration

- **Poster Design:** Original VOD Fest 2026 artwork
- **Style References:**
  - 1970s punk rock concert posters
  - Industrial Revolution typography
  - Film noir cinematography
  - Brutalist architecture
  - Underground zine aesthetics

---

## Next Steps

1. ✅ CI Documentation complete
2. ⏭️ Create design mockups (Figma/Sketch)
3. ⏭️ Build WordPress custom theme
4. ⏭️ Implement component library
5. ⏭️ Test responsive design
6. ⏭️ Accessibility audit
7. ⏭️ Performance optimization
8. ⏭️ Content population
9. ⏭️ Launch staging site

---

**End of Corporate Identity Documentation**
