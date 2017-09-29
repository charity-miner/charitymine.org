    <!-- Footer -->
    <footer id="footer" class="py-5 bg-dark">
      <div class="container">
        <?php
        wp_nav_menu( array(
          'menu'              => 'footer',
          'theme_location'    => 'footer',
          'depth'             => 1,
          'container'         => 'div',
          'container_class'   => '',
          'container_id'      => 'footer-nav',
        ));
        ?>
        <center>
          <div class="fb-like" data-href="https://www.charitymine.org" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
        </center>
      </div>
      <!-- /.container -->
    </footer>

    <?php wp_footer(); ?>

  </body>
</html>