<?php
    $intro_section = get_field('intro_section');
    $title = $intro_section['title'];
    $description = $intro_section['description'];
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?> 

<section class="content-intro" id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>">
    <div class="container">
        <div class="intro-content">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description?></p>
        </div>
    </div>
</section>