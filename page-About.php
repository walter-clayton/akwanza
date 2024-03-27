<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_header(); ?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>

        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <?php wp_head(); ?>
            <title>Akwanza</title>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        </html>
        <?php include 'content-section3.php'; ?>

        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                ?>
                <article <?php post_class(""); ?>>

                </article><!-- #post-## -->
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;
            endwhile;
            the_posts_navigation();
        else:
            get_template_part('content-none');
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->
<!-- <?php include 'content-footer.php'; ?> -->