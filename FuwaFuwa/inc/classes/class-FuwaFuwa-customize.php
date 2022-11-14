<?php

/* ---------------------------------------------------------------------------------------------
   CUSTOMIZER SETTINGS
   --------------------------------------------------------------------------------------------- */


if ( ! class_exists( 'FuwaFuwa_Customize' ) ) :
	class FuwaFuwa_Customize {

		public static function register( $wp_customize ) {

			// FuwaFuwa theme options section
			$wp_customize->add_section( 'FuwaFuwa_options', array(
				'title' 		=> __( 'Theme Options', 'FuwaFuwa' ),
				'priority' 		=> 35,
				'capability' 	=> 'edit_theme_options',
				'description' 	=> __( 'Customize the theme settings for FuwaFuwa.', 'FuwaFuwa' ),
			) );

			/* Retina Logo ------------------- */

			$wp_customize->add_setting( 'FuwaFuwa_retina_logo', array(
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback' => 'FuwaFuwa_sanitize_checkbox',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( 'FuwaFuwa_retina_logo', array(
				'type' 			=> 'checkbox',
				'section' 		=> 'title_tagline',
				'priority'		=> 9,
				'label' 		=> __( 'Retina logo', 'FuwaFuwa' ),
				'description' 	=> __( 'Scales the logo to half its uploaded size, making it sharp on high-res screens.', 'FuwaFuwa' ),
			) );

			/* Always show titles ------------ */

			$wp_customize->add_setting( 'FuwaFuwa_show_titles', array(
				'capability' 		=> 'edit_theme_options',
				'sanitize_callback' => 'FuwaFuwa_sanitize_checkbox',
				'transport'			=> 'postMessage'
			) );

			$wp_customize->add_control( 'FuwaFuwa_show_titles', array(
				'type' 			=> 'checkbox',
				'section' 		=> 'FuwaFuwa_options', 
				'label' 		=> __( 'Show Preview Titles', 'FuwaFuwa' ),
				'description' 	=> __( 'Check to always show the titles in the post previews.', 'FuwaFuwa' ),
			) );

			/* Custom accent color ----------- */

			$wp_customize->add_setting( 'FuwaFuwa_accent_color', array(
				'default' 			=> '#3bc492',
				'type' 				=> 'theme_mod',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'FuwaFuwa_accent_color', array(
				'label' 	=> __( 'Accent Color', 'FuwaFuwa' ), 
				'section' 	=> 'colors',
				'settings' 	=> 'FuwaFuwa_accent_color', 
			) ) );


			/* Sanitation -------------------- */

			// Sanitize boolean for checkbox
			function FuwaFuwa_sanitize_checkbox( $checked ) {
				return ( ( isset( $checked ) && true == $checked ) ? true : false );
			}

		}

		// Generate header output
		public static function get_inline_style() {

			$accent_default = '#3bc492';
			$accent_color = get_theme_mod( 'FuwaFuwa_accent_color', $accent_default );

			// Only output if set to a custom color.
			if ( $accent_color == $accent_default ) return;

			$css_data = array(
				'background-color' 	=> 'input[type="submit"], input[type="button"], input[type="reset"], :root .has-accent-background-color, .button, :root .wp-block-file__button, :root .wp-block-button__link, :root .wp-block-search__button, .page-links a:hover, .form-submit #submit, #infinite-handle:hover, .nav-toggle.active .bar, .social-menu a:hover',
				'border-color' 		=> 'input:focus, textarea:focus',
				'color' 			=> 'a, .blog-title a:hover, .post-content p.pull, :root .has-accent-color, .comments .pingbacks li a:hover, .comment-header h4 a:hover, .comment-title .url:hover, .archive-nav a:hover, .credits p:first-child a:hover, .mobile-menu a:hover, :root .is-style-outline .wp-block-button__link, :root .wp-block-button__link.is-style-outline',
			);

			$css_string = '';

			foreach ( $css_data as $property => $selectors ) {
				$css_string .= self::generate_css( $selectors, $property, $accent_color );
			}

			return $css_string;

		}

		public static function generate_css( $selector, $style, $value ) {
			if ( ! $value ) return;
			return sprintf( '%s { %s:%s; }', $selector, $style, $value );
		}
	}

	// Setup the Theme Customizer settings and controls...
	add_action( 'customize_register', array( 'FuwaFuwa_Customize', 'register' ) );

endif;