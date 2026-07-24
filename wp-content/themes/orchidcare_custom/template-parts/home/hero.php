<?php
$tagline  = orchid_opt('hero_tagline', 'PT INDOTECH BERKAH ABADI · SLEMAN, YOGYAKARTA');
$headline = orchid_opt('hero_headline', 'Solusi Kimia Kebersihan &amp; Wewangian Berkualitas');
$subtitle = orchid_opt('hero_sub', 'Orchid Care memproduksi bahan kimia efisien &amp; ekonomis untuk Laundry, Rumah Tangga, Otomotif, dan Bahan Konsentrat — 1 kg biang diracik mandiri jadi 15 liter produk siap pakai.');
$cta1     = orchid_opt('hero_cta1', 'Katalog Produk');
$cta1_url = orchid_opt('hero_cta1_url', home_url('/produk'));
$cta2     = orchid_opt('hero_cta2', 'Konsultasi WA');
$cta2_url = orchid_opt('hero_cta2_url', orchid_wa_url('Halo Orchid Care, saya ingin bertanya tentang produk dan kemitraan.'));
?>

<section class="hero-section" id="hero">
    <!-- Color block background -->
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-block hero-block--mint"></div>
        <div class="hero-block hero-block--peach"></div>
        <div class="hero-block hero-block--butter"></div>
        <div class="hero-block hero-block--lavender"></div>
    </div>

    <div class="container hero-container">
        <!-- Copy side -->
        <div class="hero-content reveal">
            <span class="chip-tag">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66.95-2.3c.48.17.98.3 1.34.3C19 20 22 3 22 3c-1 2-8 2.25-13 3.25S2 11.5 2 13.5s1.75 3.75 1.75 3.75"/></svg>
                <?php echo esc_html($tagline); ?>
            </span>

            <h1 class="hero-headline">
                Solusi Kimia <span class="highlight-text">Kebersihan &amp; Wewangian</span>
            </h1>

            <p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>

            <!-- FLOATING SEARCH / FILTER BAR CARD (LAYOUT FROM REFERENCE IMAGE) -->
            <form action="<?php echo esc_url(home_url('/produk')); ?>" method="get" class="hero-search-card">
                <div class="search-field">
                    <label class="field-label">Kategori Produk</label>
                    <select name="kategori" class="field-select">
                        <option value="">Pilih Kategori</option>
                        <option value="chemical-laundry">Chemical Laundry</option>
                        <option value="malabeez-perfume">Malabeez Perfume</option>
                        <option value="chemical-rumah-tangga">Chemical Rumah Tangga</option>
                        <option value="chemical-sanitasi">Chemical Sanitasi</option>
                        <option value="chemical-automotive-care">Chemical Automotive Care</option>
                        <option value="paket-bahan-biang-sabun">Paket Bahan &amp; Biang Sabun</option>
                    </select>
                </div>
                <div class="field-divider"></div>
                <div class="search-field">
                    <label class="field-label">Skala Kebutuhan</label>
                    <select name="skala" class="field-select">
                        <option value="">Tipe Pemakaian</option>
                        <option value="rumah-tangga">Rumah Tangga</option>
                        <option value="laundry-kiloan">Laundry Kiloan</option>
                        <option value="b2b-hotel">Hotel &amp; Resto (B2B)</option>
                    </select>
                </div>
                <button type="submit" class="btn-search-pill" aria-label="Cari Produk">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    <span>Cari Produk</span>
                </button>
            </form>

            <div class="hero-trust">
                <span class="trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Legal &amp; Terdaftar
                </span>
                <span class="trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/></svg>
                    Formula Konsentrat
                </span>
                <span class="trust-item">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    Kirim Se-Indonesia
                </span>
            </div>
        </div>

        <!-- Hero visual -->
        <div class="hero-visual reveal">
            <div class="hero-visual-card">
                <div class="hero-img-wrap float-slow">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/hero-cluster.svg'); ?>"
                         alt="Ilustrasi 3D mesin cuci, botol deterjen, dan handuk Orchid Care"
                         width="900" height="900"
                         loading="eager"
                         class="hero-img">
                </div>

                <!-- Spinning badge -->
                <div class="hero-badge-spin">
                    <div class="badge-ring spin-slow"></div>
                    <div class="badge-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--orchid)" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                </div>

                <!-- Floating Overlay Pill Badge -->
                <div class="hero-chip chip-tag">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--orchid)" stroke-width="2"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/></svg>
                    100% KONSENTRAT BIANG
                </div>
            </div>
        </div>
    </div>
</section>
