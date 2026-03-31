document.addEventListener('DOMContentLoaded', () => {
    // Check if GSAP and ScrollTrigger are available
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Ambition Section Image Animations
        const ambitionImages = gsap.utils.toArray('.ambition-image');

        ambitionImages.forEach((image, index) => {
            gsap.set(image, {
                opacity: 0,
                y: 50,
                scale: 0.95
            });

            gsap.to(image, {
                scrollTrigger: {
                    trigger: image,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                },
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: 'power2.out',
                delay: index * 0.1 // Stagger the animations
            });
        });

        // Optional: Add parallax effect to the entire grid
        gsap.to('.ambition-images-grid', {
            scrollTrigger: {
                trigger: '.ambition-images-grid',
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1
            },
            y: -30,
            ease: 'none'
        });
    }
});