<?php

function labs_by_sedoo_mlpushmenu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
         
        $menu_list  = '<div class="mp-level">' ."\n";

        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list .= '<h2>Menu</h2>' ."\n";
        $menu_list .= '<ul>' ."\n";
          
        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                 
                $parent = $menu_item->ID;
                 
                $menu_array = array();
                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li><a href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                     
                    $menu_list .= '<li class="icon icon-arrow-left">' ."\n";
                    $menu_list .= '<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . '</a>' ."\n";
                    $menu_list .= '<div class="mp-level">';
                    $menu_list .= '<h2>'.$menu_item->title.'</h2>';
                    $menu_list .= '<a class="mp-back" href="#">back</a>';
                    $menu_list .= '<ul class="sub-menu">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul>' ."\n";
                    $menu_list .= '</div>';
                     
                } else {
                     
                    $menu_list .= '<li>' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                }
                 
            }
             
            // end <li>
            $menu_list .= '</li>' ."\n";
        }
          
        $menu_list .= '</ul>' ."\n";
        $menu_list .= '</div>' ."\n";
  
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
     
    echo $menu_list;
}

/**
 * Required plugin
 * https://github.com/adgsm/multi-level-push-menu
 */
class Push_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    function start_el( &$output, $item, $depth = 5, $args = array(), $id = 0 ) {

        $output .= "<li>";

        $attributes  = '';
        $title = $item->title;
        $desc = $item->description;
        $classes = $item->classes;
                /*["classes"] => array(8) {
                    [0]=> string(0) "" <-- THIS IS THE CUSTOM CLASS
                    [1]=> string(9) "menu-item" 
                    [2]=> string(24) "menu-item-type-post_type" 
                    [3]=> string(21) "menu-item-object-page" 
                    [4]=> string(17) "current-menu-item" 
                    [5]=> string(9) "page_item"
                    [6]=> string(12) "page-item-50"
                    [7]=> string(17) "current_page_item"
                }*/
        $font_awesome_class = ' class="fa fa-'. $classes[0] . '"';

        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        if (!empty ( $classes[0] )) : // If we have a custom class, add the H2 + icon
                $item_output = $args->before
                    . "<a $attributes>"
                    .       $args->link_before
                    .       $title
                    . '</a> '
                    . '<h2>'
                    .       '<i ' . $font_awesome_class . '></i>'
                    .       $title
                    . '</h2>'
                    . $args->link_after
                    // . $description <-- Not needed for now...
                    . $args->after;
        else :
                $item_output = $args->before
                    . "<a $attributes>"
                    . $args->link_before
                    . $title
                    . '</a> '
                    . $args->link_after
                    . $args->after;
        endif;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el',
            $item_output,
            $item,
            $depth,
            $args
        );
    }
}
?>