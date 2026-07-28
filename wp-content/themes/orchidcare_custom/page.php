<?php
/**
 * Default Single Page Template
 * File: page.php
 */

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    $last_updated = get_the_modified_date('d F Y');
    $wa_url       = orchid_wa_url('Halo Orchid Care, saya sedang membaca halaman "' . get_the_title() . '" dan ingin berkonsultasi lebih lanjut.');
    $thumb_url    = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : '';
?>

<!-- Inline Responsive Styling untuk General Single Page Layout -->
<style>
.single-generic-page {
    width: 100%;
}
.single-generic-page .container {
    width: 100%;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}
.single-page-card {
    background: #ffffff;
    border-radius: 1.75rem;
    border: 1px solid rgba(22, 54, 30, 0.08);
    box-shadow: 0 10px 35px rgba(22, 54, 30, 0.05);
    padding: 3rem 3.5rem;
    margin-bottom: 3.5rem;
}
.single-page-card .entry-content {
    color: rgba(22, 54, 30, 0.88);
    font-size: 1.05rem;
    line-height: 1.85;
}
.single-page-card .entry-content h2 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.65rem;
    margin: 2.25rem 0 1rem;
    line-height: 1.3;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.06);
    scroll-margin-top: 110px;
}
.single-page-card .entry-content h2:first-of-type {
    margin-top: 0;
}
.single-page-card .entry-content h3 {
    font-family: var(--font-display, 'Baloo 2', sans-serif);
    color: #16361E;
    font-weight: 800;
    font-size: 1.35rem;
    margin: 1.75rem 0 0.75rem;
    line-height: 1.35;
    scroll-margin-top: 110px;
}
.single-page-card .entry-content p {
    margin-bottom: 1.45rem;
}

/* Link Styling */
.single-page-card .entry-content a {
    color: #D81B80;
    font-weight: 700;
    text-decoration: none;
    border-bottom: 2px solid rgba(216, 27, 128, 0.35);
    padding-bottom: 1px;
    transition: all 0.2s ease-in-out;
}
.single-page-card .entry-content a:hover {
    color: #16361E;
    border-bottom-color: #88C425;
    background-color: rgba(234, 248, 208, 0.5);
    border-radius: 4px;
    padding-left: 3px;
    padding-right: 3px;
}

/* Button Styling (Gutenberg / Custom) */
.single-page-card .entry-content .wp-block-button,
.single-page-card .entry-content .wp-block-buttons {
    margin: 1.85rem 0 !important;
}
.single-page-card .entry-content .wp-block-button__link,
.single-page-card .entry-content .btn,
.single-page-card .entry-content button:not(.page-toc-toggle):not(.btn-search-pill) {
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
.single-page-card .entry-content .wp-block-button__link:hover,
.single-page-card .entry-content .btn:hover,
.single-page-card .entry-content button:not(.page-toc-toggle):not(.btn-search-pill):hover {
    background: #D81B80 !important;
    color: #ffffff !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 25px rgba(216, 27, 128, 0.3) !important;
}

/* Gambar Proposional & Rata Tengah */
.single-page-card .entry-content img {
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
}
.single-page-card .entry-content figure,
.single-page-card .entry-content .wp-block-image {
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
.single-page-card .entry-content figure img,
.single-page-card .entry-content .wp-block-image img {
    margin: 0 !important;
    box-shadow: none !important;
    border-radius: 1.25rem 1.25rem 0 0 !important;
}

/* Blockquote & List & Table */
.single-page-card .entry-content blockquote {
    border-left: 4px solid #88C425;
    background: #EAF8D0;
    padding: 1.25rem 1.5rem;
    border-radius: 0 1rem 1rem 0;
    font-style: italic;
    margin: 1.75rem 0;
    color: #16361E;
}
.single-page-card .entry-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.75rem 0;
    border-radius: 0.85rem;
    overflow: hidden;
    border: 1px solid rgba(22, 54, 30, 0.1);
}
.single-page-card .entry-content th,
.single-page-card .entry-content td {
    padding: 0.85rem 1.1rem;
    border-bottom: 1px solid rgba(22, 54, 30, 0.08);
    font-size: 0.95rem;
    text-align: left;
}
.single-page-card .entry-content th {
    background: #F5FAF0;
    color: #16361E;
    font-weight: 800;
}

/* Table of Contents Box */
.page-toc-box {
    background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%);
    border: 1px solid rgba(136, 196, 37, 0.4);
    border-radius: 1.35rem;
    padding: 1.35rem 1.6rem;
    margin: 2rem 0 2.5rem;
    box-shadow: 0 4px 20px rgba(22, 54, 30, 0.04);
}
.page-toc-header {
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
.page-toc-toggle {
    font-size: 0.78rem;
    font-weight: 700;
    color: #D81B80;
    background: #ffffff;
    padding: 0.25rem 0.65rem;
    border-radius: 999px;
    cursor: pointer;
    border: 1px solid rgba(216, 27, 128, 0.2);
}
.page-toc-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}
.page-toc-item a {
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
.page-toc-item a:hover {
    color: #D81B80 !important;
    background: #ffffff;
    padding-left: 0.85rem;
}
.page-toc-item.toc-h3 {
    margin-left: 1.25rem;
    font-size: 0.88rem !important;
}

@media (max-width: 768px) {
    .single-page-card {
        padding: 2rem 1.5rem !important;
    }
}
</style>

<main id="main-content" class="single-generic-page">

    <!-- ═══ 1. ELEGANT PAGE HERO BANNER ═══ -->
    <?php orchid_page_hero(
        'INFORMASI & DEPO RESMI',
        get_the_title(),
        'PT Indotech Berkah Abadi — Sleman, D.I. Yogyakarta | Diperbarui: ' . $last_updated
    ); ?>

    <!-- ═══ 2. MAIN CONTENT SECTION ═══ -->
    <section style="padding: 4.5rem 0; background: #ffffff;">
        <div class="container">

            <div class="single-page-card">

                <?php if ($thumb_url) : ?>
                    <div style="position: relative; border-radius: 1.5rem; overflow: hidden; border: 1px solid rgba(22, 54, 30, 0.08); box-shadow: 0 10px 30px rgba(22, 54, 30, 0.06); background: #fafafa; margin-bottom: 2.5rem;">
                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; max-height: 480px; object-fit: cover; display: block;" onerror="this.onerror=null; this.src='<?php echo esc_url(ORCHID_URI . '/assets/img/logo.webp'); ?>'; this.classList.add('img-fallback-placeholder');">
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <!-- WA Direct Consultation Box -->
                <div style="background: linear-gradient(135deg, #F5FAF0 0%, #EAF8D0 100%); border: 1px solid rgba(136, 196, 37, 0.4); border-radius: 1.5rem; padding: 1.75rem 2rem; margin-top: 3rem; display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap;">
                    <div>
                        <h4 style="font-family: var(--font-display, sans-serif); color: #16361E; font-size: 1.2rem; font-weight: 800; margin: 0 0 0.35rem;">
                            Punya Pertanyaan Mengenai <?php echo esc_html(get_the_title()); ?>?
                        </h4>
                        <p style="color: rgba(22, 54, 30, 0.8); font-size: 0.92rem; margin: 0;">
                            Hubungi tim spesialis PT Indotech Berkah Abadi via WhatsApp untuk informasi produk, kemitraan, atau pasokan depo.
                        </p>
                    </div>
                    <a href="<?php echo esc_url($wa_url); ?>" target="_blank" rel="noopener" class="btn-search-pill" style="font-size: 0.95rem; padding: 0.8rem 1.8rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; flex-shrink: 0; box-shadow: none !important;">
                        <span>Konsultasi WA Sekarang &rarr;</span>
                    </a>
                </div>

            </div>

        </div>
    </section>

    <!-- ═══ 3. CTA BANNER PENUTUP ═══ -->
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
        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var entryContent = document.querySelector('.single-page-card .entry-content');
    if (!entryContent) return;

    var headings = entryContent.querySelectorAll('h2, h3');
    if (headings.length < 2) return;

    var tocBox = document.createElement('div');
    tocBox.className = 'page-toc-box';

    var tocHeader = document.createElement('div');
    tocHeader.className = 'page-toc-header';
    tocHeader.innerHTML = '<div style="display:flex;align-items:center;gap:0.5rem;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#88C425" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg><span>Daftar Isi Halaman</span></div><button type="button" class="page-toc-toggle">Sembunyikan ▴</button>';

    var tocList = document.createElement('ul');
    tocList.className = 'page-toc-list';

    headings.forEach(function (h, idx) {
        if (!h.id) {
            h.id = 'pg-sec-' + (idx + 1);
        }
        h.style.scrollMarginTop = '110px';

        var li = document.createElement('li');
        li.className = 'page-toc-item' + (h.tagName.toLowerCase() === 'h3' ? ' toc-h3' : '');

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

    var toggleBtn = tocHeader.querySelector('.page-toc-toggle');
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
});
</script>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
