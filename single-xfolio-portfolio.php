<?php
/**
 * The template for displaying single portfolio items
 */

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large'); ?>
    <?php endif; ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>

    <?php 
    $tools_used = get_post_meta(get_the_ID(), '_xfolio_tools_used', true);
    if ($tools_used) : ?>
        <div class="xfolio-portfolio-tools">
            <h3><?php esc_html_e('Tools Used', 'xfolio'); ?></h3>
            <div class="xfolio-tools-list">
                <?php echo wp_kses_post(nl2br($tools_used)); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php 
    $preview_url = get_post_meta(get_the_ID(), '_xfolio_preview_url', true);
    if ($preview_url) : ?>
        <div class="xfolio-portfolio-preview">
            <a href="<?php echo esc_url($preview_url); ?>" class="xfolio-preview-button" target="_blank" rel="noopener">
                <?php esc_html_e('Live Preview', 'xfolio'); ?>
                <svg class="xfolio-external-link" width="16" height="16" viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                </svg>
            </a>
        </div>
    <?php endif; ?>
</article>

<?php
get_footer(); ?> 