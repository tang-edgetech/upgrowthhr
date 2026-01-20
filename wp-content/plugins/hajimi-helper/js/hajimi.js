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
    });
});