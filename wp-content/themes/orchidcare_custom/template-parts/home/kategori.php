<?php
/**
 * Home — Kategori Produk (Bento-style Cards with Icons)
 * File: template-parts/home/kategori.php
 *
 * 6 cards using /assets/img/icon/ icons.
 * Layout inspired by bento grid — text top-left, icon bottom-right.
 */
?>
<section class="kategori-section" id="kategori">
    <div class="container">

        <!-- Section Header -->
        <div class="section-header reveal text-center">
            <span class="chip-tag chip-tag--coral">KATALOG PRODUK UTAMA</span>
            <h2 class="section-title">Kategori Produk Orchid Care</h2>
            <p class="section-desc">
                Diformulasikan langsung oleh PT Indotech Berkah Abadi untuk kebutuhan rumah tangga, pengusaha laundry, pencucian kendaraan, hingga pasokan grosir B2B.
            </p>
        </div>

        <!-- 6 Category Cards — Bento Grid -->
        <div class="kat-bento">

            <!-- 1. Sabun & Deterjen Laundry -->
            <a href="#kategori-laundry" class="kat-card kat-card--mint reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">LAUNDRY CARE</span>
                    <h3 class="kat-card__title">Sabun &amp; Deterjen Laundry</h3>
                    <p class="kat-card__desc">Deterjen cair laundry, pelembut pakaian (softener), pelicin setrika, &amp; pencerah warna.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-chemical-laundry.webp'); ?>" alt="Icon Deterjen Laundry" loading="lazy" width="120" height="120">
                </div>
            </a>

            <!-- 2. Parfum & Wewangian -->
            <a href="#kategori-parfum" class="kat-card kat-card--lavender reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">PARFUM &amp; WEWANGIAN</span>
                    <h3 class="kat-card__title">Malabeez Perfume</h3>
                    <p class="kat-card__desc">Parfum laundry wangi tahan lama, parfum baju, &amp; wewangian linen aroma mewah.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-malabeez-parfum.webp'); ?>" alt="Icon Parfum Laundry" loading="lazy" width="120" height="120">
                </div>
            </a>

            <!-- 3. Sabun Pel & Rumah Tangga -->
            <a href="#kategori-rumah-tangga" class="kat-card kat-card--peach reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">HOME CARE</span>
                    <h3 class="kat-card__title">Sabun Pel &amp; Pembersih Rumah</h3>
                    <p class="kat-card__desc">Sabun cuci piring pekat, sabun pel lantai wangi, pembersih kaca, &amp; hand soap anti-bakteri.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-chemical-household.webp'); ?>" alt="Icon Sabun Pel dan Pembersih Rumah" loading="lazy" width="120" height="120">
                </div>
            </a>

            <!-- 4. Sanitasi Care & Disinfektan -->
            <a href="#kategori-sanitasi" class="kat-card kat-card--butter reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">SANITASI CARE</span>
                    <h3 class="kat-card__title">Produk Sanitasi &amp; Disinfektan</h3>
                    <p class="kat-card__desc">Cairan sanitasi antiseptik, disinfektan pembunuh kuman, &amp; pembersih higienis untuk ruang publik.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-chemical-sanitasi.webp'); ?>" alt="Icon Sanitasi Care dan Disinfektan" loading="lazy" width="120" height="120">
                </div>
            </a>

            <!-- 5. Perawatan Otomotif -->
            <a href="#kategori-automotive" class="kat-card kat-card--mint reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">AUTO CARE</span>
                    <h3 class="kat-card__title">Perawatan Otomotif</h3>
                    <p class="kat-card__desc">Shampoo mobil busa melimpah (snow wash), semir ban wet-look kinclong, &amp; pengilap bodi motor.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-chemical-autocare.webp'); ?>" alt="Icon Shampoo Mobil dan Semir Ban" loading="lazy" width="120" height="120">
                </div>
            </a>

            <!-- 6. Biang & Konsentrat Sabun -->
            <a href="#kategori-biang" class="kat-card kat-card--lavender reveal">
                <div class="kat-card__text">
                    <span class="kat-card__label">BIANG KONSENTRAT</span>
                    <h3 class="kat-card__title">Biang &amp; Konsentrat Sabun</h3>
                    <p class="kat-card__desc">Biang sabun cuci piring &amp; deterjen (1 kg jadi 15 Liters) — hemat ongkir &amp; cocok untuk reseller.</p>
                </div>
                <div class="kat-card__icon">
                    <img src="<?php echo esc_url(ORCHID_URI . '/assets/img/icon/icon-chemical-paket-bahan.webp'); ?>" alt="Icon Biang Konsentrat Sabun" loading="lazy" width="120" height="120">
                </div>
            </a>

        </div>
    </div>
</section>
