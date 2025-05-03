document.addEventListener('DOMContentLoaded', function() {
    // Función para animar la entrada de los elementos
    function animateElements() {
        const links = document.querySelectorAll('.link-button');
        const socials = document.querySelectorAll('.social-link');
        
        // Animar los enlaces con un retraso secuencial
        links.forEach((link, index) => {
            link.style.opacity = '0';
            link.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                link.style.transition = 'all 0.5s ease';
                link.style.opacity = '1';
                link.style.transform = 'translateX(0)';
            }, 300 + (index * 100));
        });
        
        // Animar los iconos sociales
        socials.forEach((social, index) => {
            social.style.opacity = '0';
            social.style.transform = 'translateY(15px)';
            
            setTimeout(() => {
                social.style.transition = 'all 0.5s ease';
                social.style.opacity = '1';
                social.style.transform = 'translateY(0)';
            }, 700 + (index * 100));
        });
    }
    
    // Esperar un poco antes de iniciar la animación
    setTimeout(animateElements, 300);
    
    // Efecto hover 3D en la tarjeta
    const card = document.querySelector('.profile-card');
    const content = document.querySelector('.profile-content');
    
    card.addEventListener('mousemove', (e) => {
        const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
        const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
        
        card.style.transform = `translateY(-10px) rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
    });
    
    card.addEventListener('mouseenter', () => {
        card.style.transition = 'none';
        // Efecto pop-out para el contenido
        content.style.transform = 'translateZ(20px)';
    });
    
    card.addEventListener('mouseleave', () => {
        card.style.transition = 'all 0.5s ease';
        card.style.transform = 'translateY(-10px) rotateY(0deg) rotateX(0deg)';
        // Restaurar el contenido
        content.style.transform = 'translateZ(0px)';
    });
});