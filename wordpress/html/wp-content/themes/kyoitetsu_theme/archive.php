<?php get_header(); ?>
<main class="main">
  <div class="mv">
    <div class="container">
      <p class="catch-copy"><span class="catch-copy__line">フェアコンサルティンググループ</span><span class="catch-copy__line">グローバル投資プラットフォーム</span></p>
      <p class="mv-txt">直営のグローバル拠点に多数の日本人専門家を擁するフェアコンサルティンググループから<br>各国・各拠点におけるグローバル投資情報を提供いたします</p>
    </div>
  </div>
  <div class="container">
  <?php if ( have_posts() ): $new_each_count = 0;?>

    <?php
      $news_args = array(
      'numberposts' => 1000000,
      'category' => get_cat_ID( 'news' )
      );
      $news_posts = get_posts( $news_args );
      $new_label_array = [];
      foreach ( $news_posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
        if(get_post_meta(get_the_ID(), 'custom_new_label_checkbox', true) == 'is-on'){
          array_push($new_label_array, get_the_ID());
        }
    ?>
    <?php
      endforeach; // ループの終了
      wp_reset_postdata();
    ?>
    <section class="sec-news" id="news">
      <h2 class="sec-ttl">お知らせ<span class="sec-ttl__en">NEWS</span></h2>
      <ul class="news-list">
          <?php while ( have_posts() ) : the_post(); ?>
              <!--ループ-->
              <article class="article__item">

                  <?php
                    $key = array_search(get_the_ID(), $GLOBALS['new_label_array']);
                  ?>
                  <li class="news-list__item new-news<?php if($key <= 2 && get_post_meta(get_the_ID(), 'custom_new_label_checkbox', true) == 'is-on'){echo ' show-new-label';}else{echo ' hide-new-label';}?>">
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