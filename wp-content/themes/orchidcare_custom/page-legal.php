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
                            <li><strong>Cookie Fungsi Kemitraan:</strong> Mengingat pilihan saluran WhatsApp CS atau produk yang Anda lihat sebelumnya.</li>
                        </ul>

                        <h2>3. Pengelolaan Cookie</h2>
                        <p>Anda memiliki kendali penuh untuk menerima atau menolak cookie melalui pengaturan browser Anda (Google Chrome, Mozilla Firefox, Safari, Microsoft Edge). Namun, perlu diketahui bahwa menonaktifkan cookie esensial dapat mempengaruhi fungsionalitas dan kenyamanan akses di situs kami.</p>

                        <h2>4. Hubungi Kami</h2>
                        <p>Jika Anda memiliki pertanyaan mengenai penggunaan cookie di situs web ini, silakan hubungi tim kami di <code>indotechberkahabadi@gmail.com</code> atau CS WhatsApp PT Indotech Berkah Abadi di Sleman, D.I. Yogyakarta.</p>

                    <?php elseif (strpos($slug, 'syarat') !== false) : ?>

                        <h2>1. Ketentuan Umum</h2>
                        <p>Syarat &amp; Ketentuan ini mengatur penggunaan layanan dan pembelian produk kimia dari <strong>Orchid Care</strong>, lini merek resmi <strong>PT Indotech Berkah Abadi</strong> (Sleman, D.I. Yogyakarta). Dengan melakukan pemesanan produk retail, grosir, atau mengajukan kemitraan B2B &amp; keagenan, Anda menyetujui ketentuan di bawah ini.</p>

                        <h2>2. Spesifikasi Produk &amp; Biang Konsentrat</h2>
                        <p>Orchid Care memproduksi produk kimia siap pakai dan biang konsentrat (ekstrak 1 kg meracik hingga 15 Liter cairan jadi). Mitra dan pembeli wajib membaca dan mematuhi takaran air serta instruksi peracikan resmi yang kami sediakan untuk memastikan standar kualitas produk tetap optimal.</p>

                        <h2>3. Pemesanan, Pembayaran &amp; Pengiriman</h2>
                        <ul>
                            <li>Pemesanan resmi dilakukan melalui saluran CS WhatsApp terverifikasi atau agen resmi PT Indotech Berkah Abadi.</li>
                            <li>Pembayaran harus dilakukan sesuai tagihan invoice resmi yang diterbitkan oleh perusahaan.</li>
                            <li>Pengiriman bahan cair dan biang konsentrat menggunakan jasa ekspedisi terpercaya dengan pengemasan aman berstandar industri.</li>
                        </ul>

                        <h2>4. Kemitraan B2B &amp; Keagenan</h2>
                        <p>Setiap agen, reseller, dan mitra distribusi terikat pada kesepakatan harga eceran tertinggi/terendah yang ditetapkan untuk menjaga ekosistem persaingan sehat antar mitra wilayah.</p>

                        <h2>5. Hak Cipta &amp; Merek Dagang</h2>
                        <p>Logo Orchid Care, desain kemasan, merek biang konsentrat (DeterMat, O'Clean, Arai), serta konten materi pemasaran adalah hak milik eksklusif PT Indotech Berkah Abadi dan dilindungi oleh Undang-Undang Hak Cipta &amp; Merek Republik Indonesia.</p>

                    <?php else : ?>

                        <h2>1. Komitmen Privasi</h2>
                        <p><strong>PT Indotech Berkah Abadi</strong> berkomitmen penuh untuk melindungi kerahasiaan dan keamanan data pribadi pengguna situs web <strong>Orchid Care</strong>. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan menjaga data Anda.</p>

                        <h2>2. Data yang Kami Kumpulkan</h2>
                        <p>Kami mengumpulkan informasi yang Anda berikan secara sukarela saat menghubungi kami via WhatsApp atau formulir kontak, seperti: Nama, Nomor Telepon/WhatsApp, Alamat Email, Alamat Pengiriman, serta rincian kebutuhan produk atau peluang keagenan Anda.</p>

                        <h2>3. Penggunaan Informasi</h2>
                        <p>Data pribadi Anda hanya digunakan untuk:</p>
                        <ul>
                            <li>Memproses pesanan produk dan konsultasi teknis peracikan biang.</li>
                            <li>Menghubungi Anda terkait peluang kemitraan B2B, keagenan, atau penawaran khusus.</li>
                            <li>Meningkatkan kualitas produk kimia dan layanan purna jual dari Orchid Care.</li>
                        </ul>

                        <h2>4. Keamanan &amp; Kerahasiaan Data</h2>
                        <p>Kami tidak akan pernah menjual, menyewakan, atau membagikan informasi pribadi Anda kepada pihak ketiga mana pun tanpa persetujuan Anda, kecuali diwajibkan oleh ketentuan hukum Republik Indonesia yang berlaku.</p>

                        <h2>5. Pertanyaan &amp; Kontak Privasi</h2>
                        <p>Jika Anda ingin memperbarui atau menghapus data pribadi Anda dari sistem kami, silakan hubungi tim kami melalui email <code>indotechberkahabadi@gmail.com</code> atau kantor operasional kami di Sleman, D.I. Yogyakarta.</p>

                    <?php endif; ?>

                <?php endwhile; endif; ?>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
