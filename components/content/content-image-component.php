<?php
    $title = get_sub_field('title'); 
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $image_2 = get_sub_field('image_2');
    $flip_image = get_sub_field('flip_image');
    $image_ratio = get_sub_field('image_ratio');
    $button = get_sub_field('button');

    $bg_image = get_sub_field('background_image');
    $section_id = get_sub_field('section_id');
    $style_selector = get_sub_field('style_selector');
?>
<section class="content-section with-image <?php if($flip_image){echo 'flip-image ';} echo $style_selector; ?>" >
    <div class="container">
        <?php if($title): echo '<h3 class="title">'.$title.'</h3>'; endif;?>
        <div class="row g-5">
            <div class="col-md-6 content-side">
                <div class="content">
                    <?php echo $content; ?>
                    <?php if($button){ echo '<a target="'.$button['target'].'" class="btn" href="'.$button['url'].'">'.$button['title'].'</a>'; } ?>
                </div>
            </div>
            <div class="col-md-6 image-side <?php if($image_ratio){echo 'image-ratio';}?>">
                <?php if($image): ?><img src="<?php echo $image['url']; ?>" alt=""><?php endif; ?>
                <?php if($image_2): ?><img src="<?php echo $image_2['url']; ?>" alt=""><?php endif; ?>
            </div>
        </div>
    </div>
    <?php if($bg_image): ?><img class="bg-image" src="<?php echo $bg_image['url']; ?>" alt=""><?php endif; ?>
</section>