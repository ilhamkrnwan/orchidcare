<?php
/**
 * Home — Kategori (Simple Header Grid)
 * File: template-parts/home/kategori.php
 */
?>
<section class="kategori-section" id="kategori" style="padding: 4rem 0; background: #fafafa; border-bottom: 1px solid #eee;">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-header reveal text-center" style="max-width: 700px; margin: 0 auto 2.5rem;">
            <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.5rem; display: inline-block;">KATALOG PRODUK UTAMA</span>
            <h2 class="section-title" style="font-family: var(--font-heading); font-size: 2rem; color: #111827; margin-bottom: 0.5rem;">
                Kategori Produk Orchid Care
            </h2>
            <p class="section-desc" style="color: #6b7280; font-size: 0.98rem; line-height: 1.5;">
                Diformulasikan secara khusus oleh PT Indotech Berkah Abadi untuk standar Perbekalan Kesehatan Rumah Tangga (PKRT) dan pasokan industri komersial B2B.
            </p>
        </div>

        <!-- 6 Category Cards Grid -->
        <div class="kategori-grid grid-3-col" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            
            <!-- 1. Chemical Laundry -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #16361E; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/product-laundry.png'); ?>" alt="Chemical Laundry Orchid Care" loading="lazy" class="kategori-img" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #88C425; color: #16361E; font-weight: 700; font-size: 0.75rem;">LAUNDRY CARE</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Chemical Laundry</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Deterjen cair super lemon, penghilang noda minyak/darah, alkali pembuka serat, &amp; pelembut pakaian.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-laundry" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #16361E; font-weight: 600; font-size: 0.88rem;">
                            <span>Lihat Detail Produk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Kebutuhan Rumah Tangga -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #4c0527; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/product-home.png'); ?>" alt="Chemical Rumah Tangga Orchid Care" loading="lazy" class="kategori-img" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #D81B80; color: #fff; font-weight: 700; font-size: 0.75rem;">HOME CARE</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Kebutuhan Rumah Tangga</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Pembersih lantai oranye lemon transparan khas, sabun cuci piring pekat, &amp; hand soap anti-bakteri.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-rumah-tangga" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #D81B80; font-weight: 600; font-size: 0.88rem;">
                            <span>Lihat Detail Produk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Perawatan Otomotif -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #1e293b; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/cat-parfum.svg'); ?>" alt="Perawatan Otomotif Orchid Care" loading="lazy" class="kategori-img" style="max-width: 80%; max-height: 80%; object-fit: contain;">
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #2563eb; color: #fff; font-weight: 700; font-size: 0.75rem;">AUTO CARE</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Perawatan Otomotif</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Sampo mobil busa melimpah pH netral, semir ban wet-look mengkilap, &amp; pembersih kaca anti-bercak.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-automotive" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #2563eb; font-weight: 600; font-size: 0.88rem;">
                            <span>Lihat Detail Produk</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. Biang Konsentrat (1kg -> 15L) -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #16361E; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <div style="text-align: center; color: #fff;">
                        <span style="font-size: 2rem; font-weight: 800; color: #88C425; font-family: var(--font-heading); display: block;">1 KG = 15 L</span>
                        <span style="font-size: 0.75rem; color: #d1d5db; text-transform: uppercase;">DeterMat · O'Clean · Arai</span>
                    </div>
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #88C425; color: #16361E; font-weight: 700; font-size: 0.75rem;">BIANG KONSENTRAT</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Biang Konsentrat</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Inovasi hemat ongkir 90%! Biang konsentrat 1 kg diracik mandiri menjadi 15 Liter cairan deterjen siap pakai.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-biang" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #88C425; font-weight: 600; font-size: 0.88rem;">
                            <span>Kalkulator &amp; Detail Biang</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 5. Parfum & Wewangian -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #581c87; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/feat-parfum.svg'); ?>" alt="Malabeez Perfume Orchid Care" loading="lazy" class="kategori-img" style="max-width: 80%; max-height: 80%; object-fit: contain;">
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #c084fc; color: #3b0764; font-weight: 700; font-size: 0.75rem;">PARFUM &amp; WEWANGIAN</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Parfum &amp; Wewangian Linen</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Parfum finishing laundry, pelicin setrika, &amp; wewangian linen impor dengan ketahanan aroma mewah seharian.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-parfum" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #7e22ce; font-weight: 600; font-size: 0.88rem;">
                            <span>Lihat Detail Parfum</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 6. Pasokan B2B & Jerigen Industri -->
            <div class="kategori-card-modern reveal" style="background: #fff; border-radius: 1rem; border: 1px solid #e5e7eb; overflow: hidden; display: flex; flex-direction: column;">
                <div class="kategori-card-thumb" style="aspect-ratio: 16/10; background: #0b132b; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; padding: 1.25rem;">
                    <div style="text-align: center; color: #fff;">
                        <span style="font-size: 1.75rem; font-weight: 800; color: #38bdf8; font-family: var(--font-heading); display: block;">B2B &amp; KEAGENAN</span>
                        <span style="font-size: 0.75rem; color: #cbd5e1; text-transform: uppercase;">Jerigen 5L / 20L / Tonase</span>
                    </div>
                    <span class="chip-tag kategori-badge" style="position: absolute; top: 0.85rem; left: 0.85rem; background: #38bdf8; color: #0b132b; font-weight: 700; font-size: 0.75rem;">PASOKAN B2B</span>
                </div>
                <div class="kategori-card-content" style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                    <h3 class="kategori-title" style="font-family: var(--font-heading); font-size: 1.15rem; color: #111827; margin-bottom: 0.4rem;">Pasokan B2B &amp; Jerigen Industri</h3>
                    <p class="kategori-desc" style="color: #6b7280; font-size: 0.88rem; line-height: 1.5; margin-bottom: 1rem;">Pengadaan bahan kimia kebersihan skala industri untuk hotel, restoran, rumah sakit, &amp; distributor keagenan.</p>
                    
                    <div class="kategori-card-footer" style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #f3f4f6;">
                        <a href="#kategori-b2b" class="btn-kategori-action" style="display: flex; justify-content: space-between; align-items: center; text-decoration: none; color: #0284c7; font-weight: 600; font-size: 0.88rem;">
                            <span>Lihat Detail Pasokan B2B</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
