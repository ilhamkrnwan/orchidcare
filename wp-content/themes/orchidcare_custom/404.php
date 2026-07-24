<?php get_header(); ?>

<main id="main-content" class="site-main error-page">
    <?php orchid_page_hero(
        '404 NOT FOUND',
        'Halaman Tidak Ditemukan',
        'Oops! Halaman yang Anda cari tidak dapat ditemukan atau telah dipindahkan.',
        ['text' => 'Kembali ke Beranda', 'url' => home_url('/')]
    ); ?>
</main>

<?php get_footer(); ?>
