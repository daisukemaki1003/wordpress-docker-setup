<?php get_header(); ?>


<div class="cases_page">
    <div class="cases_block">
        <div class="cases_header">
            <span class="cases_header__sub_title">CASES</span>
            <h1 class="cases_header__title">案件を探す</h1>
        </div>
        <section class="case_section">
            <div class="case_sidebar">
                <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                    <h2 class="case_sidebar__buget_title">予算：</h2>
                    <div class="case_sidebar__select_container">
                        <div class="case_sidebar__select_wrap">
                            <select>
                                <option selected disabled hidden>予算下限</option>
                                <option value="0">0</option>
                                <option value="10000000">1,000万</option>
                                <option value="30000000">3,000万</option>
                                <option value="100000000">1億</option>
                            </select>
                        </div>
                        <div class="case_sidebar__select_wrap">
                            <select>
                                <option selected disabled hidden>予算上限</option>
                                <option value="0">0</option>
                                <option value="10000000">1,000万</option>
                                <option value="30000000">3,000万</option>
                                <option value="100000000">1億</option>
                            </select>
                        </div>
                    </div>


                    <section class="case_sidebar__freeword">
                        <h2 class="case_sidebar__freeword_title">フリーワード検索：</h2>
                        <div class="case_sidebar__search_box">
                            <!-- <input type="text" placeholder="キーワードを入力"> -->
                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
                        </div>
                    </section>
                    <button class="case_sidebar__search_btn">検索する</button>
                </form>
            </div>

            <main class="case_main">
                <div class="case_main__header">
                    <div class="case_main__sort_wrap">
                        <p class="case_main__title">全件を表示中</p>

                        <div class="case_main__select_for_icon">
                            <p class="case_main__sort_subtitle"><img src="/assets/img/common/ico_sort.svg" alt="">並び替え：
                            </p>
                            <select class="date_sort" id="date_sort">
                                <option value="release_date">公開日</option>
                                <option value="update_dateupdate_date">更新日</option>
                            </select>
                        </div>
                    </div>
                    <div class="wp-pagenavi small">
                        <?php wp_pagenavi(); ?>
                        <!-- 
                        <span class="pages"></span>
                        <a class="previouspostslink" rel="prev" href="/example.com/blogs/"></a>
                        <a class="page smaller" title="Page 1" href="/example.com/blogs/">1</a>
                        <span class="current">2</span>
                        <a class="page larger" title="Page 3" href="/example.com/blogs/page/3/">3</a>
                        <a class="page larger" title="Page 4" href="/example.com/blogs/page/4/">4</a>
                        <a class="page larger" title="Page 5" href="/example.com/blogs/page/5/">5</a>
                        <a class="nextpostslink" rel="next" href="/example.com/blogs/page/3/"></a> -->
                    </div>
                </div>
                <div class="case_main__list_container">
                    <ul class="case_main__list">

                        <?php
                        $args = array(
                            'post_type' => 'case',
                            'paged' => get_query_var('paged'),
                        );
                        $the_query = new WP_query($args);
                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <!-- このlistにnewを付けてます。 -->
                                <li class="case_main__list_item new">
                                    <a href="<?= get_permalink($the_query->ID); ?>">
                                        <h1>Registered Title: <?= the_title(); ?></h1>
                                        <div class="case_main__wrap">
                                            <div class="case_main__list_tag">
                                                <div>希望価格：<?php the_field('suggested_price'); ?></div>
                                                <div>地域：<?php the_field('area'); ?></div>
                                                <div>事業内容：<?php the_field('our_business'); ?></div>
                                            </div>

                                            <div class="case_main__list_time">
                                                <?php
                                                $release_date = get_field('release_date');
                                                if ($release_date) {
                                                    $release_date_obj = new DateTime($release_date);
                                                    echo '<p>RELEASE DATE：' . $release_date_obj->format('Y年m月d日') . '</p>';
                                                }
                                                ?>
                                                <?php
                                                $update_date = get_field('update_dateupdate_date');
                                                if ($update_date) {
                                                    $update_date_obj = new DateTime($update_date);
                                                    echo '<p>UPDATE DATE TEST：' . $update_date_obj->format('Y年m月d日') . '</p>';
                                                }
                                                ?>
                                            </div>


                                            <!-- <div class="case_main__list_time">
                                                <p>RELEASE DATE：<?php the_field('release_date'); ?></p>
                                                <p>UPDATE DATE TEST：<?php the_field('update_dateupdate_date'); ?></p>
                                            </div> -->
                                        </div>
                                    </a>
                                </li>
                                <!-- ここはclose -->

                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); //クエリのリセット 
                        ?>



                        <!-- 
                        <li class="case_main__list_item close">
                            <a href="">
                                <h1>Registered Title: Illustration Assets for Social Games</h1>

                                <div class="case_main__wrap">
                                    <div class="case_main__list_tag">
                                        <div>希望価格：300万</div>
                                        <div>地域：日本</div>
                                        <div>事業内容：女性向けアプリ</div>
                                    </div>

                                    <div class="case_main__list_time">
                                        <p>RELEASE DATE：2000.00.00</p>
                                        <p>UPDATE DATE：2000.00.00</p>
                                    </div>
                                </div>
                            </a>
                        </li> -->

                        <!-- 通常版 -->
                        <!-- <li class="case_main__list_item">
                            <a href="">
                                <h1>Registered Title: Illustration Assets for Social Games</h1>

                                <div class="case_main__wrap">
                                    <div class="case_main__list_tag">
                                        <div>希望価格：300万</div>
                                        <div>地域：日本</div>
                                        <div>事業内容：女性向けアプリ</div>
                                    </div>

                                    <div class="case_main__list_time">
                                        <p>RELEASE DATE：2000.00.00</p>
                                        <p>UPDATE DATE：2000.00.00</p>
                                    </div>
                                </div>
                            </a>
                        </li> -->
                    </ul>

                </div>
                <div class="wp-pagenavi_bottom"><?php wp_pagenavi(); ?></div>
            </main>
        </section>
    </div>
</div>
<?php get_footer(); ?>
<script>
    document.getElementById('date_sort').addEventListener('change', function() {
        var selectedValue = this.value; // 選択された値を取得
        var targetUrl = '/?s=&date_sort=' + selectedValue; // パラメータを追加したURLを構築
        window.location.href = targetUrl; // 構築したURLにリダイレクト
    });
</script>