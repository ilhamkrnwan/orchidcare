<?php
/**
 * Front Page Template — Orchid Care (PT Indotech Berkah Abadi)
 * Urutan Halaman Beranda Sesuai Spesifikasi:
 * 1. Hero
 * 2. Kategori (simple)
 * 3. Section Kategori 1 (Perawatan Laundry)
 * 4. Section Kategori 2 (Kebutuhan Rumah Tangga / Home Care)
 * 5. Section Kategori 3 (Perawatan Otomotif / Auto Care)
 * 6. Section Kategori 4 (Biang Konsentrat / 1kg -> 15L)
 * 7. Section Kategori 5 (Parfum & Wewangian / Malabeez Perfume)
 * 8. Section Kategori 6 (Sanitasi Care & Disinfektan)
 * 9. Gallery & CTA Penutup
 * 10. Footer
 */
get_header(); ?>

<main id="main-content">

    <!-- 1. HERO SECTION -->
    <?php get_template_part('template-parts/home/hero'); ?>

    <!-- 2. KATEGORI (SIMPLE HEADER GRID) -->
    <?php get_template_part('template-parts/home/kategori'); ?>

    <!-- 3. SECTION KATEGORI 1: PERAWATAN LAUNDRY -->
    <?php get_template_part('template-parts/home/feature-laundry'); ?>

    <!-- 4. SECTION KATEGORI 2: KEBUTUHAN RUMAH TANGGA -->
    <?php get_template_part('template-parts/home/feature-rumah-tangga'); ?>

    <!-- 5. SECTION KATEGORI 3: PERAWATAN OTOMOTIF -->
    <?php get_template_part('template-parts/home/feature-automotive'); ?>

    <!-- 6. SECTION KATEGORI 4: BIANG KONSENTRAT (1KG -> 15L) -->
    <?php get_template_part('template-parts/home/feature-biang'); ?>

    <!-- 7. SECTION KATEGORI 5: PARFUM & WEWANGIAN (MALABEEZ PERFUME) -->
    <?php get_template_part('template-parts/home/feature-parfum'); ?>

    <!-- 8. SECTION KATEGORI 6: SANITASI CARE & DISINFEKTAN -->
    <?php get_template_part('template-parts/home/feature-b2b'); ?>

    <!-- 9. GALLERY & CTA PENUTUP -->
    <?php get_template_part('template-parts/home/galeri-cta'); ?>

</main>

<!-- 10. FOOTER -->
<?php get_footer(); ?>
