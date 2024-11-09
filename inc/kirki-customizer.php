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
	'xfolio-section',
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
		'section'     => 'xfolio-section',
		'default'     => '',
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'first-name',
		'label'    => esc_html__( 'First Name', 'xfolio' ),
		'section'  => 'xfolio-section',
		'default'  => esc_html__( 'Your first name', 'xfolio' ),
		'priority' => 10,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'last-name',
		'label'    => esc_html__( 'Last Name', 'xfolio' ),
		'section'  => 'xfolio-section',
		'default'  => esc_html__( 'Your last name', 'xfolio' ),
		'priority' => 10,
	]
);
new \Kirki\Field\Text(
	[
		'settings' => 'profession-name',
		'label'    => esc_html__( 'Profession Name', 'xfolio' ),
		'section'  => 'xfolio-section',
		'default'  => esc_html__( 'Your profession', 'xfolio' ),
		'priority' => 10,
	]
);