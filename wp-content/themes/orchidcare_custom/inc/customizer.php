<?php
/**
 * Orchid Care Custom Theme — Customizer Settings (Sprint 2)
 * Manages PT Indotech Berkah Abadi identity, contact details, social media, & site settings.
 */

if (!defined('ABSPATH')) exit;

function orchid_customizer($wp_customize) {

    // ── Panel: Orchid Care Brand Settings ───────────────────────────────────
    $wp_customize->add_panel('orchid_brand_panel', [
        'title'       => __('Orchid Care Brand Settings', 'orchidcare'),
        'description' => __('Pengaturan identitas perusahaan PT Indotech Berkah Abadi, kontak, media sosial, & hero section.', 'orchidcare'),
        'priority'    => 20,
    ]);

    // ── Section 1: Identitas Perusahaan ───────────────────────────────────────
    $wp_customize->add_section('orchid_company', [
        'title'    => __('Identitas Perusahaan', 'orchidcare'),
        'panel'    => 'orchid_brand_panel',
        'priority' => 10,
    ]);

    $company_fields = [
        'company_name' => ['Nama Perusahaan Induk', 'PT Indotech Berkah Abadi'],
        'brand_name'   => ['Nama Brand Utama', 'Orchid Care'],
        'city_location'=> ['Lokasi Utama', 'Sleman, D.I. Yogyakarta'],
        'tagline'      => ['Tagline Resmi', 'Produsen Kimia Kebersihan & Perbekalan Rumah Tangga'],
    ];

    foreach ($company_fields as $key => [$label, $default]) {
        $wp_customize->add_setting("orchid_{$key}", [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("orchid_{$key}", [
            'label'   => $label,
            'section' => 'orchid_company',
            'type'    => 'text',
        ]);
    }

    // ── Section 2: Hero Section ─────────────────────────────────────────────
    $wp_customize->add_section('orchid_hero', [
        'title'    => __('Hero Section (Beranda)', 'orchidcare'),
        'panel'    => 'orchid_brand_panel',
        'priority' => 20,
    ]);

    $hero_fields = [
        'hero_tagline'  => ['Tagline Badge', 'PT INDOTECH BERKAH ABADI · SLEMAN, YOGYAKARTA'],
        'hero_headline' => ['Hero Headline', 'Solusi Kimia Kebersihan & Perbekalan Rumah Tangga'],
        'hero_sub'      => ['Hero Subtitle', 'Formulasi kimia berkualitas tinggi untuk laundry profesional, kebutuhan rumah tangga, dan biang konsentrat hemat ongkir ke seluruh Indonesia.'],
        'hero_cta1'     => ['Teks CTA 1 (Katalog)', 'Lihat Katalog Produk'],
        'hero_cta1_url' => ['URL CTA 1', '/produk'],
        'hero_cta2'     => ['Teks CTA 2 (WhatsApp)', 'Konsultasi Kemitraan'],
        'hero_cta2_url' => ['URL CTA 2', 'https://api.whatsapp.com/send?phone=6287885590088'],
    ];

    foreach ($hero_fields as $key => [$label, $default]) {
        $wp_customize->add_setting("orchid_{$key}", [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("orchid_{$key}", [
            'label'   => $label,
            'section' => 'orchid_hero',
            'type'    => 'text',
        ]);
    }

    // ── Section 3: Informasi Kontak & Lokasi ────────────────────────────────
    $wp_customize->add_section('orchid_contact', [
        'title'    => __('Informasi Kontak & Lokasi', 'orchidcare'),
        'panel'    => 'orchid_brand_panel',
        'priority' => 30,
    ]);

    $contact_fields = [
        'phone'       => ['Nomor Telepon', '+62 878-8559-0088'],
        'whatsapp'    => ['Nomor WhatsApp CS (Tanpa simbol/spasi)', '6287885590088'],
        'email'       => ['Email Resmi', 'orchidcare@orchidbrand.id'],
        'address'     => ['Alamat Lengkap', 'Jongke Tengah No. 30, Sendangadi, Mlati, Sleman, D.I. Yogyakarta'],
        'maps_url'    => ['URL Link Google Maps', 'https://maps.google.com/?q=Sleman,+Yogyakarta'],
    ];

    foreach ($contact_fields as $key => [$label, $default]) {
        $wp_customize->add_setting("orchid_{$key}", [
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("orchid_{$key}", [
            'label'   => $label,
            'section' => 'orchid_contact',
            'type'    => 'text',
        ]);
    }

    // ── Section 4: Media Sosial ─────────────────────────────────────────────
    $wp_customize->add_section('orchid_social', [
        'title'    => __('Media Sosial', 'orchidcare'),
        'panel'    => 'orchid_brand_panel',
        'priority' => 40,
    ]);

    $social_fields = [
        'facebook'  => ['Facebook URL', 'https://www.facebook.com/orchidcare.id/'],
        'instagram' => ['Instagram URL', 'https://www.instagram.com/orchidcareofficial/'],
        'youtube'   => ['YouTube URL', 'https://www.youtube.com/channel/UCrmo5q_w6rBSypc2l1ElY9w'],
        'tiktok'    => ['TikTok URL', 'https://www.tiktok.com/@orchidcare_official'],
    ];

    foreach ($social_fields as $key => [$label, $default]) {
        $wp_customize->add_setting("orchid_{$key}", [
            'default'           => $default,
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control("orchid_{$key}", [
            'label'   => $label,
            'section' => 'orchid_social',
            'type'    => 'url',
        ]);
    }

    // ── Section 5: Header & Footer Settings ─────────────────────────────────
    $wp_customize->add_section('orchid_footer', [
        'title'    => __('Pengaturan Footer & Copyright', 'orchidcare'),
        'panel'    => 'orchid_brand_panel',
        'priority' => 50,
    ]);

    $wp_customize->add_setting('orchid_copyright', [
        'default'           => 'Orchid Care by PT Indotech Berkah Abadi (Sleman, Yogyakarta). Hak Cipta Dilindungi.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('orchid_copyright', [
        'label'   => __('Teks Copyright Footer', 'orchidcare'),
        'section' => 'orchid_footer',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'orchid_customizer');

/**
 * Helper: Get theme option with fallback
 */
if (!function_exists('orchid_opt')) {
    function orchid_opt($key, $default = '') {
        $val = get_theme_mod("orchid_{$key}", false);
        if ($val === false || $val === '') {
            return $default;
        }
        return $val;
    }
}
