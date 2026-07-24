# Product Requirements Document (PRD)

# OrchidCare Website (Company Profile & Product Showcase)

Version: 1.1  
Status: Approved Draft  
Last Updated: 2026-07-24  
Parent Entity: PT Indotech Berkah Abadi (Sleman, Yogyakarta)  

---

# 1. Product Overview

OrchidCare Website merupakan situs *company profile* dan *product showcase* modern yang dibangun menggunakan *custom WordPress theme* dan *custom plugin/CPT* yang disesuaikan dengan identitas brand **Orchid Care**, lini produk kimia utama dari **PT Indotech Berkah Abadi**.

Website ini berfungsi sebagai:
- Media *branding* resmi perusahaan.
- Katalog produk interaktif untuk 4 kategori utama (Laundry Care, Home Care, Auto Care, & Biang Ekstrak Konsentrat).
- Media edukasi pasar melalui artikel (blog) & pelatihan vokasi.
- Saluran generasi *leads* B2B (Kemitraan, Agen, Reseller, Industri) dan Retail.

Website ini **tidak** berfokus sebagai platform e-commerce transaksional (*no cart/checkout*), melainkan mengarahkan prospek langsung ke saluran komunikasi WhatsApp & Form Kemitraan.

---

# 2. Objectives

## Business Goals

- Perkuatan *branding* Orchid Care sebagai produsen kimia berkualitas tinggi di Sleman, Yogyakarta.
- Menampilkan ekosistem 3 pilar PT Indotech Berkah Abadi:
  1. Jasa Pelatihan (Vokasi bisnis laundry & formulasi).
  2. Penjualan Kemitraan (B2B, Agen, Reseller, Hotel, Resto, RS).
  3. Penjualan Produk Retail & Grosir.
- Menonjolkan inovasi produk **Bahan Konsentrat (Biang Ekstrak)** yang mampu menekan biaya ongkos kirim (1kg biang diracik menjadi 15L produk jadi).
- Generasi *leads* aktif melalui tombol WhatsApp Direct Order dan Form Kemitraan.
- Mendukung strategi SEO melalui penerbitan artikel berkala.

---

## Product Goals

- Kecepatan pemuatan tinggi (Target Lighthouse Performance ≥ 90).
- Pengelolaan konten produk & artikel yang mudah via WordPress Admin Dashboard.
- Konsistensi visual visual premium (Modern, Clean, Elegant, Mobile-first).
- Arsitektur tema modular yang mudah dikembangkan untuk sub-brand ekosistem perusahaan.

---

# 3. Target Users

## 1. Visitor B2B & Calon Mitra (B2B / Keagenan)
- Pengusaha *laundry* profesional, manajer pengadaan perhotelan, restoran, rumah sakit, serta calon agen/reseller luar daerah.
- **Kebutuhan:** Informasi produk grosir/jerigen, kalkulasi efisiensi biang konsentrat, informasi kemitraan B2B & pelatihan vokasi, serta kontak WhatsApp cepat.

## 2. Visitor Consumer / Household (Retail)
- Pengguna rumah tangga harian yang mencari produk pembersih berkualitas & hemat.
- **Kebutuhan:** Katalog produk eceran (laundry care, home care, auto care), keunggulan produk, dan petunjuk penggunaan.

## 3. Administrator (Internal Team)
- Tim marketing & pengelola konten PT Indotech Berkah Abadi.
- **Kebutuhan:** Kemudahan menambah/mengedit produk, mengunggah galeri foto, menulis artikel blog, serta memperbarui informasi profil perusahaan.

---

# 4. Scope

## Included (Dalam Scope)

- Company Profile (Tentang PT Indotech Berkah Abadi & 3 Pilar Bisnis).
- Product Catalog (Filter 4 kategori utama & tipe kemasan).
- Product Detail (Termasuk atribut spesifik biang konsentrat 1kg->15L).
- Lead Generation Integration (WhatsApp Direct Link & Form Kemitraan).
- Blog / Article System (Kategori, tag, & pencarian).
- Contact Page (Peta lokasi Sleman, form pesan, kontak operasional).
- FAQ Page (Sistem tanya jawab terstruktur).
- Legal Pages (Privacy Policy, Terms, Disclaimer, Cookie Policy).
- SEO & Performance Optimization.

---

## Excluded (Di Luar Scope)

- Shopping Cart / Keranjang Belanja.
- Payment Gateway Integration.
- User Login / Customer Dashboard / Member Area.
- Sistem Inventaris / Stok Real-time Sync.
- Transaksi Langsung di Website.

---

# 5. Information Architecture

Struktur halaman publik:

```text
├── Home
├── Products (Catalog Archive)
│   └── Product Detail (Single Product)
├── Blog (Article Archive)
│   └── Blog Detail (Single Article)
├── About Us (Profil Perusahaan & 3 Pilar)
├── Contact & Kemitraan
├── FAQ
└── Legal Pages
    ├── Privacy Policy
    ├── Terms & Conditions
    ├── Disclaimer
    └── Cookie Policy
```

---

# 6. Functional Requirements

## FR-001 Homepage
Homepage terdiri dari section:
1. **Hero Section:** Headline visual brand, penawaran utama, & CTA Kemitraan/Katalog.
2. **Company Ecosystem Intro:** Pengenalan PT Indotech Berkah Abadi & 3 pilar bisnis (Pelatihan, Kemitraan, Produk).
3. **Featured Products:** Highlight produk unggulan dari 4 kategori (Laundry Care, Home Care, Auto Care, Biang Ekstrak).
4. **Why Choose Us:** Highlight keunggulan efisiensi logistik (Biang 1kg->15L), jangkauan jerigen/retail, & pendampingan bisnis.
5. **Featured Articles:** 3 artikel blog terbaru.
6. **CTA Lead Banner:** Banner ajakan menjadi agen/mitra atau pemesanan grosir via WhatsApp.
7. **Footer:** Navigasi, alamat Sleman Yogyakarta, & tautan media sosial.

---

## FR-002 Product Listing (Katalog Produk)
- Menampilkan seluruh produk dengan visual *grid/card*.
- **Kategori Filter (4 Taksonomi Utama):**
  - Perawatan Laundry (Laundry Care)
  - Kebutuhan Rumah Tangga (Home Care)
  - Perawatan Otomotif (Auto Care)
  - Bahan Konsentrat (Biang Ekstrak)
- **Kemasan Filter:** Retail, Jerigen Industri, Biang 1kg.
- Fitur pencarian produk berdasarkan nama/kata kunci.
- *Pagination* interaktif.

---

## FR-003 Product Detail
Setiap produk memiliki halaman detail khusus dengan field minimal:
- Nama Produk & Slug
- Galeri Foto & Thumbnail
- Kategori & Tipe Kemasan
- Ringkasan Singkat & Deskripsi Lengkap
- Manfaat Produk (*Key Benefits*)
- Petunjuk Penggunaan (*Usage Instructions*)
- **Spesifikasi Khusus Biang Konsentrat:** Status Biang (Yes/No), Rasio Racik (*Mixing Ratio* e.g., 1kg -> 15 Litres), Hasil Racikan.
- Spesifikasi Teknis (Kemasan, Warna, Aroma, Izin/Standard).
- Produk Terkait (*Related Products*).
- **CTA WhatsApp Order Button** (Otomatis mengisi pesan format order produk).

---

## FR-004 Blog & Article Engine
- Halaman arsip artikel dengan pencarian, kategori, dan pagination.
- Halaman detail artikel yang difokuskan pada SEO (*heading structure*, *table of contents*, *author*, *publish date*, *share buttons*, & *related articles*).

---

## FR-005 About Us Page
- Sejarah & Visi Misi PT Indotech Berkah Abadi.
- Penjelasan rincian 3 Pilar Bisnis (Vokasi/Pelatihan, Kemitraan B2B, Produk Orchid Care).
- Fasilitas produksi & operasional di Sleman, Yogyakarta.

---

## FR-006 Contact & Kemitraan Page
- Alamat operasional lengkap (Sleman, Yogyakarta).
- Peta interaktif Google Maps.
- Kontak Telepon, Email, & WhatsApp Fast Response.
- Form Pengajuan Kemitraan / Pertanyaan Umum.

---

# 7. Content Model

## Product Custom Post Type (`product`)
- **Title**: Nama Produk
- **Slug**: Permalink URL
- **Featured Image**: Foto Utama Produk
- **Gallery**: Array Foto Tambahan
- **Category**: Taxonomy (`product_cat`): Laundry Care, Home Care, Auto Care, Biang Ekstrak.
- **Short Description**: Ringkasan Produk
- **Full Description**: Penjelasan Formulasi & Keunggulan
- **Benefits**: Daftar Manfaat (Repeater/Array)
- **Usage Instructions**: Cara Pakai / Racik
- **Is Concentrate**: Boolean (Ya / Tidak)
- **Mixing Ratio**: Text (Contoh: "1 kg Biang = 15 Liter Produk Jadi")
- **Packaging Options**: Multi-select (Retail, Jerigen 5L, Jerigen 20L, Biang 1kg)
- **Grade / Variant Spec**: Text (Contoh: Super Lemon, Oranye Transparan)
- **WhatsApp Order Text**: Custom message text for direct order link

---

## Company Settings (Global Theme Options)
- **Company Name**: PT Indotech Berkah Abadi
- **Brand Name**: Orchid Care
- **Address**: Sleman, Yogyakarta, Indonesia
- **Primary Phone / WA**: Nomor WhatsApp CS/Marketing
- **Email Address**: Email resmi perusahaan
- **Google Maps Embed Code / Link**
- **Social Media Links**: Instagram, Facebook, TikTok, YouTube

---

# 8. Non-Functional Requirements

## SEO Requirements
- Meta title, meta description, Open Graph, & Twitter Card pada setiap halaman.
- Clean permalink structure (`/produk/nama-produk`, `/blog/judul-artikel`).
- LocalBusiness Schema (PT Indotech Berkah Abadi) & Product Schema pada single product.
- XML Sitemap & Robots.txt compatibility.

---

## Performance Target
- Google Lighthouse Performance: ≥ 90
- Accessibility: ≥ 90
- Best Practices: ≥ 90
- SEO Score: ≥ 95
- Waktu muat awal (*First Contentful Paint*): < 1.5 detik.

---

## Security & Coding Standards
- Mengikuti **WordPress Coding Standards** (PHP, CSS, JS).
- Sanitasi seluruh input data dan *escaping* pada seluruh keluaran HTML.
- Proteksi Nonce pada form kontak & AJAX request.
- Bebas dari error / warning PHP 8.x dan JavaScript console log clean.

---

# 9. Success Criteria

Proyek dinyatakan rampung apabila:
1. Seluruh 4 kategori produk Orchid Care terstruktur rapi pada CPT Product dengan atribut Biang Konsentrat yang presisi.
2. Identitas PT Indotech Berkah Abadi dan 3 pilar bisnis tersaji utuh di halaman About dan Home.
3. Tombol WhatsApp Lead Generation berfungsi lancar dari katalog & detail produk.
4. Performa memenuhi target Lighthouse (Performance ≥ 90, SEO ≥ 95).
5. Kode tema `orchidcare_custom` bersih, responsif, dan siap dideploy ke server produksi.
