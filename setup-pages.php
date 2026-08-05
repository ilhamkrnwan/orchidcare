<?php
/**
 * Setup Pages & Templates Script — Orchid Care Theme
 * 
 * Script ini secara otomatis:
 * 1. Mengaktifkan theme 'orchidcare_custom'
 * 2. Mengatur struktur permalink bersih (/%postname%/)
 * 3. Membuat / memperbarui Halaman (Beranda, Produk, Tentang Kami, Blog, Kontak, FAQ, Syarat Ketentuan, Kebijakan Privasi)
 * 4. Memasang Page Template Orchid Care pada masing-masing halaman
 * 5. Mengatur Static Homepage (Beranda) & Posts Page (Blog)
 * 6. Membuat & Menghubungkan Primary Navigation Menu
 * 7. Memperbarui Rewrite Rules (Flush Rewrites)
 * 
 * Cara jalankan:
 * - Via CLI VPS / Terminal: php setup-pages.php
 * - Via WP-CLI:             wp eval-file setup-pages.php
 * - Via Browser:            Buka http://domain-anda.com/setup-pages.php
 */

// Define CLI mode
$is_cli = (php_sapi_name() === 'cli' || defined('STDIN'));

function log_msg($msg, $type = 'info') {
    global $is_cli;
    if ($is_cli) {
        $prefix = [
            'success' => "\033[32m[SUCCESS]\033[0m ",
            'info'    => "\033[36m[INFO]\033[0m    ",
            'warning' => "\033[33m[WARNING]\033[0m ",
            'error'   => "\033[31m[ERROR]\033[0m   ",
        ];
        echo ($prefix[$type] ?? '') . $msg . "\n";
    } else {
        $colors = [
            'success' => '#10B981',
            'info'    => '#0284C7',
            'warning' => '#F59E0B',
            'error'   => '#EF4444',
        ];
        $color = $colors[$type] ?? '#333';
        echo "<div style='font-family: sans-serif; font-size: 14px; margin: 4px 0; color: {$color};'><strong>[" . strtoupper($type) . "]</strong> {$msg}</div>";
    }
}

if (!$is_cli) {
    echo "<!DOCTYPE html><html><head><title>Orchid Care — Setup Pages</title><style>body{font-family: system-ui, sans-serif; background: #0f172a; color: #f8fafc; padding: 2rem; max-width: 800px; margin: 0 auto;} h1{color: #88C425; border-bottom: 2px solid #334155; padding-bottom: 0.5rem;}</style></head><body><h1>🌸 Setup Halaman & Template Orchid Care</h1>";
}

// 1. Bootstrap WordPress
log_msg("Mencari wp-load.php...", "info");
$wp_load = __DIR__ . '/wp-load.php';
if (!file_exists($wp_load)) {
    $wp_load = dirname(__DIR__) . '/wp-load.php';
}

if (!file_exists($wp_load)) {
    log_msg("Gagal menemukan wp-load.php! Pastikan script diletakkan di root WordPress.", "error");
    exit(1);
}

require_once $wp_load;
log_msg("WordPress berhasil dimuat.", "success");

// Disable timeout limits for setup
@set_time_limit(0);

// 2. Aktifkan Theme 'orchidcare_custom'
$target_theme = 'orchidcare_custom';
$current_theme = get_option('stylesheet');

if ($current_theme !== $target_theme) {
    log_msg("Mengaktifkan tema '{$target_theme}'...", "info");
    switch_theme($target_theme);
    log_msg("Tema '{$target_theme}' berhasil diaktifkan.", "success");
} else {
    log_msg("Tema '{$target_theme}' sudah aktif.", "info");
}

// 3. Set Permalinks ke Clean URL (/%postname%/)
$current_permalink = get_option('permalink_structure');
if ($current_permalink !== '/%postname%/') {
    log_msg("Mengatur permalink structure ke /%postname%/...", "info");
    update_option('permalink_structure', '/%postname%/');
    log_msg("Permalink structure diperbarui.", "success");
}

// 4. Definisi Halaman & Template yang Digunakan
$pages_to_setup = [
    [
        'title'    => 'Beranda',
        'slug'     => 'beranda',
        'template' => 'front-page.php',
        'is_front' => true,
    ],
    [
        'title'    => 'Katalog Produk',
        'slug'     => 'produk',
        'template' => 'page-product.php',
    ],
    [
        'title'    => 'Tentang Kami',
        'slug'     => 'tentang-kami',
        'template' => 'page-about.php',
    ],
    [
        'title'    => 'Artikel',
        'slug'     => 'blog',
        'template' => 'default',
        'is_posts' => true,
    ],
    [
        'title'    => 'Kontak & Kemitraan',
        'slug'     => 'kontak',
        'template' => 'page-contact.php',
    ],
    [
        'title'    => 'FAQ (Pertanyaan Umum)',
        'slug'     => 'faq',
        'template' => 'page-faq.php',
    ],
    [
        'title'    => 'Syarat & Ketentuan',
        'slug'     => 'syarat-ketentuan',
        'template' => 'page-legal.php',
    ],
    [
        'title'    => 'Kebijakan Privasi',
        'slug'     => 'kebijakan-privasi',
        'template' => 'page-legal.php',
    ],
];

$created_page_ids = [];
$front_page_id = 0;
$posts_page_id = 0;

log_msg("\n--- MEMULAI SETUP HALAMAN ---", "info");

foreach ($pages_to_setup as $p) {
    $title    = $p['title'];
    $slug     = $p['slug'];
    $template = $p['template'];

    // Cek apakah halaman dengan slug tersebut sudah ada
    $existing = get_page_by_path($slug, OBJECT, 'page');

    if (!$existing) {
        // Cek alternatif judul jika slug beda
        $existing_by_title = get_page_by_title($title, OBJECT, 'page');
        if ($existing_by_title) {
            $existing = $existing_by_title;
        }
    }

    if ($existing) {
        $page_id = $existing->ID;
        // Update slug & title jika perlu
        wp_update_post([
            'ID'          => $page_id,
            'post_title'  => $title,
            'post_name'   => $slug,
            'post_status' => 'publish',
        ]);
        log_msg("Halaman '{$title}' (ID: {$page_id}, Slug: /{$slug}) sudah ada. Memperbarui status & slug.", "info");
    } else {
        // Buat halaman baru
        $page_id = wp_insert_post([
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ]);
        log_msg("Halaman '{$title}' DIBUAT (ID: {$page_id}, Slug: /{$slug}).", "success");
    }

    // Set Page Template di meta
    if ($template !== 'default') {
        update_post_meta($page_id, '_wp_page_template', $template);
        log_msg("  └─ Set Meta Template: {$template}", "info");
    } else {
        delete_post_meta($page_id, '_wp_page_template');
    }

    $created_page_ids[$slug] = $page_id;

    if (!empty($p['is_front'])) {
        $front_page_id = $page_id;
    }
    if (!empty($p['is_posts'])) {
        $posts_page_id = $page_id;
    }
}

// 5. Set Homepage & Posts Page Settings
log_msg("\n--- MENGATUR READING SETTINGS ---", "info");

if ($front_page_id > 0) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id);
    log_msg("Front Page diset ke Halaman 'Beranda' (ID: {$front_page_id}).", "success");
}

if ($posts_page_id > 0) {
    update_option('page_for_posts', $posts_page_id);
    log_msg("Posts Page diset ke Halaman 'Artikel' (ID: {$posts_page_id}).", "success");
}

// 6. Membuat & Menghubungkan Primary Nav Menu
log_msg("\n--- MENGATUR NAVIGASI MENU ---", "info");

$menu_name = 'Menu Utama Orchid Care';
$menu_exists = wp_get_nav_menu_object($menu_name);

if (!$menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);
    log_msg("Navigasi Menu '{$menu_name}' berhasil dibuat (ID: {$menu_id}).", "success");
} else {
    $menu_id = $menu_exists->term_id;
    log_msg("Navigasi Menu '{$menu_name}' sudah ada (ID: {$menu_id}).", "info");
}

// Clear ALL item menu lama (termasuk status draft) agar tidak duplikat
$existing_items = wp_get_nav_menu_items($menu_id, ['post_status' => 'any']);
if (empty($existing_items)) {
    // Fallback: Query langsung post_type nav_menu_item jika wp_get_nav_menu_items memfilter draft
    $existing_items = get_posts([
        'post_type'   => 'nav_menu_item',
        'numberposts' => -1,
        'post_status' => 'any',
        'tax_query'   => [
            [
                'taxonomy' => 'nav_menu',
                'field'    => 'term_id',
                'terms'    => $menu_id,
            ],
        ],
    ]);
}

if ($existing_items) {
    foreach ($existing_items as $item) {
        $item_id = is_object($item) ? $item->ID : $item;
        wp_delete_post($item_id, true);
    }
    log_msg("Item menu lama dibersihkan.", "info");
}

// Tambahkan item menu secara berurutan
$menu_order = [
    'beranda'        => 'Beranda',
    'produk'         => 'Katalog Produk',
    'tentang-kami'   => 'Tentang Kami',
    'blog'           => 'Artikel',
    'faq'            => 'FAQ',
    'kontak'         => 'Kontak',
];

$order = 1;
foreach ($menu_order as $slug => $custom_title) {
    if (isset($created_page_ids[$slug])) {
        $pid = $created_page_ids[$slug];
        $item_db_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'     => $custom_title,
            'menu-item-object-id' => $pid,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => $order++,
        ]);

        // Pastikan status post nav_menu_item benar-benar 'publish'
        if ($item_db_id && !is_wp_error($item_db_id)) {
            wp_update_post([
                'ID'          => $item_db_id,
                'post_status' => 'publish',
            ]);
            log_msg("  ├─ Item Menu: {$custom_title} (/{$slug}) ditambahkan (ID: {$item_db_id}).", "success");
        } else {
            log_msg("  ├─ Gagal menambahkan Item Menu: {$custom_title}.", "error");
        }
    }
}

// Assign ke lokasi menu 'primary' theme
$locations = get_theme_mod('nav_menu_locations');
if (!is_array($locations)) {
    $locations = [];
}
$locations['primary'] = $menu_id;
set_theme_mod('nav_menu_locations', $locations);
log_msg("Menu '{$menu_name}' berhasil dipasang pada lokasi 'Primary Navigation'.", "success");

// 7. Flush Rewrite Rules
log_msg("\n--- FLUSH REWRITE RULES ---", "info");
flush_rewrite_rules();
log_msg("Rewrite rules berhasil di-flush.", "success");

log_msg("\n=======================================================", "success");
log_msg("🎉 SETUP HALAMAN & TEMPLATE ORCHID CARE SELESAI!", "success");
log_msg("=======================================================\n", "success");

if (!$is_cli) {
    echo "<p style='margin-top: 2rem; padding: 1rem; background: #1e293b; border-radius: 8px;'>✨ <strong>Semua halaman telah dibuat & siap digunakan!</strong> Anda sekarang dapat melihat situs WordPress Anda di <a href='" . home_url('/') . "' style='color: #88C425;'>Beranda Utama</a>.</p>";
    echo "</body></html>";
}
