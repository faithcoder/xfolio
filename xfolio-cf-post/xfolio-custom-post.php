<?php
/**
 * Register Custom Post Types
 */

function xfolio_register_post_types() {
    // Portfolio Post Type
    $labels = array(
        'name'               => _x('Portfolios', 'post type general name', 'xfolio'),
        'singular_name'      => _x('Portfolio', 'post type singular name', 'xfolio'),
        'menu_name'          => _x('Portfolios', 'admin menu', 'xfolio'),
        'name_admin_bar'     => _x('Portfolio', 'add new on admin bar', 'xfolio'),
        'add_new'            => _x('Add New', 'portfolio', 'xfolio'),
        'add_new_item'       => __('Add New Portfolio', 'xfolio'),
        'new_item'          => __('New Portfolio', 'xfolio'),
        'edit_item'         => __('Edit Portfolio', 'xfolio'),
        'view_item'         => __('View Portfolio', 'xfolio'),
        'all_items'         => __('All Portfolios', 'xfolio'),
        'search_items'      => __('Search Portfolios', 'xfolio'),
        'not_found'         => __('No portfolios found.', 'xfolio'),
        'not_found_in_trash'=> __('No portfolios found in Trash.', 'xfolio')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'portfolio'),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-portfolio',
        'supports'          => array('title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type('xfolio-portfolio', $args);

    // Add Custom Meta Box for Portfolio Details
    function xfolio_add_portfolio_meta_boxes() {
        add_meta_box(
            'xfolio_portfolio_details',
            __('Portfolio Details', 'xfolio'),
            'xfolio_portfolio_meta_box_callback',
            'xfolio-portfolio',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'xfolio_add_portfolio_meta_boxes');

    function xfolio_portfolio_meta_box_callback($post) {
        wp_nonce_field('xfolio_save_portfolio_details', 'xfolio_portfolio_nonce');

        $tools_used = get_post_meta($post->ID, '_xfolio_tools_used', true);
        $preview_url = get_post_meta($post->ID, '_xfolio_preview_url', true);

        ?>
        <p>
            <label for="xfolio_tools_used"><?php _e('Tools Used:', 'xfolio'); ?></label>
            <textarea id="xfolio_tools_used" name="xfolio_tools_used" class="large-text" rows="3"><?php echo esc_textarea($tools_used); ?></textarea>
            <span class="description"><?php _e('Enter the tools and technologies used in this project', 'xfolio'); ?></span>
        </p>
        <p>
            <label for="xfolio_preview_url"><?php _e('Preview URL:', 'xfolio'); ?></label>
            <input type="url" id="xfolio_preview_url" name="xfolio_preview_url" class="large-text" value="<?php echo esc_url($preview_url); ?>">
            <span class="description"><?php _e('Enter the live preview URL for this project', 'xfolio'); ?></span>
        </p>
        <?php
    }

    function xfolio_save_portfolio_meta($post_id) {
        if (!isset($_POST['xfolio_portfolio_nonce']) || !wp_verify_nonce($_POST['xfolio_portfolio_nonce'], 'xfolio_save_portfolio_details')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST['xfolio_tools_used'])) {
            update_post_meta($post_id, '_xfolio_tools_used', sanitize_textarea_field($_POST['xfolio_tools_used']));
        }

        if (isset($_POST['xfolio_preview_url'])) {
            update_post_meta($post_id, '_xfolio_preview_url', esc_url_raw($_POST['xfolio_preview_url']));
        }
    }
    add_action('save_post', 'xfolio_save_portfolio_meta');
}
add_action('init', 'xfolio_register_post_types');

// Add portfolio categories
function xfolio_register_taxonomies() {
    $labels = array(
        'name'              => _x('Portfolio Categories', 'taxonomy general name', 'xfolio'),
        'singular_name'     => _x('Portfolio Category', 'taxonomy singular name', 'xfolio'),
        'search_items'      => __('Search Portfolio Categories', 'xfolio'),
        'all_items'         => __('All Portfolio Categories', 'xfolio'),
        'parent_item'       => __('Parent Portfolio Category', 'xfolio'),
        'parent_item_colon' => __('Parent Portfolio Category:', 'xfolio'),
        'edit_item'         => __('Edit Portfolio Category', 'xfolio'),
        'update_item'       => __('Update Portfolio Category', 'xfolio'),
        'add_new_item'      => __('Add New Portfolio Category', 'xfolio'),
        'new_item_name'     => __('New Portfolio Category Name', 'xfolio'),
        'menu_name'         => __('Categories', 'xfolio'),
    );

    register_taxonomy('portfolio-category', 'xfolio-portfolio', array(
        'hierarchical'      => true,
        'labels'           => $labels,
        'show_ui'          => true,
        'show_admin_column'=> true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'portfolio-category'),
    ));
}
add_action('init', 'xfolio_register_taxonomies');



// Register Custom Post Type for Experience
function exfolio_register_experience_post_type() {
    $labels = [
        'name'               => 'Experiences',
        'singular_name'      => 'Experience',
        'menu_name'          => 'Experiences',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Experience',
        'edit_item'          => 'Edit Experience',
        'new_item'           => 'New Experience',
        'view_item'          => 'View Experience',
        'all_items'          => 'All Experiences',
        'search_items'       => 'Search Experiences',
        'not_found'          => 'No experiences found.',
        'not_found_in_trash' => 'No experiences found in Trash.',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'show_in_menu'       => true,
        'supports'           => ['title', 'editor', 'thumbnail'],
        'menu_icon'          => 'dashicons-portfolio',
    ];

    register_post_type('exfolio_experience', $args);
}
add_action('init', 'exfolio_register_experience_post_type');

// Add Custom Meta Boxes for Experience
function exfolio_add_experience_meta_boxes() {
    add_meta_box('exfolio_experience_details', 'Experience Details', 'exfolio_experience_meta_box_callback', 'exfolio_experience', 'normal', 'high');
}
add_action('add_meta_boxes', 'exfolio_add_experience_meta_boxes');

function exfolio_experience_meta_box_callback($post) {
    wp_nonce_field('exfolio_save_experience_details', 'exfolio_experience_nonce');

    $company_name = get_post_meta($post->ID, '_exfolio_company_name', true);
    $duration = get_post_meta($post->ID, '_exfolio_duration', true);
    $exfolio_experience_id = get_post_meta($post->ID, '_exfolio_experience_id', true);
   

    echo '<label for="exfolio_company_name">Company Name:</label>';
    echo '<input type="text" id="exfolio_company_name" name="exfolio_company_name" value="' . esc_attr($company_name) . '" class="widefat">';

    echo '<label for="exfolio_duration">Duration:</label>';
    echo '<input type="text" id="exfolio_duration" name="exfolio_duration" value="' . esc_attr($duration) . '" class="widefat">';
    
    echo '<label for="exfolio_experience_id">Experience Section Id:</label>';
    echo '<input type="text" id="exfolio_experience_id" name="exfolio_experience_id" value="' . esc_attr($exfolio_experience_id) . '" class="widefat">';

}

// Save Meta Box Data
function exfolio_save_experience_meta($post_id) {
    if (!isset($_POST['exfolio_experience_nonce']) || !wp_verify_nonce($_POST['exfolio_experience_nonce'], 'exfolio_save_experience_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta($post_id, '_exfolio_company_name', sanitize_text_field($_POST['exfolio_company_name']));
    update_post_meta($post_id, '_exfolio_duration', sanitize_text_field($_POST['exfolio_duration']));
    update_post_meta($post_id, '_exfolio_experience_id', sanitize_text_field($_POST['exfolio_experience_id']));
    
}
add_action('save_post', 'exfolio_save_experience_meta');

// Shortcode to Display Experiences
function exfolio_display_experiences() {
    ob_start();

    $args = [
        'post_type' => 'exfolio_experience',
        'posts_per_page' => -1,
    ];
    $query = new WP_Query($args);

    $collapse_icon_down = get_template_directory_uri() . '/assets/img/arrow-down.png';
    $collapse_icon_up = get_template_directory_uri() . '/assets/img/arrow-up.png';


    if ($query->have_posts()): ?>
        <div class="exfolio-experience-list">
            <?php while ($query->have_posts()): $query->the_post(); ?>
                <?php
                $company_name = get_post_meta(get_the_ID(), '_exfolio_company_name', true);
                $duration = get_post_meta(get_the_ID(), '_exfolio_duration', true);
                $exfolio_experience_id = get_post_meta(get_the_ID(), '_exfolio_experience_id', true);
                
                ?>
                <div class="exfolio-experience-item" 
                    <?php echo isset($exfolio_experience_id) && !empty($exfolio_experience_id) ? 'id="' . esc_attr($exfolio_experience_id) . '"' : ''; ?>>
                    
                    <h3 class="exfolio-experience-title"><?php the_title(); ?></h3>
                    
                    <div class="exfolio-experience-meta-info">
                        <div class="exfolio-company-info">
                            <div class="exfolio-company-logo">
                                <?php if (get_the_post_thumbnail_url()): ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="exfolio-company-name">
                                <?php if ($company_name): ?>
                                    <h4><?php echo esc_html($company_name); ?></h4>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="exfolio-company-duration">
                            <?php if ($duration): ?>
                                <p><?php echo esc_html($duration); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="exfolio_collapse_toggle">
                            <img class="collapse-icon collapse-icon-down" src="<?php echo esc_url($collapse_icon_down); ?>" alt="arrow-down" style="display: none;">
                            <img class="collapse-icon collapse-icon-up" src="<?php echo esc_url($collapse_icon_up); ?>" alt="arrow-up">
                        </div>
                    </div>
                    
                    <div class="exfolio-collapse-content">
                        <p class="exfolio-responsibilities">Responsibilities</p>
                        <p class="exfolio-description"><?php the_content(); ?></p>
                    </div>
                </div>


            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No experiences found.</p>
    <?php endif;

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('exfolio_experiences', 'exfolio_display_experiences');