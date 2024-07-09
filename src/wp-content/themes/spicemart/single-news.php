<?php
  $page_id = get_the_ID(); 
  ?>
<?php get_header(); ?>
        <div class="news_detail_page">
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

                <div class="news_detail_block">
                    <div class="news_detail_block__inner">
                        <div class="side_block">
                            <p class="side_block__title">アーカイブ</p>
                            <ul class="side_block__list">
                               <?php wp_get_archives( 'type=yearly&post_type=news&show_post_count=1' ); ?>
                            </ul>
                        </div>
                        <div class="main_block">
                            <h1 class="main_block__title"><?= the_title() ;?></h1>
                            <div class="main_block__thumbnail">
                            <?php the_post_thumbnail('full'); ?>
                            </div>
                            <p class="main_block__text">
                            <?php the_content(); ?>
                            </p>
                            <div class="c-btn-wrapper">
                                <a href="/news" class="c-btn c-btn--orange">News 一覧へ</a>
                            </div>
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