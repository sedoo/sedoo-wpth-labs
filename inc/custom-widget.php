<?php


/******************************************************************
* WIDGETS AREA 
*/


// Register Sidebars
function labs_custom_sidebars() {

    $args = array(
        'id'            => 'sommaire-single',
        'class'         => 'sommaire-single',
        'name'          => __( 'Sommaire page article', 'theme-aeris' ),
        'description'   => esc_html__( 'Ajouteur ici vos réseaux sociaux ainsi que les logos des partenaires', 'theme-aeris' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    );
    register_sidebar( $args );


}
add_action( 'widgets_init', 'labs_custom_sidebars' );



?>