<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
    <?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/close.svg' ); ?>
    </button>
  </div>
  <div class="offcanvas-body">
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'side-menu',
            'menu_class'     => 'side-menu', // You can add any class here to customize
          )
        );
      ?>
  </div>
</div>