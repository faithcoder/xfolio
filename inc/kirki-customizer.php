<?php 

new \Kirki\Panel(
	'xfolio',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Xfolio Options', 'kirki' ),
		'description' => esc_html__( 'Xfolio Description.', 'kirki' ),
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