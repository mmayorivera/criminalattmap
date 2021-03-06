<?php

add_action( 'customize_register', 'va_customize_color_scheme' );
add_action( 'customize_register', 'va_customize_listings' );
add_action( 'customize_register', 'va_customize_categories' );


/**
 * Adds Color Scheme option into WP Customizer.
 *
 * @return void
 */
function va_customize_color_scheme( $wp_customize ) {
	global $va_options;

	$wp_customize->add_setting( 'va_options[color]', array(
		'default' => $va_options->color,
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_color_scheme', array(
		'label'      => __( 'Color Scheme', APP_TD ),
		'section'    => 'colors',
		'settings'   => 'va_options[color]',
		'type'       => 'radio',
		'choices'    => _va_get_color_choices(),
	) );

}


/**
 * Adds Listings Per Page option into WP Customizer.
 *
 * @return void
 */
function va_customize_listings( $wp_customize ) {
	global $va_options;

	$wp_customize->add_section( 'va_listings', array(
		'title' => __( 'Listings', APP_TD ),
		'priority' => 35
	));

	$wp_customize->add_setting( 'va_options[listings_per_page]', array(
		'default' => $va_options->listings_per_page,
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_listings_per_page', array(
		'label'      => __( 'Listings Per Page', APP_TD ),
		'section'    => 'va_listings',
		'settings'   => 'va_options[listings_per_page]',
		'type'       => 'text',
	) );

}


/**
 * Adds options for Categories into WP Customizer.
 *
 * @return void
 */
function va_customize_categories( $wp_customize ) {

	va_customize_categories_options( 'categories_dir', __( 'Categories Page Options', APP_TD ), $wp_customize );
	va_customize_categories_options( 'categories_menu', __( 'Categories Menu Item Options', APP_TD ), $wp_customize );

}


/**
 * Helper function to add options for Categories into WP Customizer.
 *
 * @param string $prefix
 * @param string $title
 * @param object $wp_customize
 *
 * @return void
 */
function va_customize_categories_options( $prefix, $title, $wp_customize ) {
	global $va_options;

	$wp_customize->add_section( 'va_' . $prefix . '_categories', array(
		'title' => $title,
		'priority' => 999,
	));

	// Show count
	$wp_customize->add_setting( 'va_options[' . $prefix . '][count]', array(
		'default' => $va_options->get( array( $prefix, 'count' ) ),
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_' . $prefix . '_count', array(
		'label'      => __( 'Count Listings in Category', APP_TD ),
		'section'    => 'va_' . $prefix . '_categories',
		'settings'   => 'va_options[' . $prefix . '][count]',
		'type'       => 'checkbox',
	) );

	// Hide empty
	$wp_customize->add_setting( 'va_options[' . $prefix . '][hide_empty]', array(
		'default' => $va_options->get( array( $prefix, 'hide_empty' ) ),
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_' . $prefix . '_hide_empty', array(
		'label'      => __( 'Hide Empty Categories', APP_TD ),
		'section'    => 'va_' . $prefix . '_categories',
		'settings'   => 'va_options[' . $prefix . '][hide_empty]',
		'type'       => 'checkbox',
	) );

	// Depth
	$wp_customize->add_setting( 'va_options[' . $prefix . '][depth]', array(
		'default' => $va_options->get( array( $prefix, 'depth' ) ),
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_' . $prefix . '_depth', array(
		'label'      => __( 'Category Depth', APP_TD ),
		'section'    => 'va_' . $prefix . '_categories',
		'settings'   => 'va_options[' . $prefix . '][depth]',
		'type'       => 'select',
		'choices' => array(
			'999' => __( 'Show All', APP_TD ),
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10',
		),
	) );

	// Number of Sub-Categories
	$wp_customize->add_setting( 'va_options[' . $prefix . '][sub_num]', array(
		'default' => $va_options->get( array( $prefix, 'sub_num' ) ),
		'type' => 'option'
	) );

	$wp_customize->add_control( 'va_' . $prefix . '_sub_num', array(
		'label'      => __( 'Number of Sub-Categories', APP_TD ),
		'section'    => 'va_' . $prefix . '_categories',
		'settings'   => 'va_options[' . $prefix . '][sub_num]',
		'type'       => 'select',
		'choices' => array(
			'999' => __( 'Show All', APP_TD ),
			'0' => '0',
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10',
		),
	) );

}
