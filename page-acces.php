<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

get_header();
$query_object = get_queried_object();
// if ($query_object->post_type) {
    $page_id = get_queried_object_id();
// }
$title = get_the_title($page_id);
?>
    <?php
    if (get_the_post_thumbnail()) {
    ?>
        <header id="cover">
            <?php the_post_thumbnail('cover'); ?>
        </header>
    <?php 
    }
    ?>
	<div id="primary" class="content-area wrapper">
       
        <main id="main" class="site-main location">
            <div class="wrapper-content">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
                <div class="wrapper">  
                <?php if( have_rows('location_repeater', 'option') ): ?>
                    <?php while( have_rows('location_repeater', 'option')): the_row();
                        $nom_labo = get_sub_field('nom_laboratoire', 'option');
                        $adresse_labo = get_sub_field('adresse', 'option');
                        $contact_labo = get_sub_field('contact_laboratoire', 'option');
                        $tel_contact = get_sub_field('telephone_contact', 'option');
                        $fax_contact = get_sub_field('fax_contact', 'option');
                        $mail_contact = get_sub_field('mail_contact', 'option');
                        $map = get_sub_field('map', 'option');
                        $display_map = get_sub_field('display_map', 'option');
                    ?>
                    <div class="location-repeat">
                        <div class="information-location">    
                            <div>
                                <p><b><?php echo $nom_labo; ?></b></p>
                                <address><?php echo $adresse_labo; ?></address>
                                <p><b><?php echo $contact_labo; ?></b></p>
                                <p>Tel : <a href="tel:<?php echo $tel_contact; ?>"><?php echo $tel_contact; ?></a></p>
                                <?php if($fax_contact) { ?>
                                    <p>Fax : <?php echo $fax_contact; ?></p>
                                <?php } ?>
                                <?php 
                                if ($mail_contact) {
                                    $mailProtected=explode("@", $mail_contact);
                                
                                ?>
                                <p><?php echo $mailProtected[0]."<i class=\"hide\">NO SPAM -- FILTER</i>@<i class=\"hide\">NO SPAM -- FILTER</i>".$mailProtected[1];?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php if($display_map == 'oui') { ?>
                            <div class="leaflet-container">
                                <?php echo $map; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>     
                </div>        
            </div>
		</main><!-- #main -->
        
	</div><!-- #primary -->
<?php

get_footer();
