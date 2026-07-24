<?php
/**
 * Home — Section Kategori: Kebutuhan Rumah Tangga (Home Care)
 * File: template-parts/home/feature-rumah-tangga.php
 */
?>

<section class="feature-section" id="kategori-rumah-tangga" style="padding: 4rem 0; background: #fafafa; border-bottom: 1px solid #eee;">
    <div class="container feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; align-items: center;">
        
        <div class="feature-content reveal">
            <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.5rem; display: inline-block;">HOME CARE</span>
            <h2 class="feature-title" style="font-family: var(--font-heading); font-size: 2rem; color: #111827; line-height: 1.25; margin-bottom: 1rem;">
                Solusi Pembersih Rumah Tangga Higienis
            </h2>
            <p class="feature-desc" style="color: #4b5563; font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.25rem;">
                Bahan pembersih rumah tangga bermutu tinggi standar PKRT. Menjaga kebersihan dan keharuman lantai, dapur, serta fasilitas sanitasi keluarga dengan sensasi aroma lemon oranye segar transparan.
            </p>
            <ul class="feature-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; color: #374151; font-size: 0.92rem;">
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #D81B80; border-radius: 50%; display: inline-block;"></span>
                    <strong>Pembersih Lantai Oranye Lemon:</strong> Cairan transparan khas, mengkilapkan lantai tanpa licin.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #D81B80; border-radius: 50%; display: inline-block;"></span>
                    <strong>Sabun Cuci Piring Konsentrat:</strong> Meluruhkan lemak bandel pada peralatan dapur secara kilat.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #D81B80; border-radius: 50%; display: inline-block;"></span>
                    <strong>Hand Soap Anti-Bakteri:</strong> Sabun cuci tangan lembut di kulit dengan perlindungan kuman.
                </li>
            </ul>
        </div>

        <div class="feature-visual reveal" style="position: relative;">
            <div style="background: #4c0527; border-radius: 1.25rem; padding: 1.25rem; position: relative; overflow: hidden;">
                <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/product-home.png'); ?>" 
                     alt="Produk Kebutuhan Rumah Tangga Orchid Care" 
                     loading="lazy" 
                     style="width: 100%; height: auto; max-height: 380px; object-fit: contain; display: block;">
                
                <span style="position: absolute; bottom: 1rem; right: 1rem; background: #D81B80; color: #fff; padding: 0.35rem 0.85rem; border-radius: 4px; font-weight: 700; font-size: 0.75rem;">
                    STANDAR PKRT
                </span>
            </div>
        </div>

    </div>
</section>
