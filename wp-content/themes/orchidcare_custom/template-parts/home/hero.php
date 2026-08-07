<?php
/**
 * Hero Section — Orchid Care
 * Candy Pastel Blocks with diagonal flow.
 * 4 blocks = 4 product categories (Sabun, Parfum, Home Care, Sanitasi)
 */
$tagline  = orchid_opt('hero_tagline', 'Pabrik & Supplier Sabun Tangan Pertama');
$subtitle = orchid_opt('hero_sub', 'Orchid Care memproduksi langsung deterjen cair laundry, sabun cuci piring, sabun pel lantai, parfum laundry tahan lama, hingga biang konsentrat 1kg jadi 15 liter — efisien &amp; ekonomis untuk rumah tangga, usaha laundry, dan pasokan B2B.');
$cta1     = orchid_opt('hero_cta1', 'Katalog Produk');
$cta1_url = orchid_opt('hero_cta1_url', home_url('/produk'));
$cta2     = orchid_opt('hero_cta2', 'Konsultasi WA');
$cta2_url = orchid_opt('hero_cta2_url', orchid_wa_url('Halo Orchid Care, saya ingin bertanya tentang produk sabun, parfum laundry, dan biang konsentrat.'));
?>

<section class="hero-section" id="hero">
    <!-- Diagonal pastel blocks — each represents a product category -->
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-block hero-block--mint"></div>
        <div class="hero-block hero-block--peach"></div>
        <div class="hero-block hero-block--butter"></div>
        <div class="hero-block hero-block--lavender"></div>
    </div>

    <div class="container hero-container">
        <!-- Copy side -->
        <div class="hero-content reveal">
            <span class="chip-tag chip-tag--mint">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75"/></svg>
                <?php echo esc_html($tagline); ?>
            </span>

            <h1 class="hero-headline">
                Pusat Sabun, Parfum &amp;
                <em class="hero-accent">Biang Konsentrat</em>
            </h1>

            <p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>

            <!-- Category search bar -->
            <form action="<?php echo esc_url(home_url('/produk')); ?>" method="get" class="hero-search-card">
                <div class="search-field">
                    <label class="field-label" for="hero-kategori-select">Kategori Produk</label>
                    <select name="kategori" id="hero-kategori-select" class="field-select" aria-label="Pilih Kategori Produk">
                        <option value="">Pilih Kategori Produk</option>
                        <option value="sabun-laundry">Sabun &amp; Deterjen Laundry</option>
                        <option value="malabeez-perfume">Parfum Laundry &amp; Wewangian</option>
                        <option value="sabun-pel-homecare">Sabun Pel &amp; Pembersih Rumah</option>
                        <option value="paket-biang-sabun">Biang &amp; Konsentrat Sabun (1kg -> 15L)</option>
                        <option value="automotive-care">Shampoo Mobil &amp; Motor</option>
                        <option value="sanitasi-disinfektan">Sanitasi Care &amp; Disinfektan</option>
                    </select>
                </div>
                <button type="submit" class="btn-search-pill" aria-label="Cari Produk">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <span>Cari Produk</span>
                </button>
            </form>

            <!-- Trust badges — each tied to a pastel color -->
            <div class="hero-trust">
                <span class="trust-item trust-item--mint">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Izin Resmi Kemenkes
                </span>
                <span class="trust-item trust-item--peach">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/></svg>
                    Biang Sabun (Hemat Ongkir)
                </span>
                <span class="trust-item trust-item--lavender">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    Kirim Se-Indonesia
                </span>
            </div>
        </div>

        <!-- Hero visual — product image directly -->
        <div class="hero-visual reveal">
            <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/gambar-awal.webp'); ?>"
                 alt="Pusat Sabun Cuci Piring, Deterjen Laundry, Pembersih Lantai, dan Biang Konsentrat — Orchid Care"
                 width="900" height="900"
                 loading="eager"
                 class="hero-img">
        </div>
    </div>
</section>
