'use strict';

window.addEventListener('DOMContentLoaded', () => {
    let geoCityCookie = require('./parts/geocitycookie.js'),
        imgPopup = require('./parts/imgpopup.js'),
        modals = require('./parts/modals.js'),
        ppSlider = require('./parts/peppermint.js'),
        promo = require('./parts/promo.js'),
        scrolling = require('./parts/scrolling.js'),
        spoiler = require('./parts/spoiler.js'),
        top = require('./parts/top-button.js');

    geoCityCookie();
    imgPopup();
    modals();
    ppSlider();
    promo();
    scrolling();
    spoiler();
    top();
});