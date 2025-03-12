<?php
// Create this new file to handle dynamic styles

function xfolio_get_dynamic_styles() {
    $styles = '';
    
    // Get theme mods with defaults
    $header_bg = get_theme_mod('xfolio_header_background', []);
    $header_logo_typo = get_theme_mod('xfolio_header_logo_typography', []);
    $header_menu_typo = get_theme_mod('xfolio_header_menu_typography', []);
    $menu_hover_color = get_theme_mod('xfolio_header_menu_hover_color', '#007bff');
    $header_padding = get_theme_mod('xfolio_header_padding', []);
    $border_color = get_theme_mod('xfolio_header_border_color', '#eaeaea');
    $border_width = get_theme_mod('xfolio_header_border_width', '1px');

    // Debug output
    error_log('Header Background: ' . print_r($header_bg, true));
    error_log('Header Logo Typography: ' . print_r($header_logo_typo, true));
    error_log('Header Menu Typography: ' . print_r($header_menu_typo, true));

    // Header styles with proper checks and more specific selectors
    $styles .= '
        /* Header Background */
        header.xfolio-header {
            ' . (isset($header_bg['background-color']) ? 'background-color: ' . esc_attr($header_bg['background-color']) . ' !important;' : '') . '
            ' . (isset($header_bg['background-image']) ? 'background-image: url("' . esc_url($header_bg['background-image']) . '") !important;' : '') . '
            ' . (isset($header_bg['background-repeat']) ? 'background-repeat: ' . esc_attr($header_bg['background-repeat']) . ' !important;' : '') . '
            ' . (isset($header_bg['background-position']) ? 'background-position: ' . esc_attr($header_bg['background-position']) . ' !important;' : '') . '
            ' . (isset($header_bg['background-size']) ? 'background-size: ' . esc_attr($header_bg['background-size']) . ' !important;' : '') . '
            ' . (isset($header_bg['background-attachment']) ? 'background-attachment: ' . esc_attr($header_bg['background-attachment']) . ' !important;' : '') . '
            ' . (isset($header_padding['padding-top']) ? 'padding-top: ' . esc_attr($header_padding['padding-top']) . ' !important;' : '') . '
            ' . (isset($header_padding['padding-right']) ? 'padding-right: ' . esc_attr($header_padding['padding-right']) . ' !important;' : '') . '
            ' . (isset($header_padding['padding-bottom']) ? 'padding-bottom: ' . esc_attr($header_padding['padding-bottom']) . ' !important;' : '') . '
            ' . (isset($header_padding['padding-left']) ? 'padding-left: ' . esc_attr($header_padding['padding-left']) . ' !important;' : '') . '
            border: ' . esc_attr($border_width) . ' solid ' . esc_attr($border_color) . ' !important;
        }

        /* Logo Typography */
        .site-header .site-branding .site-title a,
        .site-title a {
            ' . (isset($header_logo_typo['font-family']) ? 'font-family: ' . esc_attr($header_logo_typo['font-family']) . ' !important;' : '') . '
            ' . (isset($header_logo_typo['variant']) ? 'font-weight: ' . esc_attr($header_logo_typo['variant']) . ' !important;' : '') . '
            ' . (isset($header_logo_typo['font-size']) ? 'font-size: ' . esc_attr($header_logo_typo['font-size']) . ' !important;' : '') . '
            ' . (isset($header_logo_typo['line-height']) ? 'line-height: ' . esc_attr($header_logo_typo['line-height']) . ' !important;' : '') . '
            ' . (isset($header_logo_typo['color']) ? 'color: ' . esc_attr($header_logo_typo['color']) . ' !important;' : '') . '
            text-decoration: none !important;
        }

        /* Menu Typography */
        .site-header .main-navigation ul li a,
        .main-navigation a,
        #site-navigation ul li a {
            ' . (isset($header_menu_typo['font-family']) ? 'font-family: ' . esc_attr($header_menu_typo['font-family']) . ' !important;' : '') . '
            ' . (isset($header_menu_typo['variant']) ? 'font-weight: ' . esc_attr($header_menu_typo['variant']) . ' !important;' : '') . '
            ' . (isset($header_menu_typo['font-size']) ? 'font-size: ' . esc_attr($header_menu_typo['font-size']) . ' !important;' : '') . '
            ' . (isset($header_menu_typo['line-height']) ? 'line-height: ' . esc_attr($header_menu_typo['line-height']) . ' !important;' : '') . '
            ' . (isset($header_menu_typo['color']) ? 'color: ' . esc_attr($header_menu_typo['color']) . ' !important;' : '') . '
        }

        /* Menu Hover Color */
        .site-header .main-navigation ul li a:hover,
        .site-header .main-navigation .current-menu-item > a,
        .main-navigation a:hover,
        .main-navigation .current-menu-item > a,
        #site-navigation ul li a:hover,
        #site-navigation .current-menu-item > a {
            color: ' . esc_attr($menu_hover_color) . ' !important;
        }

        /* Header Padding and Border */
        header.site-header,
        .site-header {
            padding: ' . 
            (isset($header_padding['padding-top']) ? esc_attr($header_padding['padding-top']) : '20px') . ' ' . 
            (isset($header_padding['padding-right']) ? esc_attr($header_padding['padding-right']) : '30px') . ' ' . 
            (isset($header_padding['padding-bottom']) ? esc_attr($header_padding['padding-bottom']) : '20px') . ' ' . 
            (isset($header_padding['padding-left']) ? esc_attr($header_padding['padding-left']) : '30px') . ' !important;
            border-bottom: ' . esc_attr($border_width) . ' solid ' . esc_attr($border_color) . ' !important;
        }
    ';

    // Add debug output to page
    $styles .= '
        /* Debug Info */
        body::before {
            content: none;
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            background: #fff;
            padding: 20px;
            z-index: 9999;
            border: 1px solid #ddd;
            max-width: 400px;
            white-space: pre-wrap;
        }
    ';

    // Home Page Styles
    $home_hero_bg = get_theme_mod('xfolio_home_hero_background', []);
    $home_greeting_typo = get_theme_mod('xfolio_home_greeting_typography', []);
    $home_desc_typo = get_theme_mod('xfolio_home_description_typography', []);
    
    // About Page Styles
    $about_bg = get_theme_mod('xfolio_about_background', []);
    if (!empty($about_bg)) {
        $styles .= '.page-template-template-about {';
        foreach ($about_bg as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    $about_heading_typo = get_theme_mod('xfolio_about_heading_typography', []);
    if (!empty($about_heading_typo)) {
        $styles .= '.page-template-template-about h2 {';
        foreach ($about_heading_typo as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    $about_text_typo = get_theme_mod('xfolio_about_text_typography', []);
    if (!empty($about_text_typo)) {
        $styles .= '.page-template-template-about p {';
        foreach ($about_text_typo as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }
    
    // Portfolio Page Styles
    $portfolio_bg = get_theme_mod('xfolio_portfolio_background', []);
    if (!empty($portfolio_bg)) {
        $styles .= '.portfolio-archive {';
        foreach ($portfolio_bg as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    $portfolio_title_typo = get_theme_mod('xfolio_portfolio_title_typography', []);
    if (!empty($portfolio_title_typo)) {
        $styles .= '.portfolio-item .portfolio-title {';
        foreach ($portfolio_title_typo as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }
    
    // Contact Page Styles
    $contact_bg = get_theme_mod('xfolio_contact_background', []);
    if (!empty($contact_bg)) {
        $styles .= '.page-template-template-contact {';
        foreach ($contact_bg as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    $contact_form_bg = get_theme_mod('xfolio_contact_form_bg', '#f8f9fa');
    $styles .= '
        .contact-form {
            background-color: ' . esc_attr($contact_form_bg) . ';
            padding: 30px;
            border-radius: 8px;
        }
    ';

    $contact_form_typo = get_theme_mod('xfolio_contact_form_typography', []);
    if (!empty($contact_form_typo)) {
        $styles .= '.contact-form input, .contact-form textarea {';
        foreach ($contact_form_typo as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    // Footer Background
    $footer_bg = get_theme_mod('xfolio_footer_background', []);
    if (!empty($footer_bg)) {
        $styles .= '.xfolio-footer {';
        foreach ($footer_bg as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    // Footer Padding
    $footer_padding = get_theme_mod('xfolio_footer_padding', []);
    if (!empty($footer_padding)) {
        $styles .= '.xfolio-footer {';
        foreach ($footer_padding as $property => $value) {
            $styles .= $property . ': ' . $value . ';';
        }
        $styles .= '}';
    }

    // Contact Typography
    $contact_typography = get_theme_mod('xfolio_footer_contact_typography', []);
    if (!empty($contact_typography)) {
        $styles .= '.xfolio-footer .contact-info a {';
        foreach ($contact_typography as $property => $value) {
            if ($value) {
                $styles .= $property . ': ' . $value . ';';
            }
        }
        $styles .= '}';
    }

    // Contact Links Color
    $contact_color = get_theme_mod('xfolio_footer_contact_color', '#333333');
    $contact_hover_color = get_theme_mod('xfolio_footer_contact_hover_color', '#007bff');
    $styles .= '
        .xfolio-footer .contact-info a {
            color: ' . esc_attr($contact_color) . ';
            transition: color 0.3s ease;
        }
        .xfolio-footer .contact-info a:hover {
            color: ' . esc_attr($contact_hover_color) . ';
        }
    ';

    // Social Icons Size and Spacing
    $social_size = get_theme_mod('xfolio_social_icons_size', 24);
    $social_spacing = get_theme_mod('xfolio_social_icons_spacing', 20);
    $styles .= '
        .xfolio-footer-social-share img {
            width: ' . esc_attr($social_size) . 'px;
            height: ' . esc_attr($social_size) . 'px;
        }
        .xfolio-footer-social-share ul li {
            margin: 0 ' . esc_attr($social_spacing/2) . 'px;
        }
    ';

    return $styles;
}

// Add dynamic styles to wp_head
function xfolio_output_dynamic_styles() {
    $styles = xfolio_get_dynamic_styles();
    if (!empty($styles)) {
        echo '<style type="text/css">' . wp_strip_all_tags($styles) . '</style>';
    }
}
add_action('wp_head', 'xfolio_output_dynamic_styles');

// Add a debug function to check if customizer values are being saved
function xfolio_debug_customizer_values() {
    error_log('Header Background: ' . print_r(get_theme_mod('xfolio_header_background'), true));
    error_log('Header Logo Typography: ' . print_r(get_theme_mod('xfolio_header_logo_typography'), true));
    error_log('Header Menu Typography: ' . print_r(get_theme_mod('xfolio_header_menu_typography'), true));
}
add_action('customize_save_after', 'xfolio_debug_customizer_values'); 