<?php
/**
 * Template Name: Tentang Kami
 * Template Path: page-about.php
 */

get_header();
$wa_url = orchid_wa_url('Halo PT Indotech Berkah Abadi / Orchid Care, saya ingin bertanya mengenai profil perusahaan dan kemitraan.');
?>

<main id="main-content" class="about-page">
    
    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'PT INDOTECH BERKAH ABADI',
        'Solusi Kimia Kebersihan & Perbekalan Rumah Tangga Terpercaya',
        'Berbasis di Sleman, Yogyakarta, Orchid Care adalah lini merek utama dari PT Indotech Berkah Abadi yang berfokus pada produksi, distribusi, dan penjualan produk kimia berkualitas tinggi untuk PKRT, industri laundry, dan perawatan otomotif.'
    ); ?>

    <!-- ═══ PILLARS SECTION ═══ -->
    <section class="about-section">
        <div class="container">
            <div class="section-header reveal">
                <span class="chip-tag chip-tag--coral">EKOSISTEM BISNIS</span>
                <h2 class="section-title">3 Pilar Utama PT Indotech Berkah Abadi</h2>
                <p class="section-desc">Menghadirkan solusi komprehensif dari hulu ke hilir untuk rumah tangga harian hingga spektrum komersial B2B.</p>
            </div>

            <div class="pillars-grid">
                <!-- Pilar 1 -->
                <div class="pillar-card reveal">
                    <div class="pillar-number">01</div>
                    <h3 class="pillar-title">Riset &amp; Formulasi Kimia</h3>
                    <p class="pillar-desc">Pengembangan formulasi bahan kimia kebersihan berstandar PKRT, efektif meluruhkan kotoran, dan ramah lingkungan melalui divisi <em>Cleanique Lab</em>.</p>
                </div>

                <!-- Pilar 2 -->
                <div class="pillar-card reveal">
                    <div class="pillar-number">02</div>
                    <h3 class="pillar-title">Kemitraan B2B &amp; Keagenan</h3>
                    <p class="pillar-desc">Membuka peluang distribusi komersial, agen, reseller, dan jaringan pasokan untuk hotel, resto, dan rumah sakit.</p>
                </div>

                <!-- Pilar 3 -->
                <div class="pillar-card reveal">
                    <div class="pillar-number">03</div>
                    <h3 class="pillar-title">Produk Retail &amp; Grosir</h3>
                    <p class="pillar-desc">Di sinilah <strong>Orchid Care</strong> mengambil peran sentral sebagai wajah produk kimia siap pakai dan konsentrat hemat logistik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ INNOVATION & ECOSYSTEM ═══ -->
    <section class="about-section bg-surface">
        <div class="container feature-grid">
            <div class="feature-content reveal">
                <span class="chip-tag chip-tag--butter">INOVASI LOGISTIK</span>
                <h2 class="feature-title">Bahan Konsentrat (Biang Ekstrak)</h2>
                <p class="feature-desc">
                    Salah satu keunggulan utama Orchid Care adalah formula konsentrat biang (seperti varian <em>DeterMat</em>, <em>O'Clean</em>, dan <em>Arai</em>). 
                </p>
                <div class="stat-highlight">
                    <div class="stat-big">1 kg = 15 L</div>
                    <p class="stat-text">1 kg bahan konsentrat biang dapat diracik mandiri menjadi 15 Liter produk jadi siap pakai. Menghemat biaya ongkos kirim cairan secara drastis bagi mitra di luar daerah!</p>
                </div>
                <div class="feature-actions" style="margin-top: 1.5rem;">
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-ink">
                        Konsultasi Kemitraan via WA
                    </a>
                </div>
            </div>
            
            <div class="feature-visual reveal">
                <div class="ecosystem-card">
                    <h3 class="ecosystem-heading">Sub-Divisi &amp; Ekosistem</h3>
                    <ul class="ecosystem-list">
                        <li>
                            <strong>Cleanique Lab:</strong> Riset dan pengembangan formulasi kimia ramah lingkungan &amp; efektif.
                        </li>
                        <li>
                            <strong>Cleanique Mart:</strong> Jaringan pusat pasokan &amp; toko retail bahan kimia kebersihan.
                        </li>
                        <li>
                            <strong>Depo Cleanique:</strong> Depo grosir pasokan jerigen industri &amp; biang konsentrat.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══ LOCATION & CTA ═══ -->
    <section class="about-cta-section">
        <div class="container reveal">
            <div class="cta-box">
                <div class="cta-badge">LOKASI KAMI</div>
                <h2 class="cta-title">Sleman, D.I. Yogyakarta</h2>
                <p class="cta-desc">Kantor &amp; fasilitas operasional kami berpusat di Sleman, D.I. Yogyakarta, melayani pengiriman produk dan kemitraan agen ke seluruh penjuru Nusantara.</p>
                <div class="cta-actions">
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-coral btn-lg">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        Hubungi Tim Kami
                    </a>
                    <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn btn-ink btn-lg">
                        Lihat Katalog Produk
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
