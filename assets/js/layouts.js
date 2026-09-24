(function () {
	var WIDE = {
		designWidth: 1440,
		pathWidth: 1142.5,
		pathHeight: 294.369,
		viewWidth: 1145,
		viewHeight: 297,
		startX: 1,
		startY: 132.742,
		markStartX: 35 / 43,
		markStartY: 32 / 36,
	};
	var COMPACT = {
		designWidth: 375,
		pathWidth: 211,
		pathHeight: 343,
		viewWidth: 211,
		viewHeight: 343,
		startX: 1,
		startY: 1,
		markStartX: 31.5 / 35,
		markStartY: 25 / 29,
		mediaHeight: 220,
	};
	var TABLET = {
		designWidth: 834,
		pathWidth: 257.451,
		pathHeight: 420.269,
		viewWidth: 259.918,
		viewHeight: 422.735,
		startX: 1.23332,
		startY: 1.23332,
		markStartX: 31.5 / 35,
		markStartY: 25 / 29,
	};
	var COMPACT_QUERY = '(max-width: 1024px)';
	var TABLET_QUERY = '(min-width: 768px) and (max-width: 1024px)';
	var MOBILE_QUERY = '(max-width: 767.98px)';

	function isCompact() {
		return window.matchMedia(COMPACT_QUERY).matches;
	}

	function isTablet() {
		return window.matchMedia(TABLET_QUERY).matches;
	}

	function compactScale(hero, media) {
		var widthScale = hero.offsetWidth / COMPACT.designWidth;
		var mediaScale = media ? media.offsetHeight / COMPACT.mediaHeight : 1;
		return Math.min(widthScale, mediaScale);
	}

	function positionHero(hero) {
		var mark = hero.querySelector('.layout-hero-home-day-mark');
		var pathWrap = hero.querySelector('.layout-hero-home-path-wrap');
		var pins = hero.querySelector('.layout-hero-home-pins');
		var copy = hero.querySelector('.layout-hero-home-copy');
		var media = hero.querySelector('.layout-hero-home-media');
		if (!mark || !pathWrap || !pins || !copy) {
			return;
		}

		var compact = isCompact();
		var tablet = isTablet();
		var spec = tablet ? TABLET : compact ? COMPACT : WIDE;
		var scale = tablet
			? hero.offsetWidth / TABLET.designWidth
			: compact
				? compactScale(hero, media)
				: Math.min(hero.offsetWidth, spec.designWidth) / spec.designWidth;
		var heroBox = hero.getBoundingClientRect();
		var markBox = mark.getBoundingClientRect();
		var copyBox = copy.getBoundingClientRect();
		var width = spec.pathWidth * scale;
		var height = spec.pathHeight * scale;
		var anchorX = markBox.left - heroBox.left + markBox.width * spec.markStartX;
		var anchorY = markBox.top - heroBox.top + markBox.height * spec.markStartY;
		var left = anchorX - (spec.startX / spec.viewWidth) * width;
		var top = anchorY - (spec.startY / spec.viewHeight) * height;
		var copyClip = Math.max(0, copyBox.bottom - (heroBox.top + top));
		var mediaClip = height;

		if (compact && media) {
			mediaClip = Math.max(copyClip, media.getBoundingClientRect().bottom - (heroBox.top + top));
		}

		[pathWrap, pins].forEach(function (layer) {
			layer.style.left = left + 'px';
			layer.style.top = top + 'px';
			layer.style.width = width + 'px';
			layer.style.height = height + 'px';
			layer.style.maxWidth = 'none';
			layer.style.transform = 'none';
			layer.style.setProperty('--hero-path-clip-copy', copyClip + 'px');
			layer.style.setProperty('--hero-path-clip-media', mediaClip + 'px');
		});
	}

	function positionAll() {
		document.querySelectorAll('.layout-hero-home').forEach(positionHero);
	}

	function init() {
		positionAll();
		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(positionAll);
		}
		window.addEventListener('resize', positionAll);
		window.matchMedia(COMPACT_QUERY).addEventListener('change', positionAll);
		window.matchMedia(TABLET_QUERY).addEventListener('change', positionAll);
		window.matchMedia(MOBILE_QUERY).addEventListener('change', positionAll);
		if (typeof ResizeObserver !== 'undefined') {
			document.querySelectorAll('.layout-hero-home').forEach(function (hero) {
				new ResizeObserver(positionAll).observe(hero);
			});
		}
	}

	function activateStory(section, nextTab) {
		if (!section || !nextTab) {
			return;
		}

		var tabs = section.querySelectorAll('[role="tab"]');
		var panels = section.querySelectorAll('[role="tabpanel"]');
		var nextPanel = document.getElementById(nextTab.getAttribute('aria-controls'));

		tabs.forEach(function (tab) {
			var selected = tab === nextTab;
			tab.classList.toggle('is-active', selected);
			tab.setAttribute('aria-selected', selected ? 'true' : 'false');
			tab.tabIndex = selected ? 0 : -1;
		});

		panels.forEach(function (panel) {
			var selected = panel === nextPanel;
			panel.classList.toggle('is-active', selected);
			if (selected) {
				panel.removeAttribute('hidden');
			} else {
				panel.setAttribute('hidden', '');
			}
		});
	}

	function initPowerlanderPopup() {
		var dialog = document.getElementById('powerlander-popup');
		if (!dialog) {
			return;
		}

		var scrollLockY = 0;

		function lockPage() {
			scrollLockY = window.scrollY || window.pageYOffset || 0;
			document.documentElement.style.setProperty('--powerlander-scroll-lock', scrollLockY + 'px');
			document.documentElement.classList.add('has-powerlander-popup');
		}

		function unlockPage() {
			document.documentElement.classList.remove('has-powerlander-popup');
			document.documentElement.style.removeProperty('--powerlander-scroll-lock');
			window.scrollTo(0, scrollLockY);
		}

		function openPopup(event) {
			if (event) {
				event.preventDefault();
			}
			lockPage();
			if (typeof dialog.showModal === 'function') {
				dialog.showModal();
			} else {
				dialog.setAttribute('open', '');
			}
		}

		function closePopup() {
			if (typeof dialog.close === 'function') {
				dialog.close();
			} else {
				dialog.removeAttribute('open');
				unlockPage();
			}
		}

		document.querySelectorAll('.js-powerlander-open').forEach(function (trigger) {
			trigger.addEventListener('click', openPopup);
		});

		dialog.querySelectorAll('.js-powerlander-close').forEach(function (button) {
			button.addEventListener('click', closePopup);
		});

		dialog.addEventListener('click', function (event) {
			if (event.target === dialog || event.target.classList.contains('layout-powerlander-popup-inner')) {
				closePopup();
			}
		});

		dialog.addEventListener('close', unlockPage);
	}

	function initReferralLightbox() {
		var dialog = document.getElementById('referral-review-lightbox');
		if (!dialog) {
			return;
		}

		var image = dialog.querySelector('.layout-referral-lightbox-image');
		var title = dialog.querySelector('#referral-review-lightbox-title');

		function openLightbox(src, alt) {
			if (image) {
				image.src = src;
				image.alt = alt || '';
			}
			if (title) {
				title.textContent = alt || title.textContent;
			}
			if (typeof dialog.showModal === 'function') {
				dialog.showModal();
			} else {
				dialog.setAttribute('open', '');
			}
		}

		function closeLightbox() {
			if (typeof dialog.close === 'function') {
				dialog.close();
			} else {
				dialog.removeAttribute('open');
			}
		}

		document.querySelectorAll('.layout-referral-proof-review').forEach(function (trigger) {
			trigger.addEventListener('click', function () {
				openLightbox(trigger.getAttribute('data-review-src'), trigger.getAttribute('data-review-alt'));
			});
		});

		dialog.querySelectorAll('.js-referral-lightbox-close').forEach(function (button) {
			button.addEventListener('click', closeLightbox);
		});

		dialog.addEventListener('click', function (event) {
			if (event.target === dialog) {
				closeLightbox();
			}
		});
	}

	function initClientStories() {
		document.querySelectorAll('[data-client-stories]').forEach(function (section) {
			var tablist = section.querySelector('[role="tablist"]');
			var tabs = Array.prototype.slice.call(section.querySelectorAll('[role="tab"]'));
			if (!tablist || !tabs.length) {
				return;
			}

			tablist.addEventListener('click', function (event) {
				var tab = event.target.closest('[role="tab"]');
				if (!tab || !section.contains(tab)) {
					return;
				}
				activateStory(section, tab);
			});

			tablist.addEventListener('keydown', function (event) {
				var current = event.target.closest('[role="tab"]');
				if (!current) {
					return;
				}

				var index = tabs.indexOf(current);
				var nextIndex = index;
				if (event.key === 'ArrowDown' || event.key === 'ArrowRight') {
					nextIndex = (index + 1) % tabs.length;
				} else if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') {
					nextIndex = (index - 1 + tabs.length) % tabs.length;
				} else if (event.key === 'Home') {
					nextIndex = 0;
				} else if (event.key === 'End') {
					nextIndex = tabs.length - 1;
				} else {
					return;
				}

				event.preventDefault();
				tabs[nextIndex].focus();
				activateStory(section, tabs[nextIndex]);
			});
		});
	}

	function initClientStorySiblingsNav() {
		document.querySelectorAll('.layout-client-story-detail-siblings-strip').forEach(function (nav) {
			var track = nav.querySelector('.layout-client-story-detail-siblings-track');
			var prev = nav.querySelector('.layout-client-story-detail-siblings-prev');
			var next = nav.querySelector('.layout-client-story-detail-siblings-next');
			if (!track) {
				return;
			}

			function cardStep() {
				var card = track.querySelector('.layout-client-story-detail-sibling');
				if (!card) {
					return 280;
				}
				var styles = window.getComputedStyle(track);
				var gap = parseFloat(styles.columnGap || styles.gap) || 24;
				return card.getBoundingClientRect().width + gap;
			}

			function scrollByCard(direction) {
				track.scrollBy({ left: direction * cardStep(), behavior: 'smooth' });
			}

			if (prev) {
				prev.addEventListener('click', function () {
					scrollByCard(-1);
				});
			}
			if (next) {
				next.addEventListener('click', function () {
					scrollByCard(1);
				});
			}
		});
	}

	function initClientStoryDetail() {
		var root = document.querySelector('[data-client-story-detail]');
		if (!root) {
			return;
		}

		var panels = Array.prototype.slice.call(root.querySelectorAll('[data-story-panel]'));
		var links = Array.prototype.slice.call(root.querySelectorAll('[data-story-link]'));
		if (!panels.length) {
			return;
		}

		var defaultId = root.getAttribute('data-default-story') || panels[0].getAttribute('data-story-panel');
		var baseTitle = document.title;

		function activate(id, updateHash) {
			var ids = panels.map(function (panel) {
				return panel.getAttribute('data-story-panel');
			});
			if (ids.indexOf(id) === -1) {
				id = defaultId;
			}

			panels.forEach(function (panel) {
				var selected = panel.getAttribute('data-story-panel') === id;
				panel.classList.toggle('is-active', selected);
				if (selected) {
					panel.removeAttribute('hidden');
				} else {
					panel.setAttribute('hidden', '');
				}
			});

			links.forEach(function (link) {
				var selected = link.getAttribute('data-story-link') === id;
				link.classList.toggle('is-active', selected);
				link.setAttribute('aria-current', selected ? 'true' : 'false');
			});

			var activePanel = panels.filter(function (panel) {
				return panel.getAttribute('data-story-panel') === id;
			})[0];
			var nameEl = activePanel && activePanel.querySelector('[data-story-doctitle]');
			if (nameEl) {
				document.title = nameEl.textContent + ' — ' + baseTitle;
			}

			var currentTrack = activePanel && activePanel.querySelector('.layout-client-story-detail-siblings-track');
			var currentCard = currentTrack && currentTrack.querySelector('.layout-client-story-detail-sibling.is-active');
			if (currentTrack && currentCard) {
				currentTrack.scrollLeft = currentCard.offsetLeft;
			}

			if (updateHash && window.location.hash !== '#' + id) {
				window.history.pushState(null, '', '#' + id);
			}
		}

		links.forEach(function (link) {
			link.addEventListener('click', function (event) {
				event.preventDefault();
				activate(link.getAttribute('data-story-link'), true);
			});
		});

		window.addEventListener('hashchange', function () {
			activate(window.location.hash.replace('#', ''), false);
		});

		window.addEventListener('popstate', function () {
			activate(window.location.hash.replace('#', ''), false);
		});

		activate(window.location.hash.replace('#', '') || defaultId, false);
	}

	function positionStartHero(hero) {
		var art = hero.querySelector('.layout-hero-start-path-art');
		var media = hero.querySelector('.layout-hero-start-path-media');
		var button = hero.querySelector('.layout-hero-start-path-cta');
		if (!art || !media || !button) {
			return;
		}

		var heroBox = hero.getBoundingClientRect();
		var buttonBox = button.getBoundingClientRect();
		var circleLeft = buttonBox.left - heroBox.left + 111;
		var circleTop = buttonBox.top - heroBox.top - 17;
		var mark = hero.querySelector('.layout-hero-start-path-underline');
		var markBox = mark ? mark.getBoundingClientRect() : null;
		var startX = markBox ? markBox.right - heroBox.left : circleLeft - 918;
		var startY = markBox ? markBox.top + markBox.height / 2 - heroBox.top : circleTop + 71;
		var endX = circleLeft + 45;
		var endY = circleTop + 86;
		var startFracX = 1.50006 / 924;
		var startFracY = 1 - (137.515 / 373.342);
		var endFracX = 922.5 / 924;
		var endFracY = 1 - (126 / 373.342);
		var designSpanX = (endFracX - startFracX) * 921;
		var scale = (endX - startX) / designSpanX;
		if (!isFinite(scale) || scale < 0.35) {
			scale = hero.offsetWidth / 1440;
		}
		var pathWidth = 921 * scale;
		var pathHeight = 370.341 * scale;
		var pathLeft = startX - startFracX * pathWidth;
		var pathTop = startY - startFracY * pathHeight;
		var scaleX = scale;
		var scaleY = scale;
		var pathEndX = pathLeft + endFracX * pathWidth;
		var pathEndY = pathTop + endFracY * pathHeight;
		var copyClip = Math.max(0, media.getBoundingClientRect().top - heroBox.top - pathTop);

		art.querySelectorAll('.layout-hero-start-path-line').forEach(function (line) {
			line.style.left = pathLeft + 'px';
			line.style.top = pathTop + 'px';
			line.style.width = pathWidth + 'px';
			line.style.height = pathHeight + 'px';
		});
		art.style.setProperty('--hero-path-clip-copy', copyClip + 'px');

		var end = art.querySelector('.layout-hero-start-path-end');
		var desktop = !window.matchMedia(COMPACT_QUERY).matches;
		if (end) {
			end.style.left = (desktop ? pathEndX - 45 : circleLeft) + 'px';
			end.style.top = (desktop ? pathEndY - 86 : circleTop) + 'px';
			end.style.width = '90px';
			end.style.height = '89px';
		}

		var pinScale = Math.max(0.7, Math.min(Math.abs(scaleX), 1.15));
		var darkPins = !!hero.closest('[data-theme="dark"]');
		[
			['.is-pin-1', 243.5, 20.84, 153],
			['.is-pin-2', 470.5, 155.84, 127],
			['.is-pin-3', 662.5, 311.84, 83]
		].forEach(function (pin) {
			var node = art.querySelector(pin[0]);
			if (!node) {
				return;
			}
			var label = node.querySelector('span');
			var icon = node.querySelector('img');
			node.style.left = (pathLeft + (pin[1] / 921) * pathWidth) + 'px';
			node.style.top = (pathTop + (pin[2] / 370.341) * pathHeight) + 'px';
			node.style.transform = 'translate(-50%, -100%)';
			node.style.gap = (8 * pinScale) + 'px';
			if (label) {
				label.style.width = ((pin[3] + (darkPins ? 28 : 0)) * pinScale) + 'px';
				label.style.fontSize = (16 * pinScale) + 'px';
			}
			if (icon) {
				icon.style.width = (30 * pinScale) + 'px';
				icon.style.height = (48 * pinScale) + 'px';
			}
		});
	}

	function positionStartHeroes() {
		document.querySelectorAll('.layout-hero-start-path').forEach(positionStartHero);
	}

	function initServicesExplorer() {
		var compactQuery = window.matchMedia(COMPACT_QUERY);

		document.querySelectorAll('[data-services-explorer]').forEach(function (explorer) {
			var pins = explorer.querySelectorAll('.service-pin');
			var panels = explorer.querySelectorAll('.layout-services-explorer-panel');
			var selected = 'income';

			pins.forEach(function (pin) {
				if (pin.classList.contains('is-selected')) {
					selected = pin.getAttribute('data-service') || selected;
				}
			});

			function select(service) {
				selected = service || '';
				pins.forEach(function (pin) {
					var isSelected = selected !== '' && pin.getAttribute('data-service') === selected;
					pin.classList.toggle('is-selected', isSelected);
					pin.setAttribute('aria-pressed', isSelected ? 'true' : 'false');
				});
				panels.forEach(function (panel) {
					var open = selected !== '' && panel.classList.contains('is-' + selected);
					panel.hidden = !compactQuery.matches && !open;
				});
				explorer.classList.remove('is-income', 'is-investments', 'is-taxes', 'is-family');
				if (selected) {
					explorer.classList.add('is-' + selected);
				}
			}

			var dismissed = '';
			var scrollFrame = 0;

			function close() {
				dismissed = selected;
				select('');
			}

			pins.forEach(function (pin) {
				pin.addEventListener('click', function () {
					dismissed = '';
					select(pin.getAttribute('data-service'));
				});
			});

			explorer.addEventListener('click', function (event) {
				if (compactQuery.matches || !selected) {
					return;
				}
				if (event.target.closest('.layout-services-explorer-panel, .service-pin')) {
					return;
				}
				close();
			});

			var ignoreScroll = false;
			var holdSelection = false;

			function headerClearance() {
				var header = document.querySelector('.site-header, .site-header-mobile');
				var covered = 0;
				if (header) {
					covered = header.getBoundingClientRect().bottom;
				}
				return Math.max(16, covered + 16);
			}

			function scrollCardIntoView(panel) {
				if (!panel) {
					return;
				}
				var rect = panel.getBoundingClientRect();
				if (!rect.height) {
					return;
				}
				var topLimit = headerClearance();
				var bottomLimit = window.innerHeight - 16;
				var available = Math.max(0, bottomLimit - topLimit);
				var delta = 0;

				if (rect.height <= available) {
					if (rect.top < topLimit) {
						delta = rect.top - topLimit;
					} else if (rect.bottom > bottomLimit) {
						delta = rect.bottom - bottomLimit;
					}
				} else {
					delta = rect.top - topLimit;
				}

				if (Math.abs(delta) < 2) {
					return;
				}

				ignoreScroll = true;
				window.scrollBy({ top: delta, left: 0, behavior: 'auto' });
				window.requestAnimationFrame(function () {
					window.requestAnimationFrame(function () {
						ignoreScroll = false;
					});
				});
			}

			function holdForDeepLink() {
				if (holdSelection) {
					return;
				}
				holdSelection = true;
				var events = ['wheel', 'touchmove', 'keydown'];
				function release() {
					holdSelection = false;
					events.forEach(function (name) {
						window.removeEventListener(name, release);
					});
				}
				events.forEach(function (name) {
					window.addEventListener(name, release, { passive: true });
				});
			}

			var scrollQueued = false;

			function queueCardScroll(panel) {
				if (!panel || scrollQueued) {
					return;
				}
				scrollQueued = true;
				window.requestAnimationFrame(function () {
					scrollQueued = false;
					scrollCardIntoView(panel);
				});
			}

			function revealService(service) {
				if (!service) {
					return;
				}
				holdForDeepLink();
				select(service);
				queueCardScroll(explorer.querySelector('.layout-services-explorer-panel.is-' + service));
			}

			function syncFromScroll() {
				if (compactQuery.matches || ignoreScroll || holdSelection) {
					return;
				}

				var mid = window.innerHeight / 2;
				var limit = window.innerHeight * 0.25;
				var closest = null;
				var closestDist = Infinity;

				pins.forEach(function (pin) {
					var rect = pin.getBoundingClientRect();
					if (!rect.height) {
						return;
					}
					var dist = Math.abs(rect.top + rect.height / 2 - mid);
					if (dist < closestDist) {
						closestDist = dist;
						closest = pin;
					}
				});

				if (!closest || closestDist > limit) {
					dismissed = '';
					return;
				}

				var service = closest.getAttribute('data-service') || '';
				if (!service || service === dismissed || service === selected) {
					return;
				}

				select(service);
			}

			function requestScrollSync() {
				if (scrollFrame) {
					return;
				}
				scrollFrame = window.requestAnimationFrame(function () {
					scrollFrame = 0;
					syncFromScroll();
				});
			}

			window.addEventListener('scroll', requestScrollSync, { passive: true });
			window.addEventListener('resize', requestScrollSync);

			compactQuery.addEventListener('change', function () {
				select(selected);
				if (processServiceFromHash() === selected) {
					revealService(selected);
					return;
				}
				requestScrollSync();
			});

			var hashed = processServiceFromHash();
			if (hashed) {
				revealService(hashed);
				window.addEventListener('load', function () {
					queueCardScroll(explorer.querySelector('.layout-services-explorer-panel.is-' + hashed));
				});
			} else {
				select(selected);
			}
			requestScrollSync();

			window.addEventListener('hashchange', function () {
				var service = processServiceFromHash();
				if (service) {
					revealService(service);
				}
			});
		});
	}

	var PROCESS_SERVICES = ['income', 'investments', 'taxes', 'family'];

	function processServiceFromHash() {
		var service = window.location.hash.replace('#', '').split('&')[0];
		try {
			service = decodeURIComponent(service);
		} catch (error) {
			service = '';
		}
		return PROCESS_SERVICES.indexOf(service) === -1 ? '' : service;
	}

	function initJourneyPins() {
		document.querySelectorAll('[data-journey-pins]').forEach(function (group) {
			group.querySelectorAll('.journey-pin-toggle').forEach(function (toggle) {
				toggle.addEventListener('click', function () {
					var pin = toggle.closest('.journey-pin');
					var open = pin.classList.contains('is-open');
					group.querySelectorAll('.journey-pin').forEach(function (item) {
						item.classList.remove('is-open');
						var button = item.querySelector('.journey-pin-toggle');
						var panel = item.querySelector('.journey-pin-open');
						if (button) {
							button.setAttribute('aria-expanded', 'false');
						}
						if (panel) {
							panel.setAttribute('aria-hidden', 'true');
						}
					});
					if (!open) {
						pin.classList.add('is-open');
						toggle.setAttribute('aria-expanded', 'true');
						var panel = pin.querySelector('.journey-pin-open');
						if (panel) {
							panel.setAttribute('aria-hidden', 'false');
						}
					}
				});
			});
		});
	}

	function initBioNav() {
		document.querySelectorAll('.layout-bio-nav').forEach(function (nav) {
			var track = nav.querySelector('.layout-bio-nav-track');
			var prev = nav.querySelector('.layout-bio-nav-prev');
			var next = nav.querySelector('.layout-bio-nav-next');
			if (!track) {
				return;
			}

			function cardStep() {
				var card = track.querySelector('.layout-bio-nav-card');
				if (!card) {
					return 280;
				}
				var styles = window.getComputedStyle(track);
				var gap = parseFloat(styles.columnGap || styles.gap) || 24;
				return card.getBoundingClientRect().width + gap;
			}

			function scrollByCard(direction) {
				track.scrollBy({ left: direction * cardStep(), behavior: 'smooth' });
			}

			if (prev) {
				prev.addEventListener('click', function () {
					scrollByCard(-1);
				});
			}
			if (next) {
				next.addEventListener('click', function () {
					scrollByCard(1);
				});
			}

			var current = track.querySelector('.layout-bio-nav-card.is-current');
			if (current) {
				current.scrollIntoView({ inline: 'center', block: 'nearest', behavior: 'auto' });
			}
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			init();
			initClientStories();
			initPowerlanderPopup();
			initReferralLightbox();
			initBioNav();
			initClientStorySiblingsNav();
			initClientStoryDetail();
			positionStartHeroes();
			initServicesExplorer();
			initJourneyPins();
		});
	} else {
		init();
		initClientStories();
		initPowerlanderPopup();
		initReferralLightbox();
		initBioNav();
		initClientStorySiblingsNav();
		initClientStoryDetail();
		positionStartHeroes();
		initServicesExplorer();
		initJourneyPins();
	}
	window.addEventListener('resize', positionStartHeroes);
	window.matchMedia(COMPACT_QUERY).addEventListener('change', positionStartHeroes);
	if (document.fonts && document.fonts.ready) {
		document.fonts.ready.then(positionStartHeroes);
	}
	if (typeof ResizeObserver !== 'undefined') {
		document.querySelectorAll('.layout-hero-start-path').forEach(function (hero) {
			new ResizeObserver(positionStartHeroes).observe(hero);
		});
	}
})();
