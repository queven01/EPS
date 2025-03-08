<?php 
$banner_description = get_field('description');
$banner_button = get_field('button');
$banner_overlay_color = get_field('overlay_color');
$color_background_only = get_field('color_background_only');

$isTitle = get_field('title');
$isBgImage = isset(get_field('image')['url']);
$isBannerImage = isset(get_field('banner_image')['url']);
 
if($isTitle){
    $banner_title = get_field('title');
} else {
    $banner_title = get_the_title();
}

if($isBgImage){
    $bg_image = get_field('image')['url'];
} else {
    $bg_image = get_the_post_thumbnail_url();
}

if($isBannerImage){
    $banner_image = get_field('banner_image')['url'];
} else {
    $banner_image = "";
}
?>
<section class="banner banner-simple" <?php if($banner_overlay_color){echo 'style="background-color:'.$banner_overlay_color.';"';}?>>
    <div class="container content">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title"><?php echo $banner_title; ?></h1>
            </div>
            <div class="col-md-6">
                <p class="description"><?php echo $banner_description; ?></p>
                <?php if($banner_button):?>
                    <a class="btn green out-link mt-5" target="_blank" href="<?php echo $banner_button['url']; ?>">View Site</a>
                <?php endif; ?>
            </div>
            <div class="col-12 mt-5 project-image-container">
                <?php if($banner_button){echo '<a class="gsap-hover" target="_blank" href="'.$banner_button['url'].'">'; }?>
                    <img class="project-featured-image" src="<?php echo $banner_image?>" alt="">
                <?php if($banner_button){echo '</a>'; }?>
                <!-- Cursor Follower -->
                <div class="cursor-follower">View Site</div>
            </div>
        </div>
    </div>
    <?php if(!$color_background_only):?>
    <img class="banner-bg-image" src="<?php echo $bg_image; ?>" alt="">
    <?php endif; ?>
</section>