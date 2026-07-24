<?php
/**
 * Home — FAQ / Tentang
 * Accordion: single item open at a time (JS in main.js).
 */
$faqs = [
    [
        'q' => 'Bagaimana cara memesan produk?',
        'a' => 'Hubungi tim kami langsung lewat WhatsApp — tim akan bantu pilihkan produk sesuai kebutuhan sampai proses pengiriman selesai.',
    ],
    [
        'q' => 'Apa saja syarat jadi reseller?',
        'a' => 'Daftar sebagai reseller cukup hubungi tim kami via WhatsApp, tanpa proses rumit — kami bantu mulai dari skala kecil sampai kamu siap naik ke agen atau distributor.',
    ],
    [
        'q' => 'Apakah produk sudah legal &amp; terdaftar?',
        'a' => 'Ya. Seluruh produk Orchid Care legal dan terdaftar, aman digunakan untuk kebutuhan rumah tangga maupun usaha laundry.',
    ],
    [
        'q' => 'Bagaimana estimasi pengiriman?',
        'a' => 'Paket dikirim ke seluruh Indonesia lewat ekspedisi pilihanmu, langsung dari gudang kami tanpa perantara.',
    ],
];
?>

<section class="faq-section" id="tentang">
    <div class="container container--narrow">
        <div class="faq-head reveal">
            <h2 class="faq-heading">
                Ada Pertanyaan?
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </h2>
            <p class="faq-note">Informasi seputar produk, cara pemesanan, dan program kerjasama Orchid Care.</p>
        </div>

        <div class="faq-list reveal">
            <?php foreach ($faqs as $i => $faq) : $open = $i === 1; ?>
                <div class="faq-item<?php echo $open ? ' is-open' : ''; ?>">
                    <button class="faq-trigger" type="button" aria-expanded="<?php echo $open ? 'true' : 'false'; ?>">
                        <span><?php echo wp_kses_post($faq['q']); ?></span>
                        <span class="faq-icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
                        </span>
                    </button>
                    <div class="faq-panel">
                        <div class="faq-panel-inner"><?php echo wp_kses_post($faq['a']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
