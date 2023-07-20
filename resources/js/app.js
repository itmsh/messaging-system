import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
	document.documentElement.classList.add('dark')
} else {
	document.documentElement.classList.remove('dark')
}

window.toggleDarkMode = function() {
	if (localStorage.theme === 'dark') {
		localStorage.theme = 'light'
	} else {
		localStorage.theme = 'dark'
	}
	location.reload();
}