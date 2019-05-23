'use strict';

// Fonction de texte qui s'écrit tout seul

const textWelcome = ['Bienvenue', 'Welcome', 'Willkommen', 'Bienvenida', 'Benvenuto'];
let count = 0;
let index = 0;
let currentText = '';
let letter = '';

(function type() {
    if (count === textWelcome.length) {
        count = 0;
    }
    currentText = textWelcome[count];
    letter = currentText.slice(0, ++index);

    document.querySelector('.typing').textContent = letter;
    if (letter.length === currentText.length) {
        count++;
        index = 0;
    }
    setTimeout(type, 500);
}());