document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.nav-dropdown').forEach(function (dropdown) {
		var trigger = dropdown.querySelector('.nav-dropdown-trigger');
		var toggle = dropdown.querySelector('.nav-dropdown-toggle, button.nav-dropdown-trigger');
		var panel = dropdown.querySelector('.nav-dropdown-panel');
		if (!trigger || !panel) return;
		var closeTimer;

		function setExpanded(open) {
			if (toggle) {
				toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			}
		}

		function openDropdown() {
			clearTimeout(closeTimer);
			dropdown.classList.add('is-hover');
			setExpanded(true);
			panel.removeAttribute('hidden');
		}

		function closeDropdown() {
			dropdown.classList.remove('is-hover');
			if (!dropdown.classList.contains('is-open')) {
				setExpanded(false);
				panel.setAttribute('hidden', '');
			}
		}

		function scheduleClose() {
			clearTimeout(closeTimer);
			closeTimer = setTimeout(function () {
				if (!dropdown.matches(':hover') && !dropdown.contains(document.activeElement)) {
					closeDropdown();
				}
			}, 200);
		}

		dropdown.addEventListener('mouseenter', openDropdown);
		dropdown.addEventListener('mouseleave', scheduleClose);
		dropdown.addEventListener('focusin', openDropdown);
		dropdown.addEventListener('focusout', scheduleClose);

		if (toggle) {
			toggle.addEventListener('click', function (event) {
				event.preventDefault();
				var open = dropdown.classList.toggle('is-open');
				setExpanded(open);
				if (open) {
					panel.removeAttribute('hidden');
				} else if (!dropdown.matches(':hover')) {
					dropdown.classList.remove('is-hover');
					panel.setAttribute('hidden', '');
				}
			});
		}
	});

	document.querySelectorAll('.mobile-accordion-trigger').forEach(function (trigger) {
		trigger.addEventListener('click', function () {
			var item = trigger.closest('.mobile-accordion');
			var panel = item ? item.querySelector('.mobile-accordion-panel') : null;
			if (!item || !panel) return;
			var open = item.classList.toggle('is-open');
			trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
			if (open) {
				panel.removeAttribute('hidden');
			} else {
				panel.setAttribute('hidden', '');
			}
		});
	});

	document.querySelectorAll('.site-header-mobile .menu-toggle').forEach(function (toggle) {
		toggle.addEventListener('click', function () {
			var header = toggle.closest('.site-header-mobile');
			var menu = header ? header.querySelector('.site-header-mobile-menu') : null;
			if (!header || !menu) return;
			var open = header.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
			toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
			if (open) {
				menu.removeAttribute('hidden');
			} else {
				menu.setAttribute('hidden', '');
			}
		});
	});

	(function initTheme() {
		var root = document.documentElement;
		var media = window.matchMedia('(prefers-color-scheme: dark)');

		function systemTheme() {
			return media.matches ? 'dark' : 'light';
		}

		function storedTheme() {
			try {
				var stored = window.localStorage.getItem('kennedyfg-theme');
				return stored === 'dark' || stored === 'light' ? stored : '';
			} catch (e) {
				return '';
			}
		}

		function syncToggles(mode) {
			document.querySelectorAll('.theme-toggle').forEach(function (toggle) {
				var isDark = mode === 'dark';
				toggle.classList.toggle('is-dark', isDark);
				toggle.classList.toggle('is-light', !isDark);
				toggle.setAttribute('aria-pressed', isDark ? 'true' : 'false');
				toggle.setAttribute('aria-label', isDark ? 'Switch to light theme' : 'Switch to dark theme');
			});
		}

		function applyTheme(mode, persist) {
			root.setAttribute('data-theme', mode);
			if (persist) {
				try {
					window.localStorage.setItem('kennedyfg-theme', mode);
				} catch (e) {}
			}
			syncToggles(mode);
		}

		applyTheme(storedTheme() || systemTheme(), false);

		if (typeof media.addEventListener === 'function') {
			media.addEventListener('change', function () {
				if (!storedTheme()) {
					applyTheme(systemTheme(), false);
				}
			});
		}

		document.querySelectorAll('.theme-toggle').forEach(function (toggle) {
			toggle.addEventListener('click', function () {
				applyTheme(root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark', true);
			});
		});
	})();

	document.querySelectorAll('[data-video-embed]').forEach(function (trigger) {
		trigger.addEventListener('click', function (event) {
			var src = trigger.getAttribute('data-video-embed');
			if (!src || trigger.classList.contains('is-loading')) {
				return;
			}
			event.preventDefault();
			try {
				var parsed = new URL(src, window.location.origin);
				if (!/(^|\.)loom\.com$/.test(parsed.hostname) && !/(^|\.)youtube\.com$/.test(parsed.hostname) && !/(^|\.)youtube-nocookie\.com$/.test(parsed.hostname)) {
					return;
				}
				if (!parsed.searchParams.has('autoplay')) {
					parsed.searchParams.set('autoplay', '1');
				}
				src = parsed.toString();
			} catch (e) {
				return;
			}

			var spinner = trigger.querySelector('.video-placeholder-spinner');
			var swapped = false;
			var player = document.createElement('div');
			var iframe;
			var fallback;

			function showPlayer() {
				if (swapped || !trigger.isConnected) {
					return;
				}
				swapped = true;
				window.clearTimeout(fallback);
				player.classList.remove('is-pending');
				trigger.replaceWith(player);
			}

			trigger.classList.add('is-loading');
			trigger.setAttribute('aria-busy', 'true');
			if (trigger.tagName === 'BUTTON') {
				trigger.disabled = true;
			}
			if (spinner) {
				spinner.hidden = false;
			}

			player.className = 'video-player wp-block-embed is-type-video wp-embed-aspect-16-9 wp-has-aspect-ratio is-pending';
			player.innerHTML = '<div class="wp-block-embed__wrapper"><iframe title="Video" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>';
			iframe = player.querySelector('iframe');
			iframe.addEventListener('load', function () {
				if (iframe.getAttribute('src') !== src) {
					return;
				}
				showPlayer();
			});
			trigger.appendChild(player);
			iframe.setAttribute('src', src);
			fallback = window.setTimeout(showPlayer, 12000);
		});
	});

	document.querySelectorAll('.calendar-trigger').forEach(function (trigger) {
		trigger.addEventListener('click', function (event) {
			event.preventDefault();
			var url = 'https://go.oncehub.com/infocall?brdr=0px000000&dt=&em=1&Si=1';
			var isMobile = window.matchMedia('(max-width: 767px)').matches;
			var width = isMobile ? (window.screen.availWidth || window.screen.width) : 884;
			var height = 760;
			var left = window.screenX + Math.max(0, (window.outerWidth - width) / 2);
			var top = window.screenY + Math.max(0, (window.outerHeight - height) / 2);
			var features = 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top + ',resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,status=no';
			var popup = window.open(url, 'kennedyfgCalendar', features);
			if (popup) {
				popup.focus();
			} else {
				window.location.href = url;
			}
		});
	});
});
