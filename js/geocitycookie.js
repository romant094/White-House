document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    let city = Cookies.get('wh_city'),
        cityChoose = document.querySelector('.choose-city'),
        citySpan = document.querySelector('#city'),
        cityCheck = cityChoose.querySelectorAll('li'),
        cityList = [],
        addressSpan = document.querySelector('#address span'),
        address = {
            MOW: 'г. Химки, ул. Молодежная 61',
            SPE: 'пос. Кудрово, ул. Английская 5'
        };

    cityCheck.forEach((item) => {
        cityList.push(item.getAttribute('data-city'));
    });

    function setCity() {
        let index = cityList.indexOf(city);

        if (index != -1) {
            citySpan.textContent = cityCheck[index].textContent;
        } else {
            citySpan.textContent = cityCheck[0].textContent;
        }

        for (let prop in address) {
            if (city == prop) {
                addressSpan.textContent = address[prop];
            }
        }
    }

    function changeCity() {
        cityCheck.forEach((item) => {
            item.addEventListener('click', function () {
                city = this.getAttribute('data-city');
                setCookie('wh_city', city, 30);
                setCity();
                cityChoose.classList.add('display-none');
            });
        });
    }
    changeCity();

    function setCookie(cookieName, cookieValue, expires) {
        let today = new Date(),
            cookiesExpireDay = new Date();

        cookiesExpireDay.setDate(today.getDate() + expires);
        document.cookie = `${cookieName}=${cookieValue}; expires=${cookiesExpireDay}; path=/`;
    }

    let div = document.createElement('div'),
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

    citySpan.addEventListener('click', () => {
        cityChoose.classList.remove('display-none');
    });

    let cityChooseClose = cityChoose.querySelector('.choose-city__close');

    cityChooseClose.addEventListener('click', () => {
        cityChoose.classList.add('display-none');
    });

    if (city != undefined) {
        setCity();
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
                        setCookie('wh_city', data.region_code, 30);
                        city = data.region_code;
                        setCity();
                        cookiesBox.classList.remove('display-none');
                    });
                }
            )
            .catch(function (err) {
                console.log('Fetch Error :-S', err);
            });
    }
});