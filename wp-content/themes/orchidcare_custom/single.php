<?php
/**
 * Single Article Template (Detail Artikel Blog)
 * File: single.php
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    // 1. Calculate reading time
    $content    = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $read_time  = max(1, ceil($word_count / 200));

    // 2. Fetch categories
    $cats       = get_the_category();
    $cat_name   = !empty($cats) ? $cats[0]->name : 'ARTIKEL ORCHID CARE';

    // 3. WhatsApp contact URL for consultation
    $wa_url     = orchid_wa_url('Halo Orchid Care, saya membaca artikel "' . get_the_title() . '" dan ingin berkonsultasi mengenai produk/formulasi.');
    ?>

    <main id="main-content" class="single-article-page">

        <!-- ═══ 1. UNIFORM HERO BANNER ═══ -->
        <?php
        orchid_page_hero(
            strtoupper($cat_name),
            get_the_title(),
            ''
        );
        ?>

        <!-- ═══ 2. FLOATING ARTICLE META BAR ═══ -->
        <div class="container">
            <div class="article-meta-pill-bar-wrapper">
                <div class="article-meta-pill-bar">
                    <div class="article-meta-item">
                        <span class="article-author-avatar">
                            <?php echo esc_html(strtoupper(substr(get_the_author(), 0, 1))); ?>
                        </span>
                        <span><strong><?php the_author(); ?></strong></span>
                    </div>
                    <span class="article-meta-divider">•</span>
                    <div class="article-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('d F Y')); ?></time>
                    </div>
                    <span class="article-meta-divider">•</span>
                    <div class="article-meta-item">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span><?php echo esc_html($read_time); ?> Menit Baca</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══ 3. FEATURED IMAGE ═══ -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="article-featured-wrapper">
                <div class="article-featured-box">
                    <?php the_post_thumbnail('full', ['loading' => 'eager', 'alt' => get_the_title()]); ?>
                </div>
                <?php if (get_the_post_thumbnail_caption()) : ?>
                    <div class="article-featured-caption">
                        <?php echo esc_html(get_the_post_thumbnail_caption()); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- ═══ 4. MAIN CONTENT & ENTRY CARD ═══ -->
        <div class="article-container">
            <article class="article-entry-card">
                
                <!-- Entry Content -->
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <!-- Tags List -->
                <?php
                $tags = get_the_tags();
                if ($tags) : ?>
                    <div class="article-tags-wrapper">
                        <span class="article-tag-label">Tag Terkait:</span>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="article-tag-chip">
                                #<?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Share Bar -->
                <div class="article-share-card">
                    <div class="article-share-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                        Bagikan Artikel Ini:
                    </div>
                    <div class="article-share-btns">
                        <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_permalink()); ?>" 
                           target="_blank" rel="noopener" class="share-btn share-btn--wa">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>" 
                           target="_blank" rel="noopener" class="share-btn share-btn--fb">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode(get_the_title()); ?>&url=<?php echo rawurlencode(get_permalink()); ?>" 
                           target="_blank" rel="noopener" class="share-btn share-btn--tw">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                            Twitter / X
                        </a>
                        <button type="button" class="share-btn share-btn--copy" onclick="navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); alert('Link artikel berhasil disalin!');">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            Salin Link
                        </button>
                    </div>
                </div>

            </article>

            <!-- ═══ 5. AUTHOR BIO CARD ═══ -->
            <div class="article-author-card">
                <div class="author-card-avatar">
                    <?php echo esc_html(strtoupper(substr(get_the_author(), 0, 1))); ?>
                </div>
                <div class="author-card-details">
                    <h4><?php the_author(); ?></h4>
                    <span class="author-card-role">Tim Redaksi &amp; Formulator Kimia — PT Indotech Berkah Abadi</span>
                    <p class="author-card-bio">
                        Tim ahli berpengalaman dalam riset, formulasi, dan edukasi perbekalan kesehatan rumah tangga (PKRT), industri laundry komersial, serta efisiensi peracikan biang konsentrat di Sleman, D.I. Yogyakarta.
                    </p>
                </div>
            </div>

            <!-- ═══ 6. WHATSAPP CONSULTATION CTA ═══ -->
            <div class="article-cta-card">
                <div class="article-cta-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    KONSULTASI GRATIS FORMULASI &amp; PRODUK
                </div>
                <h3>Punya Pertanyaan Mengenai Artikel Ini?</h3>
                <p>Konsultasikan kebutuhan formulasi kimia, peracikan biang konsentrat, atau pasokan grosir langsung bersama tim spesialis kami via WhatsApp.</p>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-coral btn-lg">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                    Konsultasi via WhatsApp
                </a>
            </div>

            <!-- ═══ 7. PREVIOUS / NEXT ARTICLE NAVIGATION ═══ -->
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            if ($prev_post || $next_post) : ?>
                <div class="article-nav-box">
                    <?php if ($prev_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="article-nav-item article-nav-item--prev">
                            <span class="article-nav-label">← Artikel Sebelumnya</span>
                            <span class="article-nav-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                        </a>
                    <?php else : ?>
                        <div></div>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="article-nav-item article-nav-item--next">
                            <span class="article-nav-label">Artikel Selanjutnya →</span>
                            <span class="article-nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- ═══ 8. RELATED ARTICLES SECTION ═══ -->
        <?php
        if ($cats) {
            $cat_ids = wp_list_pluck($cats, 'term_id');
            $related_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => [get_the_ID()],
                'category__in'   => $cat_ids,
            ]);

            if ($related_query->have_posts()) : ?>
                <section class="related-articles-section">
                    <div class="container">
                        <div class="related-section-header">
                            <span class="chip-tag chip-tag--mint" style="margin-bottom: 0.5rem;">REKOMENDASI</span>
                            <h3>Artikel Terkait Lainnya</h3>
                        </div>
                        <div class="related-articles-grid">
                            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                <article class="blog-card reveal" style="background: #fff; border-radius: 1.25rem; overflow: hidden; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 10px 25px rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.25s ease, box-shadow 0.25s ease;">
                                    
                                    <a href="<?php the_permalink(); ?>" class="blog-thumb" style="position: relative; display: block; aspect-ratio: 16/9; overflow: hidden; background: #eef2eb;">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('orchid-card', ['style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;', 'loading' => 'lazy']); ?>
                                        <?php else : ?>
                                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #16361E, #237A32); display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-display); font-size: 1.1rem; font-weight: 700;">
                                                Orchid Care
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php
                                        $rel_cats = get_the_category();
                                        if ($rel_cats) : ?>
                                            <span style="position: absolute; top: 0.75rem; left: 0.75rem; background: #D81B80; color: #fff; padding: 0.25rem 0.65rem; border-radius: 50px; font-size: 0.72rem; font-weight: 700; text-transform: uppercase;">
                                                <?php echo esc_html($rel_cats[0]->name); ?>
                                            </span>
                                        <?php endif; ?>
                                    </a>

                                    <div class="blog-body" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                                        <div class="blog-meta" style="font-size: 0.82rem; color: #777; margin-bottom: 0.6rem; display: flex; gap: 0.4rem; align-items: center;">
                                            <time datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('d M Y')); ?></time>
                                        </div>

                                        <h4 class="blog-title" style="font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; line-height: 1.35; margin: 0 0 0.5rem;">
                                            <a href="<?php the_permalink(); ?>" style="color: var(--ink); text-decoration: none;">
                                                <?php the_title(); ?>
                                            </a>
                                        </h4>

                                        <p class="blog-excerpt" style="color: #666; font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex-grow: 1;">
                                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 16, '...')); ?>
                                        </p>

                                        <a href="<?php the_permalink(); ?>" class="blog-read-more" style="color: #D81B80; font-weight: 700; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                                            Baca Artikel <span>→</span>
                                        </a>
                                    </div>

                                </article>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </section>
            <?php endif;
        }
        ?>

    <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
