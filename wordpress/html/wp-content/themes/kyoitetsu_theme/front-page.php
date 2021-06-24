<?php get_header(); ?>
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

        <?php
          $args = array(
          'posts_per_page' => 4 // 表示件数
          );
          $posts = get_posts( $args );
          $new_each_count = 0;
          foreach ( $posts as $post ): // ループの開始
            setup_postdata( $post ); // 記事データの取得
        ?>
          <!--ループ-->

          <?php
            $key = array_search(get_the_ID(), $GLOBALS['new_label_array']);
          ?>
          <article class="article__item">

              <li class="news-list__item new-news<?php if($key <= 2 && get_post_meta(get_the_ID(), 'custom_new_label_checkbox', true) == 'is-on'){echo ' show-new-label';}else{echo ' hide-new-label';}?>">
                  <dl class="news-detail">
                  <dt class="news-detail__day"><?php the_time('Y-m-d') ?></dt>
                  <dd class="news-detail__txt"><a class="news-detail__txt--link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                </dl>
              </li>
          </article>
          <!--//ループ-->
        <?php
          endforeach; // ループの終了
        ?>
      </ul>
      <div class="green-btn"><a href="<?php current_directory(); ?>/news/">お知らせ一覧を見る</a></div>
    </section>

    <?php else: ?>
      <!--投稿が見つからない-->
      <p>未分類投稿が見つからない</p>
      <!--//投稿が見つからない-->
    <?php endif; ?>
  </div>

<?php get_footer(); ?>