<?php

get_header(); 


while ( have_posts() ) : the_post();
?>
<div id="primary" class="content-area <?php echo esc_html( $categories[0]->slug );?>">
    <?php			
    if (get_the_post_thumbnail()) {
    ?>
    <header id="cover">
        <?php the_post_thumbnail(); ?>
    </header>
    <?php 
    }
    ?>

    <div class="wrapper-layout">
        <main id="main" class="site-main" role="main">

            <article id="post-<?php the_ID(); ?>">


                <header>
                    <p class="post-meta"><?php the_date(); ?></p>
                    <h1><?php the_title() ?></h1>
                </header>
                <section>
                    <?php the_content();?>
                </section>

                <!--
                <?php 
                 if ( get_edit_post_link() ) : 
                    edit_post_link(
                        sprintf(
                            esc_html__( 'Edit %s', 'theme-aeris' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                 endif; 
                ?>
-->



            </article>

        </main><!-- #main -->

        
        <?php get_template_part( 'template-parts/contextual-sidebar-single-event', '' );?>

    </div>
    <?php get_template_part( 'template-parts/nav-box', '' );?>

    <?php

    $args = array(
        'post_type'             => 'event',
        'post_status'           => array( 'publish' ),
        'posts_per_page'        => '2',            // -1 pour liste sans limite
        'post__not_in'          => array(get_the_ID()),    //exclu le post courant
        'orderby'               => 'date',
        'order'                 => 'DESC',
    );
    $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) {  
    ?>
    <footer class="read-more-article">
        <h2><?php echo __("D'autres événements sur le même thème", 'sedoo-wpth-labs'); ?> :</h2>
        <!-- Boucle d'article sur le même thème -->
        <div class="post-loop event-loop">
            <?php                
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
  
               
                ?>
           
            <a class="post-preview event-post" href="<?php the_permalink(); ?>">
                <div>
                    <p><?php 
                            $EmEvent = get_post_meta( $post->ID);
                            $dateEvent = new DateTime($EmEvent["_event_start_date"][0]);
                            $locale = get_locale();
                            setlocale(LC_TIME, $locale);
                            echo strftime("%d %B %Y", strtotime($dateEvent->format('d M Y')));
                        ?>
                    </p>
                    <h3><?php the_title(); ?></h3>
                </div>

                <div class="post-img event-img">
                    <?php if (get_the_post_thumbnail()) {
                        the_post_thumbnail();
                    } else {
                        if (catch_that_image() ==  "no_image" ){
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
                            <img class="object-fit-contain" src="<?php echo $image[0]; ?>" alt="" />
                        <?php } else {
                            echo '<img src="';
                            echo catch_that_image();
                            echo '" alt="" />'; 
                        }
                    }
                    ?>
                </div>
            </a>
            <?php
            }
        ?>
        </div>
    </footer>
    <?php 
    } else {
        // no posts found
    }
    /* Restore original Post Data */
  
    ?>
</div>
    <?php
endwhile; // End of the loop.

get_footer();

?>