<?php get_header(); ?>
<main class="main">
  <div class="mv">
    <div class="container">
      <p class="catch-copy"><span class="catch-copy__line">フェアコンサルティンググループ</span><span class="catch-copy__line">グローバル投資プラットフォーム</span></p>
      <p class="mv-txt">直営のグローバル拠点に多数の日本人専門家を擁するフェアコンサルティンググループから<br>各国・各拠点におけるグローバル投資情報を提供いたします</p>
    </div>
  </div>
  <div class="container">
  <?php if ( have_posts() ): ?>

    <section class="sec-news" id="news">
      <h2 class="sec-ttl">お知らせ<span class="sec-ttl__en">NEWS</span></h2>
      <ul class="news-list">
          <?php while ( have_posts() ) : the_post(); ?>
              <!--ループ-->
              <article class="article__item">

                  <li class="news-list__item new-news">
                      <dl class="news-detail">
                      <dt class="news-detail__day"><?php the_time('Y-m-d') ?></dt>
                      <dd class="news-detail__txt"><a class="news-detail__txt--link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                    </dl>
                  </li>
              </article>
              <!--//ループ-->
          <?php endwhile; ?>
              <!--ページ送り-->
              <nav class="pagenav">
              <?php
                //Pagination 
                if ( function_exists( "pagination" ) ) {
                  pagination( $additional_loop->max_num_pages );
                }
              ?>
              </nav>
              <!--//ページ送り-->

      </ul>
    </section>

    <?php else: ?>
      <!--投稿が見つからない-->
      <p>投稿が見つからない</p>
      <!--//投稿が見つからない-->
    <?php endif; ?>
  </div>
</main>






<?php get_footer(); ?>