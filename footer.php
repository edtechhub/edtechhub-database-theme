<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage ETHDB
 * @since EdTech Hub Database 0.1
 */

?>
      </div>
      <div id="myOverlay" class="overlay">
        <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
        <div class="overlay-content">
          <form name="searchform" action="/">
            <input type="text" placeholder="Search" autofocus name="s" value="<?php echo (isset($_GET['s']) ? $_GET['s'] : '' ); ?>">
          </form>
        </div>
      </div>
    </main>

    <footer>
      <div class="container">
        <div class="row brand-row">
          <div class="col-sm-12 col-lg-6">
            <div class="brand">
              <p class="brand-name">EdTech Hub is supported by</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="supported-by">
              <ul>
                <li><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/logos/uk-aid.png" class="ukaid" alt="UKaid - from the British people"></li>
                <li><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/logos/world-bank.png" class="wb" alt="World Bank Group"></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-lg-12 disclaimer">
            <span class="">The findings, interpretations, and conclusions expressed in the content on this site do not necessarily reflect the views of the UK government or the World Bank, the Executive Directors of the World Bank, or the governments they represent.</span>
          </div>
        </div>
      </div>
      <div class="row copyright">
        <div class="col-sm-12 col-lg-12">
          <p><a href="https://edtechhub.org/">EDTECH HUB <?php echo Date('Y'); ?>.</a> Creative Commons Attribution 4.0 International License.</p>
        </div>
      </div>
    </footer>

		<?php wp_footer(); ?>
	</body>
</html>
