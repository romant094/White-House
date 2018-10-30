let mobileMenu = document.querySelector('#mobile-menu'),
    mobileMenuOpen = document.querySelector('#mobile-menu-open'),
    mobileMenuClose = document.querySelector('#mobile-menu-close'),
    mobileMenuLink = document.getElementsByClassName('mobile-menu-link'),
    sendform = document.querySelector('#sendform'),
    sendformWrap = document.querySelector('.sendform__wrap'),
    sendformClose = document.querySelector('#sendform-close');

function mmClose() {
    mobileMenu.classList.remove('active', 'fadeInRight');
    mobileMenu.classList.add('fadeOutRight');
    setTimeout("mobileMenu.classList.add('disabled')", 1000);
}

function sfOpen() {
    sendformWrap.classList.remove('bounceOutUp');
    sendformWrap.classList.add('bounceInDown');
    sendform.classList.remove('disabled');
    sendform.classList.add('flex');
}

function sfCLose() {
    sendformWrap.classList.remove('bounceInDown');
    sendformWrap.classList.add('bounceOutUp');
    setTimeout("sendform.classList.add('disabled')", 700);
    setTimeout("sendform.classList.remove('flex')", 800);
}

window.addEventListener("DOMContentLoaded", function () {

    mobileMenuOpen.addEventListener('click', () => {
        mobileMenu.classList.remove('disabled', 'fadeOutRight');
        mobileMenu.classList.add('active', 'fadeInRight');
    });

    mobileMenuClose.addEventListener('click', () => {
        mmClose();
    });

    for (let i = 0; i < mobileMenuLink.length; i++) {
        mobileMenuLink[i].addEventListener('click', () => {
            mmClose();
        });
    }

    sendform.addEventListener('click', e => {
        if (e.target !== sendformWrap && e.target == sendform) {
            sfCLose();
        }
    });

    sendformClose.addEventListener('click', () => {
        sfCLose();
    });
});
