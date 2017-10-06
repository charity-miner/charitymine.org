<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Facebook's SDK - for the share button -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1752758421415804";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div id="top-nav">
    <div class="container">
      <div class="row">
        <div class="left-col col-sm-4">
          <a href="https://www.facebook.com/thecharitymine/" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://twitter.com/thecharitymine" target="_blank"><i class="fa fa-twitter"></i></a>
          <a href="https://www.instagram.com/thecharitymine/" target="_blank"><i class="fa fa-instagram"></i></a>
        </div>
        <div class="right-col col-sm-8">
          <span class="currentTotalCash">You have generated: $0.00000000</span>
          <?php if (! is_user_logged_in() ) { ?>
            &nbsp;&middot;&nbsp;
            <a href="<?php echo get_home_url(); ?>/log-in">Login</a> &middot;
            <a href="<?php echo get_home_url(); ?>/register">Register</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
    <div class="container">

      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php if ( get_site_icon_url() != '' ) { ?>
          <img src="<?php echo get_site_icon_url(32); ?>" />
        <?php } ?>
        <?php bloginfo('name'); ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
      wp_nav_menu( array(
        'menu'              => 'primary',
        'theme_location'    => 'primary',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'navbar',
        'menu_class'        => 'navbar-nav ml-auto',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker())
      );
      ?>
    </div>
  </nav>
