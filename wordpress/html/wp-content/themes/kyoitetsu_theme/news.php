<?php if ( have_posts() ) : ?>
    <article class="article__item">
        <?php while ( have_posts() ) : the_post(); ?>
        <!--ループ-->
        <header class="article__head">
            <h1 class="ttl"><?php the_title(); ?></h1>
            <time class="date"><?php the_time('Y-m-d') ?>&nbsp;<?php the_time(); ?></time>
        </header>
        <div class="article__body">
            <?php the_content(); ?>
        </div>
        <!--//ループ-->
        <?php endwhile; ?>
        <!--ページ送り-->
        <div class="article__foot">
            <span class="prev"><?php previous_post_link('<strong>&laquo;&nbsp;%link</strong>','前の記事：%title'); ?></span>
            <span class="next"><?php next_post_link('<strong>%link&nbsp;&raquo;</strong>','次の記事：%title'); ?></span>
        </div>
        <!--//ページ送り-->
    </article>
<?php else: ?>
    <!--投稿が見つからない-->
    <p>Not Found.</p>
    <!--//投稿が見つからない-->
<?php endif; ?>