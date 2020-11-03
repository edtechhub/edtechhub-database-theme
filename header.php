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
    <link property="stylesheet" rel='stylesheet' id='tp-fontello-css'  href='https://edtechhub.org/wp-content/plugins/essential-grid/public/assets/font/fontello/css/fontello.css?ver=3.0.7' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='ekoterra-icons-css'  href='https://edtechhub.org/wp-content/themes/edtechhub/css/font-icons/css/fontello-embedded.css' type='text/css' media='all' />

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-3">
            <div class="brand">
				<?php
				$logo_url = get_bloginfo( 'template_directory' )."/logos/logo.png";
				echo '<a href="/"><img src="'. esc_url( $logo_url) .'" width="200" title="'. get_bloginfo( 'name' ) .'" alt="'. get_bloginfo( 'name').'" /></a>';
				?>
            </div>
          </div>
          <div class="col-sm-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <?php wp_nav_menu(array(
                  'menu' => 'ethdb-header-menu',
                  'menu_class' => 'navbar-nav',
                  'depth' => 2
                )); ?>
              </div>
            <form role="search" method="get" id="searchform" class="searchform" action="/">
              <div>
                <input type="text" name="s" id="s" placeholder="Search …">
              </div>
            </form>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <main id="site-content" role="main">
      <div class="container">
