/**
 * VOD Fest 2026 - Cookie Consent
 *
 * @package VOD_Fest_2026
 * @since 1.0.1
 */

(function() {
    'use strict';

    var STORAGE_KEY = 'vod_cookie_consent';
    var CONSENT_VERSION = 1;

    /**
     * Get stored consent from localStorage
     */
    function getStoredConsent() {
        try {
            var data = localStorage.getItem(STORAGE_KEY);
            if (!data) return null;
            var consent = JSON.parse(data);
            if (consent.version !== CONSENT_VERSION) return null;
            return consent;
        } catch (e) {
            return null;
        }
    }

    /**
     * Save consent to localStorage
     */
    function saveConsent(categories) {
        var consent = {
            necessary: true,
            analytics: !!categories.analytics,
            marketing: !!categories.marketing,
            timestamp: new Date().toISOString(),
            version: CONSENT_VERSION
        };
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(consent));
        } catch (e) {
            // localStorage unavailable
        }
        document.dispatchEvent(new CustomEvent('cookie-consent-updated', { detail: consent }));
        return consent;
    }

    /**
     * Get consent status for a category
     */
    function getConsent(category) {
        var consent = getStoredConsent();
        if (!consent) return category === 'necessary';
        return !!consent[category];
    }

    /**
     * Show the cookie banner
     */
    function showBanner() {
        var banner = document.getElementById('cookie-consent-banner');
        if (banner) banner.removeAttribute('hidden');
    }

    /**
     * Hide the cookie banner
     */
    function hideBanner() {
        var banner = document.getElementById('cookie-consent-banner');
        if (banner) banner.setAttribute('hidden', '');
    }

    /**
     * Show the settings modal
     */
    function showSettings() {
        var overlay = document.getElementById('cookie-settings-overlay');
        if (!overlay) return;

        overlay.removeAttribute('hidden');
        overlay.setAttribute('aria-modal', 'true');

        // Sync toggles with current consent
        var consent = getStoredConsent();
        var analyticsToggle = document.getElementById('cookie-toggle-analytics');
        var marketingToggle = document.getElementById('cookie-toggle-marketing');
        if (analyticsToggle) analyticsToggle.checked = consent ? consent.analytics : false;
        if (marketingToggle) marketingToggle.checked = consent ? consent.marketing : false;

        // Focus the close button
        var closeBtn = overlay.querySelector('.cookie-settings__close');
        if (closeBtn) closeBtn.focus();

        // Trap focus
        trapFocusInSettings(overlay);
    }

    /**
     * Hide the settings modal
     */
    function hideSettings() {
        var overlay = document.getElementById('cookie-settings-overlay');
        if (overlay) {
            overlay.setAttribute('hidden', '');
            overlay.removeAttribute('aria-modal');
        }
    }

    /**
     * Accept all cookies
     */
    function acceptAll() {
        saveConsent({ analytics: true, marketing: true });
        hideBanner();
        hideSettings();
    }

    /**
     * Decline all optional cookies
     */
    function declineAll() {
        saveConsent({ analytics: false, marketing: false });
        hideBanner();
        hideSettings();
    }

    /**
     * Save preferences from the settings modal
     */
    function savePreferences() {
        var analyticsToggle = document.getElementById('cookie-toggle-analytics');
        var marketingToggle = document.getElementById('cookie-toggle-marketing');
        saveConsent({
            analytics: analyticsToggle ? analyticsToggle.checked : false,
            marketing: marketingToggle ? marketingToggle.checked : false
        });
        hideBanner();
        hideSettings();
    }

    /**
     * Trap focus within the settings modal
     */
    function trapFocusInSettings(overlay) {
        var focusableSelector = 'button:not([disabled]), input:not([disabled]), [tabindex]:not([tabindex="-1"]), a[href]';

        function handleKeydown(e) {
            if (overlay.hasAttribute('hidden')) {
                overlay.removeEventListener('keydown', handleKeydown);
                return;
            }

            if (e.key === 'Escape') {
                hideSettings();
                // Return focus to the settings button on the banner
                var settingsBtn = document.querySelector('[data-cookie-action="settings"]');
                if (settingsBtn) settingsBtn.focus();
                return;
            }

            if (e.key !== 'Tab') return;

            var focusable = overlay.querySelectorAll(focusableSelector);
            if (focusable.length === 0) return;

            var first = focusable[0];
            var last = focusable[focusable.length - 1];

            if (e.shiftKey) {
                if (document.activeElement === first) {
                    last.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === last) {
                    first.focus();
                    e.preventDefault();
                }
            }
        }

        overlay.addEventListener('keydown', handleKeydown);
    }

    /**
     * Bind event listeners
     */
    function bindEvents() {
        document.addEventListener('click', function(e) {
            var action = e.target.closest('[data-cookie-action]');
            if (!action) return;

            var type = action.getAttribute('data-cookie-action');
            switch (type) {
                case 'accept-all':
                    acceptAll();
                    break;
                case 'decline-all':
                    declineAll();
                    break;
                case 'settings':
                    showSettings();
                    break;
                case 'save-preferences':
                    savePreferences();
                    break;
                case 'close-settings':
                    hideSettings();
                    break;
            }
        });

        // Close settings on backdrop click
        var overlay = document.getElementById('cookie-settings-overlay');
        if (overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    hideSettings();
                }
            });
        }
    }

    /**
     * Initialize
     */
    function init() {
        bindEvents();

        // Show banner if no consent stored
        var consent = getStoredConsent();
        if (!consent) {
            showBanner();
        }
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Expose public API
    window.vodCookieConsent = {
        getConsent: getConsent,
        showSettings: showSettings
    };

})();
