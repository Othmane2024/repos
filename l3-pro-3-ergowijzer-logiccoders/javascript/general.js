function toggleMenu(display, overflow, transitionHamburger, transitionCross) {
    resMenu.style.display = display;
    document.body.style.overflow = overflow;
    hamburgerIcon.classList[transitionHamburger]('transition');
    crossIcon.classList[transitionCross]('active');
}

var hamburgerIcon = document.querySelector('.hamburger');
var resMenu = document.querySelector('.res-menu');
var crossIcon = document.querySelector('.cross');
let body = document.querySelector('body');

body.addEventListener('click', function (event) {
    if (!event.target.matches('.fa-solid.fa-arrow-up') && !event.target.matches('.dropdown') && !event.target.matches('.products')) {
        closeDropdown();
    }
});



document.querySelector('.scroll-btn').addEventListener('click', function () {
    document.querySelector('body').scrollIntoView({ behavior: 'smooth', block: 'end' });
});


function toggleDropdown() {
    var dropdown = document.getElementById('dropdown');
    var arrow = document.querySelector('.fa-solid.fa-arrow-up');
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'block';
    } else {
        dropdown.style.display = 'none';
    }
    arrow.classList.toggle('rotate');
}
function closeDropdown() {
    var dropdown = document.getElementById('dropdown');
    var arrow = document.querySelector('.fa-solid.fa-arrow-up');
    dropdown.style.display = 'none';
    arrow.classList.remove('rotate');
}
