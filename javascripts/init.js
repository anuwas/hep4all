/**
* Philips | Meet hue
*
* Author(s): 
*     - Jade Brookes
*
* Description: 
*     - Global interactions and animations
*
* Dependencies: 
*     - jquery-1.10.2.min.js
*	   - Flexslider.js
* 
*/

; (function ($, window, document, undefined) {
	'use strict';

	// Common objects
	var $window = $(window);
	var $document = $(document);
	var $html = $(document);
	var $body = $(document.body);

	// Namespace and config
	window.PhilipsMeethue = window.PhilipsMeethue || {};

	$document.ready(function () {

		PhilipsMeethue.initialise();

		/*** Display the viewport dimensions **/

		var getXY = function () {
			var viewportX = $(window).width();
			var viewportY = $(window).height();

			$('#devWidth').html('X:' + viewportX + ' Y:' + viewportY);

			$(window).resize(function () {
				var viewportX = $(window).width();
				var viewportY = $(window).height();
				$('#devWidth').html('X:' + viewportX + ' Y:' + viewportY);
			});
		};

		getXY();
	});

	// Several things need to be re-initialised on page resize.
	PhilipsMeethue.FAQ = function () {
		setTimeout(function () {
			$('.no-list li').each(function () {
				var listHeight = $(this).outerHeight();
				var iconHeight = $(this).find('.icon-showhide').outerHeight();
				var subHeightOffset = (listHeight - iconHeight) / 2;
				$(this).find('.icon-showhide').css('top', subHeightOffset);
			});
		}, 200);

		$('.question').click(function () {
			$(this).parent().toggleClass('show');
		});
	};

	$window.resize(function () {

		var img = $('.grid-container img'),
            imgHome = $('.homepage-carousel .slides li img'),
			videoThumb = $('.video-panel a img'),
            hoverAnimation = $('.cssanimations .ajax-anchor:not(.empty)'),
            nonhoverAnimation = $('.ajax-anchor.image-hero'),
            externalhoverAnimation = $('.cssanimations .external-ajax-anchor:not(.empty)'),
            externalnonhoverAnimation = $('.external-ajax-anchor.image-hero'),
            screenWidth = $window.width();

		if ((screenWidth >= 0) && (screenWidth <= 615)) {

			img.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})

			//add class to display button styling properly
			$body.addClass("small-screen");

			hoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			nonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			externalhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			externalnonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'default');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			PhilipsMeethue.homepageCarousel();
		}
		else if ((screenWidth >= 616) && (screenWidth <= 756)) {

			img.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('threebytwo'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})

			//add class to display button styling properly
			$body.addClass("small-screen");

			hoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			nonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			externalhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			externalnonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'default');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			PhilipsMeethue.homepageCarousel();
		}

		else if ((screenWidth >= 757) && (screenWidth <= 804)) {

			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('threebytwo'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})

			//add class to display button styling properly
			$body.addClass("small-screen");

			hoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			nonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			externalhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			externalnonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'default');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			$('.quote-align').each(function (index, item) {
				var parentHeight = $('.quote-content').height();
				var $this = $(item);
				$this.css('position', 'absolute').css('top', Math.round((parentHeight - $this.outerHeight()) / 2) + 'px');
			});

			PhilipsMeethue.homepageCarousel();

		}
		else if (screenWidth >= 805) {

			//Remove class to display button styling properly
			$body.removeClass("small-screen");

			hoverAnimation.hover(
			        function () {
			        	$(this).addClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			nonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			externalhoverAnimation.hover(
			        function () {
			        	$(this).addClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			externalnonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'default');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})

		}
		else if ((screenWidth >= 805) && (screenWidth <= 936)) {
			$('.quote-align').each(function (index, item) {
				var parentHeight = $('.quote-content').height();
				var $this = $(item);
				$this.css('position', 'absolute').css('top', Math.round((parentHeight - $this.outerHeight()) / 2) + 'px');
			});
		}
		else {
			//Remove class to display button styling properly
			$body.removeClass("small-screen");

			hoverAnimation.hover(
			        function () {
			        	$(this).addClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			nonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			externalhoverAnimation.hover(
			        function () {
			        	$(this).addClass('scrollup').css('cursor', 'pointer');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );
			externalnonhoverAnimation.hover(
			        function () {
			        	$(this).removeClass('scrollup').css('cursor', 'default');
			        }, function () {
			        	$(this).removeClass('scrollup');
			        }
	            );

			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})

			$('.quote-align').each(function (index, item) {
				var parentHeight = $('.quote-content').height();
				var $this = $(item);
				$this.css('position', 'absolute').css('top', Math.round((parentHeight - $this.outerHeight()) / 2) + '%');
			});

		}
	});

	PhilipsMeethue.initialise = function () {

		PhilipsMeethue.FAQ();

		var screenWidth = $window.width();

		if (Modernizr.touch) {
			this.androidCarouselInit();
			//this.homepageCarousel();
			this.responsiveMainNavNodes();
			this.responsiveCountrySelector();
			this.localeSelector();
			this.developerTabAnimation();
			this.mobilesupportContentNodes();
			this.mobilemoduleAnimations();
			this.ScreenDetectionForAssetSwap();
			this.MobileGridItemsClickable();
			this.quoteAlignment();
			this.emptyNodes();
			this.mobileHueCanNav();
			this.hueCanVideoSwap();
			this.youtubeEmbedpanel();
			this.buynowtabs();
			this.retailerTracking();

		} else {

			//check to see the screen width to trigger certain events
			if ((screenWidth >= 0) && (screenWidth <= 799)) {

				//add class to display button styling properly
				$body.addClass("small-screen");
				//this.homepageCarousel();
				this.firefoxBodyClass();
				this.responsiveCountrySelector();
				this.responsiveMainNavNodes();
				this.localeSelector();
				this.footerContentNodes();
				this.supportContentNodes();
				this.MobileThirdNavView();
				this.IEGridItemsClickable();
				this.developerTabAnimation();
				this.ScreenDetectionForAssetSwap();
				this.desktopGridItemsClickable();
				this.quoteAlignment();
				this.emptyNodes();
				this.mobileHueCanNav();
				this.hueCanVideoSwap();
				this.buynowtabs();
				this.countrySelector();
				this.youtubeEmbedpanel();
				this.retailerTracking();
			} else {

				//Remove class to display button styling properly
				$body.removeClass("small-screen");
				//this.homepageCarousel();
				this.firefoxBodyClass();
				this.responsiveCountrySelector();
				this.responsiveMainNavNodes();
				this.localeSelector();
				this.footerContentNodes();
				this.supportContentNodes();
				this.IEGridItemsClickable();
				this.developerTabAnimation();
				this.ScreenDetectionForAssetSwap();
				this.moduleAnimations();
				this.desktopGridItemsClickable();
				this.quoteAlignmentLarger();
				this.emptyNodes();
				this.mobileHueCanNav();
				this.hueCanVideoSwap();
				this.buynowtabs();
				this.countrySelector();
				this.youtubeEmbedpanel();
				this.retailerTracking();
			}
		};
	};

	PhilipsMeethue.androidCarouselInit = function () {
		var ua = navigator.userAgent.toLowerCase(),
			isAndroid = ua.indexOf("android") > -1;

		if ($body.hasClass('SiteHome')) {
			if (isAndroid) {
				window.onorientationchange = function () {
					window.location.reload();
				}
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}
	};

	PhilipsMeethue.firefoxBodyClass = function () {
		var firefox = /firefox/.test(navigator.userAgent.toLowerCase());

		if (!firefox) {
			return true;
		}
		else {
			$body.addClass("firefox");
		}
	};

	/*PhilipsMeethue.homepageCarousel = function () {
		$('.flexslider').flexslider({
			animation: "none",
			slideshow: false,
			animationLoop: false,
			startAt: 0,
			touch: false,
			useCSS: false
		});
	};*/

	PhilipsMeethue.responsiveMainNavNodes = function () {
		var triggerMenu = $('.responsive-menu-trigger'),
            triggerMenuLevel2 = $('.mobile-nav-arrow'),
            backTrigger = $('.back-menu'),
            mainBody = $('body>.main-body'),
            menuLevel1 = $('.menu-level1'),
            developerTab = $(".developer-tab"),
            menuLevel2 = $('.menu-level2');

		var i = 0;

		triggerMenu.on('click', function (e) {
            $('body').toggleClass('menu-open');

            if ($('body').hasClass('lang-open')) {
                $('.responsive-country-menu-trigger').removeClass('selected');
                $('body').removeClass('lang-open');
                $('.resp-menu-level1').hide();
            } else {
			}
		});

		triggerMenuLevel2.on('click', function (e) {
			e.preventDefault();
			var menuLevel2 = $(this).next(".menu-level2");
			menuLevel2.css({ "display": "block", "min-height": "500px" });
			menuLevel2.removeClass('closed').addClass('open');
			menuLevel2.animate({ right: '0px' }, 750);

		});

		backTrigger.on('click', function (e) {
			e.preventDefault();
			menuLevel2.animate({ right: '-320px' }, 500);
			menuLevel2.removeClass('open').addClass('closed');
			menuLevel2.delay(500).animate({ "display": "none" }, 0);
		});

		$window.resize(function () {
			if (i == 1) {
				menuLevel1.css({ "display": "none" });
				menuLevel1.removeClass('open').addClass('closed');
				mainBody.animate({ marginLeft: '0px' }, 500);
				developerTab.animate({ right: '0px' }, 500);
				i = 0;
			} else {
				return false;
			}
		});
	};

	PhilipsMeethue.localeSelector = function () {
		var localeSelector = $('.locale-selector'),
            triggerLocale = $('.trigger-locale');

		triggerLocale.click(function (e) {
			e.preventDefault();
			localeSelector.slideToggle("slow");
		});
	};

	PhilipsMeethue.mobileHueCanNav = function () {

		$('#sw-responsive-menu-trigger').on('click', function (e) {
			e.preventDefault();
			$('#sw-nav').toggleClass('active');
			$('#sw-nav-container').slideToggle();
		});

		$(window).resize(function () {
			$('#sw-nav-container').removeAttr('style');
		});

		var self = this,
			scrollPosition = 95,
			$navEl = $('#sw-responsive-menu-trigger'),
			$navContainerEl = $('#sw-nav-container'),
            $navItems = $('sw-nav');


		$(window).scroll(function () {

			if ($(window).scrollTop() >= scrollPosition && $(window).width() < 1100) {
				$navEl.addClass('fixed-nav');
				$navContainerEl.addClass('fixed-nav');
			}
			else if ($(window).scrollTop() < scrollPosition && $(window).width() < 1100) {
				$navEl.removeClass('fixed-nav');
				$navContainerEl.removeClass('fixed-nav');
			}
		});
	};

	PhilipsMeethue.hueCanVideoSwap = function () {
		//$(".video-panel").fitVids();

		var $launchVideoLink = $('#launch-video'),
            $videoEl = $launchVideoLink.next().find('iframe'),
            videoURL = $videoEl.attr('src');

		$launchVideoLink.on('click', function (e) {
			e.preventDefault();
			videoURL = videoURL + '&autoplay=1';
			$launchVideoLink.hide();
			$videoEl.attr('src', videoURL);
		});
	};

	PhilipsMeethue.mobilemoduleAnimations = function () {
		var hoverAnimation = $('.cssanimations .ajax-anchor:not(.empty)'),
            nonhoverAnimation = $('.ajax-anchor.image-hero'),
            externalhover = $('.external-ajax-anchor:not(.empty)'),
            externalnonhoverAnimation = $('.external-ajax-anchor .image-hero');

		hoverAnimation.hover(
			function () {
				$(this).removeClass('scrollup').css('cursor', 'pointer');
			}, function () {
				$(this).removeClass('scrollup');
			}
		);
		nonhoverAnimation.hover(
			function () {
				$(this).removeClass('scrollup').css('cursor', 'default');
			}, function () {
				$(this).removeClass('scrollup');
			}
		);
		externalhover.hover(
			function () {
				$(this).removeClass('scrollup').css('cursor', 'pointer');
			}, function () {
				$(this).removeClass('scrollup');
			}
		);
		externalnonhoverAnimation.hover(
			function () {
				$(this).removeClass('scrollup').css('cursor', 'default');
			}, function () {
				$(this).removeClass('scrollup');
			}
		);
	};

	PhilipsMeethue.moduleAnimations = function () {
		var hoverAnimation = $('.cssanimations .ajax-anchor:not(.empty)'),
            nonhoverAnimation = $('.ajax-anchor.image-hero'),
            externalhover = $('.external-ajax-anchor:not(.empty)'),
            externalnonhoverAnimation = $('.external-ajax-anchor .image-hero'),
            screenWidth = $window.width();

		if (($body.hasClass("small-screen")) && ($body.hasClass("no-cssanimations"))) {

			hoverAnimation.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'pointer');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			nonhoverAnimation.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'default');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			externalhover.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'pointer');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			externalnonhoverAnimation.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'default');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
		} else {
			hoverAnimation.hover(
			    function () {
			    	$(this).addClass('scrollup').css('cursor', 'pointer');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			nonhoverAnimation.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'default');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			externalhover.hover(
			    function () {
			    	$(this).addClass('scrollup').css('cursor', 'pointer');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
			externalnonhoverAnimation.hover(
			    function () {
			    	$(this).removeClass('scrollup').css('cursor', 'default');
			    }, function () {
			    	$(this).removeClass('scrollup');
			    }
	        );
		}
	};

	PhilipsMeethue.desktopGridItemsClickable = function () {
		var navLink = $('.cssanimations .grid .ajax-anchor:not(.image-hero)'),
             navLinkThirdNav = $('.cssanimations .third-nav .ajax-anchor:not(.image-hero)'),
             externalnavlink = $('.cssanimations .external-ajax-anchor'),
			 imageLink = $('.cssanimations .grid .image-hero');


		navLink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.location.href = navLinkAnchor;
		});

		externalnavlink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.open(navLinkAnchor, "_blank");
		});

		navLinkThirdNav.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.location.href = navLinkAnchor;
		});
	};

	PhilipsMeethue.MobileGridItemsClickable = function () {
		var navLink = $('.cssanimations .ajax-anchor:not(.image-hero)'),
			 navLinkThirdNav = $('.cssanimations .third-nav .ajax-anchor:not(.image-hero)'),
             externalNavLink = $('.cssanimations .external-ajax-anchor');

		navLink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.location.href = navLinkAnchor;
		});

		externalNavLink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.open(navLinkAnchor, "_blank");
		});

		navLinkThirdNav.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href');
			window.location.href = navLinkAnchor;
		});
	};

	PhilipsMeethue.IEGridItemsClickable = function () {
		var navLink = $('.grid .ajax-anchor:not(.image-hero)'),
			thirdnavLink = $('.third-nav .ajax-anchor:not(.image-hero)'),
			externalNavLink = $('.grid .external-ajax-anchor');

		if ($('html').hasClass('ie8')) {
			$('.rollover').css({ 'bottom': '15%', 'cursor': 'pointer' });
			$('.third-nav .dark-feature .rollover').css({ 'bottom': '-7%', 'cursor': 'pointer' });
			$('.third-nav .light-feature .rollover').css({ 'bottom': '-7%', 'cursor': 'pointer' });
			$('.grid-item').css({ 'cursor': 'pointer' });

			navLink.on('click', function () {
				var navLinkAnchor = $(this).find('a').attr('href');
				window.location.href = navLinkAnchor;
			});
			thirdnavLink.on('click', function () {
				var navLinkAnchor = $(this).find('a').attr('href');
				window.location.href = navLinkAnchor;
			});
			externalNavLink.on('click', function (e) {
				e.preventDefault();
				var navLinkAnchor = $(this).find('a').attr('href');
				window.open(navLinkAnchor);
			});
		}
		else if ($('html').hasClass('ie9')) {
			$('.grid-item').css({ 'cursor': 'pointer' });
			navLink.on('click', function () {
				var navLinkAnchor = $(this).find('a').attr('href');
				window.location.href = navLinkAnchor;
			});
			thirdnavLink.on('click', function () {
				var navLinkAnchor = $(this).find('a').attr('href');
				window.location.href = navLinkAnchor;
			});
			externalNavLink.on('click', function (e) {
				e.preventDefault();
				var navLinkAnchor = $(this).find('a').attr('href');
				window.open(navLinkAnchor);
			});
		}
		else {
			$('.grid-item').css({ 'cursor': 'pointer' });
		}
	};

	PhilipsMeethue.quoteAlignment = function () {

		var navLink = $('.grid .quote.external-ajax-anchor');

		//Quote alignment for smaller screens
		$('.quote-align').each(function (index, item) {
			var parentHeight = $('.quote-content').height();
			var $this = $(item);
			$this.css('position', 'absolute').css('top', Math.round((parentHeight - $this.outerHeight()) / 2) + 'px');
		});

		//Quote animations on hover
		navLink.hover(
			function () {
				$(this).addClass('scrollup').css('cursor', 'pointer');
			}, function () {
				$(this).removeClass('scrollup');
			}
	    );
	};

	PhilipsMeethue.quoteAlignmentLarger = function () {
		//Quote alignment for larger screens
		$('.quote-align').each(function (index, item) {
			var parentHeight = $('.quote-content').height();
			var $this = $(item);
			$this.css('position', 'absolute').css('top', Math.round((parentHeight - $this.outerHeight()) / 2) + '%');
		});
	};

	PhilipsMeethue.MobileThirdNavView = function () {
		var screenWidth = $window.width(),
            thirdGridNav = $('.third-nav li');

		if ((screenWidth >= 0) && (screenWidth <= 815)) {
			thirdGridNav.hover(function () {
				$(this).css('cursor', 'pointer');
			});

			thirdGridNav.on('click', function () {
				var thirdGridNavAnchor = $(this).find('a').attr('href');
				window.location.href = thirdGridNavAnchor;
			});
		}
		else {
			return false;
		}
	};

	PhilipsMeethue.developerTabAnimation = function () {
		var developerTab = $('.developer-tab'),
            developerTabTrigger = $('.developer-tab-trigger');
		var i = 0;

		developerTabTrigger.on('click', function (e) {
			e.preventDefault();
			if (i == 0) {
				developerTab.animate({ right: '0%' }, 500);
				i = 1;
			} else {
				developerTab.animate({ right: '-22%' }, 500);
				i = 0;
			}
		});
	};

	PhilipsMeethue.ScreenDetectionForAssetSwap = function () {
		var img = $('.grid-container img'),
			videoThumb = $('.video-panel a img'),
            imgHome = $('.homepage-carousel .slides li img'),
            screenWidth = $window.width();

		if ((screenWidth >= 0) && (screenWidth <= 615)) {
			img.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
		}

		else if ((screenWidth >= 616) && (screenWidth <= 756)) {
			//Stop animations on a smaller screen
			$body.addClass("small-screen");

			img.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('threebytwo'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('onebyone'));
			})
		}
		else if ((screenWidth >= 757) && (screenWidth <= 804)) {
			//Stop animations on a smaller screen
			$body.addClass("small-screen");

			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('threebytwo'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
		}
		else if (screenWidth >= 805) {
			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
		}
		else {
			img.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			imgHome.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
			videoThumb.each(function (i) {
				$(this).attr("src", $(this).data('original'));
			})
		}
	};

	PhilipsMeethue.footerContentNodes = function() {

        var internalModule = $('.footer-nav .footer-link'),
            contentContainer = $('#content-container'),
            footerContent = $('.footer-content'),
            footerContentAjax = $('.footer-content-inner'),
            footerListItem = $('.footer-nav li a'),
            closeFooter = $('.close-footer'),
			filtermenu = $('.filter-selection'),
			filterLink = $('.filter-selection li a'),
			filterContent = $('#filter-content');


		if ($('.filter-selection li a').hasClass("selected")){
			return true;
		}
		else {
			$('.filter-selection li:first').find('a:first').addClass("selected");
		}

		internalModule.on('click', function(e){
			e.preventDefault();
			var navLinkAnchor = $(this).find('a').attr('href'); 
            window.location.href = navLinkAnchor;
		});

		filterLink.on('click', function(e){
			e.preventDefault();
			var navLinkAnchor = $(this).attr('href'); 
            window.location.href = navLinkAnchor;
		});
    };

	PhilipsMeethue.supportContentNodes = function () {

		var filtermenu = $('.filter-selection'),
			filterLink = $('.filter-selection li a'),
			filterContent = $('#filter-content');

		filterLink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).attr('href');
			window.location.href = navLinkAnchor;
		});
	};

	PhilipsMeethue.mobilesupportContentNodes = function () {
		var filtermenu = $('.filter-selection'),
            filterLink = $('.filter-selection li a'),
            filterContent = $('#filter-content');

		if ($('.filter-selection li a').hasClass("selected")) {
			return true;
		}
		else {
			$('.filter-selection li:first').find('a:first').addClass("selected");
		}

		filterLink.on('click', function (e) {
			e.preventDefault();
			var navLinkAnchor = $(this).attr('href');
			window.location.href = navLinkAnchor;
		});
	};

	PhilipsMeethue.emptyNodes = function () {

		$('.empty').hover(function () {
			$(this).attr("rel", $(this).attr("title"));
			$(this).removeAttr("title");
		}, function () {
			$(this).attr("title", $(this).attr("rel"));
			$(this).removeAttr("rel");
		});

		$('.empty').click(function (e) {
			e.preventDefault();
		});

		$('.image-hero a').hover(function () {
			$(this).attr("rel", $(this).attr("title"));
			$(this).removeAttr("title");
		}, function () {
			$(this).attr("title", $(this).attr("rel"));
			$(this).removeAttr("rel");
		});

		$('.image-hero a').click(function (e) {
			e.preventDefault();
		});
		$('.image-hero').click(function (e) {
			e.preventDefault();
		});
	};
	
	//Version 2 added functionality
	PhilipsMeethue.buynowtabs = function () {

		var buynowtabtrigger = $(".buy-now-trigger"),
			buynowlist = $(".buy-now-tab-list"),
			buynowtriggercont = $(".buy-now-trigger-cont"),
			productCTAlist = $(".buy-now-trigger-cont").parent(),
			buynowlistcontheight = productCTAlist.height(),
			buynowlistconttwidth = $(".buy-now-trigger-cont").width(),
			buynowlistcont = $(".buy-now-tab-list-content");


		//buy now dropdown positioning
		buynowlistcont.css({ "width": buynowlistconttwidth+20 + "px" });
		//buynowlistcont.css({ "top": buynowlistcontheight + "px"});

		buynowtriggercont.on('click', function(e){
			// console.log('buynowtriggercont clicks');
			e.preventDefault();
			$(this).toggleClass( "selected" );
			$(this).parent().find('.buy-now-tab-list-content').slideToggle(300);
		});

		buynowtabtrigger.on('click', function(e){
        	// console.log('buynowtabtrigger clicks');
			e.preventDefault();
			$(this).toggleClass( "selected" );
            //this parent finds the list and toggles it (because before it was toggling all of the buy nows on the page if there were multiple
			$(this).parent().find('.buy-now-tab-list').slideToggle(300);
			//$(this).parent().find('.buy-now-tab-list').slideToggle(300);
		});


		//$('.buy-now-trigger-container').
	};

	PhilipsMeethue.countrySelector = function () {

		var countrychangetrigger = $(".country-locale-trigger"),
			countrylist = $(".country-container");

		countrychangetrigger.on('click', function(e){
			e.preventDefault();
			$(this).toggleClass("selected");
			countrylist.slideToggle("slow");
		});

		$window.resize(function () {
			countrylist.css({ "display": "none" });
			countrychangetrigger.removeClass("selected");
		});
	};

	PhilipsMeethue.youtubeEmbedpanel = function () {
		//$(".video-panel").fitVids();

		var videothumbtrigger = $('.video-thumb'),
            videoEl = videothumbtrigger.next().find('iframe'),
            videoURL = videoEl.attr('src');

		videothumbtrigger.on('click', function (e) {
			e.preventDefault();
			videoURL = videoURL + '&autoplay=1';
			videothumbtrigger.hide();
			videoEl.attr('src', videoURL);
		});
	};

	PhilipsMeethue.responsiveCountrySelector = function () {
		var triggerCountryMenu = $('.responsive-country-menu-trigger'),
            triggerCountryMenuLevel2 = $('.resp-mobile-nav-arrow'),
            backTrigger = $('.resp-back-menu'),
            mainBody = $('body>.main-body'),
            menuCountryLevel1 = $('.resp-menu-level1'),
            menuCountryLevel2 = $('.resp-menu-level2'),
			screenHeight = $('.main-body').height();

		var i = 0;

		menuCountryLevel1.css({ "minHeight": screenHeight });
		menuCountryLevel2.css({ "minHeight": screenHeight });

		triggerCountryMenu.on('click', function (e) {
			e.preventDefault();
            $(this).toggleClass('selected');
            $('body').toggleClass('lang-open');

            if($('body').hasClass('menu-open')) {
                menuCountryLevel1.toggle();
            } else {
                menuCountryLevel1.toggle();
            }
		});

		triggerCountryMenuLevel2.on('click', function (e) {
			e.preventDefault();
			var menuCountryLevel2 = $(this).next(".resp-menu-level2");
			menuCountryLevel2.css({ "display": "block", "min-height": "500px" });
			menuCountryLevel2.removeClass('closed').addClass('open');
			menuCountryLevel2.animate({ right: '0px' }, 750);
		});

		backTrigger.on('click', function (e) {
			e.preventDefault();
			menuCountryLevel2.animate({ right: '-320px' }, 500);
			menuCountryLevel2.removeClass('open').addClass('closed');
			menuCountryLevel2.delay(500).animate({ "display": "none" }, 0);
		});

		$window.resize(function () {
			if (i == 1) {
				menuCountryLevel1.css({ "display": "none" });
				menuCountryLevel1.removeClass('open').addClass('closed');
				mainBody.animate({ marginLeft: '0px' }, 500);
				i = 0;
			} else {
				return false;
			}
		});
	};

	PhilipsMeethue.retailerTracking = function () {
		var mainNavBuyNowTrigger		= $(".buy-now-trigger"),
			mainNavRetailerTrigger		= $(".buy-now-item a"),
			mainNavStoreFinderTrigger	= $(".buy-now-tab-list .wheretobuy"),
			respNavBuyNowTrigger		= $(".mobile-buy-now-trigger"),
			respNavRetailerTrigger		= $(".mobile-buy-now-item"),
			respNavStoreFinderTrigger	= $(".mobile-buy-now-tab-list .wheretobuy a"),
			inPageBuyNowTrigger			= $(".buy-now-trigger-cont"),
			inPageRetailerTrigger		= $(".buy-now-tab-list-content li a"),
			storeFinderRetailerTrigger	= $(".buy-list a");

		// Store list expansion
		mainNavBuyNowTrigger.on('click', function(){
			// This if statement is the wrong way round and I have no idea why -- OFB, 2014-09-26
			if ($(this).hasClass("selected"))
			{
				// console.log("Tracking hit for Buy now Navigation / Expand");
				_gaq.push(['_trackEvent', 'Buy now Navigation', 'Expand', $body.data("locale")]);
			}
			else
			{
				// console.log("No tracking hit for Buy now Navigation / Expand");
			}
		});
		respNavBuyNowTrigger.on('click', function(){
			// This if statement is the wrong way round and I have no idea why -- OFB, 2014-09-26
			if ($(this).hasClass("selected"))
			{
				// console.log("No tracking hit for Buy now Responsive / Expand");
			}
			else
			{
				// console.log("Tracking hit for Buy now Responsive / Expand");
				_gaq.push(['_trackEvent', 'Buy now Responsive', 'Expand', $body.data("locale")]);
			}
		});
		inPageBuyNowTrigger.on('click', function(){
			// This if statement is the wrong way round and I have no idea why -- OFB, 2014-09-26
			if ($(this).hasClass("selected"))
			{
				// console.log("Tracking hit for Buy now " + window.location.pathname + " / Expand");
				_gaq.push(['_trackEvent', 'Buy now ' + window.location.pathname, 'Expand', $body.data("locale")]);
			}
			else
			{
				// console.log("No tracking hit for Buy now {path} / Expand");
			}
		});

		// Store finder links
		mainNavStoreFinderTrigger.on('click', function(){
			// console.log("Tracking hit for Buy now Navigation / Find a store");
			_gaq.push(['_trackEvent', 'Buy now Navigation', 'Find a store', $body.data("locale")]);
		});
		respNavStoreFinderTrigger.on('click', function(){
			// console.log("Tracking hit for Buy now Navigation / Find a store");
			_gaq.push(['_trackEvent', 'Buy now Responsive', 'Find a store', $body.data("locale")]);
		});

		// Retailer links
		mainNavRetailerTrigger.on('click', function(){
			var retailerName = $(this).attr("title");
			var a = Math.random() * 1000000;

			// console.log("Tracking GA hit for Buy now Navigation / Link out: " + retailerName + " (" + $("body").data("locale") + ")");
			_gaq.push(['_trackEvent', 'Buy now Navigation', 'Link out', retailerName + " (" + $body.data("locale") + ")"]);

			// console.log("Floodlight: " + 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?')
			var floodlight = new Image();
			floodlight.src = 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?';
			floodlight.onLoad = true;
		});
		respNavRetailerTrigger.on('click', function(){
			var retailerName = $(this).text().trim();
			var a = Math.random() * 1000000;

			// console.log("Tracking GA hit for Buy now Responsive / Link out: " + retailerName + " (" + $("body").data("locale") + ")");
			_gaq.push(['_trackEvent', 'Buy now Responsive', 'Link out', retailerName + " (" + $body.data("locale") + ")"]);

			// console.log("Floodlight: " + 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?')
			var floodlight = new Image();
			floodlight.src = 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?';
			floodlight.onLoad = true;
		});
		inPageRetailerTrigger.on('click', function(){
			var retailerName = $(this).attr("title");
			var a = Math.random() * 1000000;

			// console.log("Tracking GA hit for Buy now " + window.location.pathname + " / Link out: " + retailerName + " (" + $("body").data("locale") + ")");
			_gaq.push(['_trackEvent', 'Buy now ' + window.location.pathname, 'Link out', retailerName + " (" + $body.data("locale") + ")"]);

			// console.log("Floodlight: " + 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?')
			var floodlight = new Image();
			floodlight.src = 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?';
			floodlight.onLoad = true;
		});
		storeFinderRetailerTrigger.on('click', function(){
			var retailerName = $(this).text().trim();
			var a = Math.random() * 1000000;

			// console.log("Tracking hit for Store finder / Link out: " + retailerName + " (" + $("body").data("locale") + ")");
			_gaq.push(['_trackEvent', 'Store finder', 'Link out', retailerName + " (" + $body.data("locale") + ")"]);

			// console.log("Floodlight: " + 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?')
			var floodlight = new Image();
			floodlight.src = 'http://896871.fls.doubleclick.net/activityi;src=896871;type=hue2014;cat=huebuy;u3=' + retailerName.toLowerCase().replace(/\s/g, '') + ';ord=' + a + '?';
			floodlight.onLoad = true;
		})
	};

} (jQuery, this, this.document));
