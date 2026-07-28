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
    $cat_name   = !empty($cats) ? $cats[0]->name : 'EDUKASI & PANDUAN';

    // 3. WhatsApp contact URL for consultation
    $wa_url     = orchid_wa_url('Halo Orchid Care, saya membaca artikel "' . get_the_title() . '" dan ingin berkonsultasi mengenai produk/formulasi.');
    $thumb_url  = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/img/product-laundry.png';
?>

<!-- Inline Responsive Styling untuk Clean 2-Column Single Article Layout (Identik dengan Single Product) -->
<style>
.single-article-page {
    width: 100%;
}
.single-article-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.single-article-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3.5rem;
    align-items: start;
    margin-bottom: 3.5rem;
}
.entry-body-text {
    color: rgba(22, 54, 30, 0.88);
    font-size: 1.05rem;
    line-height: 1.85;
    margin-bottom: 2.5rem;
}
.entry-body-text h2 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.65rem;
    margin: 2.25rem 0 1rem;
    line-height: 1.3;
}
.entry-body-text h3 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.35rem;
    margin: 1.75rem 0 0.75rem;
    line-height: 1.35;
}
.entry-body-text p {
    margin-bottom: 1.45rem;
}
/* Link Styling dalam Artikel */
.entry-body-text a {
    color: #D81B80;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid rgba(216, 27, 128, 0.35);
    padding-bottom: 1px;
    transition: all 0.2s ease-in-out;
}
.entry-body-text a:hover {
    color: #16361E;
    border-bottom-color: #88C425;
    background-color: rgba(234, 248, 208, 0.5);
    border-radius: 4px;
    padding-left: 3px;
    padding-right: 3px;
}

/* Gambar dalam Artikel Harus Full Width */
.entry-body-text img,
.entry-body-text figure,
.entry-body-text .wp-block-image {
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
    display: block !important;
    margin-top: 1.85rem !important;
    margin-bottom: 1.85rem !important;
    border-radius: 1.25rem !important;
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.06);
}
.entry-body-text figure img {
    margin: 0 !important;
    box-shadow: none !important;
    border-radius: 1.25rem 1.25rem 0 0 !important;
}
.entry-body-text figure {
    overflow: hidden;
    border: 1px solid rgba(22, 54, 30, 0.08);
    background: #fafafa;
}
.entry-body-text figcaption {
    text-align: center;
    font-size: 0.88rem;
    color: rgba(22, 54, 30, 0.75);
    padding: 0.6rem 1rem;
    background: #f4faf0;
    font-style: italic;
    border-top: 1px solid rgba(22, 54, 30, 0.06);
}

/* Callout Box "Baca Juga" Link */
.baca-juga-callout {
    background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%);
    border: 1px solid rgba(136, 196, 37, 0.4);
    border-left: 5px solid #88C425;
    border-radius: 1.25rem;
    padding: 1.1rem 1.4rem;
    margin: 2rem 0;
    display: flex;
    align-items: center;
    gap: 1.1rem;
    box-shadow: 0 4px 15px rgba(22, 54, 30, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.baca-juga-callout:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.08);
}
.baca-juga-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: #16361E;
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 0.4rem 0.85rem;
    border-radius: 999px;
    flex-shrink: 0;
    letter-spacing: 0.04em;
}
.baca-juga-content {
    font-weight: 700;
    color: #16361E;
    font-size: 0.98rem;
    line-height: 1.5;
}
.baca-juga-content a {
    color: #16361E !important;
    text-decoration: none !important;
    border-bottom: 2px solid #D81B80 !important;
    transition: color 0.2s ease, border-color 0.2s ease !important;
}
.baca-juga-content a:hover {
    color: #D81B80 !important;
    background-color: transparent !important;
}

.entry-body-text blockquote {
    border-left: 4px solid #88C425;
    background: #EAF8D0;
    padding: 1.25rem 1.5rem;
    border-radius: 0 1rem 1rem 0;
    font-style: italic;
    margin: 1.75rem 0;
    color: #16361E;
}
@media (max-width: 992px) {
    .single-article-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
}
@media (max-width: 768px) {
    .single-article-page section {
        padding: 3rem 0 !important;
    }
    .entry-body-text {
        font-size: 0.98rem;
        line-height: 1.72;
    }
    .baca-juga-callout {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.65rem;
    }
}
</style>

<main id="main-content" class="single-article-page">

    <!-- ═══ 1. ELEGANT PAGE HERO BANNER ═══ -->
    <?php
    orchid_page_hero(
        strtoupper($cat_name),
        get_the_title(),
        'Dipublikasikan pada ' . get_the_date('d F Y') . ' • ' . $read_time . ' Menit Baca'
    );
    ?>

    <!-- ═══ 2. MAIN ARTICLE CONTENT & SIDEBAR GRID (2-COLUMN MATCHING SINGLE PRODUCT) ═══ -->
    <section class="article-main-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="single-article-grid">
                
                <!-- KOLOM KIRI (UTAMA): FEATURED IMAGE, CONTENT & AUTHOR BIO -->
                <div>
                    
                    <!-- Featured Image -->
                    <div style="position: relative; border-radius: 1.75rem; overflow: hidden; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 35px rgba(22, 54, 30, 0.06); background: #fafafa; margin-bottom: 2.5rem;">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius: 1.75rem;" loading="eager" onerror="this.onerror=null; this.src='<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>'; this.classList.add('img-fallback-placeholder');">
                        <span class="chip-tag chip-tag--mint" style="position: absolute; top: 1.25rem; left: 1.25rem; font-size: 0.8rem; padding: 0.35rem 0.9rem; border-radius: 999px;">
                            <?php echo esc_html($cat_name); ?>
                        </span>
                    </div>

                    <!-- Entry Body Text -->
                    <div class="entry-body-text">
                        <?php the_content(); ?>
                    </div>

                    <!-- Share Buttons Bar -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; margin-bottom: 2.5rem;">
                        <div style="font-weight: 800; color: #16361E; font-size: 0.95rem;">
                            Bagikan Artikel Ini:
                        </div>
                        <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
                            <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.55rem 1.1rem; text-decoration: none; background: #25D366; color: #ffffff; font-weight: 700; border-radius: 999px; box-shadow: none !important;">
                                WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.55rem 1.1rem; text-decoration: none; background: #1877F2; color: #ffffff; font-weight: 700; border-radius: 999px; box-shadow: none !important;">
                                Facebook
                            </a>
                            <button type="button" onclick="navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); alert('Link artikel berhasil disalin!');" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.55rem 1.1rem; background: #16361E; color: #ffffff; font-weight: 700; border-radius: 999px; border: none; cursor: pointer; box-shadow: none !important;">
                                Salin Link
                            </button>
                        </div>
                    </div>

                    <!-- Author Bio & Editorial Validation Card -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.65rem 1.75rem; display: flex; gap: 1.35rem; align-items: center; position: relative; margin-bottom: 2.5rem;">
                        <div style="width: 56px; height: 56px; background: #16361E; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.3rem; flex-shrink: 0; box-shadow: 0 4px 12px rgba(22,54,30,0.15);">
                            <?php echo esc_html(strtoupper(substr(get_the_author(), 0, 1))); ?>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; gap: 0.6rem; flex-wrap: wrap; margin-bottom: 0.35rem;">
                                <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.12rem; font-weight: 800; margin: 0;">
                                    Penulis: <?php echo esc_html(get_the_author()); ?>
                                </h4>
                                <span style="display: inline-flex; align-items: center; gap: 0.3rem; background: #16361E; color: #88C425; font-size: 0.76rem; font-weight: 800; padding: 0.25rem 0.75rem; border-radius: 999px; letter-spacing: 0.02em;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Divalidasi Tim Redaksi
                                </span>
                            </div>
                            <p style="color: rgba(22, 54, 30, 0.82); font-size: 0.88rem; line-height: 1.55; margin: 0;">
                                Artikel ini ditulis oleh <strong><?php echo esc_html(get_the_author()); ?></strong> dan telah ditinjau serta divalidasi oleh <strong>Tim Redaksi PT Indotech Berkah Abadi</strong> untuk menjamin keakuratan informasi &amp; edukasi formulasi.
                            </p>
                        </div>
                    </div>

                    <!-- ═══ 2.5 COMMENTS & DISCUSSION SECTION ═══ -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>

                </div>

                <!-- KOLOM KANAN (SIDEBAR): KONSULTASI WA, RINGKASAN & ARTIKEL REKOMENDASI -->
                <div>
                    
                    <!-- Direct WhatsApp Consultation Box (Matching Single Product CTA Box) -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.75rem; margin-bottom: 2rem;">
                        <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.6rem; display: inline-block;">KONSULTASI FORMULASI</span>
                        <h4 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; color: #16361E; font-weight: 800; margin-bottom: 0.5rem; line-height: 1.3;">
                            Punya Pertanyaan Mengenai Artikel Ini?
                        </h4>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.93rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Konsultasikan kebutuhan formulasi kimia, peracikan biang konsentrat, atau pasokan grosir langsung bersama tim spesialis kami via WhatsApp.
                        </p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; width: 100%; box-shadow: none !important;">
                            <span>Konsultasi WA Sekarang &rarr;</span>
                        </a>
                    </div>

                    <!-- Quick Article Information Box -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.5rem; margin-bottom: 2rem;">
                        <h4 style="font-family: var(--font-display, sans-serif); font-size: 1.1rem; color: #16361E; font-weight: 800; margin-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 0.5rem;">Informasi Artikel</h4>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem; color: rgba(22, 54, 30, 0.8);">
                            <div><strong>Kategori:</strong> <?php echo esc_html($cat_name); ?></div>
                            <div><strong>Tanggal Rilis:</strong> <?php echo esc_html(get_the_date('d F Y')); ?></div>
                            <div><strong>Waktu Baca:</strong> <?php echo esc_html($read_time); ?> Menit</div>
                            <div><strong>Penerbit:</strong> PT Indotech Berkah Abadi</div>
                        </div>
                    </div>

                    <!-- Recommended Articles Sidebar Widget -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.5rem;">
                        <h4 style="font-family: var(--font-display, sans-serif); font-size: 1.1rem; color: #16361E; font-weight: 800; margin-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 0.5rem;">Artikel Terkait</h4>
                        
                        <?php
                        $sidebar_posts = new WP_Query([
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => [get_the_ID()],
                        ]);
                        if ($sidebar_posts->have_posts()) :
                            while ($sidebar_posts->have_posts()) : $sidebar_posts->the_post();
                                $sb_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : get_template_directory_uri() . '/assets/img/product-laundry.png';
                        ?>
                            <div style="display: flex; gap: 0.85rem; align-items: center; margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
                                <a href="<?php the_permalink(); ?>" style="width: 70px; height: 60px; border-radius: 0.75rem; overflow: hidden; flex-shrink: 0; display: block; background: #ffffff;">
                                    <img src="<?php echo esc_url($sb_thumb); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                                <div>
                                    <h5 style="font-family: var(--font-display, sans-serif); font-size: 0.92rem; font-weight: 700; line-height: 1.3; margin: 0 0 0.25rem;">
                                        <a href="<?php the_permalink(); ?>" style="color: #16361E; text-decoration: none;"><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></a>
                                    </h5>
                                    <span style="font-size: 0.75rem; color: rgba(22, 54, 30, 0.6);"><?php echo get_the_date('d M Y'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); endif; ?>

                        <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 0.5rem;">
                            <span>Lihat Semua Artikel &rarr;</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 3. CTA BANNER PENUTUP (MATCHING ALL PAGES) ═══ -->
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

<?php endwhile; endif; ?>

<?php get_footer(); ?>
