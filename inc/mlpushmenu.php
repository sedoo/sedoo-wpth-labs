<?php

class Sedoo_Push_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
    
    function start_el(&$output, $item, $depth=3, $args=null, $id=0) { 
               
        // If has submenu
        if ($args->walker->has_children) {
            
            $ariaMeta = "data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"";
            $output .= "<li class='icon-arrow-left'>";

            if ($item->url && $item->url != '#') {
                $output .= '<a href="' . $item->url . '" '.$ariaMeta.' >'.$item->title.'';
            } else {
                $output .= '<a href="#" '.$ariaMeta.' >'.$item->title.'';
            }
            $output .= '</a>';
            $output .= '<div class="mp-level">';
            $output .= '<h2><a href="' . $item->url . '">'.$item->title.'</a></h2>';
            $output .= '<a class="mp-back" href="#">back</a>';

        } 
        else {
            $output .= "<li>";
            $output .= '<a href="' . $item->url . '">'.$item->title.'';
            $output .= '</a>';
        }

    }

}
?>