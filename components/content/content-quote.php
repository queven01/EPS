<?php
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $name = get_sub_field('name');
    $flip_image = get_sub_field('flip_image');
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>"  class="content-section quote <?php if($flip_image){echo 'flip-image ';} ?>" >
    <div class="container">
        <?php if($title): echo '<h3 class="title wow animate__animated animate__fadeInLeft">'.$title.'</h3>'; endif;?>
        <div class="row g-5">
            <div class="col-md-6 content-side">
                <div class="content">
                    <div class="quote-icon">
                        <?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/quote.svg' ); ?>
                    </div>
                    <div class="quote-section">
                        <?php echo $content; ?>
                        <h4 class="title"><?php echo $name; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 image-side <?php if($image_ratio){echo 'image-ratio';}?>">
                <?php if($image): ?><img src="<?php echo $image['url']; ?>" alt=""><?php endif; ?>
            </div>
        </div>
    </div>
</section>