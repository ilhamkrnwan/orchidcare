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
        } elseif (is_404()) {
            echo '<span class="sep">/</span>';
            echo '<span class="current">404 Not Found</span>';
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

/**
 * Automatically format "Baca Juga:" lines in post content into styled callouts
 */
if (!function_exists('orchid_format_baca_juga_content')) {
    function orchid_format_baca_juga_content($content) {
        if (!is_singular('post') || is_admin()) {
            return $content;
        }

        // Match <p> elements containing "baca juga" / "baca juga:" / "baca juga –"
        $pattern = '/<p>(?:\s*<strong[^>]*>)?\s*(?:baca\s+juga\s*:?|baca\s+juga\s*–?)\s*:?\s*(?:<\/strong>)?\s*(.*?)<\/p>/i';

        return preg_replace_callback($pattern, function($matches) {
            $inner = trim($matches[1]);
            if (empty($inner)) return $matches[0];

            return '<div class="baca-juga-callout">
                <div class="baca-juga-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 1 3-3h7z"/></svg>
                    <span>BACA JUGA</span>
                </div>
                <div class="baca-juga-content">' . $inner . '</div>
            </div>';
        }, $content);
    }
    add_filter('the_content', 'orchid_format_baca_juga_content', 20);
}

/**
 * Custom Comment HTML Output Callback
 */
if (!function_exists('orchid_comment_callback')) {
    function orchid_comment_callback($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        $is_author = false;
        if ($comment->user_id > 0) {
            $post = get_post($comment->comment_post_ID);
            if ($post && $post->post_author == $comment->user_id) {
                $is_author = true;
            }
        }
        ?>
        <li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>">
            <article class="comment-body" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.35rem; margin-bottom: 1.25rem;">
                <div style="display: flex; gap: 1rem; align-items: flex-start;">
                    <div class="comment-avatar" style="flex-shrink: 0;">
                        <?php echo get_avatar($comment, 48, '', '', ['class' => 'avatar-img', 'style' => 'border-radius: 50%; display: block; border: 2px solid #88C425;']); ?>
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.35rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                                <strong style="color: #16361E; font-weight: 800; font-size: 1rem;">
                                    <?php comment_author(); ?>
                                </strong>
                                <?php if ($is_author) : ?>
                                    <span style="background: #16361E; color: #88C425; font-size: 0.7rem; font-weight: 800; padding: 0.15rem 0.55rem; border-radius: 999px;">
                                        Penulis Artikel
                                    </span>
                                <?php endif; ?>
                            </div>
                            <time datetime="<?php comment_time('c'); ?>" style="font-size: 0.8rem; color: rgba(22, 54, 30, 0.6); font-weight: 500;">
                                <?php comment_date('d F Y'); ?> • <?php comment_time('H:i'); ?> WIB
                            </time>
                        </div>

                        <?php if ($comment->comment_approved == '0') : ?>
                            <div style="background: #FFFBEB; border: 1px solid #FDE68A; color: #92400E; font-size: 0.85rem; padding: 0.5rem 0.85rem; border-radius: 0.5rem; margin-bottom: 0.65rem; font-weight: 600;">
                                ⏳ Komentar Anda sedang menunggu peninjauan moderasi redaksi.
                            </div>
                        <?php endif; ?>

                        <div class="comment-text" style="color: rgba(22, 54, 30, 0.88); font-size: 0.95rem; line-height: 1.65; margin-bottom: 0.75rem;">
                            <?php comment_text(); ?>
                        </div>

                        <div class="reply-wrap" style="text-align: right;">
                            <?php
                            comment_reply_link(array_merge($args, [
                                'add_below' => 'comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => 'Balas ↵',
                                'before'    => '',
                                'after'     => '',
                            ]));
                            ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php
    }
}
