<?php
/**
 * Home — Galeri + CTA Penutup (High-Conversion & Product Focus)
 * File: template-parts/home/galeri-cta.php
 */

$wa_keagenan  = 'https://api.whatsapp.com/send?phone=6287885590088&text=' . rawurlencode('Halo CS Kemitraan Orchid Care, saya berminat membuka keagenan / pasokan B2B.');
$wa_produk    = 'https://api.whatsapp.com/send?phone=6285559474797&text=' . rawurlencode('Halo CS Product Orchid Care, saya ingin bertanya mengenai pembelian produk & biang konsentrat.');
$chips        = ['1 KG BIANG = 15 L', 'KEAGENAN & RESELLER', 'PASOKAN B2B HOTEL & RS', 'BIANG KONSENTRAT'];
?>

<section class="galeri-section" id="galeri" style="padding: 4rem 0 0; position: relative; overflow: hidden; background: #fff;">
    <div class="container">
        
        <!-- ═══ SECTION HEADER ═══ -->
        <div class="galeri-head reveal text-center" style="max-width: 800px; margin: 0 auto 2.5rem;">
            <span class="chip-tag chip-tag--mint" style="display: inline-block; margin-bottom: 0.5rem;">GALERI &amp; REKAM JEJAK</span>
            <h2 class="section-title" style="font-family: var(--font-heading); font-size: 2rem; color: #111827; line-height: 1.25; margin-bottom: 0.75rem;">
                Kualitas yang Terbukti, Solusi Kimia Kebersihan Terpercaya
            </h2>
            <p style="color: #6b7280; font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.25rem;">
                Dari laboratorium riset <strong>Cleanique Lab</strong> di Sleman, Yogyakarta hingga pasokan produk di ribuan outlet laundry, jaringan hotel, dan agen distributor di seluruh Indonesia.
            </p>
            <div class="galeri-chips" style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                <?php foreach ($chips as $chip) : ?>
                    <span class="galeri-chip chip-tag chip-tag--coral" style="font-size: 0.75rem; font-weight: 700;"><?php echo esc_html($chip); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ═══ MAIN GALLERY FEATURE SHOWCASE ═══ -->
        <div class="galeri-frame-wrap reveal" style="position: relative; margin-bottom: 3rem; border-radius: 1.25rem; overflow: hidden; border: 1px solid #e5e7eb;">
            <div class="galeri-frame" style="width: 100%; aspect-ratio: 21/9; max-height: 480px; background: #16361E; position: relative; overflow: hidden;">
                <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/gallery-main.png'); ?>" 
                     alt="Fasilitas riset dan produk kimia Orchid Care PT Indotech Berkah Abadi" 
                     loading="lazy" 
                     class="galeri-img" 
                     style="width: 100%; height: 100%; object-fit: cover;">
                
                <!-- Overlay Gradient for Depth -->
                <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.1) 0%, rgba(22,54,30,0.7) 100%);"></div>

                <!-- Overlay Info Text -->
                <div style="position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem; color: #fff; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.25rem;">
                    <div style="max-width: 600px;">
                        <span style="background: rgba(255,255,255,0.2); color: #fff; padding: 0.3rem 0.75rem; border-radius: 4px; font-size: 0.75rem; font-weight: 700; display: inline-block; margin-bottom: 0.4rem;">
                            SLEMAN, D.I. YOGYAKARTA
                        </span>
                        <h3 style="font-family: var(--font-heading); font-size: 1.5rem; color: #fff; margin: 0 0 0.25rem; font-weight: 700;">
                            Pusat Produksi &amp; Formulasi Kimia Kebersihan
                        </h3>
                        <p style="margin: 0; font-size: 0.9rem; color: rgba(255,255,255,0.85); line-height: 1.4;">
                            Diproduksi secara higienis oleh PT Indotech Berkah Abadi untuk standar perbekalan rumah tangga (PKRT) dan industri komersial.
                        </p>
                    </div>

                    <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn btn-coral" style="box-shadow: none; filter: none; text-decoration: none;">
                        Explore Katalog Produk
                    </a>
                </div>
            </div>
        </div>

        <!-- ═══ 3 SUPPORTING PRODUCT SHOWCASE CARDS ═══ -->
        <div class="galeri-subcards grid grid-3 reveal" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 4rem;">
            
            <!-- Sub Card 1 -->
            <div style="background: #fafafa; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e5e7eb;">
                <h4 style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin: 0 0 0.4rem;">Formulasi Unggulan PKRT</h4>
                <p style="color: #6b7280; font-size: 0.9rem; line-height: 1.55; margin: 0;">
                    Riset berkesinambungan menghasilkan formula deterjen super lemon, penghilang noda membandel, dan pewangi tahan lama yang ramah lingkungan.
                </p>
            </div>

            <!-- Sub Card 2 -->
            <div style="background: #fafafa; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e5e7eb;">
                <h4 style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin: 0 0 0.4rem;">Biang Konsentrat (1kg &rarr; 15L)</h4>
                <p style="color: #6b7280; font-size: 0.9rem; line-height: 1.55; margin: 0;">
                    Inovasi efisiensi logistik (DeterMat, O'Clean, Arai) menekan biaya ongkos kirim cairan hingga 90% bagi mitra luar daerah.
                </p>
            </div>

            <!-- Sub Card 3 -->
            <div style="background: #fafafa; padding: 1.5rem; border-radius: 1rem; border: 1px solid #e5e7eb;">
                <h4 style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin: 0 0 0.4rem;">Pasokan B2B &amp; Industri</h4>
                <p style="color: #6b7280; font-size: 0.9rem; line-height: 1.55; margin: 0;">
                    Memenuhi kebutuhan pasokan rutin bahan kimia kebersihan untuk jaringan perhotelan, restoran, rumah sakit, dan bisnis laundry profesional.
                </p>
            </div>

        </div>

    </div>

    <!-- ═══ HIGH-CONVERSION CTA BANNER PENUTUP ═══ -->
    <div class="cta-banner-penutup" style="background: #0b132b; color: #ffffff; padding: 4rem 0; position: relative; overflow: hidden; border-top: 4px solid #88C425;">
        
        <div class="container" style="position: relative; z-index: 2; max-width: 900px; text-align: center;">
            
            <span style="background: rgba(136,196,37,0.15); color: #88C425; border: 1px solid #88C425; padding: 0.35rem 1rem; border-radius: 4px; font-size: 0.78rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; display: inline-block; margin-bottom: 1rem;">
                PASOKAN PRODUK &amp; KEMITRAAN B2B
            </span>

            <h2 style="font-family: var(--font-heading); font-size: 2.25rem; line-height: 1.25; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
                Siap Memenuhi Kebutuhan Produk Kebersihan Bisnis Anda?
            </h2>

            <p style="color: #94a3b8; font-size: 1.05rem; line-height: 1.6; margin: 0 auto 2rem; max-width: 720px;">
                Bergabunglah bersama ribuan pengusaha laundry, agen keagenan distributor, dan jaringan perhotelan/RS yang mempercayakan pasokan kimia kebersihan kepada <strong>Orchid Care (PT Indotech Berkah Abadi)</strong>.
            </p>

            <div class="cta-buttons-wrap" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($wa_keagenan); ?>" target="_blank" rel="noopener" class="btn btn-coral" style="font-size: 1rem; padding: 0.85rem 1.75rem; box-shadow: none; filter: none; text-decoration: none;">
                    Chat CS Kemitraan &amp; Keagenan
                </a>

                <a href="<?php echo esc_url($wa_produk); ?>" target="_blank" rel="noopener" class="btn" style="background: #88C425; color: #16361E; font-size: 1rem; padding: 0.85rem 1.75rem; font-weight: 700; box-shadow: none; filter: none; text-decoration: none;">
                    Konsultasi Produk Biang
                </a>

                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.1); color: #ffffff; border: 1px solid rgba(255,255,255,0.3); font-size: 1rem; padding: 0.85rem 1.75rem; box-shadow: none; filter: none; text-decoration: none;">
                    Lihat Katalog Produk
                </a>
            </div>

            <!-- Trust Highlights Footer note -->
            <div style="margin-top: 2.5rem; display: flex; gap: 1.75rem; justify-content: center; flex-wrap: wrap; font-size: 0.85rem; color: #94a3b8; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem;">
                <span>Pengiriman ke Seluruh Indonesia</span>
                <span>Biang Konsentrat Hemat Ongkir 90%</span>
                <span>Skalabilitas Retail &amp; Jerigen Industri</span>
            </div>

        </div>
    </div>

</section>
