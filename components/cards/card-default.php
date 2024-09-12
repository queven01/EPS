<?php
    $card = $args['cardValue'];

    $image = $card['image'];
    $title = $card['title'];
    $description = $card['description'];
    if($card['button']){
        $button = $card['button']['url'];
        $button_text = $card['button']['title'];
    } else {
        $button = "";
        $button_text = "";
    }
    $button_color = $card['button_color'];
?>
<div class="card default">
    <!-- <a href="<?php echo get_permalink($id);?>" class="card-link"> -->
        <div class="image-container">
            <img src="<?php echo $image['url']; ?>" alt="">
        </div>
        <div class="content">
            <h2 class="title"><?php echo $title ?></h2>
            <p><?php echo $description; ?></p>
            <?php if($button):?>
                <a class="btn <?php echo $button_color; ?>" href="<?php echo $button; ?>"><?php echo $button_text; ?></a>
            <?php endif; ?>
        </div>
    <!-- </a> -->
</div>