<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>

		<a class="skip-link button" href="#site-content"><?php _e( 'Skip to the content', 'FuwaFuwa' ); ?></a>
		
		<div class="navigation">
			
			<div class="section-inner">
				
				<ul class="main-menu">
																		
					<?php 
					if ( has_nav_menu( 'primary' ) ) {

						$nav_args = array( 
							'container' 		=> '',
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary',
						);
																		
						wp_nav_menu( $nav_args );

					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> ''
						);

						wp_list_pages( $list_pages_args );

					} 
					?>
					
				</ul>
				
			</div><!-- .section-inner -->
			
			<!-- <button type="button" class="nav-toggle"> -->
				<div class="nav-toggle">
					<!-- <div> -->
					<!-- <<?php //echo $site_title_elem; ?> class="blog-title">> -->
						<?php if ( get_theme_mod( 'custom_logo' ) ) : ?>
							<div>
								<?php FuwaFuwa_custom_logo(); ?>
							</div>
						<?php else : ?>
							<div>
								<a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'title' ) ); ?></a>
							</div>
						<?php endif; ?>
					<!-- </<?php //echo $site_title_elem; ?>> -->
					<!-- </div> -->

					<!-- <div class="bars">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</div> -->
					<div class="mobile-navigation">
			
						<ul class="mobile-menu">
																					
							<?php 
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( $nav_args );
							} else {
								wp_list_pages( $list_pages_args );
							}
							?>
							
						</ul>
						
						<?php //get_search_form(); ?>
					
					</div><!-- .mobile-navigation -->
				</div>
					
				
				
			<!-- </button>.nav-toggle -->
			
			
			
		</div><!-- .navigation -->

		<!-- <?php //$image_image_url = get_header_image() ? get_header_image() : get_template_directory_uri() . '/assets/images/bg.jpg'; ?> -->
		
		<!-- <div class="header-image" ></div> -->

		<main id="site-content">