<?php 
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $dynamic_card = get_sub_field('dynamic_card');
    $button_1 = get_sub_field('button_1');
    $button_2 = get_sub_field('button_2');
    $secondary_style = get_sub_field('secondary_style');;

    if($dynamic_card){
        $cards = get_sub_field('dynamic_card_chooser');
    } else {
        $cards = get_sub_field('cards');
    }

    $number_of_columns = get_sub_field('number_of_columns');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="card-col col-12">';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="card-col col-12 col-md-6">';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="card-col col-12 col-md-4">';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="card-col col-12 col-md-3">';
    }
?>
<section class="card-component <?php if( !$title && !$description ){ echo 'more-padding'; }?> <?php if($secondary_style){echo "secondary_style";}?>">
    <div class="container">
        <?php if($title || $description || $button_1 || $button_2):?>
            <div class="intro-content">
                <?php 
                    if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    if($description) echo '<div class="description">'. $description .'</div>';
                ?>
                <?php if($button_1 || $button_2 ):?>
                    <div class="buttons-container">
                        <?php 
                            if($button_1) echo '<a class="btn" href="'.$button_1['url'].'">'. $button_1['title'] .'</a>';
                            if($button_2) echo '<a class="btn" href="'.$button_2['url'].'">'. $button_2['title'] .'</a>';
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="row g-5 card-row">
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