<?php
/**
 * Home — Galeri Produksi Higienis & Steril + CTA Penutup
 * File: template-parts/home/galeri-cta.php
 */

$wa_produk    = 'https://api.whatsapp.com/send?phone=6285559474797&text=' . rawurlencode('Halo CS Orchid Care, saya ingin konsultasi produk sabun, parfum laundry, dan harga grosir biang konsentrat.');
$chips        = ['PABRIK SABUN STERIL', 'TERUJI LAB HIGIENIS', 'IZIN RESMI KEMENKES', 'QUALITY CONTROL KETAT'];
?>

<!-- Inline Mobile Responsiveness Styles untuk Galeri & CTA Penutup -->
<style>
.galeri-frame {
    width: 100%;
    aspect-ratio: 21/9;
    max-height: 500px;
    background: #16361E;
    position: relative;
    overflow: hidden;
}
.galeri-overlay-content {
    position: absolute;
    bottom: 2rem;
    left: 2rem;
    right: 2rem;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    flex-wrap: wrap;
    gap: 1.5rem;
    z-index: 3;
}
.cta-badge-pill {
    background: #88C425;
    color: #16361E;
    font-weight: 800;
    font-size: 0.78rem;
    padding: 0.45rem 1.1rem;
    border-radius: 999px;
    font-family: var(--font-mono, monospace);
    display: inline-block;
    margin-bottom: 1.25rem;
    letter-spacing: 0.05em;
    max-width: 100%;
    word-wrap: break-word;
    text-align: center;
}

@media (max-width: 768px) {
    .galeri-section {
        padding: 3rem 0 2.5rem !important;
    }
    .galeri-head {
        margin-bottom: 2rem !important;
    }
    .galeri-frame {
        aspect-ratio: auto !important;
        min-height: 420px !important;
        max-height: none !important;
    }
    .galeri-overlay-content {
        bottom: 1.25rem !important;
        left: 1.25rem !important;
        right: 1.25rem !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 1.25rem !important;
    }
    .galeri-overlay-content a {
        width: 100% !important;
        text-align: center !important;
    }
    .cta-banner-penutup {
        padding: 3.5rem 0 !important;
    }
    .cta-badge-pill {
        font-size: 0.72rem !important;
        padding: 0.4rem 0.85rem !important;
        line-height: 1.35 !important;
    }
}
</style>

<section class="galeri-section" id="galeri" style="padding: 5rem 0 4rem; position: relative; overflow: hidden; background: #ffffff; background-image: linear-gradient(180deg, rgba(255,255,255,0.92) 0%, rgba(246,251,174,0.15) 100%), url('<?php echo esc_url(ORCHID_URI . '/assets/img/bg-overlay.png'); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    
    <!-- Abstract Organic SVG Wave Decoration (Top Galeri) -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; pointer-events: none; opacity: 0.18; transform: rotate(180deg);">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,32L60,42.7C120,53,240,75,360,80C480,85,600,75,720,58.7C840,43,960,21,1080,21.3C1200,21,1320,43,1380,53.3L1440,64L1440,120L1380,120C1320,120,1200,120,1080,120C960,120,840,120,720,120C600,120,480,120,360,120C240,120,120,120,60,120L0,120Z" fill="#16361E"></path>
        </svg>
    </div>

    <div class="container">
        
        <!-- ═══ SECTION HEADER ═══ -->
        <div class="galeri-head reveal text-center" style="max-width: 820px; margin: 0 auto 3rem;">
            <span class="chip-tag chip-tag--mint" style="display: inline-block; margin-bottom: 0.75rem;">FASILITAS PRODUKSI HIGIENIS &amp; STERIL</span>
            <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4.5vw, 2.6rem); color: #16361E; line-height: 1.2; margin-bottom: 1rem; font-weight: 800;">
                Proses Pembuatan Higienis, Steril, &amp; Teruji Laboratorium
            </h2>
            <p style="color: rgba(22, 54, 30, 0.8); font-size: 1rem; line-height: 1.65; margin-bottom: 1.5rem;">
                Setiap tetes sabun cuci piring, deterjen, parfum laundry, dan biang konsentrat Orchid Care diproduksi di fasilitas pabrik steril <strong>PT Indotech Berkah Abadi</strong>. Melewati pencampuran presisi di <strong>Cleanique Lab</strong>, pengujian mikrobiologi ketat, serta standar izin resmi Kemenkes RI.
            </p>
            <div class="galeri-chips" style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                <?php foreach ($chips as $chip) : ?>
                    <span class="galeri-chip chip-tag chip-tag--mint" style="font-size: 0.75rem; font-weight: 700; padding: 0.3rem 0.75rem;"><?php echo esc_html($chip); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ═══ MAIN GALLERY FEATURE SHOWCASE (BG-OVERLAY IMAGE) ═══ -->
        <div class="galeri-frame-wrap reveal" style="position: relative; border-radius: 1.75rem; overflow: hidden; box-shadow: 0 20px 50px rgba(22, 54, 30, 0.15); border: 1px solid rgba(22, 54, 30, 0.08);">
            <div class="galeri-frame">
                <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/bg-overlay.png'); ?>" 
                     alt="Proses Produksi Steril & Higienis Pabrik Sabun Orchid Care PT Indotech Berkah Abadi" 
                     loading="lazy" 
                     class="galeri-img" 
                     style="width: 100%; height: 100%; object-fit: cover;">
                
                <!-- Overlay Gradient for Depth -->
                <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(22,54,30,0.9) 100%); z-index: 2;"></div>

                <!-- Overlay Info Text -->
                <div class="galeri-overlay-content">
                    <div style="max-width: 650px;">
                        <span style="background: rgba(136,196,37,0.25); color: #88C425; border: 1px solid #88C425; padding: 0.3rem 0.75rem; border-radius: 999px; font-size: 0.75rem; font-weight: 800; font-family: var(--font-mono, monospace); display: inline-block; margin-bottom: 0.6rem;">
                            PABRIK &amp; LABORATORIUM FORMULASI STERIL
                        </span>
                        <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.3rem, 3vw, 1.85rem); color: #fff; margin: 0 0 0.35rem; font-weight: 800; line-height: 1.25;">
                            Fasilitas Formulasi Steril &amp; Quality Control Ketat
                        </h3>
                        <p style="margin: 0; font-size: 0.92rem; color: rgba(255,255,255,0.9); line-height: 1.5;">
                            Diproduksi dalam ruang terkontrol higienis, sistem filtrasi air bebas bakteri, dan pengujian laboratorium terintegrasi sebelum dikemas.
                        </p>
                    </div>

                    <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn-search-pill" style="text-decoration: none; border-radius: 999px; padding: 0.85rem 1.75rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; font-size: 0.95rem; display: inline-flex; align-items: center; justify-content: center; box-shadow: none !important;">
                        <span>Katalog Produk Steril</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ═══ HIGH-CONVERSION CTA BANNER PENUTUP (SIMPLE & ELEGANT DECORATION) ═══ -->
<section class="cta-banner-penutup" id="cta-penutup" style="background: #16361E; color: #ffffff; padding: 5.5rem 0; position: relative; overflow: hidden; border-top: 3px solid #88C425;">
    
    <!-- 1. Simple Top Wave SVG (Subtle Mint Accent) -->
    <div style="position: absolute; top: 0; left: 0; right: 0; pointer-events: none; opacity: 0.08; transform: rotate(180deg);">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 32L120 42.7C240 53 480 75 720 74.7C960 75 1200 53 1320 42.7L1440 32V100H0V32Z" fill="#88C425"/>
        </svg>
    </div>

    <!-- 2. Simple Bottom Wave SVG (Subtle Orchid Accent) -->
    <div style="position: absolute; bottom: 0; left: 0; right: 0; pointer-events: none; opacity: 0.08;">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 40L120 30C240 20 480 0 720 10C960 20 1200 60 1320 70L1440 80V100H0V40Z" fill="#D81B80"/>
        </svg>
    </div>

    <!-- 3. Soft Ambient Radial Glow -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 650px; height: 350px; background: radial-gradient(circle, rgba(136, 196, 37, 0.12) 0%, rgba(22, 54, 30, 0) 70%); pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2; max-width: 820px; text-align: center;">
        
        <span class="cta-badge-pill">
            PABRIK &amp; SUPPLIER SABUN TANGAN PERTAMA
        </span>

        <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4vw, 2.6rem); line-height: 1.2; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
            Dapatkan Harga Grosir &amp; Formula Biang Konsentrat Berkualitas Sekarang
        </h2>

        <p style="color: #cbd5e1; font-size: 1rem; line-height: 1.65; margin: 0 auto 2.25rem; max-width: 680px;">
            Hubungi tim kemitraan <strong>Orchid Care (PT Indotech Berkah Abadi)</strong> untuk konsultasi pasokan grosir rutin, peluang keagenan, &amp; suplai sabun laundry kiloan se-Indonesia.
        </p>

        <div class="cta-buttons-wrap" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo esc_url($wa_produk); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 2rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none !important;">
                <span>Hubungi Kemitraan WA</span>
            </a>

            <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 0.95rem; padding: 0.85rem 2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                Lihat Katalog Produk
            </a>
        </div>

        <div style="margin-top: 2.5rem; display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap; font-size: 0.85rem; color: #cbd5e1; border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1.5rem; font-weight: 600;">
            <span>✓ Pabrik Resmi Sleman, D.I. Yogyakarta</span>
            <span>✓ Izin Edar Kemenkes RI &amp; Halal MUI</span>
            <span>✓ Biang Konsentrat Hemat Ongkir 90%</span>
        </div>
    </div>
</section>
