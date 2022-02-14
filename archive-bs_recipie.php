<?php
	/**
	 * The template for displaying archive pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bootscore
	 */
	
	get_header();
	?>

<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">
        
        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>  

        <div class="row">
            <div class="col">

                <main id="main" class="site-main">

                    <!-- Title & Description -->
                    <header class="page-header mb-4">
                        <h1><?php the_archive_title(); ?></h1>
                        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                    </header>

                    <?php 
                    $loop = new WP_Query( array( 'post_type' => 'graves', 'posts_per_page' => 10 ) ); 

                    while ( $loop->have_posts() ) : $loop->the_post();

                    the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
                    ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <div>
                        <?php bootscore_pagination(); ?>
                    </div>

                </main><!-- #main -->

            </div><!-- col -->

        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
