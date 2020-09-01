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


?>