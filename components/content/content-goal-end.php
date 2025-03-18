<?php
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>" class="goal-end goal-scroll-close" >
</section>