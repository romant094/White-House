function imgPopup() {
    let imgPopupWrap = document.createElement('div'),
        imgPopup = document.createElement('img'),
        imgLink = document.querySelectorAll('.portfolio__content-single img'),
        imgPopupWrapCss = {
            'position': 'fixed',
            'top': 0 + 'px',
            'left': 0 + 'px',
            'width': 100 + '%',
            'height': 100 + '%',
            'background-color': 'rgba(0,0,0,.75)',
            'z-index': 100,
            'display': 'flex',
            'align-items': 'center',
            'justify-content': 'center'
        };

    for (let prop in imgPopupWrapCss) {
        imgPopupWrap.style.cssText += `${prop}:${imgPopupWrapCss[prop]}`;
    }

    imgPopup.style.maxHeight = 90 + '%';
    imgPopupWrap.classList.add('animated', 'fadeIn');

    imgLink.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            let href = this.getAttribute('src');
            imgPopup.setAttribute('src', href);
            imgPopupWrap.appendChild(imgPopup);
            document.body.appendChild(imgPopupWrap);
            document.body.classList.toggle('overflow-hidden');
        });
    });

    document.addEventListener('click', (event) => {
        let t = event.target;
        if (t == imgPopupWrap && t != imgPopup) {
            document.body.removeChild(imgPopupWrap);
            document.body.classList.toggle('overflow-hidden');
        }
    });
}

module.exports = imgPopup;