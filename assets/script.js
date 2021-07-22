"use strict";

document.querySelectorAll('.splide').forEach(
	(obj) => new Splide( obj, {
		type   : 'loop',
	}).mount()
);

let myNav = document.querySelector('.navbar');
let myScrollInfo = document.getElementById('info');
window.addEventListener('scroll', scroll);
scroll();

function scroll () {
    if (window.scrollY >= 1 ) {
        myNav.classList.add("nav-scrolled");
		if( myScrollInfo ) myScrollInfo.classList.add('hidden');
    } 
    else {
        myNav.classList.remove("nav-scrolled");
		if( myScrollInfo ) myScrollInfo.classList.remove('hidden');
    }
};