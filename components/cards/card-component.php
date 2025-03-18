<?php 
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $dynamic_card = get_sub_field('dynamic_card');

    if($dynamic_card){
        $cards = get_sub_field('dynamic_card_chooser');
    } else {
        $cards = get_sub_field('cards');
    }

    $number_of_columns = get_sub_field('number_of_columns');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="card-col col-12">';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="card-col col-6 col-md-6">';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="card-col col-6 col-md-4">';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="card-col col-6 col-md-3">';
    }
    $section_id = get_sub_field('section_id');
    if ( $args['key'] ) {
        $key = $args['key'];
    }
?>
<section id="<?php if($section_id): echo $section_id; else: echo 'section-'.$key; endif;?>" class="card-component">
    <div class="container">
        <?php if($title || $description || $button_1 || $button_2):?>
            <div class="intro-content">
                <?php 
                    if($title) echo '<h3 class="title">'. $title .'</h3>';
                    if($description) echo '<h4 class="sub_title">'. $description .'</h4>';
                ?>
            </div>
        <?php endif; ?>
        <div class="row card-row">
            <?php foreach($cards as $key => $card): 
                echo $column_Div; ?>
                    <?php get_template_part( 
                        'components/cards/card', 'default', 
                        array(
                            'cardValue'	=> $card,
                        ) 
                    ); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>