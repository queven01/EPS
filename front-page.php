<?php
/**
 * 
 * The Front Page Template
 *
 */

get_header();
?>  
	<main id="primary" class="site-main front-page">
        <?php
            get_template_part("components/banners/banner-home");
            get_template_part('template-parts/content-flexiable-display'); 
        ?> 
    </main>
<?php
get_footer();