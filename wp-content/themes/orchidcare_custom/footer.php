<?php
/**
 * Footer Template — Orchid Care (PT Indotech Berkah Abadi)
 * Disesuaikan penuh dengan ketentuan README.md & spesifikasi ekosistem PT Indotech Berkah Abadi.
 */

// Fetch Dynamic Options from Customizer with README.md defaults
$email        = orchid_opt('email', 'indotechberkahabadi@gmail.com');
$address      = orchid_opt('address', 'Jongke Tengah No. 30, RT.01/RW.23, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285');
$facebook     = orchid_opt('facebook', 'https://www.facebook.com/orchidcare.id/');
$instagram    = orchid_opt('instagram', 'https://www.instagram.com/orchidcareofficial/');
$youtube      = orchid_opt('youtube', 'https://www.youtube.com/channel/UCrmo5q_w6rBSypc2l1ElY9w');

// Contact Channels (Single Official Sales Number)
$wa_produk    = 'https://api.whatsapp.com/send?phone=6285559474797&text=' . rawurlencode('Halo CS Orchid Care, saya berminat dengan produk sabun, parfum laundry, dan biang konsentrat.');
$wa_keagenan  = 'https://api.whatsapp.com/send?phone=6285559474797&text=' . rawurlencode('Halo CS Orchid Care, saya tertarik dengan peluang kemitraan B2B & keagenan.');
$wa_retail    = 'https://api.whatsapp.com/send?phone=6285559474797&text=' . rawurlencode('Halo CS Orchid Care, saya ingin bertanya mengenai pemesanan produk.');
?>

<footer class="site-footer" id="kontak" style="background: #0b132b; color: #cbd5e1; font-family: var(--font-sans, 'Inter', sans-serif); padding-top: 4.5rem; position: relative;">
    
    <!-- Top Footer Main Grid -->
    <div class="footer-main" style="padding-bottom: 4rem; border-bottom: 1px solid rgba(255, 255, 255, 0.08);">
        <div class="container" style="max-width: 1280px; margin: 0 auto; padding: 0 1.5rem;">
            <div class="footer-grid" style="display: grid; grid-template-columns: 2.2fr 1fr 1.2fr 1.8fr; gap: 3rem;">

                <!-- ═══ KOLOM 1: PROFIL BRAND & PILAR EKOSISTEM ═══ -->
                <div class="footer-brand-col">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-link" style="display: inline-flex; align-items: center; gap: 0.75rem; text-decoration: none; margin-bottom: 1.25rem;">
                        <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>" alt="Orchid Care Logo" style="height: 48px; width: auto;" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="logo-fallback" style="display: none; align-items: center; gap: 0.75rem;">
                            <div style="width: 44px; height: 44px; background: linear-gradient(135deg, #D81B80, #88C425); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 800; font-size: 1.25rem;">OC</div>
                            <div>
                                <div style="font-family: var(--font-heading, sans-serif); font-weight: 800; font-size: 1.3rem; color: #ffffff; line-height: 1;">ORCHID CARE</div>
                                <div style="font-size: 0.68rem; font-weight: 700; color: #88C425; letter-spacing: 0.12em; margin-top: 2px;">PT INDOTECH BERKAH ABADI</div>
                            </div>
                        </div>
                    </a>

                    <a href="https://indotech.id/" target="_blank" rel="noopener" style="font-size: 0.75rem; font-weight: 800; color: #88C425; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.6rem; text-decoration: none; display: inline-block;">
                        PT INDOTECH BERKAH ABADI (SLEMAN, YOGYAKARTA)
                    </a>

                    <p style="color: #94a3b8; font-size: 0.92rem; line-height: 1.65; margin-bottom: 1.25rem; max-width: 400px;">
                        Lini merek utama dari <a href="https://indotech.id/" target="_blank" rel="noopener" style="color: #ffffff; font-weight: 700; text-decoration: underline;">PT Indotech Berkah Abadi</a> yang memproduksi langsung sabun cuci piring, deterjen laundry, sabun pel lantai, parfum wewangian, hingga biang konsentrat 1kg jadi 15L.
                    </p>

                    <!-- Sertifikasi & Inovasi Badges -->
                    <div class="cert-badges" style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 1.5rem;">
                        <span style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.35); padding: 0.35rem 0.85rem; border-radius: 50px; font-size: 0.72rem; font-weight: 800; letter-spacing: 0.04em;">BPOM &amp; KEMENKES</span>
                        <span style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.35); padding: 0.35rem 0.85rem; border-radius: 50px; font-size: 0.72rem; font-weight: 800; letter-spacing: 0.04em;">HALAL MUI</span>
                        <span style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.35); padding: 0.35rem 0.85rem; border-radius: 50px; font-size: 0.72rem; font-weight: 800; letter-spacing: 0.04em;">ISO 9001</span>
                    </div>

                    <!-- Social Media Links -->
                    <div class="social-links" style="display: flex; gap: 0.75rem;">
                        <!-- Instagram (Gradient Ungu-Oranye) -->
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: #ffffff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; box-shadow: 0 2px 6px rgba(0,0,0,0.2);" aria-label="Instagram">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </a>
                        <!-- Facebook (Biru Resmi) -->
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" style="width: 38px; height: 38px; background: #1877F2; color: #ffffff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; box-shadow: 0 2px 6px rgba(0,0,0,0.2);" aria-label="Facebook">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        </a>
                        <!-- WhatsApp (Hijau Resmi) -->
                        <a href="<?php echo esc_url($wa_keagenan); ?>" target="_blank" rel="noopener" style="width: 38px; height: 38px; background: #25D366; color: #ffffff; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; box-shadow: 0 2px 6px rgba(0,0,0,0.2);" aria-label="WhatsApp">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- ═══ KOLOM 2: NAVIGASI PRODUK (6 KATEGORI UTAMA) ═══ -->
                <div class="footer-nav-col">
                    <h4 style="font-size: 0.8rem; font-weight: 700; color: #94a3b8; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 1.5rem;">KATEGORI PRODUK</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.85rem;">
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=sabun-laundry')); ?>" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Laundry Care</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=malabeez-perfume')); ?>" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Malabeez Perfume</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=sabun-pel-homecare')); ?>" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Home Care</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=paket-biang-sabun')); ?>" style="color: #88C425; text-decoration: none; font-size: 0.93rem; font-weight: 700; transition: color 0.2s;">Biang Konsentrat</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=automotive-care')); ?>" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Automotive Care</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produk?kategori=sanitasi-disinfektan')); ?>" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Sanitasi Care</a></li>
                    </ul>
                </div>

                <!-- ═══ KOLOM 3: BRAND KAMI & EKOSISTEM INDOTECH ═══ -->
                <div class="footer-brands-col">
                    <h4 style="font-size: 0.8rem; font-weight: 700; color: #94a3b8; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 1.5rem;">BRAND KAMI</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.85rem;">
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #D81B80; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://orchidbrand.id/" target="_blank" rel="noopener" style="color: #ffffff; text-decoration: none; font-size: 0.95rem; font-weight: 700;">Orchid Care</a>
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #38bdf8; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://cleaniquelab.com/" target="_blank" rel="noopener" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Cleanique Lab</a>
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #38bdf8; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://depocleanique.co.id/" target="_blank" rel="noopener" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Depo Cleanique</a>
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #38bdf8; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://cleaniqueacademy.com/" target="_blank" rel="noopener" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Cleanique Academy</a>
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #38bdf8; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://cleaniquemart.com/" target="_blank" rel="noopener" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Cleanique Mart</a>
                        </li>
                        <li style="display: flex; align-items: center; gap: 0.6rem;">
                            <span style="width: 6px; height: 6px; background: #38bdf8; border-radius: 50%; display: inline-block;"></span>
                            <a href="https://malabeez.co.id/" target="_blank" rel="noopener" style="color: #cbd5e1; text-decoration: none; font-size: 0.93rem; transition: color 0.2s;">Malabeez</a>
                        </li>
                    </ul>
                </div>

                <!-- ═══ KOLOM 4: HUBUNGI KAMI & CHANNELS CS PRODUK ═══ -->
                <div class="footer-contact-col">
                    <h4 style="font-size: 0.8rem; font-weight: 700; color: #94a3b8; letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 1.5rem;">HUBUNGI KAMI</h4>
                    
                    <div style="margin-bottom: 1.2rem;">
                        <div style="font-size: 0.75rem; font-weight: 800; color: #ffffff; letter-spacing: 0.05em; margin-bottom: 0.25rem;">EMAIL RESMI</div>
                        <a href="mailto:<?php echo esc_attr($email); ?>" style="color: #94a3b8; text-decoration: none; font-size: 0.9rem; word-break: break-all;">
                            <?php echo esc_html($email); ?>
                        </a>
                    </div>

                    <div style="margin-bottom: 1.2rem;">
                        <div style="font-size: 0.75rem; font-weight: 800; color: #ffffff; letter-spacing: 0.05em; margin-bottom: 0.25rem;">ALAMAT OPERASIONAL</div>
                        <p style="color: #94a3b8; font-size: 0.88rem; line-height: 1.5; margin: 0;">
                            <?php echo esc_html($address); ?>
                        </p>
                    </div>

                    <div>
                        <div style="font-size: 0.75rem; font-weight: 800; color: #ffffff; letter-spacing: 0.05em; margin-bottom: 0.5rem;">LAYANAN WHATSAPP</div>
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.95rem;">
                            <li>
                                <a href="<?php echo esc_url($wa_produk); ?>" target="_blank" rel="noopener" style="color: #38bdf8; text-decoration: none; font-weight: 700; font-size: 1.05rem;">
                                    +62 855-5947-4797
                                </a>
                                <span style="color: #94a3b8; display: block; font-size: 0.85rem; margin-top: 0.2rem;"> ( CS Penjualan Produk &amp; Kemitraan )</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bottom Footer Sub-bar -->
    <div class="footer-bottom" style="padding: 1.5rem 0; font-size: 0.85rem; color: #64748b;">
        <div class="container" style="max-width: 1280px; margin: 0 auto; padding: 0 1.5rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
            <div>
                &copy; <?php echo esc_html(date('Y')); ?> <strong>Orchid Care</strong> by <a href="https://indotech.id/" target="_blank" rel="noopener" style="color: #94a3b8; text-decoration: underline; font-weight: 600;">PT Indotech Berkah Abadi</a>. Hak Cipta Dilindungi.
            </div>

            <div style="display: flex; gap: 1.5rem;">
                <a href="<?php echo esc_url(home_url('/kebijakan-privasi')); ?>" style="color: #64748b; text-decoration: none;">Kebijakan Privasi</a>
                <a href="<?php echo esc_url(home_url('/syarat-dan-ketentuan')); ?>" style="color: #64748b; text-decoration: none;">Syarat &amp; Ketentuan</a>
                <a href="<?php echo esc_url(home_url('/kebijakan-cookie')); ?>" style="color: #64748b; text-decoration: none;">Kebijakan Cookie</a>
            </div>
        </div>
    </div>

</footer>

<!-- ═══ Floating Action Buttons (Bottom Right) ═══ -->
<div class="floating-actions" style="position: fixed; bottom: 2rem; right: 2rem; z-index: 999; display: flex; flex-direction: column; gap: 0.75rem; align-items: center;">
    
    <!-- Blue Scroll Up Button (Clean, no glow) -->
    <a href="#" id="orchid-scroll-up" class="floating-btn scroll-btn" aria-label="Kembali ke atas" style="width: 44px; height: 44px; background: #0057FF; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.15); text-decoration: none; transition: opacity 0.3s ease, transform 0.3s ease; opacity: 0; pointer-events: none;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
    </a>

    <!-- Green Floating WhatsApp Button (Clean static, no glow shader/ping) -->
    <a href="<?php echo esc_url($wa_keagenan); ?>" target="_blank" rel="noopener" class="floating-btn wa-btn" aria-label="Chat WhatsApp CS Keagenan" style="width: 50px; height: 50px; background: #25D366; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.15); text-decoration: none;">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
        </svg>
    </a>

</div>

<style>
#orchid-scroll-up.is-visible {
    opacity: 1 !important;
    pointer-events: auto !important;
}
@media (max-width: 992px) {
    .site-footer .footer-grid {
        grid-template-columns: 1fr 1fr !important;
        gap: 2.5rem !important;
    }
}
@media (max-width: 640px) {
    .site-footer .footer-grid {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>
