# OrchidCare Website

## Overview

OrchidCare Website adalah implementasi WordPress kustom yang dirancang sebagai profil perusahaan (*company profile*) modern dan penampil katalog produk (*product showcase*) resmi untuk **Orchid Care**, lini merek utama dari **PT Indotech Berkah Abadi** (Sleman, Yogyakarta).

Proyek ini dibangun menggunakan tema kustom (*custom theme*) untuk performa optimal, kode yang bersih, kemudahan pemeliharaan, serta konsistensi identitas merek yang kuat.

Meskipun saat ini diimplementasikan khusus untuk **OrchidCare**, arsitektur tema ini dirancang agar dapat digunakan kembali (*reusable*) untuk lini produk atau sub-brand ekosistem perusahaan di masa depan.

---

# Profil Perusahaan & Ekosistem Bisnis

**PT Indotech Berkah Abadi** beroperasi melalui ekosistem komprehensif dari hulu ke hilir dengan tiga pilar utama:

1. **Penjualan Produk (Retail & Grosir):** **Orchid Care** mengambil peran sentral sebagai lini produk kimia utama yang dipasarkan.
2. **Penjualan Kemitraan (B2B & Keagenan):** Peluang distribusi komersial, agen, *reseller*, dan rantai pasok untuk *laundry* profesional, perhotelan, restoran, dan rumah sakit.
3. **Riset & Formulasi Kimia:** Pengembangan formulasi bahan kimia kebersihan berstandar PKRT melalui divisi *Cleanique Lab*.

---

# Kategori Produk Utama

Orchid Care memproduksi 4 kategori utama produk kimia berkualitas tinggi untuk Perbekalan Kesehatan Rumah Tangga (PKRT), industri *laundry*, dan perawatan otomotif:

1. **Perawatan Laundry (Laundry Care):**
   - Deterjen cair (termasuk grade super lemon)
   - Penghilang noda spesifik (noda darah, noda lemak/minyak)
   - Produk pendukung: Pelembut (*softener*), pelicin setrika, alkali pembuka serat kain, dan parfum *laundry*.
2. **Kebutuhan Rumah Tangga (Home Care):**
   - Pembersih lantai (aroma lemon dengan cairan oranye transparan yang khas)
   - Sabun cuci piring konsentrat
   - Sanitasi ruangan & tangan (sabun cuci tangan anti-bakteri, pewangi ruangan).
3. **Perawatan Otomotif (Auto Care):**
   - Sampo mobil, pembersih kaca, semir ban, dan poles bodi kendaraan.
4. **Bahan Konsentrat (Biang Ekstrak):**
   - Inovasi efisiensi logistik (*DeterMat*, *O'Clean*, *Arai*).
   - Sistem peracikan mandiri: **1 kg biang konsentrat** diracik menjadi **hingga 15 liter produk jadi**, menekan biaya ongkos kirim secara drastis untuk mitra luar daerah.

---

# 🚀 Petunjuk Setup & Pembuatan Laman WordPress (WP Admin Setup Guide)

Berikut adalah panduan langkah demi langkah untuk mengkonfigurasi situs WordPress **Orchid Care (PT Indotech Berkah Abadi)** dari awal:

## 📄 1. Daftar Laman (Pages) yang Wajib Dibuat

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

## ⚙️ 2. Konfigurasi Pengaturan WordPress (Settings)

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

# Tujuan Proyek (Project Goals)

- Menampilkan merek Orchid Care & PT Indotech Berkah Abadi secara profesional.
- Menyajikan katalog produk lengkap berdasarkan 4 kategori utama dan kemasan (Retail, Jerigen, Biang Konsentrat).
- Menyediakan edukasi dan artikel ramah SEO (*SEO-friendly blog*).
- Memfasilitasi generasi *leads* (WhatsApp CTA & Form Kemitraan B2B/Agen).
- Memberikan performa pemuatan cepat (Lighthouse Target >= 90).
- Mempertahankan konsistensi visual dan aksesibilitas tinggi.

Situs ini **bukan** e-commerce transaksional langsung (*non checkout/cart*), melainkan media *branding* dan *lead generation*.

---

# Struktur Folder Tema

```text
wp-content/themes/orchidcare_custom/
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
├── template-parts/
│   ├── home/
│   ├── product/
│   └── footer/
├── inc/
│   ├── customizer.php
│   ├── cpt-product.php
│   ├── cpt-faq.php
│   └── helpers.php
├── archive-product.php
├── single-product.php
├── front-page.php
├── page-about.php
├── page-contact.php
├── page-faq.php
├── page-legal.php
├── single.php
├── archive.php
├── functions.php
└── style.css
```
