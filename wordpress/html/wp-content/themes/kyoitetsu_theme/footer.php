      <footer class="footer">
        <p class="footer__txt"><small class="footer__copy">Copyright &copy; 2021 Fair Consulting Group. All Rights Reserved.</small></p>
      </footer>
      <?php wp_footer(); ?>
    </div>
    <?php 
      $url = home_url();
    ?>
    <script src="<?php echo esc_url( $url ); ?>/wp-content/themes/kyoitetsu_theme/_assets/js/vendor-03826a0ba54327becd5c.js"></script>
    <script src="<?php echo esc_url( $url ); ?>/wp-content/themes/kyoitetsu_theme/_assets/js/app-4c73c4e4a164e78acaa0.js"></script>
    <script src="<?php echo esc_url( $url ); ?>/wp-content/themes/kyoitetsu_theme/slick/slick.min.js"></script>
    <script>
      jQuery('.news_carousel').slick({
        autoplay: true
      });
    </script>
  </body>
</html>