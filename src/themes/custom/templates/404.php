<?php
// 404.php

get_header(); // ヘッダーのテンプレートパーツを呼び出します。
?>

<main class="wp-block-group">
    <div class="wp-block-group">
        <?php
        // パターンを呼び出すためのコード
        if ( function_exists( 'do_blocks' ) ) {
            echo do_blocks( '<!-- wp:pattern {"slug":"twentytwentytwo/hidden-404"} /-->' );
        }
        ?>
    </div>
</main>

<?php
get_footer(); // フッターのテンプレートパーツを呼び出します。
?>