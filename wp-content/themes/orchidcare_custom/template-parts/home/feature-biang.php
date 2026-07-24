<?php
/**
 * Home — Section Kategori: Biang Konsentrat (1kg -> 15L) & Mix Calculator Widget
 * File: template-parts/home/feature-biang.php
 */
?>

<section class="feature-section" id="kategori-biang" style="padding: 4rem 0; background: #16361E; color: #ffffff; border-bottom: 1px solid rgba(255,255,255,0.1); position: relative; overflow: hidden;">
    <div class="container feature-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; align-items: center; position: relative; z-index: 2;">
        
        <div class="feature-content reveal">
            <span class="chip-tag" style="background: rgba(136, 196, 37, 0.2); color: #88C425; border: 1px solid #88C425; margin-bottom: 0.5rem; display: inline-block;">BIANG KONSENTRAT</span>
            <h2 class="feature-title" style="font-family: var(--font-heading); font-size: 2rem; color: #ffffff; line-height: 1.25; margin-bottom: 1rem;">
                Inovasi Biang Ekstrak: 1 kg Biang = 15 Liter Siap Pakai
            </h2>
            <p class="feature-desc" style="color: #e2e8f0; font-size: 0.98rem; line-height: 1.6; margin-bottom: 1.25rem;">
                Inovasi unggulan dari PT Indotech Berkah Abadi (DeterMat, O'Clean, Arai). Paket biang konsentrat pekat 1 kg diracik mandiri dengan 14 Litres air bersih menjadi 15 Litres produk kualitas industri. <strong>Menekan biaya ongkos kirim cairan hingga 90%!</strong>
            </p>
            <ul class="feature-list" style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; color: #cbd5e1; font-size: 0.92rem;">
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Hemat Ongkir Maksimal:</strong> Ringan di ongkir pengiriman luar kota / luar pulau.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Peracikan Mudah 5 Menit:</strong> Cukup aduk rata dengan air bersih tanpa perlu alat khusus.
                </li>
                <li style="display: flex; align-items: center; gap: 0.6rem;">
                    <span style="width: 6px; height: 6px; background: #88C425; border-radius: 50%; display: inline-block;"></span>
                    <strong>Hasil Pekat &amp; Busa Stabil:</strong> Kualitas setara deterjen cair jerigen pabrikan.
                </li>
            </ul>
        </div>

        <!-- Interactive Biang Mix Calculator Widget -->
        <div class="feature-visual reveal">
            <div class="biang-calculator-card" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.15); border-radius: 1.25rem; padding: 1.5rem;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h3 style="font-family: var(--font-heading); font-size: 1.15rem; color: #88C425; margin: 0;">Kalkulator Hasil Biang</h3>
                    <span style="background: #88C425; color: #16361E; padding: 0.2rem 0.6rem; border-radius: 4px; font-size: 0.7rem; font-weight: 700;">1 KG = 15 L</span>
                </div>
                <p style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 1rem; line-height: 1.4;">
                    Hitung estimasi total cairan hasil racikan yang Anda dapatkan dari jumlah kemasan biang 1 kg:
                </p>

                <div style="margin-bottom: 1rem;">
                    <label for="biang-qty-input" style="font-size: 0.82rem; font-weight: 700; color: #fff; display: block; margin-bottom: 0.4rem;">Jumlah Kemasan Biang (kg):</label>
                    <input type="number" id="biang-qty-input" value="1" min="1" max="100" style="width: 100%; padding: 0.65rem 0.85rem; border-radius: 0.5rem; border: 1px solid rgba(255,255,255,0.3); background: rgba(0,0,0,0.3); color: #fff; font-size: 1rem; font-weight: 700;">
                </div>

                <div style="background: rgba(136, 196, 37, 0.15); border: 1px solid #88C425; border-radius: 0.75rem; padding: 1rem; text-align: center;">
                    <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; color: #cbd5e1;">TOTAL HASIL CAIRAN SIAP PAKAI</div>
                    <div id="biang-result-display" style="font-size: 2rem; font-weight: 800; color: #88C425; font-family: var(--font-heading); margin: 0.2rem 0;">15 Liter</div>
                    <div style="font-size: 0.75rem; color: #cbd5e1;">( 1 kg Biang + 14 Liter Air Clean )</div>
                </div>
            </div>
        </div>

    </div>
</section>
