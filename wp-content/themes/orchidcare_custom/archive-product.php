<?php
/**
 * Template Name: Katalog Produk
 * Archive Template for 'product' CPT
 */

get_header();

// Fetch current category filter if any
$current_cat = isset($_GET['kategori']) ? sanitize_text_field($_GET['kategori']) : '';

$args = [
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
];

if ($current_cat) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $current_cat,
        ],
    ];
}

$product_query = new WP_Query($args);
$wa_general_url = orchid_wa_url('Halo Orchid Care, saya ingin bertanya tentang katalog produk dan penawaran harga grosir.');
?>

<!-- Inline Responsive Styling untuk Mobile Compatibility & Clean Layout -->
<style>
.catalog-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.catalog-filter-bar {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 2.5rem;
}
.filter-tab {
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
.filter-tab:hover, .filter-tab.is-active {
    background: #16361E;
    color: #ffffff;
    border-color: #16361E;
}
.catalog-grid-layout {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3.5rem;
}
.catalog-card {
    background: #ffffff;
    border-radius: 1.5rem;
    overflow: hidden;
    border: 1px solid rgba(22, 54, 30, 0.08);
    box-shadow: 0 6px 20px rgba(22, 54, 30, 0.04);
    display: flex;
    flex-direction: column;
    transition: transform 0.25s ease;
}
.catalog-card:hover {
    transform: translateY(-4px);
}
@media (max-width: 768px) {
    .catalog-page section {
        padding: 3rem 0 !important;
    }
    .catalog-grid-layout {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    .filter-tab {
        font-size: 0.82rem;
        padding: 0.5rem 1rem;
    }
}
</style>

<main id="main-content" class="catalog-page">
    
    <!-- ═══ 1. ELEGANT PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'KATALOG PRODUK ORCHID CARE',
        'Pembersih PKRT, Wewangian Laundry & Biang Konsentrat 1kg Jadi 15L',
        'Formulasi kimia higienis berkualitas tinggi langsung dari pabrik PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta. Melayani pasokan grosir laundry kiloan, rumah tangga, instansi, & reseller.'
    ); ?>

    <!-- ═══ 2. CATEGORY FILTER TABS & PRODUCT LIST ═══ -->
    <section class="catalog-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <!-- Category Filter Bar (Dynamic Terms Query) -->
            <?php
            $uncat = get_term_by('slug', 'uncategorized', 'product_cat');
            $exclude_ids = $uncat ? [$uncat->term_id] : [];
            $all_categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'exclude'    => $exclude_ids,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ]);
            ?>
            <div class="catalog-filter-bar reveal">
                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="filter-tab <?php echo empty($current_cat) ? 'is-active' : ''; ?>">
                    Semua Produk
                </a>
                <?php if (!empty($all_categories) && !is_wp_error($all_categories)) : ?>
                    <?php foreach ($all_categories as $cat) : ?>
                        <a href="<?php echo esc_url(home_url('/produk?kategori=' . $cat->slug)); ?>"
                           class="filter-tab <?php echo ($current_cat === $cat->slug) ? 'is-active' : ''; ?>">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Product Grid -->
            <div class="catalog-grid-layout">
                <?php if ($product_query->have_posts()) : ?>
                    <?php while ($product_query->have_posts()) : $product_query->the_post(); 
                        $raw_terms = get_the_terms(get_the_ID(), 'product_cat');
                        $terms = ($raw_terms && !is_wp_error($raw_terms)) ? array_filter($raw_terms, function($t) {
                            return $t->slug !== 'uncategorized';
                        }) : [];
                        $first_term = !empty($terms) ? reset($terms) : null;
                        $cat_name   = $first_term ? $first_term->name : 'Orchid Care';
                        $wa_msg     = 'Halo Orchid Care, saya berminat bertanya tentang produk: ' . get_the_title() . '. Mohon info penawaran harganya.';
                        $wa_url     = orchid_wa_url($wa_msg);
                        $thumb_url  = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/product-laundry.png';
                    ?>
                        <article class="catalog-card reveal">
                            <div style="position: relative; height: 220px; overflow: hidden; background: #fafafa;">
                                <a href="<?php the_permalink(); ?>" style="display: block; width: 100%; height: 100%;">
                                    <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                                </a>
                                <span class="chip-tag chip-tag--mint" style="position: absolute; top: 1rem; left: 1rem; font-size: 0.72rem; padding: 0.3rem 0.75rem; border-radius: 999px;">
                                    <?php echo esc_html($cat_name); ?>
                                </span>
                            </div>

                            <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                                <div style="margin-bottom: 0.5rem;">
                                    <span style="font-size: 0.75rem; font-weight: 800; color: #88C425; font-family: var(--font-mono, monospace);">1 KG &rarr; 15 LITER KONSENTRAT</span>
                                </div>
                                <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; font-weight: 800; color: #16361E; line-height: 1.3; margin: 0 0 0.6rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: #16361E; text-decoration: none;"><?php the_title(); ?></a>
                                </h3>
                                <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex: 1;">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), 18, '...')); ?>
                                </p>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 1rem;">
                                    <a href="<?php the_permalink(); ?>" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #fafafa; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 999px; font-weight: 700; box-shadow: none !important;">
                                        <span>Detail</span>
                                    </a>
                                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #16361E; color: #ffffff; border-radius: 999px; font-weight: 800; box-shadow: none !important;">
                                        <span>Pesan WA</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    
                    <!-- SAMPLE DEMONSTRATION PRODUCT CARDS (SAFE FALLBACK DISPLAY) -->
                    <!-- Sample 1: Deterjen Laundry -->
                    <article class="catalog-card reveal">
                        <div style="position: relative; height: 220px; overflow: hidden; background: #fafafa;">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-laundry.png'); ?>" alt="Deterjen Laundry Kiloan Orchid Care" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                            <span class="chip-tag chip-tag--mint" style="position: absolute; top: 1rem; left: 1rem; font-size: 0.72rem; padding: 0.3rem 0.75rem; border-radius: 999px;">Laundry Care</span>
                        </div>
                        <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                            <span style="font-size: 0.75rem; font-weight: 800; color: #88C425; font-family: var(--font-mono, monospace); margin-bottom: 0.3rem;">FORMULA PEKAT HIGIENIS</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; font-weight: 800; color: #16361E; margin: 0 0 0.6rem;">Deterjen Laundry Liquid Extra Busa</h3>
                            <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex: 1;">Formulasi deterjen cair dengan pencerah warna &amp; anti noda membandel khusus usaha laundry kiloan.</p>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 1rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #fafafa; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 999px; font-weight: 700; box-shadow: none !important;">Detail</a>
                                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #16361E; color: #ffffff; border-radius: 999px; font-weight: 800; box-shadow: none !important;">Pesan WA</a>
                            </div>
                        </div>
                    </article>

                    <!-- Sample 2: Malabeez Perfume -->
                    <article class="catalog-card reveal">
                        <div style="position: relative; height: 220px; overflow: hidden; background: #fafafa;">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-parfum.png'); ?>" alt="Malabeez Perfume Laundry" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                            <span class="chip-tag chip-tag--lavender" style="position: absolute; top: 1rem; left: 1rem; font-size: 0.72rem; padding: 0.3rem 0.75rem; border-radius: 999px;">Malabeez Perfume</span>
                        </div>
                        <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                            <span style="font-size: 0.75rem; font-weight: 800; color: #2563eb; font-family: var(--font-mono, monospace); margin-bottom: 0.3rem;">AROMA MEWAH TAHAN LAMA</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; font-weight: 800; color: #16361E; margin: 0 0 0.6rem;">Malabeez Premium Laundry Perfume</h3>
                            <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex: 1;">Bibit wewangian impor murni yang harum menempel erat pada serat pakaian &amp; bebas aroma apek.</p>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 1rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #fafafa; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 999px; font-weight: 700; box-shadow: none !important;">Detail</a>
                                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #16361E; color: #ffffff; border-radius: 999px; font-weight: 800; box-shadow: none !important;">Pesan WA</a>
                            </div>
                        </div>
                    </article>

                    <!-- Sample 3: Biang Konsentrat -->
                    <article class="catalog-card reveal">
                        <div style="position: relative; height: 220px; overflow: hidden; background: #fafafa;">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-biang.png'); ?>" alt="Biang Konsentrat Sabun 1kg jadi 15L" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                            <span class="chip-tag chip-tag--butter" style="position: absolute; top: 1rem; left: 1rem; font-size: 0.72rem; padding: 0.3rem 0.75rem; border-radius: 999px;">Biang Konsentrat</span>
                        </div>
                        <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                            <span style="font-size: 0.75rem; font-weight: 800; color: #88C425; font-family: var(--font-mono, monospace); margin-bottom: 0.3rem;">HEMAT ONGKIR 90%</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; font-weight: 800; color: #16361E; margin: 0 0 0.6rem;">Biang DeterMat &amp; O'Clean (1kg jadi 15L)</h3>
                            <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex: 1;">Paket konsentrat hemat logistik. Cukup campur 1kg biang dengan 14L air bersih tanpa gumpal.</p>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 1rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #fafafa; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 999px; font-weight: 700; box-shadow: none !important;">Detail</a>
                                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #16361E; color: #ffffff; border-radius: 999px; font-weight: 800; box-shadow: none !important;">Pesan WA</a>
                            </div>
                        </div>
                    </article>

                    <!-- Sample 4: Home Care Pembersih Lantai -->
                    <article class="catalog-card reveal">
                        <div style="position: relative; height: 220px; overflow: hidden; background: #fafafa;">
                            <a href="<?php echo esc_url(home_url('/kontak')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-home.png'); ?>" alt="Sabun Pel Lantai Home Care" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                            <span class="chip-tag chip-tag--peach" style="position: absolute; top: 1rem; left: 1rem; font-size: 0.72rem; padding: 0.3rem 0.75rem; border-radius: 999px;">Home Care</span>
                        </div>
                        <div style="padding: 1.5rem; display: flex; flex-direction: column; flex: 1;">
                            <span style="font-size: 0.75rem; font-weight: 800; color: #D81B80; font-family: var(--font-mono, monospace); margin-bottom: 0.3rem;">BEBAS KUMAN &amp; KINCLONG</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; font-weight: 800; color: #16361E; margin: 0 0 0.6rem;">Sabun Pel Lantai Aromaterapi Lemon/Sereh</h3>
                            <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.55; margin: 0 0 1.25rem; flex: 1;">Pembersih lantai serbaguna yang efektif membunuh kuman, mengkilapkan ubin, &amp; wangi segar alami.</p>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 1rem;">
                                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #fafafa; color: #16361E; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 999px; font-weight: 700; box-shadow: none !important;">Detail</a>
                                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.85rem; padding: 0.65rem 1rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background: #16361E; color: #ffffff; border-radius: 999px; font-weight: 800; box-shadow: none !important;">Pesan WA</a>
                            </div>
                        </div>
                    </article>

                <?php endif; ?>
            </div>

            <!-- Biang Konsentrat Banner Info -->
            <div class="reveal" style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.75rem; padding: 2.25rem 2rem; display: flex; align-items: center; justify-content: space-between; gap: 2rem; flex-wrap: wrap;">
                <div style="max-width: 750px;">
                    <span style="font-family: var(--font-mono, monospace); font-size: 0.78rem; font-weight: 800; color: #16361E; opacity: 0.8; text-transform: uppercase; display: block; margin-bottom: 0.4rem;">INOVASI LOGISTIK PABRIK</span>
                    <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.5rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.5rem;">Hemat Ongkos Kirim 90% dengan Biang Konsentrat</h3>
                    <p style="color: rgba(22, 54, 30, 0.82); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Formulasi konsentrat 1kg dapat diracik mandiri menjadi 15 Liter cairan siap pakai. Solusi pasokan ideal untuk pengusaha laundry, toko agen, dan reseller luar pulau.
                    </p>
                </div>
                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; flex-shrink: 0; box-shadow: none !important;">
                    <span>Konsultasi Biang WA &rarr;</span>
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
                <a href="<?php echo esc_url($wa_general_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none !important;">
                    <span>Hubungi Kemitraan WA</span>
                </a>

                <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                    Hubungi Halaman Kontak
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
