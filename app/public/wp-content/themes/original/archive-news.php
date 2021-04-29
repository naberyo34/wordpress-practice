<?php get_header() ?>
<div>
    <h1><?php the_archive_title(); ?></h1>
    <?php if(have_posts()): ?>
    <ul>
        <?php while(have_posts()):the_post(); ?>
            <li>
                <span><?php the_time('Y/m/d'); ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
</div>
<?php get_footer() ?>