# TODO & Sprint Backlog

Project: OrchidCare Website (PT Indotech Berkah Abadi)  
Execution Model: Agile Sprints  

Status Legend:
- [ ] Not Started
- [/] In Progress
- [x] Completed

---

# 🚀 Overview Sprint Plan

- **Sprint 1 — Core Environment & Theme Foundation** (Setup tema, arsitektur file, design system, layout header/footer)
- **Sprint 2 — Global Site Settings & Brand Engine** (Dynamic theme options PT Indotech Berkah Abadi, alamat Sleman, kontak WA, media sosial)
- **Sprint 3 — Custom Post Type Product & Catalog Engine** (CPT Product, 4 Kategori, atribut Biang 1kg->15L, archive-product.php, single-product.php)
- **Sprint 4 — Blog Engine & Company Profile Pages** (Blog archive & single, Page About 3 Pilar, Page Contact, FAQ, Legal Pages)
- **Sprint 5 — UI Components, Forms & Lead Generation** (Form Kontak, WhatsApp Lead CTA, Biang Mix Calculator widget, Mobile Navigation)
- **Sprint 6 — Performance, SEO, Security & Launch QA** (Optimasi Lighthouse ≥ 90, Schema Markup, Escaping/Sanitization audit, QA Final)

---

# 🏃 Sprint 1 — Core Environment & Theme Foundation

## 1.1 Development Environment & Theme Setup
- [x] Verifikasi instalasi lingkungan WordPress lokal
- [x] Inisialisasi struktur tema kustom `orchidcare_custom` (`functions.php`, `style.css`, `index.php`)
- [x] Konfigurasi `theme.json` dan pendaftaran *theme support* (title-tag, post-thumbnails, HTML5 features)
- [x] Setup struktur folder aset (`assets/css/`, `assets/js/`, `assets/images/`, `template-parts/`, `inc/`)

## 1.2 Design System & Assets Loader
- [x] Buat CSS Design Tokens (`assets/css/variables.css`): Warna brand Orchid Care, tipografi, breakpoint responsif, spacing
- [x] Buat stylesheet komponen dasar (`assets/css/main.css`): Tombol, badge, kontainer, kartu, bentuk form
- [x] Buat script dasar (`assets/js/main.js`): Mobile navigation toggle, smooth scroll
- [x] Daftarkan pemuatan enqueue CSS & JS di `functions.php` dengan penanganan *versioning* yang bersih

## 1.3 Layout Header & Footer
- [x] Implementasi `header.php`: Topbar kontak, logo brand, navigasi utama desktop & tombol toggle mobile
- [x] Implementasi `footer.php`: Identitas PT Indotech Berkah Abadi Sleman, tautan cepat, kategori produk, copyright & sosial media


---

# 🏃 Sprint 2 — Global Site Settings & Brand Engine

## 2.1 Customizer / Theme Options (`inc/customizer.php`)
- [x] Daftarkan Section Identitas Perusahaan (Nama: PT Indotech Berkah Abadi, Brand: Orchid Care, Kota: Sleman Yogyakarta)
- [x] Daftarkan Section Kontak (Nomor WhatsApp CS, Telepon, Email, Alamat Lengkap, Link Google Maps)
- [x] Daftarkan Section Media Sosial (Instagram, Facebook, TikTok, YouTube)
- [x] Daftarkan Section Header & Footer Settings (Logo upload, favicon, teks copyright)

## 2.2 Helper & Dynamic Functions (`inc/helpers.php`)
- [x] Buat fungsi pembantu pemanggilan data Customizer (`orchid_opt()`)
- [x] Buat fungsi pembantu penanganan tautan WhatsApp Direct Order otomatis dengan pesan kustom
- [x] Buat fungsi pembantu breadcrumbs dinamis untuk navigasi halaman


---

# 🏃 Sprint 3 — Custom Post Type Product & Catalog Engine

## 3.1 Product CPT & Taxonomy (`inc/cpt-product.php`)
- [x] Daftarkan Custom Post Type `product` (Judul, Editor, Thumbnail, Excerpt)
- [x] Daftarkan Taksonomi Kategori Produk (`product_cat`):
  - [x] Perawatan Laundry (Laundry Care)
  - [x] Kebutuhan Rumah Tangga (Home Care)
  - [x] Perawatan Otomotif (Auto Care)
  - [x] Bahan Konsentrat (Biang Ekstrak)
- [x] Daftarkan Custom Meta Fields untuk Produk:
  - [x] `is_concentrate` (Boolean: Ya / Tidak)
  - [x] `mixing_ratio` (Teks: contoh "1 kg Biang -> 15 Liter Produk Jadi")
  - [x] `packaging_options` (Retail, Jerigen 5L/20L, Biang 1kg)
  - [x] `variant_spec` (Warna, Aroma, Grade)
  - [x] `product_benefits` (Daftar Manfaat)
  - [x] `usage_instructions` (Petunjuk Penggunaan / Racik)
  - [x] `product_gallery` (Galeri foto tambahan)

## 3.2 Product Catalog Page (`archive-product.php`)
- [x] Buat tata letak grid katalog produk yang responsif
- [x] Buat bilah filter kategori interaktif (Laundry, Home Care, Auto Care, Biang Ekstrak)
- [x] Buat filter berdasarkan Tipe Kemasan (Retail, Jerigen, Biang)
- [x] Buat form pencarian produk bawaan WordPress
- [x] Terapkan pagination yang bersih dan rapi

## 3.3 Single Product Page (`single-product.php`)
- [x] Buat galeri foto produk dengan thumbnail interaktif
- [x] Tampilkan informasi produk: Nama, Kategori, Tipe Kemasan, Ringkasan
- [x] Buat *highlight box* khusus untuk Produk Biang Konsentrat (Menampilkan Rasio Racik 1kg->15L)
- [x] Tampilkan tab/accordion: Deskripsi Lengkap, Manfaat, Cara Penggunaan / Peracikan, Spesifikasi Teknis
- [x] Buat Tombol **WhatsApp Order / Inquiry** dengan pesan terformat otomatis
- [x] Tampilkan komponen Produk Terkait (*Related Products*)


---

# 🏃 Sprint 4 — Blog Engine & Company Profile Pages

## 4.1 Blog & Articles (`archive.php` & `single.php`)
- [x] Konfigurasi tampilan arsip blog (`archive.php`) dengan layout kartu artikel modern
- [x] Konfigurasi halaman detail artikel (`single.php`) dengan struktur SEO heading (H1, H2, H3)
- [x] Tambahkan meta artikel: Tanggal terbit, kategori, penulis, estimasi waktu baca
- [x] Tambahkan tombol *Share Social Media* & artikel terkait (*Related Posts*)

## 4.2 Company Profile Page — About Us (`page-about.php`)
- [x] Buat Hero section pengenalan PT Indotech Berkah Abadi
- [x] Tampilkan sejarah & komitmen kualitas di Sleman, Yogyakarta
- [x] Buat visualisasi **3 Pilar Ekosistem Bisnis**:
  1. Penjualan Jasa Pelatihan (Vokasi bisnis laundry & formulasi)
  2. Penjualan Kemitraan (B2B & Keagenan)
  3. Penjualan Produk Orchid Care (Retail & Grosir)
- [x] Tampilkan nilai keunggulan perusahaan & jangkauan distribusi

## 4.3 Contact & Partnership Page (`page-contact.php`)
- [x] Tampilkan informasi kontak lengkap dari Theme Options (Alamat Sleman, WA, Email, Jam Operasional)
- [x] Integrasikan peta lokasi Google Maps Embed
- [x] Sediakan form kontak & pengajuan kemitraan B2B / Keagenan

## 4.4 FAQ Page & CPT (`inc/cpt-faq.php` & `page-faq.php`)
- [x] Daftarkan CPT `faq` (Pertanyaan & Jawaban)
- [x] Buat halaman FAQ (`page-faq.php`) dengan tampilan *accordion* interaktif

## 4.5 Legal Pages Templates (`page-legal.php` / `page.php`)
- [x] Buat template bersih untuk halaman legal: Privacy Policy, Terms & Conditions, Disclaimer, Cookie Policy


---

# 🏃 Sprint 5 — UI Components, Forms & Lead Generation

## 5.1 Interactive UI Components
- [x] Implementasi Mobile Navigation Drawer dengan animasi mulus
- [x] Buat komponen *Sticky Header* saat halaman di-scroll
- [x] Buat widget interaktif **Biang Mix Calculator** (Kalkulasi estimasi liter hasil racikan dari jumlah biang kg)
- [x] Buat Accordion FAQ interaktif tanpa ketergantungan library berat

## 5.2 Form Handling & Lead Generation Integration
- [x] Buat handler sanitasi & validasi form kontak/kemitraan
- [x] Tambahkan perlindungan spam (Nonce verification & honeypot)
- [x] Konfigurasi tombol CTA WhatsApp Lead Generation terintegrasi di seluruh halaman strategis (Home, Product Detail, Contact)


---

# 🏃 Sprint 6 — Performance, SEO, Security & Launch QA

## 6.1 SEO & Schema Markup Implementation
- [x] Integrasikan Meta Title, Meta Description, & Open Graph dinamis
- [x] Implementasi **LocalBusiness Schema** (PT Indotech Berkah Abadi, Sleman Yogyakarta)
- [x] Implementasi **Product Schema** pada `single-product.php`
- [x] Pastikan struktur heading HTML5 semantic (Satu H1 per halaman)
- [x] Konfigurasi `robots.txt` & kompatibilitas XML Sitemap

## 6.2 Performance Optimization
- [x] Terapkan *native image lazy loading* (`loading="lazy"`)
- [x] Minimasi & gabungkan penanganan aset CSS/JS tema
- [x] Pengujian Google Lighthouse (Target: Performance ≥ 90, Accessibility ≥ 90, Best Practices ≥ 90, SEO ≥ 95)
- [x] Optimasi font & gambar (`.webp`)

## 6.3 Security & Code Audit
- [x] Audit sanitasi seluruh input (`sanitize_text_field`, `sanitize_email`, dll.)
- [x] Audit *escaping* seluruh output (`esc_html`, `esc_attr`, `esc_url`, dll.)
- [x] Pastikan tidak ada PHP Warning/Notice pada PHP 8.x dan JavaScript error log clean
- [x] Verifikasi kepatuhan terhadap WordPress Coding Standards

## 6.4 Final QA & Deployment Checklist
- [x] Pengujian responsif pada Mobile, Tablet, dan Desktop
- [x] Pengujian lintas browser (Chrome, Firefox, Safari, Edge)
- [x] Uji coba pengiriman form kontak & pembuatan pesan WhatsApp
- [x] Penyiapan dokumentasi deploy & checklist rilis produksi

