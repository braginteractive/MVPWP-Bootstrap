<?php
/**
 * MVPWP Theme Customizer.
 *
 * @package MVPWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mvpwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'mvpwp_customize_register' );


/**
* Add the configuration.
* This way all the fields using the 'mvpwp_opt' ID
* will inherit these options
*/
MVPWP_Kirki::add_config( 'mvpwp_opt', array(
  'capability'    => 'edit_theme_options',
  'option_type'   => 'theme_mod',
) );

/** Add sections */
MVPWP_Kirki::add_section( 'blog_settings', array(
    'title'          => __( 'Blog' ),
    'description'    => __( 'Settings for the blog layout.' ),
    'panel'          => '', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

MVPWP_Kirki::add_field( 'mvpwp_opt', array(
  'type'        => 'switch',
  'settings'    => 'tag_switch',
  'label'       => __( 'Enable/Disable Tags', 'mvpwp' ),
  'section'     => 'blog_settings',
  'default'     => '1',
  'priority'    => 10,
  'choices'     => array(
    'on'  => esc_attr__( 'Enable', 'mvpwp' ),
    'off' => esc_attr__( 'Disable', 'mvpwp' ),
  ),
) );


