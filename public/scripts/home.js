// JavaScript para controle do menu em dispositivos móveis
document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menu');
    const menuSite = document.querySelector('.topo-site .menu-site');

    menuIcon.addEventListener('click', function() {
        menuSite.classList.toggle('active');
    });
});

// Configuração do Swiper
var swiper = new Swiper('.home-slider', {
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    grabCursor: true,
    loop: true,
    centeredSlides: true,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
