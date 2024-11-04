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
    // Hamburger and close icons
    const $hamburger = $('.hamburger-icon');
    const $closeIcon = $('.close-icon');
    const $menu = $('.exfolio-main-menu');

    // Show menu on hamburger click
    $hamburger.click(function () {
        $menu.addClass('active');
        $hamburger.hide();
        $closeIcon.show();
    });

    // Hide menu on close icon click
    $closeIcon.click(function () {
        $menu.removeClass('active');
        $closeIcon.hide();
        $hamburger.show();
    });
});
