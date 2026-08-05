/**
 * Orchid Care Custom — front-end interactions.
 * Dependency-free. Header scroll state, mobile menu, FAQ accordion,
 * scroll-reveal (IntersectionObserver), scroll-to-top.
 */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // ── Header background on scroll ───────────────────────────────
    var header = document.getElementById('site-header');
    if (header) {
        var onScroll = function () {
            header.classList.toggle('is-scrolled', window.scrollY > 20);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // ── Mobile menu toggle ────────────────────────────────────────
    var toggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('primary-nav');
    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var open = document.body.classList.toggle('nav-open');
            toggle.setAttribute('aria-expanded', String(open));
        });
        // Close menu after tapping a link
        nav.addEventListener('click', function (e) {
            if (e.target.closest('a') && document.body.classList.contains('nav-open')) {
                document.body.classList.remove('nav-open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // ── FAQ accordion — one open at a time ────────────────────────
    var faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(function (item) {
        var trigger = item.querySelector('.faq-trigger');
        if (!trigger) return;
        trigger.addEventListener('click', function () {
            var wasOpen = item.classList.contains('is-open');
            faqItems.forEach(function (el) {
                el.classList.remove('is-open');
                var t = el.querySelector('.faq-trigger');
                if (t) t.setAttribute('aria-expanded', 'false');
            });
            if (!wasOpen) {
                item.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // ── Scroll reveal ─────────────────────────────────────────────
    var reveals = document.querySelectorAll('.reveal');
    var revealAll = function () {
        reveals.forEach(function (el) { el.classList.add('is-visible'); });
    };

    if (reduceMotion || !('IntersectionObserver' in window)) {
        revealAll();
    } else {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting || entry.intersectionRatio > 0) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.01, rootMargin: '150px 0px 150px 0px' });

        reveals.forEach(function (el) {
            var rect = el.getBoundingClientRect();
            // Immediate check for elements in initial viewport or top of page
            if (rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 1.25) {
                el.classList.add('is-visible');
            } else {
                io.observe(el);
            }
        });

        // Fail-safe: Reveal any remaining hidden elements after 1.2s
        setTimeout(revealAll, 1200);
    }

    // ── Scroll to top ─────────────────────────────────────────────
    var scrollUp = document.getElementById('orchid-scroll-up');
    if (scrollUp) {
        var onScrollUp = function () {
            scrollUp.classList.toggle('is-visible', window.scrollY > 600);
        };
        window.addEventListener('scroll', onScrollUp, { passive: true });
        onScrollUp();
        scrollUp.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    // ── Biang Mix Calculator Widget ────────────────────────────────
    var biangInput = document.getElementById('biang-kg-input');
    var biangOutput = document.getElementById('biang-liter-output');
    if (biangInput && biangOutput) {
        var calculateBiang = function() {
            var kg = parseFloat(biangInput.value) || 0;
            var liters = kg * 15;
            biangOutput.textContent = liters.toLocaleString('id-ID');
        };
        biangInput.addEventListener('input', calculateBiang);
        calculateBiang();
    }

    // ── Global Broken Image Auto Fallback Placeholder ─────────────
    window.addEventListener('error', function (e) {
        var target = e.target;
        if (target && target.tagName === 'IMG' && !target.dataset.hasFallback) {
            target.dataset.hasFallback = 'true';
            var fallback = (window.orchidData && window.orchidData.fallbackImg)
                ? window.orchidData.fallbackImg
                : '/wp-content/themes/orchidcare_custom/assets/img/logo.webp';

            target.src = fallback;
            target.classList.add('img-fallback-placeholder');
            if (!target.getAttribute('alt')) {
                target.setAttribute('alt', 'Orchid Care');
            }
        }
    }, true);
})();

