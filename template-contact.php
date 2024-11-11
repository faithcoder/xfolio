<?php
/*
 * Template Name: Contact
 */

get_header(); // This will include the default header

?>

<main class="main-wrapper">
    <h1 class="xfolio-page-title">Find Me.</h1>

    <div class="xfolio-contact-page">
        <div class="xfolio-contact-info">
            <div class="xfolio-email">
                <h5>email</h5>
                <p><?php echo get_theme_mod('xfolio-contact-email');?> </p>
            </div>
            <div class="xfolio-phone">
                <h5>phone</h5>
                <p><?php echo get_theme_mod('xfolio-contact-phone');?></p>
            </div>
            <div class="xfolio-location">
                <h5>location</h5>
                <p><?php echo get_theme_mod('xfolio-contact-location');?></p>
            </div>
        </div>
        <div class="xfolio-social-profiles">
            <h5>social</h5>
            <?php $settings = get_theme_mod( 'repeater_setting_3');?>
            
                <ul>
                <?php foreach ( $settings as $setting ) : ?>
                    <li><a href="<?php echo $setting['xfolio-social-link']; ?>"><?php echo $setting['xfolio-social-text']; ?></a></li>
                <?php endforeach; ?>
                </ul>
            
        </div>
    </div>

    <span class="border-line"></span>

    <div class="xfolio-contact-form-area">
        <div class="form-title-area">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/msg_icon.png" alt="Share on Twitter" /><h4>Send me a message</h4>    
        </div>
        <div class="xfolio-contact-form">
            this is form area
        </div>
    </div>

</main><!-- .main-wrapper -->

