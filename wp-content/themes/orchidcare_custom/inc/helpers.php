<?php
/**
 * Orchid Care Custom Theme — Helper Utilities (Sprint 2)
 */

if (!defined('ABSPATH')) exit;

/**
 * Format phone number for WhatsApp link (strip non-digits, leading 0 → 62)
 */
if (!function_exists('orchid_format_wa_number')) {
    function orchid_format_wa_number($phone = '') {
        if (empty($phone)) {
            $phone = orchid_opt('whatsapp', '6285559474797');
        }
        $clean = preg_replace('/[^0-9]/', '', $phone);
        if (strpos($clean, '0') === 0) {
            $clean = '62' . substr($clean, 1);
        }
        return $clean;
    }
}

/**
 * Generate WhatsApp URL with pre-filled custom message
 */
if (!function_exists('orchid_wa_url')) {
    function orchid_wa_url($message = '') {
        $wa_num = orchid_format_wa_number(orchid_opt('whatsapp', '6285559474797'));
        $url = "https://api.whatsapp.com/send?phone={$wa_num}";
        if ($message) {
            $url .= '&text=' . rawurlencode($message);
        }
        return $url;
    }
}

/**
 * Dynamic Breadcrumbs Component Generator
 */
if (!function_exists('orchid_breadcrumbs')) {
    function orchid_breadcrumbs() {
        if (is_front_page()) {
            return;
        }

        echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
        echo '<a href="' . esc_url(home_url('/')) . '" class="breadcrumb-link">Beranda</a>';

        if (is_post_type_archive('product')) {
            echo '<span class="sep">/</span>';
            echo '<span class="current">Katalog Produk</span>';
        } elseif (is_singular('product')) {
            echo '<span class="sep">/</span>';
            echo '<a href="' . esc_url(home_url('/produk')) . '" class="breadcrumb-link">Katalog Produk</a>';
            
            $terms = get_the_terms(get_the_ID(), 'product_cat');
            if (!empty($terms) && !is_wp_error($terms)) {
                $term = reset($terms);
                echo '<span class="sep">/</span>';
                echo '<a href="' . esc_url(get_term_link($term)) . '" class="breadcrumb-link">' . esc_html($term->name) . '</a>';
            }
            
            echo '<span class="sep">/</span>';
            echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_tax('product_cat')) {
            echo '<span class="sep">/</span>';
            echo '<a href="' . esc_url(home_url('/produk')) . '" class="breadcrumb-link">Katalog Produk</a>';
            echo '<span class="sep">/</span>';
            echo '<span class="current">' . esc_html(single_term_title('', false)) . '</span>';
        } elseif (is_home() || (is_archive() && !is_post_type_archive('product'))) {
            echo '<span class="sep">/</span>';
            echo '<span class="current">' . esc_html(get_the_title(get_option('page_for_posts')) ?: 'Artikel & Edukasi') . '</span>';
        } elseif (is_single()) {
            echo '<span class="sep">/</span>';
            echo '<a href="' . esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')) . '" class="breadcrumb-link">Artikel</a>';
            echo '<span class="sep">/</span>';
            echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
        } elseif (is_page()) {
            echo '<span class="sep">/</span>';
            echo '<span class="current">' . esc_html(get_the_title()) . '</span>';
        }

        echo '</nav>';
    }
}

/**
 * Output LocalBusiness & Product Schema JSON-LD Markup
 */
if (!function_exists('orchid_render_schema_markup')) {
    function orchid_render_schema_markup() {
        // LocalBusiness Schema
        $local_schema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'LocalBusiness',
            'name'        => 'PT Indotech Berkah Abadi — Orchid Care',
            'description' => 'Produsen bahan kimia untuk laundry, perbekalan rumah tangga (PKRT), perawatan otomotif, & biang konsentrat di Sleman, Yogyakarta.',
            'url'         => home_url('/'),
            'telephone'   => orchid_opt('phone', '+62 855-5947-4797'),
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Jongke Tengah No. 30, Sendangadi, Mlati',
                'addressLocality' => 'Sleman',
                'addressRegion'   => 'D.I. Yogyakarta',
                'countryName'     => 'Indonesia',
            ],
            'geo'         => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => '-7.762551',
                'longitude' => '110.362143',
            ],
            'priceRange'  => '$$',
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($local_schema) . '</script>' . "\n";

        // Product Schema if on single product page
        if (is_singular('product')) {
            $product_id = get_the_ID();
            $sku        = get_post_meta($product_id, '_product_sku', true) ?: 'OC-' . $product_id;
            $img_url    = get_the_post_thumbnail_url($product_id, 'full') ?: ORCHID_URI . '/assets/img/logo.webp';

            $product_schema = [
                '@context'    => 'https://schema.org',
                '@type'       => 'Product',
                'name'        => get_the_title(),
                'image'       => $img_url,
                'description' => wp_strip_all_tags(get_the_excerpt() ?: get_the_content()),
                'sku'         => $sku,
                'brand'       => [
                    '@type' => 'Brand',
                    'name'  => 'Orchid Care',
                ],
                'offers'      => [
                    '@type'         => 'Offer',
                    'url'           => get_permalink(),
                    'priceCurrency' => 'IDR',
                    'price'         => '0',
                    'priceValidUntil' => '2030-12-31',
                    'itemCondition' => 'https://schema.org/NewCondition',
                    'availability'  => 'https://schema.org/InStock',
                    'seller'        => [
                        '@type' => 'Organization',
                        'name'  => 'PT Indotech Berkah Abadi',
                    ],
                ],
            ];

            echo '<script type="application/ld+json">' . wp_json_encode($product_schema) . '</script>' . "\n";
        }
    }
    add_action('wp_head', 'orchid_render_schema_markup');
}

/**
 * Render Uniform Page Hero Component
 */
if (!function_exists('orchid_page_hero')) {
    function orchid_page_hero($badge = '', $title = '', $lead = '', $button = null) {
        get_template_part('template-parts/components/page-hero', null, [
            'badge'  => $badge,
            'title'  => $title,
            'lead'   => $lead,
            'button' => $button,
        ]);
    }
}
