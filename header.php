<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<!--[if IE 9]>    <html class="no-js ie9 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
		<meta name="theme-color" content="#a72535">
		<?php wp_head(); ?>
		<script src="https://use.typekit.net/bzj8eoq.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>

		<link rel="icon" sizes="192x192" href="<?php bloginfo('url'); ?>/wp-content/uploads/2016/08/favicon.png">
		<?php if( get_theme_mod('analytics')): ?><?php echo get_theme_mod('analytics','default'); ?><?php endif; ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- <div id="preloader" style="position: fixed; left: 0; top: 0; z-index: 9999999; width: 100%; height: 100%; overflow: visible; background: #FFF;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-stacked-black.svg" width="600" class="preloader-logo"></div> -->
		<script>window.fbAsyncInit = function() { FB.init({ appId: '317466291976025', xfbml: true, version: 'v2.5' }); };
    (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/sdk.js"; fjs.parentNode.insertBefore(js, fjs); } (document, 'script', 'facebook-jssdk'));
    function fb_share() { FB.ui({ method: 'share', href: '<?php the_permalink(); ?>' },
        function(response) { if (response && !response.error_code) {
              // window.location = "http://imintohire.org/thank-you-for-sharing-on-facebook/"
            } else { } }); }
    </script>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php function customFShare() {
        $like_results = file_get_contents('http://graph.facebook.com/'. get_permalink());
        $like_array = json_decode($like_results, true);
        $like_count =  $like_array['shares'];
        return ($like_count ) ? $like_count : "0";
    } ?>

	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>

	<header id="masthead" class="site-header <?php if( get_theme_mod( 'sticky-header' ) != '') { ?>sticky-header<?php } ?>" role="banner">
		<div class="header-inner max-width-eleven-seventy">
			<div class="top-bar-top">
				<div class="logo-wrapper hide-for-small-only">
					<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
				</div>
				<div class="title-bar" data-responsive-toggle="site-navigation">
					<div class="title-bar-title">
						<?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
					</div>
					<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
				</div>

				<div class="top-bar-right">
					<?php foundationpress_secondary_nav(); ?>
					<?php if( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('linkedin') || get_theme_mod('instagram') || get_theme_mod('youtube') || get_theme_mod('pinterest') || get_theme_mod('rss') || get_theme_mod('vimeo')) { ?>
					<div class="top-bar-social">
						<?php get_template_part('template-parts/social-media'); ?>
					</div>
					<?php } ?>
					<div class="top-bar-search">
						<button class="searchform-trigger"><i class="fa fa-search" aria-hidden="true"></i></button>
						<div class="searchform-wrapper">
							<?php get_search_form(); ?>
						</div>
					</div>
					<div class="top-bar-translate">
						<div id="google_translate_element"></div><script type="text/javascript">
						function googleTranslateElementInit() {
						  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ar,de,en,es,fr,hi,it,ja,nl,pl,pt,ro,ru,sv,th,uk,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
						}
						</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
					</div>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
				<div class="top-bar-bottom">
					<?php foundationpress_top_bar_r(); ?>

					<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
						<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
