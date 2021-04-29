<?php get_header() ?>
<article>
    <span><?php the_time('Y/m/d'); ?></span>
    <h1><?php the_title(); ?></h1>
    <div>
        <?php the_content(); ?>
    </div>
</article>
<?php get_footer() ?>