<?php
    $title = get_sub_field('title'); 
    $content = get_sub_field('content');
    $video = get_sub_field('video');
    $video_link = get_sub_field('video_link');
    $flip_image = get_sub_field('flip_image');
    $image_ratio = get_sub_field('image_ratio');

    $style_selector = get_sub_field('style_selector');
?>
<section class="content-section media <?php if($flip_image){echo 'flip-image ';} echo $style_selector; ?>" >
    <div class="container">
        <div class="row">
            <div class="col-md-5 content-side">
                <div class="content">
                    <?php if($title): echo '<h3>'.$title.'</h3>'; endif;?>
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="col-md-7 image-side <?php if($image_ratio){echo 'image-ratio';}?>">
            <?php
                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $video_link, $matches);
                $src = $matches[1];

                // Add extra parameters to src and replace HTML.
                $params = array(
                    'controls'  => 0,
                    'hd'        => 1,
                    'autohide'  => 1
                );
                $new_src = add_query_arg($params, $src);
                $video_link = str_replace($src, $new_src, $video_link);

                // Add extra attributes to iframe HTML.
                $attributes = 'frameborder="0"';
                $video_link = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $video_link);

                // Display customized HTML.
                echo $video_link;
                ?>
            </div>
        </div>
    </div>
</section>