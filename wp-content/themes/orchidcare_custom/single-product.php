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

    // Get custom fields or set defaults for catalog testing
    $sku       = get_post_meta(get_the_ID(), '_product_sku', true) ?: 'OC-PROD-' . get_the_ID();
    $ratio     = get_post_meta(get_the_ID(), '_product_ratio', true) ?: '1 kg biang konsentrat diracik mandiri jadi 15 Liter cairan siap pakai';
    $weight    = get_post_meta(get_the_ID(), '_product_weight', true) ?: '1000 gram (1 kg)';
    $aroma     = get_post_meta(get_the_ID(), '_product_aroma', true) ?: 'Super Lemon Fresh';

    $wa_msg = "Halo Orchid Care, saya berminat dengan produk:\n* " . get_the_title() . " (Kode: {$sku}) *\n\nMohon informasi pemesanan, ketersediaan stok, dan penawaran harganya. Terima kasih!";
    $wa_url = orchid_wa_url($wa_msg);
?>

<main id="main-content" class="single-product-page">
    
    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'DETAIL PRODUK — ' . strtoupper($cat_name),
        get_the_title(),
        'Kode Produk: ' . $sku . ' | ' . $ratio
    ); ?>

    <!-- ═══ PRODUCT DETAIL CONTAINER ═══ -->
    <section class="product-detail-section">
        <div class="container">
            <div class="product-detail-grid">
                
                <!-- LEFT: MEDIA & PLACEHOLDER GALLERY -->
                <div class="product-media-col reveal">
                    
                    <!-- Main Image (or Placeholder) -->
                    <div class="product-main-media">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'product-main-img']); ?>
                        <?php else : ?>
                            <div class="media-placeholder-box">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#FF6F59" stroke-width="1.5">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                </svg>
                                <span class="placeholder-label">Foto Utama Produk (Placeholder)</span>
                                <span class="placeholder-sublabel">Ukuran rekomendasi: 800 x 800px</span>
                            </div>
                        <?php endif; ?>
                        <span class="chip-tag product-cat-chip"><?php echo esc_html($cat_name); ?></span>
                    </div>

                    <!-- Gallery Placeholders -->
                    <div class="product-gallery-section">
                        <h4 class="gallery-title">Galeri Produk (Placeholder)</h4>
                        <div class="gallery-placeholder-grid">
                            <div class="gallery-thumb-placeholder is-active">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8FDDC4" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                <span>Foto 1</span>
                            </div>
                            <div class="gallery-thumb-placeholder">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF8A73" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                <span>Foto 2</span>
                            </div>
                            <div class="gallery-thumb-placeholder">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#CBB3EE" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                <span>Foto 3</span>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- RIGHT: INFO & WHATSAPP CATALOG ACTION -->
                <div class="product-info-col reveal">
                    
                    <div class="product-header">
                        <span class="chip-tag chip-tag--mint">MODEL KATALOG ONLINE</span>
                        <h1 class="product-title"><?php the_title(); ?></h1>
                        <p class="product-sku">Kode Produk: <code><?php echo esc_html($sku); ?></code></p>
                    </div>

                    <!-- Highlights Badge Bar -->
                    <div class="product-highlights">
                        <span class="highlight-chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                            Legal &amp; Terdaftar
                        </span>
                        <span class="highlight-chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                            Formula Efisien
                        </span>
                        <span class="highlight-chip">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                            Kirim Se-Indonesia
                        </span>
                    </div>

                    <!-- Short Excerpt -->
                    <div class="product-short-desc">
                        <?php the_excerpt(); ?>
                    </div>

                    <!-- Specifications Table -->
                    <div class="product-specs-box">
                        <h3 class="specs-heading">Spesifikasi &amp; Detail Racikan</h3>
                        <table class="specs-table">
                            <tr>
                                <th>Kategori</th>
                                <td><?php echo esc_html($cat_name); ?></td>
                            </tr>
                            <tr>
                                <th>Berat Kemasan</th>
                                <td><?php echo esc_html($weight); ?></td>
                            </tr>
                            <tr>
                                <th>Hasil Racikan / Rasio</th>
                                <td><strong><?php echo esc_html($ratio); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Aroma / Varian</th>
                                <td><?php echo esc_html($aroma); ?></td>
                            </tr>
                            <tr>
                                <th>Produsen</th>
                                <td>PT Indotech Berkah Abadi (Sleman, Yogyakarta)</td>
                            </tr>
                        </table>
                    </div>

                    <!-- WHATSAPP DIRECT CATALOG BUTTON -->
                    <div class="product-cta-box">
                        <div class="cta-notice">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            <span>Tertarik dengan produk ini? Pesan atau konsultasikan langsung via WhatsApp official kami.</span>
                        </div>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-whatsapp-lg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                            </svg>
                            Pesan via WhatsApp Sekarang
                        </a>
                    </div>

                </div>

            </div>

            <!-- FULL DESCRIPTION & INSTRUCTIONS -->
            <div class="product-full-description reveal">
                <h2 class="description-heading">Deskripsi &amp; Panduan Pemakaian</h2>
                <div class="entry-content prose">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- BACK TO CATALOG BUTTON -->
            <div class="catalog-back-action reveal">
                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn btn-ink">
                    ← Kembali ke Katalog Produk
                </a>
            </div>

        </div>
    </section>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
