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
});