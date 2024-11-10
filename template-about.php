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

        <?php
            $settings = get_theme_mod( 'repeater_setting_2' );

            if ( ! empty( $settings ) && is_array( $settings ) ) :
        ?>
            <?php foreach ( $settings as $setting ) : ?>
                <div class="xfolio-single-academic">
                    <h3 class="xfolio-institute-name"><?php echo esc_html( $setting['academic_institute'] ); ?></h3>
                    <ul>
                        <li class="xfolio-course"><?php echo esc_html( $setting['academic_subject'] ); ?></li>
                        <li class="xfolio-course-duration"><?php echo esc_html( $setting['academic_duration'] ); ?></li>
                    </ul>
                    <p class="xfolio-subject"><?php echo esc_html( $setting['academic_major'] ); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No academic education data available.</p>
        <?php endif; ?>
    </div>
    
</main><!-- .main-wrapper -->

<?php get_footer(); ?>
