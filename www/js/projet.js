'use strict';

// pre loader
window.addEventListener("load", () => {
    const loader = document.querySelector('.loader');
    loader.className += " hidden"; // class "loader hidden"
});

// Fonction pour ouvrir le menu responsive
function navSlide() {
    const burger = document.querySelector('.nav-burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');
    let sideBarOpened = false;

    burger.addEventListener('click', () => {
        // Toggle nav
        nav.classList.toggle('nav-active');
        // Burger animation
        burger.classList.toggle('toggle');

        // Animate links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
            }
        });
        sideBarOpened = true;

        // Close nav side
        nav.addEventListener('click', () => {
            if (sideBarOpened) {
                nav.classList.toggle('nav-active');
                burger.classList.toggle('toggle');
                navLinks.forEach((link, index) => {
                    if (link.style.animation) {
                        link.style.animation = '';
                    } else {
                        link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
                    }
                });
                sideBarOpened = false;
            }
        });
    });
}

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

// Smooth scrolling quand on clique sur les link du nav ou du footer
$('.scroll').on('click', onClickGoArticle);
$('.linksBottom a').on('click', onClickGoArticle);

function onClickGoArticle() {
    $('body,html').animate({
        scrollTop: $(this.hash).offset().top - 40
    }, 1000);
}