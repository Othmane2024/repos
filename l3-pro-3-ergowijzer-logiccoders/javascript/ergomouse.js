let slidesMouse = document.querySelectorAll('.slide-mouse');
let currentIndexMouse = 0;

document.getElementById('next-mouse').addEventListener('click', function() {
    slidesMouse[currentIndexMouse].classList.remove('active-mouse');
    currentIndexMouse = (currentIndexMouse + 1) % slidesMouse.length;
    slidesMouse[currentIndexMouse].classList.add('active-mouse');
});

document.getElementById('prev-mouse').addEventListener('click', function() {
    slidesMouse[currentIndexMouse].classList.remove('active-mouse');
    currentIndexMouse = (currentIndexMouse - 1 + slidesMouse.length) % slidesMouse.length;
    slidesMouse[currentIndexMouse].classList.add('active-mouse');
});