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
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="wrapper-layout">
                <?php //if (have_posts()): the_post(); ?>
                <div class="author-header">
                    <h1> 
                        <?php 
                            //echo get_the_author_meta('user_firstname', get_the_author_meta('ID'));
                        ?> 
                        <?php
                            //echo get_the_author_meta('user_lastname');    
                        ?>
                        John Doe
                    </h1>
                    <p class="h2"><?php //the_field('poste', 'user_'.get_the_author_meta('ID'));?>
                        Chercheur IRAP<br>
                        <small>Galaxies, Astrophysique des Hautes Energies et Cosmologie</small>
                    </p>
                    
                </div>
                <div class="author-card">
                    <div>
                        <div class="img-author">
                            <img src="<?php echo get_template_directory_uri() . '/image/john-doe.jpg'; ?>"/>
                        </div>
                        <div>
                            <p><b>Email :</b>
                                <a href="mailto:<?php echo get_the_author_meta('user_email'); ?>">
                                    <?php echo get_the_author_meta('user_email'); ?>
                                </a>
                            </p>
                            <p><b>Téléphone :</b>
                                <a href="tel:<?php echo get_the_author_meta('user_phone'); ?>">
                                    <?php echo get_the_author_meta('user_phone'); ?>
                                </a>
                            </p>
                            <p><b>Bureau :</b>308</p>
                            <p><b>Insitution :</b>OMP</p>
                            <p><b>Adresse professionnelle :</b>14 avenue Édouard Belin, 31400 Toulouse</p>
                            <p><b>Site web personnel :</b><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><?php echo get_the_author_meta('user_url'); ?></a></p>
                        </div>
                    </div>
                    <div>
                        <h2>À propos de l'auteur</h2>
                        <p><?php //echo get_the_author_meta('user_description'); ?>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In scelerisque turpis et arcu fermentum, eu scelerisque odio accumsan. Mauris neque sem, pulvinar nec felis ultricies, varius sagittis neque. Ut molestie neque id dui tincidunt venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae sollicitudin dui. Phasellus ac tempus dui. Morbi iaculis nulla ac nisl scelerisque euismod. Quisque nec massa id arcu finibus scelerisque ac quis mauris. Pellentesque imperdiet tincidunt lacus, ac porttitor nibh pulvinar semper. Sed aliquam auctor augue, vel fermentum nulla varius quis. Sed fermentum nunc a quam pulvinar imperdiet. Etiam luctus pretium convallis. Praesent sed congue orci. Proin fermentum sem id nunc dignissim mollis. Sed viverra lacus vel felis placerat ornare. Cras tincidunt non sem eget vehicula. 
                        </p>
                    </div>
                </div>
                <section class="author-content wrapper-content">
                    <div>
                        <h2>CV / Fonctions</h2>
                        <ul>
                            <li>Depuis 2005 : Maître de Conférences à l’Université Paul Sabatier, Toulouse, France.
                            </li>                            <li>Depuis 2005 : Maître de Conférences à l’Université Paul Sabatier, Toulouse, France.
                            </li>                            <li>Depuis 2005 : Maître de Conférences à l’Université Paul Sabatier, Toulouse, France.
                            </li>                            <li>Depuis 2005 : Maître de Conférences à l’Université Paul Sabatier, Toulouse, France.
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2>Recherche</h2>
                        <b>Thématiques</b>
                        <ul>
                            <li>Entomologie</li>
                            <li>Relations tritrophiques : plante / insecte / insecte parasitoïde</li>
                            <li>Lutte biologique</li>
                        </ul>
                    </div>
                    <div>
                        <h2>Responsabilités</h2>
                        <ul>
                            <li>Référent de la discipline « Biologie Animale »</li>

                            <li>Responsable du module de « Sociétés d’Insectes »</li>
                            <li>Co-responsable du module d’ « Entomologie »</li>
                            <li>Co-responsable du module d'« Expertise Naturaliste »</li>

                            <li>Membre de la commission d’Organisation des séminaires (CLAS) (Ecolab)</li>
                            <li>Membre de la commission Véhicules (Ecolab).</li>
                            <li>Membre de la Commission Locale Hygiène Sécurité et Conditions de Travail du 4R1 CHLCT (Ecolab).</li>
                            <li>Membre de la commission informatique (Ecolab).</li>
                        </ul>
                    </div>
                    <div>
                        <h2>Principales publications</h2>
                        <ul>
                        <li><b>Campan, E.</b>, Havard, S., Sagouis, A., Pelissier, C., Muller, F., Villemant, C., Savriama, Y., Guery, D., Hu, J., Ponsard, S. (2014) Acceptability and suitability of the European Ostrinia nubilalis Hübner for Macrocentrus cingulum Brischke from Asia and Europe. Biological Control. 74, 13-20</li>

                        <li>Havard, S.,Pelissier, C., Ponsard, S.,<b>Campan, E.</b> (2014). Suitability of three Ostrinia Species as hosts for Macrocentus cingulum : A comparison of their encapsulation abilities, Insect Science, 21, 93-102.</li>

                        <li>Pélissié B, Ponsard S, Tokarev YS, Audiot P, Pélissier C, Sabatier R, Meusnier S, Chaufaux J, Delos M, <b>Campan E</b>, Malysh JM, Frolov AN & Bourguet D. 2010. Did the introduction of maize into Europe provide enemy-free space to Ostrinia nubilalis ? Parasitism differences between two sibling species of the genus Ostrinia. Journal of Evolutionary Biology, 23(2), 350-361.</li>

                        <li>Le Roux V., Dugravot S., <b>Campan E</b>., Dubois F., Vincent C. & Giordanengo P. 2008. Wild Solanum resistance to aphids : antixenosis or antibiosis ? Journal of Economic Entomology. 101 (2) 584-591.</li>

                        <li>Perez-Malauf R., Rafalimanana H., <b>Campan E</b>., Fleury F. & Kaiser L. 2008. Differentiation of innate but not learnt responses to host-habitat odours contributes to rapid host finding in a parasitoid genotype. Physiological Entomology, 33, 226-232.</li>

                        <li>Le Roux V., <b>Campan E</b>., Dubois F., Vincent C. & Giordanengo P. 2007. Screening for resistance against Myzus percisae and Macrosiphum euphorbiae among wild Solanum. Annals of Applied Biology.151, 83-88.</li>

                        <li>Ameline A., Couty A., Dugravot S., <b>Campan E</b>., Dubois F. & Giordanengo P. 2007 Immediate alteration of Macrosiphum euphorbiae host plant selection behavior after biotic and abiotic damage inflicted potato. Entomologia Experimentalis et Applicata, 123 (2), 129-137.</li>

                        <li><b>Campan E</b>. & Benrey B. 2006. Effects of seed type and bruchid genotype on the performance and oviposition behavior of Zabrotes subfasciatus (Coleoptera: Bruchidae). Insect Science,13, 309-318.</li>

                        <li>H. Azzouz, E. Campan, A. Cherqui, J. Saguez, L. Jouanin, P. Giordanengo, & L. Kaiser 2005: "Potential effects of plant protease inhibitors, Oryzacystatin I and soybean Bowman-Birk inhibitor on the aphid parasitoid Aphidius ervi (Hymenoptera, Braconidae)" Journal of Insect Physiology, 51 (8), 941-951.</li>

                        <li>H. Azzouz, A. Cherqui, E. Campan, Y. Rahbe, G. Duport, L. Jouanin, L. Kaiser & P. Giordanengo, 2005: "Effects of plant protease inhibitor Oryzacystatin I and soybean Bowman-Birk inhibitor on the aphid Macrosiphum euphorbiae (Homoptera, Aphididae) and its parasitoid Aphelinus abdominalis (Hymenoptera,Aphelinidae)" Journal of Insect Physiology51: 75-86.</li>

                        <li><b>Campan E</b>., Callejas A., Rahier M. & Benrey B. (2005). Interpopulation variation in a larval parasitoid of bruchids, Stenocorse bruchivora (Hymenoptera: Braconidae): host plant effects. Environmental Entomology. 32(2) 457-465.</li>

                        <li>E. Campan & B. Benrey, 2004. "Behavior and performance of a specialist and a generalist parasitoid of bruchids on wild and cultivated beans ". Biological Control 30: 220-228.</li>

                        <li>E. Campan, A. Couty, Y. Carton, M.H. Pham-Delegue & L. Kaiser, 2002. "Variability and genetic components of innate fruit odour recognition in a parasitoid of Drosophila" Physiological Entomology. 27: 243-250.</li>

                        <li>S. Aron, E. Campan, J.J. Boomsma, & L. Passera, 1998. "Social structure and split sex-ratios in the ant Pheidole pallidula". Ethology, Ecology and Evolution, 11: 209-227.</li>
                        </ul>
                    </div>
                    <div>
                        <h2>Projets</h2>
                    </div>
                    <div>
                        <h2>Enseignement</h2>
                    </div>
                    <div>
                        <h2>Réseaux Métiers</h2>
                    </div>
                </section>
                                
                <?php //endif; ?>
                
            </div>
		</main><!-- #main -->
        <aside id="stickyMenu">
            <div>
                <p>Sommaire</p>
                <nav role="sommaire">
                    <ol id="tocList">
                    </ol>
                </nav>
                <button class="bobinette">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <rect fill="none" width="30" height="30"/>
                            <polyline points="
                            10.71,2.41 23.29,15 10.71,27.59 	"/>
                    </svg>                
                </button>
            </div>
        </aside>
	</div><!-- #primary -->
<?php

get_footer();
