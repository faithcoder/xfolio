// jQuery(document).ready(function ($) {
//     const $stickyElement = $('.xfolio-page-content'); // Replace with your element's class or ID
//     const offsetTop = $stickyElement.offset().top; // Capture initial offset from the top
//     const customOffsetTop = 500; // Custom offset from the top
//     const customOffsetRight = 200; // Custom offset from the right
    
//     $(window).scroll(function () {
//         if ($(window).scrollTop() > offsetTop - customOffsetTop) {
//             $stickyElement.css({
//                 'position': 'absolute',
//                 'top': $(window).scrollTop() - offsetTop + customOffsetTop + 'px',
//                 'right': customOffsetRight + 'px', // Set the right offset
//             });
//         } else {
//             $stickyElement.css('position', 'static');
//         }
//     });
// });


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

