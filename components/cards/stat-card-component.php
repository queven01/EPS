<?php 
    $title = get_sub_field('title');
    $sub_title = get_sub_field('sub_title');
    $cards = get_sub_field('stat_cards');
    $styles = get_sub_field('styles');
    $image = get_sub_field('image');
    $image_2 = get_sub_field('image_2');
    $image_3 = get_sub_field('image_3');
    $video = get_sub_field('video');

    $number_of_columns = get_sub_field('number_of_columns');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="card-col col-12">';
        $border = 'border-1';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="card-col col-12 col-md-6">';
        $border = 'border-2';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="card-col col-12 col-md-4">';
        $border = 'border-3';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="card-col col-12 col-md-3">';
        $border = 'border-4';
    }
?>
<section class="card-component stats <?php echo $styles .' '. $border; if( !$title && !$sub_title ){ echo ' more-padding'; }?>">
    <div class="container">
        <?php if($title || $sub_title):?>
            <div class="intro-content">
                <?php 
                    if($title) echo '<h2 class="section-title">'. $title .'</h2>';
                    if($sub_title) echo '<div class="sub_title">'. $sub_title .'</div>';
                ?>
            </div>
        <?php endif; ?>

        <?php if($styles == 'style-1'):?>
            <div class="row g-5 card-row">
                <?php foreach($cards as $key => $card): 
                    echo $column_Div; ?>
                        <?php get_template_part( 
                            'components/cards/card', 'stats', 
                            array(
                                'cardValue'	=> $card,
                            ) 
                        ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif($styles == 'style-2'): ?>
            <div class="row g-5 card-row">
                <div class="col-lg-6 image-side">
                    <?php if($image){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                </div>
                <div class="col-lg-6 stat-card-side">
                    <div class="row g-4">
                        <?php foreach($cards as $key => $card): 
                            echo $column_Div; ?>
                                <?php get_template_part( 
                                    'components/cards/card', 'stats-v2', 
                                    array(
                                        'cardValue'	=> $card,
                                    ) 
                                ); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php elseif($styles == 'style-3'): ?>
            <div class="row g-5 card-row">
                <div class="col-lg-6">
                    <?php if($video){ echo '<img src="'.$video['url'].'" alt="'.$video['alt'].'">';}?>
                    <?php if($image){ echo '<img src="'.$image['url'].'" alt="'.$image['alt'].'">';}?>
                    <?php if($image_2){ echo '<img src="'.$image_2['url'].'" alt="'.$image_2['alt'].'">';}?>
                    <?php if($image_3){ echo '<img src="'.$image_3['url'].'" alt="'.$image_3['alt'].'">';}?>
                </div>
                <div class="col-lg-6 stat-card-side">
                    <div class="row g-4">
                        <?php foreach($cards as $key => $card): 
                            echo $column_Div; ?>
                                <?php get_template_part( 
                                    'components/cards/card', 'stats-v3', 
                                    array(
                                        'cardValue'	=> $card,
                                    ) 
                                ); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>