function spoiler() {
    let spoilerBlock = document.querySelector('.about__content-spoiler'),
        spoilerTrigger = document.querySelector('.about__content-spoiler a');

    spoilerTrigger.addEventListener('click', (event) => {
        event.preventDefault();
        spoilerBlock.classList.toggle('height-auto');
    });
}

module.exports = spoiler;