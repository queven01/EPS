<?php
    $icon = get_sub_field('icon'); 
    $large_title = get_sub_field('large_title');
    $title = get_sub_field('title'); 
    $content = get_sub_field('content');
    $image = get_sub_field('image');
    $side_bar_graphic = get_sub_field('side_bar_graphic');
    $flip_image = get_sub_field('flip_image');

    $style_selector = get_sub_field('style_selector');
    $section_id = get_sub_field('section_id');
    $last_goal = get_sub_field('last_goal');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
    if ( $args['goal'] ) {
        $goal = $args['goal'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>" class="content-section goal <?php if($flip_image){echo 'flip-image ';} echo $style_selector; ?>" >
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 content-side">
                <div class="heading-container wow animate__animated animate__fadeInLeft">
                    <?php if($large_title): echo '<h2>'.$large_title.'</h2>'; endif;?>
                    <?php if($icon): ?>
                        <div class="icon-container">
                            <img src="<?php echo $icon['url']; ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="content">
                    <?php if($title): echo '<h3>'.$title.'</h3>'; endif;?>
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="col-12 col-md-7 image-side">
                <?php if($image): ?><img src="<?php echo $image['url']; ?>" alt=""><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="goal-graphic-container <?php if($last_goal){echo 'last-goal';}?>" id="goal-image-<?php echo $goal;?>-container">
        <?php if($side_bar_graphic): ?><img class="goal-graphic" id="goal-image-<?php echo $goal;?>" src="<?php echo $side_bar_graphic['url']; ?>" alt=""><?php endif; ?>
    </div>
</section>