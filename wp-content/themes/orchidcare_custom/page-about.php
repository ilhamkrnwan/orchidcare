<?php
/**
 * Template Name: Tentang Kami
 * Template Path: page-about.php
 */

get_header();
$wa_url = orchid_wa_url('Halo Orchid Care, saya ingin bertanya tentang profil brand, produk sabun, parfum laundry, dan kemitraan agen.');
?>

<!-- Inline Responsive Styling untuk Mobile Compatibility & Clean Layout -->
<style>
.about-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
@media (max-width: 768px) {
    .about-page section {
        padding: 3rem 0 !important;
    }
    .about-page .feature-grid {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
    .about-page .evermos-bento-grid {
        grid-template-columns: 1fr !important;
    }
    .about-page .kat-bento {
        grid-template-columns: 1fr !important;
    }
    .about-page .ecosystem-grid {
        grid-template-columns: 1fr !important;
    }
    .about-page .about-article-item {
        grid-template-columns: 1fr !important;
        gap: 1.25rem !important;
        padding-bottom: 2rem !important;
    }
    .about-page .about-article-thumb {
        height: 180px !important;
    }
    .about-page .maps-info-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<main id="main-content" class="about-page">
    
    <!-- ═══ 1. CLEAN & ELEGANT PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'TENTANG ORCHID CARE',
        'Produsen Sabun Laundry, Pembersih PKRT & Biang Konsentrat Sleman Yogyakarta',
        'Orchid Care adalah brand resmi Perbekalan Kesehatan Rumah Tangga (PKRT), pembersih serbaguna, deterjen laundry kiloan, parfum wewangian linen, dan biang konsentrat hemat ongkir. Seluruh lini produk diproduksi langsung oleh <a href="https://indotech.id/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; text-decoration: underline;">PT Indotech Berkah Abadi</a> di Sleman, D.I. Yogyakarta.'
    ); ?>

    <!-- ═══ 2. BRAND STORY & PROFIL PERJALANAN BRAND ═══ -->
    <section class="about-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <!-- Grid 2 Kolom (Konten Teks & Ilustrasi Gambar indotech.png Clean Tanpa Padding) -->
            <div class="feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3.5rem; align-items: center;">
                
                <!-- Kolom Teks Profil -->
                <div class="reveal">
                    <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.75rem; display: inline-block;">PROFIL &amp; PERJALANAN BRAND</span>
                    
                    <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4vw, 2.5rem); color: #16361E; line-height: 1.25; margin-bottom: 1rem; font-weight: 800;">
                        10+ Tahun Menjaga Mutu &amp; Kepercayaan Mitra Indonesia
                    </h2>

                    <p style="color: rgba(22, 54, 30, 0.8); font-size: 1rem; line-height: 1.68; margin-bottom: 1.25rem;">
                        Berpusat di Sleman, D.I. Yogyakarta, <strong>Orchid Care</strong> berkembang sebagai supplier dan produsen tangan pertama Perbekalan Kesehatan Rumah Tangga (PKRT). Kami melayani kebutuhan laundry profesional, rumah tangga, instansi, hingga mitra agen grosir se-Indonesia.
                    </p>

                    <p style="color: rgba(22, 54, 30, 0.8); font-size: 1rem; line-height: 1.68; margin-bottom: 1.5rem;">
                        Setiap produk diracik presisi di laboratorium teruji, memiliki izin edar resmi Kemenkes RI, serta tersertifikasi Halal MUI untuk memberikan keamanan penuh bagi penggunaan harian dan usaha.
                    </p>

                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.75rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 700; border-radius: 999px;">
                            <span>Hubungi Tim Kemitraan WA &rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Kolom Ilustrasi Gambar indotech1.png (Clean, Persegi, Tanpa Padding) -->
                <div class="reveal" style="text-align: center;">
                    <div style="position: relative; width: 100%; max-width: 500px; border-radius: 1.25rem; overflow: hidden; box-shadow: 0 12px 35px rgba(22, 54, 30, 0.1); border: 1px solid rgba(22, 54, 30, 0.08); background: #fafafa; margin: 0 auto;">
                        <img 
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/indotech1.png'); ?>" 
                            alt="Fasilitas Pabrik PT Indotech Berkah Abadi Produsen Orchid Care Yogyakarta" 
                            style="width: 100%; height: 100%; display: block; object-fit: cover; border-radius: 1.25rem;" 
                            loading="lazy"
                        >
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══ SECTION: KENAPA HARUS KAMI (TRUE BENTO GRID GAYA EVERMOS) ═══ -->
    <section class="why-us-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="section-header reveal text-center" style="max-width: 800px; margin: 0 auto 3.5rem;">
                <span class="chip-tag chip-tag--butter" style="margin-bottom: 0.75rem; display: inline-block;">KEUNGGULAN BRAND</span>
                <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4.5vw, 2.6rem); color: #16361E; font-weight: 800; line-height: 1.2;">
                    Mengapa Memilih Produk Orchid Care?
                </h2>
                <p class="section-desc" style="color: rgba(22, 54, 30, 0.75); font-size: 1.02rem; line-height: 1.65; margin-top: 0.75rem;">
                    Alasan Utama Pengusaha Laundry Kiloan, Konsumen Rumah Tangga, &amp; Agen Grosir Memilih Orchid Care.
                </p>
            </div>

            <!-- True Asymmetric Bento Grid (Evermos 3-Column Layout) -->
            <div class="evermos-bento-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; align-items: stretch;">
                
                <!-- Kolom 1 (Kiri Stack 2 Card) -->
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    <!-- Card 1: PKRT & Halal -->
                    <div class="why-bento-card reveal" style="position: relative; overflow: hidden; background: #DDF6AC; border-radius: 1.75rem; padding: 2rem 1.75rem 4.5rem 1.75rem; flex: 1; min-height: 220px; border: 1px solid rgba(22, 54, 30, 0.08);">
                        <div style="position: absolute; right: -15px; bottom: -15px; opacity: 0.12; pointer-events: none;">
                            <svg width="150" height="150" viewBox="0 0 100 100" fill="#16361E"><path d="M50 5L90 25V50C90 75 50 95 50 95C50 95 10 75 10 50V25L50 5Z"/></svg>
                        </div>
                        <div style="position: relative; z-index: 2; max-width: 75%;">
                            <span style="font-family: var(--font-mono, monospace); font-size: 0.72rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block; margin-bottom: 0.4rem;">LEGALITAS &amp; MUTU</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.3rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.4rem;">Izin PKRT Kemenkes RI &amp; Halal MUI</h3>
                            <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.9rem; line-height: 1.5; margin: 0;">Lolos pengujian laboratorium resmi, ramah lingkungan, &amp; aman harian.</p>
                        </div>
                        <div style="position: absolute; right: 1rem; bottom: 1rem; z-index: 2; width: 72px; height: 72px; background: rgba(255,255,255,0.7); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); box-shadow: 0 6px 16px rgba(22,54,30,0.06);">
                            <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#16361E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                        </div>
                    </div>

                    <!-- Card 2: Biang Konsentrat -->
                    <div class="why-bento-card reveal" style="position: relative; overflow: hidden; background: #EAF8D0; border-radius: 1.75rem; padding: 2rem 1.75rem 4.5rem 1.75rem; flex: 1; min-height: 220px; border: 1px solid rgba(22, 54, 30, 0.08);">
                        <div style="position: absolute; right: -15px; bottom: -15px; opacity: 0.12; pointer-events: none;">
                            <svg width="150" height="150" viewBox="0 0 100 100" fill="#16361E"><rect x="10" y="10" width="80" height="80" rx="20"/></svg>
                        </div>
                        <div style="position: relative; z-index: 2; max-width: 75%;">
                            <span style="font-family: var(--font-mono, monospace); font-size: 0.72rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block; margin-bottom: 0.4rem;">INOVASI FORMULA</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.3rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.4rem;">Biang 1kg Jadi 15L (Hemat Ongkir 90%)</h3>
                            <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.9rem; line-height: 1.5; margin: 0;">Solusi efisien pasokan luar pulau tanpa terbeban biaya kirim cairan berat.</p>
                        </div>
                        <div style="position: absolute; right: 1rem; bottom: 1rem; z-index: 2; width: 72px; height: 72px; background: rgba(255,255,255,0.7); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); box-shadow: 0 6px 16px rgba(22,54,30,0.06);">
                            <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#D81B80" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        </div>
                    </div>

                </div>

                <!-- Kolom 2 (Tengah Stack 2 Card) -->
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    
                    <!-- Card 3: Wewangian Impor -->
                    <div class="why-bento-card reveal" style="position: relative; overflow: hidden; background: #EAF8D0; border-radius: 1.75rem; padding: 2rem 1.75rem 4.5rem 1.75rem; flex: 1; min-height: 220px; border: 1px solid rgba(22, 54, 30, 0.08);">
                        <div style="position: absolute; right: -15px; bottom: -15px; opacity: 0.12; pointer-events: none;">
                            <svg width="150" height="150" viewBox="0 0 100 100" fill="#16361E"><circle cx="50" cy="50" r="45"/></svg>
                        </div>
                        <div style="position: relative; z-index: 2; max-width: 75%;">
                            <span style="font-family: var(--font-mono, monospace); font-size: 0.72rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block; margin-bottom: 0.4rem;">PARFUM PREMIUM</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.3rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.4rem;">Aroma Mewah Malabeez Tahan Lama</h3>
                            <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.9rem; line-height: 1.5; margin: 0;">Menggunakan bibit wewangian berkualitas, harum tahan lama &amp; bebas apek.</p>
                        </div>
                        <div style="position: absolute; right: 1rem; bottom: 1rem; z-index: 2; width: 72px; height: 72px; background: rgba(255,255,255,0.7); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); box-shadow: 0 6px 16px rgba(22,54,30,0.06);">
                            <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                        </div>
                    </div>

                    <!-- Card 4: Tangan Pertama -->
                    <div class="why-bento-card reveal" style="position: relative; overflow: hidden; background: #DDF6AC; border-radius: 1.75rem; padding: 2rem 1.75rem 4.5rem 1.75rem; flex: 1; min-height: 220px; border: 1px solid rgba(22, 54, 30, 0.08);">
                        <div style="position: absolute; right: -15px; bottom: -15px; opacity: 0.12; pointer-events: none;">
                            <svg width="150" height="150" viewBox="0 0 100 100" fill="#16361E"><polygon points="50,5 95,95 5,95"/></svg>
                        </div>
                        <div style="position: relative; z-index: 2; max-width: 75%;">
                            <span style="font-family: var(--font-mono, monospace); font-size: 0.72rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block; margin-bottom: 0.4rem;">HARGA PABRIK</span>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.3rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.4rem;">Pasokan Langsung Tangan Pertama</h3>
                            <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.9rem; line-height: 1.5; margin: 0;">Diproduksi langsung di pabrik Sleman untuk kepastian stok &amp; harga grosir.</p>
                        </div>
                        <div style="position: absolute; right: 1rem; bottom: 1rem; z-index: 2; width: 72px; height: 72px; background: rgba(255,255,255,0.7); border-radius: 1.25rem; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px); box-shadow: 0 6px 16px rgba(22,54,30,0.06);">
                            <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="#e11d48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        </div>
                    </div>

                </div>

                <!-- Kolom 3 (Kanan - TALL CARD Full Height Spanning 2 Rows - Evermos Style) -->
                <div class="why-bento-card reveal" style="position: relative; overflow: hidden; background: #D6F29C; border-radius: 1.75rem; padding: 2.25rem 2rem; display: flex; flex-direction: column; justify-content: space-between; min-height: 460px; border: 1px solid rgba(22, 54, 30, 0.08);">
                    <div style="position: absolute; right: -30px; bottom: -30px; opacity: 0.14; pointer-events: none;">
                        <svg width="220" height="220" viewBox="0 0 100 100" fill="#16361E"><path d="M50 0C22.4 0 0 22.4 0 50s22.4 50 50 50 50-22.4 50-50S77.6 0 50 0z"/></svg>
                    </div>

                    <div style="position: relative; z-index: 2;">
                        <span style="font-family: var(--font-mono, monospace); font-size: 0.75rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block; margin-bottom: 0.5rem;">KEMITRAAN &amp; PASOKAN</span>
                        <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.6rem; font-weight: 800; color: #16361E; line-height: 1.25; margin: 0 0 0.75rem;">Gabung Jaringan Mitra Seluruh Indonesia</h3>
                        <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">
                            Buka peluang pasokan grosir rutin untuk pengusaha laundry, toko kebersihan, dan reseller. Dapatkan kepastian pasokan langsung dari produsen resmi.
                        </p>
                    </div>

                    <div style="position: relative; z-index: 2; margin-top: auto;">
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; width: 100%; box-shadow: none;">
                            <span>Konsultasi Kemitraan WA &rarr;</span>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 3. SEKTOR PENERIMA MANFAAT & LINI PRODUK BRAND ═══ -->
    <section class="kategori-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            <div class="section-header reveal text-center" style="max-width: 800px; margin: 0 auto 3rem;">
                <span class="chip-tag chip-tag--mint">LINI PRODUK BRAND</span>
                <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4.5vw, 2.5rem); color: #16361E; font-weight: 800;">6 Lini Produk Unggulan Orchid Care</h2>
                <p class="section-desc" style="color: rgba(22, 54, 30, 0.75); font-size: 1rem;">Formulasi Kimia Pembersih Higienis untuk Laundry, Rumah Tangga, Horeka, &amp; Otomotif.</p>
            </div>

            <div class="kat-bento" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                
                <!-- 1. Laundry Care -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=sabun-laundry')); ?>" class="kat-card kat-card--mint reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">LAUNDRY CARE</span>
                        <h3 class="kat-card__title">Sabun &amp; Deterjen Laundry</h3>
                        <p class="kat-card__desc">Deterjen cair busa melimpah, pelembut pakaian (softener), pelicin setrika, &amp; pencerah warna.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-chemical-laundry.png'); ?>" alt="Icon Deterjen Laundry Kiloan" loading="lazy" width="120" height="120">
                    </div>
                </a>

                <!-- 2. Malabeez Perfume -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=malabeez-perfume')); ?>" class="kat-card kat-card--lavender reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">PARFUM &amp; WEWANGIAN</span>
                        <h3 class="kat-card__title">Malabeez Perfume</h3>
                        <p class="kat-card__desc">Parfum laundry wangi tahan lama, parfum baju, &amp; wewangian linen aroma mewah grade premium.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-malabeez-parfum.png'); ?>" alt="Icon Parfum Laundry Malabeez" loading="lazy" width="120" height="120">
                    </div>
                </a>

                <!-- 3. Home Care -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=sabun-pel-homecare')); ?>" class="kat-card kat-card--peach reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">HOME CARE</span>
                        <h3 class="kat-card__title">Sabun Pel &amp; Pembersih Rumah</h3>
                        <p class="kat-card__desc">Sabun cuci piring pekat bebas lemak, sabun pel lantai wangi sereh/lemon, pembersih kaca, &amp; hand soap.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-chemical-household.png'); ?>" alt="Icon Sabun Pel dan Pembersih Rumah" loading="lazy" width="120" height="120">
                    </div>
                </a>

                <!-- 4. Sanitasi Care -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=sanitasi-disinfektan')); ?>" class="kat-card kat-card--butter reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">SANITASI CARE</span>
                        <h3 class="kat-card__title">Produk Sanitasi &amp; Disinfektan</h3>
                        <p class="kat-card__desc">Cairan sanitasi antiseptik, disinfektan pembunuh kuman, &amp; pembersih higienis untuk fasilitas publik.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-chemical-sanitasi.png'); ?>" alt="Icon Sanitasi Care dan Disinfektan" loading="lazy" width="120" height="120">
                    </div>
                </a>

                <!-- 5. Automotive Care -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=automotive-care')); ?>" class="kat-card kat-card--mint reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">AUTO CARE</span>
                        <h3 class="kat-card__title">Perawatan Otomotif</h3>
                        <p class="kat-card__desc">Shampoo mobil snow wash busa melimpah, semir ban wet-look kinclong, &amp; pengilap bodi motor.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-chemical-autocare.png'); ?>" alt="Icon Shampoo Mobil dan Semir Ban" loading="lazy" width="120" height="120">
                    </div>
                </a>

                <!-- 6. Biang Konsentrat -->
                <a href="<?php echo esc_url(home_url('/produk?kategori=paket-biang-sabun')); ?>" class="kat-card kat-card--lavender reveal" style="text-decoration: none;">
                    <div class="kat-card__text">
                        <span class="kat-card__label">BIANG KONSENTRAT</span>
                        <h3 class="kat-card__title">Biang &amp; Konsentrat Sabun</h3>
                        <p class="kat-card__desc">Biang sabun cuci piring &amp; deterjen (1 kg jadi 15 Liters) — hemat ongkir 90% &amp; ideal untuk reseller.</p>
                    </div>
                    <div class="kat-card__icon">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/icon-chemical-paket-bahan.png'); ?>" alt="Icon Biang Konsentrat Sabun" loading="lazy" width="120" height="120">
                    </div>
                </a>

            </div>
        </div>
    </section>

    <!-- ═══ 4. PENJELASAN AWAM INDUK PERUSAHAAN (PT INDOTECH) & EKOSISTEM BRAND ═══ -->
    <section class="feature-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <!-- 2-Column Feature Grid (Persis Seperti Section Kategori di Beranda / Index) -->
            <div class="feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3.5rem; align-items: center; margin-bottom: 3.5rem;">
                
                <!-- Left Visual Image (Zero Padding, Rounded 1.75rem, Clean Box Shadow) -->
                <div class="feature-visual reveal" style="position: relative;">
                    <div style="border-radius: 1.75rem; overflow: hidden; box-shadow: 0 16px 40px rgba(22, 54, 30, 0.12); border: 1px solid rgba(22, 54, 30, 0.08); background: #ffffff;">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/indotech.png'); ?>" 
                             alt="Profil Production Plant PT Indotech Berkah Abadi Sleman Yogyakarta" 
                             loading="lazy" 
                             style="width: 100%; height: auto; display: block; object-fit: cover; border-radius: 1.75rem;">
                    </div>
                </div>

                <!-- Right Feature Content (Text, Description, Bullets, CTA Button) -->
                <div class="feature-content reveal">
                    <span class="chip-tag chip-tag--butter" style="margin-bottom: 0.75rem; display: inline-block;">INDUK PERUSAHAAN &amp; MANUFAKTUR</span>
                    
                    <h2 class="feature-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4vw, 2.4rem); color: #16361E; line-height: 1.2; margin-bottom: 1rem; font-weight: 800;">
                        Didukung Fasilitas Pabrik &amp; Riset PT Indotech Berkah Abadi
                    </h2>
                    
                    <p class="feature-desc" style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin-bottom: 1.25rem;">
                        Seluruh produk Orchid Care diproduksi di fasilitas operasional pabrik dan laboratorium riset milik <a href="https://indotech.id/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; text-decoration: underline;">PT Indotech Berkah Abadi</a> (Sleman, Yogyakarta). Sinergi ini menjamin garansi stok rutin, kualitas stabil, &amp; harga grosir tangan pertama.
                    </p>

                    <ul class="feature-list" style="list-style: none; padding: 0; margin: 0 0 1.5rem 0; display: flex; flex-direction: column; gap: 0.75rem; color: #16361E; font-size: 0.95rem;">
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="width: 8px; height: 8px; background: #88C425; border-radius: 50%; display: inline-block; margin-top: 0.5rem; flex-shrink: 0;"></span>
                            <span><strong>Pabrik Operasional Sleman:</strong> Produksi berkapasitas besar untuk pasokan rutin mitra se-Indonesia.</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="width: 8px; height: 8px; background: #88C425; border-radius: 50%; display: inline-block; margin-top: 0.5rem; flex-shrink: 0;"></span>
                            <span><strong>Standar Kemenkes RI &amp; Halal MUI:</strong> Formulasi teruji laboratorium terakreditasi &amp; aman untuk harian.</span>
                        </li>
                        <li style="display: flex; align-items: flex-start; gap: 0.75rem;">
                            <span style="width: 8px; height: 8px; background: #88C425; border-radius: 50%; display: inline-block; margin-top: 0.5rem; flex-shrink: 0;"></span>
                            <span><strong>Ekosistem Terintegrasi:</strong> Terhubung langsung dengan riset laboratorium &amp; unit distribusi grosir.</span>
                        </li>
                    </ul>

                    <div class="feature-actions">
                        <a href="https://indotech.id/" target="_blank" rel="noopener" class="btn-search-pill" style="text-decoration: none; padding: 0.8rem 1.8rem; background: #16361E; color: #ffffff; display: inline-flex; align-items: center; gap: 0.5rem; border-radius: 999px; font-weight: 700;">
                            <span>Kunjungi Situs PT Indotech (indotech.id) &rarr;</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Grid 4 Brand Ekosistem Pendukung (Cleaniquelab, Malabeez, Depocleanique, Prokopi) -->
            <div class="ecosystem-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem;">
                
                <!-- 1. Cleanique Lab -->
                <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.75rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 15px rgba(22, 54, 30, 0.03);">
                    <div>
                        <div style="height: 50px; display: flex; align-items: center; margin-bottom: 1rem; background: #ffffff; border-radius: 0.75rem; padding: 0.5rem 1rem; border: 1px solid rgba(22, 54, 30, 0.05);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/cleaniquelab.webp'); ?>" alt="Logo Cleanique Lab" style="max-height: 36px; width: auto; object-fit: contain;" loading="lazy">
                        </div>
                        <h3 style="font-family: var(--font-display, sans-serif); font-size: 1.15rem; color: #16361E; font-weight: 800; margin-bottom: 0.4rem;">Cleanique Lab</h3>
                        <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.88rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Divisi riset &amp; formulasi pembersih kimia higienis standar industri, kesehatan, &amp; rumah tangga.
                        </p>
                    </div>
                    <a href="https://cleaniquelab.com/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                        <span>cleaniquelab.com &rarr;</span>
                    </a>
                </div>

                <!-- 2. Malabeez Perfume -->
                <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.75rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 15px rgba(22, 54, 30, 0.03);">
                    <div>
                        <div style="height: 50px; display: flex; align-items: center; margin-bottom: 1rem; background: #ffffff; border-radius: 0.75rem; padding: 0.5rem 1rem; border: 1px solid rgba(22, 54, 30, 0.05);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/malabeez.png'); ?>" alt="Logo Malabeez Perfume" style="max-height: 36px; width: auto; object-fit: contain;" loading="lazy">
                        </div>
                        <h3 style="font-family: var(--font-display, sans-serif); font-size: 1.15rem; color: #16361E; font-weight: 800; margin-bottom: 0.4rem;">Malabeez Perfume</h3>
                        <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.88rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Sub-brand wewangian spesialis parfum laundry &amp; linen harum tahan lama aroma bibit berkualitas.
                        </p>
                    </div>
                    <a href="https://malabeez.com/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                        <span>malabeez.com &rarr;</span>
                    </a>
                </div>

                <!-- 3. Depo Cleanique -->
                <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.75rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 15px rgba(22, 54, 30, 0.03);">
                    <div>
                        <div style="height: 50px; display: flex; align-items: center; margin-bottom: 1rem; background: #ffffff; border-radius: 0.75rem; padding: 0.5rem 1rem; border: 1px solid rgba(22, 54, 30, 0.05);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/depocleanique.webp'); ?>" alt="Logo Depo Cleanique" style="max-height: 36px; width: auto; object-fit: contain;" loading="lazy">
                        </div>
                        <h3 style="font-family: var(--font-display, sans-serif); font-size: 1.15rem; color: #16361E; font-weight: 800; margin-bottom: 0.4rem;">Depo Cleanique</h3>
                        <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.88rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Pusat jaringan distribusi grosir &amp; pasokan toko agen perlengkapan kebersihan rumah tangga.
                        </p>
                    </div>
                    <a href="https://depocleanique.com/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                        <span>depocleanique.com &rarr;</span>
                    </a>
                </div>

                <!-- 4. Prokopi -->
                <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.75rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 15px rgba(22, 54, 30, 0.03);">
                    <div>
                        <div style="height: 50px; display: flex; align-items: center; margin-bottom: 1rem; background: #ffffff; border-radius: 0.75rem; padding: 0.5rem 1rem; border: 1px solid rgba(22, 54, 30, 0.05);">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo/prokopi.png'); ?>" alt="Logo Prokopi" style="max-height: 36px; width: auto; object-fit: contain;" loading="lazy">
                        </div>
                        <h3 style="font-family: var(--font-display, sans-serif); font-size: 1.15rem; color: #16361E; font-weight: 800; margin-bottom: 0.4rem;">Prokopi</h3>
                        <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.88rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Solusi pembersih mesin kopi profesional berbahan food-grade efektif hilangkan residu &amp; kerak.
                        </p>
                    </div>
                    <a href="https://prokopi.id/" target="_blank" rel="noopener" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
                        <span>prokopi.id &rarr;</span>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 5. PERSIAPAN BACKLINK ARTIKEL & EDUKASI (EDITORIAL ROW LAYOUT) ═══ -->
    <section class="blog-preview-section" style="padding: 4.5rem 0; background: #fafafa; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="section-header reveal text-center" style="max-width: 800px; margin: 0 auto 3.5rem;">
                <span class="chip-tag chip-tag--coral">PANDUAN &amp; ARTIKEL EDUKASI</span>
                <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4vw, 2.4rem); color: #16361E; font-weight: 800;">Edukasi Kebersihan &amp; Tips Usaha Laundry</h2>
                <p class="section-desc" style="color: rgba(22, 54, 30, 0.75); font-size: 1rem;">Temukan panduan praktis perawatan pakaian, racikan biang konsentrat, dan tips kebersihan rumah tangga.</p>
            </div>

            <!-- List Artikel Editorial (Berjajar Kiri - Kanan Berdampingan) -->
            <div style="display: flex; flex-direction: column; gap: 3rem; margin-bottom: 3.5rem; width: 100%; max-width: 1240px; margin-left: auto; margin-right: auto;">
                <?php
                $about_posts_query = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ($about_posts_query->have_posts()) :
                    while ($about_posts_query->have_posts()) : $about_posts_query->the_post();
                        $cats = get_the_category();
                        $cat_name = !empty($cats) ? $cats[0]->name : 'Edukasi';
                        $thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/product-laundry.png';
                ?>
                    <!-- Editorial Row Item (Gambar Lebih Besar & Teks Mantap) -->
                    <article class="reveal about-article-item" style="display: grid; grid-template-columns: minmax(320px, 420px) 1fr; gap: 3rem; align-items: center; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 2.75rem;">
                        <div class="about-article-thumb" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.08);">
                            <a href="<?php echo esc_url(get_permalink()); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--mint" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;"><?php echo esc_html($cat_name); ?></span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;"><?php echo esc_html(get_the_date('d F Y')); ?></span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(get_permalink()); ?>" style="color: #16361E; text-decoration: none;"><?php the_title(); ?></a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 26, '...')); ?>
                            </p>
                            <a href="<?php echo esc_url(get_permalink()); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>
                <?php 
                    endwhile; 
                    wp_reset_postdata(); 
                else : 
                ?>
                    <!-- Fallback Editorial List (Gambar Lebih Besar & Teks Mantap) -->
                    <article class="reveal about-article-item" style="display: grid; grid-template-columns: minmax(320px, 420px) 1fr; gap: 3rem; align-items: center; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 2.75rem;">
                        <div class="about-article-thumb" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.08);">
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-laundry.png'); ?>" alt="Cara Meracik Biang Konsentrat 1kg Jadi 15L Sabun Laundry" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--mint" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;">BIANG KONSENTRAT</span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;">Panduan Resmi</span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; text-decoration: none;">Cara Meracik Biang Konsentrat 1kg Jadi 15 Liter Sabun Siap Pakai</a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                Langkah praktis mencampur biang konsentrat dengan 14 Liter air bersih tanpa menggumpal untuk hasil kental &amp; busa melimpah.
                            </p>
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>

                    <article class="reveal about-article-item" style="display: grid; grid-template-columns: minmax(320px, 420px) 1fr; gap: 3rem; align-items: center; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 2.75rem;">
                        <div class="about-article-thumb" style="border-radius: 1.75rem; overflow: hidden; height: 240px; background: #ffffff; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 30px rgba(22, 54, 30, 0.08);">
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" style="display: block; width: 100%; height: 100%;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/product-home.png'); ?>" alt="Rahasia Parfum Laundry Wangi Tahan Lama" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.85rem; margin-bottom: 0.6rem;">
                                <span class="chip-tag chip-tag--mint" style="font-size: 0.78rem; padding: 0.28rem 0.8rem;">PARFUM LAUNDRY</span>
                                <span style="font-size: 0.88rem; color: rgba(22, 54, 30, 0.55); font-weight: 600;">Tips Laundry</span>
                            </div>
                            <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.4rem, 3vw, 1.85rem); font-weight: 800; line-height: 1.24; margin: 0 0 0.6rem;">
                                <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; text-decoration: none;">Rahasia Parfum Laundry Wangi Tahan Lama Seharian Bebas Apek</a>
                            </h3>
                            <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin: 0 0 1rem;">
                                Teknik penyemprotan parfum finishing laundry yang tepat agar aroma mewahnya menempel kuat pada serat pakaian.
                            </p>
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.95rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.4rem;">
                                <span>Baca Selengkapnya &rarr;</span>
                            </a>
                        </div>
                    </article>
                <?php endif; ?>
            </div>

            <div class="text-center">
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn-search-pill" style="text-decoration: none; padding: 0.85rem 2rem; background: var(--orchid, #D81B80); color: #ffffff; display: inline-flex; align-items: center; gap: 0.5rem; border-radius: 999px; font-weight: 800;">
                    <span>Lihat Semua Artikel &amp; Edukasi &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    <!-- ═══ 6. LARGE GOOGLE MAPS EMBED & OPERATIONAL INFO ═══ -->
    <section class="maps-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            <div class="section-header reveal text-center" style="max-width: 800px; margin: 0 auto 3rem;">
                <span class="chip-tag chip-tag--mint">LOKASI PABRIK &amp; KANTOR</span>
                <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4.5vw, 2.6rem); color: #16361E; font-weight: 800;">Kunjungi Kantor Operasional Kami</h2>
                <p class="section-desc" style="color: rgba(22, 54, 30, 0.75); font-size: 1rem;">Berpusat di Sleman, D.I. Yogyakarta untuk melayani pengiriman produk dan kemitraan ke seluruh Indonesia.</p>
            </div>

            <!-- Large Maps Frame Embed -->
            <div class="reveal" style="border-radius: 1.75rem; overflow: hidden; box-shadow: 0 16px 45px rgba(22, 54, 30, 0.12); border: 1px solid rgba(22, 54, 30, 0.08); background: #fafafa; margin-bottom: 2rem;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.4735222953284!2d110.36214227575199!3d-7.739497576722372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5913e61c39ab%3A0x6b3724c9c1bfa7a7!2sJongke%20Tengah%2C%20Sendangadi%2C%20Kec.%20Mlati%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055285!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="460" 
                    style="border:0; display: block;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Info Cards Bar Below Map -->
            <div class="maps-info-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem;">
                    <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.1rem; font-weight: 800; margin-bottom: 0.5rem;">Alamat Lengkap</h4>
                    <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.5; margin: 0;">Jongke Tengah No. 30, RT.01/RW.23, Sendangadi, Kec. Mlati, Kabupaten Sleman, D.I. Yogyakarta 55285</p>
                </div>
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem;">
                    <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.1rem; font-weight: 800; margin-bottom: 0.5rem;">Jam Operasional</h4>
                    <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.5; margin: 0;">Senin - Sabtu: 08.00 - 17.00 WIB<br>Minggu &amp; Libur Nasional: Tutup (Layanan CS WA Tetap Buka)</p>
                </div>
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem; display: flex; flex-direction: column; justify-content: center;">
                    <a href="https://maps.google.com/?q=Jongke+Tengah+No.+30,+Sendangadi,+Mlati,+Sleman,+Yogyakarta" target="_blank" rel="noopener" class="btn-search-pill" style="text-decoration: none; padding: 0.85rem 1.5rem; background: #16361E; color: #ffffff; text-align: center; border-radius: 999px; font-weight: 700; display: block;">
                        <span>Petunjuk Arah Google Maps &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ 7. CTA BANNER PENUTUP (MATCHING HERITAGE BERANDA INDEX) ═══ -->
    <section class="cta-banner-penutup" id="cta-penutup" style="background: #16361E; color: #ffffff; padding: 5.5rem 0; position: relative; overflow: hidden; border-top: 3px solid #88C425;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 650px; height: 350px; background: radial-gradient(circle, rgba(136, 196, 37, 0.12) 0%, rgba(22, 54, 30, 0) 70%); pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 2; max-width: 820px; text-align: center;">
            <span style="background: #88C425; color: #16361E; font-weight: 800; font-size: 0.78rem; padding: 0.45rem 1.1rem; border-radius: 999px; font-family: var(--font-mono, monospace); display: inline-block; margin-bottom: 1.25rem; letter-spacing: 0.05em;">
                PABRIK &amp; SUPPLIER SABUN SLEMAN YOGYAKARTA
            </span>

            <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4vw, 2.6rem); line-height: 1.2; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
                Siap Bermitra dengan Produsen &amp; Supplier Sabun Tangan Pertama?
            </h2>

            <p style="color: #cbd5e1; font-size: 1.02rem; line-height: 1.65; margin: 0 auto 2.25rem; max-width: 680px;">
                Hubungi tim kemitraan <strong>Orchid Care (PT Indotech Berkah Abadi)</strong> untuk konsultasi pasokan grosir rutin, peluang keagenan, &amp; suplai sabun laundry kiloan se-Indonesia.
            </p>

            <div class="cta-buttons-wrap" style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none;">
                    <span>Hubungi Kemitraan WA</span>
                </a>

                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                    Lihat Katalog Produk
                </a>
            </div>

            <div style="margin-top: 2.75rem; display: flex; gap: 1.75rem; justify-content: center; flex-wrap: wrap; font-size: 0.88rem; color: #cbd5e1; border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1.5rem; font-weight: 600;">
                <span>✓ Pabrik Resmi Sleman, D.I. Yogyakarta</span>
                <span>✓ Izin Edar Kemenkes RI &amp; Halal MUI</span>
                <span>✓ Biang Konsentrat Hemat Ongkir 90%</span>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
