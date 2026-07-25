<?php
/**
 * Template Name: Blog / Artikel
 * File: archive.php
 */

get_header();
$wa_url = orchid_wa_url('Halo Orchid Care, saya ingin bertanya seputar artikel dan produk.');
?>

<!-- Inline Responsive Styling untuk Mobile Compatibility & Clean Layout -->
<style>
.blog-archive-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.blog-categories-bar {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 3.5rem;
}
.blog-tab {
    padding: 0.65rem 1.35rem;
    border-radius: 999px;
    background: #fafafa;
    border: 1px solid rgba(22, 54, 30, 0.1);
    color: #16361E;
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s ease;
}
.blog-tab:hover, .blog-tab.is-active {
    background: #16361E;
    color: #ffffff;
    border-color: #16361E;
}
.blog-editorial-list {
    display: flex;
    flex-direction: column;
    gap: 3rem;
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 4rem;
}
.editorial-row-item {
    display: grid;
    grid-template-columns: minmax(320px, 420px) 1fr;
    gap: 3rem;
    align-items: center;
    border-bottom: 1px solid rgba(22, 54, 30, 0.08);
    padding-bottom: 2.75rem;
}
@media (max-width: 768px) {
    .blog-archive-page section {
        padding: 3rem 0 !important;
    }
    .editorial-row-item {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
        padding-bottom: 2rem !important;
    }
    .editorial-thumb-box {
        height: 200px !important;
    }
    .blog-tab {
        font-size: 0.82rem;
        padding: 0.5rem 1rem;
    }
}
</style>

<main id="main-content" class="blog-archive-page">

    <!-- ═══ 1. ELEGANT HERO BANNER ═══ -->
    <?php
    $blog_title = 'Edukasi Kebersihan & Tips Usaha Laundry';
    if (is_category()) {
        $blog_title = single_cat_title('Kategori: ', false);
    } elseif (is_tag()) {
        $blog_title = single_tag_title('Tag: ', false);
    } elseif (is_search()) {
        $blog_title = 'Hasil Pencarian: "' . get_search_query() . '"';
    }
    orchid_page_hero(
        'PANDUAN & ARTIKEL EDUKASI',
        $blog_title,
        'Panduan praktis peracikan biang konsentrat 1kg jadi 15L, tips kebersihan rumah tangga, formulasi laundry profesional, serta edukasi dari tim spesialis PT Indotech Berkah Abadi.'
    );
    ?>

    <!-- ═══ 2. CATEGORY TABS & EDITORIAL ROW LIST ═══ -->
    <section class="blog-content-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <!-- Category Filter Tabs -->
            <div class="blog-categories-bar reveal">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" 
                   class="blog-tab <?php echo (!is_category() && !is_tag()) ? 'is-active' : ''; ?>">
                    Semua Artikel
                </a>
                <?php
                $categories = get_categories(['hide_empty' => true]);
                foreach ($categories as $cat) {
                    $active_class = is_category($cat->term_id) ? 'is-active' : '';
                    echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="blog-tab ' . $active_class . '">' . esc_html($cat->name) . ' (' . $cat->count . ')</a>';
                }
                ?>
            </div>

            <!-- List Artikel Editorial (Row Layout Spacious Tanpa Card Box) -->
            <div class="blog-editorial-list">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); 
                        $cats = get_the_category();
                        $cat_name = !empty($cats) ? $cats[0]->name : 'Edukasi';
                        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/product-laundry.png';
                    ?>
                        <!-- Editorial Row Item -->
                        <article class="editorial-row-item reveal">
                            <div class="editorial-thumb-box" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.06);">
                                <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
                                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                                </a>
                            </div>
                            <div>
                                <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                    <span class="chip-tag chip-tag--mint" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;"><?php echo esc_html($cat_name); ?></span>
                                    <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;"><?php echo esc_html(get_the_date('d F Y')); ?></span>
                                </div>
                                <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: #16361E; text-decoration: none;"><?php the_title(); ?></a>
                                </h3>
                                <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 26, '...')); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                    <span>Baca Selengkapnya &rarr;</span>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <div class="pagination-wrap" style="margin-top: 2rem; text-align: center;">
                        <?php the_posts_pagination([
                            'mid_size'  => 2,
                            'prev_text' => '&larr; Sebelumnya',
                            'next_text' => 'Berikutnya &rarr;',
                        ]); ?>
                    </div>

                <?php else : ?>
                    
                    <!-- SAMPLE DEMONSTRATION ARTICLES (SAFE FALLBACK DISPLAY) -->
                    <!-- Artikel 1 -->
                    <article class="editorial-row-item reveal">
                        <div class="editorial-thumb-box" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.06);">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-laundry.png'); ?>" alt="Biang Konsentrat Sabun" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--mint" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;">BIANG KONSENTRAT</span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;">Panduan Resmi</span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; text-decoration: none;">Cara Meracik Biang Konsentrat 1kg Jadi 15 Liter Sabun Siap Pakai</a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                Langkah praktis mencampur biang konsentrat dengan 14 Liter air bersih tanpa menggumpal untuk hasil kental &amp; busa melimpah.
                            </p>
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>

                    <!-- Artikel 2 -->
                    <article class="editorial-row-item reveal">
                        <div class="editorial-thumb-box" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.06);">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-parfum.png'); ?>" alt="Parfum Laundry Tahan Lama" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--lavender" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;">PARFUM LAUNDRY</span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;">Tips Laundry</span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; text-decoration: none;">Rahasia Parfum Laundry Wangi Tahan Lama Seharian Bebas Apek</a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                Teknik penyemprotan parfum finishing laundry yang tepat agar aroma mewahnya menempel kuat pada serat pakaian.
                            </p>
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>

                    <!-- Artikel 3 -->
                    <article class="editorial-row-item reveal">
                        <div class="editorial-thumb-box" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.06);">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-home.png'); ?>" alt="Pembersih Rumah Tangga PKRT" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--peach" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;">HOME CARE</span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;">Edukasi PKRT</span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; text-decoration: none;">Pentingnya Izin Edar PKRT Kemenkes RI untuk Keamanan Pembersih Harian</a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                Penjelasan lengkap mengenai standar pengujian laboratorium terakreditasi dan legalitas Kemenkes pada sabun pembersih.
                            </p>
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>

                <?php endif; ?>
            </div>

        </div>
    </section>

    <!-- ═══ 3. CTA BANNER PENUTUP (MATCHING BERANDA, ABOUT & CONTACT) ═══ -->
    <section class="cta-banner-penutup" id="cta-penutup" style="background: #16361E; color: #ffffff; padding: 5.5rem 0; position: relative; overflow: hidden; border-top: 3px solid #88C425;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 650px; height: 350px; background: radial-gradient(circle, rgba(136, 196, 37, 0.12) 0%, rgba(22, 54, 30, 0) 70%); pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 2; max-width: 820px; text-align: center;">
            <span style="background: #88C425; color: #16361E; font-weight: 800; font-size: 0.78rem; padding: 0.45rem 1.1rem; border-radius: 999px; font-family: var(--font-mono, monospace); display: inline-block; margin-bottom: 1.25rem; letter-spacing: 0.05em;">
                PABRIK &amp; SUPPLIER SABUN SLEMAN YOGYAKARTA
            </span>

            <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4vw, 2.6rem); line-height: 1.2; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
                Siap Bermitra dengan Produsen &amp; Supplier Sabun Tangan Pertama?
            </h2>

            <p style="color: #cbd5e1; font-size: 1.02rem; line-height: 1.65; margin: 0 auto 2.25rem; max-width: 680px;">
                Hubungi tim kemitraan <strong>Orchid Care (PT Indotech Berkah Abadi)</strong> untuk konsultasi pasokan grosir rutin, peluang keagenan, &amp; suplai sabun laundry kiloan se-Indonesia.
            </p>

            <div class="cta-buttons-wrap" style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none !important;">
                    <span>Hubungi Kemitraan WA</span>
                </a>

                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                    Lihat Katalog Produk
                </a>
            </div>

            <div style="margin-top: 2.75rem; display: flex; gap: 1.75rem; justify-content: center; flex-wrap: wrap; font-size: 0.88rem; color: #cbd5e1; border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1.5rem; font-weight: 600;">
                <span>✓ Pabrik Resmi Sleman, D.I. Yogyakarta</span>
                <span>✓ Izin Edar Kemenkes RI &amp; Halal MUI</span>
                <span>✓ Biang Konsentrat Hemat Ongkir 90%</span>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
