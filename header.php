<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package morocco
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&amp;display=swap&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" async type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css "/>
    <link rel="stylesheet" async type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
	  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link rel="stylesheet" async media="all" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_url');  ?>/assets/dist/css/style.css?v1.1cc">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- generics -->
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-32.png" sizes="32x32">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-57.png" sizes="57x57">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-76.png" sizes="76x76">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-96.png" sizes="96x96">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-144.png" sizes="144x144">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-180.png" sizes="180x180">
    <link rel="icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-228.png" sizes="228x228">

    <!-- Android -->
    <link rel="shortcut icon" sizes="192x192" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-192.png">

    <!-- iOS -->
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/apple-icon-120x120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/apple-icon-152x152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url');  ?>/assets/images/favicon/apple-icon-180x180.png" sizes="180x180">

    <!-- Windows 8 IE 10-->
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url');  ?>/assets/images/favicon/favicon-144.png">

	<?php wp_head(); 
    $lang = get_locale();
    // sk_SK
    // en_GB
  ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'morocco' ); ?></a>
	<header class="header main-header"> 
      <div class="container">
        <nav class="navbar navbar-expand-lg  "> 
          <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
            <img src="<?php bloginfo('template_url');  ?>/assets/images/logo-morocco.png" width="170px" alt="">
          </a>
          <button class="navbar-toggler hamburger hamburger--squeeze" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger-box">
              <div class="hamburger-inner"></div>
            </div>
          </button>

		  <?php  

			if( has_nav_menu( 'menu-1' ))
			wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_class' => 'navbar-nav mx-auto',
			'depth' => 1,
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id' => 'navbarContent',
			'walker' => new own_Walker()
			) ); 
			
			?> 

			<div class="social">
              <a href="">
                <img src="<?php bloginfo('template_url');  ?>/assets/images/ico_fb.svg" alt="">
              </a>
              <a href="">
                <img src="<?php bloginfo('template_url');  ?>/assets/images/ico_ig.svg" alt="">
              </a>
              <!-- <div class="dropdown">
                <button class="btn btn__white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php 
                  if($lang == 'sk_SK') {
                    pll_e('Slovensky');
                  } else {
                    pll_e('Anglicky');
                  }
                ?> 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="/"><?php pll_e('Slovensky'); ?> </a>
                  <a class="dropdown-item" href="/en"><?php pll_e('Anglicky'); ?> </a> 
                </div>
              </div> -->
              <?php echo do_shortcode('[gtranslate]'); ?>
            </div>

          	 
        </nav>
        
      </div>
    </header>