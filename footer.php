<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labs_by_Sedoo
 */
$options_list_footer = get_field('list_choice', 'option');

$footerStyle = "style=\"";
if (get_field('footer_background_svg', 'option')) { 
    $footerStyle .= "background-image:url(".get_field('footer_background_svg', 'option').");";
} 
if (get_field('footer_color', 'option')) { 
    $footerStyle .="background-color:".get_field('footer_color', 'option').";";
}
$footerStyle .= "\"";

?>

	</div><!-- #content -->  
    <footer id="colophon" class="site-footer" <?php echo $footerStyle;?> >
    <style>
   
   footer[id="colophon"] * {
        color:
        <?php
        if (get_field('footer_text_color', 'option')) {
            the_field('footer_text_color', 'option');            
        } else {
            echo "#222";
        }
        ?>
        ;
        </style>    
        <div class="wrapper-layout">
            <div><!--footer menus-->
                <?php if (has_nav_menu('footer-menu-1')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-1">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-1',
                    ) );
                ?>
                </nav>
                <?php
                } ?>

                <?php if (has_nav_menu('footer-menu-2')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-2">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-2',
                    ) );
                ?>
                </nav>
                <?php
                } ?>
                
                <?php if (has_nav_menu('footer-menu-3')) { 
                ?>
                <nav class="footer-menu" id="footer-menu-3">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu-3',
                    ) );
                ?>
                </nav>
                <?php
                } ?>
            </div>

            <div class="social-partenaires">
                 <?php if( have_rows('reseaux_sociaux', 'option') ): ?>
                <div class="social-list">
                    <ul class="inline-list">
                    <?php while( have_rows('reseaux_sociaux', 'option') ): the_row(); 
                        // vars
                        $link = get_sub_field('lien_reseau_social', 'option');
                        ?>
                        <li class="list">
                            <?php if( $link ): ?>
                                <a href="<?php echo $link; ?>" title="Follow us">
                                    <span class="screen-reader-text">Follow us</span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>

                <div class="infos-pratiques">
                    <?php if( have_rows('location_repeater', 'option') ): ?>
                    <?php while( have_rows('location_repeater', 'option')): the_row();
                        $nom_labo = get_sub_field('nom_laboratoire', 'option');
                        $adresse_labo = get_sub_field('adresse', 'option');
                        $contact_labo = get_sub_field('contact_laboratoire', 'option');
                        $tel_contact = get_sub_field('telephone_contact', 'option');
                        $fax_contact = get_sub_field('fax_contact', 'option');
                        $mail_contact = get_sub_field('mail_contact', 'option');
                        $map = get_sub_field('map', 'option');
                    ?>
                    <div class="row-infos">
                        <div>
                            <p><b><?php echo $nom_labo; ?></b></p>
                            <address><?php echo $adresse_labo; ?></address>
                        </div>
                        <div>
                            <p><b><?php echo $contact_labo; ?></b></p>
                            <p><?php echo __('Tel', 'sedoo-wpth-labs'); ?> : <a href="tel:<?php echo $tel_contact; ?>"><?php echo $tel_contact; ?></a></p>
                            <?php if($fax_contact) { ?>
                                <p><?php echo __('Fax', 'sedoo-wpth-labs'); ?> : <?php echo $fax_contact; ?></p>
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
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                <img class="object-fit-contain" src="<?php echo $image[0]; ?>" alt="" />
                
            </div>
        </div>

        <?php if( have_rows('partenaires', 'option') ): ?>
        <div class="partners-list">
            <ul id="partners-sidebar" class="inline-list wrapper-layout" role="complementary">
            <?php while( have_rows('partenaires', 'option') ): the_row(); 

                // vars
                $link = get_sub_field('lien_partenaire', 'option');
                $logo = get_sub_field('logo_partenaire', 'option');

                ?>

                <li class="list">

                    <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>">
                    <?php endif; ?>
                        <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt'] ?>" />
                    <?php if( $link ): ?>
                        </a>
                    <?php endif; ?>

                </li>

            <?php endwhile; ?>

            </ul>
        </div>
        <?php endif; ?>
        <div class="copyright">
            <div class="site-info wrapper">
                <?php if (has_nav_menu('mentions-menu')) { 
                ?>
                <nav>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'mentions-menu',
                        'menu_id'        => 'mentions-menu',
                    ) );
                ?>
                </nav>
                <?php
                } ?>
                <?php if (get_field('footer_show_copyright', 'option')) {
                    echo "<p>".get_field('footer_copyright_text', 'option')."</p>";
                }
                ?>
                
                
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_template_part( 'template-parts/shortcut', 'page' ); ?>
<?php wp_footer(); ?>   
<!--
<script>
    /* INIT DARKMODE */
    new Darkmode().showWidget();   
</script>
-->
</body>
</html>
