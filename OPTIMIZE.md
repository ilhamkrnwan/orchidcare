# Catatan Perencanaan Perbaikan Performance, Accessibility, dan SEO
> Berdasarkan Audit PageSpeed / Lighthouse pada `performance.txt` (Captured: 7 Aug 2026)

---

## 📊 Summary Skor Ringkasan (Mobile Baseline)

| Metrik | Skor / Nilai Baseline | Target setelah Optimasi | Status |
| :--- | :--- | :--- | :--- |
| **Performance** | **71 / 100** | **90+** | ⚠️ Butuh Optimasi Utama |
| **Accessibility** | **88 / 100** | **95+** | ⚠️ Perlu Penyesuaian Kontras & Label |
| **Best Practices** | **100 / 100** | **100** | ✅ Sempurna |
| **SEO** | **92 / 100** | **100** | ⚠️ Kurang Meta Description |
| **Agentic Browsing** | **2/3 Passed** | **3/3 Passed** | ⚠️ Menunggu perbaikan label select |

---

## 🛑 Core Web Vitals Baseline (Mobile 4G Slow)
* **First Contentful Paint (FCP):** `3.1s` (Target: `< 1.8s`)
* **Largest Contentful Paint (LCP):** `4.9s` (Target: `< 2.5s`)
* **Speed Index (SI):** `5.6s` (Target: `< 3.4s`)
* **Total Blocking Time (TBT):** `130ms` (Target: `< 200ms` - *Sudah Bagus*)
* **Cumulative Layout Shift (CLS):** `0` (Target: `< 0.1` - *Sempurna*)

---

## 🚀 Rencana Aksi Optimasi (Action Plan)

### Phase 1: Performance & Image Optimization (Penghematan ~950 KiB & ~2.5s LCP Delay)

1. **Optimasi Image Dimensi & WebP Responsif**
   * `logo.webp`: Ukuran asli `4938x1676` (413.8 KiB) tetapi ditampilkan hanya `165x56` px.
     * **Aksi:** Resize master `logo.webp` ke max width 380px/400px (retina 2x). Estimasi penghematan: **~413 KiB**.
   * `gambar-awal.png`: Hero image berukuran **406.2 KiB** PNG.
     * **Aksi:** Convert `gambar-awal.png` ke format **WebP / AVIF** terkompresi. Estimasi penghematan: **~358 KiB**.
   * **Icon-Icon Kategori** (`icon-malabeez-parfum.png`, `icon-chemical-*.png`): Ukuran asli `960x540` px tapi ditampilkan `120x120` px.
     * **Aksi:** Crop/resize icon ke `240x240` px (2x HD) atau convert ke WebP/SVG. Estimasi penghematan total: **~180 KiB**.

2. **Atasi Image Tanpa Dimension Attributes (CLS & Hydration)**
   * Gambar `mobile-drawer-logo` dan beberapa gambar katalog produk belum memiliki atribut `width` dan `height` yang eksplisit.
     * **Aksi:** Tambahkan atribut `width` dan `height` atau `aspect-ratio` via CSS pada tag `<img>`.

3. **Eliminasi Render-Blocking Resources & Optimasi Google Fonts**
   * CSS Render Blocking (`cfb2715....css?ver=df7e0` menunda 250ms).
   * Google Fonts API loading (`fonts.googleapis.com/css2`) menunda 750ms + font `.woff2` latensi ~2.4s.
     * **Aksi:** 
       * Tambahkan `<link rel="preconnect" href="https://fonts.googleapis.com">` dan `<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>`.
       * Gunakan `font-display: swap` pada load CSS Google Fonts.
       * Pertimbangkan self-hosting font secara lokal jika memungkinkan.

4. **Eliminasi Forced Reflow / Layout Thrashing (JavaScript)**
   * Terdeteksi `js/b03f7ba....js` melakukan pemicuan geometri paksa (492 ms layout recalculation).
     * **Aksi:** Audit `main.js` untuk pembacaan properti geometri (seperti `offsetWidth`, `clientHeight`, `getBoundingClientRect`) yang dipanggil tepat setelah eksekusi mutasi DOM. Grouping baca & tulis DOM secara terpisah.

---

### Phase 2: Accessibility & Agentic Browsing (Skor 88 ➔ 95+)

1. **Tambahkan Label pada Form Select**
   * Element `<select name="kategori" class="field-select">` tidak memiliki label atau `aria-label`.
     * **Aksi:** Tambahkan `<label for="select-kategori">` atau `aria-label="Pilih Kategori Produk"`. *(Menyelesaikan audit Accessibility & Agentic Browsing)*.

2. **Perbaiki Contrast Ratio (Warna Latar vs Teks)**
   * Element dengan kontras kurang memadai:
     * `.kat-card__label` dan badge/chip tag (seperti `.chip-tag` hijau/biru dengan transparansi `rgba(136, 196, 37, 0.2)`).
     * Link footer (`Kebijakan Privasi`, `Syarat & Ketentuan` dengan warna `#64748b` di atas background `#0b132b`).
     * Description text `.section-desc`.
     * **Aksi:** Terangkan/gelapkan warna hex agar mencapai rasio kontras minimal WCAG AA (**4.5:1**).

3. **Struktur Heading (H1-H6) Hirarki**
   * `h4` dipanggil mendahului urutan hirarki yang tepat.
     * **Aksi:** Pastikan struktur heading berurutan secara konsisten `h1` ➔ `h2` ➔ `h3` ➔ `h4`.

---

### Phase 3: SEO Optimization (Skor 92 ➔ 100)

1. **Meta Description Missing**
   * Halaman tidak memiliki `<meta name="description" content="...">`.
     * **Aksi:** Tambahkan tag meta deskripsi yang informatif di `<head>` (panjang 150-160 karakter).

---

## 📋 Checklist Eksekusi Perbaikan

- [x] **Phase 0 Baseline & Plan**:
  - [x] Dokumentasi `performance.txt` & pembuatan `OPTIMIZE.md`
  - [x] Commit Git checkpoint awal
- [x] **Phase 1 Image Optimization & Asset Loading**:
  - [x] Resize & kompres `logo.webp` (dari 423 KiB ke 12 KiB)
  - [x] Convert `gambar-awal.png` ke `gambar-awal.webp` (dari 415 KiB PNG ke 73 KiB WebP)
  - [x] Resize & convert 6 icon kategori PNG ke WebP 240x240px (total hemat ~180 KiB)
  - [x] Set atribut `width` dan `height` pada `mobile-drawer-logo`
  - [x] Tambahkan `<link rel="preconnect">` untuk Google Fonts di `header.php`
  - [x] Tambahkan atribut `id`, `for`, dan `aria-label` pada form select kategori di `hero.php`
- [ ] **Phase 2 Accessibility & CSS/JS Optimization**:
  - [ ] Adjust warna footer link & tag chip untuk WCAG AA contrast (4.5:1+)
  - [ ] Perbaiki urutan tag Heading di bento & section
- [ ] **Phase 3 SEO Optimization**:
  - [ ] Tambahkan `<meta name="description">` pada header theme
