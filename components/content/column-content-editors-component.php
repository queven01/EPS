<?php 
    $content_columns = get_sub_field('content_columns');

    $background_color = get_sub_field('background_color');
    $small_container = get_sub_field('small_container');
    $number_of_columns = get_sub_field('number_of_columns');

    $vertical_align_center = get_sub_field('vertical_align_center');

    $section_id = get_sub_field('section_id');
    
    if($number_of_columns == 1){
        $column_Div = '<div class="col-12">';
    } elseif($number_of_columns == 2){
        $column_Div = '<div class="col-12 col-md-6">';
    } elseif($number_of_columns == 3){
        $column_Div = '<div class="col-12 col-lg-6 col-xl-4">';
    } elseif($number_of_columns == 4){ 
        $column_Div = '<div class="col-12 col-md-3">';
        
    }
?>
<?php if($content_columns): ?>
<section <?php echo 'id="'.$section_id.'"'?> class="content-section editors" >
    <div class="container <?php if($small_container){echo 'small-container';};?>">
        <?php echo '' ?>
        <div class="row g-5 <?php if($vertical_align_center){echo 'vertical-align';} ?>">
            <?php foreach($content_columns as $card): 
                echo $column_Div;?>
                    <?php echo $card['editor']; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>