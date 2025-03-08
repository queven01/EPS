<?php 
$slides = get_field('slider_home');
?>
<?php if($slides): ?>
<section class="image-slider">
      <!-- Swiper -->
  <div class="swiper sliderWithOnlyImage">
    <div class="swiper-wrapper">
        <?php foreach($slides as $slide): 
            $desktop_size_image = $slide['desktop_size_image'];
            $mobile_size_image = $slide['mobile_size_image'];
            $link = $slide['link'];?>
            <div class="swiper-slide">
                <?php if($link){ echo '<a href="'. $link['url'] .'">';}?>
                    <?php if($desktop_size_image){ echo '<img class="desktop-slide" src="'. $desktop_size_image['url'] .'" alt="">';}?>
                    <?php if($mobile_size_image){ echo '<img class="mobile-slide" src="'. $mobile_size_image['url'] .'" alt="">';}?>
                <?php if($link){ echo '</a>';}?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next flip"><?php echo file_get_contents( get_template_directory_uri() . '/assets/images/icons/arrow-slider.svg' ); ?></div>
    <div class="swiper-button-prev"><?php echo file_get_contents( get_template_directory_uri() . '/assets/images/icons/arrow-slider.svg' ); ?></div>
  </div>
</section>
<?php endif; ?>