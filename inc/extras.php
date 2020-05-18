<?php
/******************************************************************
* REDIRECT AFTER LOGIN
*/
function theme_aeris_login_redirect( $redirect_to, $request, $user ){
	return home_url();
  }
  add_filter( 'theme_aeris_login_redirect', 'login_redirect', 10, 3 );

  ?>