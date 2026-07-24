# Orchid Care

**By PT Indotech Berkah Abadi**

Orchid Care adalah lini merek (brand) utama dari PT Indotech Berkah Abadi yang berfokus pada produksi, distribusi, dan penjualan produk kimia berkualitas tinggi untuk Perbekalan Kesehatan Rumah Tangga (PKRT), industri _laundry_, dan perawatan otomotif.

Berbasis di Sleman, Yogyakarta, Orchid Care dirancang untuk memberikan solusi kebersihan yang efisien dan ekonomis, melayani spektrum pasar yang luas mulai dari kebutuhan rumah tangga harian hingga skala bisnis komersial (B2B) seperti _laundry_ profesional, jaringan perhotelan, restoran, dan rumah sakit.

---

## 🏢 Ekosistem Bisnis PT Indotech Berkah Abadi

PT Indotech Berkah Abadi beroperasi melalui beberapa divisi dan _brand_ (seperti Cleanique Lab, Cleanique Mart, Depo Cleanique, dan Malabeez) untuk menghadirkan solusi yang komprehensif dari hulu ke hilir. Layanan perusahaan terbagi menjadi tiga pilar utama:

1. **Penjualan Produk (Retail & Grosir):** Di sinilah **Orchid Care** mengambil peran sentral sebagai wajah produk kimia perusahaan yang dilepas ke pasaran.
2. **Penjualan Kemitraan (B2B & Keagenan):** Membuka peluang distribusi komersial, agen, dan _reseller_ di berbagai wilayah.
3. **Riset & Formulasi Kimia:** Riset berkesinambungan formulasi PKRT dan industri melalui divisi *Cleanique Lab*.

---

## 📦 Kategori Produk Orchid Care

Orchid Care memproduksi berbagai varian produk yang diformulasikan untuk efisiensi maksimal. Portofolio produk kami terbagi dalam beberapa kategori utama:

### 1. Perawatan Laundry (Laundry Care)

Rangkaian bahan kimia khusus untuk menjaga kualitas kain dan efisiensi operasional bisnis _laundry_.

- **Deterjen Cair:** Tersedia dalam berbagai tingkatan, termasuk _grade_ super lemon yang efektif mengangkat kotoran berat.
- **Penghilang Noda Spesifik:** Solusi formulasi khusus untuk noda membandel seperti noda darah atau noda lemak/minyak.
- **Produk Pendukung:** Pelembut pakaian (_softener_), pelicin setrika untuk hasil presisi, alkali pembuka serat kain, dan parfum _laundry_ dengan ketahanan aroma ekstra.

### 2. Kebutuhan Rumah Tangga (Home Care)

Produk kebersihan harian dengan standar sanitasi tinggi untuk rumah dan ruang komersial.

- **Pembersih Lantai:** Diformulasikan secara khusus untuk mengangkat kotoran sekaligus memberikan aroma segar, seperti varian aroma lemon dengan visibilitas cairan berwarna oranye transparan yang khas.
- **Sabun Cuci Piring Konsentrat:** Efektif meluruhkan lemak dengan penggunaan cairan yang lebih hemat.
- **Sanitasi Ruangan & Tangan:** Sabun cuci tangan anti-bakteri dan pewangi ruangan.

### 3. Perawatan Otomotif (Auto Care)

Produk kimia perawatan kendaraan yang aman untuk permukaan eksterior dan interior, mulai dari sampo mobil, pembersih kaca, hingga cairan semir ban dan poles bodi kendaraan.

### 4. Bahan Konsentrat (Biang Ekstrak)

Inovasi logistik dari Orchid Care untuk menekan biaya pengiriman (_shipping cost_) secara drastis bagi mitra di luar daerah.

- **Paket Ekonomis:** Meliputi varian _DeterMat_, _O'Clean_, dan _Arai_.
- **Sistem Peracikan Mandiri:** 1 kilogram bahan konsentrat (biang) ini dirancang agar dapat diracik dengan mudah oleh mitra menjadi hingga 15 liter produk jadi yang siap pakai.

---

## 🚀 Petunjuk Setup & Pembuatan Laman WordPress (WP Admin Setup Guide)

Berikut adalah panduan langkah demi langkah untuk mengkonfigurasi situs WordPress **Orchid Care (PT Indotech Berkah Abadi)** dari awal:

### 📄 1. Daftar Laman (Pages) yang Wajib Dibuat

Masuk ke **WP Admin → Pages → Add New (Tambah Baru)** dan buat laman-laman berikut:

| No | Judul Laman | Slug / URL | Template Laman (Page Attributes) | Keterangan / Fungsi |
|---|---|---|---|---|
| 1 | **Beranda** | `home` | *Default Template* | Laman Utama (Otomatis memuat `front-page.php`) |
| 2 | **Katalog Produk** | `produk` | *Default Template* | Laman Katalog & Filter 4 Kategori Produk |
| 3 | **Tentang Kami** | `tentang-kami` | **Tentang Kami (`page-about.php`)** | Profil PT Indotech Berkah Abadi & Ekosistem |
| 4 | **Kontak & Kemitraan** | `kontak` | **Kontak & Kemitraan (`page-contact.php`)** | Informasi CS WhatsApp, Maps, & Form Agen/B2B |
| 5 | **Pertanyaan Umum (FAQ)** | `faq` | **FAQ / Pertanyaan Umum (`page-faq.php`)** | Laman FAQ Interaktif Accordion |
| 6 | **Artikel & Edukasi** | `blog` | *Default Template* | Laman Arsip Berita / Blog Edukasi (`archive.php`) |
| 7 | **Kebijakan Privasi** | `kebijakan-privasi` | **Halaman Legal / Kebijakan (`page-legal.php`)** | Kebijakan Privasi Perusahaan |
| 8 | **Syarat & Ketentuan** | `syarat-dan-ketentuan` | **Halaman Legal / Kebijakan (`page-legal.php`)** | Syarat & Ketentuan Kemitraan/Penggunaan |
| 9 | **Kebijakan Cookie** | `kebijakan-cookie` | **Halaman Legal / Kebijakan (`page-legal.php`)** | Kebijakan Penggunaan Cookie |

---

### ⚙️ 2. Konfigurasi Pengaturan WordPress (Settings)

1. **Pengaturan Membaca (Reading Settings)**:
   - Buka **Settings → Reading**.
   - Pilih **A static page (select below)**.
   - Set **Front page**: `Beranda`.
   - Set **Posts page**: `Artikel & Edukasi`.
   - Simpan Perubahan (*Save Changes*).

2. **Pengaturan Struktur URL (Permalinks Settings)**:
   - Buka **Settings → Permalinks**.
   - Pilih opsi **Post name** (`/%postname%/`).
   - Simpan Perubahan (*Save Changes*).

3. **Pengaturan Navigasi Menu (Menus)**:
   - Buka **Appearance → Menus**.
   - Buat Menu Utama (**Primary Navigation**):
     - Beranda (`/`)
     - Katalog Produk (`/produk`)
     - Tentang Kami (`/tentang-kami`)
     - Kontak & Kemitraan (`/kontak`)
     - FAQ (`/faq`)
     - Artikel & Edukasi (`/blog`)
   - Centang opsi lokasi menu: **Primary Navigation**.

4. **Kustomisasi Profil PT Indotech (WordPress Customizer)**:
   - Buka **Appearance → Customize → Identitas & Kontak Perusahaan**.
   - Isi Email Resmi: `indotechberkahabadi@gmail.com`
   - Isi Alamat Operasional: `Jongke Tengah No. 30, Sendangadi, Kec. Mlati, Sleman, D.I. Yogyakarta 55285`
   - Isi Saluran WhatsApp CS:
     - CS Konsultasi Produk: `+62 822-1584-0088`
     - CS Keagenan & B2B: `+62 878-8559-0088`
     - CS Retail Produk: `+62 855-5947-4797`

---

## 🤝 Mengapa Memilih Orchid Care?

- **Efisiensi Logistik:** Fokus pada produk biang (konsentrat) memecahkan masalah biaya ongkos kirim cairan yang mahal.
- **Skalabilitas:** Produk tersedia dalam ukuran eceran (retail) hingga jerigen besar untuk kebutuhan industri.
- **Dukungan Penuh:** Terintegrasi langsung dengan ekosistem PT Indotech Berkah Abadi, setiap mitra Orchid Care mendapatkan akses ke bimbingan kemitraan bisnis jangka panjang.
