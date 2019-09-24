<?php

get_header(); 

$format = get_post_format();
$categories = get_the_terms( $post->ID, 'category');  
if (is_array($categories) || is_object($categories))
{
  foreach ($categories as $term_slug) {        
     array_push($terms, $term_slug->slug);
  }
}
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
    <?php get_template_part( 'template-parts/nav-box', '' ); ?>

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
        <h2>D'autres actualités sur le même thème :</h2>
        <!-- Boucle d'article sur le même thème -->
        <div class="post-loop event-loop">

            <?php                
            while ( $the_query->have_posts() ) {
                $the_query->the_post();
                global $EM_Event;
                ?>
            <a class="post-preview event-post" href="<?php the_permalink(); ?>">
                <div>
                    <p><?php $dateEvent = new DateTime($EM_Event->event_start_date);
                            setlocale(LC_TIME, $locale);
                            echo strftime("%d %B %Y", strtotime($dateEvent->format('d M Y')));
                            ?>
                    </p>
                    <h3><?php the_title(); ?></h3>
                </div>

                <?php if (get_the_post_thumbnail()) {
                    ?>
                <div class="post-img event-img">
                    <?php the_post_thumbnail(); ?>
                </div>

                <?php 
                    
//                    echo $EM_Event->output_single();
//                    var_dump($EM_Event);
                    }
                    ?>
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
    wp_reset_postdata();
    ?>
</div>
    <?php
endwhile; // End of the loop.

get_footer();

?>