<?php
/**
 * Single Article Template (Detail Artikel Blog)
 * File: single.php
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    // 1. Calculate reading time
    $content    = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $read_time  = max(1, ceil($word_count / 200));

    // 2. Fetch categories
    $cats       = get_the_category();
    $cat_name   = !empty($cats) ? $cats[0]->name : 'EDUKASI & PANDUAN';

    // 3. WhatsApp contact URL for consultation
    $wa_url     = orchid_wa_url('Halo Orchid Care, saya membaca artikel "' . get_the_title() . '" dan ingin berkonsultasi mengenai produk/formulasi.');
    $thumb_url  = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : get_template_directory_uri() . '/assets/img/product-laundry.png';
?>

<!-- Inline Responsive Styling untuk Clean 2-Column Single Article Layout (Identik dengan Single Product) -->
<style>
.single-article-page {
    width: 100%;
}
.single-article-page .container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.single-article-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3.5rem;
    align-items: start;
    margin-bottom: 3.5rem;
}
.entry-body-text {
    color: rgba(22, 54, 30, 0.88);
    font-size: 1.05rem;
    line-height: 1.85;
    margin-bottom: 2.5rem;
}
.entry-body-text h2 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.65rem;
    margin: 2.25rem 0 1rem;
    line-height: 1.3;
}
.entry-body-text h3 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.35rem;
    margin: 1.75rem 0 0.75rem;
    line-height: 1.35;
}
.entry-body-text p {
    margin-bottom: 1.45rem;
}
/* Link Styling dalam Artikel */
.entry-body-text a {
    color: #D81B80;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid rgba(216, 27, 128, 0.35);
    padding-bottom: 1px;
    transition: all 0.2s ease-in-out;
}
.entry-body-text a:hover {
    color: #16361E;
    border-bottom-color: #88C425;
    background-color: rgba(234, 248, 208, 0.5);
    border-radius: 4px;
    padding-left: 3px;
    padding-right: 3px;
}

/* Button Styling dalam Artikel (Gutenberg Block / Custom Button) */
.entry-body-text .wp-block-button,
.entry-body-text .wp-block-buttons {
    margin: 1.85rem 0 !important;
}
.entry-body-text .wp-block-button__link,
.entry-body-text .btn-content,
.entry-body-text button:not(.article-toc-toggle):not(.btn-search-pill) {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 0.5rem !important;
    background: #16361E !important;
    color: #ffffff !important;
    font-family: var(--font-display, 'Baloo 2', sans-serif) !important;
    font-weight: 800 !important;
    font-size: 0.98rem !important;
    padding: 0.8rem 1.8rem !important;
    border-radius: 999px !important;
    text-decoration: none !important;
    border: none !important;
    border-bottom: none !important;
    box-shadow: 0 4px 15px rgba(22, 54, 30, 0.12) !important;
    transition: all 0.2s ease !important;
    cursor: pointer !important;
}
.entry-body-text .wp-block-button__link:hover,
.entry-body-text .btn-content:hover,
.entry-body-text button:not(.article-toc-toggle):not(.btn-search-pill):hover {
    background: #D81B80 !important;
    color: #ffffff !important;
    border-bottom-color: transparent !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(216, 27, 128, 0.3) !important;
    padding-left: 1.8rem !important;
    padding-right: 1.8rem !important;
}

/* Table of Contents (Daftar Isi Artikel) */
.article-toc-box {
    background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%);
    border: 1px solid rgba(136, 196, 37, 0.4);
    border-radius: 1.35rem;
    padding: 1.35rem 1.6rem;
    margin: 2rem 0 2.5rem;
    box-shadow: 0 4px 20px rgba(22, 54, 30, 0.04);
}
.article-toc-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    font-size: 1.1rem;
    font-weight: 800;
    color: #16361E;
    margin-bottom: 0.75rem;
    padding-bottom: 0.6rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.1);
}
.article-toc-toggle {
    font-size: 0.78rem;
    font-weight: 700;
    color: #D81B80;
    background: #ffffff;
    padding: 0.25rem 0.65rem;
    border-radius: 999px;
    cursor: pointer;
    border: 1px solid rgba(216, 27, 128, 0.2);
    transition: all 0.2s ease;
}
.article-toc-toggle:hover {
    background: #D81B80;
    color: #ffffff;
}
.article-toc-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}
.article-toc-item a {
    color: rgba(22, 54, 30, 0.85) !important;
    font-size: 0.93rem !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    border-bottom: none !important;
    transition: all 0.2s ease !important;
    display: block;
    padding: 0.3rem 0.6rem;
    border-radius: 0.5rem;
}
.article-toc-item a:hover {
    color: #D81B80 !important;
    background: #ffffff;
    padding-left: 0.85rem;
    box-shadow: 0 2px 8px rgba(22, 54, 30, 0.05);
}
.article-toc-item.toc-h3 {
    margin-left: 1.25rem;
    font-size: 0.88rem !important;
}

/* Gambar dalam Artikel: Clean, Proportional & Grid Support */
.entry-body-text img {
    max-width: 100% !important;
    width: auto !important;
    max-height: 520px !important;
    height: auto !important;
    display: block !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 1.85rem !important;
    margin-bottom: 1.85rem !important;
    border-radius: 1.25rem !important;
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.06);
    object-fit: contain !important;
    cursor: pointer;
    transition: transform 0.3s ease, filter 0.3s ease;
}
.entry-body-text img:hover {
    filter: brightness(0.96);
}
.entry-featured-img {
    cursor: pointer;
    transition: transform 0.3s ease, filter 0.3s ease;
}
.entry-featured-img:hover {
    filter: brightness(0.96);
}
.entry-body-text figure,
.entry-body-text .wp-block-image {
    max-width: 100% !important;
    width: fit-content !important;
    height: auto !important;
    display: block !important;
    margin-left: auto !important;
    margin-right: auto !important;
    margin-top: 1.85rem !important;
    margin-bottom: 1.85rem !important;
    border-radius: 1.25rem !important;
    overflow: hidden;
    border: 1px solid rgba(22, 54, 30, 0.08);
    background: #fafafa;
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.06);
}
.entry-body-text figure img,
.entry-body-text .wp-block-image img {
    margin: 0 !important;
    box-shadow: none !important;
    border-radius: 1.25rem 1.25rem 0 0 !important;
}
.entry-body-text figcaption {
    text-align: center;
    font-size: 0.88rem;
    color: rgba(22, 54, 30, 0.75);
    padding: 0.6rem 1rem;
    background: #f4faf0;
    font-style: italic;
    border-top: 1px solid rgba(22, 54, 30, 0.06);
}

/* Grid 2 Kolom untuk Gambar Artikel (Kanan-Kiri Ukuran Sama Lebar & Tinggi) */
.article-image-grid {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 1.25rem !important;
    margin: 2.25rem 0 !important;
    width: 100% !important;
}
.article-image-grid-item {
    position: relative !important;
    border-radius: 1.25rem !important;
    overflow: hidden !important;
    background: #fafafa !important;
    border: 1px solid rgba(22, 54, 30, 0.08) !important;
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.06) !important;
    aspect-ratio: 4 / 3 !important;
    cursor: pointer !important;
    margin: 0 !important;
    width: 100% !important;
    height: 100% !important;
    display: flex !important;
    flex-direction: column !important;
    transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease !important;
}
.article-image-grid-item:hover {
    transform: translateY(-4px) !important;
    box-shadow: 0 14px 35px rgba(22, 54, 30, 0.12) !important;
}
.article-image-grid-item img {
    width: 100% !important;
    height: 100% !important;
    max-height: none !important;
    object-fit: cover !important;
    margin: 0 !important;
    border-radius: 0 !important;
    transition: transform 0.4s ease !important;
}
.article-image-grid-item:hover img {
    transform: scale(1.05);
}
/* Overlay Zoom Icon pada Hover */
.article-image-grid-item::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(22, 54, 30, 0.35) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='28' height='28' viewBox='0 0 24 24' fill='none' stroke='%23ffffff' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3Cline x1='11' y1='8' x2='11' y2='14'%3E%3C/line%3E%3Cline x1='8' y1='11' x2='14' y2='11'%3E%3C/line%3E%3C/svg%3E") center no-repeat;
    opacity: 0;
    transition: opacity 0.25s ease;
    pointer-events: none;
    z-index: 2;
}
.article-image-grid-item:hover::after {
    opacity: 1;
}

@media (max-width: 640px) {
    .article-image-grid {
        gap: 0.85rem !important;
    }
    .article-image-grid-item {
        aspect-ratio: 1 / 1 !important;
        border-radius: 1rem !important;
    }
}

/* Modal Lightbox Preview Slider */
.orchid-lightbox-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(10, 22, 14, 0.92);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
    padding: 1.5rem;
}
.orchid-lightbox-modal.is-active {
    opacity: 1;
    visibility: visible;
}
.orchid-lightbox-container {
    position: relative;
    max-width: 90vw;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.orchid-lightbox-img {
    max-width: 90vw;
    max-height: 75vh;
    object-fit: contain;
    border-radius: 1rem;
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease;
}
.orchid-lightbox-caption {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.95rem;
    margin-top: 1rem;
    text-align: center;
    font-family: var(--font-sans, sans-serif);
    font-weight: 500;
    max-width: 650px;
    line-height: 1.5;
}
.orchid-lightbox-counter {
    position: absolute;
    top: 1.5rem;
    left: 2rem;
    color: #ffffff;
    font-size: 0.88rem;
    font-weight: 700;
    background: rgba(255, 255, 255, 0.16);
    padding: 0.45rem 1.1rem;
    border-radius: 999px;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    letter-spacing: 0.03em;
}
.orchid-lightbox-close {
    position: absolute;
    top: 1.5rem;
    right: 2rem;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.16);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    backdrop-filter: blur(8px);
    z-index: 10;
}
.orchid-lightbox-close:hover {
    background: #D81B80;
    color: #ffffff;
    transform: scale(1.1);
}
.orchid-lightbox-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.18);
    border: 1px solid rgba(255, 255, 255, 0.25);
    color: #ffffff;
    font-size: 1.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    backdrop-filter: blur(8px);
    user-select: none;
    z-index: 10;
}
.orchid-lightbox-nav:hover {
    background: #88C425;
    color: #16361E;
    transform: translateY(-50%) scale(1.1);
}
.orchid-lightbox-nav.nav-prev {
    left: 2rem;
}
.orchid-lightbox-nav.nav-next {
    right: 2rem;
}
@media (max-width: 768px) {
    .orchid-lightbox-nav.nav-prev { left: 0.75rem; width: 42px; height: 42px; font-size: 1.3rem; }
    .orchid-lightbox-nav.nav-next { right: 0.75rem; width: 42px; height: 42px; font-size: 1.3rem; }
    .orchid-lightbox-counter { top: 1rem; left: 1rem; font-size: 0.8rem; padding: 0.35rem 0.85rem; }
    .orchid-lightbox-close { top: 1rem; right: 1rem; width: 40px; height: 40px; font-size: 1.2rem; }
}

/* Callout Box "Baca Juga" Link */
.baca-juga-callout {
    background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%);
    border: 1px solid rgba(136, 196, 37, 0.4);
    border-left: 5px solid #88C425;
    border-radius: 1.25rem;
    padding: 1.1rem 1.4rem;
    margin: 2rem 0;
    display: flex;
    align-items: center;
    gap: 1.1rem;
    box-shadow: 0 4px 15px rgba(22, 54, 30, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.baca-juga-callout:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(22, 54, 30, 0.08);
}
.baca-juga-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: #16361E;
    color: #ffffff;
    font-size: 0.75rem;
    font-weight: 800;
    padding: 0.4rem 0.85rem;
    border-radius: 999px;
    flex-shrink: 0;
    letter-spacing: 0.04em;
}
.baca-juga-content {
    font-weight: 700;
    color: #16361E;
    font-size: 0.98rem;
    line-height: 1.5;
}
.baca-juga-content a {
    color: #16361E !important;
    text-decoration: none !important;
    border-bottom: 2px solid #D81B80 !important;
    transition: color 0.2s ease, border-color 0.2s ease !important;
}
.baca-juga-content a:hover {
    color: #D81B80 !important;
    background-color: transparent !important;
}

.entry-body-text blockquote {
    border-left: 4px solid #88C425;
    background: #EAF8D0;
    padding: 1.25rem 1.5rem;
    border-radius: 0 1rem 1rem 0;
    font-style: italic;
    margin: 1.75rem 0;
    color: #16361E;
}
@media (min-width: 993px) {
    .single-sidebar {
        position: sticky !important;
        top: 110px !important;
        align-self: start !important;
    }
}
@media (max-width: 992px) {
    .single-article-grid {
        grid-template-columns: 1fr !important;
        gap: 2.5rem !important;
    }
}
@media (max-width: 768px) {
    .single-article-page section {
        padding: 3rem 0 !important;
    }
    .entry-body-text {
        font-size: 0.98rem;
        line-height: 1.72;
    }
    .baca-juga-callout {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.65rem;
    }
}

/* Circular Social Share Icon Buttons with Dark Tooltip Popups */
.article-share-bar {
    background: #fafafa;
    border: 1px solid rgba(22, 54, 30, 0.08);
    border-radius: 1.25rem;
    padding: 1.1rem 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 2.5rem;
    box-shadow: 0 4px 20px rgba(22, 54, 30, 0.03);
}
.share-icon-btn {
    position: relative !important;
    width: 44px !important;
    height: 44px !important;
    border-radius: 50% !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #ffffff !important;
    text-decoration: none !important;
    border: none !important;
    cursor: pointer !important;
    padding: 0 !important;
    margin: 0 !important;
    transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.25s ease, background-color 0.2s ease !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
    font-size: 1rem !important;
    line-height: 1 !important;
}
.share-icon-btn:hover {
    transform: translateY(-3px) scale(1.08) !important;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.16) !important;
}
.share-icon-btn.share-wa { background: #25D366 !important; }
.share-icon-btn.share-fb { background: #1877F2 !important; }
.share-icon-btn.share-in { background: #0A66C2 !important; }
.share-icon-btn.share-x { background: #000000 !important; }
.share-icon-btn.share-copy { background: #5B6B7C !important; }

/* Tooltip Popup */
.share-icon-btn::before {
    content: attr(data-tooltip);
    position: absolute;
    bottom: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%) translateY(4px);
    background: #0f172a;
    color: #ffffff;
    font-size: 0.76rem;
    font-weight: 700;
    padding: 0.38rem 0.8rem;
    border-radius: 0.5rem;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
    font-family: var(--font-sans, sans-serif);
    z-index: 100;
}
.share-icon-btn::after {
    content: '';
    position: absolute;
    bottom: calc(100% + 4px);
    left: 50%;
    transform: translateX(-50%) translateY(4px);
    border-width: 6px 6px 0 6px;
    border-style: solid;
    border-color: #0f172a transparent transparent transparent;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
    z-index: 100;
}
.share-icon-btn:hover::before,
.share-icon-btn:hover::after {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}
</style>

<main id="main-content" class="single-article-page">

    <!-- ═══ 1. ELEGANT PAGE HERO BANNER ═══ -->
    <?php
    orchid_page_hero(
        strtoupper($cat_name),
        get_the_title(),
        'Dipublikasikan pada ' . get_the_date('d F Y') . ' • ' . $read_time . ' Menit Baca'
    );
    ?>

    <!-- ═══ 2. MAIN ARTICLE CONTENT & SIDEBAR GRID (2-COLUMN MATCHING SINGLE PRODUCT) ═══ -->
    <section class="article-main-section" style="padding: 4.5rem 0; background: #ffffff; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
        <div class="container">
            
            <div class="single-article-grid">
                
                <!-- KOLOM KIRI (UTAMA): FEATURED IMAGE, CONTENT & AUTHOR BIO -->
                <div>
                    
                    <!-- Featured Image -->
                    <div class="entry-featured-img-wrap" style="position: relative; border-radius: 1.75rem; overflow: hidden; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 12px 35px rgba(22, 54, 30, 0.06); background: #fafafa; margin-bottom: 2.5rem;">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" class="entry-featured-img" style="width: 100%; height: auto; display: block; object-fit: cover; border-radius: 1.75rem;" loading="eager" onerror="this.onerror=null; this.src='<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>'; this.classList.add('img-fallback-placeholder');">
                        <span class="chip-tag chip-tag--mint" style="position: absolute; top: 1.25rem; left: 1.25rem; font-size: 0.8rem; padding: 0.35rem 0.9rem; border-radius: 999px;">
                            <?php echo esc_html($cat_name); ?>
                        </span>
                    </div>

                    <!-- Entry Body Text -->
                    <div class="entry-body-text">
                        <?php the_content(); ?>
                    </div>

                    <!-- Share Buttons Bar -->
                    <div class="article-share-bar">
                        <div style="font-weight: 800; color: #16361E; font-size: 0.98rem; display: flex; align-items: center; gap: 0.5rem;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#D81B80" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                            <span>Bagikan Artikel Ini:</span>
                        </div>
                        
                        <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                            <!-- WhatsApp (Official WA Logo) -->
                            <a href="https://api.whatsapp.com/send?text=<?php echo rawurlencode(get_the_title() . ' - ' . get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-wa" data-tooltip="WhatsApp" aria-label="Bagikan ke WhatsApp">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                            </a>

                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-fb" data-tooltip="Facebook" aria-label="Bagikan ke Facebook">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-in" data-tooltip="LinkedIn" aria-label="Bagikan ke LinkedIn">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" target="_blank" rel="noopener" class="share-icon-btn share-x" data-tooltip="X (Twitter)" aria-label="Bagikan ke X (Twitter)">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>

                            <!-- Copy Link -->
                            <button type="button" onclick="navigator.clipboard.writeText('<?php echo esc_js(get_permalink()); ?>'); var self = this; self.setAttribute('data-tooltip', 'Tersalin!'); setTimeout(function(){ self.setAttribute('data-tooltip', 'Salin Link'); }, 2000);" class="share-icon-btn share-copy" data-tooltip="Salin Link" aria-label="Salin Link Artikel">
                                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Author Bio & Editorial Validation Card -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.65rem 1.75rem; display: flex; gap: 1.35rem; align-items: center; position: relative; margin-bottom: 2.5rem;">
                        <div style="width: 56px; height: 56px; background: #16361E; color: #ffffff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.3rem; flex-shrink: 0; box-shadow: 0 4px 12px rgba(22,54,30,0.15);">
                            <?php echo esc_html(strtoupper(substr(get_the_author(), 0, 1))); ?>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; gap: 0.6rem; flex-wrap: wrap; margin-bottom: 0.35rem;">
                                <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.12rem; font-weight: 800; margin: 0;">
                                    Penulis: <?php echo esc_html(get_the_author()); ?>
                                </h4>
                                <span style="display: inline-flex; align-items: center; gap: 0.3rem; background: #16361E; color: #88C425; font-size: 0.76rem; font-weight: 800; padding: 0.25rem 0.75rem; border-radius: 999px; letter-spacing: 0.02em;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Divalidasi Tim Redaksi
                                </span>
                            </div>
                            <p style="color: rgba(22, 54, 30, 0.82); font-size: 0.88rem; line-height: 1.55; margin: 0;">
                                Artikel ini ditulis oleh <strong><?php echo esc_html(get_the_author()); ?></strong> dan telah ditinjau serta divalidasi oleh <strong>Tim Redaksi PT Indotech Berkah Abadi</strong> untuk menjamin keakuratan informasi &amp; edukasi formulasi.
                            </p>
                        </div>
                    </div>

                    <!-- ═══ 2.5 COMMENTS & DISCUSSION SECTION ═══ -->
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>

                </div>

                <!-- KOLOM KANAN (SIDEBAR): KONSULTASI WA, RINGKASAN & ARTIKEL REKOMENDASI -->
                <div class="single-sidebar">
                    
                    <!-- Direct WhatsApp Consultation Box (Matching Single Product CTA Box) -->
                    <div style="background: #EAF8D0; border: 1px solid rgba(22, 54, 30, 0.12); border-radius: 1.5rem; padding: 1.75rem; margin-bottom: 2rem;">
                        <span class="chip-tag chip-tag--coral" style="margin-bottom: 0.6rem; display: inline-block;">KONSULTASI FORMULASI</span>
                        <h4 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: 1.25rem; color: #16361E; font-weight: 800; margin-bottom: 0.5rem; line-height: 1.3;">
                            Punya Pertanyaan Mengenai Artikel Ini?
                        </h4>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.93rem; line-height: 1.55; margin-bottom: 1.25rem;">
                            Konsultasikan kebutuhan formulasi kimia, peracikan biang konsentrat, atau pasokan grosir langsung bersama tim spesialis kami via WhatsApp.
                        </p>
                        <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.85rem 1.8rem; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; width: 100%; box-shadow: none !important;">
                            <span>Konsultasi WA Sekarang &rarr;</span>
                        </a>
                    </div>

                    <!-- Quick Article Information Box -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.5rem; margin-bottom: 2rem;">
                        <h4 style="font-family: var(--font-display, sans-serif); font-size: 1.1rem; color: #16361E; font-weight: 800; margin-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 0.5rem;">Informasi Artikel</h4>
                        <div style="display: flex; flex-direction: column; gap: 0.75rem; font-size: 0.9rem; color: rgba(22, 54, 30, 0.8);">
                            <div><strong>Kategori:</strong> <?php echo esc_html($cat_name); ?></div>
                            <div><strong>Tanggal Rilis:</strong> <?php echo esc_html(get_the_date('d F Y')); ?></div>
                            <div><strong>Waktu Baca:</strong> <?php echo esc_html($read_time); ?> Menit</div>
                            <div><strong>Penerbit:</strong> PT Indotech Berkah Abadi</div>
                        </div>
                    </div>

                    <!-- Recommended Articles Sidebar Widget -->
                    <div style="background: #fafafa; border: 1px solid rgba(22, 54, 30, 0.08); border-radius: 1.5rem; padding: 1.5rem;">
                        <h4 style="font-family: var(--font-display, sans-serif); font-size: 1.1rem; color: #16361E; font-weight: 800; margin-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.08); padding-bottom: 0.5rem;">Artikel Terkait</h4>
                        
                        <?php
                        $sidebar_posts = new WP_Query([
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => [get_the_ID()],
                        ]);
                        if ($sidebar_posts->have_posts()) :
                            while ($sidebar_posts->have_posts()) : $sidebar_posts->the_post();
                                $sb_thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : get_template_directory_uri() . '/assets/img/product-laundry.png';
                        ?>
                            <div style="display: flex; gap: 0.85rem; align-items: center; margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid rgba(22, 54, 30, 0.06);">
                                <a href="<?php the_permalink(); ?>" style="width: 70px; height: 60px; border-radius: 0.75rem; overflow: hidden; flex-shrink: 0; display: block; background: #ffffff;">
                                    <img src="<?php echo esc_url($sb_thumb); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                                <div>
                                    <h5 style="font-family: var(--font-display, sans-serif); font-size: 0.92rem; font-weight: 700; line-height: 1.3; margin: 0 0 0.25rem;">
                                        <a href="<?php the_permalink(); ?>" style="color: #16361E; text-decoration: none;"><?php echo esc_html(wp_trim_words(get_the_title(), 8, '...')); ?></a>
                                    </h5>
                                    <span style="font-size: 0.75rem; color: rgba(22, 54, 30, 0.6);"><?php echo get_the_date('d M Y'); ?></span>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); endif; ?>

                        <a href="<?php echo esc_url(home_url('/blog')); ?>" style="color: #16361E; font-weight: 800; font-size: 0.88rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem; margin-top: 0.5rem;">
                            <span>Lihat Semua Artikel &rarr;</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 3. CTA BANNER PENUTUP (MATCHING ALL PAGES) ═══ -->
    <section class="cta-banner-penutup" id="cta-penutup" style="background: #16361E; color: #ffffff; padding: 5.5rem 0; position: relative; overflow: hidden; border-top: 3px solid #88C425;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 650px; height: 350px; background: radial-gradient(circle, rgba(136, 196, 37, 0.12) 0%, rgba(22, 54, 30, 0) 70%); pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 2; max-width: 820px; text-align: center;">
            <span style="background: #88C425; color: #16361E; font-weight: 800; font-size: 0.78rem; padding: 0.45rem 1.1rem; border-radius: 999px; font-family: var(--font-mono, monospace); display: inline-block; margin-bottom: 1.25rem; letter-spacing: 0.05em;">
                PABRIK &amp; SUPPLIER SABUN SLEMAN YOGYAKARTA
            </span>

            <h2 style="font-family: var(--font-display, 'Baloo 2', sans-serif); font-size: clamp(2rem, 4vw, 2.6rem); line-height: 1.2; color: #ffffff; margin: 0 0 1rem; font-weight: 800;">
                Siap Bermitra dengan Produsen &amp; Supplier Sabun Tangan Pertama?
            </h2>

            <p style="color: #cbd5e1; font-size: 1.02rem; line-height: 1.65; margin: 0 auto 2.25rem; max-width: 680px;">
                Hubungi tim kemitraan <strong>Orchid Care (PT Indotech Berkah Abadi)</strong> untuk konsultasi pasokan grosir rutin, peluang keagenan, &amp; suplai sabun laundry kiloan se-Indonesia.
            </p>

            <div class="cta-buttons-wrap" style="display: flex; gap: 1.25rem; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--orchid, #D81B80); color: #ffffff; font-weight: 800; border-radius: 999px; box-shadow: none !important;">
                    <span>Hubungi Kemitraan WA</span>
                </a>

                <a href="<?php echo esc_url(home_url('/produk')); ?>" class="btn" style="background: rgba(255,255,255,0.12); color: #ffffff; border: 1px solid rgba(255,255,255,0.25); font-size: 1rem; padding: 0.85rem 2.2rem; text-decoration: none; border-radius: 999px; font-weight: 700; backdrop-filter: blur(8px);">
                    Lihat Katalog Produk
                </a>
            </div>

            <div style="margin-top: 2.75rem; display: flex; gap: 1.75rem; justify-content: center; flex-wrap: wrap; font-size: 0.88rem; color: #cbd5e1; border-top: 1px solid rgba(255,255,255,0.12); padding-top: 1.5rem; font-weight: 600;">
                <span>✓ Pabrik Resmi Sleman, D.I. Yogyakarta</span>
                <span>✓ Izin Edar Kemenkes RI &amp; Halal MUI</span>
                <span>✓ Biang Konsentrat Hemat Ongkir 90%</span>
            </div>
        </div>
    </section>

    <!-- ═══ 4. ARTICLE IMAGE LIGHTBOX MODAL PREVIEW ═══ -->
    <div id="orchid-lightbox-modal" class="orchid-lightbox-modal" role="dialog" aria-modal="true" aria-label="Pratinjau Gambar">
        <div class="orchid-lightbox-counter" id="orchid-lightbox-counter">Gambar 1 dari 1</div>
        <button type="button" class="orchid-lightbox-close" id="orchid-lightbox-close" aria-label="Tutup Pratinjau">✕</button>
        <button type="button" class="orchid-lightbox-nav nav-prev" id="orchid-lightbox-prev" aria-label="Gambar Sebelumnya">‹</button>
        <button type="button" class="orchid-lightbox-nav nav-next" id="orchid-lightbox-next" aria-label="Gambar Berikutnya">›</button>

        <div class="orchid-lightbox-container">
            <img src="" alt="" id="orchid-lightbox-img" class="orchid-lightbox-img">
            <div id="orchid-lightbox-caption" class="orchid-lightbox-caption"></div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var entryContent = document.querySelector('.entry-body-text');
    if (!entryContent) return;

    // ── 1. Table of Contents Generator ──
    var headings = entryContent.querySelectorAll('h2, h3');
    if (headings.length >= 2) {
        var tocBox = document.createElement('div');
        tocBox.className = 'article-toc-box';

        var tocHeader = document.createElement('div');
        tocHeader.className = 'article-toc-header';
        tocHeader.innerHTML = '<div style="display:flex;align-items:center;gap:0.5rem;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#88C425" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg><span>Daftar Isi Artikel</span></div><button type="button" class="article-toc-toggle">Sembunyikan ▴</button>';

        var tocList = document.createElement('ul');
        tocList.className = 'article-toc-list';

        headings.forEach(function (h, idx) {
            if (!h.id) {
                h.id = 'art-sec-' + (idx + 1);
            }
            h.style.scrollMarginTop = '110px';

            var li = document.createElement('li');
            li.className = 'article-toc-item' + (h.tagName.toLowerCase() === 'h3' ? ' toc-h3' : '');

            var link = document.createElement('a');
            link.href = '#' + h.id;
            link.textContent = h.textContent.replace(/^[0-9]+\.\s*/, '');

            link.addEventListener('click', function (e) {
                e.preventDefault();
                var targetEl = document.getElementById(h.id);
                if (targetEl) {
                    var offset = 110;
                    var bodyRect = document.body.getBoundingClientRect().top;
                    var elementRect = targetEl.getBoundingClientRect().top;
                    var elementPosition = elementRect - bodyRect;
                    var offsetPosition = elementPosition - offset;
                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });

            li.appendChild(link);
            tocList.appendChild(li);
        });

        tocBox.appendChild(tocHeader);
        tocBox.appendChild(tocList);

        var toggleBtn = tocHeader.querySelector('.article-toc-toggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                if (tocList.style.display === 'none') {
                    tocList.style.display = 'flex';
                    toggleBtn.textContent = 'Sembunyikan ▴';
                } else {
                    tocList.style.display = 'none';
                    toggleBtn.textContent = 'Tampilkan ▾';
                }
            });
        }

        var firstH2 = entryContent.querySelector('h2');
        if (firstH2) {
            entryContent.insertBefore(tocBox, firstH2);
        } else {
            entryContent.insertBefore(tocBox, entryContent.firstChild);
        }
    }

    // ── 2. Image Auto-Grouping into 2-Column Grid (Sama Lebar & Tinggi) ──
    var contentImages = entryContent.querySelectorAll('img');
    if (contentImages.length > 0) {
        var imageItems = [];
        contentImages.forEach(function(img) {
            if (img.closest('.article-toc-box') || img.closest('.single-sidebar')) return;
            var parentBlock = img.closest('figure') || img.closest('p') || img;
            if (parentBlock && imageItems.indexOf(parentBlock) === -1) {
                imageItems.push(parentBlock);
            }
        });

        if (imageItems.length >= 2) {
            var gridWrapper = document.createElement('div');
            gridWrapper.className = 'article-image-grid';

            var firstItem = imageItems[0];
            firstItem.parentNode.insertBefore(gridWrapper, firstItem);

            imageItems.forEach(function(item) {
                var gridItem = document.createElement('div');
                gridItem.className = 'article-image-grid-item';

                var imgEl = item.tagName.toLowerCase() === 'img' ? item : item.querySelector('img');
                var captionEl = item.querySelector('figcaption');

                if (imgEl) {
                    gridItem.appendChild(imgEl);
                    if (captionEl) {
                        gridItem.appendChild(captionEl);
                    }
                    gridWrapper.appendChild(gridItem);

                    if (item !== imgEl && item.parentNode && item.childNodes.length === 0) {
                        item.parentNode.removeChild(item);
                    }
                }
            });
        }
    }

    // ── 3. Modal Lightbox Gallery Preview System ──
    var lightboxModal = document.getElementById('orchid-lightbox-modal');
    var lightboxImg = document.getElementById('orchid-lightbox-img');
    var lightboxCaption = document.getElementById('orchid-lightbox-caption');
    var lightboxCounter = document.getElementById('orchid-lightbox-counter');
    var lightboxPrev = document.getElementById('orchid-lightbox-prev');
    var lightboxNext = document.getElementById('orchid-lightbox-next');
    var lightboxClose = document.getElementById('orchid-lightbox-close');

    if (lightboxModal && lightboxImg) {
        var galleryList = [];
        var activeIndex = 0;

        // Collect all article images (Featured Image + Content images)
        var featuredImg = document.querySelector('.entry-featured-img');
        if (featuredImg) {
            galleryList.push({
                src: featuredImg.src,
                alt: featuredImg.alt || 'Gambar Utama Artikel',
                caption: featuredImg.alt || 'Gambar Utama Artikel',
                el: featuredImg
            });
        }

        var allArticleImgs = document.querySelectorAll('.entry-body-text img');
        allArticleImgs.forEach(function(img) {
            var captionText = '';
            var gridItem = img.closest('.article-image-grid-item') || img.closest('figure');
            var figcap = gridItem ? gridItem.querySelector('figcaption') : null;
            
            if (figcap) {
                captionText = figcap.textContent.trim();
            } else if (img.alt) {
                captionText = img.alt;
            } else if (img.title) {
                captionText = img.title;
            }

            galleryList.push({
                src: img.src,
                alt: img.alt || 'Gambar Artikel',
                caption: captionText,
                el: img
            });
        });

        function updateLightbox(index) {
            if (galleryList.length === 0) return;

            activeIndex = (index + galleryList.length) % galleryList.length;
            var item = galleryList[activeIndex];

            lightboxImg.style.opacity = '0';
            lightboxImg.style.transform = 'scale(0.96)';

            setTimeout(function() {
                lightboxImg.src = item.src;
                lightboxImg.alt = item.alt;
                lightboxCaption.textContent = item.caption;
                lightboxCounter.textContent = 'Gambar ' + (activeIndex + 1) + ' dari ' + galleryList.length;

                lightboxImg.style.opacity = '1';
                lightboxImg.style.transform = 'scale(1)';
            }, 150);

            if (galleryList.length <= 1) {
                lightboxPrev.style.display = 'none';
                lightboxNext.style.display = 'none';
            } else {
                lightboxPrev.style.display = 'flex';
                lightboxNext.style.display = 'flex';
            }
        }

        function openLightbox(index) {
            updateLightbox(index);
            lightboxModal.classList.add('is-active');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightboxModal.classList.remove('is-active');
            document.body.style.overflow = '';
        }

        // Attach click handlers to all images
        galleryList.forEach(function(item, idx) {
            item.el.style.cursor = 'pointer';

            var parentLink = item.el.closest('a');
            if (parentLink) {
                parentLink.addEventListener('click', function(e) {
                    e.preventDefault();
                });
            }

            item.el.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                openLightbox(idx);
            });

            var gridContainer = item.el.closest('.article-image-grid-item');
            if (gridContainer && gridContainer !== item.el) {
                gridContainer.addEventListener('click', function(e) {
                    e.preventDefault();
                    openLightbox(idx);
                });
            }
        });

        if (lightboxPrev) {
            lightboxPrev.addEventListener('click', function(e) {
                e.stopPropagation();
                updateLightbox(activeIndex - 1);
            });
        }

        if (lightboxNext) {
            lightboxNext.addEventListener('click', function(e) {
                e.stopPropagation();
                updateLightbox(activeIndex + 1);
            });
        }

        if (lightboxClose) {
            lightboxClose.addEventListener('click', function(e) {
                e.stopPropagation();
                closeLightbox();
            });
        }

        lightboxModal.addEventListener('click', function(e) {
            if (e.target === lightboxModal || e.target.classList.contains('orchid-lightbox-container')) {
                closeLightbox();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (!lightboxModal.classList.contains('is-active')) return;

            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                updateLightbox(activeIndex - 1);
            } else if (e.key === 'ArrowRight') {
                updateLightbox(activeIndex + 1);
            }
        });
    }
});
</script>

</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
