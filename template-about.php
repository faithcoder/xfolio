<?php
/*
 * Template Name: About
 */

get_header(); // This will include the default header

?>

<main class="main-wrapper">

    <div class="xfolio-about-intro">
        <div class="about-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/emran.png" alt="my-image" />
        </div>
        <div class="about-text">
            <h1>emran <br>hossain</h1>
            <h4>Product Designer</h4>
        </div>
    </div>
    <div class="about-description">
        <p>
        Designing solutions in various types of industries for more than 5 years. I focused on clear visual concepts that create an impactful experience and meet the business goal for users and product owners. I believe, beauty is just an expression but In the end, we pay for the solution that makes us feel better and safe.
        </p>
        <ul class="passion-list">
            <li>Photography</li>
            <li>Riding</li>
            <li>Silence</li>
            <li>Reading</li>
        </ul>
    </div>

    <div class="xfolio-experience">
        <h4 class="section-title">work experience</h4>
        <?php echo do_shortcode('[exfolio_experiences]'); ?>

    </div>
    
</main><!-- .main-wrapper -->

<?php
// No footer is included here, as requested
