document.addEventListener('DOMContentLoaded', function() {
    jQuery(document).ready(function($) {
        var currentMode = null;

        function hajimiCheckBreakpoint() {
            var $nav = $('.hajimi-navigation.breakpoint-laptop');
            if (!$nav.length) return;

            var winWidth = $(window).width();
            var newMode = (winWidth <= 1199) ? 'mobile' : 'desktop';

            if (newMode === currentMode) return;

            currentMode = newMode;
            if (newMode === 'mobile') {
                if( $('.hajimi-dropdown-button.submenu-opened')[0] ) {
                    $('.hajimi-dropdown-button.submenu-opened').trigger('click');
                }
            }
            else {
                if( $('.hajimi-dropdown-button.submenu-opened')[0] ) {
                    $('.hajimi-dropdown-button.submenu-opened').trigger('click');
                }
            }
        }

        hajimiCheckBreakpoint();

        var resizeTimer;
        $(window).on('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(hajimiCheckBreakpoint, 120);
        });

        if( !$('.hajimi-menu-overlay')[0] ) {
            $('body').append(`<div class="hajimi-menu-overlay"></div>`);
        }
        if( $('.hajimi-navigation')[0] ) {
            $('.hajimi-navigation').each(function() {
                var $nav = $(this),
                    $breakpoint = this.className.match(/breakpoint-\S+/);
                $nav.on('click', '.hajimi-menu-button', function() {
                    var $button = $(this),
                        $menu = $button.siblings('.hajimi-nav-wrapper');
                    $button.prop('disabled', true);
                    setTimeout(function() {
                        $button.prop('disabled', false);
                    }, 250);
                    if( $nav.hasClass('nav-opened') ) {
                        $nav.removeClass('nav-opened');
                        $button.removeClass('is-active');
                        $menu.slideUp();
                    }
                    else {
                        $nav.addClass('nav-opened');
                        $button.addClass('is-active');
                        $menu.slideDown();
                    }
                });
            });
        }

        $(document).on('click', '.menu-main-page .hajimi-dropdown-button', function(e) {
            e.preventDefault();
            var $button = $(this),
                $siblings = $button.siblings('.hajimi-menu-popup'),
                $parent = $button.closest('.hajimi-navigation'),
                $breakpoint = $parent.attr('class').match(/breakpoint-\S+/);
                
            $button.prop('disabled', true);
            setTimeout(function() {
                $button.prop('disabled', false);
            }, 250);
            if( $button.hasClass('submenu-opened') ) {
                $button.removeClass('submenu-opened');
                if( $breakpoint[0] == 'breakpoint-laptop' && window.matchMedia('(min-width: 1200px)').matches ) {
                    $siblings.removeClass('show');
                    $('.hajimi-menu-overlay').fadeOut();
                }
                else {
                    $siblings.slideUp();
                }
            }
            else { 
                $button.addClass('submenu-opened');
                if( $breakpoint[0] == 'breakpoint-laptop' && window.matchMedia('(min-width: 1200px)').matches ) {
                    $siblings.addClass('show');
                    $('.hajimi-menu-overlay').fadeIn();
                }
                else {
                    console.log('Open');
                    $siblings.slideDown();
                }
            }
        });

        $(document).on('click', '.sub-menu > .menu-item > .hajimi-dropdown-button', function(e) {
            e.preventDefault();
            var $button = $(this),
                $siblings = $button.siblings('.sub-menu'),
                $parent = $button.closest('.sub-menu');
                
            $button.prop('disabled', true);
            setTimeout(function() {
                $button.prop('disabled', false);
            }, 250);
            if( $button.hasClass('submenu-opened') ) {
                $button.removeClass('submenu-opened');
                $siblings.slideUp();
            }
            else { 
                $button.addClass('submenu-opened');
                $siblings.slideDown();
            }
        });

        $(document).on('click', '.hajimi-menu-overlay:visible', function () {
            var $this = $(this);
            $this.fadeOut();
            $('.hajimi-navigation .hajimi-dropdown-button.submenu-opened').trigger('click');
        });

        $(document).on('click', '.hajimi-back2top', function (e) {
            e.preventDefault();
            $('html, body').stop().animate({
                scrollTop: 0
            }, 1500);
        });

        $('.hajimi-media-slider').each(function() {
            var $slider = $(this),
                $swiper = $slider.find('.swiper'),
                $loop = $slider.attr('data-loop'),
                $speed = parseInt($slider.data('speed')) || 500,
                $autoplay = parseInt($slider.data('autoplay')) === 1,
                $autoplayTimeout = parseInt($slider.data('autoplay-timeout')) || 5000;
            
            var spaceDesktop = parseInt($slider.data('space')) || 0;
            var pppDesktop   = parseInt($slider.data('ppp')) || 1;

            var spaceLaptop  = parseInt($slider.data('space-laptop')) || spaceDesktop;
            var spaceTablet  = parseInt($slider.data('space-tablet')) || spaceLaptop;
            var spaceMobile  = parseInt($slider.data('space-mobile')) || spaceTablet;

            var pppLaptop    = parseInt($slider.data('ppp-laptop')) || pppDesktop;
            var pppTablet    = parseInt($slider.data('ppp-tablet')) || pppLaptop;
            var pppMobile    = parseInt($slider.data('ppp-mobile')) || pppTablet;

            new Swiper($swiper[0], {
                slidesPerView: 3.5,
                spaceBetween: 24,
                loop: $loop,
                speed: $speed,
                autoplay: $autoplay ? {
                    delay: $autoplayTimeout,
                    disableOnInteraction: false
                } : false,
                navigation: {
                    prevEl: '.media-nav-prev',
                    nextEl: '.media-nav-next',
                },
                pagination: {
                    el: '.hajimi-media-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: pppMobile,
                        spaceBetween: spaceMobile,
                        slidesOffsetBefore: 24,
                        slidesOffsetAfter: 24,
                    },
                    768: {
                        slidesPerView: pppTablet,
                        spaceBetween: spaceTablet,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1200: {
                        slidesPerView: pppLaptop,
                        spaceBetween: spaceLaptop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1600: {
                        slidesPerView: pppDesktop,
                        spaceBetween: spaceDesktop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    }
                }
            });
        });

        $('.hajimi-magic-gallery.type-slider').each(function() {
            var $slider = $(this),
                $swiper = $slider.find('.swiper'),
                $loop = $slider.attr('data-loop'),
                $speed = parseInt($slider.data('speed')) || 500,
                $autoplay = parseInt($slider.data('autoplay')) === 1,
                $autoplayTimeout = parseInt($slider.data('autoplay-timeout'));
            var spaceDesktop = parseInt($slider.data('space')) || 0;
            var pppDesktop   = parseInt($slider.data('ppp')) || 1;

            var spaceLaptop  = parseInt($slider.data('space-laptop')) || spaceDesktop;
            var spaceTablet  = parseInt($slider.data('space-tablet')) || spaceLaptop;
            var spaceMobile  = parseInt($slider.data('space-mobile')) || spaceTablet;

            var pppLaptop    = parseInt($slider.data('ppp-laptop')) || pppDesktop;
            var pppTablet    = parseInt($slider.data('ppp-tablet')) || pppLaptop;
            var pppMobile    = parseInt($slider.data('ppp-mobile')) || pppTablet;

            new Swiper($swiper[0], {
                slidesPerView: 3.5,
                spaceBetween: 24,
                loop: $loop,
                speed: $speed,
                autoplay: $autoplay ? {
                    delay: $autoplayTimeout,
                    disableOnInteraction: false
                } : false,
                navigation: {
                    prevEl: '.gallery-nav-prev',
                    nextEl: '.gallery-nav-next',
                },
                pagination: {
                    el: '.hajimi-gallery-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: pppMobile,
                        spaceBetween: spaceMobile,
                        slidesOffsetBefore: 24,
                        slidesOffsetAfter: 24,
                    },
                    768: {
                        slidesPerView: pppTablet,
                        spaceBetween: spaceTablet,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1200: {
                        slidesPerView: pppLaptop,
                        spaceBetween: spaceLaptop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1600: {
                        slidesPerView: pppDesktop,
                        spaceBetween: spaceDesktop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    }
                }
            });
        });

        $('.hajimi-content-column-slider').each(function() {
            var $slider = $(this),
                $swiper = $slider.find('.swiper'),
                $loop = $slider.attr('data-loop'),
                $speed = parseInt($slider.data('speed')) || 500,
                $autoplay = parseInt($slider.data('autoplay')) === 1,
                $autoplayTimeout = parseInt($slider.data('autoplay-timeout'));
            var spaceDesktop = parseInt($slider.data('space')) || 0;
            var pppDesktop   = parseInt($slider.data('ppp')) || 1;

            var spaceLaptop  = parseInt($slider.data('space-laptop')) || spaceDesktop;
            var spaceTablet  = parseInt($slider.data('space-tablet')) || spaceLaptop;
            var spaceMobile  = parseInt($slider.data('space-mobile')) || spaceTablet;

            var pppLaptop    = parseInt($slider.data('ppp-laptop')) || pppDesktop;
            var pppTablet    = parseInt($slider.data('ppp-tablet')) || pppLaptop;
            var pppMobile    = parseInt($slider.data('ppp-mobile')) || pppTablet;

            new Swiper($swiper[0], {
                slidesPerView: 3.5,
                spaceBetween: 24,
                loop: $loop,
                speed: $speed,
                autoplay: $autoplay ? {
                    delay: $autoplayTimeout,
                    disableOnInteraction: false
                } : false,
                navigation: {
                    prevEl: '.column-nav-prev',
                    nextEl: '.column-nav-next',
                },
                pagination: {
                    el: '.hajimi-column-pagination',
                    clickable: true,
                },
                breakpoints: {
                    0: {
                        slidesPerView: pppMobile,
                        spaceBetween: spaceMobile,
                        slidesOffsetBefore: 24,
                        slidesOffsetAfter: 24,
                    },
                    768: {
                        slidesPerView: pppTablet,
                        spaceBetween: spaceTablet,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1200: {
                        slidesPerView: pppLaptop,
                        spaceBetween: spaceLaptop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    },
                    1600: {
                        slidesPerView: pppDesktop,
                        spaceBetween: spaceDesktop,
                        slidesOffsetBefore: 0,
                        slidesOffsetAfter: 0,
                    }
                }
            });
        });

        
        $('.hajimi-fancy-marquee').each(function () {
            const $marquee = $(this);
            const $track   = $marquee.find('.marquee-track');
            const $span    = $track.find('.hajimi-heading-title').first();

            if (!$span.length) return;

            $track.css('animation', 'none');
            $track.find('.clone').remove();
            $track.find('.hajimi-heading-title').not(':first').remove();

            const screenWidth = $marquee.width();
            const spanWidth   = $span.outerWidth(true);
            const count       = Math.floor(screenWidth / spanWidth) + 1;

            for (let i = 1; i < count; i++) {
                $track.append($span.clone());
            }

            $track.children().clone().addClass('clone').appendTo($track);

            requestAnimationFrame(() => {
                $track[0].offsetHeight;
                $track.css('animation', '');
            });
        });

        $('.hajimi-accordion').each(function() {
            var $accordion = $(this);
            $accordion.find('button.hajimi-header-title').on('click', function(e) {
                e.preventDefault();
                var $button = $(this),
                    $parent = $button.closest('.hajimi-accordion-item'),
                    $siblings = $button.parents('.hajimi-accordion').find('.hajimi-accordion-item'),
                    $body = $parent.find('.hajimi-body');
                $button.prop('disabled', true);
                setTimeout(function() {
                    $button.prop('disabled', false);
                }, 250);

                if( $parent.hasClass('opened') ) {
                    $parent.removeClass('opened');
                    $body.slideUp();
                }
                else {
                    $siblings.removeClass('opened');
                    $siblings.find('.hajimi-body').slideUp();
                    $parent.addClass('opened');
                    $body.slideDown();
                }
            });
        });
    });
});