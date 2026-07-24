<?php
/**
 * Home — Section Kategori: Perawatan Otomotif (Auto Care)
 * File: template-parts/home/feature-automotive.php
 */
?>

<section class="feature-section" id="kategori-automotive" style="padding: 4rem 0; background: #fff; border-bottom: 1px solid #eee;">
    <div class="container feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; align-items: center;">
        
        <div class="feature-visual order-2 lg-order-1 reveal" style="position: relative;">
            <div style="background: #1e293b; border-radius: 1.25rem; padding: 2rem 1.25rem; text-align: center;">
                <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/cat-parfum.svg'); ?>" 
                     alt="Produk Perawatan Otomotif Orchid Care" 
                     loading="lazy" 
                     style="width: 100%; height: auto; max-height: 280px; object-fit: contain; display: block; margin: 0 auto 1.25rem;">
                
                <div style="background: rgba(59, 130, 246, 0.15); border: 1px solid #3b82f6; border-radius: 0.5rem; padding: 0.75rem; color: #fff;">
                    <div style="font-weight: 700; font-size: 0.95rem; color: #60a5fa;">SHAMPO MOBIL · SEMIR BAN · CLEANER KACA</div>
                    <div style="font-size: 0.78rem; color: #93c5fd; margin-top: 0.2rem;">Formulasi pH Netral &amp; Proteksi Eksterior Vehicles</div>
                </div>
            </div>
        </div>

        <div class="feature-content order-1 lg-order-2 reveal">
            <span class="chip-tag" style="background: rgba(59, 130, 246, 0.15); color: #2563eb; border: 1px solid #3b82f6; margin-bottom: 0.5rem; display: inline-block;">AUTO CARE</span>
            <h2 class="feature-title" style="font-family: var(--font-heading); font-size: 2rem; color: #111827; line-height: 1.25; margin-bottom: 1rem;">
                Perawatan Otomotif Grade Profesional
            </h2>
            <p class="feature-desc" style="color: #4b5563; font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.25rem;">
                Rangkaian produk pembersih dan perawatan eksterior/interior kendaraan. Cocok untuk penggunaan pribadi, penyedia jasa cuci mobil/motor, hingga usaha auto detailing.
            </p>
            <ul class="feature-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; color: #374151; font-size: 0.92rem;">
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #2563eb; border-radius: 50%; display: inline-block;"></span>
                    <strong>Sampo Mobil Busa Melimpah:</strong> Formula pH netral, aman untuk cat kendaraan tanpa merusak wax.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #2563eb; border-radius: 50%; display: inline-block;"></span>
                    <strong>Semir Ban Mengkilap Tahan Lama:</strong> Formula silikon protektif yang memberikan efek wet-look mengkilap.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #2563eb; border-radius: 50%; display: inline-block;"></span>
                    <strong>Pembersih Kaca Anti-Bercak:</strong> Membersihkan jamur kaca &amp; noda air agar pandangan jernih.
                </li>
            </ul>
        </div>

    </div>
</section>
