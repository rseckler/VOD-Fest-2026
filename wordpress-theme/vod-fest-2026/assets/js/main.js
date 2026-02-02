/**
 * VOD Fest 2026 - Main JavaScript
 *
 * @package VOD_Fest_2026
 * @since 1.0.0
 */

(function() {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.menu-toggle');
        const primaryNav = document.querySelector('.primary-navigation');
        const body = document.body;

        if (!menuToggle || !primaryNav) return;

        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute('aria-expanded', !isExpanded);
            menuToggle.classList.toggle('active');
            primaryNav.classList.toggle('active');
            body.classList.toggle('menu-open');

            // Trap focus within menu when open
            if (!isExpanded) {
                trapFocus(primaryNav);
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && primaryNav.classList.contains('active')) {
                menuToggle.click();
            }
        });

        // Close menu on outside click
        document.addEventListener('click', function(e) {
            if (!primaryNav.contains(e.target) && !menuToggle.contains(e.target)) {
                if (primaryNav.classList.contains('active')) {
                    menuToggle.click();
                }
            }
        });

        // Close menu on window resize if open
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth > 768 && primaryNav.classList.contains('active')) {
                    menuToggle.click();
                }
            }, 250);
        });
    }

    /**
     * Trap Focus Within Element (Accessibility)
     */
    function trapFocus(element) {
        const focusableElements = element.querySelectorAll(
            'a[href], button:not([disabled]), textarea, input, select'
        );
        const firstFocusable = focusableElements[0];
        const lastFocusable = focusableElements[focusableElements.length - 1];

        element.addEventListener('keydown', function(e) {
            if (e.key !== 'Tab') return;

            if (e.shiftKey) {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else {
                if (document.activeElement === lastFocusable) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        });
    }

    /**
     * Scroll Animations with Intersection Observer
     */
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Optionally unobserve after animation
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with scroll-animate class
        const animatedElements = document.querySelectorAll('.scroll-animate');
        animatedElements.forEach(el => observer.observe(el));
    }

    /**
     * Tab Switching (for schedule, etc.)
     */
    function initTabs() {
        const tabButtons = document.querySelectorAll('[data-tab-target]');

        if (tabButtons.length === 0) return;

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-tab-target');
                const targetContent = document.querySelector(targetId);

                if (!targetContent) return;

                // Remove active class from all buttons and content
                tabButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-selected', 'false');
                });

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });

                // Add active class to clicked button and target content
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
                targetContent.classList.add('active');

                // Smooth scroll to tabs section on mobile
                if (window.innerWidth < 768) {
                    targetContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            });

            // Keyboard navigation for tabs
            button.addEventListener('keydown', function(e) {
                const tabList = Array.from(tabButtons);
                const currentIndex = tabList.indexOf(this);

                if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                    e.preventDefault();
                    const nextIndex = (currentIndex + 1) % tabList.length;
                    tabList[nextIndex].focus();
                    tabList[nextIndex].click();
                } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                    e.preventDefault();
                    const prevIndex = (currentIndex - 1 + tabList.length) % tabList.length;
                    tabList[prevIndex].focus();
                    tabList[prevIndex].click();
                }
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');

        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                // Ignore empty hash or hash-only links
                if (targetId === '#' || targetId === '#!') return;

                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();

                    // Close mobile menu if open
                    const menuToggle = document.querySelector('.menu-toggle');
                    const primaryNav = document.querySelector('.primary-navigation');
                    if (menuToggle && primaryNav && primaryNav.classList.contains('active')) {
                        menuToggle.click();
                    }

                    // Smooth scroll to target
                    const headerOffset = 80; // Account for fixed header
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Update focus for accessibility
                    targetElement.setAttribute('tabindex', '-1');
                    targetElement.focus();
                }
            });
        });
    }

    /**
     * Newsletter Form AJAX Handler
     */
    function initNewsletterForm() {
        const forms = document.querySelectorAll('.newsletter-form');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const submitButton = this.querySelector('button[type="submit"]');
                const originalButtonText = submitButton.textContent;

                // Disable button and show loading state
                submitButton.disabled = true;
                submitButton.textContent = submitButton.getAttribute('data-loading-text') || 'Subscribing...';

                // Remove any existing messages
                const existingMessage = this.querySelector('.form-message');
                if (existingMessage) {
                    existingMessage.remove();
                }

                // Send AJAX request
                fetch(vodFest.ajaxUrl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Create message element
                    const message = document.createElement('div');
                    message.className = 'form-message ' + (data.success ? 'success' : 'error');
                    message.textContent = data.data.message || data.data;
                    message.style.cssText = `
                        margin-top: var(--space-md);
                        padding: var(--space-md);
                        border-radius: 4px;
                        text-align: center;
                        background: ${data.success ? 'rgba(0, 255, 0, 0.1)' : 'rgba(255, 0, 0, 0.1)'};
                        border: 2px solid ${data.success ? 'var(--color-gold)' : 'var(--color-crimson)'};
                        color: ${data.success ? 'var(--color-gold)' : 'var(--color-cream)'};
                    `;

                    // Append message to form
                    form.appendChild(message);

                    // Reset form on success
                    if (data.success) {
                        form.reset();

                        // Remove message after 5 seconds
                        setTimeout(() => {
                            message.style.opacity = '0';
                            message.style.transition = 'opacity 0.3s ease';
                            setTimeout(() => message.remove(), 300);
                        }, 5000);
                    }
                })
                .catch(error => {
                    console.error('Newsletter subscription error:', error);

                    const message = document.createElement('div');
                    message.className = 'form-message error';
                    message.textContent = 'An error occurred. Please try again.';
                    message.style.cssText = `
                        margin-top: var(--space-md);
                        padding: var(--space-md);
                        border-radius: 4px;
                        text-align: center;
                        background: rgba(255, 0, 0, 0.1);
                        border: 2px solid var(--color-crimson);
                        color: var(--color-cream);
                    `;
                    form.appendChild(message);
                })
                .finally(() => {
                    // Re-enable button
                    submitButton.disabled = false;
                    submitButton.textContent = originalButtonText;
                });
            });
        });
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        const header = document.querySelector('.site-header');
        if (!header) return;

        let lastScrollTop = 0;
        let scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > scrollThreshold) {
                header.classList.add('scrolled');

                // Hide header on scroll down, show on scroll up
                if (scrollTop > lastScrollTop && scrollTop > 200) {
                    header.classList.add('header-hidden');
                } else {
                    header.classList.remove('header-hidden');
                }
            } else {
                header.classList.remove('scrolled');
                header.classList.remove('header-hidden');
            }

            lastScrollTop = scrollTop;
        });
    }

    /**
     * Lineup Search Filter (Real-time)
     */
    function initLineupSearch() {
        const searchInput = document.querySelector('.lineup-search input[name="s"]');
        if (!searchInput) return;

        // Debounce function to limit API calls
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        // Real-time filter (client-side)
        const filterBands = debounce(function() {
            const searchTerm = searchInput.value.toLowerCase();
            const bandCards = document.querySelectorAll('.band-card');
            let visibleCount = 0;

            bandCards.forEach(card => {
                const bandName = card.querySelector('.band-name')?.textContent.toLowerCase() || '';
                const bandGenre = card.querySelector('.badge')?.textContent.toLowerCase() || '';
                const bandExcerpt = card.querySelector('p')?.textContent.toLowerCase() || '';

                const matches = bandName.includes(searchTerm) ||
                               bandGenre.includes(searchTerm) ||
                               bandExcerpt.includes(searchTerm);

                if (matches || searchTerm === '') {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            let noResultsMsg = document.querySelector('.no-search-results');
            if (visibleCount === 0 && searchTerm !== '') {
                if (!noResultsMsg) {
                    noResultsMsg = document.createElement('div');
                    noResultsMsg.className = 'no-search-results';
                    noResultsMsg.style.cssText = `
                        grid-column: 1 / -1;
                        text-align: center;
                        padding: var(--space-4xl);
                        color: var(--color-brass);
                    `;
                    noResultsMsg.innerHTML = `
                        <h3 style="font-size: var(--font-size-2xl); margin-bottom: var(--space-md);">No bands found</h3>
                        <p>Try adjusting your search term.</p>
                    `;
                    document.querySelector('.band-grid')?.appendChild(noResultsMsg);
                }
            } else if (noResultsMsg) {
                noResultsMsg.remove();
            }
        }, 300);

        searchInput.addEventListener('input', filterBands);
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Create button if it doesn't exist
        let backToTopBtn = document.querySelector('.back-to-top');

        if (!backToTopBtn) {
            backToTopBtn = document.createElement('button');
            backToTopBtn.className = 'back-to-top';
            backToTopBtn.innerHTML = '↑';
            backToTopBtn.setAttribute('aria-label', 'Back to top');
            backToTopBtn.style.cssText = `
                position: fixed;
                bottom: var(--space-2xl);
                right: var(--space-2xl);
                width: 50px;
                height: 50px;
                background: var(--color-gold);
                color: var(--color-black);
                border: none;
                border-radius: 50%;
                font-size: var(--font-size-xl);
                cursor: pointer;
                opacity: 0;
                visibility: hidden;
                transition: all var(--transition-base);
                z-index: 9999;
                box-shadow: var(--shadow-2xl);
            `;
            document.body.appendChild(backToTopBtn);
        }

        // Show/hide button on scroll
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 500) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
            }
        });

        // Scroll to top on click
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /**
     * Lazy Load Images (if not using native loading="lazy")
     */
    function initLazyLoad() {
        if ('loading' in HTMLImageElement.prototype) {
            // Browser supports native lazy loading
            return;
        }

        // Fallback for older browsers
        const images = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    /**
     * Initialize All Functions on DOM Ready
     */
    function init() {
        initMobileMenu();
        initScrollAnimations();
        initTabs();
        initSmoothScroll();
        initNewsletterForm();
        initStickyHeader();
        initLineupSearch();
        initBackToTop();
        initLazyLoad();

        // Add loaded class to body
        document.body.classList.add('js-loaded');
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
