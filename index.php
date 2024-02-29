<?php
/**
 * The main index template.
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- Start of your HTML content from index.html -->
        <div class="introduction">
            <?php
            // You can use the WordPress function get_template_directory_uri() to get the path to your theme directory
            ?>
            <img
                src="<?php echo get_template_directory_uri(); ?>/banner-35-crowned-crane-2000x667.jpg"
                width="100%"
                alt="Wildlife Image"
                height="400"
            />

            <h2>Wildlife Protection Overview</h2>
            <p>
                Big Life strives to prevent the poaching of all wildlife within our area
                of operation. We track and apprehend poachers and collaborate with local
                prosecutors to ensure that they are punished to the fullest extent of
                the law. One of the largest employers of local Maasai in the ecosystem,
                Big Life's community rangers are expertly trained and well-equipped to
                tackle a variety of wildlife crimes. Since our inception, poaching of
                all animals has dramatically declined in our area of operation.
            </p>
            <h3>Overview</h3>
            <p>
                Big Life employs Maasai rangers from local communities who work
                collaboratively with a vast informer network and a number of tools to
                undertake a variety of activities including anti-poaching and
                trafficking, conflict mitigation, community support and much more. The
                2023 ranger activity in Kenya and Tanzania is summarized below:
            </p>
        </div>
        <div id="chart" class="svg-container"></div>
        <!-- End of your HTML content from index.html -->
        <?php
        if ( have_posts() ) :

            while ( have_posts() ) :

                the_post();
                ?>

                <article <?php post_class(); ?>>

                    <?php the_post_thumbnail( 'my-custom-image-size' ); ?>

                    <header class="entry-header">
                        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content( esc_html__( 'Continue reading &rarr;', 'my-custom-theme' ) ); ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;

            the_posts_navigation();

        else :
            get_template_part( 'content-none' );
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
