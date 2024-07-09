<?php get_header(); ?>
<div class="news_page">
            <div class="page_kv">
    <div class="page_kv__inner">
        <div class="page_kv_texts">
            <div class="page_kv_texts__img">
                <img class="is-pc" src="/assets/img/news/txt_kv_main.svg" alt="" />
                <img class="is-sp" src="/assets/img/news/txt_kv_main.svg" alt="" />
            </div>
            <h1 class="page_kv_texts__title">お知らせ</h1>
            <p class="page_kv_texts__text">News</p>
        </div>
    </div>
</div>

                <div class="news_block">
                    <div class="news_block__inner">
                        <div class="side_block">
                            <p class="side_block__title">アーカイブ</p>
                            <ul class="side_block__list">
                                <?php wp_get_archives( 'type=yearly&post_type=news&show_post_count=1' ); ?>
                            </ul>
                        </div>
                        <div class="main_block">
                            <ul class="main_block__list">
                            <?php
                            $args = array(
          'posts_per_page' => 5,
          'post_type' => 'news',
          'paged' => get_query_var( 'paged' ),
          );
          $the_query = new WP_query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); ?>
             <li class="main_block__item">
              <a href="<?= get_permalink($the_query->ID); ?>">
                <p class="main_block__date"><?= get_the_date( 'Y.m.d' ); ?></p>
                <p class="main_block__title"><?= the_title() ;?></p>
              </a>
            </li>
          <?php endwhile; ?>
          <?php endif;
          wp_reset_postdata(); //クエリのリセット ?>
                            </ul>
                            <?php if( function_exists('wp_pagenavi') ) { wp_pagenavi(array('query' => $the_query)); } ?>
                        </div>
                    </div>
                </div>
        </div>
        <div class="cta_block">
    <div class="cta_block__inner">
        <a href="/contact">
            <div class="cta_block_contents">
                <p class="cta_block_contact_title">CONTACT</p>
                <h2 class="cta_block_contact_img"><img src="/assets/img/common/logo_contact.svg" alt="CONTACT" /></h2>
                <p class="cta_block_contact_text">お問い合わせ</p>
            </div>
        </a>
        <a href="/recruit">
            <div class="cta_block_contents cta_block_contents--recruit">
                <p class="cta_block_contact_title">RECRUIT</p>
                <h2 class="cta_block_contact_img">
                    <img src="/assets/img/common/logo_recruit.svg" alt="CONTACT" />
                </h2>
                <p class="cta_block_contact_text">求人</p>
            </div>
        </a>
    </div>
</div>
<?php get_footer(); ?>