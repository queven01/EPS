<?php 
    $gallery_items = get_sub_field('custom_posts');
    $number_of_columns = get_sub_field('number_of_columns');
    $background_color = get_sub_field('background_color');
    $masonry_grid = get_sub_field('masonry_grid');
    $section_id = get_sub_field('section_id');

    $padding = get_sub_field('padding');
    $margin = get_sub_field('margin');
?>
<section <?php echo 'id="'.$section_id.'"'?> class="masonry-gallery <?php if($margin){echo 'margin-'.$margin;}?> <?php if($padding){echo 'padding-'.$padding;}?>" style="<?php if($background_color){echo 'background-color:'.$background_color.';';}?>" >
    <div class="container">
        <?php if($masonry_grid):?>
            <div class="grid">
                <?php $i = 0; foreach($gallery_items as $item):
                    $class = "";
                    if ($i == 1){ $class = "grid-item--height2";}
                    if ($i == 2){ $class = "grid-item--height3";}
                    if ($i == 3){ $class = "grid-item--height2";}
                    if ($i == 4){ $class = "grid-item--height5";}
                    if ($i == 5){ $class = "grid-item--height2";}
                    if ($i == 6){ $class = "grid-item--height4";}
                    if ($i == 7){ $class = "grid-item--height2";}
                    if ($i == 8){ $class = "grid-item--height3";}

                    $id = $item->ID;
                    $banner_image = get_the_post_thumbnail_url($id);
                    $title = get_the_title($id);
                    $description = get_field('description', $id); 
                    ?>

                    <div class="grid-item <?php echo $class; ?>">
                        <a href="<?php echo get_permalink($id);?>">
                            <div class="content">
                                <h3><?php echo $title;?></h3>
                            </div>
                            <div class="image-container">
                                <img class="bg-image" src="<?php echo $banner_image; ?>" alt="">
                            </div>
                        </a>
                    </div>

                <?php $i++; endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
