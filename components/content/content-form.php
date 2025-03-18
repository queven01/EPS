<?php
    $form = get_field('form');
    $title = $form['title'];
    $content = $form['content'];
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?> 

<section class="content-form" id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>">
    <div class="container">
        <div class="form_section">
            <div class="intro-content">
                <h2><?php echo $title; ?></h2>
            </div>
            <?php echo $content; ?>
            <form action="">
                <input type="text">
            </form>
        </div>
    </div>
</section>