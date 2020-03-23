<?php
/**
 * Template part for the contextual sidebar in single
 *
 */

?>
<aside class="contextual-sidebar">
    
    <?php 
    if ( get_field('ajouteur_auteur')) {
        get_template_part( 'template-parts/single-author', '' );
    }  
    
    /*** LABTOOLS FOR SHOWING CURRENT TERMS OF CUSTOM TAXONOMIES */

    // check if the repeater field has rows of data
    if( have_rows('labstools_display_taxonomies') ):
        // loop through the rows of data
        while ( have_rows('labstools_display_taxonomies') ) : the_row();
            // display a sub field value
            $taxonomy = get_sub_field('labstools_choose_taxonomy');

            if( function_exists('sedoo_labtools_show_categories') ){
                $themes = get_the_terms( $post->ID, $taxonomy);
                $taxonomy_labels = get_taxonomy_labels( get_taxonomy($taxonomy) );
                // var_dump($taxonomy_labels);

                if (is_array($themes)) {
                    ?>
                    <h2>
                    <?php 
                    if (get_sub_field('labstools_taxonomysection_title')) {
                        the_sub_field('labstools_taxonomysection_title');
                    } else {
                        echo __($taxonomy_labels->name, 'sedoo-wpth-labs');
                    }                    
                    ?>
                    </h2>                    
                    <?php
                    sedoo_labtools_show_categories($themes, $taxonomy);
                }
            }            
        endwhile;

    else :
        // no rows found
    endif;

    ?>  
</aside>
