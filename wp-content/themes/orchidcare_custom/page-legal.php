<?php
/**
 * Template Name: Legal Page (Kebijakan & Ketentuan)
 * Template Path: page-legal.php
 */

get_header();

$slug = get_post_field('post_name', get_the_ID());
$last_updated = get_the_modified_date('d F Y') ?: '24 Juli 2026';
?>

<main id="main-content" class="legal-page">

    <!-- ═══ UNIFORM PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'DOKUMEN HUKUM & KEBIJAKAN',
        get_the_title(),
        'PT Indotech Berkah Abadi — Sleman, D.I. Yogyakarta | Terakhir Diperbarui: ' . $last_updated
    ); ?>

    <!-- ═══ LEGAL CONTENT ═══ -->
    <section class="legal-content-section" style="padding: 3.5rem 0;">
        <div class="container" style="max-width: 900px;">
            <div class="entry-content" style="background: #fff; padding: 2.5rem; border-radius: 1.25rem; border: 1px solid rgba(0,0,0,0.08); box-shadow: 0 5px 20px rgba(0,0,0,0.02); color: #333; line-height: 1.8; font-size: 1rem;">
                
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
                        <p>Syarat &amp; Ketentuan ini dapat diperbarui sewaktu-waktu sesuai perkembangan layanan. Ketentuan ini diatur dan ditafsirkan sesuai dengan hukum yang berlaku di Republik Indonesia.</p>

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
        </div>
    </section>

</main>

<?php get_footer(); ?>
