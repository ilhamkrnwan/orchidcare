<?php
/**
 * Home — Section Kategori: Perawatan Laundry (Laundry Care)
 * File: template-parts/home/feature-laundry.php
 */
?>

<section class="feature-section" id="kategori-laundry" style="padding: 4rem 0; background: #fff; border-bottom: 1px solid #eee;">
    <div class="container feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; align-items: center;">
        
        <div class="feature-visual order-2 lg-order-1 reveal" style="position: relative;">
            <div style="background: #16361E; border-radius: 1.25rem; padding: 1.25rem; position: relative; overflow: hidden;">
                <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/product-laundry.png'); ?>" 
                     alt="Produk Perawatan Laundry Orchid Care" 
                     loading="lazy" 
                     style="width: 100%; height: auto; max-height: 380px; object-fit: contain; display: block;">
                
                <span style="position: absolute; bottom: 1rem; right: 1rem; background: #88C425; color: #16361E; padding: 0.35rem 0.85rem; border-radius: 4px; font-weight: 700; font-size: 0.75rem;">
                    GRADE SUPER LEMON
                </span>
            </div>
        </div>

        <div class="feature-content order-1 lg-order-2 reveal">
            <span class="chip-tag chip-tag--mint" style="margin-bottom: 0.5rem; display: inline-block;">LAUNDRY CARE</span>
            <h2 class="feature-title" style="font-family: var(--font-heading); font-size: 2rem; color: #111827; line-height: 1.25; margin-bottom: 1rem;">
                Perawatan Laundry Profesional &amp; Rumahan
            </h2>
            <p class="feature-desc" style="color: #4b5563; font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.25rem;">
                Diformulasikan khusus dengan konsentrat pekat grade super lemon, anti-bakteri, dan pencerah warna kain. Pilihan utama pengusaha laundry kiloan, dry cleaning, hingga kebutuhan cuci harian rumah tangga.
            </p>
            <ul class="feature-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; color: #374151; font-size: 0.92rem;">
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Deterjen Liquid Super Lemon:</strong> Busa terkontrol, efisien di mesin front/top load.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Spesialis Noda &amp; Alkali:</strong> Meluruhkan noda minyak, darah, karat &amp; daki membandel.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Softener &amp; Pelembut Serat:</strong> Menjaga kelembutan pakaian agar mudah disetrika.
                </li>
            </ul>
        </div>

    </div>
</section>
