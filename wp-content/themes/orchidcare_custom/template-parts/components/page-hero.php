<?php
/**
 * Component: Uniform Page Hero Banner for Inner Pages
 * Used across Catalog, About, Contact, Blog, FAQ, Legal, and Single pages.
 */
$badge  = isset($args['badge']) ? $args['badge'] : '';
$title  = isset($args['title']) ? $args['title'] : get_the_title();
$lead   = isset($args['lead']) ? $args['lead'] : '';
$button = isset($args['button']) ? $args['button'] : null;
?>
<section class="page-hero-banner">
    <div class="page-hero-bg">
        <div class="page-hero-shape page-hero-shape--1"></div>
        <div class="page-hero-shape page-hero-shape--2"></div>
    </div>
    <div class="container">
        <div class="page-hero-content text-center reveal is-visible">
            <div class="page-hero-breadcrumbs">
                <?php orchid_breadcrumbs(); ?>
            </div>
            <?php if ($badge) : ?>
                <span class="chip-tag chip-tag--coral"><?php echo esc_html($badge); ?></span>
            <?php endif; ?>
            <h1 class="page-hero-title"><?php echo esc_html($title); ?></h1>
            <?php if ($lead) : ?>
                <p class="page-hero-lead"><?php echo esc_html($lead); ?></p>
            <?php endif; ?>
            <?php if (!empty($button) && is_array($button)) : ?>
                <div class="page-hero-actions" style="margin-top: 1.75rem;">
                    <a href="<?php echo esc_url($button['url']); ?>" class="btn btn-coral btn-lg">
                        <?php echo esc_html($button['text']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
