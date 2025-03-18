<?php 
    // Check value exists.
    if( have_rows('page_components') ):
        // Loop through rows.
        $key = 1; // Initialize key
        $goal = 1; // Initialize key
        while ( have_rows('page_components') ) : the_row();

            if( get_row_layout() == 'card_columns' ):
                get_template_part( 'components/cards/card-component', null, array('key' => $key,));
            elseif( get_row_layout() == 'stats' ):
                get_template_part( 'components/cards/stat-card-component', null, array('key' => $key,));
            elseif( get_row_layout() == 'content_columns' ): 
                get_template_part( 'components/content/content-image-component', null, array('key' => $key,));
            elseif( get_row_layout() == 'content_media' ): 
                get_template_part( 'components/content/content-media', null, array('key' => $key,));
            elseif( get_row_layout() == 'content_goal' ): 
                get_template_part( 'components/content/content-goal', null, array('key' => $key, 'goal'=> $goal, ));
                $goal++; // Increment key
            elseif( get_row_layout() == 'goal_end' ): 
                get_template_part( 'components/content/content-goal-end', null, array('key' => $key, ));
            elseif( get_row_layout() == 'content_only_column' ): 
                get_template_part( 'components/content/content-only-component', null, array('key' => $key,));
            elseif( get_row_layout() == 'column_editors' ): 
                get_template_part( 'components/content/content-editors-component', null, array('key' => $key,));
            elseif( get_row_layout() == 'related_posts' ): 
                get_template_part( 'components/galleries/gallery-masonry', null, array('key' => $key,));
            elseif( get_row_layout() == 'content_with_accordions' ): 
                get_template_part( 'components/content/content-with-accordion', null, array('key' => $key,));
            elseif( get_row_layout() == 'table' ): 
                get_template_part( 'components/content/content-table', null, array('key' => $key,));
            elseif( get_row_layout() == 'quote' ): 
                get_template_part( 'components/content/content-quote', null, array('key' => $key,));
            endif;
            $key++; // Increment key
        // End loop. 
        endwhile; 

    // No value.
    else :
        // Do something...
        // echo "<h2> Add Something to your page </h2>";
    endif;
?>
