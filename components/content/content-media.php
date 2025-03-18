<?php
    $title = get_sub_field('title'); 
    $content = get_sub_field('content');
    $dropdown_content = get_sub_field('dropdown_content');
    $video = get_sub_field('video');
    $image = get_sub_field('image');
    $video_link = get_sub_field('video_link');
    $flip_image = get_sub_field('flip_image');
    $image_ratio = get_sub_field('image_ratio');
    

    $style_selector = get_sub_field('style_selector');
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>" class="content-section media <?php if($flip_image){echo 'flip-image ';} echo $style_selector; ?>" >
    <div class="container">
        <?php if($title): echo '<h3 class="title wow animate__animated animate__fadeInLeft">'.$title.'</h3>'; endif;?>
        <div class="row">
            <div class="col-md-5 content-side wow animate__animated <?php if($flip_image){echo 'animate__fadeInRight';} else { echo 'animate__fadeInLeft';}?>">
                <div class="content">
                    <?php echo $content; ?>
                    <?php if($dropdown_content): ?>

                    <div class="accordion" id="dropdown_<?php echo $key; ?>">
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo $key; ?>" aria-expanded="true" aria-controls="collapseOne">
                                Read More                            
                            </button>
                            <div id="collapse_<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#dropdown_<?php echo $key; ?>">
                                <div class="accordion-body">
                                    <?php echo $dropdown_content; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-7 image-side <?php if($image_ratio){echo 'image-ratio';}?>">
                <?php
                    if($video_link):
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
                    else:
                        $video_link = "";
                    endif;
                ?>
                <?php if($image && $video_link): ?>
                    
                     <div class="image-container" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $key; ?>">
                        <?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/play-button.svg' ); ?>
                        <img src="<?php echo $image['url']; ?>" alt="">
                     </div>

                     <!-- Modal -->
                    <div class="modal fade" id="exampleModal_<?php echo $key; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn btn-close text-reset" data-bs-dismiss="modal" aria-label="Close">
                                        <?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/close.svg' ); ?>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="video-wrapper">
                                        <?php echo $video_link; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif($image): ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                <?php elseif($video_link): ?>
                    <div class="video-wrapper">
                        <?php echo $video_link; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>