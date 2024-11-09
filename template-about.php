<?php
/*
 * Template Name: About
 */

get_header(); // This will include the default header

?>

<main class="main-wrapper">

<div class="xfolio-page-content">
    <p>PAGE CONTENT</p>
    <ul>
        <li><a href="">Info</a></li>
        <li><a href="">Experience</a></li>
        <li><a href="">Education</a></li>
        <li><a href="">Skills</a></li>
    </ul>
</div>

    <div class="xfolio-about-intro">
        <div class="about-image">
            <img src="<?php echo get_theme_mod('my-image');?>" />
        </div>
        <div class="about-text">
            <h1><?php echo get_theme_mod('first-name');?> <br><?php echo get_theme_mod('last-name');?></h1>
            <h4><?php echo get_theme_mod('profession-name');?></h4>
        </div>
    </div>
    <div class="about-description">
        <p>
        <?php echo get_theme_mod('about-description'); ?>
        </p>
        <ul class="passion-list-desktop">
            <li>Photography</li>
            <li>Riding</li>
            <li>Silence</li>
            <li>Reading</li>
        </ul>
        <ul class="passion-list-responsive">
            <li>Photography</li>
            <li>Riding</li>
            <br>
            <li class="third-passion">Silence</li>
            <li>Reading</li>
        </ul>
    </div>

    <div class="xfolio-experience">
        <h4 class="xfolio-section-title">work experience</h4>
        <?php echo do_shortcode('[exfolio_experiences]'); ?>
    </div>

    <div class="xfolio-academic">
        <h4 class="xfolio-section-title">academic education</h4>
        <div class="xfolio-single-academic">
            <h3 class="xfolio-institute-name">National University</h3>
            <ul>
                <li class="xfolio-course">Bachelor of Business Administration (BBA)</li>
                <li class="xfolio-course-duration">2012 - 2017</li>
            </ul>
            <p class="xfolio-subject">Finance & Banking</p>
        </div>
        <div class="xfolio-single-academic">
            <h3 class="xfolio-institute-name">National University</h3>
            <ul>
                <li class="xfolio-course">Bachelor of Business Administration (BBA)</li>
                <li class="xfolio-course-duration">2012 - 2017</li>
            </ul>
            <p class="xfolio-subject">Finance & Banking</p>
        </div>
        <div class="xfolio-single-academic">
            <h3 class="xfolio-institute-name">National University</h3>
            <ul>
                <li class="xfolio-course">Bachelor of Business Administration (BBA)</li>
                <li class="xfolio-course-duration">2012 - 2017</li>
            </ul>
            <p class="xfolio-subject">Finance & Banking</p>
        </div>
    </div>
    
</main><!-- .main-wrapper -->

<?php get_footer(); ?>
