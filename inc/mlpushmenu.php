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
?>