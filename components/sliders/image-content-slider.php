<?php 
$slides = get_field('slider_with_content');
?>
<?php if($slides): ?>
<section class="slider-with-content">
      <!-- Swiper -->
  <div class="swiper sliderWithContent">
    <div class="swiper-wrapper">
        <?php foreach($slides as $slide): 
            $image = $slide['image'];
            $title = $slide['title'];
            $description = $slide['description'];
            $link = $slide['link'];?>
            <div class="swiper-slide ">
                <div class="slide-content row">
                    <div class="image-side col-md-6">
                        <img src="<?php echo $image['url']; ?>" alt="">
                    </div>
                    <div class="content-side col-md-6">
                        <div class="content-container">
                            <h1><?php echo $title; ?></h1>
                            <p><?php echo $description; ?></p>
                            <a class="btn" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next flip"><?php echo file_get_contents( get_template_directory_uri() . '/assets/images/icons/arrow-slider.svg' ); ?></div>
    <div class="swiper-button-prev"><?php echo file_get_contents( get_template_directory_uri() . '/assets/images/icons/arrow-slider.svg' ); ?></div>
  </div>
</section>
<?php endif; ?>