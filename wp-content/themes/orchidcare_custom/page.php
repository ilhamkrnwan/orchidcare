<?php get_header(); ?>

<main id="main-content" class="site-main page-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php orchid_page_hero('INFORMASI', get_the_title(), ''); ?>
        <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
