<footer id="footer" class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-8 site-info">
          <div class="footer-address">
              <?php echo wpautop(get_option('footer_address')); ?>
          </div>
      </div>
        <?php $facebook_js = get_option('facebook_js_widget');
        if ($facebook_js) {
            echo '<!-- Facebook widget JS -->';
            echo $facebook_js;
            echo '<!-- End Facebook widget JS -->';
        } ?>
        <?php $facebook_html = get_option('facebook_widget');
        if ($facebook_html) {
            echo '<div class="col-md-4"><div class="facebook-widget">';
            echo $facebook_html;
            echo '</div></div>';
        } ?>
    </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-center clearfix">
              <p><small>Copyright © <?php echo date("Y"); ?> <br>
                      Website by <a href="http://creatistic.com.au/" target="_blank">Creatistic</a></small></p>
          </div>
      </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>