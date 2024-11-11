<?php
/*
 * Template Name: Home
 */

get_header(); // This will include the default header
?>

<main class="main-wrapper">
    <div class="welcome-text">
        <h3><?php echo get_theme_mod('xfolio-intro');?> </h3>
        <h1><?php echo get_theme_mod('xfolio-intro-name');?> </h1>
        <h4><?php echo get_theme_mod('xfolio-intro-profession');?> </h4>
    </div>
    <div class="welcome-description">
        <p><?php echo get_theme_mod('xfolio-intro-description');?> </p>
    </div>

    <div class="contact-mail">
        <p><a href=""><?php echo get_theme_mod('xfolio-intro-contact');?> </a></p>
    </div>
</main><!-- .main-wrapper -->

<?php
// No footer is included here, as requested
