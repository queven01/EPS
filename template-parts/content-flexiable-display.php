<?php 
    // Check value exists.
    if( have_rows('page_components') ):
        // Loop through rows.
        while ( have_rows('page_components') ) : the_row();

            if( get_row_layout() == 'card_columns' ):
                get_template_part( 'components/cards/card-component');
            elseif( get_row_layout() == 'stats' ):
                get_template_part( 'components/cards/stat-card-component');
            elseif( get_row_layout() == 'content_columns' ): 
                get_template_part( 'components/content/content-image-component');
            elseif( get_row_layout() == 'content_media' ): 
                get_template_part( 'components/content/content-media');
            elseif( get_row_layout() == 'content_goal' ): 
                get_template_part( 'components/content/content-goal');
            elseif( get_row_layout() == 'content_only_column' ): 
                get_template_part( 'components/content/content-only-component');
            elseif( get_row_layout() == 'column_editors' ): 
                get_template_part( 'components/content/content-editors-component');
            elseif( get_row_layout() == 'related_posts' ): 
                get_template_part( 'components/galleries/gallery-masonry');
            elseif( get_row_layout() == 'content_with_accordions' ): 
                get_template_part( 'components/content/content-with-accordion');
            elseif( get_row_layout() == 'table' ): 
                get_template_part( 'components/content/content-table');
            elseif( get_row_layout() == 'quote' ): 
                get_template_part( 'components/content/content-quote');
            endif;

        // End loop. 
        endwhile; 

    // No value.
    else :
        // Do something...
        // echo "<h2> Add Something to your page </h2>";
    endif;
?>
