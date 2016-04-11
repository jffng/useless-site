<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package useless
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'useless' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
       <a href="/" class="logo"><img src="/app/themes/useless/logo.png" alt="Useless Press"></a> 
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'useless' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->


    <p>high-quality internet things</p>

    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup">
      <form action="//uselesspress.us11.list-manage.com/subscribe/post?u=37332dac8fb4d08bd57d762d5&amp;id=d763377437" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">

          <div class="mc-field-group">
            <label for="mce-EMAIL">SUBSCRIBE TO OUR NEWSLETTER: </label>
            <input type="email" value="" placeholder="EMAIL ADDRESS" name="EMAIL" class="required email" id="mce-EMAIL">
            <input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
          <div style="position: absolute; left: -5000px;"><input type="text" name="b_37332dac8fb4d08bd57d762d5_d763377437" tabindex="-1" value=""></div>
        </div>
      </form>
    </div>
    <!--End mc_embed_signup-->
	</header><!-- #masthead -->

  <hr />

	<div id="content" class="site-content">
