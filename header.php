<?php
/**
 * Header file for the ETHDB theme.
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>
    <div class="prototype-bar">
      <div class="container">
        <p><span class="badge badge-prototype">PROTOTYPE</span> <strong>This is a prototype.</strong> We're continually improving the information on this site. Please <a href="/feedback" title="send us feedback">give us feedback</a>.</p>
      </div>
    </div>

    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-6">
            <div class="brand">
				<?php
				$logo_url = "https://database.edtechhub.org/wp-content/uploads/2020/09/EdTech-Hub-Logo-W-Tagline.png";
				echo '<img src="'. esc_url( $logo_url) .'" width="200" title="'. get_bloginfo( 'name' ) .'" alt="'. get_bloginfo( 'name').'" />';
				?>
            </div>
          </div>
          <div class="col">
            <p class="site-name"><a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a></p>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <?php wp_nav_menu(array(
              'menu' => 'ethdb-header-menu',
              'menu_class' => 'navbar-nav',
              'depth' => 1
            )); ?>
          </div>
          <?php get_search_form(); ?>
        </nav>
      </div>
    </header>
    <main id="site-content" role="main">
      <div class="container">
