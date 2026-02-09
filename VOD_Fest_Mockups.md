# VOD Fest 2026 - Design Mockups & Wireframes

**Version:** 1.0
**Date:** 2026-02-02
**Based on:** VOD_Fest_CI.md

This document contains detailed wireframes and design specifications for all pages of the VOD Fest 2026 website.

---

## Site Structure Overview

```
VOD Fest 2026
│
├── Home (/)
├── Lineup (/lineup)
│   ├── All Bands Overview
│   └── Band Detail Pages (x21)
│       └── /band/[slug]
├── Schedule (/schedule)
│   ├── Friday
│   ├── Saturday
│   └── Sunday
├── Festival Info (/info)
│   ├── About VOD Fest
│   ├── 2025 Recap (photos/videos)
│   └── Venue Information
├── Travel (/travel)
│   ├── Getting There
│   ├── Accommodation
│   └── Public Transport
├── Tickets (/tickets)
├── Contact (/contact)
├── User Area
│   ├── Login/Register (/login, /register)
│   ├── Dashboard (/dashboard)
│   └── Profile (/profile)
└── Legal
    ├── Impressum
    ├── Privacy Policy (Datenschutz)
    └── Terms & Conditions
```

---

## Global Components

### Header/Navigation

```
┌─────────────────────────────────────────────────────────────────────┐
│                                                                       │
│  ┌──────────┐                                          ┌──────────┐  │
│  │ VOD FEST │                                          │ DE | EN  │  │
│  │   2026   │    [HOME] [LINEUP] [SCHEDULE] [INFO]    │ [LOGIN]  │  │
│  └──────────┘         [TRAVEL] [TICKETS] [CONTACT]    └──────────┘  │
│                                                                       │
└─────────────────────────────────────────────────────────────────────┘
```

**Desktop Header:**
- **Height:** 80px
- **Background:** `rgba(13, 0, 0, 0.95)` with backdrop-filter blur
- **Position:** Sticky (stays on scroll)
- **Logo:** "VOD FEST 2026" in Bebas Neue, Gold (#D4AF37)
- **Navigation:** Horizontal menu, uppercase, 14px
- **Language Switcher:** Top right, flag icons optional
- **Login Button:** Gold outline button

**Mobile Header:**
- **Hamburger Menu:** Top right, animated to X
- **Logo:** Centered, smaller
- **Menu:** Full-screen overlay slide-in from right
  - Dark red background (#4A0000)
  - Large text (24px), stacked vertically
  - Close icon top right

**Hover States:**
- Nav items: Gold underline animation (0.4s)
- Logo: Subtle glow effect

---

### Footer

```
┌─────────────────────────────────────────────────────────────────────┐
│                                                                       │
│                    ╔════════════════════════════╗                    │
│                    ║    AUDIO WAVEFORM SVG      ║                    │
│                    ╚════════════════════════════╝                    │
│                                                                       │
│  ┌────────────────────────────────────────────────────────────────┐ │
│  │                                                                  │ │
│  │  [LOGO]            QUICK LINKS           FOLLOW US              │ │
│  │  VOD FEST          • Home                • Facebook             │ │
│  │  2026              • Lineup              • Instagram            │ │
│  │                    • Schedule            • YouTube              │ │
│  │  17-19 July        • Tickets             • Bandcamp             │ │
│  │  Friedrichshafen   • Contact                                    │ │
│  │                                          NEWSLETTER              │ │
│  │  CONTACT           LEGAL                 [Email Input]          │ │
│  │  frank@vod-        • Impressum           [Subscribe Button]     │ │
│  │  records.com       • Privacy                                    │ │
│  │                    • Terms                                       │ │
│  │                                                                  │ │
│  └────────────────────────────────────────────────────────────────┘ │
│                                                                       │
│         © 2026 VOD Records. All Rights Reserved.                     │
│                                                                       │
└─────────────────────────────────────────────────────────────────────┘
```

**Footer Specs:**
- **Background:** Dark gradient (#0D0000 to #4A0000)
- **Top:** Animated audio waveform (80px height)
- **Layout:** 4 columns on desktop, stacked on mobile
- **Text Color:** Cream (#E8D7B8)
- **Links:** Gold on hover with underline
- **Social Icons:** Gold line icons, glow on hover
- **Newsletter:** Inline form, gold button

---

## Page 1: Home (/)

### Hero Section - Full Viewport

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                     ╔═══════════════════════════════╗                  │
│                     ║                               ║                  │
│                     ║   POSTER BACKGROUND IMAGE     ║                  │
│                     ║   (VOD_Fest_Plakat.png)       ║                  │
│                     ║                               ║                  │
│                     ║   + Dark overlay (50%)        ║                  │
│                     ║   + Grunge texture overlay    ║                  │
│                     ║   + Film grain animation      ║                  │
│                     ║                               ║                  │
│                     ╚═══════════════════════════════╝                  │
│                                                                         │
│                        VOD FEST 2026                                   │
│                                                                         │
│           INDUSTRIAL • EXPERIMENTAL • POST-PUNK • AVANT-GARDE          │
│                                                                         │
│                  17-19 JULY 2026 // FRIEDRICHSHAFEN                    │
│                                                                         │
│                  Kulturhaus Caserne, Fallenbrunnen                     │
│                                                                         │
│                                                                         │
│           ┌──────────────────┐    ┌──────────────────┐                │
│           │  GET TICKETS     │    │  VIEW LINEUP     │                │
│           │  (Gold Button)   │    │  (Outline)       │                │
│           └──────────────────┘    └──────────────────┘                │
│                                                                         │
│                           ↓                                            │
│                      [Scroll Down]                                     │
│                                                                         │
│    ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━       │
│                     Audio Waveform (animated)                          │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Hero Section Details:**
- **Height:** 100vh (full viewport)
- **Background:** Poster image with parallax scroll effect
- **Overlays:**
  - Dark gradient overlay (opacity 0.5)
  - Grunge texture (multiply blend mode)
  - Animated film grain (low opacity)
- **Title:** "VOD FEST 2026"
  - Font: Bebas Neue, 96px (desktop) / 48px (mobile)
  - Color: Gold (#D4AF37)
  - Text shadow with glow effect
  - Optional: Subtle distress/worn effect
- **Tagline:** Genres in uppercase, 18px, cream color
- **Date/Location:** 24px, brass color (#C9A961)
- **CTAs:**
  - Primary button: "GET TICKETS" (pulse glow animation)
  - Secondary button: "VIEW LINEUP"
  - 16px spacing between
- **Scroll Indicator:** Animated arrow bouncing
- **Waveform:** Bottom edge, 80px height, animated pulse

**Animations:**
- Fade in title (1s delay)
- Fade in subtitle/date (1.5s delay)
- Fade in buttons (2s delay)
- Parallax scroll on poster image (slower than scroll)
- Waveform continuous pulse

---

### About Section

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│   [Grunge texture background]                                          │
│                                                                         │
│                        IT'S HAPPENING AGAIN                            │
│                                                                         │
│   ═════════════════════════════════════════════════════════════       │
│                                                                         │
│   VOD Fest returns for its second year, bringing together 21 of       │
│   the most groundbreaking artists from the industrial, experimental,   │
│   post-punk and avant-garde scenes.                                    │
│                                                                         │
│   Three days. Two stages. Seven hours of music each evening.           │
│   From 5pm to midnight, immerse yourself in the underground sounds     │
│   that defined a generation and continue to push boundaries today.     │
│                                                                         │
│   ┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐      │
│   │      [21]       │  │       [3]       │  │       [7]       │      │
│   │     BANDS       │  │      DAYS       │  │   HOURS/DAY     │      │
│   └─────────────────┘  └─────────────────┘  └─────────────────┘      │
│                                                                         │
│                     [LEARN MORE BUTTON]                                │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**About Section Details:**
- **Background:** Dark red (#4A0000) with grunge texture
- **Padding:** 96px vertical
- **Max Width:** 1200px, centered
- **Headline:** "IT'S HAPPENING AGAIN"
  - 48px, Bebas Neue, Gold, centered
  - Decorative line below (gradient: gold to orange)
- **Body Text:**
  - 18px, Inter, Cream color
  - Line height 1.7, max-width 800px, centered
  - 2 paragraphs with 24px spacing
- **Stats Cards:**
  - 3 cards in row (stack on mobile)
  - Dark background with border glow
  - Large number (64px, gold)
  - Label below (14px, uppercase, brass)
  - Subtle hover lift effect
- **CTA:** Secondary button, centered

**Animation:** Fade in on scroll (Intersection Observer)

---

### Featured Lineup Teaser

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                        FEATURED ARTISTS                                │
│                                                                         │
│   ┌──────────────┐  ┌──────────────┐  ┌──────────────┐               │
│   │              │  │              │  │              │               │
│   │  [Band Img]  │  │  [Band Img]  │  │  [Band Img]  │               │
│   │              │  │              │  │              │               │
│   ├──────────────┤  ├──────────────┤  ├──────────────┤               │
│   │ HUNTING      │  │ ESPLENDOR    │  │ LYDIA LUNCH  │               │
│   │ LODGE        │  │ GEOMETRICO   │  │ MARC HURTADO │               │
│   │              │  │              │  │              │               │
│   │ FRI 22:45    │  │ SAT 22:45    │  │ SAT 19:45    │               │
│   │ Inside Stage │  │ Inside Stage │  │ Outside Stage│               │
│   │ [Bandcamp ↗] │  │ [Bandcamp ↗] │  │ [Bandcamp ↗] │               │
│   └──────────────┘  └──────────────┘  └──────────────┘               │
│                                                                         │
│   ┌──────────────┐  ┌──────────────┐  ┌──────────────┐               │
│   │              │  │              │  │              │               │
│   │  [Band Img]  │  │  [Band Img]  │  │  [Band Img]  │               │
│   │              │  │              │  │              │               │
│   ├──────────────┤  ├──────────────┤  ├──────────────┤               │
│   │ NO MORE      │  │ CRASH COURSE │  │ THE ANTI     │               │
│   │              │  │ IN SCIENCE   │  │ GROUP        │               │
│   │ FRI 19:30    │  │ FRI 20:30    │  │ SAT 20:45    │               │
│   │ Outside Stage│  │ Inside Stage │  │ Inside Stage │               │
│   └──────────────┘  └──────────────┘  └──────────────┘               │
│                                                                         │
│                     [VIEW ALL 21 BANDS →]                              │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Featured Lineup Details:**
- **Background:** Darker section (#0D0000)
- **Layout:** 3 columns (desktop), 2 (tablet), 1 (mobile)
- **Band Cards:**
  - Square format (400x400px)
  - Image: Band photo with red overlay on hover
  - Band name: 24px, Bebas Neue, Gold
  - Time/Stage: 14px, monospace, brass color
  - Bandcamp link: Small, bottom right, hover underline
  - Border: 2px gold, glow effect on hover
  - Hover: Lift up 4px, increase border glow
- **Grid Gap:** 32px
- **CTA:** Gold button, arrow icon, centered below grid

**Interaction:**
- Hover card: Image zooms 1.1x, overlay fades in
- Click card: Navigate to band detail page
- Bandcamp link: External link icon, opens new tab

---

### Schedule Preview

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      THREE DAYS OF MUSIC                               │
│                                                                         │
│   ┌─────────────────────────────────────────────────────────────────┐ │
│   │  [FRIDAY]  [SATURDAY]  [SUNDAY]  ← Tabs                         │ │
│   ├─────────────────────────────────────────────────────────────────┤ │
│   │                                                                   │ │
│   │  17:00  IRSOL                                    [Inside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  18:00  JOACHIM IRMLER (FAUST)                  [Outside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  18:30  O YUKI CONJUGATE                         [Inside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  19:30  NO MORE                                 [Outside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  20:30  CRASH COURSE IN SCIENCE                  [Inside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  21:30  DIETRICH VON EULER-DONNERSPERG          [Outside Stage]  │ │
│   │  ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  │ │
│   │  22:45  HUNTING LODGE                            [Inside Stage]  │ │
│   │                                                                   │ │
│   └─────────────────────────────────────────────────────────────────┘ │
│                                                                         │
│                   [VIEW FULL SCHEDULE →]                               │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Schedule Preview Details:**
- **Background:** Dark red with metal texture
- **Tabs:** Horizontal, 3 days
  - Active tab: Gold bottom border (4px), brighter text
  - Inactive: Brass color, hover effect
  - Click animation: Fade content swap
- **Schedule Items:**
  - Time: 18px, monospace, gold
  - Band name: 20px, Bebas Neue, cream
  - Stage: 14px, uppercase, brass, right-aligned
  - Separator: Dotted line, brass color
  - Hover: Highlight row, slight background change
- **Responsive:** Stack items vertically on mobile
- **CTA:** View full schedule button

---

### Venue & Location

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                       THE VENUE                                        │
│                                                                         │
│   ┌─────────────────────────┐  ┌────────────────────────────────────┐│
│   │                         │  │                                      ││
│   │   [VENUE PHOTO          │  │  KULTURHAUS CASERNE                 ││
│   │    Wide shot of         │  │  Fallenbrunnen 17                   ││
│   │    Kulturhaus Caserne]  │  │  88045 Friedrichshafen             ││
│   │                         │  │  Germany                            ││
│   │                         │  │                                      ││
│   │                         │  │  Two stages - inside and outside     ││
│   │                         │  │  seating for underground atmosphere ││
│   │                         │  │                                      ││
│   │                         │  │  ┌────────────────────────┐         ││
│   │                         │  │  │  [VIEW MAP]            │         ││
│   │                         │  │  │  [GET DIRECTIONS]      │         ││
│   └─────────────────────────┘  │  └────────────────────────┘         ││
│                                 │                                      ││
│                                 │  PUBLIC TRANSPORT:                  ││
│                                 │  Bus 10 or 12 to "Hochschulen"      ││
│                                 │  5 min walk from stop               ││
│                                 │                                      ││
│                                 └────────────────────────────────────┘│
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Venue Section Details:**
- **Layout:** 2 columns (50/50), stack on mobile
- **Left:** Venue photo with dark overlay
- **Right:** Venue information card
  - Dark background with border
  - Heading: 32px, Bebas Neue, Gold
  - Address: 16px, Inter, Cream
  - Description: 18px, line height 1.6
  - Buttons: Stacked, full width on mobile
  - Transport info: Small box, brass color

---

### Newsletter Signup

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│   [Dark red background with subtle waveform pattern]                   │
│                                                                         │
│                     STAY IN THE LOOP                                   │
│                                                                         │
│        Get lineup updates, ticket information, and exclusive           │
│              content straight to your inbox.                           │
│                                                                         │
│            ┌────────────────────────────────────────────┐              │
│            │  [Email Address]            [SUBSCRIBE]    │              │
│            └────────────────────────────────────────────┘              │
│                                                                         │
│              No spam, just underground music news.                     │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Newsletter Section Details:**
- **Background:** Dark red (#8B0000) with animated waveform pattern (subtle)
- **Padding:** 64px vertical
- **Max Width:** 700px, centered
- **Heading:** 48px, Bebas Neue, Gold
- **Description:** 18px, centered, cream color
- **Form:**
  - Inline input + button
  - Input: Dark background, gold border on focus
  - Button: Primary gold button
  - Full width on mobile (stacked)
- **Fine Print:** 14px, brass color, italic

---

### Call to Action (Final)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│   [Poster background, heavily darkened]                                │
│                                                                         │
│                                                                         │
│                    JULY 17-19, 2026                                    │
│                    DON'T MISS OUT                                      │
│                                                                         │
│                   Only 100 tickets available                           │
│                                                                         │
│                 ┌──────────────────────────┐                           │
│                 │    GET YOUR TICKET       │                           │
│                 │    (Pulse glow effect)   │                           │
│                 └──────────────────────────┘                           │
│                                                                         │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Final CTA Details:**
- **Height:** 60vh minimum
- **Background:** Poster image, 70% dark overlay, parallax
- **Content:** Centered, white text with heavy shadow
- **Urgency:** "Only 100 tickets" in smaller text, orange color
- **Button:** Large primary button with pulse glow animation

---

## Page 2: Lineup (/lineup)

### Hero

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│   [Dark texture background]                                            │
│                                                                         │
│                         THE LINEUP                                     │
│                                                                         │
│             21 Artists // 3 Days // 2 Stages                           │
│                                                                         │
│   ┌──────────────────────────────────────────────────────────────┐    │
│   │  [SEARCH BANDS...]                                     [🔍]  │    │
│   └──────────────────────────────────────────────────────────────┘    │
│                                                                         │
│   [ALL] [FRIDAY] [SATURDAY] [SUNDAY] [INSIDE] [OUTSIDE] ← Filters     │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Lineup Hero:**
- **Height:** 50vh
- **Search Bar:** Large, centered, 600px max-width
  - Gold border, dark background
  - Instant search (filters as you type)
- **Filter Tags:** Below search, clickable pills
  - Active: Gold background
  - Inactive: Gold outline
  - Multiple selection allowed

---

### Band Grid

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐  ┌──────────┐ │
│  │              │  │              │  │              │  │           │ │
│  │  [Band Img]  │  │  [Band Img]  │  │  [Band Img]  │  │ [Band Img]│ │
│  │              │  │              │  │              │  │           │ │
│  ├──────────────┤  ├──────────────┤  ├──────────────┤  ├──────────┤ │
│  │ HUNTING      │  │ ESPLENDOR    │  │ NO MORE      │  │ CRASH     │ │
│  │ LODGE        │  │ GEOMETRICO   │  │              │  │ COURSE... │ │
│  │              │  │              │  │              │  │           │ │
│  │ FRI 22:45    │  │ SAT 22:45    │  │ FRI 19:30    │  │ FRI 20:30 │ │
│  │ Inside       │  │ Inside       │  │ Outside      │  │ Inside    │ │
│  │              │  │              │  │              │  │           │ │
│  │ [♥ SAVE]     │  │ [♥ SAVE]     │  │ [♥ SAVE]     │  │ [♥ SAVE]  │ │
│  └──────────────┘  └──────────────┘  └──────────────┘  └──────────┘ │
│                                                                         │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐  ┌──────────┐ │
│  │  [Continue with remaining 17 bands in same format...]             │ │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Band Grid Details:**
- **Layout:** 4 columns (desktop), 3 (tablet), 2 (mobile)
- **Card Structure:**
  - Square image (1:1 ratio)
  - Band name: 20px, Bebas Neue, Gold
  - Time/Day: 14px, monospace, brass
  - Stage: 14px, uppercase, cream
  - Save button: Heart icon, gold outline
    - Filled heart if saved (logged in users)
    - Click to add to favorites
  - Hover: Card lifts, border glows
- **Sorting:** Default alphabetical, can sort by day/time
- **Animation:** Stagger fade-in on load (0.1s delay each)

---

## Page 3: Band Detail Page (/band/[slug])

### Example: Hunting Lodge

```
┌───────────────────────────────────────────────────────────────────────┐
│ ← Back to Lineup                                                       │
│                                                                         │
│  ┌──────────────────────────┐  ┌────────────────────────────────────┐│
│  │                          │  │                                      ││
│  │    [LARGE BAND PHOTO     │  │   HUNTING LODGE                     ││
│  │     Hero image with      │  │                                      ││
│  │     dark overlay]        │  │   Industrial Noise / Power          ││
│  │                          │  │   Electronics                        ││
│  │     800x800px            │  │                                      ││
│  │                          │  │   ┌──────────────┐ ┌──────────────┐││
│  │                          │  │   │ ♥ SAVE BAND  │ │ LISTEN ON    │││
│  │                          │  │   │              │ │ BANDCAMP     │││
│  │                          │  │   └──────────────┘ └──────────────┘││
│  │                          │  │                                      ││
│  └──────────────────────────┘  │   PERFORMANCE DETAILS:              ││
│                                 │   ━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━  ││
│                                 │   Date: Friday, July 17, 2026       ││
│                                 │   Time: 22:45 - 24:00 (75 minutes) ││
│                                 │   Stage: Inside Venue               ││
│                                 │                                      ││
│                                 │   [ADD TO CALENDAR ↓]              ││
│                                 │                                      ││
│                                 └────────────────────────────────────┘│
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  ABOUT                                                                 │
│  ─────                                                                 │
│                                                                         │
│  Hunting Lodge emerged from the mid-1980s American industrial scene,   │
│  pioneering a brutal sound that fused power electronics with harsh     │
│  noise. Founded by Richard Ramirez, the project has remained a        │
│  cornerstone of the underground noise movement for nearly four         │
│  decades.                                                              │
│                                                                         │
│  Known for their confrontational live performances and uncompromising  │
│  sonic assault, Hunting Lodge continues to push the boundaries of      │
│  experimental music. Their appearance at VOD Fest 2026 marks a rare   │
│  European performance.                                                 │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  LISTEN                                                                │
│  ──────                                                                │
│                                                                         │
│  [Embedded Bandcamp Player - iframe]                                  │
│  [Album artwork + play buttons for preview tracks]                    │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  VIDEOS                                                                │
│  ──────                                                                │
│                                                                         │
│  ┌────────────────┐  ┌────────────────┐  ┌────────────────┐          │
│  │ [YouTube Vid]  │  │ [YouTube Vid]  │  │ [YouTube Vid]  │          │
│  │ Live at...     │  │ Live at...     │  │ Interview...   │          │
│  └────────────────┘  └────────────────┘  └────────────────┘          │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  MORE FROM THIS DAY                                                    │
│  ───────────────────                                                   │
│                                                                         │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐                │
│  │ IRSOL        │  │ O YUKI       │  │ NO MORE      │                │
│  │ 17:00        │  │ CONJUGATE    │  │ 19:30        │                │
│  │              │  │ 18:30        │  │              │                │
│  └──────────────┘  └──────────────┘  └──────────────┘                │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Band Detail Page Specs:**
- **Back Button:** Top left, gold with arrow, hover underline
- **Layout:** 2 columns (desktop), stacked (mobile)
  - Left: Band photo (40% width)
  - Right: Info panel (60% width)
- **Hero Image:** Square, dark overlay, zoom on hover
- **Band Name:** 48px, Bebas Neue, Gold
- **Genre Tags:** Pills, small, brass color
- **Action Buttons:**
  - Save Band (heart icon)
  - Listen on Bandcamp (external link)
- **Performance Box:**
  - Dark panel with border
  - Monospace font for dates/times
  - Add to Calendar: Generates .ics file
- **About Section:**
  - 18px body text, line height 1.7
  - Max width 800px for readability
  - 2-3 paragraphs
- **Bandcamp Embed:**
  - Styled to match dark theme
  - 300px height
- **Video Grid:**
  - 3 columns, responsive embeds
  - YouTube iframe with dark controls
- **Related Bands:**
  - Small cards, same day performances
  - Quick navigation

---

## Page 4: Schedule (/schedule)

### Full Schedule View

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                         FESTIVAL SCHEDULE                              │
│                                                                         │
│                     17-19 July 2026 // 17:00-24:00                     │
│                                                                         │
│   [ALL DAYS] [FRIDAY] [SATURDAY] [SUNDAY]  [INSIDE] [OUTSIDE]         │
│                                                                         │
│   [DAY VIEW] [TIMELINE VIEW] [LIST VIEW] ← View Toggles                │
│                                                                         │
│   ┌──────────────────────────────────────────────────────────────────┐│
│   │                                                                    ││
│   │  FRIDAY, JULY 17, 2026                                            ││
│   │  ════════════════════════                                         ││
│   │                                                                    ││
│   │  ┌───────────────────────────────────────────────────────┐       ││
│   │  │ 17:00 - 18:00                         INSIDE STAGE     │       ││
│   │  │ ───────────────────────────────────────────────────── │       ││
│   │  │ IRSOL                                 [Bandcamp ↗]    │       ││
│   │  │ Sonic Archives // Experimental                        │       ││
│   │  │ [♥ Save] [More Info →]                                │       ││
│   │  └───────────────────────────────────────────────────────┘       ││
│   │                                                                    ││
│   │  ┌───────────────────────────────────────────────────────┐       ││
│   │  │ 18:00 - 18:30                        OUTSIDE STAGE     │       ││
│   │  │ ───────────────────────────────────────────────────── │       ││
│   │  │ JOACHIM IRMLER (FAUST)                                │       ││
│   │  │ Krautrock Legend // Experimental                      │       ││
│   │  │ [♥ Save] [More Info →]                                │       ││
│   │  └───────────────────────────────────────────────────────┘       ││
│   │                                                                    ││
│   │  [Continue for all Friday performances...]                        ││
│   │                                                                    ││
│   │  SATURDAY, JULY 18, 2026                                          ││
│   │  ══════════════════════════                                       ││
│   │  [Same format...]                                                 ││
│   │                                                                    ││
│   │  SUNDAY, JULY 19, 2026                                            ││
│   │  ════════════════════════                                         ││
│   │  [Same format...]                                                 ││
│   │                                                                    ││
│   └──────────────────────────────────────────────────────────────────┘│
│                                                                         │
│   ┌──────────────────────────────────────────────────────────┐        │
│   │  DOWNLOAD FULL SCHEDULE                                  │        │
│   │  [PDF] [iCal] [Google Calendar]                          │        │
│   └──────────────────────────────────────────────────────────┘        │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Schedule Page Details:**
- **Filters:** Day and Stage filters (multi-select)
- **View Modes:**
  - **List View** (default): All performances chronologically
  - **Timeline View**: Visual timeline with time axis (17:00-24:00)
  - **Day View**: Side-by-side stages per day
- **Performance Cards:**
  - Time range: Large, monospace, gold
  - Stage: Badge (color-coded: Inside=red, Outside=orange)
  - Band name: 24px, Bebas Neue, cream
  - Genre/description: Small, italic, brass
  - Actions: Save, More Info, Bandcamp
  - Border: Left border (4px) color-coded by stage
- **Download Options:**
  - PDF: Formatted printable schedule
  - iCal: Import to Apple Calendar
  - Google Calendar: Direct import link
- **Now Playing Indicator:**
  - During festival: Highlight current/upcoming performance
  - Pulsing gold border, "NOW" badge

---

### Timeline View (Alternative)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      FRIDAY, JULY 17, 2026                             │
│                                                                         │
│  Time    │ OUTSIDE STAGE          │ INSIDE STAGE                      │
│  ─────────┼────────────────────────┼───────────────────────────────── │
│          │                        │                                    │
│  17:00   │                        │ ┌──────────────────┐              │
│          │                        │ │ IRSOL            │              │
│  18:00   │ ┌──────────┐          │ └──────────────────┘              │
│          │ │ JOACHIM  │          │                                    │
│  18:30   │ │ IRMLER   │          │ ┌──────────────────┐              │
│          │ └──────────┘          │ │ O YUKI           │              │
│  19:30   │ ┌──────────────────┐  │ │ CONJUGATE        │              │
│          │ │ NO MORE          │  │ └──────────────────┘              │
│  20:30   │ │                  │  │ ┌──────────────────┐              │
│          │ └──────────────────┘  │ │ CRASH COURSE     │              │
│  21:30   │ ┌──────────────┐      │ │ IN SCIENCE       │              │
│          │ │ DIETRICH VON │      │ └──────────────────┘              │
│  22:15   │ │ EULER D.     │      │                                    │
│          │ └──────────────┘      │                                    │
│  22:45   │                        │ ┌──────────────────┐              │
│          │                        │ │ HUNTING LODGE    │              │
│  24:00   │                        │ │                  │              │
│          │                        │ └──────────────────┘              │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Timeline View Features:**
- Visual representation of overlapping performances
- Two-column layout (Outside/Inside stages)
- Time axis on left
- Performance blocks sized by duration
- Click block to see band details
- Hover: Highlight with glow, show quick info tooltip

---

## Page 5: Festival Info (/info)

### About VOD Fest

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                        ABOUT VOD FEST                                  │
│                                                                         │
│  ┌─────────────────────────────────────────────────────────────────┐  │
│  │                                                                   │  │
│  │  VOD Fest is a celebration of the underground music scene that   │  │
│  │  shaped generations. Industrial, experimental, post-punk, and    │  │
│  │  avant-garde sounds come together for three days in the heart    │  │
│  │  of Southern Germany.                                            │  │
│  │                                                                   │  │
│  │  Born from the vision of VOD Records founder Frank Bull, the     │  │
│  │  festival brings together legendary artists and emerging voices  │  │
│  │  in an intimate, non-commercial setting.                         │  │
│  │                                                                   │  │
│  └─────────────────────────────────────────────────────────────────┘  │
│                                                                         │
│  THE PHILOSOPHY                                                        │
│  ──────────────                                                        │
│                                                                         │
│  ✓ Non-profit, community-driven                                       │
│  ✓ Intimate venue, no corporate sponsors                              │
│  ✓ Accessible to underground music fans                               │
│  ✓ Focus on artist quality over quantity                              │
│  ✓ Preserve the DIY spirit of the scene                               │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

---

### 2025 Recap

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      VOD FEST 2025 - LOOKING BACK                      │
│                                                                         │
│  ┌────────────────┐  ┌────────────────┐  ┌────────────────┐          │
│  │                │  │                │  │                │          │
│  │  [Photo 1]     │  │  [Photo 2]     │  │  [Photo 3]     │          │
│  │  Crowd shot    │  │  Band perform  │  │  Venue night   │          │
│  │                │  │                │  │                │          │
│  └────────────────┘  └────────────────┘  └────────────────┘          │
│                                                                         │
│  ┌────────────────┐  ┌────────────────┐  ┌────────────────┐          │
│  │  [Photo 4]     │  │  [Photo 5]     │  │  [Photo 6]     │          │
│  └────────────────┘  └────────────────┘  └────────────────┘          │
│                                                                         │
│  "An unforgettable experience. The lineup was incredible, the venue   │
│   was perfect, and the atmosphere was exactly what we needed."        │
│   — Attendee feedback 2025                                            │
│                                                                         │
│  [VIEW FULL GALLERY →]                                                │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  VIDEO HIGHLIGHTS                                                      │
│  ────────────────                                                      │
│                                                                         │
│  [Embedded YouTube video - 2025 festival recap, 3-5 minutes]          │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**2025 Recap Details:**
- Photo grid: 3 columns, masonry layout
- Lightbox on click (full-screen gallery)
- Testimonial quote: Large, italic, centered, gold color
- Video: 16:9 embed, YouTube with dark controls

---

### Venue Information

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                     KULTURHAUS CASERNE                                 │
│                                                                         │
│  ┌──────────────────────────┐  ┌────────────────────────────────────┐│
│  │                          │  │ Address:                            ││
│  │  [VENUE MAP]             │  │ Fallenbrunnen 17                    ││
│  │  Google Maps embed       │  │ 88045 Friedrichshafen              ││
│  │  or static map image     │  │ Germany                             ││
│  │                          │  │                                      ││
│  │                          │  │ [GET DIRECTIONS →]                  ││
│  │                          │  │                                      ││
│  │                          │  │ ABOUT THE VENUE:                    ││
│  │                          │  │ ───────────────                     ││
│  │                          │  │ Historic cultural center with two   ││
│  │                          │  │ stages - an intimate inside space   ││
│  │                          │  │ and an outdoor courtyard stage.     ││
│  │                          │  │                                      ││
│  │                          │  │ FACILITIES:                         ││
│  │                          │  │ • Bar & beverages                   ││
│  │                          │  │ • Accessible entrance               ││
│  │                          │  │ • Coat check                        ││
│  │                          │  │ • Outdoor seating area              ││
│  │                          │  │                                      ││
│  └──────────────────────────┘  └────────────────────────────────────┘│
│                                                                         │
│  Website: kulturhaus-caserne.de                                        │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

---

## Page 6: Travel & Accommodation (/travel)

### Getting There

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      GETTING TO VOD FEST                               │
│                                                                         │
│  ┌──────────────────────┐  ┌──────────────────────┐  ┌──────────────┐│
│  │  🚆 BY TRAIN         │  │  ✈️ BY PLANE          │  │  🚗 BY CAR   ││
│  │                      │  │                      │  │              ││
│  │  Friedrichshafen     │  │  Closest airports:   │  │  Parking:    ││
│  │  Stadtbahnhof        │  │  • Friedrichshafen   │  │  Limited     ││
│  │                      │  │    (10 min)          │  │  street      ││
│  │  Direct trains from: │  │  • Zurich (90 min)   │  │  parking     ││
│  │  • Munich (2.5h)     │  │  • Stuttgart (1h)    │  │  nearby      ││
│  │  • Stuttgart (2h)    │  │                      │  │              ││
│  │  • Zurich (2h)       │  │  [SEARCH FLIGHTS]    │  │ [MAP →]      ││
│  │                      │  │                      │  │              ││
│  └──────────────────────┘  └──────────────────────┘  └──────────────┘│
│                                                                         │
│  PUBLIC TRANSPORT FROM STATION                                         │
│  ─────────────────────────────────                                     │
│                                                                         │
│  🚌 Bus 10 or 12 to "Hochschulen" stop (5 min ride)                   │
│                                                                         │
│  ┌─────────────────────────────────────────────────────────────────┐  │
│  │  Stadtbahnhof ─────> Bus 10/12 ─────> Hochschulen ─┐           │  │
│  │                      (5 min)            (5 min walk) │           │  │
│  │                                              ↓       │           │  │
│  │                                         VOD FEST     │           │  │
│  └─────────────────────────────────────────────────────────────────┘  │
│                                                                         │
│  Schedule: stadtverkehr-fn.de                                          │
│  Buses run frequently until 23:00                                      │
│  Last bus after festival: Special service organized                    │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

---

### Accommodation

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      WHERE TO STAY                                     │
│                                                                         │
│  ┌───────────────────────────────────────────────────────────────┐    │
│  │  RECOMMENDED HOTELS                                            │    │
│  │                                                                 │    │
│  │  ⭐⭐⭐⭐ Hotel Graf Zeppelin                                  │    │
│  │  • 800m from venue (10 min walk)                              │    │
│  │  • €120-180/night                                             │    │
│  │  • [BOOK NOW →]                                               │    │
│  │  ─────────────────────────────────────────────────────────   │    │
│  │  ⭐⭐⭐ City Krone                                             │    │
│  │  • 1.5km from venue (bus or 15 min walk)                     │    │
│  │  • €80-120/night                                              │    │
│  │  • [BOOK NOW →]                                               │    │
│  │  ─────────────────────────────────────────────────────────   │    │
│  │  ⭐⭐ JUFA Hotel                                               │    │
│  │  • Budget option, 2km from venue                              │    │
│  │  • €50-80/night                                               │    │
│  │  • [BOOK NOW →]                                               │    │
│  └───────────────────────────────────────────────────────────────┘    │
│                                                                         │
│  ┌───────────────────────────────────────────────────────────────┐    │
│  │  ALTERNATIVE ACCOMMODATION                                     │    │
│  │                                                                 │    │
│  │  🏕️ Camping: Campingplatz Friedrichshafen (3km)              │    │
│  │  🏠 Airbnb: Various options in Friedrichshafen                │    │
│  │  🏨 Hostel: No hostels in FN, nearest in Konstanz (30km)      │    │
│  └───────────────────────────────────────────────────────────────┘    │
│                                                                         │
│  💡 Tip: Book early! July is peak season at Lake Constance.           │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

---

### Things to Do

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                  EXPLORE FRIEDRICHSHAFEN                               │
│                                                                         │
│  🏛️ Zeppelin Museum - Aviation history                                │
│  🌊 Lake Constance - Waterfront promenade                              │
│  🍺 Biergarten am See - Lakeside beer garden                           │
│  🎨 Kunstverein - Contemporary art gallery                             │
│  🛍️ Altstadt - Old town shopping & cafes                              │
│                                                                         │
│  DAY TRIPS:                                                            │
│  • Meersburg (30 min) - Medieval castle town                          │
│  • Konstanz (45 min) - University city                                │
│  • Mainau Island (1h) - Flower island                                 │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

---

## Page 7: Tickets (/tickets)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                        GET YOUR TICKET                                 │
│                                                                         │
│                         Only 100 Tickets Available                     │
│                                                                         │
│  ┌─────────────────────────────────────────────────────────────────┐  │
│  │                                                                   │  │
│  │                      VOD FEST 2026                                │  │
│  │                    3-DAY PASS                                     │  │
│  │                                                                   │  │
│  │               July 17, 18, 19 // 17:00-24:00                      │  │
│  │                                                                   │  │
│  │                      €333                                         │  │
│  │                   per person                                      │  │
│  │                                                                   │  │
│  │  ✓ Access to all 21 performances                                 │  │
│  │  ✓ Both stages (inside + outside)                                │  │
│  │  ✓ 3 full days of music                                           │  │
│  │  ✓ Wristband pickup starting Thursday                            │  │
│  │                                                                   │  │
│  └─────────────────────────────────────────────────────────────────┘  │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  ORDER FORM                                                            │
│  ──────────                                                            │
│                                                                         │
│  ┌─────────────────────────────────────────────────────────────────┐  │
│  │                                                                   │  │
│  │  Your Name *                                                      │  │
│  │  [_____________________________________________]                  │  │
│  │                                                                   │  │
│  │  Email Address *                                                  │  │
│  │  [_____________________________________________]                  │  │
│  │                                                                   │  │
│  │  Number of Tickets *                                              │  │
│  │  [ 1 ▼]    €333                                                   │  │
│  │                                                                   │  │
│  │  □ 2 Tickets (€666)                                              │  │
│  │                                                                   │  │
│  │  Language Preference                                              │  │
│  │  ( ) English  ( ) Deutsch                                         │  │
│  │                                                                   │  │
│  │  Special Requests (optional)                                      │  │
│  │  [_____________________________________________]                  │  │
│  │  [_____________________________________________]                  │  │
│  │                                                                   │  │
│  │  □ Subscribe to newsletter                                        │  │
│  │                                                                   │  │
│  │  □ I agree to the Terms & Conditions                             │  │
│  │                                                                   │  │
│  │                   [SUBMIT ORDER]                                  │  │
│  │                                                                   │  │
│  └─────────────────────────────────────────────────────────────────┘  │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  WHAT HAPPENS NEXT?                                                    │
│  ──────────────────                                                    │
│                                                                         │
│  1️⃣ You'll receive an order confirmation email immediately            │
│                                                                         │
│  2️⃣ Transfer the ticket price to:                                     │
│     Account holder: Frank Bull                                         │
│     IBAN: DE35690618000060018316                                       │
│     BIC: GENODE61UBE                                                   │
│     Reference: Your name + VOD2026                                     │
│                                                                         │
│     Alternative: PayPal to frank@vod-records.com                       │
│     (Bank transfer preferred due to fees)                              │
│                                                                         │
│  3️⃣ Within 2-3 business days after payment, you'll receive a          │
│     confirmation email with your ticket details                        │
│                                                                         │
│  4️⃣ Pick up your wristband:                                           │
│     • Thursday July 17: 17:00-22:00 at Pinart Gallery                 │
│     • Friday July 18: 11:00-16:00 at Pinart Gallery                   │
│     • Friday-Sunday: At festival entrance from 15:00                  │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  QUESTIONS?                                                            │
│  ──────────                                                            │
│                                                                         │
│  Contact: frank@vod-records.com                                        │
│  We'll respond within 24 hours                                         │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Ticket Page Details:**
- **Hero:** Clean pricing card, centered, large
- **Form:**
  - Dark inputs with gold borders
  - Clear labels, required field indicators (*)
  - Dropdown for quantity (1 or 2)
  - Checkbox for terms (required)
  - Newsletter opt-in (pre-checked)
  - Validation: Real-time, red error messages
- **Submit Button:** Large primary gold button
  - On submit: Shows loading spinner
  - Success: Confirmation message + email notification
  - Email sends to: user + frank@vod-records.com
- **Instructions:** Step-by-step, numbered, clear
- **Payment Details:** Formatted, easy to copy
- **Contact:** Prominent, reassuring

---

## Page 8: Contact (/contact)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                         GET IN TOUCH                                   │
│                                                                         │
│  ┌────────────────────────────┐  ┌────────────────────────────────┐  │
│  │                            │  │                                  │  │
│  │  CONTACT FORM              │  │  ORGANIZER                       │  │
│  │                            │  │  ─────────                       │  │
│  │  Your Name *               │  │                                  │  │
│  │  [________________]        │  │  Frank Bull                      │  │
│  │                            │  │  VOD Records                     │  │
│  │  Email *                   │  │                                  │  │
│  │  [________________]        │  │  📧 frank@vod-records.com        │  │
│  │                            │  │                                  │  │
│  │  Subject                   │  │  📍 Eugenstraße 57               │  │
│  │  [________________]        │  │     88045 Friedrichshafen        │  │
│  │                            │  │     Germany                      │  │
│  │  Message *                 │  │                                  │  │
│  │  [________________]        │  │  ─────────────────────────────  │  │
│  │  [________________]        │  │                                  │  │
│  │  [________________]        │  │  FOLLOW US                       │  │
│  │  [________________]        │  │                                  │  │
│  │  [________________]        │  │  [Facebook] [Instagram]          │  │
│  │                            │  │  [YouTube] [Bandcamp]            │  │
│  │  [SEND MESSAGE]            │  │                                  │  │
│  │                            │  │  ─────────────────────────────  │  │
│  └────────────────────────────┘  │                                  │  │
│                                   │  PRESS INQUIRIES                 │  │
│                                   │                                  │  │
│                                   │  For press/media requests,       │  │
│                                   │  please email with "PRESS" in    │  │
│                                   │  the subject line.               │  │
│                                   │                                  │  │
│                                   └────────────────────────────────┘  │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Contact Page Details:**
- **Layout:** 2 columns (60/40), stacked on mobile
- **Form:** Standard contact form
  - Name, Email, Subject, Message (textarea)
  - Gold button
  - Success message on submit
  - Sends to frank@vod-records.com
- **Contact Info:** Formatted, copyable
- **Social Links:** Icon buttons with hover glow
- **Map:** Optional: Embed Google Map showing Pinart location

---

## Page 9: User Authentication

### Login Page (/login)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                                                                         │
│                      ┌────────────────────────┐                        │
│                      │                        │                        │
│                      │    LOGIN               │                        │
│                      │                        │                        │
│                      │  Email                 │                        │
│                      │  [______________]      │                        │
│                      │                        │                        │
│                      │  Password              │                        │
│                      │  [______________] 👁️   │                        │
│                      │                        │                        │
│                      │  □ Remember me         │                        │
│                      │                        │                        │
│                      │  [LOGIN BUTTON]        │                        │
│                      │                        │                        │
│                      │  Forgot password?      │                        │
│                      │                        │                        │
│                      │  ──────── OR ───────   │                        │
│                      │                        │                        │
│                      │  [Sign in with Google] │                        │
│                      │  [Sign in with FB]     │                        │
│                      │                        │                        │
│                      │  Don't have account?   │                        │
│                      │  [REGISTER NOW →]      │                        │
│                      │                        │                        │
│                      └────────────────────────┘                        │
│                                                                         │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

### Register Page (/register)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│                      ┌────────────────────────┐                        │
│                      │                        │                        │
│                      │  CREATE ACCOUNT        │                        │
│                      │                        │                        │
│                      │  Name *                │                        │
│                      │  [______________]      │                        │
│                      │                        │                        │
│                      │  Email *               │                        │
│                      │  [______________]      │                        │
│                      │                        │                        │
│                      │  Password *            │                        │
│                      │  [______________] 👁️   │                        │
│                      │  ⚠️ Min 8 characters   │                        │
│                      │                        │                        │
│                      │  Confirm Password *    │                        │
│                      │  [______________]      │                        │
│                      │                        │                        │
│                      │  Language              │                        │
│                      │  ( ) English           │                        │
│                      │  ( ) Deutsch           │                        │
│                      │                        │                        │
│                      │  □ Subscribe newsletter│                        │
│                      │  □ I agree to Terms*   │                        │
│                      │                        │                        │
│                      │  [CREATE ACCOUNT]      │                        │
│                      │                        │                        │
│                      │  Already registered?   │                        │
│                      │  [LOGIN →]             │                        │
│                      │                        │                        │
│                      └────────────────────────┘                        │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Auth Pages Details:**
- **Centered card:** 500px max-width, dark background
- **Poster background:** Blurred, darkened
- **Inputs:** Dark with gold borders on focus
- **Password:** Toggle visibility (eye icon)
- **Social OAuth:** Optional Google/Facebook buttons
- **Validation:** Real-time, inline error messages
- **Links:** Gold color, underline on hover

---

## Page 10: User Dashboard (/dashboard)

```
┌───────────────────────────────────────────────────────────────────────┐
│                                                                         │
│  Welcome back, [User Name]                         [Logout] [Profile]  │
│                                                                         │
│  ┌─────────────────────────────────────────────────────────────────┐  │
│  │                                                                   │  │
│  │  MY TICKET                                                        │  │
│  │  ──────────                                                       │  │
│  │                                                                   │  │
│  │  ✅ Ticket confirmed                                             │  │
│  │  Order #VOD2026-1234                                             │  │
│  │  1x 3-Day Pass                                                    │  │
│  │                                                                   │  │
│  │  Wristband pickup:                                               │  │
│  │  Thursday 17 July, 17:00-22:00                                   │  │
│  │  Pinart Gallery, Eugenstraße 57                                  │  │
│  │                                                                   │  │
│  │  [VIEW FULL DETAILS]                                             │  │
│  │                                                                   │  │
│  └─────────────────────────────────────────────────────────────────┘  │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  MY SAVED BANDS (7)                                                    │
│  ───────────────────                                                   │
│                                                                         │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐                │
│  │ HUNTING      │  │ ESPLENDOR    │  │ NO MORE      │                │
│  │ LODGE        │  │ GEOMETRICO   │  │              │                │
│  │ FRI 22:45    │  │ SAT 22:45    │  │ FRI 19:30    │                │
│  │ [♥ Remove]   │  │ [♥ Remove]   │  │ [♥ Remove]   │                │
│  └──────────────┘  └──────────────┘  └──────────────┘                │
│                                                                         │
│  [+4 more bands...]                                                    │
│                                                                         │
│  [EXPORT MY SCHEDULE] [ADD TO CALENDAR]                               │
│                                                                         │
│  ═══════════════════════════════════════════════════════════════════  │
│                                                                         │
│  NOTIFICATIONS                                                         │
│  ──────────────                                                        │
│                                                                         │
│  📧 Email Preferences:                                                 │
│  ✓ Festival updates                                                   │
│  ✓ Band announcements                                                 │
│  ✓ Newsletter                                                         │
│  □ VOD Records news                                                   │
│                                                                         │
│  [SAVE PREFERENCES]                                                    │
│                                                                         │
└───────────────────────────────────────────────────────────────────────┘
```

**Dashboard Details:**
- **Welcome Header:** User name, logout/profile links
- **Ticket Status Card:**
  - Prominent, top of page
  - Status indicator (✅ confirmed, ⏳ pending, ❌ error)
  - Order details
  - Key dates/info
- **Saved Bands:**
  - Grid of favorite bands
  - Quick remove/add
  - Export options (PDF, iCal)
- **Preferences:**
  - Email notification toggles
  - Language switcher
  - Newsletter management

---

## Responsive Breakpoints Summary

### Desktop (1024px+)
- Multi-column layouts
- Larger hero text
- Hover effects enabled
- Full navigation menu

### Tablet (768px - 1023px)
- 2-column layouts → 2 or 1 column
- Medium hero text
- Simplified navigation
- Touch-optimized buttons

### Mobile (< 768px)
- Single column
- Stacked sections
- Smaller text (80% of desktop)
- Hamburger menu
- Bottom-fixed CTA buttons
- Larger tap targets (48px min)
- Reduced animations

---

## Component States

### Button States
```
Default:   Gold gradient, shadow
Hover:     Brighter, lift up 2px, larger glow
Active:    Pressed down, smaller shadow
Focus:     Gold outline ring
Disabled:  50% opacity, no pointer
Loading:   Spinner overlay, disabled
```

### Card States
```
Default:   Dark bg, subtle border
Hover:     Lift up 4px, border glows gold
Active:    Slightly larger scale
Selected:  Gold left border (4px)
```

### Form States
```
Default:   Dark bg, brass border
Focus:     Gold border, subtle glow
Error:     Red border, error text below
Success:   Green border, checkmark icon
Disabled:  50% opacity, no interaction
```

---

## Image Treatment Guidelines

### Band Photos
- Desaturate 20%
- Increase contrast 10-15%
- Optional red tint overlay (10% opacity)
- Vignette effect (dark edges)

### Festival Photos (2025 Recap)
- Natural colors (no heavy filtering)
- Slight grain overlay
- Subtle vignette

### Hero Images
- Always use poster as base
- 50% dark overlay
- Grunge texture multiply blend
- Film grain animation

---

## Next Steps for Implementation

1. ✅ Mockups documented
2. ⏭️ Create high-fidelity designs (Figma/Sketch) [Optional]
3. ⏭️ Start WordPress theme development
4. ⏭️ Build component library (Storybook) [Optional]
5. ⏭️ Implement responsive layouts
6. ⏭️ Add animations & interactions
7. ⏭️ Content population & testing
8. ⏭️ Launch staging site

---

**End of Mockups Documentation**
