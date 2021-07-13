
  <?php if ( have_posts() ): ?>
      <ul class="news_carousel news-list">

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

    <?php else: ?>
    <?php endif; ?>

    
  </div>