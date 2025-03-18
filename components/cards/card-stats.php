<?php
    $card = $args['cardValue'];

    $image = $card['image'];
    $title = $card['title'];
    $sub_title = $card['sub_title'];
    $number = $card['number'];
    $description = $card['description'];
?>
<div class="card stats v1">
    <div class="image-container">
        <img src="<?php echo $image['url']; ?>" alt="">
    </div>
    <div class="content">
        <h1 class="number count-up" data-count="<?php echo $number; ?>"><?php echo $number; ?></h1>
        <h3 class="title"><?php echo $title ?></h3>
        <h3 class="sub_title"><?php echo $sub_title ?></h3>
        <?php echo $description; ?>
    </div>
</div>