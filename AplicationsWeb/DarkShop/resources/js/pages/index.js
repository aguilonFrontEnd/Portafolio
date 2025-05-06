document.addEventListener('DOMContentLoaded', function() {
    // 1. Observador de intersección para las secciones
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.section').forEach(section => {
        sectionObserver.observe(section);
    });

    // 2. Lógica para los banners (si los tienes)
    const initBanners = () => {
        const banners = document.querySelectorAll('.span_banner');
        if (banners.length === 0) return;
        
        let current = 0;
        const displayDuration = 5000;
        const transitionDuration = 200;
        let bannerTimeout;

        banners.forEach(banner => {
            banner.style.transition = `all ${transitionDuration}ms cubic-bezier(0.22, 1, 0.36, 1)`;
            banner.classList.remove('active', 'exiting');
        });

        function showNextBanner() {
            clearTimeout(bannerTimeout);
            const currentBanner = banners[current];
            
            currentBanner.classList.add('exiting');
            currentBanner.classList.remove('active');
            
            current = (current + 1) % banners.length;
            const nextBanner = banners[current];
            
            setTimeout(() => {
                currentBanner.classList.remove('exiting');
                currentBanner.style.transform = 'translateX(100%)';
                nextBanner.classList.add('active');
                
                bannerTimeout = setTimeout(showNextBanner, displayDuration);
            }, transitionDuration);
        }
        
        banners[current].classList.add('active');
        bannerTimeout = setTimeout(showNextBanner, displayDuration);
    };

    // 3. Lógica principal del carrusel de imágenes
    const initImageCarousel = () => {
        const images = document.querySelectorAll('.image_carrusel');
        if (images.length === 0) return;
        
        let current = 0;
        const total = images.length;
        let direction = 1;
        let carouselTimeout;
        const carrusel = document.querySelector('.figure_introduction');

        // Mostrar la primera imagen
        images[current].classList.add('active');

        function nextImage() {
            clearTimeout(carouselTimeout);
            
            images[current].classList.remove('active');
            
            if (current >= total - 1) {
                direction = -1;
            } else if (current <= 0) {
                direction = 1;
            }
            
            current += direction;
            images[current].classList.add('active');
            
            images.forEach((img, index) => {
                img.classList.remove('next', 'prev');
                if (index === current + direction) {
                    img.classList.add(direction === 1 ? 'next' : 'prev');
                }
            });
            
            carouselTimeout = setTimeout(nextImage, 4000);
        }
        
        carouselTimeout = setTimeout(nextImage, 4000);
        
        // Control para pausar al hacer hover
        if (carrusel) {
            carrusel.addEventListener('mouseenter', () => {
                clearTimeout(carouselTimeout);
            });
            
            carrusel.addEventListener('mouseleave', () => {
                carouselTimeout = setTimeout(nextImage, 4000);
            });
        }
    };

    // Inicializar todos los componentes
    initBanners();
    initImageCarousel();

    // 4. Asegurar que el header fixed no cubra el contenido
    const adjustHeaderSpacing = () => {
        const header = document.querySelector('.header_introduction');
        if (header && header.style.position === 'fixed') {
            const mainContent = document.querySelector('.section_introduction') || document.querySelector('main');
            if (mainContent) {
                mainContent.style.paddingTop = `${header.offsetHeight}px`;
            }
        }
    };

    adjustHeaderSpacing();
    window.addEventListener('resize', adjustHeaderSpacing);
});