<?php
/**
 * Template Name: Detail Produk
 * Post Type: product
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    $terms = get_the_terms(get_the_ID(), 'product_cat');
    $cat_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : 'Orchid Care';
    $cat_link = ($terms && !is_wp_error($terms)) ? get_term_link($terms[0]) : home_url('/produk');

    // Custom fields or default fallback values
    $sku       = get_post_meta(get_the_ID(), '_product_sku', true) ?: 'OC-PROD-' . get_the_ID();
    $ratio     = get_post_meta(get_the_ID(), '_product_ratio', true) ?: '1 kg biang konsentrat diracik mandiri jadi 15 Liter cairan siap pakai';
    $weight    = get_post_meta(get_the_ID(), '_product_weight', true) ?: '1000 gram (1 kg)';
    $aroma     = get_post_meta(get_the_ID(), '_product_aroma', true) ?: 'Super Fresh / Aroma Wewangian Impor';

    $wa_msg = "Halo Orchid Care, saya berminat dengan produk:\n* " . get_the_title() . " (Kode: {$sku}) *\n\nMohon informasi pemesanan, ketersediaan stok, dan penawaran harganya. Terima kasih!";
    $wa_url = orchid_wa_url($wa_msg);
    $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/product-laundry.png';
?>

<!-- Inline Responsive Styling untuk Mobile Compatibility & Clean Layout -->
<style>
.single-product-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.single-product-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: 3.5rem;
    align-items: start;
    margin-bottom: 4rem;
}
@media (min-width: 993px) {
    .product-sticky-col {
        position: sticky !important;
        top: 110px !important;
        align-self: start !important;
    }
}
.specs-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1.75rem;
}
.specs-table th, .specs-table td {
    padding: 0.85rem 1rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.08);
    font-size: 0.93rem;
    text-align: left;
}
.specs-table th {
    color: rgba(22, 54, 30, 0.7);
    font-weight: 700;
    width: 38%;
    background: #fafafa;
}
.specs-table td {
    color: #16361E;
}
@media (max-width: 992px) {
    .single-product-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
}
@media (max-width: 768px) {
    .single-product-page section {
        padding: 3rem 0 !important;
    }
}
</style>

<main id="main-content" class="single-product-page">
    
    <!-- ═══ 1. ELEGANT PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'DETAIL PRODUK — ' . strtoupper($cat_name),
        get_the_title(),
        'Kode Produk: ' . $sku . ' | Formulasi Resmi PT Indotech Berkah Abadi'
    ); ?>

    <!-- ═══ 2. MAIN PRODUCT DETAIL SECTION ═══ -->
    <section class="product-detail-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="single-product-grid">
                
                <!-- KOLOM KIRI: FOTO UTAMA & BADGES -->
                <div class="reveal product-sticky-col">
                    <div style="position: relative; border-radius: 1.75rem; overflow: hidden; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 35px rgba(22, 54, 30, 0.06); background: #fafafa; margin-bottom: 1.5rem;">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius: 1.75rem;" loading="lazy">
                        <span class="chip-tag chip-tag--mint" style="position: absolute; top: 1.25rem; left: 1.25rem; font-size: 0.8rem; padding: 0.35rem 0.9rem; border-radius: 999px;">
                            <?php echo esc_html($cat_name); ?>
                        </span>
                    </div>

                    <!-- Highlights Badge Bar -->
                    <div style="display: flex; gap: 0.65rem; flex-wrap: wrap;">
                        <span style="background: #EAF8D0; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.1); padding: 0.45rem 1rem; border-radius: 999px; font-size: 0.8rem; font-weight: 800;">
                            ✓ Legal &amp; Izin PKRT Kemenkes RI
                        </span>
                        <span style="background: #EAF8D0; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.1); padding: 0.45rem 1rem; border-radius: 999px; font-size: 0.8rem; font-weight: 800;">
                            ✓ Certified Halal MUI
                        </span>
                        <span style="background: #EAF8D0; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.1); padding: 0.45rem 1rem; border-radius: 999px; font-size: 0.8rem; font-weight: 800;">
                            ✓ Garansi Stok Pabrik Sleman
                        </span>
                    </div>
                </div>

                <!-- KOLOM KANAN: INFORMASI, SPESIFIKASI & ACTION WA -->
                <div class="reveal">
                    <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.75rem; display: inline-block;">DESKRIPSI PRODUK &amp; SPESIFIKASI</span>
                    
                    <h1 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4vw, 2.5rem); color: #16361E; font-weight: 800; line-height: 1.2; margin-bottom: 0.5rem;">
                        <?php the_title(); ?>
                    </h1>
                    <p style="color: rgba(22, 54, 30, 0.6); font-size: 0.92rem; font-family: var(--font-mono, monospace); font-weight: 700; margin-bottom: 1.25rem;">
                        SKU / Kode: <?php echo esc_html($sku); ?>
                    </p>

                    <!-- Short Excerpt / Summary -->
                    <div style="color: rgba(22, 54, 30, 0.8); font-size: 1rem; line-height: 1.68; margin-bottom: 1.75rem;">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Specifications Table -->
                    <div style="background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; overflow: hidden; margin-bottom: 2rem;">
                        <div style="padding: 1rem 1.25rem; background: #fafafa; border-bottom: 1px solid rgba(22, 54, 30, 0.08);">
                            <h3 style="font-family: var(--font-display, sans-serif); font-size: 1.05rem; color: #16361E; font-weight: 800; margin: 0;">Spesifikasi &amp; Detail Produksi</h3>
                        </div>
                        <table class="specs-table" style="margin: 0;">
                            <tr>
                                <th>Kategori Produk</th>
                                <td><?php echo esc_html($cat_name); ?></td>
                            </tr>
                            <tr>
                                <th>Kemasan / Berat</th>
                                <td><?php echo esc_html($weight); ?></td>
                            </tr>
                            <tr>
                                <th>Hasil Racikan / Rasio</th>
                                <td><strong style="color: #88C425;"><?php echo esc_html($ratio); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Varian / Aroma</th>
                                <td><?php echo esc_html($aroma); ?></td>
                            </tr>
                            <tr>
                                <th>Fasilitas Pabrik</th>
                                <td>PT Indotech Berkah Abadi (Sleman, D.I. Yogyakarta)</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Direct WhatsApp Order Action Box -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.75rem;">
                        <h4 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.2rem; color: #16361E; font-weight: 800; margin-bottom: 0.5rem;">
                            Tertarik dengan produk ini?
                        </h4>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.93rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Dapatkan penawaran harga grosir pabrik, pengiriman sampel, &amp; konsultasi kemitraan langsung dari CS resmi kami.
                        </p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; width: 100%; box-shadow: none !important;">
                            <span>Pesan via WhatsApp Sekarang &rarr;</span>
                        </a>
                    </div>

                </div>

            </div>

            <!-- FULL DESCRIPTION & MIXING INSTRUCTIONS -->
            <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.75rem; padding: 2.5rem; margin-bottom: 3.5rem;">
                <span class="chip-tag chip-tag--mint" style="margin-bottom: 0.75rem; display: inline-block;">PANDUAN &amp; APLIKASI</span>
                <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.75rem; color: #16361E; font-weight: 800; margin-bottom: 1.25rem;">
                    Deskripsi Lengkap &amp; Petunjuk Pemakaian
                </h2>
                <div style="color: rgba(22, 54, 30, 0.82); font-size: 1rem; line-height: 1.75;">
                    <?php 
                    $content = get_the_content();
                    echo wpautop(do_shortcode($content)); 
                    ?>
                </div>
            </div>

            <!-- BACK TO CATALOG ACTION BUTTON -->
            <div class="reveal text-center">
                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn-search-pill" style="text-decoration: none; padding: 0.85rem 2rem; background: #16361E; color: #ffffff; display: inline-flex; align-items: center; gap: 0.5rem; border-radius: 999px; font-weight: 800; box-shadow: none !important;">
                    <span>&larr; Kembali ke Katalog Produk</span>
                </a>
            </div>

        </div>
    </section>

    <!-- ═══ 3. CTA BANNER PENUTUP (MATCHING BERANDA & ABOUT PAGE) ═══ -->
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
