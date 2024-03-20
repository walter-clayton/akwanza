<?php
/**
 * The main index template.
 */
get_header();
?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main" >

        <?php include 'content-header.php';  ?>
        <?php include 'content-section1.php';  ?>
         <?php include 'content-section2.php';  ?>
        <?php include 'content-section3.php';  ?> 
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
        ?>
                <article <?php post_class(); ?>>
                    <div class="featured-image-container">
                        <?php the_post_thumbnail('my-custom-image-size', array('class' => 'img-fluid')); ?>
                    </div>
                </article><!-- #post-## -->
        <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            the_posts_navigation();
        else :
            get_template_part('content-none');
        endif;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
include 'content-footer.php';
?>
