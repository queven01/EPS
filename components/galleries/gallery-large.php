<?php
    $image_gallery = get_field('image_gallery');
?> 
<?php if($image_gallery):?>
<section class="gallery-images">
    <div class="row g-2">
        <?php $i = 0; foreach($image_gallery as $image):?>
            <div class="image-container col-12 <?php if($i == 0){echo 'col-md-6';} elseif($i == 1){echo 'col-md-3';} elseif($i == 2){echo 'col-md-3';} else { echo 'col-md-4'; }?>">
                <img src="<?php echo $image['url']?>" alt="">
            </div>
        <?php $i++; endforeach; ?>
    </div>
</section>
<?php endif; ?>