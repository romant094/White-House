function portfolio() {
    console.log('portfolio');

    // fetch('js/objects.json')
    //     .then((res)=>{
    //         console.log(res);
    //     })
    //     .catch((res)=>{
    //         console.log('Error: ', res);
    //     });

    const param = 'name'; //выбрать name или address (это будет отображаться при наведении на картинку)
    const photosPath = 'image/objects/'; // путь к фотографиям

    let objectsInfo = [
        {
            "id": 1,
            "photoCount": 8,
            "name": "Квартира",
            "address": "Смоленск, Пригородная, 11"
        },
        {
            "id": 2,
            "photoCount": 8,
            "name": "Квартира",
            "address": "Санкт-Петербург, проспект Железнодорожников, 111к1"
        }
    ];

    let d = document,
        objects = d.querySelector('.portfolio__content'),
        devMessage = d.querySelector('.portfolio__development'),
        galleryButton = d.querySelector('#gallery-want'),
        showDevMessage = false;

    if (objectsInfo.length === 0) {
        showDevMessage = true;
    } else {
        objectsInfo.forEach((item, key) => {
            item.paths = [];

            for (let i = 0, length = item.photoCount; i < length; i++) {
                let path = `${photosPath}portfolio-${key + 1}-${i + 1}.jpeg`;
                item.paths.push(path);
            }

            let newObjectWrap = createElem('div', ['col', 'portfolio__content-single']),
                newObjectBg = createElem('div', ['portfolio__content-wrapper']),
                newObject = createElem('img'),
                descr = createElem('span');

            descr.textContent = item[param];

            newObject.setAttribute('src', item.paths[0]);

            newObjectWrap.appendChild(newObjectBg);
            newObjectBg.appendChild(newObject);
            newObjectBg.appendChild(descr);
            objects.appendChild(newObjectWrap);

        });
    }

    console.log('objects', objectsInfo);

    const portfolioTriggers = d.querySelectorAll('.portfolio__content-single'),
        gallery = d.querySelector('#gallery-slider'),
        galleryInside = d.querySelector('#gallery-inside'),
        slideWrap = d.querySelector('.portfolio__slider-slide'),
        previewsWrap = d.querySelector('.portfolio__slider-miniwrap'),
        arrows = d.querySelectorAll('.portfolio__slider-previews button');

    let slide = d.querySelector('.portfolio__slider-slide img'),
        previews = d.querySelectorAll('.portfolio__slider-miniwrap img');

    portfolioTriggers.forEach((item, key) => {
        item.addEventListener('click', function (event) {
            let target = event.target;
            if (target && target.tagName === 'SPAN') {
                target = this;
            }

            const slideImg = createElem('img');
            slideImg.setAttribute('src', objectsInfo[key].paths[0]);
            slideWrap.appendChild(slideImg);

            objectsInfo[key].paths.forEach((item, index) => {
                const previewImg = createElem('img');
                previewImg.setAttribute('src', item);
                if (index === 0) {
                    previewImg.classList.add('active-preview');
                }
                previewsWrap.appendChild(previewImg);
            });

            gallery.classList.remove('disabled');
        })
    });

    gallery.addEventListener('click', function (event) {
        let target = event.target;
        if (target && target === this && target !== galleryInside) {
            this.classList.add('disabled');
            slideWrap.innerHTML = '';
            previewsWrap.innerHTML = '';
        }
    });

    elemVisibilityToggle(devMessage, true);
    elemVisibilityToggle(galleryButton, false);

    function elemVisibilityToggle(elem, param) {
        showDevMessage === param ? elem.classList.remove('display-none') : elem.classList.add('display-none');
    }

    function createElem(elem, classArray) {
        let el = d.createElement(elem);
        if (classArray) {
            classArray.forEach((item) => {
                el.classList.add(item);
            });
        }
        return el;
    }

    previewsWrap.addEventListener('click', (e) => {
        initializeSliderElements();
        const preview = e.target;

        deactivatePreviews();
        preview.classList.add('active-preview');
        slide.setAttribute('src', preview.getAttribute('src'));
    });

    arrows[0].addEventListener('click', function (e) {
        let target = e.target;
        if (target && target.tagName === 'SPAN') {
            target = this;
        }
        let index = getActiveSlideIndex() - 1;
        if (index < 0) {
            index = previews.length - 1;
        }
        changeSlide(index);
    });

    arrows[1].addEventListener('click', function (e) {
        let target = e.target;
        if (target && target.tagName === 'SPAN') {
            target = this;
        }
        let index = getActiveSlideIndex() + 1;
        if (index > previews.length - 1) {
            index = 0;
        }
        changeSlide(index);
    });

    function deactivatePreviews() {
        previews.forEach((preview) => {
            preview.classList.remove('active-preview');
        })
    }

    function changeSlide(i) {
        initializeSliderElements();
        deactivatePreviews();
        previews[i].classList.add('active-preview');
        slide.setAttribute('src', previews[i].src);
    }

    function getActiveSlideIndex() {
        initializeSliderElements();
        let index;
        previews.forEach(function (preview, key) {
            if (preview.classList.contains('active-preview')) {
                index = key;
            }
        });
        return index;
    }

    function initializeSliderElements() {
        slide = d.querySelector('.portfolio__slider-slide img');
        previews = d.querySelectorAll('.portfolio__slider-miniwrap img');
    }
}

module.exports = portfolio;