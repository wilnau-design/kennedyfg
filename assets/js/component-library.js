document.addEventListener('DOMContentLoaded', function () {
	var root = document.documentElement;
	var stored = window.localStorage.getItem('kennedyfg-library-theme');
	var initial = stored === 'dark' ? 'dark' : 'light';

	function applyTheme(mode) {
		root.setAttribute('data-theme', mode);
		window.localStorage.setItem('kennedyfg-library-theme', mode);
		document.querySelectorAll('.library-bar .theme-toggle').forEach(function (toggle) {
			var isDark = mode === 'dark';
			toggle.classList.toggle('is-dark', isDark);
			toggle.classList.toggle('is-light', !isDark);
			toggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
			toggle.setAttribute(
				'aria-label',
				isDark ? 'Switch to light theme' : 'Switch to dark theme'
			);
		});
	}

	applyTheme(initial);

	document.querySelectorAll('.library-bar .theme-toggle').forEach(function (toggle) {
		toggle.addEventListener('click', function () {
			applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
		});
	});
});
