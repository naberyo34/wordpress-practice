<?php get_header() ?>
<article>
    <span><?php the_time('Y/m/d'); ?></span>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php the_content(); ?>
        <small>執筆者: <?php echo get_post_meta($post->ID, 'author', true); ?></small>
    </div>
</article>
<?php get_footer() ?>