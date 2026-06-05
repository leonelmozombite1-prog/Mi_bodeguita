document.addEventListener('DOMContentLoaded', () => {
    // Navbar scroll
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 40);
        });
    }

    // Menu hamburguesa
    const menuBtn  = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMenu  = document.getElementById('closeMenu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => mobileMenu.classList.add('open'));
    }
    if (closeMenu && mobileMenu) {
        closeMenu.addEventListener('click', () => mobileMenu.classList.remove('open'));
    }
});
