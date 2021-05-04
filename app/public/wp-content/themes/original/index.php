<?php get_header() ?>
<section class="mv"><h1 class="mv__title">トップページ</h1></section>
<section class="section">
    <div class="section__inner">
    <h2 class="section__heading">最新の実績</h2>
        <div class="section__linkWrapper">
        <div class="section__linkSlideWrapper js-slick">
        <?php
            $args = array(
                'numberposts' => 4,
                'post_type' => 'works',
                'order' => 'DESC');
            $works = get_posts($args)
        ?>
        <?php foreach ($works as $post): setup_postdata($post); ?>
            <div class="section__linkSlide">
                <div class="section__linkSlideInner">
                    <div class="section__linkImage"></div>
                    <a class="section__link" href="<?php echo get_permalink($post->ID); ?>">
                        <?php echo get_the_title($post->ID); ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        </div>
    </div>
</section>
<section class="section">
<div class="section__inner">
<h2 class="section__heading">最新のニュース</h2>
    <div class="section__linkWrapper">
    <?php
        $args = array(
            'numberposts' => 4,
            'post_type' => 'news',
            'order' => 'DESC');
        $news = get_posts($args)
    ?>
    <?php foreach ($news as $post): setup_postdata($post); ?>
        <div class="section__news">
            <span class="section__date"><?php the_time('Y/m/d'); ?></span>
            <a class="section__link" href="<?php echo get_permalink($post->ID); ?>">
                <?php echo get_the_title($post->ID); ?>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>
</section>
<?php get_footer() ?>