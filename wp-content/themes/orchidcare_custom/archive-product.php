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
    'posts_per_page' => 12,
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
?>

<main id="main-content" class="catalog-page">
    
    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'KATALOG PRODUK ORCHID CARE',
        'Produk Kimia Kebersihan & Biang Konsentrat',
        'Formulasi berkualitas tinggi untuk kebutuhan laundry kiloan/komersial, kebersihan rumah tangga, perawatan kendaraan, serta biang konsentrat hemat logistik.'
    ); ?>

    <!-- ═══ CATEGORY FILTER TABS ═══ -->
    <section class="catalog-section">
        <div class="container">
            
            <div class="catalog-filter-bar reveal">
                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="filter-tab <?php echo empty($current_cat) ? 'is-active' : ''; ?>">
                    Semua Produk
                </a>
                <a href="<?php echo esc_url(home_url('/produk?kategori=perawatan-laundry')); ?>" class="filter-tab <?php echo ($current_cat === 'perawatan-laundry') ? 'is-active' : ''; ?>">
                    Perawatan Laundry
                </a>
                <a href="<?php echo esc_url(home_url('/produk?kategori=home-care')); ?>" class="filter-tab <?php echo ($current_cat === 'home-care') ? 'is-active' : ''; ?>">
                    Home Care
                </a>
                <a href="<?php echo esc_url(home_url('/produk?kategori=perawatan-otomotif')); ?>" class="filter-tab <?php echo ($current_cat === 'perawatan-otomotif') ? 'is-active' : ''; ?>">
                    Perawatan Otomotif
                </a>
                <a href="<?php echo esc_url(home_url('/produk?kategori=biang-konsentrat')); ?>" class="filter-tab <?php echo ($current_cat === 'biang-konsentrat') ? 'is-active' : ''; ?>">
                    Bahan Konsentrat (1kg &rarr; 15L)
                </a>
            </div>

            <!-- ═══ PRODUCT GRID ═══ -->
            <div class="catalog-grid">
                <?php if ($product_query->have_posts()) : ?>
                    <?php while ($product_query->have_posts()) : $product_query->the_post(); 
                        $terms = get_the_terms(get_the_ID(), 'product_cat');
                        $cat_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : 'Orchid Care';
                        $wa_msg   = 'Halo Orchid Care, saya berminat dengan produk: ' . get_the_title() . '. Mohon info harga & pemesanan.';
                        $wa_url   = orchid_wa_url($wa_msg);
                    ?>
                        <article class="product-card reveal">
                            <div class="product-card-thumb">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('orchid-card', ['class' => 'product-img']); ?>
                                <?php else : ?>
                                    <!-- Placeholder SVG Image -->
                                    <div class="product-placeholder">
                                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="var(--orchid)" stroke-width="1.5">
                                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                        <span class="placeholder-text">Orchid Care</span>
                                    </div>
                                <?php endif; ?>
                                <span class="chip-tag product-card-badge"><?php echo esc_html($cat_name); ?></span>
                            </div>

                            <div class="product-card-body">
                                <div class="product-card-head">
                                    <span class="card-ratio-highlight">1 kg &rarr; 15 Liter</span>
                                </div>
                                <h2 class="product-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="product-card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                                <!-- Specs Meta Row (Layout inspired by reference image specs row) -->
                                <div class="card-specs-row">
                                    <span class="spec-mini-chip">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                                        Formula Pekat
                                    </span>
                                    <span class="spec-mini-chip">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        Hasil 15L
                                    </span>
                                </div>

                                <div class="product-card-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-ink btn-sm">
                                        Detail
                                    </a>
                                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-coral btn-sm">
                                        Pesan WA
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                <?php else : ?>
                    <!-- FALLBACK DISPLAY WHEN NO DB PRODUCTS EXIST YET -->
                    <div class="catalog-empty-notice reveal">
                        <div class="empty-icon">📦</div>
                        <h3>Belum ada produk di database</h3>
                        <p>Silakan gunakan skrip pengisian produk sampel atau hubungi admin untuk menambahkan produk via Dashboard WordPress.</p>
                        <a href="<?php echo esc_url(orchid_wa_url('Halo Orchid Care, saya ingin menanyakan rincian katalog produk.')); ?>" target="_blank" rel="noopener" class="btn btn-coral">
                            Hubungi via WhatsApp
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ═══ BIANG KONSENTRAT BANNER ═══ -->
            <div class="biang-info-banner reveal">
                <div class="biang-info-icon">💡</div>
                <div class="biang-info-text">
                    <h3>Hemat Ongkos Kirim dengan Biang Konsentrat</h3>
                    <p>Produk seri <strong>DeterMat</strong>, <strong>O'Clean</strong>, dan <strong>Arai</strong> hadir dalam wujud konsentrat 1 kg yang dapat dilarutkan menjadi 15 Liter cairan siap pakai. Solusi ideal bagi agen &amp; reseller luar pulau!</p>
                </div>
                <a href="<?php echo esc_url(orchid_wa_url('Halo Orchid Care, saya tertarik menjadi agen/reseller Biang Konsentrat.')); ?>" target="_blank" rel="noopener" class="btn btn-ink">
                    Tanya Kemitraan Biang
                </a>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
