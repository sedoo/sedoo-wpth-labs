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
                <?php 

                    $image = get_field('logo_laboratoire', 'option');

                    if( !empty($image) ): ?>

                        <img class="grey-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                <?php endif; ?>
                <div>
                    <p><b><?php the_field('nom_laboratoire', 'option'); ?></b></p>
                    <address><?php the_field('adresse', 'option'); ?></address>
                </div>
                <div>
                    <p><b><?php the_field('contact_laboratoire', 'option'); ?></b></p>
                    <a href="tel:<?php the_field('telephone_contact', 'option'); ?>"><?php the_field('telephone_contact', 'option'); ?></a>
                    <?php if(get_field('fax_contact', 'option')) { ?>
                        <p>Fax : <?php the_field('fax_contact', 'option'); ?></p>
                    <?php } ?>
                    <a href="mailto:<?php the_field('mail_contact', 'option'); ?>"><?php the_field('mail_contact', 'option'); ?></a>
                </div>
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
                <div class="social-list">
                    <h2>Suivez nous sur les réseaux sociaux</h2>
                    <?php if( have_rows('reseaux_sociaux', 'option') ): ?>

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

                    <?php endif; ?>
                </div>
                <div class="partners-list">
                    <h2>Tutelles</h2>

                    <?php if( have_rows('partenaires', 'option') ): ?>

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

                    <?php endif; ?>
                </div>
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
    $map = get_field('map', 'option');
?>   
<script>
    /* INIT DARKMODE */
    new Darkmode().showWidget();   
    
    /* INIT LEAFLET MAP */
    
    var mymap = L.map('map-location').setView([<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>], <?php echo $map['zoom']; ?>);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoicnZhbGxhdXIiLCJhIjoiY2sxOThhNzF4MXRkazNucGZ4OXlybm9zeSJ9.b5ny4TzVcN6m5skhw151Ig'
    }).addTo(mymap);
</script>
</body>
</html>
