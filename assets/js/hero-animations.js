document.addEventListener('DOMContentLoaded', () => {
    // Initial GSAP setup
    const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });

    // 1. Background Video Fade In (starts immediately)
    tl.from('.hero-video', {
        duration: 2.5,
        opacity: 0,
        ease: 'none'
    });

    // 2. Main Heading Reveal (Left Column)
    tl.from('.reveal-line', {
        duration: 1.4,
        yPercent: 110,
        stagger: 0.15,
        ease: 'power4.out',
        delay: -2.0 // Start during video fade
    });

    // 3. Right Column Elements (Pills, Subtext, Link)
    // We group these for a coordinated reveal on the right side
    tl.from(['.reveal-buttons', '.reveal-text'], {
        duration: 1.2,
        y: 30,
        opacity: 0,
        stagger: 0.2,
        ease: 'power3.out',
        delay: -0.8
    });

    // 4. Hero Scroll Effect (Scale Down & Fade as it scrolls up)
    if (typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        gsap.to('.hero-card', {
            scrollTrigger: {
                trigger: '#hero',
                start: 'top top',
                end: 'bottom top',
                scrub: 1
            },
            scale: 0.55,
            ease: 'none'
        });
    }
});
