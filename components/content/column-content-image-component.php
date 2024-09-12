<?php 
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $flip_image = get_sub_field('flip_image');
    $image_ratio = get_sub_field('image_ratio');
    $button = get_sub_field('button');

    $section_id = get_sub_field('section_id');
?>
<section class="content-section with-image <?php if($flip_image){echo 'flip-image';}?>" >
    <div class="container">
        <div class="row g-5">
            <div class="col-md-6 content-side">
                <div class="content">
                    <?php echo $content; ?>
                    <?php if($button){ echo '<a target="'.$button['target'].'" class="btn" href="'.$button['url'].'">'.$button['title'].'</a>'; } ?>
                </div>
            </div>
            <div class="col-md-6 image-side <?php if($image_ratio){echo 'image-ratio';}?>">
                <img src="<?php echo $image['url']; ?>" alt="">
            </div>
        </div>
    </div>
</section>