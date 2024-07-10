<?php
  $page_id = get_the_ID(); 
  ?>
<?php get_header(); ?>


        <div class="recruit_detail_page">
            <div class="page_kv">
    <div class="page_kv__inner">
        <div class="page_kv_texts">
            <div class="page_kv_texts__img">
                <img class="is-pc" src="/assets/img/recruit/txt_kv_main.svg" alt="" />
                <img class="is-sp" src="/assets/img/recruit/txt_kv_main.svg" alt="" />
            </div>
            <h1 class="page_kv_texts__title">求人</h1>
            <p class="page_kv_texts__text">RECRUIT</p>
        </div>
    </div>
</div>

                <div class="recruit_block">
                    <div class="recruit_block__inner">
                        <div class="side_block">
                            <span class="side_block__title">募集中の仕事</span>
                        </div>
                        <section class="main_block">
                        <ul>
                        <?php $terms = get_the_terms($post->ID, 'recruit-cate'); ?>
                        <?php if($terms): ?>
                            <?php foreach($terms as $term): ?>
                            <span class="main_block__tag"><?php echo $term->name; ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </ul>
                            <h2 class="main_block__title"><?= the_title() ;?></h2>
                            <dl class="main_block__dl">


                                <?php if(have_rows('requirements')): ?>
                                <?php while(have_rows('requirements')): the_row(); ?>
                                    <dt class="main_block__dt"><?php the_sub_field('heading'); ?></dt>
                                    <dd class="main_block__dd"><?php the_sub_field('content_txt'); ?></dd>
                                <?php endwhile; ?>
                                <?php endif; ?>

                            </dl>
                        </section>
                    </div>
                    <div class="recruit_bottom recruit_bottom--big">
                        <a href="<?php the_field('conatct_url'); ?>" class="recruit_bottom__button" target="_blank">お問い合わせはこちら</a>
                    </div>
                    <div class="recruit_bottom">
                        <a href="/recruit/" class="recruit_bottom__button">求人一覧へ</a>
                    </div>
                </div>
                
        </div>

<?php get_footer(); ?>