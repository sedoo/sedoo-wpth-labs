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
    $footerStyle .="background:".get_field('footer_color', 'option').";";
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
    }
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
                <?php endif; ?>

                <div class="infos-pratiques">

                    <?php if( have_rows('location_repeater', 'option') ): ?>
                    <?php 
                    
                    
                    $adresses = get_field('location_repeater', 'option');
                        $nom_labo = $adresses[0]['nom_laboratoire'];
                        $adresse_labo = $adresses[0]['adresse'];
                        $contact_labo = $adresses[0]['contact_laboratoire'];
                        $tel_contact = $adresses[0]['telephone_contact'];
                        $fax_contact = $adresses[0]['fax_contact'];
                        $mail_contact = $adresses[0]['mail_contact'];
                        $map = $adresses[0]['map'];
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
                    <?php 
                    // if repeater have multiple row or not
                    
                    if(count(get_field('location_repeater', 'option') ) > 1) {
                        echo '<a class="btn_footer_local" href="'.get_field('url_page_access', 'option').'"> Toutes les adresses </a>';
                    }

                    ?>
                    <?php endif; ?>
                </div>
                <?php 
                if(get_field('sedoo_labs_footer_replace_logo', 'option') == true) {
                    if(get_field('sedoo_labs_footer_url_image', 'option')) { 
                        echo '<a class="footer_img" href="'.get_field('sedoo_labs_footer_url_image', 'option').'">';
                    }
                        ?>
                        <figure>
                            <img alt="" class=" object-fit-contain" src="<?php echo get_field('sedoo_labs_image_in_footer', 'option'); ?>" >
                        </figure>
                        <?php 
                    if(get_field('sedoo_labs_footer_url_image', 'option')) { 
                        echo '</a>';
                    }
                } else {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
                }
                ?>

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
        <?php if (has_nav_menu('mentions-menu') || get_field('footer_show_copyright', 'option') ) { ?>
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

                    <?php 
                    // show copyright
                    if (get_field('footer_show_copyright', 'option')) {
                        ?>
                        <p>
                        <?php echo get_field('footer_copyright_text', 'option');?> - <a href="https://www.sedoo.fr" title="Visit Sedoo website">SEDOO (<?php echo __('Data service OMP', 'sedoo-wpth-labs');?>)</a>
                        </p>
                    <?php
                    }
                    ?>       
                </div><!-- .site-info -->
            </div>
        <?php } ?>    
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_template_part( 'template-parts/shortcut', 'page' ); ?>
<?php wp_footer(); ?>   

</body>
</html>
