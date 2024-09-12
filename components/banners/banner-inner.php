<?php 
$banner_description = get_field('description');
$banner_button = get_field('button');
$banner_overlay_color = get_field('overlay_color');

$isTitle = get_field('title');
$isBannerImage = isset(get_field('background_image')['url']);
 
if($isTitle){
    $banner_title = get_field('title');
} else {
    $banner_title = get_the_title();
}

if($isBannerImage){
    $banner_image = get_field('background_image')['url'];
} else {
    $banner_image = get_the_post_thumbnail_url();
}
?>
<section class="banner banner-inner" <?php if($banner_overlay_color){echo 'style="background-color:'.$banner_overlay_color.';"';}?>>
    <div class="container content">
        <h1 class="title"><?php echo $banner_title; ?></h1>
        <!-- <p><?php echo $banner_description; ?></p> -->
    </div>
    <img class="banner-bg-image" src="<?php echo $banner_image; ?>" alt="">
</section>