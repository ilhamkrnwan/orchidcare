<?php
/**
 * Template Name: Blog / Artikel
 * File: archive.php
 */

get_header();
$wa_url = orchid_wa_url('Halo Orchid Care, saya ingin bertanya seputar artikel dan produk.');
?>

<main id="main-content" class="blog-archive-page">

    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php
    $blog_title = 'Artikel & Edukasi Orchid Care';
    if (is_category()) {
        $blog_title = single_cat_title('Kategori: ', false);
    } elseif (is_tag()) {
        $blog_title = single_tag_title('Tag: ', false);
    } elseif (is_search()) {
        $blog_title = 'Hasil Pencarian: "' . get_search_query() . '"';
    }
    orchid_page_hero(
        'EDUKASI & INFORMASI',
        $blog_title,
        'Panduan praktis peracikan kimia, tips kebersihan rumah tangga, bisnis laundry profesional, serta perbandingan produk dari tim ahli PT Indotech Berkah Abadi.'
    );
    ?>

    <!-- ═══ MAIN CONTENT & SIDEBAR ═══ -->
    <section class="blog-content-section" style="padding: 3.5rem 0;">
        <div class="container">
            
            <!-- Category Filter Tabs -->
            <div class="blog-categories-bar" style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-bottom: 3rem; justify-content: center;">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" 
                   class="btn-tab <?php echo (!is_category() && !is_tag()) ? 'is-active' : ''; ?>" 
                   style="padding: 0.6rem 1.25rem; border-radius: 50px; background: <?php echo (!is_category() && !is_tag()) ? 'var(--color-ink, #16361E)' : '#E8F5E9'; ?>; color: <?php echo (!is_category() && !is_tag()) ? '#fff' : 'var(--color-ink)'; ?>; font-weight: 600; text-decoration: none; font-size: 0.9rem;">
                    Semua Artikel
                </a>
                <?php
                $categories = get_categories(['hide_empty' => true]);
                foreach ($categories as $cat) {
                    $active_class = is_category($cat->term_id) ? 'is-active' : '';
                    $bg_color     = is_category($cat->term_id) ? 'var(--color-ink, #16361E)' : '#E8F5E9';
                    $text_color   = is_category($cat->term_id) ? '#fff' : 'var(--color-ink)';
                    echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="btn-tab ' . $active_class . '" style="padding: 0.6rem 1.25rem; border-radius: 50px; background: ' . $bg_color . '; color: ' . $text_color . '; font-weight: 600; text-decoration: none; font-size: 0.9rem;">' . esc_html($cat->name) . ' (' . $cat->count . ')</a>';
                }
                ?>
            </div>

            <?php if (have_posts()) : ?>
                <div class="blog-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card reveal" style="background: #fff; border-radius: 1.25rem; overflow: hidden; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 10px 25px rgba(0,0,0,0.03); display: flex; flex-direction: column; transition: transform 0.25s ease, box-shadow 0.25s ease;">
                            
                            <!-- Thumbnail -->
                            <a href="<?php the_permalink(); ?>" class="blog-thumb" style="position: relative; display: block; aspect-ratio: 16/9; overflow: hidden; background: #eef2eb;">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('orchid-card', ['style' => 'width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;', 'loading' => 'lazy']); ?>
                                <?php else : ?>
                                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #16361E, #2E7D32); display: flex; align-items: center; justify-content: center; color: #fff; font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700;">
                                        Orchid Care
                                    </div>
                                <?php endif; ?>
                                
                                <?php
                                $cats = get_the_category();
                                if ($cats) : ?>
                                    <span style="position: absolute; top: 1rem; left: 1rem; background: #D81B80; color: #fff; padding: 0.25rem 0.75rem; border-radius: 50px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">
                                        <?php echo esc_html($cats[0]->name); ?>
                                    </span>
                                <?php endif; ?>
                            </a>

                            <!-- Card Body -->
                            <div class="blog-body" style="padding: 1.5rem; display: flex; flex-direction: column; flex-grow: 1;">
                                <div class="blog-meta" style="font-size: 0.85rem; color: #777; margin-bottom: 0.75rem; display: flex; gap: 0.5rem; align-items: center;">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('d M Y'); ?></time>
                                    <span>•</span>
                                    <span><?php echo esc_html(get_the_author()); ?></span>
                                </div>

                                <h3 class="blog-title" style="font-family: var(--font-heading); font-size: 1.25rem; font-weight: 700; line-height: 1.4; margin: 0 0 0.75rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--color-ink, #16361E); text-decoration: none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <p class="blog-excerpt" style="color: #666; font-size: 0.95rem; line-height: 1.6; margin: 0 0 1.5rem; flex-grow: 1;">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20, '...')); ?>
                                </p>

                                <a href="<?php the_permalink(); ?>" class="blog-read-more" style="color: #D81B80; font-weight: 700; font-size: 0.9rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                                    Baca Artikel <span>→</span>
                                </a>
                            </div>

                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrap" style="margin-top: 3.5rem; text-align: center;">
                    <?php the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => '← Sebelumnya',
                        'next_text' => 'Berikutnya →',
                    ]); ?>
                </div>

            <?php else : ?>
                <div class="no-posts-box" style="text-align: center; padding: 4rem 2rem; background: #fff; border-radius: 1.5rem; border: 1px dashed #ccc;">
                    <h3 style="font-family: var(--font-heading); color: var(--color-ink); font-size: 1.5rem; margin-bottom: 0.5rem;">Belum Ada Artikel Diterbitkan</h3>
                    <p style="color: #666; max-width: 500px; margin: 0 auto 1.5rem;">Artikel edukasi dan tips dari PT Indotech Berkah Abadi akan segera diterbitkan.</p>
                    <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn btn-ink">Lihat Katalog Produk</a>
                </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
