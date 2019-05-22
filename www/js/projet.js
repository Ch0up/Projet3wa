'use strict';
// Petit message concernant le code, j'ai volontairement écrit
// du code en javascript natif et en jquery pour vous montrez
// que je savais faire les deux


// Fonction pour afficher le loader lors d'un chargement
window.addEventListener("load", () => {
    const loader = document.querySelector('.loader');
    loader.className += " hidden"; // classe "loader hidden"
});

// Fonction pour ouvrir le menu responsive
function navSlide() {
    const burger = document.querySelector('.nav-burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');
    let sideBarOpened = false;

    burger.addEventListener('click', () => {
        // Afficher ou cacher le nav
        nav.classList.toggle('nav-active');
        // Animation du burger menu
        burger.classList.toggle('toggle');

        // Liens qui apparaissent
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.4}s`;
            }
        });
        sideBarOpened = true;

        // Fermer la sidebar quand on clique sur un lien
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
            scrollTop: $('#about').offset().top - 40
        }, 1000)
    })
});

// Pour faire un smooth scroll quand on clique sur les link du nav ou du footer

$('.scroll').on('click', onClickGoArticle);
$('.linksBottom a').on('click', onClickGoArticle);

function onClickGoArticle() {
    $('body,html').animate({
        scrollTop: $(this.hash).offset().top - 40
    }, 1000);
}