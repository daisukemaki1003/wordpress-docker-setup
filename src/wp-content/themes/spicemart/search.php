<?php get_header();

$sort_by = isset($_GET['date_sort']) ? $_GET['date_sort'] : 'release_date'; // デフォルト値を指定
$min_budget = isset($_GET['min_budget']) && $_GET['min_budget'] !== "" ? intval($_GET['min_budget']) : null;
$max_budget = isset($_GET['max_budget']) && $_GET['max_budget'] !== "" ? intval($_GET['max_budget']) : null;
$keyword = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$meta_query = array('relation' => 'AND');
if ($min_budget !== null) {
    $meta_query[] = array(
        'key' => 'budgetary_limit',
        'value' => $min_budget,
        'type' => 'NUMERIC',
        'compare' => '>='
    );
}
if ($max_budget !== null) {
    $meta_query[] = array(
        'key' => 'Budget_Lower_Limit',
        'value' => $max_budget,
        'type' => 'NUMERIC',
        'compare' => '<='
    );
}

$args = array(
    'post_type' => 'case',
    's' => $keyword,
    'paged' => $paged,
    'posts_per_page' => 10,
    'meta_query' => $meta_query,
    'meta_key' => $sort_by, // ソートするカスタムフィールドを指定
    'orderby' => 'meta_value', // カスタムフィールドでソート
    'order' => 'DESC' // 降順
);

$query = new WP_Query($args);
?>


<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="cases_page">
        <div class="cases_block">
            <div class="cases_header">
                <span class="cases_header__sub_title">CASES</span>
                <h1 class="cases_header__title">案件を探す</h1>
            </div>
            <section class="case_section">
                <div class="case_sidebar">

                    <h2 class="case_sidebar__buget_title">予算：</h2>
                    <div class="case_sidebar__select_container">
                        <div class="case_sidebar__select_wrap">
                            <select name="min_budget">
                                <option value="" disabled hidden <?php echo (!isset($_GET['min_budget']) || $_GET['min_budget'] === "") ? 'selected' : ''; ?>>予算下限</option>
                                <option value="0" <?php echo (isset($_GET['min_budget']) && $_GET['min_budget'] == "0") ? 'selected' : ''; ?>>0</option>
                                <option value="10000000" <?php echo (isset($_GET['min_budget']) && $_GET['min_budget'] == "10000000") ? 'selected' : ''; ?>>1,000万</option>
                                <option value="30000000" <?php echo (isset($_GET['min_budget']) && $_GET['min_budget'] == "30000000") ? 'selected' : ''; ?>>3,000万</option>
                                <option value="100000000" <?php echo (isset($_GET['min_budget']) && $_GET['min_budget'] == "100000000") ? 'selected' : ''; ?>>1億</option>
                            </select>
                        </div>
                        <div class="case_sidebar__select_wrap">
                            <select name="max_budget">
                                <option value="" disabled hidden <?php echo (!isset($_GET['max_budget']) || $_GET['max_budget'] === "") ? 'selected' : ''; ?>>予算上限</option>
                                <option value="0" <?php echo (isset($_GET['max_budget']) && $_GET['max_budget'] == "0") ? 'selected' : ''; ?>>0</option>
                                <option value="10000000" <?php echo (isset($_GET['max_budget']) && $_GET['max_budget'] == "10000000") ? 'selected' : ''; ?>>1,000万</option>
                                <option value="30000000" <?php echo (isset($_GET['max_budget']) && $_GET['max_budget'] == "30000000") ? 'selected' : ''; ?>>3,000万</option>
                                <option value="100000000" <?php echo (isset($_GET['max_budget']) && $_GET['max_budget'] == "100000000") ? 'selected' : ''; ?>>1億</option>
                            </select>
                        </div>
                    </div>

                    <section class="case_sidebar__freeword">
                        <h2 class="case_sidebar__freeword_title">フリーワード検索：</h2>
                        <div class="case_sidebar__search_box case_sidebar__search_box--hit">
                            <!-- <input type="text" placeholder="キーワードを入力"> -->

                            <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />

                        </div>
                    </section>
                    <button class="case_sidebar__search_btn">検索する</button>

                </div>

                <main class="case_main">
                    <div class="case_main__header">
                        <div class="case_main__sort_wrap">
                            <p class="case_main__title"><?php the_search_query(); ?>の検索結果 : <?php echo $query->found_posts; ?>件</p>
                            <div class="case_main__select_for_icon">
                                <p class="case_main__sort_subtitle"><img src="/assets/img/common/ico_sort.svg" alt="">並び替え：</p>
                                <select class="date_sort" id="date_sort">
                                    <option value="release_date" <?php echo (isset($_GET['date_sort']) && $_GET['date_sort'] == 'release_date') ? 'selected' : ''; ?>>公開日</option>
                                    <option value="update_dateupdate_date" <?php echo (isset($_GET['date_sort']) && $_GET['date_sort'] == 'update_dateupdate_date') ? 'selected' : ''; ?>>更新日</option>
                                </select>
                            </div>
                        </div>
                        <div class="wp-pagenavi small">
                            <?php wp_pagenavi(array('query' => $query)); ?>
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
                            <article>
                                <?php
                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post(); ?>
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
                                                        <p>RELEASE DATE：<?php the_field('release_date'); ?></p>
                                                        <p>UPDATE DATE：<?php the_field('update_dateupdate_date'); ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- ここはclose -->
                                    <?php endwhile;
                                else : ?>
                                    <dd>記事が見つかりませんでした</dd>
                                <?php endif; ?>
                        </ul>
                    </div>
                    <div class="wp-pagenavi_bottom"><?php wp_pagenavi(array('query' => $query)); ?></div>
                </main>
            </section>
        </div>
    </div>
</form>
<?php get_footer(); ?>
<script>
    document.getElementById('date_sort').addEventListener('change', function() {
        var selectedValue = this.value; // 選択された値を取得
        var targetUrl = '/?s=<?php the_search_query(); ?>&date_sort=' + selectedValue; // パラメータを追加したURLを構築
        window.location.href = targetUrl; // 構築したURLにリダイレクト
    });
</script>