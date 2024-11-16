jQuery(document).ready(function ($) {
    const $menuToggle = $('.menu-toggle');
    const $hamburgerIcon = $('.hamburger-icon');
    const $closeIcon = $('.close-icon');
    const $menu = $('.menu');

    $closeIcon.hide();

    $menuToggle.click(function () {
        // Toggle the menu display
        $menu.toggleClass('active');

        // Toggle icons visibility
        $hamburgerIcon.toggle();
        $closeIcon.toggle();
    });

    $('.xfolio-contact-form').hide();

    // Toggle form display on clicking the title area
    $('.form-title-area').click(function () {
        $('.xfolio-contact-form').slideToggle(); // Slide the form up or down
    });

});

