function promo() {
    const promoContainer = document.querySelector('#promo'),
        promo = document.querySelector('#promo .sendform__wrap'),
        promoClose = document.querySelector('#promo-close');

    const now = new Date(),
        start = new Date(now.getFullYear(), 0, 0),
        diff = now - start,
        oneDay = 1000 * 60 * 60 * 24,
        day = Math.floor(diff / oneDay);

    if (day < 60) {
        showInThirtySeconds(promoContainer);
    }


    document.addEventListener('click', (event) => {
        if (!promoContainer.classList.contains('display-none')) {
            hideModal(promoContainer, promo, promoClose, event);
        }
    });

    function showInThirtySeconds(popup) {
        setTimeout(() => {
            showHideModal(popup);
            popup.style.display = 'flex';
        }, 30000);
    }

    function showHideModal(modal) {
        modal.classList.toggle('display-none');
        document.body.classList.toggle('overflow-hidden');
    }

    function hideModal(modalContainer, modalContent, closeButton, event) {
        let t = event.target;
        if (t.tagName == 'I') {
            t = t.parentNode;
        }
        if ((t == modalContainer || t == closeButton) && t != modalContent) {
            showHideModal(modalContainer);
        }
    }
}

module.exports = promo;