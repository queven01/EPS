<?php
    $image_gallery = get_field('image_gallery');
?> 

<section class="gallery-images">
    <div class="row g-2">
        <?php foreach($image_gallery as $image):?>
            <div class="image-container col-12 col-md-4">
                <img src="<?php echo $image['url']?>" alt="">
            </div>
        <?php endforeach; ?>
    </div>
</section>