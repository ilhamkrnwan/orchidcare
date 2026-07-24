<?php
/**
 * Template Name: FAQ (Pertanyaan Umum)
 * Template Path: page-faq.php
 */

get_header();

$wa_url = orchid_wa_url('Halo Orchid Care, saya ada pertanyaan yang tidak ada di daftar FAQ.');
?>

<main id="main-content" class="faq-page">

    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'PERTANYAAN UMUM',
        'Frequently Asked Questions (FAQ)',
        'Temukan jawaban atas pertanyaan populer seputar produk Orchid Care, cara peracikan biang konsentrat, serta peluang kemitraan B2B & keagenan.'
    ); ?>

    <!-- ═══ FAQ LIST SECTION ═══ -->
    <section class="faq-section" style="padding: 4rem 0;">
        <div class="container" style="max-width: 900px;">

            <?php
            // Query FAQ CPT if exists, else fallback array
            $faq_query = new WP_Query([
                'post_type'      => 'faq',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            $faqs = [];

            if ($faq_query->have_posts()) {
                while ($faq_query->have_posts()) {
                    $faq_query->the_post();
                    $faqs[] = [
                        'q' => get_the_title(),
                        'a' => get_the_content(),
                    ];
                }
                wp_reset_postdata();
            } else {
                // Default fallback FAQs from README / PRD
                $faqs = [
                    [
                        'q' => 'Apa itu produk Bahan Konsentrat (Biang Ekstrak) Orchid Care?',
                        'a' => 'Bahan Konsentrat (Biang Ekstrak) seperti varian DeterMat, O\'Clean, dan Arai adalah inovasi efisiensi logistik dari PT Indotech Berkah Abadi. Berbentuk konsentrat pekat 1 kg yang dirancang khusus agar dapat diracik sendiri oleh mitra menggunakan 14 Liter air bersih menjadi 15 Liter cairan deterjen/pembersih kualitas industri siap pakai. Ini menghemat ongkos kirim secara signifikan.'
                    ],
                    [
                        'q' => 'Bagaimana cara peracikan mandiri 1 kg biang konsentrat?',
                        'a' => 'Caranya sangat mudah: (1) Siapkan wadah/ember bersih 15 Liter. (2) Isi air bersih sebanyak 14 Liter. (3) Tuangkan 1 kg biang konsentrat secara bertahap sambil diaduk hingga larutan homogen & kental. (4) Diamkan 2–4 jam hingga busa mengendap. Cairan siap dikemas dan dipakai.'
                    ],
                    [
                        'q' => 'Apakah produk Orchid Care aman dan memiliki izin resmi?',
                        'a' => 'Ya, seluruh produk Orchid Care diformulasikan sesuai standar Perbekalan Kesehatan Rumah Tangga (PKRT) dan ramah lingkungan oleh divisi riset Cleanique Lab, PT Indotech Berkah Abadi, Sleman, Yogyakarta.'
                    ],
                    [
                        'q' => 'Bagaimana cara menjadi Agen, Reseller, atau Mitra B2B Orchid Care?',
                        'a' => 'Anda dapat langsung menghubungi tim marketing kami via WhatsApp atau mengisi formulir di halaman Kontak. Kami membuka peluang kemitraan keagenan di seluruh kabupaten/kota di Indonesia dengan dukungan harga grosir dan pendampingan bisnis.'
                    ],
                    [
                        'q' => 'Apakah ada minimal pemesanan untuk pengiriman luar daerah?',
                        'a' => 'Tidak ada batasan minimal yang rumit! Namun untuk pengiriman luar pulau atau daerah, kami sangat merekomendasikan produk Bahan Konsentrat (Biang Ekstrak 1kg -> 15L) untuk menekan biaya ongkos kirim cairan hingga 90%.'
                    ],
                    [
                        'q' => 'Berapa minimal pembelian produk jerigen atau grosir?',
                        'a' => 'Kami melayani pembelian eceran (retail) hingga skala grosir jerigen (5L / 20L) dan biang 1kg tanpa batasan rumit. Kontak CS WhatsApp kami untuk mendapatkan daftar harga khusus reseller.'
                    ],
                ];
            }
            ?>

            <div class="faq-accordion-list" style="display: flex; flex-direction: column; gap: 1.25rem;">
                <?php foreach ($faqs as $index => $item) : ?>
                    <details class="faq-item" <?php echo $index === 0 ? 'open' : ''; ?> style="background: #fff; border: 1px solid rgba(0,0,0,0.1); border-radius: 1rem; padding: 1.25rem 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
                        <summary style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 700; color: var(--color-ink, #16361E); cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                            <span><?php echo esc_html($item['q']); ?></span>
                            <span style="font-size: 1.5rem; color: #D81B80; line-height: 1;">+</span>
                        </summary>
                        <div class="faq-answer" style="margin-top: 1rem; color: #555; font-size: 0.98rem; line-height: 1.6; border-top: 1px solid #f0f0f0; padding-top: 0.75rem;">
                            <?php echo wp_kses_post(wpautop($item['a'])); ?>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>

            <!-- Still Have Questions Box -->
            <div style="margin-top: 3.5rem; text-align: center; background: var(--color-surface, #F5FAF0); padding: 2.5rem; border-radius: 1.5rem; border: 1px dashed #A5D6A7;">
                <h3 style="font-family: var(--font-heading); font-size: 1.5rem; color: var(--color-ink); margin-bottom: 0.5rem;">Masih Memiliki Pertanyaan Lain?</h3>
                <p style="color: #666; font-size: 0.95rem; margin-bottom: 1.5rem;">Tim customer service kami siap menjawab pertanyaan teknis produk maupun negosiasi kemitraan Anda.</p>
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-coral btn-lg">
                    Tanyakan Langsung via WhatsApp
                </a>
            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>
