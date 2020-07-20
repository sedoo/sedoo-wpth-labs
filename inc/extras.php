<?php
/******************************************************************
* REDIRECT AFTER LOGIN
*/
function theme_aeris_login_redirect( $redirect_to, $request, $user ){
	return home_url();
  }
  add_filter( 'theme_aeris_login_redirect', 'login_redirect', 10, 3 );

/******************************************************************
* SHORTCODE TO HIDE EMAIL
*/
function sedoo_labs_shortcode_mail_sedoo($atts, $content){
	
  return $content.'<i class="hide">NO SPAM -- FILTER</i>@<i class="hide">NO SPAM -- FILTER</i>'.$atts['domain'];
}
add_shortcode('hmail','sedoo_labs_shortcode_mail_sedoo');


/******************************************************************
* DISPLAY PORTFOLIO FOR TERMS WHERE PORTFOLIO DISPLAY IS CHECKED
*/
function archive_do_portfolio_display($term){

  $args = array(
    'tax_query' => array(
      array(
        'taxonomy' => $term->taxonomy,
        'field' => 'term_id',
        'terms' => $term->term_id,
      ),
    ),
    'orderby' => 'title', 
    'order' => 'ASC',
  );

  $cpt_array = [];
  $content_array;
  $boutons = '<ul class="sedoo_port_action_btn ctx_button">';
  $loop = new WP_Query($args);
  if($loop->have_posts()) {
    while($loop->have_posts()) : $loop->the_post();
      if (!in_array(get_post_type(), $cpt_array)) { 
        $cpt_array[]  = get_post_type();    
        $cpt_name = get_post_type_object( get_post_type() )->labels->name;
        $boutons .= '<li cpt="'.get_post_type().'" order="title" orderby="ASC" ctx="'.$term->taxonomy.'" term="'.$term->term_id.'" layout="grid">'.$cpt_name.'</li>';
      }
      ob_start();
      include(get_template_directory().'/template-parts/content-portfolio-grid.php');

      $content_array .= ob_get_contents();
      
      ob_end_clean();

    endwhile;
    echo $boutons.'</ul>';
    echo '<section class="sedoo_portfolio_section section_ctx">';
    echo $content_array;
    echo '</section>';
  }
}
  ?>