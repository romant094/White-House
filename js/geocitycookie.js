document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    let city,
        div = document.createElement('div'),
        span = document.createElement('span'),
        cont = document.createElement('div');

    div.classList.add('cookies', 'animated', 'fadeIn', 'display-none');
    cont.classList.add('cookies__cont');
    span.classList.add('cookies-close');

    cont.textContent = 'Данный сайт использует cookies для более комфортного использования.';
    span.textContent = '[Закрыть]';
    div.appendChild(cont);
    cont.appendChild(span);
    document.body.appendChild(div);

    let cookiesClose = document.querySelector('.cookies__cont span'),
        cookiesBox = document.querySelector('.cookies');

    cookiesClose.addEventListener('click', () => {
        cookiesBox.classList.add('display-none');
    });

    let cityChoose = document.querySelector('.choose-city'),
        citySpan = document.querySelector('#city');

    citySpan.addEventListener('click', () => {
        cityChoose.classList.remove('display-none');
    });

    document.addEventListener('click', (e) => {
        if (!cityChoose.classList.contains('display-none')) {
            console.log(e.target);
            if (e.target != cityChoose) {
                cityChoose.classList.add('display-none');
            }
        }
    });

    if (Cookies.get('wh_city')) {
        city = Cookies.get('wh_city');
    } else {
        fetch('http://api.ipapi.com/check?access_key=6248620991f2f88b241e253fb9f5bcb6&format=1')
            .then(
                function (response) {
                    if (response.status !== 200) {
                        console.log('Looks like there was a problem. Status Code: ' +
                            response.status);
                        return;
                    }
                    response.json().then(function (data) {
                        Cookies.set('wh_city', data.city, { expires: 30 });
                        city = data.city;
                        cookiesBox.classList.remove('display-none');
                    });
                }
            )
            .catch(function (err) {
                console.log('Fetch Error :-S', err);
            });
    }
    console.log(city);


});