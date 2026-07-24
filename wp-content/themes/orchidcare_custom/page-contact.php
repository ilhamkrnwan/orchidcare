<?php
/**
 * Template Name: Kontak & Kemitraan
 * Template Path: page-contact.php
 */

get_header();

$phone    = orchid_opt('phone', '+62 878-8559-0088');
$email    = orchid_opt('email', 'orchidcare@orchidbrand.id');
$address  = orchid_opt('address', 'Jongke Tengah No. 30, Sendangadi, Mlati, Sleman, D.I. Yogyakarta');
$whatsapp = orchid_opt('whatsapp', '6287885590088');
$wa_url   = orchid_wa_url('Halo PT Indotech Berkah Abadi / Orchid Care, saya ingin bertanya mengenai produk dan peluang kemitraan.');
?>

<main id="main-content" class="contact-page">

    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'HUBUNGI KAMI',
        'Mari Terhubung dengan Tim Orchid Care',
        'Apakah Anda membutuhkan pasokan produk kebersihan rumah tangga, bisnis laundry, atau tertarik menjadi agen/mitra B2B kami? Tim PT Indotech Berkah Abadi siap membantu Anda.'
    ); ?>

    <!-- ═══ CONTACT CONTENT GRID ═══ -->
    <section class="contact-section" style="padding: 4rem 0;">
        <div class="container">
            <div class="grid grid-2" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem; align-items: start;">
                
                <!-- Info Column -->
                <div class="contact-info-card" style="background: #fff; padding: 2.5rem; border-radius: 1.5rem; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
                    <h2 style="font-family: var(--font-heading); font-size: 1.75rem; color: var(--color-ink, #16361E); margin-bottom: 1.5rem;">Informasi Kontak</h2>
                    
                    <div class="info-item" style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                        <div class="info-icon" style="width: 44px; height: 44px; background: #E8F5E9; color: #2E7D32; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 0.25rem; font-size: 1rem; color: var(--color-ink);">Alamat Kantor &amp; Operasional</h4>
                            <p style="margin: 0; color: #555; font-size: 0.95rem; line-height: 1.5;"><?php echo esc_html($address); ?></p>
                        </div>
                    </div>

                    <div class="info-item" style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                        <div class="info-icon" style="width: 44px; height: 44px; background: #E3F2FD; color: #1565C0; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 0.25rem; font-size: 1rem; color: var(--color-ink);">Telepon &amp; WhatsApp CS</h4>
                            <p style="margin: 0; color: #555; font-size: 0.95rem;">
                                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" style="color: #2E7D32; font-weight: 600; text-decoration: underline;"><?php echo esc_html($phone); ?></a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item" style="margin-bottom: 1.5rem; display: flex; gap: 1rem; align-items: flex-start;">
                        <div class="info-icon" style="width: 44px; height: 44px; background: #FFF3E0; color: #E65100; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 0.25rem; font-size: 1rem; color: var(--color-ink);">Email Resmi</h4>
                            <p style="margin: 0; color: #555; font-size: 0.95rem;"><?php echo esc_html($email); ?></p>
                        </div>
                    </div>

                    <div class="fast-wa-box" style="margin-top: 2rem; padding: 1.25rem; background: #F1F8E9; border-radius: 1rem; border: 1px solid #C8E6C9;">
                        <h4 style="margin: 0 0 0.5rem; font-size: 1rem; color: #1B5E20;">Respon Cepat via WhatsApp</h4>
                        <p style="margin: 0 0 1rem; font-size: 0.9rem; color: #33691E;">Dapatkan pricelist grosir, info kemitraan keagenan, dan konsultasi produk langsung dari tim marketing kami.</p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn btn-coral" style="width: 100%; text-align: center; justify-content: center;">
                            Chat CS WhatsApp Sekarang
                        </a>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="contact-form-card" style="background: #fff; padding: 2.5rem; border-radius: 1.5rem; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
                    <h2 style="font-family: var(--font-heading); font-size: 1.75rem; color: var(--color-ink, #16361E); margin-bottom: 0.5rem;">Kirim Pesan &amp; Pengajuan Kemitraan</h2>
                    <p style="color: #666; font-size: 0.95rem; margin-bottom: 1.5rem;">Isi formulir di bawah ini, tim kami akan merespon dalam waktu 1x24 jam kerja.</p>

                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="orchid-contact-form">
                        <?php wp_nonce_field('orchid_contact_nonce', 'orchid_contact_nonce'); ?>
                        <input type="hidden" name="action" value="orchid_submit_contact">

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_name" style="display: block; font-size: 0.9rem; font-weight: 600; color: var(--color-ink); margin-bottom: 0.35rem;">Nama Lengkap *</label>
                            <input type="text" id="contact_name" name="contact_name" required placeholder="Contoh: Budi Santoso" style="width: 100%; padding: 0.8rem 1rem; border: 1px solid #ccc; border-radius: 10px; font-size: 0.95rem;">
                        </div>

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_phone" style="display: block; font-size: 0.9rem; font-weight: 600; color: var(--color-ink); margin-bottom: 0.35rem;">Nomor HP / WhatsApp *</label>
                            <input type="tel" id="contact_phone" name="contact_phone" required placeholder="Contoh: 081234567890" style="width: 100%; padding: 0.8rem 1rem; border: 1px solid #ccc; border-radius: 10px; font-size: 0.95rem;">
                        </div>

                        <div style="margin-bottom: 1.25rem;">
                            <label for="contact_subject" style="display: block; font-size: 0.9rem; font-weight: 600; color: var(--color-ink); margin-bottom: 0.35rem;">Tujuan Pesan *</label>
                            <select id="contact_subject" name="contact_subject" style="width: 100%; padding: 0.8rem 1rem; border: 1px solid #ccc; border-radius: 10px; font-size: 0.95rem; background: #fff;">
                                <option value="Pemesanan Produk Retail / Jerigen">Pemesanan Produk (Retail / Jerigen)</option>
                                <option value="Biang Konsentrat (DeterMat/O'Clean/Arai)">Informasi Biang Konsentrat (1kg -> 15L)</option>
                                <option value="Kemitraan Keagenan & Reseller">Kemitraan Keagenan &amp; Reseller</option>
                                <option value="Konsultasi Formulasi & Biang Konsentrat">Konsultasi Formulasi &amp; Biang Konsentrat</option>
                                <option value="Pasokan B2B Hotel / RS / Resto">Pasokan B2B (Hotel / Rumah Sakit / Restoran)</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 1.5rem;">
                            <label for="contact_message" style="display: block; font-size: 0.9rem; font-weight: 600; color: var(--color-ink); margin-bottom: 0.35rem;">Pesan / Pertanyaan *</label>
                            <textarea id="contact_message" name="contact_message" rows="4" required placeholder="Tuliskan pertanyaan atau spesifikasi kebutuhan Anda..." style="width: 100%; padding: 0.8rem 1rem; border: 1px solid #ccc; border-radius: 10px; font-size: 0.95rem; font-family: inherit;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-ink" style="width: 100%; justify-content: center; padding: 0.9rem 1.5rem; font-size: 1rem;">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- ═══ MAP EMBED SECTION ═══ -->
    <section class="map-section" style="padding: 0 0 4rem;">
        <div class="container">
            <div style="border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(0,0,0,0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <iframe 
                    title="Peta Lokasi PT Indotech Berkah Abadi"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.256847847953!2d110.362143!3d-7.762551!2m3!1f0!0f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDUnNDUuMiJTIDExMMKwMjEnNDMuNyJF!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
