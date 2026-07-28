<?php
/**
 * Template Name: Legal Page (Kebijakan & Ketentuan)
 * Template Path: page-legal.php
 */

get_header();

$slug = get_post_field('post_name', get_the_ID());
$last_updated = get_the_modified_date('d F Y') ?: '24 Juli 2026';
$wa_url = orchid_wa_url('Halo Legal Orchid Care, saya ingin berkonsultasi mengenai dokumen legal/kebijakan.');
?>

<style>
/* Layout 2 Kolom untuk Legal Page Desktop */
.legal-page {
    width: 100%;
}
.legal-grid {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 3.5rem;
    align-items: start;
}
@media (max-width: 992px) {
    .legal-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
    .legal-toc-sidebar {
        display: none !important;
    }
}

/* Sticky Table of Contents (TOC) Sidebar Desktop */
.legal-toc-sidebar {
    position: sticky;
    top: calc(var(--header-h, 80px) + 2rem);
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}
.legal-toc-card {
    background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%);
    border: 1px solid rgba(136, 196, 37, 0.4);
    border-radius: 1.5rem;
    padding: 1.4rem 1.6rem;
    box-shadow: 0 6px 25px rgba(22, 54, 30, 0.04);
}
.legal-toc-header {
    display: flex;
    align-items: center;
    gap: 0.65rem;
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    font-size: 1.08rem;
    font-weight: 800;
    color: #16361E;
    margin-bottom: 0.85rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.1);
}
.legal-toc-nav {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}
.legal-toc-link {
    display: block;
    color: rgba(22, 54, 30, 0.78);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none !important;
    padding: 0.45rem 0.85rem;
    border-radius: 0.75rem;
    transition: all 0.2s ease;
    line-height: 1.4;
    border: 1px solid transparent;
}
.legal-toc-link:hover,
.legal-toc-link.is-active {
    color: #16361E;
    background: #ffffff;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(22, 54, 30, 0.06);
    border-color: rgba(136, 196, 37, 0.3);
    padding-left: 1rem;
}
.legal-toc-link.is-active {
    border-left: 4px solid #88C425;
    color: #D81B80;
}

/* Legal Main Content Box */
.legal-main-content .entry-content {
    background: #ffffff;
    padding: 2.75rem 3rem;
    border-radius: 1.75rem;
    border: 1px solid rgba(22, 54, 30, 0.08);
    box-shadow: 0 10px 35px rgba(22, 54, 30, 0.05);
    color: rgba(22, 54, 30, 0.88);
    line-height: 1.85;
    font-size: 1.02rem;
}
.legal-main-content .entry-content h2 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.55rem;
    margin: 2.5rem 0 1rem;
    line-height: 1.3;
    scroll-margin-top: 110px;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.06);
}
.legal-main-content .entry-content h2:first-of-type {
    margin-top: 0;
}
.legal-main-content .entry-content p {
    margin-bottom: 1.45rem;
}
.legal-main-content .entry-content ul,
.legal-main-content .entry-content ol {
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
}
.legal-main-content .entry-content li {
    margin-bottom: 0.5rem;
}

/* Style Pembeda untuk Link di Halaman Legal */
.legal-page .entry-content a {
    color: #D81B80;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid rgba(216, 27, 128, 0.35);
    padding-bottom: 1px;
    transition: all 0.2s ease-in-out;
}
.legal-page .entry-content a:hover {
    color: #16361E;
    border-bottom-color: #88C425;
    background-color: rgba(234, 248, 208, 0.5);
    border-radius: 4px;
    padding-left: 4px;
    padding-right: 4px;
}
.legal-page code {
    background: #F5FAF0;
    color: #16361E;
    font-family: var(--font-mono, monospace);
    padding: 0.25rem 0.65rem;
    border-radius: 0.5rem;
    font-size: 0.88rem;
    border: 1px solid rgba(136, 196, 37, 0.35);
    font-weight: 600;
}

/* Style Pembeda untuk Button Legal */
.btn-legal-primary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #16361E;
    color: #ffffff !important;
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    font-weight: 800;
    font-size: 0.95rem;
    padding: 0.85rem 1.8rem;
    border-radius: 999px;
    text-decoration: none !important;
    border-bottom: none !important;
    box-shadow: 0 4px 15px rgba(22, 54, 30, 0.15);
    transition: all 0.2s ease;
}
.btn-legal-primary:hover {
    background: #D81B80;
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(216, 27, 128, 0.3);
}

.btn-legal-secondary {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #fafafa;
    color: #16361E !important;
    border: 1px solid rgba(22, 54, 30, 0.15);
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    font-weight: 700;
    font-size: 0.95rem;
    padding: 0.85rem 1.8rem;
    border-radius: 999px;
    text-decoration: none !important;
    border-bottom: none !important;
    transition: all 0.2s ease;
}
.btn-legal-secondary:hover {
    background: #F5FAF0;
    border-color: #88C425;
    color: #16361E !important;
    transform: translateY(-2px);
}

.legal-contact-box {
    background: #fafafa;
    border: 1px solid rgba(22, 54, 30, 0.08);
    border-radius: 1.25rem;
    padding: 1.35rem 1.5rem;
}
.legal-contact-box h4 {
    font-family: var(--font-display, sans-serif);
    font-size: 1.02rem;
    color: #16361E;
    font-weight: 800;
    margin-bottom: 0.4rem;
}
.legal-contact-box p {
    font-size: 0.86rem;
    color: rgba(22, 54, 30, 0.75);
    margin-bottom: 1.1rem;
    line-height: 1.5;
}
.btn-legal-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    background: #16361E;
    color: #ffffff !important;
    font-weight: 800;
    font-size: 0.9rem;
    padding: 0.75rem 1.25rem;
    border-radius: 999px;
    text-decoration: none !important;
    border-bottom: none !important;
    transition: all 0.2s ease;
}
.btn-legal-action:hover {
    background: #25D366;
    color: #ffffff !important;
}

.legal-bottom-bar {
    margin-top: 2.25rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .legal-main-content .entry-content {
        padding: 1.75rem 1.5rem;
    }
}
</style>

<main id="main-content" class="legal-page">

    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'DOKUMEN HUKUM & KEBIJAKAN',
        get_the_title(),
        'PT Indotech Berkah Abadi — Sleman, D.I. Yogyakarta | Terakhir Diperbarui: ' . $last_updated
    ); ?>

    <!-- ═══ LEGAL CONTENT & SIDEBAR SECTION ═══ -->
    <section class="legal-content-section" style="padding: 4.5rem 0; background: #ffffff;">
        <div class="container" style="max-width: 1240px;">
            
            <div class="legal-grid">

                <!-- STICKY TABLE OF CONTENTS SIDEBAR (DESKTOP) -->
                <aside class="legal-toc-sidebar">
                    <div class="legal-toc-card">
                        <div class="legal-toc-header">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#88C425" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                            <span>Daftar Isi Dokumen</span>
                        </div>
                        <nav id="legal-toc-nav" class="legal-toc-nav">
                            <!-- Otomatis diisi oleh JavaScript -->
                        </nav>
                    </div>

                    <!-- Legal Quick Contact Box -->
                    <div class="legal-contact-box">
                        <h4>Ada Pertanyaan Hukum/Privasi?</h4>
                        <p>Tim legal &amp; kepatuhan PT Indotech Berkah Abadi siap merespons kebutuhan informasi Anda.</p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-legal-action">
                            <span>Konsultasi WA &rarr;</span>
                        </a>
                    </div>
                </aside>

                <!-- MAIN LEGAL CONTENT COLUMN -->
                <div class="legal-main-content">
                    <div class="entry-content">
                        
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            
                            <?php if (trim(get_the_content())) : ?>
                                <?php the_content(); ?>
                            <?php elseif (strpos($slug, 'cookie') !== false) : ?>
                                
                                <h2>1. Pengertian Cookie</h2>
                                <p>Cookie adalah berkas teks kecil yang disimpan di perangkat (komputer, smartphone, atau tablet) Anda saat mengunjungi situs web resmi <strong>Orchid Care</strong> (PT Indotech Berkah Abadi). Cookie membantu kami mengenali perangkat Anda dan memori preferensi penggunaan situs.</p>

                                <h2>2. Jenis Cookie yang Kami Gunakan</h2>
                                <ul>
                                    <li><strong>Cookie Esensial:</strong> Diperlukan agar fungsi utama situs web (seperti navigasi dan preferensi tampilan) dapat berjalan dengan normal.</li>
                                    <li><strong>Cookie Performa &amp; Analitik:</strong> Membantu kami memahami bagaimana pengunjung berinteraksi dengan situs web untuk meningkatkan kualitas layanan dan kemudahan navigasi.</li>
                                    <li><strong>Cookie Fungsionalitas:</strong> Mengingat pilihan preferensi penggunaan Anda saat menjelajahi katalog dan layanan situs.</li>
                                </ul>

                                <h2>3. Pengelolaan Cookie</h2>
                                <p>Anda memiliki kendali penuh untuk menerima atau menolak cookie melalui pengaturan browser Anda (Google Chrome, Mozilla Firefox, Safari, Microsoft Edge). Namun, perlu diketahui bahwa menonaktifkan cookie esensial dapat mempengaruhi fungsionalitas dan kenyamanan akses di situs kami.</p>

                                <h2>4. Perubahan Kebijakan &amp; Kontak</h2>
                                <p>Jika Anda memiliki pertanyaan mengenai penggunaan cookie di situs web ini, silakan hubungi tim kami melalui email <code>indotechberkahabadi@gmail.com</code> atau kontak resmi PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta.</p>

                            <?php elseif (strpos($slug, 'syarat') !== false) : ?>

                                <h2>1. Ketentuan Umum</h2>
                                <p>Syarat &amp; Ketentuan ini mengatur akses dan penggunaan situs web resmi <strong>Orchid Care</strong> yang dikelola oleh <strong>PT Indotech Berkah Abadi</strong> (Sleman, D.I. Yogyakarta). Dengan mengakses atau menggunakan situs web ini, Anda menyatakan menyetujui seluruh ketentuan yang berlaku.</p>

                                <h2>2. Penggunaan Layanan &amp; Konten Situs</h2>
                                <p>Seluruh informasi, materi visual, dan katalog produk yang disajikan di situs ini disediakan untuk tujuan informasi umum dan komunikasi resmi perusahaan. Pengguna wajib menggunakan situs web ini secara sah dan tidak melanggar hukum yang berlaku di Republik Indonesia.</p>

                                <h2>3. Pemesanan &amp; Saluran Komunikasi Resmi</h2>
                                <p>Seluruh komunikasi resmi, konsultasi produk, dan pemesanan informasi dilakukan melalui saluran layanan pelanggan resmi yang terverifikasi (seperti WhatsApp resmi perusahaan dan email resmi PT Indotech Berkah Abadi).</p>

                                <h2>4. Hak Kekayaan Intelektual (HAKI)</h2>
                                <p>Logo Orchid Care, desain tampilan situs, teks, grafis, dan merek dagang adalah hak milik eksklusif PT Indotech Berkah Abadi dan dilindungi oleh Undang-Undang Hak Cipta &amp; Merek Dagang Republik Indonesia. Penggunaan tanpa izin tertulis dari perusahaan dilarang keras.</p>

                                <h2>5. Pembatasan Tanggung Jawab</h2>
                                <p>PT Indotech Berkah Abadi berusaha menjaga keakuratan seluruh informasi di situs ini. Namun, perusahaan tidak bertanggung jawab atas kerugian langsung maupun tidak langsung yang timbul dari kesalahan teknis atau penggunaan situs web di luar kendali perusahaan.</p>

                                <h2>6. Perubahan Ketentuan &amp; Hukum yang Berlaku</h2>
                                <p>Syarat &amp; Ketentuan ini dapat diperbarui sewaktu-waktu sesuai perkembangan layanan. Ketentuan ini diatur dan ditafsitkan sesuai dengan hukum yang berlaku di Republik Indonesia.</p>

                            <?php else : ?>

                                <h2>1. Komitmen Privasi</h2>
                                <p><strong>PT Indotech Berkah Abadi</strong> berkomitmen penuh untuk melindungi kerahasiaan dan keamanan data pribadi pengunjung situs web <strong>Orchid Care</strong>. Kebijakan Privasi ini menjelaskan bagaimana kami mengelola data yang Anda berikan.</p>

                                <h2>2. Pengumpulan Informasi</h2>
                                <p>Kami mengumpulkan informasi yang Anda berikan secara sukarela saat menghubungi kami via saluran kontak resmi atau WhatsApp, seperti: Nama, Nomor Telepon/WhatsApp, Alamat Email, serta rincian pertanyaan atau kebutuhan informasi Anda.</p>

                                <h2>3. Penggunaan Informasi</h2>
                                <p>Informasi yang Anda berikan digunakan secara terbatas untuk:</p>
                                <ul>
                                    <li>Merespons pertanyaan, permintaan informasi produk, atau konsultasi Anda.</li>
                                    <li>Keperluan komunikasi resmi perusahaan terkait layanan pelanggan.</li>
                                    <li>Meningkatkan kualitas dan kenyamanan navigasi di situs web kami.</li>
                                </ul>

                                <h2>4. Kerahasiaan &amp; Keamanan Data</h2>
                                <p>Kami menjaga kerahasiaan data Anda dan tidak akan membagikan, menjual, atau menyewakan informasi pribadi Anda kepada pihak ketiga mana pun tanpa izin dari Anda, kecuali diwajibkan oleh ketentuan hukum yang berlaku.</p>

                                <h2>5. Pertanyaan &amp; Kontak Privasi</h2>
                                <p>Jika Anda memiliki pertanyaan terkait privasi atau ingin memperbarui informasi Anda, silakan hubungi kami melalui email <code>indotechberkahabadi@gmail.com</code> atau alamat operasional kami di Sleman, D.I. Yogyakarta.</p>

                            <?php endif; ?>

                        <?php endwhile; endif; ?>

                    </div>

                    <!-- Bottom Buttons Bar -->
                    <div class="legal-bottom-bar">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-legal-secondary">
                            &larr; Beranda
                        </a>
                        <a href="<?php echo esc_url(home_url('/kontak')); ?>" class="btn-legal-primary">
                            Hubungi Kemitraan &rarr;
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tocNav = document.getElementById('legal-toc-nav');
    var entryContent = document.querySelector('.legal-main-content .entry-content');
    if (!tocNav || !entryContent) return;

    var headings = entryContent.querySelectorAll('h2');
    if (headings.length === 0) {
        var sidebar = document.querySelector('.legal-toc-sidebar');
        if (sidebar) sidebar.style.display = 'none';
        return;
    }

    headings.forEach(function (h2, index) {
        if (!h2.id) {
            h2.id = 'legal-sec-' + (index + 1);
        }
        var link = document.createElement('a');
        link.href = '#' + h2.id;
        link.className = 'legal-toc-link';
        link.textContent = h2.textContent.replace(/^[0-9]+\.\s*/, '');

        link.addEventListener('click', function (e) {
            e.preventDefault();
            var targetEl = document.getElementById(h2.id);
            if (targetEl) {
                var headerOffset = 110;
                var elementPosition = targetEl.getBoundingClientRect().top;
                var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });

        tocNav.appendChild(link);
    });

    // Active link highlight on scroll
    var tocLinks = tocNav.querySelectorAll('.legal-toc-link');
    var onScroll = function () {
        var fromTop = window.scrollY + 130;
        headings.forEach(function (h2, index) {
            var top = h2.offsetTop;
            var height = h2.offsetHeight;
            if (top <= fromTop) {
                tocLinks.forEach(function (l) { l.classList.remove('is-active'); });
                if (tocLinks[index]) tocLinks[index].classList.add('is-active');
            }
        });
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
});
</script>

<?php get_footer(); ?>
n>

<?php get_footer(); ?>
