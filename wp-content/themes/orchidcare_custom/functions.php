<?php
/**
 * Orchid Care Custom Theme Functions
 */

if (!defined('ABSPATH')) exit;

define('ORCHID_VERSION', '1.0.0');
define('ORCHID_DIR', get_template_directory());
define('ORCHID_URI', get_template_directory_uri());

// ── Theme Setup ──────────────────────────────────────────────────────────────
function orchid_setup() {
    load_theme_textdomain('orchidcare', ORCHID_DIR . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    register_nav_menus([
        'primary' => __('Primary Navigation', 'orchidcare'),
        'footer'  => __('Footer Navigation', 'orchidcare'),
    ]);

    add_image_size('orchid-hero', 1920, 900, true);
    add_image_size('orchid-card', 600, 400, true);
    add_image_size('orchid-thumb', 400, 300, true);
}
add_action('after_setup_theme', 'orchid_setup');

// ── Enqueue Assets ───────────────────────────────────────────────────────────
function orchid_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'orchid-fonts',
        'https://fonts.googleapis.com/css2?family=Baloo+2:wght@500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style('orchid-main', ORCHID_URI . '/assets/css/main.css', ['orchid-fonts'], filemtime(ORCHID_DIR . '/assets/css/main.css'));

    // Main JS
    wp_enqueue_script('orchid-main', ORCHID_URI . '/assets/js/main.js', [], filemtime(ORCHID_DIR . '/assets/js/main.js'), true);

    $whatsapp = orchid_opt('whatsapp', '6285559474797');
    $wa_num   = preg_replace('/[^0-9]/', '', $whatsapp);

    wp_localize_script('orchid-main', 'orchidData', [
        'ajaxUrl'         => admin_url('admin-ajax.php', 'relative'),
        'nonce'           => wp_create_nonce('orchid_nonce'),
        'whatsapp'        => $wa_num,
        'fallbackImg'     => ORCHID_URI . '/assets/img/logo.webp',
        'productFallback' => ORCHID_URI . '/assets/img/product-laundry.png',
    ]);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'orchid_enqueue');

// ── Global Post Thumbnail Fallback & Error Handler Filter ─────────────────
function orchid_post_thumbnail_fallback($html, $post_id, $post_thumbnail_id, $size, $attr) {
    $fallback_logo = ORCHID_URI . '/assets/img/logo.webp';

    if (empty($html)) {
        $alt = get_the_title($post_id);
        return sprintf(
            '<img src="%1$s" alt="%2$s" class="attachment-%3$s size-%3$s wp-post-image img-fallback-placeholder" loading="lazy" onerror="this.onerror=null; this.src=\'%1$s\';">',
            esc_url($fallback_logo),
            esc_attr($alt),
            esc_attr($size)
        );
    }

    // Attach onerror attribute to existing post thumbnails
    if (strpos($html, 'onerror=') === false) {
        $html = str_replace(
            '<img ',
            '<img onerror="this.onerror=null; this.src=\'' . esc_url($fallback_logo) . '\'; this.classList.add(\'img-fallback-placeholder\');" ',
            $html
        );
    }
    return $html;
}
add_filter('post_thumbnail_html', 'orchid_post_thumbnail_fallback', 10, 5);

// ── Register Sidebars ─────────────────────────────────────────────────────────
function orchid_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'orchidcare'),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'orchid_widgets_init');

// ── Custom Post Types & Taxonomies ───────────────────────────────────────────
function orchid_register_cpts() {
    register_post_type('testimonial', [
        'labels'      => ['name' => 'Testimonials', 'singular_name' => 'Testimonial'],
        'public'      => false,
        'show_ui'     => true,
        'menu_icon'   => 'dashicons-format-quote',
        'supports'    => ['title', 'editor', 'thumbnail'],
    ]);

    // Product CPT
    register_post_type('product', [
        'labels' => [
            'name'               => 'Produk',
            'singular_name'      => 'Produk',
            'add_new'            => 'Tambah Produk Baru',
            'add_new_item'       => 'Tambah Produk',
            'edit_item'          => 'Edit Produk',
            'new_item'           => 'Produk Baru',
            'view_item'          => 'Lihat Produk',
            'search_items'       => 'Cari Produk',
            'not_found'          => 'Produk tidak ditemukan',
            'not_found_in_trash' => 'Produk tidak ada di kotak sampah',
            'menu_name'          => 'Katalog Produk',
        ],
        'public'             => true,
        'has_archive'        => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'produk', 'with_front' => false],
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-cart',
        'supports'           => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'show_in_rest'       => true,
    ]);

    // Product Category Taxonomy
    register_taxonomy('product_cat', ['product'], [
        'labels' => [
            'name'              => 'Kategori Produk',
            'singular_name'     => 'Kategori Produk',
            'search_items'      => 'Cari Kategori',
            'all_items'         => 'Semua Kategori',
            'edit_item'         => 'Edit Kategori',
            'update_item'       => 'Update Kategori',
            'add_new_item'      => 'Tambah Kategori Baru',
            'new_item_name'     => 'Nama Kategori Baru',
            'menu_name'         => 'Kategori Produk',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'kategori-produk'],
        'show_in_rest'      => true,
    ]);
}
add_action('init', 'orchid_register_cpts');

// ── Helper: Get Posts ─────────────────────────────────────────────────────────
function orchid_get_posts($post_type = 'post', $count = 3, $args = []) {
    $defaults = [
        'post_type'      => $post_type,
        'posts_per_page' => $count,
        'post_status'    => 'publish',
    ];
    return new WP_Query(array_merge($defaults, $args));
}

// ── Excerpt ───────────────────────────────────────────────────────────────────
function orchid_excerpt_length($length) { return 20; }
add_filter('excerpt_length', 'orchid_excerpt_length');

function orchid_excerpt_more($more) { return '...'; }
add_filter('excerpt_more', 'orchid_excerpt_more');

// ── Seed Sample Product for Testing ──────────────────────────────────────────
function orchid_seed_sample_product() {
    // Only run if product CPT exists and flag not yet set
    if (!get_option('orchid_sample_product_seeded')) {
        $existing = get_posts(['post_type' => 'product', 'numberposts' => 1, 'post_status' => 'any']);
        if (empty($existing)) {
            // Create default category
            $term = wp_insert_term('Biang Konsentrat', 'product_cat', ['slug' => 'biang-konsentrat']);
            $term_id = is_array($term) ? $term['term_id'] : 0;

            // Insert sample product
            $post_id = wp_insert_post([
                'post_title'   => 'DeterMat — Biang Konsentrat Deterjen 1 kg',
                'post_name'    => 'determat-biang-konsentrat-deterjen-1kg',
                'post_content' => '<p><strong>DeterMat — Biang Konsentrat Deterjen 1 kg</strong> adalah inovasi logistik utama dari Orchid Care (PT Indotech Berkah Abadi) yang diformulasikan khusus untuk menekan biaya ongkos kirim cairan hingga 90% bagi mitra di seluruh wilayah Indonesia.</p>

<h3>Keunggulan Utama:</h3>
<ul>
  <li><strong>Formulasi Konsentrat Pekat:</strong> 1 kg biang konsentrat dapat diracik mandiri menjadi 15 Liter cairan deterjen kualitas industri siap pakai.</li>
  <li><strong>Daya Bersih Tinggi (Super Lemon):</strong> Sangat efektif meluruhkan kotoran berat &amp; noda pada kain tanpa merusak serat pakaian.</li>
  <li><strong>Hemat Biaya Operasional:</strong> Solusi paling ekonomis bagi pengusaha laundry kiloan, jaringan hotel, rumah sakit, dan agen keagenan.</li>
  <li><strong>Legal &amp; Aman:</strong> Terdaftar resmi dan diformulasikan aman untuk mesin cuci pintu depan (front load), pintu atas (top load), maupun cuci manual.</li>
</ul>

<h3>Panduan Peracikan Mandiri (1 kg &rarr; 15 Liter):</h3>
<ol>
  <li>Siapkan wadah/ember bersih berkapasitas minimal 15 Liter.</li>
  <li>Tuangkan air bersih sebanyak 14 Liter ke dalam wadah.</li>
  <li>Masukkan 1 kg biang konsentrat DeterMat secara perlahan sambil diaduk merata.</li>
  <li>Aduk hingga larutan benar-benar homogen dan kental secara merata.</li>
  <li>Diamkan 2–4 jam hingga cairan mengendap jernih. Deterjen siap dikemas dan digunakan!</li>
</ol>',
                'post_excerpt' => 'Biang ekstrak konsentrat deterjen laundry 1 kg yang diracik mandiri menjadi 15 Liter cairan siap pakai. Solusi hemat ongkos kirim ke seluruh Indonesia!',
                'post_status'  => 'publish',
                'post_type'    => 'product',
            ]);

            if ($post_id && !is_wp_error($post_id)) {
                if ($term_id) {
                    wp_set_object_terms($post_id, [$term_id], 'product_cat');
                }
                update_post_meta($post_id, '_product_sku', 'OC-DMAT-01');
                update_post_meta($post_id, '_product_ratio', '1 kg biang = 15 Liter siap pakai');
                update_post_meta($post_id, '_product_weight', '1 kg (1.000 gram)');
                update_post_meta($post_id, '_product_aroma', 'Super Lemon Fresh');
                update_option('orchid_sample_product_seeded', true);
            }
        }
    }
}
add_action('init', 'orchid_seed_sample_product', 20);

// ── Include Partials ──────────────────────────────────────────────────────────
require_once ORCHID_DIR . '/inc/customizer.php';
require_once ORCHID_DIR . '/inc/helpers.php';
require_once ORCHID_DIR . '/inc/cpt-product.php';
require_once ORCHID_DIR . '/inc/cpt-faq.php';

// ── Smart Template Router Fail-Safe ──────────────────────────────────────────
function orchid_smart_template_include($template) {
    if (is_admin()) return $template;

    $req_uri = trim(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
    $parts   = array_values(array_filter(explode('/', $req_uri)));
    $slug    = end($parts);

    // 1. BERANDA / FRONT PAGE (Root URL http://localhost/orchidbrand/ or is_front_page)
    if (is_front_page() || empty($slug) || $slug === 'orchidbrand' || $slug === 'home' || $slug === 'beranda') {
        $front_tpl = ORCHID_DIR . '/front-page.php';
        if (file_exists($front_tpl)) return $front_tpl;
    }

    // 2. BLOG / ARTIKEL (URL /blog atau /artikel)
    if ($slug === 'blog' || $slug === 'artikel' || (is_home() && !is_front_page())) {
        $blog_tpl = ORCHID_DIR . '/archive.php';
        if (file_exists($blog_tpl)) return $blog_tpl;
    }

    // 3. KATALOG PRODUK (URL /produk)
    if ($slug === 'produk' || $slug === 'katalog-produk') {
        $prod_tpl = ORCHID_DIR . '/archive-product.php';
        if (file_exists($prod_tpl)) return $prod_tpl;
    }

    // 4. TENTANG KAMI (URL /tentang-kami)
    if ($slug === 'tentang-kami' || $slug === 'about') {
        $about_tpl = ORCHID_DIR . '/page-about.php';
        if (file_exists($about_tpl)) return $about_tpl;
    }

    // 5. KONTAK & KEMITRAAN (URL /kontak)
    if ($slug === 'kontak' || $slug === 'contact') {
        $contact_tpl = ORCHID_DIR . '/page-contact.php';
        if (file_exists($contact_tpl)) return $contact_tpl;
    }

    // 6. PERTANYAAN UMUM (FAQ) (URL /faq)
    if ($slug === 'faq' || $slug === 'pertanyaan-umum') {
        $faq_tpl = ORCHID_DIR . '/page-faq.php';
        if (file_exists($faq_tpl)) return $faq_tpl;
    }

    // 7. LEGAL PAGES
    if (in_array($slug, ['kebijakan-privasi', 'syarat-dan-ketentuan', 'kebijakan-cookie'])) {
        $legal_tpl = ORCHID_DIR . '/page-legal.php';
        if (file_exists($legal_tpl)) return $legal_tpl;
    }

    return $template;
}
add_filter('template_include', 'orchid_smart_template_include', 99);

// ── Clean up WooCommerce default hooks on single product page ──────────────
add_action('wp', function() {
    if (is_singular('product')) {
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
        remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
});

// ── AJAX Handler for Product Catalog Ghost Scroll & Infinite Load More ─────
function orchid_ajax_load_more_products() {
    check_ajax_referer('orchid_nonce', 'nonce');

    $paged    = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $per_page = 8;

    $args = [
        'post_type'      => 'product',
        'posts_per_page' => $per_page,
        'paged'          => $paged,
        'post_status'    => 'publish',
    ];

    if (!empty($category)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $category,
            ],
        ];
    }

    $query = new WP_Query($args);

    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $terms     = get_the_terms(get_the_ID(), 'product_cat');
            $cat_name  = ($terms && !is_wp_error($terms)) ? $terms[0]->name : 'Orchid Care';
            $sku       = get_post_meta(get_the_ID(), '_product_sku', true) ?: 'OC-' . get_the_ID();
            $ratio     = get_post_meta(get_the_ID(), '_product_ratio', true) ?: 'Biang Konsentrat Hemat';
            $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/product-laundry.png';
            $wa_url    = orchid_wa_url("Halo Orchid Care, saya tertarik dengan produk *" . get_the_title() . "* ({$sku}). Mohon info pemesanan & harganya.");
            ?>
            <article class="catalog-card reveal is-visible">
                <div class="card-img-wrap">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" onerror="this.onerror=null; this.src='<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>'; this.classList.add('img-fallback-placeholder');">
                    </a>
                    <span class="chip-tag chip-tag--mint card-badge">
                        <?php echo esc_html($cat_name); ?>
                    </span>
                </div>
                <div class="card-body">
                    <span class="product-sku"><?php echo esc_html($sku); ?></span>
                    <h3 class="product-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="product-ratio">
                        💡 <?php echo esc_html($ratio); ?>
                    </p>
                    <div class="card-actions">
                        <a href="<?php the_permalink(); ?>" class="btn-detail">
                            Detail Produk
                        </a>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-wa">
                            Pesan WA &rarr;
                        </a>
                    </div>
                </div>
            </article>
            <?php
        }
    }
    $html = ob_get_clean();
    $max_pages = $query->max_num_pages;
    wp_reset_postdata();

    wp_send_json_success([
        'html'      => $html,
        'has_more'  => ($paged < $max_pages),
        'paged'     => $paged,
        'max_pages' => $max_pages,
    ]);
}
add_action('wp_ajax_orchid_load_more_products', 'orchid_ajax_load_more_products');
add_action('wp_ajax_nopriv_orchid_load_more_products', 'orchid_ajax_load_more_products');



