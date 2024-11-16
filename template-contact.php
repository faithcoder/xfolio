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
                <ul>
                <?php 
                $settings = get_theme_mod('repeater_setting_3'); 

                if (is_array($settings) && !empty($settings)) : 
                    foreach ($settings as $setting) : ?>
                        <li><a href="<?php echo esc_url($setting['xfolio-social-link']); ?>">
                            <?php echo esc_html($setting['xfolio-social-text']); ?>
                        </a></li>
                    <?php endforeach; 
                else : ?>
                    <p>No social links available.</p> 
                <?php endif; ?>

                </ul>
            
        </div>
    </div>

    <span class="border-line"></span>

    <div class="xfolio-contact-form-area">
        <div class="form-title-area">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/msg_icon.png" alt="Share on Twitter" /><h4>Send me a email</h4>    
        </div>
        <div class="xfolio-contact-form">
           hello form
        
        </div>
    </div>

</main><!-- .main-wrapper -->

