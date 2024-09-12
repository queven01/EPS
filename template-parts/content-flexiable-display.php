<?php 
    // Check value exists.
    if( have_rows('page_components') ):
        // Loop through rows.
        while ( have_rows('page_components') ) : the_row();

            if( get_row_layout() == 'card_columns' ):
                get_template_part( 'components/cards/card-component');
            elseif( get_row_layout() == 'content_columns' ): 
                get_template_part( 'components/content/column-content-image-component');
            elseif( get_row_layout() == 'content_only_column' ): 
                get_template_part( 'components/content/column-content-only-component');
            elseif( get_row_layout() == 'column_editors' ): 
                get_template_part( 'components/content/column-content-editors-component');
            elseif( get_row_layout() == 'related_posts' ): 
                get_template_part( 'components/galleries/gallery-masonry');
            elseif( get_row_layout() == 'content_with_accordions' ): 
                get_template_part( 'components/content/content-with-accordion');
            endif;

        // End loop. 
        endwhile; 

    // No value.
    else :
        // Do something...
        // echo "<h2> Add Something to your page </h2>";
    endif;
?>
