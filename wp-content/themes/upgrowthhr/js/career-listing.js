jQuery(document).ready(function($) {
    var $career_nav;
    const params = new URLSearchParams(window.location.search);

    if( $('#swiper-career-nav')[0] ) {
        $career_nav = new Swiper('#swiper-career-nav', {
            slidesPerView: "auto",
            spaceBetween: 10,
            breakpoints: {
                0: {
                    slidesOffsetBefore: 20,
                    slidesOffsetAfter: 20,
                },
                768: {
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                }
            }
        });
    }
    
    let $size = 150;
    if (params.has('department')) {
        const department = params.get('department');
        if( department !== null ) {
            const $targetSlide = $(`.swiper-slide[data-department="${department}"]`);

            if ($targetSlide.length) {
                const index = $targetSlide.index();
                $career_nav.slideTo(index, 0);
            }

            let $target = ".career-listing";
            
            if (window.location.hash) {
                const hash = window.location.hash;
                
                if ($(hash).length) {
                    $target = hash;
                }
            }

            $('html, body').animate({
                scrollTop: $($target).offset().top - $size
            });
        }
    }
    else {
        if (window.location.hash) {
            const hash = window.location.hash;
            
            if ($(hash).length) {
                $target = hash;
            }
        }

        $('html, body').animate({
            scrollTop: $($target).offset().top - $size
        });
    }
});