# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**VOD Fest 2026 Website** - A bilingual (German/English) music festival website for a 3-day underground/experimental music event in Friedrichshafen, Germany (July 17-19, 2026).

**Status:** Planning/Development phase - no code created yet

**Target Platform:** WordPress (preferred) or custom solution

**Primary Requirements Document:** `VOD_Fest_Details.md`

## Festival Details

**Event:** VOD Fest 2026
**Dates:** July 17-19, 2026
**Location:** Kulturhaus Caserne, Fallenbrunnen 17, 88045 Friedrichshafen, Germany
**Hours:** 17:00-24:00 each evening (Friday, Saturday, Sunday)
**Artists:** 21 bands over 3 days, split between outdoor and indoor stages
**Ticket Price:** €333 per person, €666 for two

**Key Bands:** Hunting Lodge, Esplendor Geométrico, Lydia Lunch/Marc Hurtado, No More, Crash Course in Science, Joachim Irmler (Faust), and 15 others

**Organizer:** Frank Bull (VOD Records)
**Contact:** frank@vod-records.com
**Pre-Event Location:** Pinart Gallery, Eugenstraße 57, 88045 Friedrichshafen

## Required Website Features

### Core Pages
- **Home:** Engaging landing page based on festival poster design
- **Festival Info 2025:** Images and information from previous year's festival
- **2026 Agenda:** Complete schedule with band timeslots (indoor/outdoor stages)
- **Bands Overview:** All 21 bands on one page
- **Individual Band Pages:** Dedicated page per band with bio, links, media
- **Travel & Accommodation:** Hotels, public transport info (Bus 10/12 to "Hochschulen" stop)
- **Visitor Testimonials:** Feedback from 2025 attendees
- **Contact:** Contact form and organizer information
- **Ticket Purchase:** Payment options (Bank transfer preferred, PayPal alternative)
- **Social Media Links:** Integration with all social platforms
- **User Registration/Login:** Account system for ticket holders and newsletter subscribers
- **User Dashboard:** Personal area for ticket status, newsletter preferences, saved bands

### Critical Content

**Band Schedule (parsed from VOD_Fest_Details.md lines 62-161):**
- Friday: 7 performances (Joachim Irmler, No More, Hunting Lodge, etc.)
- Saturday: 7 performances (Lydia Lunch/Marc Hurtado, Esplendor Geométrico, etc.)
- Sunday: 7 performances (Sutcliffe No More, Band of Holy Joy, etc.)

**Payment Details:**
```
Bank Transfer (preferred):
Frank Bull
BIC: GENODE61UBE
IBAN: DE35690618000060018316

PayPal (alternative): frank@vod-records.com
```

**Pre-Event Schedule:**
- Thursday, July 17: 17:00-22:00 - Early check-in at Pinart (wristbands, vinyl sales, DJ sets)
- Friday, July 18: 11:00-16:00 - Early check-in at Pinart
- Saturday, July 19: 11:00-14:00 - Meet & Greet, book presentation "Shock Factory"

**Public Transport:**
- Main Station (Stadtbahnhof) → Bus 10 or 12 → Stop "Hochschulen"
- Festival venue 5-minute walk from bus stop
- Info: https://www.stadtverkehr-fn.de/

## Design Specifications

**Visual Identity:** Use `VOD_Fest_Plakat.png` (1024x1536 PNG) as primary design inspiration
- Industrial/underground aesthetic
- Bold typography
- High contrast design

**Languages:** Full bilingual implementation (German + English language switcher)

**Mobile-First:** Responsive design essential for ticket buyers and travelers

## Technology Stack Recommendations

**WordPress Setup (Preferred):**
- Theme: Consider custom theme based on poster aesthetics or festival-oriented themes
- Plugins Needed:
  - Multilingual: WPML or Polylang
  - Events/Schedule: The Events Calendar or custom ACF implementation
  - Contact Forms: WPForms or Contact Form 7
  - SEO: Yoast SEO
  - User Registration: Ultimate Member or ProfilePress
  - Newsletter: Mailchimp for WordPress or Newsletter Plugin
  - Analytics: Site Kit by Google (official Google Analytics plugin)
  - Cookie Consent: Complianz GDPR/CCPA or Borlabs Cookie (GDPR-compliant)

**Alternative Stack (if WordPress unsuitable):**
- Next.js 15 + React 19 + TypeScript
- Tailwind CSS for styling
- i18next for translations
- Headless CMS (Sanity/Contentful) for content management
- NextAuth.js for authentication
- React Email + Resend/SendGrid for email delivery
- Google Analytics 4 + @next/third-parties for analytics

## Analytics & Marketing Integration

### Google Analytics 4 (GA4)

**Implementation:**
- Track page views, user journeys, conversion events
- Monitor ticket purchase funnel completion
- Analyze band page popularity
- Track newsletter sign-ups and user registrations

**Key Events to Track:**
- `ticket_interest` - User clicks ticket purchase button
- `band_view` - Band page visits
- `schedule_view` - Agenda page visits
- `newsletter_signup` - Newsletter subscription
- `user_registration` - New account creation
- `social_click` - Social media link clicks
- `external_link` - Bandcamp/external music links

**Privacy Compliance:**
- GDPR-compliant cookie consent banner required
- IP anonymization enabled
- User opt-out option
- Clear privacy policy disclosure

**WordPress Integration:**
```
Plugin: Site Kit by Google (official Google plugin)
- Connects Google Analytics, Search Console, AdSense
- Dashboard widget with key metrics
- Automatic event tracking setup
```

**Custom Stack Integration:**
```javascript
// Next.js: use @next/third-parties for optimized GA4 loading
import { GoogleAnalytics } from '@next/third-parties/google'

<GoogleAnalytics gaId="G-XXXXXXXXXX" />
```

### Newsletter System

**Recommended Solutions:**

**Option 1: Mailchimp (Recommended for festivals)**
- **Pros:** Industry standard, excellent deliverability, automation workflows, free tier up to 500 subscribers
- **Features:**
  - Segmentation (by ticket status, language preference, band interest)
  - Automated welcome series
  - Event reminders (pre-festival countdown emails)
  - Campaign analytics and A/B testing
- **Cost:** Free (0-500 subscribers), €13/month (501-1500), €20/month (1501-2500)
- **WordPress Plugin:** Mailchimp for WordPress (MC4WP)
- **API Integration:** Full REST API for custom implementations

**Option 2: Brevo (formerly Sendinblue) - Budget-Friendly**
- **Pros:** Unlimited contacts on free tier, transactional email included, EU-based (GDPR advantage)
- **Features:**
  - 300 emails/day free tier
  - SMS marketing option
  - Marketing automation
  - Contact management
- **Cost:** Free (300 emails/day), €19/month (20k emails), €39/month (40k emails)
- **WordPress Plugin:** Brevo (Official)

**Option 3: Newsletter Plugin (WordPress Native) - Simplest**
- **Pros:** No external service, complete data ownership, no monthly costs, easy setup
- **Features:**
  - Built-in subscription forms
  - Email composer with templates
  - Subscriber management
  - Basic automation
- **Limitations:** Deliverability depends on server reputation, no advanced segmentation
- **Cost:** Free (core) + €99/year (Professional add-ons)

**Option 4: ConvertKit - Creator-Focused**
- **Pros:** Visual automation builder, creator-friendly interface, excellent for storytelling
- **Features:**
  - Tag-based subscriber management
  - Landing page builder
  - Advanced automation sequences
  - Commerce integrations
- **Cost:** Free (0-300 subscribers), $15/month (301-1000), $29/month (1001-3000)

**Recommended Choice for VOD Fest:**
**Newsletter Plugin (WordPress)** - Simplest and most cost-effective solution. No monthly fees, complete data ownership, sufficient for ~100 ticket holders + newsletter subscribers.

**Setup:**
```
Plugin: Newsletter (by Stefano Lissa)
- Free forever, no subscriber limits
- Built-in subscription forms + widgets
- Drag & drop email composer
- Basic automation (welcome emails)
- SMTP integration for reliable delivery
- Export/import subscribers
- GDPR-compliant (EU-based developer)
```

**Alternative if more features needed later:**
**Brevo (formerly Sendinblue)** - Free tier with 300 emails/day (sufficient for 100 tickets + moderate newsletter list), EU-based, unlimited contacts.

**Newsletter Content Strategy:**
- **Weekly Updates:** Band announcements, behind-the-scenes content
- **Pre-Event Series:**
  - 3 months before: "Save the date" + early bird info
  - 2 months before: Travel guide + accommodation tips
  - 1 month before: Full schedule reveal
  - 2 weeks before: Wristband pickup info + last-minute details
  - 1 week before: Final reminders + weather forecast
- **Post-Event:** Thank you email + feedback survey + photo gallery
- **2027 Announcement:** Early-bird notification for VOD Fest 2027 (to retained users)
- **Monthly:** Band spotlight, VOD Records releases, underground music news

### SMTP Service & Automated Emails

**SMTP Provider Recommendations:**

**Option 1: Brevo (Sendinblue) - Recommended**
- **Free Tier:** 300 emails/day (9000/month)
- **Sufficient for:** ~100 ticket orders + registrations + newsletters
- **Features:** SMTP + transactional API, email templates, tracking
- **Setup:** Simple SMTP credentials, WordPress plugins available
- **Cost:** Free for current needs

**Option 2: SendGrid**
- **Free Tier:** 100 emails/day (3000/month)
- **May be tight** for newsletter + transactional combined
- **Cost:** $19.95/month for 50k emails if free tier exceeded

**Option 3: AWS SES (Amazon Simple Email Service)**
- **Cost:** $0.10 per 1000 emails (extremely cheap)
- **Complexity:** Requires AWS account setup, domain verification
- **Best for:** Technical users comfortable with AWS

**Option 4: Server SMTP (VPS Native)**
- **Cost:** Free (uses VPS mail server)
- **Risk:** Low deliverability, may land in spam folders
- **Not recommended** for important transactional emails

**Recommended: Brevo Free Tier**
- Sufficient for 100 tickets + moderate newsletter use
- Reliable deliverability
- EU-based (GDPR advantage)
- Easy WordPress integration

### Automated Email Templates

**1. User Registration Confirmation**
```
Subject: Welcome to VOD Fest 2026! / Willkommen beim VOD Fest 2026!

Content:
- Welcome message
- Account activation link (email verification)
- What's next: Explore lineup, order tickets, subscribe to newsletter
- Links to social media and festival info
```

**2. Newsletter Subscription Confirmation**
```
Subject: You're subscribed to VOD Fest updates / Newsletter-Anmeldung bestätigt

Content:
- Confirmation message
- What to expect: Band announcements, pre-event info, underground music news
- Unsubscribe link (GDPR required)
- Invite to create account for more features
```

**3. Ticket Order Confirmation (Automated)**
```
Subject: Ticket Order Received - VOD Fest 2026 / Ticketbestellung erhalten

Content:
- Order details (name, quantity, total amount)
- Payment instructions:
  - Bank: IBAN DE35690618000060018316, BIC: GENODE61UBE
  - Reference: [Name + Order ID]
  - PayPal: frank@vod-records.com (alternative)
- "We'll confirm your ticket within 2-3 business days after payment verification"
- Contact: frank@vod-records.com for questions
- Festival dates reminder: July 17-19, 2026
```

**4. Ticket Payment Confirmed (Manual trigger)**
```
Subject: Your VOD Fest 2026 Ticket is Confirmed! / Dein Ticket ist bestätigt!

Content:
- Payment confirmed, ticket secured
- Wristband pickup info:
  - Thursday July 17: 17:00-22:00 at Pinart Gallery
  - Friday July 18: 11:00-16:00 at Pinart Gallery
  - Or at venue entrance from 15:00 Friday
- Schedule overview + link to full lineup
- Travel & accommodation tips link
- Add to calendar file attachment
```

**5. Pre-Event Reminder (1 week before)**
```
Subject: VOD Fest 2026 starts in 7 days! / Noch 7 Tage bis zum VOD Fest!

Content (automated, sent to all ticket holders + subscribers):
- Final reminder: July 17-19
- Wristband pickup locations & times
- Public transport info (Bus 10/12 to "Hochschulen")
- Weather forecast
- Last-minute tips
- Emergency contact for day-of questions
```

**6. Password Reset**
```
Subject: Reset your VOD Fest account password

Content:
- Password reset link (expires in 1 hour)
- "Didn't request this? Ignore this email"
- Security reminder
```

**SMTP Configuration (WordPress):**
```php
Plugin: WP Mail SMTP (by WPForms)
- Provider: Brevo (Sendinblue)
- SMTP Host: smtp-relay.brevo.com
- SMTP Port: 587 (TLS) or 465 (SSL)
- Encryption: TLS
- Authentication: Yes
- Username: [Brevo account email]
- Password: [Brevo SMTP key]
- From Email: noreply@vodfest.com (or chosen domain)
- From Name: VOD Fest 2026
```

**Testing Automated Emails:**
```
- Test registration flow with real email
- Verify all emails land in inbox (not spam)
- Test German + English versions
- Verify all links work
- Check mobile rendering
- Test unsubscribe flow
```

### User Registration System

**Purpose:**
- Ticket holder account management
- Newsletter preference management
- Personalized festival experience
- Community building for repeat attendees

**User Roles:**

1. **Guest:** No account, can browse public content
2. **Subscriber:** Newsletter only, minimal data collection
3. **Ticket Holder:** Verified ticket purchase, full access
4. **VIP/Press:** Special access level (if needed for media)
5. **Admin:** Festival organizer team

**User Profile Features:**

**Basic Information:**
- Name, Email (required)
- Language preference (German/English)
- Country of origin
- Phone (optional, for urgent festival communications)

**Festival-Specific:**
- Ticket number/confirmation code
- Wristband pickup status
- Emergency contact (optional)
- Dietary restrictions (if catering planned)
- Accessibility needs

**Preferences:**
- Favorite bands (from lineup)
- Genre interests (for band recommendations)
- Email notification preferences:
  - Festival updates (mandatory for ticket holders)
  - Band announcements (optional)
  - VOD Records news (optional)
  - General newsletter (optional)
- SMS notifications (opt-in for urgent updates)

**User Dashboard:**
- Ticket order status (if ordered via website)
- Personal schedule builder (save favorite band performances)
- Newsletter subscription management
- Account settings
- Saved favorite bands
- Event updates and announcements

**Registration Flow:**

1. **Minimal Friction:** Email + password only for initial signup
2. **Progressive Profiling:** Request additional info after registration
3. **Ticket Verification:** Link ticket purchase to account via confirmation code
4. **Email Verification:** Required to prevent spam
5. **Social Login (Optional):** Facebook/Google OAuth for convenience

**WordPress Implementation:**
```
Plugin: Ultimate Member (free, extensible)
- Custom registration form fields
- User roles management
- Profile pages
- Email notifications
- reCAPTCHA integration

Alternative: ProfilePress (lighter, focused on essentials)
```

**Custom Stack Implementation:**
```
Auth: NextAuth.js with email/password + OAuth providers
Database: User table with profile fields, ticket references
Email: Resend/SendGrid for verification emails
Validation: Zod schemas for data validation
Security: bcrypt password hashing, JWT sessions
```

**Privacy & Security:**
- GDPR-compliant data processing
- User data export capability
- Account deletion option (but encourage data retention for future festivals)
- Secure password requirements (min 8 chars, complexity)
- Two-factor authentication (optional, via email code)
- Rate limiting on login attempts
- Email verification required
- Password reset flow

**Data Retention Policy:**
- User data kept indefinitely (with consent) for multi-year festival community
- Early announcements for VOD Fest 2027 to existing user base
- Opt-out option available, but default to keep subscribed for future events
- Benefit: Returning attendees get priority access to future ticket sales

**Integration with Ticket System (Simplified):**

**Ticket Order Flow:**
1. User fills out ticket order form (name, email, quantity, language preference)
2. Form sends email to organizer with order details
3. User receives automated confirmation: "Order received, please transfer €X to [bank details]"
4. Organizer manually verifies bank transfer
5. Organizer sends personal confirmation email with ticket info
6. User account (if registered) stores ticket status for reference

**No Complex Features Needed:**
- No ticket verification codes
- No automated payment matching
- No PDF ticket generation
- Simple email-based workflow for ~100 tickets
- Optional: Store ticket holder emails in user database for pre-event communications

## Band Data Structure

Each band entry should include:
- **Name:** Official band name
- **Day:** Friday/Saturday/Sunday
- **Stage:** Outside/Inside
- **Time:** Start-End times
- **Duration:** Performance length
- **Bandcamp URL:** Official music links (all bands have Bandcamp pages)
- **Bio:** Brief description (to be researched)
- **Images:** Band photos (to be sourced)
- **Videos:** Band Videos (to be sourced)
- **Genre/Tags:** For filtering/discovery

Example band entry from requirements:
```
HUNTING LODGE
Day: Friday, July 17
Stage: Venue Inside
Time: 22:45 - 24:00 (75 min)
Link: https://huntinglodge.bandcamp.com/
```

## Content Creation Tasks

**Required Research:**
1. Analyze successful music festival websites (Primavera Sound, Roadburn, Desert Daze, etc.)
2. Source band information and press photos from Bandcamp links
3. Collect testimonials from 2025 festival (may need to request from organizer)
4. Create visual mockups based on poster design
5. Gather accommodation recommendations near Friedrichshafen
6. Compile transportation information with real schedules

**Content to Request from Organizer:**
- 2025 festival photos/videos
- High-resolution poster files
- Band promotional materials
- Venue capacity/layout information
- Accessibility information

## Development Workflow

**Phase 1: Planning & Research (Current)**
- Create structured project directory
- Research festival website examples
- Design mockups/wireframes
- Content gathering

**Phase 2: Setup**
- WordPress installation (local → staging → production)
- Theme selection/customization
- Plugin configuration
- Bilingual structure setup
- Google Analytics 4 account creation + integration
- Newsletter service setup (Mailchimp account + API keys)
- User registration system configuration
- Cookie consent banner implementation

**Phase 3: Content Entry**
- Band pages creation (21 pages)
- Schedule implementation
- Travel information
- Legal pages (Impressum, Privacy Policy - required in Germany)
- Newsletter signup forms on key pages
- User registration form customization
- Email templates (welcome, ticket confirmation, pre-event series)
- GA4 event tracking verification

**Phase 4: Server Deployment**
- Domain setup
- Hosting configuration
- SSL certificate
- **SMTP Service setup** (for reliable email delivery)
- Newsletter plugin configuration (WordPress Newsletter)
- Analytics verification
- GDPR compliance final check (with data retention consent)
- User database backup strategy
- Test automated emails (registration, newsletter signup, ticket order confirmation)

## Important Notes

**German Legal Requirements:**
- **Impressum (Legal Notice):** Mandatory in Germany, must include organizer name, address, contact
- **Datenschutz (Privacy Policy):** Required for any data collection (forms, cookies)
- **Cookie Consent:** GDPR-compliant cookie banner if using analytics

**Ticket Processing (Simplified):**
- **No automated system needed** - only ~100 tickets total
- Simple contact form for ticket orders
- Form submission sends email to organizer (frank@vod-records.com)
- Manual processing: organizer verifies bank transfer → sends confirmation email
- No complex ticket management database required

**Non-Profit Status:**
- Festival operates as non-profit per requirements
- PayPal discouraged due to fees (but available as fallback)

## File Organization

```
/VOD_Fest/
├── CLAUDE.md (this file)
├── VOD_Fest_Details.md (requirements)
├── VOD_Fest_Plakat.png (design reference)
├── /planning/ (future)
│   ├── /research/ (festival website examples)
│   ├── /design/ (mockups, wireframes)
│   └── /content/ (band bios, images)
├── /wordpress/ (future - WordPress installation)
└── /custom-solution/ (future - if building custom)
```

## Key Decisions to Make

Before implementation, clarify with organizer:
1. **Domain name:** What URL should be used?
2. **Hosting:** Where should this be hosted? (VPS already available at 72.62.148.205)
3. **Social Media:** Provide all social media account URLs
4. **Previous Festival:** Access to 2025 photos/videos/content?
5. **From Email:** What domain/email for sending automated emails? (e.g., noreply@vodfest.com)
6. **Band Content:** Can organizer provide band bios/photos or should they be researched?

**Decisions Made:**
- ✅ Newsletter: WordPress Newsletter Plugin (free, simple)
- ✅ Ticket System: Simple form → email to organizer (manual processing for ~100 tickets)
- ✅ User Registration: As proposed (Ultimate Member plugin)
- ✅ Data Retention: Keep indefinitely for future festivals (with user consent)
- ✅ SMTP: Brevo free tier (300 emails/day)
- ✅ Automated Emails: Registration, newsletter signup, ticket order confirmation
- ✅ Analytics: Google Analytics 4 with GDPR cookie consent

## Related Projects

This repository is part of a multi-project workspace. See parent `CLAUDE.md` for other projects:
- **Blackfire_automation:** Python automation (stock sync)
- **Blackfire_service:** Next.js investment platform
- **Passive Income:** AI content generator
- **VOD_discogs:** Discogs integration (related to VOD Records)

**VPS Access:** Projects can be deployed to existing Hostinger VPS (72.62.148.205) if needed.
