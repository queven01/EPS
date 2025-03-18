<?php 
    $isTitle = get_field('title');

    $banner_sub_title = get_field('sub_title');
    $isBannerImage = isset(get_field('image')['url']);
    $banner_button = get_field('button');
    $banner_button_2 = get_field('button_2');
    $video = get_field('video');
    
    if($isTitle){
        $banner_title = get_field('title');
    } else {
        $banner_title = get_the_title();
    }

    if($isBannerImage){
        $banner_image = get_field('image')['url'];
    } else {
        $banner_image = get_the_post_thumbnail_url();
    }
?>

<section class="banner banner-home">
    <div class="content animate__animated animate__fadeInUp">
        <h1 class="title"><?php echo $banner_title; ?></h1>
        <h2 class="sub-title"><?php echo $banner_sub_title; ?></h2>
        <div class="buttons-container">
            <?php if($banner_button){ echo '<a class="btn" href="'.$banner_button['url'].'">'.$banner_button['title'].'</a>'; }?> 
            <?php if($banner_button_2){ echo '<a class="btn" href="'.$banner_button_2['url'].'">'.$banner_button_2['title'].'</a>'; }?> 
        </div>
    </div>
    <?php if($video):?>
        <video width="320" height="240" playsinline autoplay loop muted>
            <source src="<?php echo $video['url']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    <?php endif; ?>
    <img class="banner-bg-image" src="<?php echo $banner_image; ?>" alt="">
    <div class="hero-blocks animate__animated animate__fadeInUp animate__slow">
        <?php echo file_get_contents( get_template_directory_uri() . '/assets/image/eps-lines.svg' ); ?>
    </div>
</section>