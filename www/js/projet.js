'use strict';

// Fonction pour ouvrir le menu responsive
const navSlide = () => {
    const burger = document.querySelector('.nav-burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        // Toggle nav
        nav.classList.toggle('nav-active');

        // Animate links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
            }
        });
        // Burger animation
        burger.classList.toggle('toggle');
    });
};

navSlide();

// Fonction pour retourner en haut de le page quand on clique sur la flêche
$('.scrollToTop').on('click', onClickToGoTop);
$('.logo').on('click', onClickToGoTop);

function onClickToGoTop() {

    $('html, body').animate({
        'scrollTop': 0
    }, 500);
}

// faire apparaitre le bouton quand on scroll pour retourner en haut de la page
$(window).scroll(() => {
    let posScroll = $(document).scrollTop();
    if (posScroll >= 550)
        $('.scrollToTop').fadeIn(600);
    else
        $('.scrollToTop').fadeOut(600);
});

// Fonction pour aller à la premier section
$(document).ready(() => {
    $('.arrowScrollBottom').click(() => {
        $('html, body').animate({
            scrollTop: $('#about').offset().top
        }, 1000)
    })
});



$(document).ready(() => {
    let scrollLink = $('.scroll');

    // Smooth scrolling
    scrollLink.click(function (e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
});

// active link when scroll
// window.addEventListener("scroll", event => {
//     let fromTop = window.scrollY;
//     let mainNavLinks = document.querySelectorAll("nav ul li a");
//
//     mainNavLinks.forEach(link => {
//         let section = document.querySelector(link.hash);
//
//         if (
//             section.offsetTop <= fromTop &&
//             section.offsetTop + section.offsetHeight > fromTop
//         ) {
//             link.classList.add("active-links");
//         } else {
//             link.classList.remove("active-links");
//         }
//     });
// });
