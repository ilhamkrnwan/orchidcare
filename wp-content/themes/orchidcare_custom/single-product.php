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

/* Circular Social Share Icon Buttons with Dark Tooltip Popups */
.article-share-bar {
    background: #fafafa;
    border: 1px solid rgba(22, 54, 30, 0.08);
    border-radius: 1.25rem;
    padding: 1rem 1.35rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    box-shadow: 0 4px 20px rgba(22, 54, 30, 0.03);
}
.share-icon-btn {
    position: relative !important;
    width: 44px !important;
    height: 44px !important;
    border-radius: 50% !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #ffffff !important;
    text-decoration: none !important;
    border: none !important;
    cursor: pointer !important;
    padding: 0 !important;
    margin: 0 !important;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease, background-color 0.2s ease !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
    font-size: 1rem !important;
    line-height: 1 !important;
}
.share-icon-btn:hover {
    transform: translateY(-3px) scale(1.08) !important;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.16) !important;
}
.share-icon-btn.share-wa { background: #25D366 !important; }
.share-icon-btn.share-fb { background: #1877F2 !important; }
.share-icon-btn.share-in { background: #0A66C2 !important; }
.share-icon-btn.share-x { background: #000000 !important; }
.share-icon-btn.share-copy { background: #5B6B7C !important; }

/* Tooltip Popup */
.share-icon-btn::before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%) translateY(4px);
    background: #0f172a;
    color: #ffffff;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 0.38rem 0.8rem;
    border-radius: 0.5rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    font-family: var(--font-sans, sans-serif);
    z-index: 100;
}
.share-icon-btn::after {
    content: '';
    position: absolute;
    bottom: calc(100% + 4px);
    left: 50%;
    transform: translateX(-50%) translateY(4px);
    border-width: 6px 6px 0 6px;
    border-style: solid;
    border-color: #0f172a transparent transparent transparent;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
    z-index: 100;
}
.share-icon-btn:hover::before,
.share-icon-btn:hover::after {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
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
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.75rem; margin-bottom: 1.5rem;">
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

                    <!-- Share Product Bar -->
                    <div class="article-share-bar">
                        <div style="font-weight: 800; color: #16361E; font-size: 0.93rem; display: flex; align-items: center; gap: 0.4rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#D81B80" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                            <span>Bagikan Produk Ini:</span>
                        </div>
                        
                        <div style="display: flex; gap: 0.65rem; align-items: center; flex-wrap: wrap;">
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode('Lihat produk ' . get_the_title() . ' dari Orchid Care: ' . get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-wa" data-tooltip="WhatsApp" aria-label="Bagikan Produk ke WhatsApp">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-fb" data-tooltip="Facebook" aria-label="Bagikan Produk ke Facebook">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-in" data-tooltip="LinkedIn" aria-label="Bagikan Produk ke LinkedIn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-x" data-tooltip="X (Twitter)" aria-label="Bagikan Produk ke X (Twitter)">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>

                            <!-- Copy Link -->
                            <button type="button" onclick="navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); var self = this; self.setAttribute('data-tooltip', 'Tersalin!'); setTimeout(function(){ self.setAttribute('data-tooltip', 'Salin Link'); }, 2000);" class="share-icon-btn share-copy" data-tooltip="Salin Link" aria-label="Salin Link Produk">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            </button>
                        </div>
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
