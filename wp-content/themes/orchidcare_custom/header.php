<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$whatsapp = orchid_opt('whatsapp', '6285559474797');
$wa_num   = preg_replace('/[^0-9]/', '', $whatsapp);
$wa_url   = orchid_wa_url('Halo Orchid Care, saya ingin bertanya mengenai produk.');
?>

<header class="site-header" id="site-header">
    <div class="header-inner container">

        <!-- ═══ LOGO ═══ -->
        <div class="site-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" aria-label="Orchid Care — Beranda">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>" alt="Orchid Care Logo" class="site-logo-img" width="190" height="55">
                </a>
            <?php endif; ?>
        </div>

        <!-- ═══ NAVIGATION ═══ -->
        <nav class="primary-nav" id="primary-nav" aria-label="Navigasi Utama" onclick="if(event.target.closest('a')){document.body.classList.remove('nav-open');}">
            <div class="mobile-nav-top">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo-link">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>" alt="Orchid Care Logo" class="mobile-drawer-logo">
                </a>
            </div>


            <?php wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => function() {
                    $items = [
                        '/'             => 'Beranda',
                        '/produk'       => 'Katalog Produk',
                        '/tentang-kami' => 'Tentang Kami',
                        '/blog'         => 'Artikel',
                        '/kontak'       => 'Kontak',
                    ];
                    echo '<ul class="nav-menu">';
                    foreach ($items as $path => $label) {
                        $url = esc_url(home_url($path));
                        echo "<li><a href=\"{$url}\">{$label}</a></li>";
                    }
                    echo '</ul>';
                },
            ]); ?>

            <!-- Mobile extra info (Socials & Address) -->
            <div class="mobile-nav-extra" style="margin-top: auto; padding-top: 0.85rem; border-top: 1px solid rgba(0, 0, 0, 0.08);">
                <div class="mobile-info-block" style="margin-bottom: 0.75rem;">
                    <div style="font-size: 0.72rem; font-weight: 800; color: #88C425; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 0.2rem;">
                        PT INDOTECH BERKAH ABADI
                    </div>
                    <p style="font-size: 0.8rem; color: #475569; line-height: 1.4; margin: 0 0 0.35rem;">
                        Jongke Tengah No. 30, RT.01/RW.23, Sendangadi, Kec. Mlati, Sleman, D.I. Yogyakarta 55285
                    </p>
                    <a href="mailto:indotechberkahabadi@gmail.com" style="font-size: 0.8rem; color: var(--ink); font-weight: 600; text-decoration: underline;">
                        indotechberkahabadi@gmail.com
                    </a>
                </div>

                <div class="mobile-social-row" style="display: flex; gap: 0.6rem; margin-bottom: 0.75rem;">
                    <a href="https://www.instagram.com/orchidcareofficial/" target="_blank" rel="noopener" style="width: 36px; height: 36px; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="https://www.facebook.com/orchidcare.id/" target="_blank" rel="noopener" style="width: 36px; height: 36px; background: #1877F2; color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;" aria-label="Facebook">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" style="width: 36px; height: 36px; background: #25D366; color: #fff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;" aria-label="WhatsApp">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                    </a>
                </div>

                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener"
                   class="mobile-nav-cta" style="padding: 0.75rem 1rem; font-size: 0.9rem;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    Hubungi Kami via WhatsApp
                </a>
            </div>
        </nav>

        <!-- ═══ ACTIONS ═══ -->
        <div class="header-actions">
            <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener"
               class="btn btn-coral"
               aria-label="Chat via WhatsApp">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                Hubungi Kami
            </a>

            <!-- Mobile hamburger (Inline onclick for zero-dependency operation) -->
            <button class="menu-toggle" id="menu-toggle" aria-label="Buka Menu" aria-expanded="false" onclick="document.body.classList.toggle('nav-open'); this.setAttribute('aria-expanded', document.body.classList.contains('nav-open'));">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

    </div>
</header>
