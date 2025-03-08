<?php
/**
 * TGMPA plugin activation.
 */

if (!function_exists('xfolio_register_required_plugins')) {
    function xfolio_register_required_plugins() {
        $plugins = array(
            array(
                'name'      => 'Kirki Customizer Framework',
                'slug'      => 'kirki',
                'required'  => true,
            )
        );

        $config = array(
            'id'           => 'xfolio',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                       // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins',  // Menu slug.
            'parent_slug'  => 'themes.php',             // Parent menu slug.
            'capability'   => 'edit_theme_options',     // Capability needed to view plugin install page
            'has_notices'  => true,                     // Show admin notices or not.
            'dismissable'  => true,                     // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                       // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                    // Automatically activate plugins after installation or not.
            'message'      => '',                       // Message to output right before the plugins table.
        );

        tgmpa($plugins, $config);
    }
    add_action('tgmpa_register', 'xfolio_register_required_plugins');
} 