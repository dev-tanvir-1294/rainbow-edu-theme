// Footer Animations
document.addEventListener('DOMContentLoaded', function() {
    // Check if GSAP is loaded
    if (typeof gsap === 'undefined') {
        console.warn('GSAP not loaded, footer animations will not work');
        return;
    }

    // Footer entrance animation
    gsap.registerPlugin(ScrollTrigger);

    // Animate footer sections on scroll
    const footerSections = gsap.utils.toArray('#colophon .grid > div');

    footerSections.forEach((section, index) => {
        gsap.fromTo(section,
            {
                opacity: 0,
                y: 50,
                scale: 0.95
            },
            {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.8,
                ease: "power2.out",
                immediateRender: false,
                scrollTrigger: {
                    trigger: section,
                    start: "top 85%",
                    end: "bottom 15%",
                    toggleActions: "play none none reverse"
                },
                delay: index * 0.1
            }
        );
    });

    // Animate footer logo with a subtle bounce
    const footerLogo = document.querySelector('#colophon .flex.items-center');
    if (footerLogo) {
        gsap.fromTo(footerLogo,
            {
                opacity: 0,
                scale: 0.8,
                rotation: -10
            },
            {
                opacity: 1,
                scale: 1,
                rotation: 0,
                duration: 1,
                ease: "back.out(1.7)",
                immediateRender: false,
                scrollTrigger: {
                    trigger: footerLogo,
                    start: "top 90%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    }

    // Animate footer links with stagger
    const footerLinks = gsap.utils.toArray('#colophon a');
    footerLinks.forEach((link, index) => {
        gsap.fromTo(link,
            {
                opacity: 0,
                x: -20
            },
            {
                opacity: 1,
                x: 0,
                duration: 0.6,
                ease: "power2.out",
                immediateRender: false,
                scrollTrigger: {
                    trigger: link,
                    start: "top 85%",
                    toggleActions: "play none none reverse"
                },
                delay: index * 0.05
            }
        );

        // Add hover animation
        link.addEventListener('mouseenter', () => {
            gsap.to(link, {
                scale: 1.05,
                duration: 0.3,
                ease: "power2.out"
            });
        });

        link.addEventListener('mouseleave', () => {
            gsap.to(link, {
                scale: 1,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });

    // Animate copyright section
    const copyrightSection = document.querySelector('#colophon .border-t');
    if (copyrightSection) {
        gsap.fromTo(copyrightSection,
            {
                opacity: 0,
                y: 30
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                immediateRender: false,
                scrollTrigger: {
                    trigger: copyrightSection,
                    start: "top 95%",
                    toggleActions: "play none none reverse"
                }
            }
        );
    }

    // Add a subtle parallax effect to the footer background
    gsap.to('#colophon', {
        backgroundPosition: "50% 100px",
        ease: "none",
        scrollTrigger: {
            trigger: "#colophon",
            start: "top bottom",
            end: "bottom top",
            scrub: true
        }
    });

    // Add floating animation to the logo icon
    const logoIcon = document.querySelector('#colophon .bg-indigo-600');
    if (logoIcon) {
        gsap.to(logoIcon, {
            y: -5,
            duration: 2,
            ease: "power2.inOut",
            yoyo: true,
            repeat: -1,
            delay: 1
        });
    }
});