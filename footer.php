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

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="wrapper">
            <div class="infos-pratiques">
                <?php the_custom_logo(); ?>
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
                        <p>Tel : <a href="tel:<?php echo $tel_contact; ?>"><?php echo $tel_contact; ?></a></p>
                        <?php if($fax_contact) { ?>
                            <p>Fax : <?php echo $fax_contact; ?></p>
                        <?php } ?>
                        <p><a href="mailto:<?php echo $mail_contact; ?>"><?php echo $mail_contact; ?></a></p>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="footer-menu">
                <?php if (has_nav_menu('primary-menu')) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'primary-menu',
                    ) );
                } else{
                    wp_nav_menu( array(
                        'theme_location' => 'burger-menu',
                        'menu_id'        => 'burger-menu',
                    ) );
                }?>
            </div>
            <ul class="footer-categories">
                <?php wp_list_categories(array('title_li' => '')); ?>
            </ul>
            <div class="social-partenaires">
                 <?php if( have_rows('reseaux_sociaux', 'option') ): ?>
                    <div class="social-list">
                        <h2>Suivez nous sur les réseaux sociaux</h2>
                        <ul class="inline-list">

                        <?php while( have_rows('reseaux_sociaux', 'option') ): the_row(); 

                            // vars
                            $link = get_sub_field('lien_reseau_social', 'option');
                            ?>

                            <li class="list">

                                <?php if( $link ): ?>
                                    <a href="<?php echo $link; ?>">
                                    </a>
                                <?php endif; ?>

                            </li>

                        <?php endwhile; ?>

                        </ul>
                    </div>
                <?php endif; ?>
                <?php if( have_rows('partenaires', 'option') ): ?>
                    <div class="partners-list">
                        <h2>Tutelles</h2>
                        <ul id="partners-sidebar" class="primary-sidebar widget-area inline-list" role="complementary">
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
            </div>
        </div>
        <div class="copyright">
            <div class="site-info wrapper">
                <p>© Copyright <?php echo get_theme_mod('labs_by_sedoo_copyright');?></p>
                <p>
                    <?php if(get_field("politique_de_confidentialite", "option")){ ?>
                        <a href="<?php the_field('politique_de_confidentialite', 'option'); ?>">Politique de confidentialité</a>
                    <?php } ?>
                    <?php if(get_field("mentions_legales", "option")){ ?>
                        • <a href="<?php the_field('mentions_legales', 'option'); ?>">Mentions légales</a>
                    <?php } ?>
                    <?php if(get_field("sitemap", 'option')) { ?>
                        • <a href="<?php the_field('sitemap', 'option'); ?>">Sitemap</a>
                    <?php } ?>
                </p>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_template_part( 'template-parts/shortcut', 'page' ); ?>
<?php 
    wp_footer(); 
?>   
<script>
    /* INIT DARKMODE */
    new Darkmode().showWidget();   
</script>
</body>
</html>
