jQuery(document).ready(function($) {
    function handleScrollState() {
        if ($(window).scrollTop() > 100) {
            $('body').addClass('scrolled');
        } else {
            $('body').removeClass('scrolled');
        }
    }
    handleScrollState();
    $(window).on('scroll', handleScrollState);
    $(window).on('resize', handleScrollState);

    $(document).on('change', '.input-control.wpcf7-checkbox .wpcf7-list-item > label', function() {
        var $label = $(this),
            $item = $label.closest('.wpcf7-list-item');
        $item.toggleClass('selected ');
    });

    var swiperInstances = [];
    var currentMode = null;
    var currentMode2 = null;
    var testimonialSwiper = null;

    function handleSwiper() {
        var windowWidth = $(window).width();

        if (windowWidth <= 991) {
            if (currentMode !== 'mobile') {

                $('.custom-card-swiper.swiper').each(function(index) {
                    var swiper = new Swiper(this, {
                        slidesPerView: "auto",
                        slidesOffsetBefore: 24,
                        slidesOffsetAfter: 48,
                        spaceBetween: 15,
                    });

                    swiperInstances[index] = swiper;
                });

                currentMode = 'mobile';
                console.log('Swiper Initialized');
            }
        }
        else {
            if (currentMode !== 'desktop') {

                swiperInstances.forEach(function(swiper) {
                    if (swiper && typeof swiper.destroy === 'function') {
                        swiper.destroy(true, true);
                    }
                });

                swiperInstances = [];
                currentMode = 'desktop';
                console.log('Swiper Destroyed');
            }
        } 
    }

    handleSwiper();
    $(window).on('resize', function() {
        handleSwiper();
    });

    
    function handleTestimonialSwiper() {
        var winWidth = $(window).width();
        var $container = $('.ug-testimonial-shortcode');
        var $wrapper = $container.find('.ug-testimonials');
        var $slides = $wrapper.find('.rev-item');
        if (winWidth <= 767) {
            if (currentMode2 !== 'mobile') {
                currentMode2 = 'mobile';

                $container.addClass('swiper');
                $wrapper.addClass('swiper-wrapper');
                $slides.addClass('swiper-slide');

                testimonialSwiper = new Swiper('.ug-testimonial-shortcode', {
                    slidesPerView: "auto",
                    spaceBetween: 16,
                    loop: false,
                    slidesOffsetBefore: 24,
                    slidesOffsetAfter: 24,
                });
            console.log('Build');
            }
        } else {
            if (currentMode2 !== 'desktop') {
                currentMode2 = 'desktop';

                if (testimonialSwiper) {
                    testimonialSwiper.destroy(true, true);
                    testimonialSwiper = null;
                }

                $container.removeClass('swiper');
                $wrapper.removeClass('swiper-wrapper');
                $slides.removeClass('swiper-slide');
            }
            console.log('Destroy');
        }
    }

    handleTestimonialSwiper();
    $(window).on('resize', function(){
        handleTestimonialSwiper();
    });

    $('.ug-team-swiper').each(function() {
        var $slider = $(this),
            $swiper = $slider.find('.swiper');

        new Swiper($swiper[0], {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            speed: 300,
            autoplay: {
                delay: 7500,
                disableOnInteraction: false,
            },
            navigation: {
                prevEl: '.team-nav-prev',
                nextEl: '.team-nav-next',
            },
            pagination: {
                el: '.ug-team-pagination',
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesOffsetBefore: 24,
                    slidesOffsetAfter: 24,
                },
                768: {
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                },
                1200: {
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                },
                1600: {
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                }
            }
        });
    });

    $('.text-editor-expansion').each(function() {
        var $expansion = $(this),
            $text_editor = $expansion.find('.text-editor-inner'),
            $text_editor_wrapper = $expansion.find('.text-editor-wrapper'),
            $button = $expansion.find('.btn-text');
        $button.on('click', function(e) {
            e.preventDefault();
            if( $text_editor.hasClass('expanded') ) {
                $text_editor.removeClass('expanded');
            }
            else {
                $text_editor.addClass('expanded');
            }
        });
    });
});