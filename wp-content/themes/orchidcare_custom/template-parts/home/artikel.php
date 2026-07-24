<?php
/**
 * Home — Artikel Terbaru (latest posts)
 */
$q = orchid_get_posts('post', 3);
if (!$q->have_posts()) { wp_reset_postdata(); return; }
?>

<section class="artikel-section" id="artikel">
    <div class="container">
        <div class="artikel-head reveal">
            <div>
                <span class="chip-tag chip-tag--coral">JURNAL</span>
                <h2 class="section-title">Artikel Terbaru</h2>
                <p class="section-desc">Info &amp; tips seputar bisnis laundry dan kewirausahaan.</p>
            </div>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" class="section-link">
                Artikel Lainnya
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="artikel-grid">
            <?php while ($q->have_posts()) : $q->the_post(); ?>
                <article class="artikel-card reveal">
                    <a href="<?php the_permalink(); ?>" class="artikel-thumb" aria-label="Baca: <?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('orchid-card', ['class' => 'artikel-img', 'loading' => 'lazy']); ?>
                        <?php else : ?>
                            <div class="artikel-img-placeholder"><span>Orchid Care</span></div>
                        <?php endif; ?>
                    </a>
                    <div class="artikel-meta">
                        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('d/m/Y')); ?></time>
                        <span class="artikel-meta-sep">·</span>
                        <span><?php the_author(); ?></span>
                    </div>
                    <h3 class="artikel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </article>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php wp_reset_postdata(); ?>
