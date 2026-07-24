<?php
/**
 * Orchid Care Custom Theme — Product Custom Post Type & Meta Boxes (Sprint 3)
 */

if (!defined('ABSPATH')) exit;

/**
 * Register Product CPT & Product Category Taxonomy
 */
function orchid_register_product_cpt() {

    // Register Product Post Type
    register_post_type('product', [
        'labels' => [
            'name'               => 'Katalog Produk',
            'singular_name'      => 'Produk',
            'add_new'            => 'Tambah Produk Baru',
            'add_new_item'       => 'Tambah Produk',
            'edit_item'          => 'Edit Produk',
            'new_item'           => 'Produk Baru',
            'view_item'          => 'Lihat Produk',
            'search_items'       => 'Cari Produk',
            'not_found'          => 'Produk tidak ditemukan',
            'not_found_in_trash' => 'Tidak ada produk di kotak sampah',
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

    // Register Product Category Taxonomy
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
add_action('init', 'orchid_register_product_cpt');

/**
 * Seed Default Categories on Theme Activation
 */
function orchid_seed_default_categories() {
    if (!get_option('orchid_categories_seeded')) {
        $default_cats = [
            'Perawatan Laundry' => 'perawatan-laundry',
            'Home Care'         => 'home-care',
            'Perawatan Otomotif'=> 'perawatan-otomotif',
            'Bahan Konsentrat'  => 'biang-konsentrat',
        ];

        foreach ($default_cats as $name => $slug) {
            if (!term_exists($slug, 'product_cat')) {
                wp_insert_term($name, 'product_cat', ['slug' => $slug]);
            }
        }
        update_option('orchid_categories_seeded', true);
    }
}
add_action('init', 'orchid_seed_default_categories', 15);

/**
 * Add Meta Box for Product Details (Biang Ratio, Packaging, Aroma, Benefits, Usage)
 */
function orchid_add_product_meta_boxes() {
    add_meta_box(
        'orchid_product_spec_meta',
        'Spesifikasi & Atribut Produk Orchid Care',
        'orchid_render_product_spec_meta_box',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'orchid_add_product_meta_boxes');

/**
 * Render Product Spec Meta Box in Admin Editor
 */
function orchid_render_product_spec_meta_box($post) {
    wp_nonce_field('orchid_save_product_meta', 'orchid_product_meta_nonce');

    $is_concentrate = get_post_meta($post->ID, '_product_is_concentrate', true);
    $ratio          = get_post_meta($post->ID, '_product_ratio', true);
    $packaging      = get_post_meta($post->ID, '_product_packaging', true);
    $aroma          = get_post_meta($post->ID, '_product_aroma', true);
    $sku            = get_post_meta($post->ID, '_product_sku', true);
    $benefits       = get_post_meta($post->ID, '_product_benefits', true);
    $usage          = get_post_meta($post->ID, '_product_usage', true);
    ?>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
            <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">SKU Produk:</label>
            <input type="text" name="_product_sku" value="<?php echo esc_attr($sku); ?>" placeholder="Contoh: OC-DMAT-01" style="width: 100%;">
        </div>
        <div>
            <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Varian Aroma / Warna:</label>
            <input type="text" name="_product_aroma" value="<?php echo esc_attr($aroma); ?>" placeholder="Contoh: Super Lemon Fresh / Oranye Transparan" style="width: 100%;">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
            <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Apakah Produk Biang Konsentrat?</label>
            <select name="_product_is_concentrate" style="width: 100%;">
                <option value="no" <?php selected($is_concentrate, 'no'); ?>>Bukan (Produk Siap Pakai)</option>
                <option value="yes" <?php selected($is_concentrate, 'yes'); ?>>Ya (Bahan Konsentrat / Biang Ekstrak)</option>
            </select>
        </div>
        <div>
            <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Rasio Peracikan (Mixing Ratio):</label>
            <input type="text" name="_product_ratio" value="<?php echo esc_attr($ratio); ?>" placeholder="Contoh: 1 kg Biang -> 15 Liter siap pakai" style="width: 100%;">
        </div>
    </div>

    <div style="margin-bottom: 1rem;">
        <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Tipe Kemasan Tersedia:</label>
        <input type="text" name="_product_packaging" value="<?php echo esc_attr($packaging); ?>" placeholder="Contoh: Retail (250ml, 1L), Jerigen (5L, 20L), Biang 1kg" style="width: 100%;">
    </div>

    <div style="margin-bottom: 1rem;">
        <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Keunggulan & Manfaat Utama (Satu per baris):</label>
        <textarea name="_product_benefits" rows="3" style="width: 100%;"><?php echo esc_textarea($benefits); ?></textarea>
    </div>

    <div style="margin-bottom: 1rem;">
        <label style="font-weight: 600; display: block; margin-bottom: 0.25rem;">Petunjuk Penggunaan / Peracikan Mandiri:</label>
        <textarea name="_product_usage" rows="4" style="width: 100%;"><?php echo esc_textarea($usage); ?></textarea>
    </div>
    <?php
}

/**
 * Save Product Meta Box Data
 */
function orchid_save_product_meta($post_id) {
    if (!isset($_POST['orchid_product_meta_nonce']) || !wp_verify_nonce($_POST['orchid_product_meta_nonce'], 'orchid_save_product_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['_product_is_concentrate', '_product_ratio', '_product_packaging', '_product_aroma', '_product_sku', '_product_benefits', '_product_usage'];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_textarea_field($_POST[$field]));
        }
    }
}
add_action('save_post_product', 'orchid_save_product_meta');
