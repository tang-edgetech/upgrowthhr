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
});