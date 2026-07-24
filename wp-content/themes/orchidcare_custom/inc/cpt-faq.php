<?php
/**
 * Orchid Care Custom Theme — FAQ Custom Post Type (Sprint 4)
 */

if (!defined('ABSPATH')) exit;

function orchid_register_faq_cpt() {
    register_post_type('faq', [
        'labels' => [
            'name'               => 'FAQ Pertanyaan',
            'singular_name'      => 'FAQ',
            'add_new'            => 'Tambah FAQ Baru',
            'add_new_item'       => 'Tambah FAQ',
            'edit_item'          => 'Edit FAQ',
            'new_item'           => 'FAQ Baru',
            'view_item'          => 'Lihat FAQ',
            'search_items'       => 'Cari FAQ',
            'not_found'          => 'FAQ tidak ditemukan',
            'menu_name'          => 'FAQ System',
        ],
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-editor-help',
        'supports'           => ['title', 'editor', 'page-attributes'],
        'show_in_rest'       => true,
    ]);
}
add_action('init', 'orchid_register_faq_cpt');
