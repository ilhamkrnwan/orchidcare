<?php get_header(); ?>

<main id="main-content" class="site-main container archive-page">
    <header class="archive-header">
        <h1 class="archive-title">Hasil pencarian: "<?php echo esc_html(get_search_query()); ?>"</h1>
    </header>

    <?php if (have_posts()) : ?>
        <div class="blog-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article class="blog-card reveal" id="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink(); ?>" class="blog-thumb">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('orchid-card', ['class' => 'blog-img', 'loading' => 'lazy']); ?>
                        <?php else : ?>
                            <div class="blog-img-placeholder"><span>Orchid Care</span></div>
                        <?php endif; ?>
                    </a>
                    <div class="blog-body">
                        <div class="blog-meta">
                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('d M Y'); ?></time>
                        </div>
                        <h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="blog-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18, '...')); ?></p>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
        <nav class="pagination-nav">
            <?php the_posts_pagination(['mid_size' => 2, 'prev_text' => '←', 'next_text' => '→']); ?>
        </nav>
    <?php else : ?>
        <div class="no-results">
            <h2>Tidak ada hasil</h2>
            <p>Maaf, pencarian kamu tidak menemukan hasil. Coba kata kunci lain.</p>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
