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
});