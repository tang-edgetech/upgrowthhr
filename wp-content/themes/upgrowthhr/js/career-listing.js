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
    
    let $target = ".career-listing";
    let $size = 150;
    if (params.has('department')) {
        const department = params.get('department');
        if( department !== null ) {
            const $targetSlide = $(`.swiper-slide[data-department="${department}"]`);

            if ($targetSlide.length) {
                const index = $targetSlide.index();
                $career_nav.slideTo(index, 0);
            }

            
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

    $(document).on('click', '.career-listing .career-nav .career-nav-link', function(e) {
        e.preventDefault();
        var $button = $(this),
            $department = $button.attr('data-filter');
        $.ajax({
            type: 'POST',
            url: career.admin_ajax,
            data: {
                action: 'upgrowthhr_career_listing_deparment_filter',
                nonce: career.nonce,
                department: $department,
                current_url: window.location.origin + window.location.pathname,
            },
            beforeSend: function() {

            },
            success: function(data) {
                var $response = JSON.parse(data);
                console.log($response);
                $('.career-listing .career-nav .career-nav-item').removeClass('selected');
                $button.parent().addClass('selected');

                $('.career-listing .career-body-inner').html($response.html);

                const url = new URL(window.location.href);
                url.searchParams.set('department', $department);
                window.history.replaceState({}, '', url);
            },
            error: function(xhr) {
                console.log('Error occured!');
                console.log(xhr);
            }
        });
    });
});