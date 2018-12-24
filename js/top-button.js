if (document.querySelector('#go-top') != null) {
    let toTop = document.querySelector('#go-top');

    window.onscroll = function () {
        if (window.pageYOffset > 160) {
            toTop.style.display = 'block';
        } else {
            toTop.style.display = "none";
        }
    }   
}

