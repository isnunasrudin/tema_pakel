document.querySelectorAll('.splide').forEach(
	(obj) => new Splide( obj, {
		type   : 'loop',
	}).mount()
);