console.log("Script Presentation Loaded");

document.addEventListener('DOMContentLoaded', function () {
    // -------------------------------------------------------------------------
    // 1. MAP INTERACTION LOGIC (Tabs & Basic Zoom/Pan)
    // -------------------------------------------------------------------------
    const mapTabs = document.querySelectorAll('.map-tab');
    const mapPoints = document.querySelectorAll('.map-point');
    const mapContainer = document.getElementById('map-container');
    const mapWrapper = document.querySelector('.map-wrapper');
    const zoomInBtn = document.getElementById('zoom-in');
    const zoomOutBtn = document.getElementById('zoom-out');

    // --- TAB FILTERING ---
    if (mapTabs.length > 0) {
        mapTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                mapTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const category = tab.getAttribute('data-category');

                mapPoints.forEach(point => {
                    const pointCat = point.getAttribute('data-category');
                    if (category === 'all' || category === pointCat) {
                        point.classList.remove('dimmed');
                        // Reset animation for visual pop
                        point.style.animation = 'none';
                        point.offsetHeight; /* trigger reflow */
                        point.style.animation = null;
                    } else {
                        point.classList.add('dimmed');
                    }
                });
            });
        });
    }

    // --- ZOOM & PAN ---
    if (mapContainer && mapWrapper) {
        let scale = 1;
        let pointX = 0;
        let pointY = 0;
        let panning = false;
        let start = { x: 0, y: 0 };

        function setTransform() {
            // Smooth transition handled by CSS 'transition' property on .interactive-map if added
            mapContainer.style.transform = `translate(${pointX}px, ${pointY}px) scale(${scale})`;
        }

        if (zoomInBtn && zoomOutBtn) {
            zoomInBtn.addEventListener('click', () => {
                scale += 0.2;
                if (scale > 3) scale = 3;
                setTransform();
            });

            zoomOutBtn.addEventListener('click', () => {
                scale -= 0.2;
                if (scale < 1) {
                    scale = 1; pointX = 0; pointY = 0;
                }
                setTransform();
            });
        }

        // Mouse Pan
        mapWrapper.addEventListener('mousedown', (e) => {
            // Ignore if clicking a specific interactive element
            if (e.target.classList.contains('map-point') || e.target.closest('.map-tooltip')) return;

            e.preventDefault();
            start = { x: e.clientX - pointX, y: e.clientY - pointY };
            panning = true;
            mapWrapper.style.cursor = 'grabbing';
        });

        document.addEventListener('mouseup', () => {
            panning = false;
            mapWrapper.style.cursor = 'grab';
        });

        document.addEventListener('mousemove', (e) => {
            if (!panning) return;
            e.preventDefault();
            pointX = e.clientX - start.x;
            pointY = e.clientY - start.y;
            setTransform();
        });

        // Wheel Zoom (Optional, subtle)
        mapWrapper.addEventListener('wheel', (e) => {
            if (e.ctrlKey) { // Only zoom if CTRL is pressed to avoid hijacking scroll
                e.preventDefault();
                const delta = -Math.sign(e.deltaY);
                scale += delta * 0.1;
                if (scale < 1) scale = 1;
                if (scale > 3) scale = 3;
                setTransform();
            }
        });
    }


    // -------------------------------------------------------------------------
    // 2. SCROLL REVEAL ANIMATIONS (Intersection Observer)
    // -------------------------------------------------------------------------

    // Elements to animate
    const revealElements = document.querySelectorAll(
        '.brand-card, .section-header, .split-text-wrapper, .hero-content, .split-image'
    );

    // Inject CSS for animations dynamically if not already in stylesheet
    const animStyles = document.createElement('style');
    animStyles.innerHTML = `
        /* Base hidden state */
        .reveal-element {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 1.0s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                        transform 1.0s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: opacity, transform;
        }
        
        /* Visible state */
        .reveal-element.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Staggered delay logic is handled via inline styles in PHP or manual CSS if specific */
    `;
    document.head.appendChild(animStyles);

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Stop observing once visible to save resources
                observer.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        threshold: 0.15, // Trigger when 15% of element is visible
        rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(el => {
        el.classList.add('reveal-element');
        revealObserver.observe(el);
    });


    // -------------------------------------------------------------------------
    // 3. NAVBAR SCROLL EFFECT (Glassmorphism)
    // -------------------------------------------------------------------------
    const header = document.querySelector('.site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY > 30;
            if (scrolled) {
                header.classList.add('scrolled-nav');
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(12px)';
                header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.08)';
                header.style.padding = '15px 0';
            } else {
                header.classList.remove('scrolled-nav');
                header.style.background = '#fff';
                header.style.backdropFilter = 'none';
                header.style.boxShadow = 'none';
                header.style.padding = '25px 0';
            }
        });
    }

    // -------------------------------------------------------------------------
    // 4. MISSION SLIDER LOGIC
    // -------------------------------------------------------------------------
    const missionSlides = document.querySelectorAll('.split-slide');
    if (missionSlides.length > 0) {
        let currentSlide = 0;

        // Function to show specific slide
        function showSlide(index) {
            // Hide all
            missionSlides.forEach(slide => {
                slide.style.display = 'none';
                slide.classList.remove('active');
            });

            // Handle Index Wrap
            if (index >= missionSlides.length) index = 0;
            if (index < 0) index = missionSlides.length - 1;

            currentSlide = index;

            // Show Target
            const target = missionSlides[currentSlide];
            target.style.display = 'grid'; // FIX: Must match CSS Grid layout

            // Small timeout for CSS transition to catch 'display:flex' change
            setTimeout(() => {
                target.classList.add('active');
            }, 50);

            // Optional: Re-trigger text animation
            const texts = target.querySelectorAll('.split-title, .split-desc');
            texts.forEach(t => {
                t.style.animation = 'none';
                t.offsetHeight;
                t.style.animation = null;
            });
        }

        // Attach Event Listeners
        missionSlides.forEach((slide) => {
            const prevBtn = slide.querySelector('.nav-arrow.prev');
            const nextBtn = slide.querySelector('.nav-arrow.next');

            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showSlide(currentSlide - 1);
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showSlide(currentSlide + 1);
                });
            }
        });
    }

    // -------------------------------------------------------------------------
    // 5. TALKS SLIDER LOGIC
    // -------------------------------------------------------------------------
    const talksSlides = document.querySelectorAll('.talks-slide');
    if (talksSlides.length > 0) {
        let currentTalkSlide = 0;

        function showTalkSlide(index) {
            talksSlides.forEach(slide => {
                slide.style.display = 'none';
                slide.classList.remove('active');
            });

            if (index >= talksSlides.length) index = 0;
            if (index < 0) index = talksSlides.length - 1;

            currentTalkSlide = index;

            const target = talksSlides[currentTalkSlide];
            target.style.display = 'grid'; // Grid layout (50/50 split)

            setTimeout(() => {
                target.classList.add('active');
            }, 50);
        }

        talksSlides.forEach((slide) => {
            const prevBtn = slide.querySelector('.talks-arrow.prev');
            const nextBtn = slide.querySelector('.talks-arrow.next');

            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showTalkSlide(currentTalkSlide - 1);
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showTalkSlide(currentTalkSlide + 1);
                });
            }
        });
    }




    // -------------------------------------------------------------------------
    // 6. NEWS SLIDER & FILTER LOGIC
    // -------------------------------------------------------------------------
    const newsTrack = document.getElementById('newsTrack');
    const newsLeft = document.getElementById('news-scroll-left');
    const newsRight = document.getElementById('news-scroll-right');

    if (newsTrack && newsLeft && newsRight) {
        newsLeft.addEventListener('click', () => {
            newsTrack.scrollBy({ left: -400, behavior: 'smooth' });
        });

        newsRight.addEventListener('click', () => {
            newsTrack.scrollBy({ left: 400, behavior: 'smooth' });
        });
    }

    // Filter Logic
    const filterBtns = document.querySelectorAll('.filter-btn');
    const newsCards = document.querySelectorAll('.news-card-new');

    if (filterBtns.length > 0 && newsCards.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Reset all buttons style
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.style.backgroundColor = '#fff';
                    b.style.color = '#333';
                    b.style.borderColor = '#ddd';
                });

                // Activate clicked button style
                btn.classList.add('active');
                // Use computed style or just set specific color if var not resolving, but var should work
                btn.style.backgroundColor = 'var(--color-primary)';
                btn.style.color = '#fff';
                btn.style.borderColor = 'var(--color-primary)';

                const category = btn.getAttribute('data-category');

                // Filter cards
                newsCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (category === 'All news' || cardCategory === category) {
                        card.style.display = 'block';
                        // Small fade in
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.opacity = '1';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    console.log('Interactive features initialized.');
});
