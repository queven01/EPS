<?php 
    $content = get_sub_field('content');
    $icon = get_sub_field('icon');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $button = get_sub_field('button');
    $list_items = get_sub_field('list_items');
    $background_color = get_sub_field('background_color');
    $style_chooser = get_sub_field('style_chooser');

    $section_id = get_sub_field('section_id');

    $vertical_align_center = get_sub_field('vertical_align_center');
?>
<section <?php echo 'id="'.$section_id.'"'?> class="content-section content-only">
    <div class="container">
        <div class="row <?php if($vertical_align_center){echo 'vertical-align';} ?>">
            <div class="col-lg-6 content-side">
                <div class="content">
                    <img src="<?php echo $icon['url']; ?>" alt="">
                    <h2 class="title"><?php echo $title; ?></h2>
                    <p class="description"><?php echo $description; ?></p>
                     <?php if($button){
                        echo '<a class="btn" href="'.$button['url'].'">'.$button['title'].'</a>';
                     }?>
                </div>
            </div>
            <div class="col-lg-6 list-side">
                <div class="background-color" <?php if($background_color){echo 'style="background-color:'. $background_color .';"';}?>></div>
                <div class="list-continer">
                    <ul class="list">
                        <?php foreach($list_items as $item): 
                                if($item['icon']){
                                    $svg_content = file_get_contents($item['icon']['url']);
                                } else {
                                    $svg_content = "";
                                } ?>
                            <li>
                                <div class="image-container <?php echo $item['svg_icon_color']; ?>">
                                    <?php echo $svg_content; ?>
                                </div>
                                <div class="content">
                                    <h3><?php echo $item['title']; ?></h3>
                                    <p><?php echo $item['description']; ?></p>
                                </div>
                            </li> 
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>