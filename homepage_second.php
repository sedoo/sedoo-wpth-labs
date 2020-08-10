<?php
/*
Template Name: Homepage image
*/
// Description (slogan)
$description = get_bloginfo( 'description', 'display' );

get_header('image');
?>
   <header id="cover" class="site-branding" style="background-image:url(<?php header_image()?>);">
            <div class="wrapper">
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php
                if ( $description || is_customize_preview() ) { ?>
                <h2 class="site-description"><?php echo $description; ?></h2>
                    <?php
                }
                ?>
            </div>
        </header>
	<div id="content" class="site-content">
<div id="primary" class="content-area">
    <main id="main" class="site-main">
     
        <div class="wrapper-layout home-content">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); ?>
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <?php the_content(); ?>
                </div>
                <?php 
                endwhile; 
            endif; ?>
            
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>