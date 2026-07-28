<?php
/**
 * Template Name: Kontak & Kemitraan
 * Template Path: page-contact.php
 */

get_header();

// Fetch Data & Single Official WhatsApp Link
$address  = orchid_opt('address', 'Jongke Tengah No. 30, RT.01/RW.23, Sendangadi, Kec. Mlati, Kabupaten Sleman, D.I. Yogyakarta 55285');
$email    = orchid_opt('email', 'indotechberkahabadi@gmail.com');
$phone    = orchid_opt('phone', '+62 855-5947-4797');
$wa_url   = orchid_wa_url('Halo PT Indotech Berkah Abadi / Orchid Care, saya ingin bertanya mengenai produk sabun, biang konsentrat, dan peluang kemitraan.');

// Notice Alert on Form Submission
$form_sent = isset($_GET['contact_sent']) && $_GET['contact_sent'] == '1';
?>

<!-- Inline Responsive Styling untuk Mobile Compatibility & Clean Layout -->
<style>
.contact-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.contact-page .contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.15fr;
    gap: 3.5rem;
    align-items: start;
}
@media (min-width: 993px) {
    .contact-sticky-col {
        position: sticky !important;
        top: 110px !important;
        align-self: start !important;
    }
}
@media (max-width: 992px) {
    .contact-page .contact-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
}
@media (max-width: 768px) {
    .contact-page section {
        padding: 3rem 0 !important;
    }
    .contact-page .maps-info-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<main id="main-content" class="contact-page">

    <!-- ═══ 1. ELEGANT PAGE HERO BANNER (MATCHING BERANDA & ABOUT) ═══ -->
    <?php orchid_page_hero(
        'HUBUNGI KAMI',
        'Kontak & Kemitraan Pabrik Sabun Laundry Sleman Yogyakarta',
        'Informasi kontak resmi, layanan pelanggan WhatsApp, serta formulir kemitraan pabrik PT Indotech Berkah Abadi (Orchid Care). Siap melayani pasokan grosir, keagenan, & suplai laundry kiloan se-Indonesia.'
    ); ?>

    <!-- ═══ 2. MAIN CONTACT SECTION (INFO CHANNELS & FORM GRID) ═══ -->
    <section class="contact-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="contact-grid">
                
                <!-- ═══ KOLOM KIRI: INFORMASI KONTAK & SALURAN WA RESMI ═══ -->
                <div class="reveal contact-sticky-col">
                    <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.75rem; display: inline-block;">SALURAN KOMUNIKASI RESMI</span>
                    
                    <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(1.8rem, 4vw, 2.4rem); color: #16361E; line-height: 1.25; margin-bottom: 1rem; font-weight: 800;">
                        Layanan Pelanggan &amp; Kemitraan Tangan Pertama
                    </h2>

                    <p style="color: rgba(22, 54, 30, 0.78); font-size: 1rem; line-height: 1.65; margin-bottom: 2rem;">
                        Hubungi layanan pelanggan WhatsApp kami untuk mendapatkan informasi pricelist grosir, konsultasi produk, dan pengajuan kemitraan agen se-Indonesia.
                    </p>

                    <!-- Single Main WhatsApp Official Card -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 2rem; margin-bottom: 2rem; box-shadow: 0 8px 25px rgba(22, 54, 30, 0.04);">
                        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.25rem;">
                            <div style="width: 52px; height: 52px; background: #25D366; color: #ffffff; border-radius: 1rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            </div>
                            <div>
                                <span style="font-size: 0.75rem; font-weight: 800; color: #16361E; opacity: 0.75; text-transform: uppercase; display: block;">WHATSAPP RESMI</span>
                                <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.35rem; font-weight: 800; color: #16361E; margin: 0; line-height: 1.2;">
                                    <?php echo esc_html($phone); ?>
                                </h3>
                            </div>
                        </div>
                        <p style="color: rgba(22, 54, 30, 0.85); font-size: 0.93rem; line-height: 1.55; margin-bottom: 1.5rem;">
                            Layanan respon cepat untuk pertanyaan produk, pricelist grosir, konsul biang konsentrat, &amp; kemitraan.
                        </p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; width: 100%; box-shadow: none;">
                            <span>Hubungi Customer Service via WA &rarr;</span>
                        </a>
                    </div>

                    <!-- Additional Contact Details Box -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.5rem 1.75rem;">
                        <h4 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.15rem; color: #16361E; font-weight: 800; margin-bottom: 0.75rem;">Email &amp; Legalitas Usaha</h4>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.92rem; line-height: 1.6; margin-bottom: 0.5rem;">
                            <strong>Email Resmi:</strong> <a href="mailto:<?php echo esc_attr($email); ?>" style="color: #16361E; font-weight: 700; text-decoration: underline;"><?php echo esc_html($email); ?></a>
                        </p>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.92rem; line-height: 1.6; margin: 0;">
                            <strong>Produsen Utama:</strong> PT Indotech Berkah Abadi (Sleman, D.I. Yogyakarta)
                        </p>
                    </div>

                </div>

                <!-- ═══ KOLOM KANAN: FORMULIR PENGAJUAN KEMITRAAN & PESAN ═══ -->
                <div class="reveal" style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.75rem; padding: 2.25rem 2rem; box-shadow: 0 12px 35px rgba(22, 54, 30, 0.04);">
                    
                    <span class="chip-tag chip-tag--butter" style="margin-bottom: 0.75rem; display: inline-block;">FORMULIR PESAN DIRECT</span>
                    <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.6rem; color: #16361E; font-weight: 800; margin-bottom: 0.5rem;">
                        Kirim Pesan &amp; Pengajuan Kemitraan
                    </h2>
                    <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.93rem; line-height: 1.55; margin-bottom: 1.75rem;">
                        Isi formulir di bawah ini. Tim operasional Orchid Care akan merespon pertanyaan Anda dalam waktu 1x24 jam kerja.
                    </p>

                    <?php if ($form_sent) : ?>
                        <div style="background: #DDF6AC; border: 1px solid #88C425; color: #16361E; padding: 1rem 1.25rem; border-radius: 1rem; margin-bottom: 1.5rem; font-weight: 700; font-size: 0.93rem;">
                            ✓ Terima kasih! Pesan Anda telah berhasil terkirim. Tim kami akan segera menghubungi Anda.
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="orchid-contact-form">
                        <?php wp_nonce_field('orchid_contact_nonce', 'orchid_contact_nonce'); ?>
                        <input type="hidden" name="action" value="orchid_submit_contact">

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_name" style="display: block; font-size: 0.88rem; font-weight: 700; color: #16361E; margin-bottom: 0.4rem;">Nama Lengkap *</label>
                            <input type="text" id="contact_name" name="contact_name" required placeholder="Contoh: Budi Santoso" style="width: 100%; padding: 0.85rem 1.1rem; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 0.85rem; font-size: 0.95rem; background: #ffffff; color: #16361E;">
                        </div>

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_phone" style="display: block; font-size: 0.88rem; font-weight: 700; color: #16361E; margin-bottom: 0.4rem;">Nomor HP / WhatsApp *</label>
                            <input type="tel" id="contact_phone" name="contact_phone" required placeholder="Contoh: 081234567890" style="width: 100%; padding: 0.85rem 1.1rem; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 0.85rem; font-size: 0.95rem; background: #ffffff; color: #16361E;">
                        </div>

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_subject" style="display: block; font-size: 0.88rem; font-weight: 700; color: #16361E; margin-bottom: 0.4rem;">Kategori Kebutuhan / Tujuan *</label>
                            <select id="contact_subject" name="contact_subject" style="width: 100%; padding: 0.85rem 1.1rem; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 0.85rem; font-size: 0.95rem; background: #ffffff; color: #16361E;">
                                <option value="Kemitraan Keagenan & Reseller">Kemitraan Keagenan &amp; Reseller</option>
                                <option value="Pasokan Sabun Laundry Kiloan / Horeka">Pasokan Sabun Laundry Kiloan / Horeka</option>
                                <option value="Biang Konsentrat (1kg -> 15L)">Informasi Biang Konsentrat (1kg -> 15L)</option>
                                <option value="Konsultasi Formulasi Produk">Konsultasi Formulasi Produk &amp; Sampel</option>
                                <option value="Pemesanan Retail / Rumah Tangga">Pemesanan Retail / Rumah Tangga</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 1.75rem;">
                            <label for="contact_message" style="display: block; font-size: 0.88rem; font-weight: 700; color: #16361E; margin-bottom: 0.4rem;">Pesan / Detail Kebutuhan *</label>
                            <textarea id="contact_message" name="contact_message" rows="4" required placeholder="Tuliskan pertanyaan, spesifikasi usaha, atau lokasi Anda..." style="width: 100%; padding: 0.85rem 1.1rem; border: 1px solid rgba(22, 54, 30, 0.15); border-radius: 0.85rem; font-size: 0.95rem; font-family: inherit; background: #ffffff; color: #16361E;"></textarea>
                        </div>

                        <button type="submit" class="btn-search-pill" style="width: 100%; text-align: center; justify-content: center; padding: 0.9rem 1.8rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; font-size: 1rem; border: none; cursor: pointer; box-shadow: none;">
                            Kirim Pesan Sekarang &rarr;
                        </button>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 3. LARGE GOOGLE MAPS EMBED & OPERATIONAL INFO (MATCHING ABOUT PAGE) ═══ -->
    <section class="maps-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            <div class="section-header reveal text-center" style="max-width: 800px; margin: 0 auto 3rem;">
                <span class="chip-tag chip-tag--mint">LOKASI KANTOR &amp; OPERASIONAL</span>
                <h2 class="section-title" style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4.5vw, 2.6rem); color: #16361E; font-weight: 800;">Lokasi Operasional Sleman Yogyakarta</h2>
                <p class="section-desc" style="color: rgba(22, 54, 30, 0.75); font-size: 1rem;">Berpusat di Sleman, D.I. Yogyakarta untuk pengiriman rutin produk dan kemitraan ke seluruh Indonesia.</p>
            </div>

            <!-- Large Maps Frame Embed -->
            <div class="reveal" style="border-radius: 1.75rem; overflow: hidden; box-shadow: 0 16px 45px rgba(22, 54, 30, 0.12); border: 1px solid rgba(22, 54, 30, 0.08); background: #fafafa; margin-bottom: 2rem;">
                <iframe 
                    title="Peta Lokasi PT Indotech Berkah Abadi Sleman Yogyakarta"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.4735222953284!2d110.36214227575199!3d-7.739497576722372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5913e61c39ab%3A0x6b3724c9c1bfa7a7!2sJongke%20Tengah%2C%20Sendangadi%2C%20Kec.%20Mlati%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta%2055285!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="460" 
                    style="border:0; display: block;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Info Cards Bar Below Map -->
            <div class="maps-info-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem;">
                    <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.1rem; font-weight: 800; margin-bottom: 0.5rem;">Alamat Lengkap</h4>
                    <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.5; margin: 0;"><?php echo esc_html($address); ?></p>
                </div>
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem;">
                    <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.1rem; font-weight: 800; margin-bottom: 0.5rem;">Jam Operasional</h4>
                    <p style="color: rgba(22, 54, 30, 0.75); font-size: 0.9rem; line-height: 1.5; margin: 0;">Senin - Sabtu: 08.00 - 17.00 WIB<br>Minggu &amp; Libur Nasional: Tutup (Layanan CS WA Tetap Buka)</p>
                </div>
                <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.25rem; padding: 1.5rem; display: flex; flex-direction: column; justify-content: center;">
                    <a href="https://maps.google.com/?q=Jongke+Tengah+No.+30,+Sendangadi,+Mlati,+Sleman,+Yogyakarta" target="_blank" rel="noopener" class="btn-search-pill" style="text-decoration: none; padding: 0.85rem 1.5rem; background: #16361E; color: #ffffff; text-align: center; border-radius: 999px; font-weight: 700; display: block;">
                        <span>Petunjuk Arah Google Maps &rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- ═══ 4. CTA BANNER PENUTUP (MATCHING BERANDA & ABOUT PAGE) ═══ -->
    <section class="cta-banner-penutup" id="cta-penutup" style="background: #16361E; color: #ffffff; padding: 5.5rem 0; position: relative; overflow: hidden; border-top: 3px solid #88C425;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 650px; height: 350px; background: radial-gradient(circle, rgba(136, 196, 37, 0.12) 0%, rgba(22, 54, 30, 0) 70%); pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 2; max-width: 820px; text-align: center;">
            <span style="background: #88C425; color: #16361E; font-weight: 800; font-size: 0.78rem; padding: 0.45rem 1.1rem; border-radius: 999px; font-family: var(--font-mono, monospace); display: inline-block; margin-bottom: 1.25rem; letter-spacing: 0.05em;">
                PABRIK &amp; SUPPLIER SABUN SLEMAN YOGYAKARTA
            </span>

            <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4vw, 2.6rem); line-height: 1.2; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
                Siap Bermitra dengan Produsen &amp; Supplier Sabun Tangan Pertama?
            </h2>

            <p style="color: #cbd5e1; font-size: 1.02rem; line-height: 1.65; margin: 0 auto 2.25rem; max-width: 680px;">
                Hubungi tim kemitraan <strong>Orchid Care (PT Indotech Berkah Abadi)</strong> untuk konsultasi pasokan grosir rutin, peluang keagenan, &amp; suplai sabun laundry kiloan se-Indonesia.
            </p>

            <div class="cta-buttons-wrap" style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none;">
                    <span>Hubungi Kemitraan WA</span>
                </a>

                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                    Lihat Katalog Produk
                </a>
            </div>

            <div style="margin-top: 2.75rem; display: flex; gap: 1.75rem; justify-content: center; flex-wrap: wrap; font-size: 0.88rem; color: #cbd5e1; border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1.5rem; font-weight: 600;">
                <span>✓ Pabrik Resmi Sleman, D.I. Yogyakarta</span>
                <span>✓ Izin Edar Kemenkes RI &amp; Halal MUI</span>
                <span>✓ Biang Konsentrat Hemat Ongkir 90%</span>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
