<?php
/**
 * Custom Comments Template for Orchid Care Theme
 * File: comments.php
 */

if (post_password_required()) {
    return;
}

$comment_count = get_comments_number();
?>

<section id="comments" class="comments-area" style="margin-top: 3.5rem; border-top: 1px solid rgba(22, 54, 30, 0.08); padding-top: 3rem;">

    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
        <h3 style="font-family: var(--font-display, 'Baloo 2', sans-serif); color: #16361E; font-size: 1.5rem; font-weight: 800; margin: 0; display: flex; align-items: center; gap: 0.55rem;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#88C425" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            <span>Komentar &amp; Diskusi</span>
            <span style="background: #EAF8D0; color: #16361E; font-size: 0.85rem; font-weight: 800; padding: 0.25rem 0.75rem; border-radius: 999px; font-family: var(--font-mono, monospace);">
                <?php echo esc_html($comment_count); ?>
            </span>
        </h3>
    </div>

    <?php if (have_comments()) : ?>
        <ol class="comment-list" style="list-style: none; padding: 0; margin: 0 0 2.5rem;">
            <?php
            wp_list_comments([
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => 'orchid_comment_callback',
            ]);
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" style="display: flex; justify-content: space-between; margin-bottom: 2rem;">
                <div class="nav-previous"><?php previous_comments_link('&larr; Komentar Lama'); ?></div>
                <div class="nav-next"><?php next_comments_link('Komentar Baru &rarr;'); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <div style="background: #fafafa; border: 1px solid rgba(22,54,30,0.08); padding: 1.25rem; border-radius: 1rem; text-align: center; color: rgba(22,54,30,0.6); font-weight: 600;">
            Komentar telah ditutup untuk artikel ini.
        </div>
    <?php endif; ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req       = get_option('require_name_email');
    $aria_req  = ($req ? " aria-required='true'" : '');

    $fields = [
        'author' => '<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;" class="comment-form-fields-wrap">
            <div>
                <label for="author" style="display: block; font-weight: 700; color: #16361E; font-size: 0.88rem; margin-bottom: 0.35rem;">Nama Lengkap ' . ($req ? '<span style="color:#D81B80;">*</span>' : '') . '</label>
                <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' placeholder="Masukkan nama Anda..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid rgba(22,54,30,0.15); border-radius: 0.85rem; font-size: 0.95rem; outline: none; background: #ffffff; color: #16361E;">
            </div>',
        'email'  => '<div>
                <label for="email" style="display: block; font-weight: 700; color: #16361E; font-size: 0.88rem; margin-bottom: 0.35rem;">Email ' . ($req ? '<span style="color:#D81B80;">*</span>' : '') . '</label>
                <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' placeholder="nama@email.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid rgba(22,54,30,0.15); border-radius: 0.85rem; font-size: 0.95rem; outline: none; background: #ffffff; color: #16361E;">
            </div>
        </div>',
        'cookies' => '<p class="comment-form-cookies-consent" style="font-size: 0.85rem; color: rgba(22,54,30,0.7); margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . (empty($commenter['comment_author_email']) ? '' : ' checked="checked"') . ' style="accent-color: #16361E; width: 16px; height: 16px;">
            <label for="wp-comment-cookies-consent">Simpan nama &amp; email saya pada peramban ini untuk komentar berikutnya.</label>
        </p>',
    ];

    comment_form([
        'fields'               => $fields,
        'comment_field'        => '<div style="margin-bottom: 1.25rem;">
            <label for="comment" style="display: block; font-weight: 700; color: #16361E; font-size: 0.88rem; margin-bottom: 0.35rem;">Komentar / Pertanyaan <span style="color:#D81B80;">*</span></label>
            <textarea id="comment" name="comment" cols="45" rows="4" required placeholder="Tuliskan tanggapan atau pertanyaan Anda mengenai artikel ini..." style="width: 100%; padding: 0.85rem 1rem; border: 1px solid rgba(22,54,30,0.15); border-radius: 1rem; font-size: 0.95rem; outline: none; background: #ffffff; color: #16361E; line-height: 1.6; resize: vertical;"></textarea>
        </div>',
        'must_log_in'          => '<p class="must-log-in" style="font-size: 0.9rem; color: rgba(22,54,30,0.8); margin-bottom: 1.5rem;">Anda harus <a href="' . wp_login_url(apply_filters('the_permalink', get_permalink())) . '" style="color: #D81B80; font-weight: 700;">login</a> untuk mengirim komentar.</p>',
        'logged_in_as'         => '<p class="logged-in-as" style="font-size: 0.88rem; color: rgba(22,54,30,0.75); margin-bottom: 1.25rem;">Login sebagai <strong style="color: #16361E;">' . wp_get_current_user()->display_name . '</strong>. <a href="' . wp_logout_url(apply_filters('the_permalink', get_permalink())) . '" style="color: #D81B80; font-weight: 700; text-decoration: underline;">Keluar?</a></p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'title_reply'          => 'Tulis Komentar',
        'title_reply_to'       => 'Balas Komentar kepada %s',
        'cancel_reply_link'    => 'Batal Balas ✕',
        'label_submit'         => 'Kirim Komentar Sekarang →',
        'class_container'      => 'comment-respond-card',
        'class_form'           => 'orchid-comment-form',
        'class_submit'         => 'btn-search-pill submit-comment-btn',
        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" style="font-size: 0.95rem; padding: 0.85rem 2rem; background: #16361E; color: #ffffff; font-weight: 800; border-radius: 999px; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.2s ease;">%4$s</button>',
    ]);
    ?>

</section>
