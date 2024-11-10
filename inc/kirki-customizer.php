<?php 

new \Kirki\Panel(
	'xfolio',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Xfolio Options', 'kirki' ),
		'description' => esc_html__( 'Xfolio Description.', 'kirki' ),
	]
);

// ABOUT ME PAGE CONTROLLERS 

new \Kirki\Section(
	'xfolio-about-section',
	[
		'title'       => esc_html__( 'About Me page', 'kirki' ),
		'description' => esc_html__( 'About Me Description.', 'kirki' ),
		'panel'       => 'xfolio',
		'priority'    => 160,
	]
);

new \Kirki\Field\Image(
	[
		'settings'    => 'my-image',
		'label'       => esc_html__( 'My Image', 'kirki' ),
		'description' => esc_html__( 'My Image URL', 'kirki' ),
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
		'label'       => esc_html__( 'About Description', 'kirki' ),
		'section'     => 'xfolio-about-section',
		'default'     => esc_html__( 'Write your description', 'kirki' ),
	]
);

new \Kirki\Field\Repeater(
	[
		'settings'     => 'repeater_setting_2',
		'label'        => esc_html__( 'Academic Education', 'kirki' ),
		'section'      => 'xfolio-about-section',
		'priority'     => 10,
		'row_label'    => [
			'type'  => 'field',
			'value' => esc_html__( 'Row One', 'kirki' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__( 'Add New', 'kirki' ),
		'default'      => [
			[
				'academic_institute'   => esc_html__( 'Graduate', 'kirki' ),
				'academic_subject'    => 'https://kirki.org/',
			],
			[
				'academic_institute'   => esc_html__( 'High School', 'kirki' ),
				'academic_subject'    => 'https://wordpress.org/plugins/kirki/',
			],
		],
		'fields'       => [
			'academic_institute'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Institute Name', 'kirki' ),
				'default'     => '',
			],
			'academic_subject'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Subject Name', 'kirki' ),
				'default'     => '',
			],
			'academic_duration'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Duration', 'kirki' ),
				'default'     => '',
			],
			'academic_major'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Major', 'kirki' ),
				'default'     => '',
			],
		],
	]
);