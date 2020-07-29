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
    </main>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-lg-8">
            <p>Content licensed under <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank" rel="noreferrer noopener">Creative Commons Attribution 4.0</a>.</p>
          </div>
          <div class="col-sm-12 col-lg-4">
            <div class="brand">
              <p class="operated-by">Operated by:</p>
              <p class="brand-name"><a href="https://edtechhub.org">The EdTech Hub</a></p>
            </div>

          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-lg-12">
            <div class="supported-by">
              <p>Supported by:</p>
              <ul>
                <li><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/logos/uk-aid.png" height="100" alt="UKaid - from the British people"></li>
                <li><img src="<?php echo get_bloginfo( 'template_directory' ); ?>/logos/world-bank.png" height="100" alt="World Bank Group"></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

		<?php wp_footer(); ?>

	</body>
</html>
