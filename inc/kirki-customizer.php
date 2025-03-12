<?php
// Check if Kirki exists before using it
if ( class_exists( 'Kirki' ) ) {
	// First, create the main Xfolio panel
	new \Kirki\Panel(
		'xfolio',
		[
			'priority'    => 10,
			'title'       => esc_html__('Xfolio Options', 'xfolio'),
			'description' => esc_html__('Xfolio Description.', 'xfolio'),
		]
	);

	// Create Styles section under Xfolio panel
	new \Kirki\Section(
		'xfolio_styles',
		[
			'title'       => esc_html__('Styles', 'xfolio'),
			'description' => esc_html__('Customize styles for all sections of your site.', 'xfolio'),
			'panel'       => 'xfolio',
			'priority'    => 200,
		]
	);

	// Create subsections under Styles
	new \Kirki\Field\Radio(
		[
			'settings'    => 'style_sections',
			'label'       => esc_html__('Select Style Section', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => 'header',
			'choices'     => [
				'header'    => esc_html__('Header Styles', 'xfolio'),
				'home'      => esc_html__('Home Page Styles', 'xfolio'),
				'about'     => esc_html__('About Page Styles', 'xfolio'),
				'portfolio' => esc_html__('Portfolio Page Styles', 'xfolio'),
				'contact'   => esc_html__('Contact Page Styles', 'xfolio'),
				'footer'    => esc_html__('Footer Styles', 'xfolio'),
			],
		]
	);

	// Header Style Controls
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_header_background',
			'label'       => esc_html__('Header Background', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll',
			],
			'transport'   => 'auto',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_header_logo_typography',
			'label'       => esc_html__('Logo Typography', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'font-family'     => 'Inter',
				'variant'         => '700',
				'font-size'       => '24px',
				'line-height'     => '1.5',
				'letter-spacing'  => '0',
				'text-transform'  => 'none',
				'color'           => '#333333',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_header_menu_typography',
			'label'       => esc_html__('Menu Typography', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'font-family'     => 'Inter',
				'variant'         => '500',
				'font-size'       => '16px',
				'line-height'     => '1.5',
				'letter-spacing'  => '0',
				'text-transform'  => 'none',
				'color'           => '#666666',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_header_menu_hover_color',
			'label'       => esc_html__('Menu Hover Color', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '#007bff',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Dimensions(
		[
			'settings'    => 'xfolio_header_padding',
			'label'       => esc_html__('Header Padding', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'padding-top'    => '20px',
				'padding-bottom' => '20px',
				'padding-left'   => '30px',
				'padding-right'  => '30px',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_header_border_color',
			'label'       => esc_html__('Border Color', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '#eaeaea',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	new \Kirki\Field\Dimension(
		[
			'settings'    => 'xfolio_header_border_width',
			'label'       => esc_html__('Border Width', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '1px',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'header',
				]
			],
		]
	);

	// Home Page Style Controls
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_home_hero_background',
			'label'       => esc_html__('Hero Section Background', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'background-color' => '#f8f9fa',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'home',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_greeting_typography',
			'label'       => esc_html__('Greeting Typography', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '48px',
				'line-height'    => '1.2',
				'letter-spacing' => '-0.02em',
				'color'          => '#333333',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'home',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_name_typography',
			'label'       => esc_html__('Name Typography', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '56px',
				'line-height'    => '1.2',
				'letter-spacing' => '-0.02em',
				'color'          => '#000000',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'home',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_profession_typography',
			'label'       => esc_html__('Profession Typography', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '600',
				'font-size'      => '24px',
				'line-height'    => '1.4',
				'color'          => '#666666',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'home',
				]
			],
		]
	);

	// About Page Style Controls
	new \Kirki\Field\Custom(
		[
			'settings'    => 'about_styles_title',
			'label'       => esc_html__('About Page Styles', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '<h3 style="padding: 15px; background: #fff; margin: 0;">' . esc_html__('About Page Style Options', 'xfolio') . '</h3>',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'about',
				]
			],
		]
	);

	// Portfolio Page Style Controls
	new \Kirki\Field\Custom(
		[
			'settings'    => 'portfolio_styles_title',
			'label'       => esc_html__('Portfolio Page Styles', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '<h3 style="padding: 15px; background: #fff; margin: 0;">' . esc_html__('Portfolio Page Style Options', 'xfolio') . '</h3>',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'portfolio',
				]
			],
		]
	);

	// Contact Page Style Controls
	new \Kirki\Field\Custom(
		[
			'settings'    => 'contact_styles_title',
			'label'       => esc_html__('Contact Page Styles', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '<h3 style="padding: 15px; background: #fff; margin: 0;">' . esc_html__('Contact Page Style Options', 'xfolio') . '</h3>',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'contact',
				]
			],
		]
	);

	// Footer Style Controls
	new \Kirki\Field\Custom(
		[
			'settings'    => 'footer_styles_title',
			'label'       => esc_html__('Footer Styles', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => '<h3 style="padding: 15px; background: #fff; margin: 0;">' . esc_html__('Footer Style Options', 'xfolio') . '</h3>',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'footer',
				]
			],
		]
	);

	// HOME PAGE CONTROLLERS 

	new \Kirki\Section(
		'xfolio-home-section',
		[
			'title'       => esc_html__( 'Home page', 'kirki' ),
			'description' => esc_html__( 'Home page contents.', 'kirki' ),
			'panel'       => 'xfolio',
			'priority'    => 150,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-intro',
			'label'    => esc_html__( 'Say Hi', 'xfolio' ),
			'section'  => 'xfolio-home-section',
			'default'  => esc_html__( 'Hi', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-intro-name',
			'label'    => esc_html__( 'Your nick name', 'xfolio' ),
			'section'  => 'xfolio-home-section',
			'default'  => esc_html__( 'Arif', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-intro-profession',
			'label'    => esc_html__( 'Your profession', 'xfolio' ),
			'section'  => 'xfolio-home-section',
			'default'  => esc_html__( 'WordPress Developer', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Textarea(
		[
			'settings' => 'xfolio-intro-description',
			'label'    => esc_html__( 'Introduce Yourself', 'xfolio' ),
			'section'  => 'xfolio-home-section',
			'default'  => esc_html__( 'Introduce yourself', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-intro-contact',
			'label'    => esc_html__( 'Your email', 'xfolio' ),
			'section'  => 'xfolio-home-section',
			'default'  => esc_html__( 'test@yourdomain.com', 'xfolio' ),
			'priority' => 10,
		]
	);

	// ABOUT ME PAGE CONTROLLERS 

	new \Kirki\Section(
		'xfolio-about-section',
		[
			'title'       => esc_html__( 'About Me page', 'xfolio' ),
			'description' => esc_html__( 'About Me Description.', 'xfolio' ),
			'panel'       => 'xfolio',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'my-image',
			'label'       => esc_html__( 'My Image', 'xfolio' ),
			'description' => esc_html__( 'My Image URL', 'xfolio' ),
			'section'     => 'xfolio-about-section',
			'default'     => '',
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'first-name',
			'label'    => esc_html__( 'First Name', 'xfolio' ),
			'section'  => 'xfolio-about-section',
			'default'  => esc_html__( 'Your first name', 'xfolio' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'last-name',
			'label'    => esc_html__( 'Last Name', 'xfolio' ),
			'section'  => 'xfolio-about-section',
			'default'  => esc_html__( 'Your last name', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'profession-name',
			'label'    => esc_html__( 'Profession Name', 'xfolio' ),
			'section'  => 'xfolio-about-section',
			'default'  => esc_html__( 'Your profession', 'xfolio' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Textarea(
		[
			'settings'    => 'about-description',
			'label'       => esc_html__( 'About Description', 'xfolio' ),
			'section'     => 'xfolio-about-section',
			'default'     => esc_html__( 'Write your description', 'xfolio' ),
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings'     => 'repeater_setting_2',
			'label'        => esc_html__( 'Academic Education', 'xfolio' ),
			'section'      => 'xfolio-about-section',
			'priority'     => 10,
			'row_label'    => [
				'type'  => 'field',
				'value' => esc_html__( 'Row One', 'xfolio' ),
				'field' => 'academic_subject',
			],
			'button_label' => esc_html__( 'Add New', 'xfolio' ),
			
			'fields'       => [
				'academic_institute'   => [
					'type'        => 'text',
					'label'       => esc_html__( 'Institute Name', 'xfolio' ),
					'default'     => '',
				],
				'academic_subject'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Subject Name', 'xfolio' ),
					'default'     => '',
				],
				'academic_duration'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Duration', 'xfolio' ),
					'default'     => '',
				],
				'academic_major'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Major', 'xfolio' ),
					'default'     => '',
				],
			],
		]
	);

	// CONTACT PAGE CONTROLLERS

	new \Kirki\Section(
		'xfolio-contact-section',
		[
			'title'       => esc_html__( 'Contact page', 'kirki' ),
			'description' => esc_html__( 'Contact page contents.', 'kirki' ),
			'panel'       => 'xfolio',
			'priority'    => 170,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-contact-email',
			'label'    => esc_html__( 'Email Address', 'xfolio' ),
			'section'  => 'xfolio-contact-section',
			'default'  => esc_html__( 'test@yourdomain.com', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-contact-phone',
			'label'    => esc_html__( 'Phone No', 'xfolio' ),
			'section'  => 'xfolio-contact-section',
			'default'  => esc_html__( '123456789', 'xfolio' ),
			'priority' => 10,
		]
	);
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio-contact-location',
			'label'    => esc_html__( 'Location', 'xfolio' ),
			'section'  => 'xfolio-contact-section',
			'default'  => esc_html__( 'Dhaka, Bangladesh', 'xfolio' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings'     => 'repeater_setting_3',
			'label'        => esc_html__( 'Social Profiles', 'xfolio' ),
			'section'      => 'xfolio-contact-section',
			'priority'     => 10,
			'row_label'    => [
				'type'  => 'field',
				'value' => esc_html__( 'Row One', 'xfolio' ),
				'field' => 'xfolio-social-text',
			],
			'button_label' => esc_html__( 'Add New', 'xfolio' ),
			
			'fields'       => [
				'xfolio-social-text'   => [
					'type'        => 'text',
					'label'       => esc_html__( 'Social Profile', 'xfolio' ),
					'default'     => '',
				],
				'xfolio-social-link'    => [
					'type'        => 'url',
					'label'       => esc_html__( 'Social Link', 'xfolio' ),
					'default'     => '',
				],
			],
		]
	);

	// FOOTER CONTROLLERS
	new \Kirki\Section(
		'xfolio-footer-section',
		[
			'title'       => esc_html__('Footer Settings', 'xfolio'),
			'description' => esc_html__('Footer contact information and social profiles.', 'xfolio'),
			'panel'       => 'xfolio',
			'priority'    => 180,
		]
	);

	// Footer Background
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_footer_background',
			'label'       => esc_html__('Footer Background', 'xfolio'),
			'section'     => 'xfolio_styles',
			'default'     => [
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'no-repeat',
				'background-position'   => 'center center',
				'background-size'       => 'cover',
				'background-attachment' => 'scroll',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'footer',
				]
			],
		]
	);

	// Footer Padding
	new \Kirki\Field\Dimensions(
		[
			'settings'    => 'xfolio_footer_padding',
			'label'       => esc_html__('Footer Padding', 'xfolio'),
			'section'     => 'xfolio_footer_styles',
			'default'     => [
				'padding-top'    => '60px',
				'padding-bottom' => '60px',
				'padding-left'   => '20px',
				'padding-right'  => '20px',
			],
			'priority'    => 20,
		]
	);

	// Contact Info Typography
	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_footer_contact_typography',
			'label'       => esc_html__('Contact Info Typography', 'xfolio'),
			'section'     => 'xfolio_footer_styles',
			'default'     => [
				'font-family'     => 'Inter',
				'variant'         => 'regular',
				'font-size'       => '16px',
				'line-height'     => '1.5',
				'letter-spacing'  => '0',
				'text-transform'  => 'none',
				'text-align'      => 'left',
			],
			'priority'    => 30,
		]
	);

	// Contact Links Color
	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_footer_contact_color',
			'label'      => esc_html__('Contact Links Color', 'xfolio'),
			'section'    => 'xfolio_footer_styles',
			'default'    => '#333333',
			'priority'   => 40,
		]
	);

	// Contact Links Hover Color
	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_footer_contact_hover_color',
			'label'      => esc_html__('Contact Links Hover Color', 'xfolio'),
			'section'    => 'xfolio_footer_styles',
			'default'    => '#007bff',
			'priority'   => 50,
		]
	);

	// Social Icons Size
	new \Kirki\Field\Slider(
		[
			'settings'    => 'xfolio_social_icons_size',
			'label'      => esc_html__('Social Icons Size', 'xfolio'),
			'section'    => 'xfolio_footer_styles',
			'default'    => 24,
			'choices'    => [
				'min'    => 16,
				'max'    => 48,
				'step'   => 1,
			],
			'priority'   => 60,
		]
	);

	// Social Icons Spacing
	new \Kirki\Field\Slider(
		[
			'settings'    => 'xfolio_social_icons_spacing',
			'label'      => esc_html__('Space Between Social Icons', 'xfolio'),
			'section'    => 'xfolio_footer_styles',
			'default'    => 20,
			'choices'    => [
				'min'    => 10,
				'max'    => 50,
				'step'   => 5,
			],
			'priority'   => 70,
		]
	);

	// Footer Contact Info
	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio_footer_email',
			'label'    => esc_html__('Contact Email', 'xfolio'),
			'section'  => 'xfolio-footer-section',
			'default'  => 'contact@yourdomain.com',
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'xfolio_footer_phone',
			'label'    => esc_html__('Contact Phone', 'xfolio'),
			'section'  => 'xfolio-footer-section',
			'default'  => '+1234567890',
			'priority' => 20,
		]
	);

	// Social Profiles Repeater
	new \Kirki\Field\Repeater(
		[
			'settings'     => 'xfolio_social_profiles',
			'label'        => esc_html__('Social Profiles', 'xfolio'),
			'section'      => 'xfolio-footer-section',
			'priority'     => 30,
			'row_label'    => [
				'type'  => 'field',
				'value' => esc_html__('Social Profile', 'xfolio'),
				'field' => 'platform',
			],
			'button_label' => esc_html__('Add Social Profile', 'xfolio'),
			'fields'       => [
				'platform' => [
					'type'        => 'select',
					'label'       => esc_html__('Platform', 'xfolio'),
					'default'     => 'linkedin',
					'choices'     => [
						'linkedin'   => esc_html__('LinkedIn', 'xfolio'),
						'instagram'  => esc_html__('Instagram', 'xfolio'),
						'facebook'   => esc_html__('Facebook', 'xfolio'),
						'twitter'    => esc_html__('Twitter', 'xfolio'),
						'behance'    => esc_html__('Behance', 'xfolio'),
					],
				],
				'url' => [
					'type'        => 'text',
					'label'       => esc_html__('Profile URL', 'xfolio'),
					'default'     => '',
				],
			],
		]
	);

	// Hero Section Styles
	new \Kirki\Field\Dimensions(
		[
			'settings'    => 'xfolio_home_hero_padding',
			'label'       => esc_html__('Hero Section Padding', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'padding-top'    => '100px',
				'padding-bottom' => '100px',
			],
		]
	);

	// Greeting Typography
	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_greeting_typography',
			'label'       => esc_html__('Greeting Typography', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '48px',
				'line-height'    => '1.2',
				'letter-spacing' => '-0.02em',
				'color'          => '#333333',
			],
		]
	);

	// Name Typography
	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_name_typography',
			'label'       => esc_html__('Name Typography', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '56px',
				'line-height'    => '1.2',
				'letter-spacing' => '-0.02em',
				'color'          => '#000000',
			],
		]
	);

	// Profession Typography
	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_profession_typography',
			'label'       => esc_html__('Profession Typography', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '600',
				'font-size'      => '24px',
				'line-height'    => '1.4',
				'color'          => '#666666',
			],
		]
	);

	// Description Typography
	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_home_description_typography',
			'label'       => esc_html__('Description Typography', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => 'regular',
				'font-size'      => '18px',
				'line-height'    => '1.6',
				'color'          => '#666666',
			],
		]
	);

	// Contact Button Styles
	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_home_button_bg_color',
			'label'       => esc_html__('Contact Button Background', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => '#007bff',
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'home',
				]
			],
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_home_button_text_color',
			'label'       => esc_html__('Contact Button Text Color', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => '#ffffff',
		]
	);

	new \Kirki\Field\Dimensions(
		[
			'settings'    => 'xfolio_home_button_padding',
			'label'       => esc_html__('Contact Button Padding', 'xfolio'),
			'section'     => 'xfolio_home_styles',
			'default'     => [
				'padding-top'    => '12px',
				'padding-bottom' => '12px',
				'padding-left'   => '24px',
				'padding-right'  => '24px',
			],
		]
	);

	// About Page Controls
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_about_background',
			'label'       => esc_html__('Page Background', 'xfolio'),
			'section'     => 'xfolio_about_styles',
			'default'     => [
				'background-color' => '#ffffff',
			],
			'active_callback' => [
				[
					'setting'  => 'style_sections',
					'operator' => '===',
					'value'    => 'about',
				]
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_about_heading_typography',
			'label'       => esc_html__('Section Headings', 'xfolio'),
			'section'     => 'xfolio_about_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '36px',
				'line-height'    => '1.2',
				'color'          => '#333333',
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_about_text_typography',
			'label'       => esc_html__('Content Text', 'xfolio'),
			'section'     => 'xfolio_about_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => 'regular',
				'font-size'      => '16px',
				'line-height'    => '1.6',
				'color'          => '#666666',
			],
		]
	);

	// Portfolio Page Controls
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_portfolio_background',
			'label'       => esc_html__('Page Background', 'xfolio'),
			'section'     => 'xfolio_portfolio_styles',
			'default'     => [
				'background-color' => '#f8f9fa',
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_portfolio_title_typography',
			'label'       => esc_html__('Portfolio Title', 'xfolio'),
			'section'     => 'xfolio_portfolio_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '600',
				'font-size'      => '24px',
				'line-height'    => '1.3',
				'color'          => '#333333',
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_portfolio_desc_typography',
			'label'       => esc_html__('Portfolio Description', 'xfolio'),
			'section'     => 'xfolio_portfolio_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => 'regular',
				'font-size'      => '16px',
				'line-height'    => '1.5',
				'color'          => '#666666',
			],
		]
	);

	// Contact Page Controls
	new \Kirki\Field\Background(
		[
			'settings'    => 'xfolio_contact_background',
			'label'       => esc_html__('Page Background', 'xfolio'),
			'section'     => 'xfolio_contact_styles',
			'default'     => [
				'background-color' => '#ffffff',
			],
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_contact_heading_typography',
			'label'       => esc_html__('Contact Heading', 'xfolio'),
			'section'     => 'xfolio_contact_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => '700',
				'font-size'      => '36px',
				'line-height'    => '1.2',
				'color'          => '#333333',
			],
		]
	);

	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_contact_form_bg',
			'label'       => esc_html__('Form Background', 'xfolio'),
			'section'     => 'xfolio_contact_styles',
			'default'     => '#f8f9fa',
		]
	);

	new \Kirki\Field\Typography(
		[
			'settings'    => 'xfolio_contact_form_typography',
			'label'       => esc_html__('Form Fields Typography', 'xfolio'),
			'section'     => 'xfolio_contact_styles',
			'default'     => [
				'font-family'    => 'Inter',
				'variant'        => 'regular',
				'font-size'      => '16px',
				'line-height'    => '1.5',
				'color'          => '#495057',
			],
		]
	);

	// Add these to your existing footer styles if needed
	new \Kirki\Field\Color(
		[
			'settings'    => 'xfolio_footer_border_color',
			'label'       => esc_html__('Footer Border Color', 'xfolio'),
			'section'     => 'xfolio_footer_styles',
			'default'     => '#eeeeee',
		]
	);

	new \Kirki\Field\Dimension(
		[
			'settings'    => 'xfolio_footer_border_width',
			'label'       => esc_html__('Footer Border Width', 'xfolio'),
			'section'     => 'xfolio_footer_styles',
			'default'     => '1px',
		]
	);
} else {
	// Optional: Add a notice in the admin area
	add_action( 'admin_notices', function() {
		echo '<div class="notice notice-error"><p>';
		echo esc_html__( 'This theme requires the Kirki Customizer Framework plugin to be installed and activated.', 'xfolio' );
		echo '</p></div>';
	});
}