<?php
//年別アーカイブ
function custom_news_rewrite_rule()
{
    add_rewrite_rule(
        '^news/([0-9]{4})/?',
        'index.php?post_type=news&year=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_news_rewrite_rule');

add_filter('wpmem_login_form_args', 'wpmem_login_form_argsrow_wrapper', 10, 2);
function wpmem_login_form_argsrow_wrapper($args, $tag)
{
    $args = array(
        'row_before' => '<div class="my-row-wrapper">',
        'row_after'  => '</div>',
    );
    return $args;
}

add_filter('wpmem_register_form_args', 'my_register_form_row_wrapper', 10, 2);
function my_register_form_row_wrapper($args, $tag)
{
    $args = array(
        'row_before' => '<div class="my-row-wrapper">',
        'row_after'  => '</div>',
    );
    return $args;
}


$defaults['txt_before'] = '<div class="myform__txt-before">フォームの直前に説明文などを挿入します。</div>';

add_action('wpmem_register_form_args', 'my_register_form_args', 10, 2);
function my_register_form_args($defaults, $tag)
{
    // 処理
    return $defaults;
}

//contact form 7 改行削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}

add_action('wp_print_styles', 'my_deregister_styles', 100);
function my_deregister_styles()
{
    wp_deregister_style('wp-pagenavi');
}

//ヘッダー非表示
add_filter('show_admin_bar', '__return_false');
