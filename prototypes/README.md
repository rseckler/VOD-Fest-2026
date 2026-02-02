# VOD Fest 2026 - HTML Prototypes

**Version:** 1.0
**Date:** 2026-02-02

Interaktive HTML/CSS Prototypen für die VOD Fest 2026 Website.

## 📁 Ordnerstruktur

```
/prototypes/
├── README.md (diese Datei)
├── /assets/
│   ├── /css/
│   │   ├── variables.css    - CSS Custom Properties (alle Farben, Fonts, etc.)
│   │   ├── global.css        - Base Styles, Typography, Layout
│   │   ├── components.css    - UI Components (Buttons, Cards, Forms)
│   │   └── animations.css    - Keyframe Animationen
│   ├── /images/
│   │   └── poster.png        - VOD Fest Plakat
│   ├── /js/
│   └── /fonts/
├── /pages/
│   └── home.html             - Homepage Prototyp (FERTIG)
└── /screenshots/             - Speichere Screenshots hier
```

## 🚀 Prototypen öffnen

### Methode 1: Direkt im Browser (Einfachste Methode)

1. Navigiere zu `/prototypes/pages/`
2. Doppelklick auf `home.html`
3. Öffnet sich im Standard-Browser

### Methode 2: Live Server (Empfohlen für Development)

Wenn du VS Code verwendest:

1. Installiere Extension: "Live Server" (ritwickdey.LiveServer)
2. Rechtsklick auf `home.html` → "Open with Live Server"
3. Öffnet sich mit Auto-Reload bei Änderungen

### Methode 3: Python HTTP Server

```bash
cd prototypes
python3 -m http.server 8000
```

Dann öffne: http://localhost:8000/pages/home.html

## 📸 Screenshots erstellen

### Mac (Command + Shift + 4)

1. Öffne `home.html` im Browser
2. Vollbild (F11 oder Fn+F)
3. Drücke `Cmd + Shift + 4`
4. Wähle Bereich aus oder drücke `Leertaste` für vollständiges Fenster
5. Screenshot wird auf Desktop gespeichert
6. Verschiebe nach `/prototypes/screenshots/`

**Empfohlene Screenshots:**
- `home-hero.jpg` - Hero Section (Fullscreen)
- `home-about.jpg` - About Section mit Stats
- `home-lineup.jpg` - Featured Lineup Grid
- `home-schedule.jpg` - Schedule Preview
- `home-venue.jpg` - Venue Section
- `home-newsletter.jpg` - Newsletter Section
- `home-cta.jpg` - Final CTA
- `home-full.jpg` - Komplette Seite (scrolle und mache mehrere Screenshots, kombiniere mit Tool)

### Tool für Full-Page Screenshots

**Firefox:**
- Rechtsklick → "Screenshot erstellen" → "Ganze Seite speichern"

**Chrome Extension:**
- "GoFullPage" installieren
- Icon klicken → automatischer Full-Page Screenshot

**Safari:**
- Entwickler-Menü → "Webinspektor" → Responsive Design Mode → Capture Screenshot

## 🎨 Design-Spezifikationen

Alle Prototypen basieren auf:
- **CI:** `VOD_Fest_CI.md`
- **Mockups:** `VOD_Fest_Mockups.md`

### Farbschema

```css
Primary: #4A0000 (Dark Blood Red)
Accent: #D4AF37 (Vintage Gold)
Text: #E8D7B8 (Dusty Cream)
Effects: #FF4500 (Electric Orange)
```

### Typografie

- **Headlines:** Bebas Neue (Google Fonts)
- **Body:** Inter (Google Fonts)
- **Slab:** Roboto Slab (Google Fonts)

### Breakpoints

- Mobile: < 768px
- Tablet: 768px - 1023px
- Desktop: 1024px+

## ✅ Fertige Seiten

### ✓ Home (home.html)

**Sections:**
1. Hero - Fullscreen mit Plakat-Background
2. About - Stats Cards (21 Bands, 3 Days, 7 Hours)
3. Featured Lineup - 6 Band Cards
4. Schedule Preview - Tabbed (Friday/Saturday/Sunday)
5. Venue - Location Info mit Map Placeholder
6. Newsletter - Signup Form
7. Final CTA - Ticket Call-to-Action

**Features:**
- Responsive Design (Mobile/Tablet/Desktop)
- Scroll Animations (Intersection Observer)
- Tab Switching (JavaScript)
- Film Grain Overlay
- Animated Waveform in Footer
- Pulse Glow Effect auf CTAs

**Test-Checkliste:**
- [ ] Öffnet ohne Fehler
- [ ] Alle Schriftarten laden (Google Fonts)
- [ ] Poster-Bild zeigt sich im Hero
- [ ] Scroll-Animationen funktionieren
- [ ] Tab-Switching (Schedule Section) funktioniert
- [ ] Responsive auf Mobile (Browser DevTools)
- [ ] Header bleibt sticky beim Scrollen
- [ ] Footer Waveform animiert

## 🔧 Anpassungen vornehmen

### Farben ändern

Editiere `/assets/css/variables.css`:

```css
:root {
  --color-gold: #D4AF37; /* Ändere hier */
}
```

Alle Komponenten verwenden automatisch die neuen Farben.

### Schriftarten ändern

1. Google Fonts Link in HTML `<head>` anpassen
2. In `variables.css` Font-Family updaten:

```css
:root {
  --font-display: "Bebas Neue", Impact, sans-serif;
}
```

### Komponenten stylen

Editiere `/assets/css/components.css` für:
- Buttons (`.btn-primary`, `.btn-secondary`)
- Cards (`.band-card`, `.stats-card`)
- Forms (`.form-input`, `.form-select`)
- Schedule Items (`.schedule-item`)

### Animationen hinzufügen

Verwende vordefinierte Klassen aus `animations.css`:

```html
<div class="scroll-animate delay-300">
  Dieser Content faded ein beim Scrollen
</div>
```

**Verfügbare Animationen:**
- `.animate-fadeIn`
- `.animate-fadeInUp`
- `.animate-pulse` (für Glow-Effekt)
- `.animate-bounce`

## 🐛 Troubleshooting

### Poster-Bild zeigt sich nicht

**Problem:** `poster.png` nicht gefunden

**Lösung:**
```bash
cp /Users/robin/Documents/4_AI/VOD_Fest/VOD_Fest_Plakat.png prototypes/assets/images/poster.png
```

### Schriftarten laden nicht

**Problem:** Keine Internet-Verbindung oder Google Fonts geblockt

**Lösung:** Fonts lokal einbinden (Download von Google Fonts)

### Animationen funktionieren nicht

**Problem:** JavaScript deaktiviert oder Fehler in Console

**Lösung:**
1. Browser Console öffnen (F12)
2. Fehler überprüfen
3. JavaScript in Browser-Einstellungen aktivieren

### Layout bricht auf Mobile

**Problem:** Viewport Meta-Tag fehlt oder falsche Breakpoints

**Lösung:** In HTML `<head>` prüfen:
```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

## 📝 Weitere Seiten erstellen

Die Homepage ist das Template. Für weitere Seiten:

1. Kopiere `home.html` → z.B. `lineup.html`
2. Ändere `<title>` und Meta-Description
3. Entferne Hero Section
4. Füge neuen Content ein (basierend auf `VOD_Fest_Mockups.md`)
5. Passe Navigation an (active class auf richtigen Link)

**Beispiel für Lineup-Page:**

```html
<section class="section">
  <div class="container">
    <h1>THE LINEUP</h1>
    <div class="band-grid">
      <!-- 21 Band Cards hier -->
    </div>
  </div>
</section>
```

## 🎯 Nächste Schritte

### Sofort möglich:

1. **Screenshots erstellen** für alle Sections
2. **Weitere Seiten bauen** (Lineup, Schedule, etc.)
3. **Content anpassen** (Texte, Bilder ersetzen)
4. **Komponenten erweitern** (neue Cards, Forms)

### Für später:

1. **WordPress Theme** aus diesen Prototypen bauen
2. **Backend Integration** (Formulare, Newsletter)
3. **CMS Integration** (Band-Daten, Schedule)
4. **Deployment** auf echten Server

## 💡 Tipps

### Performance

- Bilder optimieren (WebP statt PNG/JPG wo möglich)
- CSS/JS minifizieren für Production
- Lazy Loading für Bilder below fold

### Accessibility

- Alle interaktiven Elemente haben Focus States
- Alt-Text für alle Bilder hinzufügen
- Semantic HTML verwenden (bereits implementiert)
- Keyboard Navigation testen (Tab-Taste)

### Browser-Testing

Teste in:
- Chrome/Edge (Hauptbrowser)
- Firefox (Gute Dev Tools)
- Safari (Mac/iOS spezifisch)
- Mobile Devices (echte Geräte bevorzugt)

## 📞 Support

Bei Fragen oder Problemen:
1. Überprüfe diese README
2. Schaue in `VOD_Fest_CI.md` für Design-Specs
3. Lese `VOD_Fest_Mockups.md` für Layout-Details
4. Console-Fehler überprüfen (Browser F12)

## 📚 Referenzen

- **CI Dokumentation:** `VOD_Fest_CI.md`
- **Mockups:** `VOD_Fest_Mockups.md`
- **Requirements:** `VOD_Fest_Details.md`
- **Projektübersicht:** `CLAUDE.md`

---

**Viel Erfolg! 🚀**

_Erstellt von Claude Code für VOD Fest 2026_
