<?php
// テーマのセットアップ
function custom_theme_setup()
{
	add_theme_support('title-tag'); // ページタイトルを自動設定
	add_theme_support('post-thumbnails'); // アイキャッチ画像のサポート
}
add_action('after_setup_theme', 'custom_theme_setup');


// スタイルシートの読み込み
function custom_theme_enqueue_styles()
{
	wp_enqueue_style('custom_theme_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');


// 'template_include' フィルターを使用して、テンプレートの読み込みパスをカスタマイズします。
function use_templates_folder($template)
{
	$new_template = str_replace(get_template_directory(), get_template_directory() . '/templates', $template);

	if (file_exists($new_template)) {
		return $new_template;
	}

	return $template;
}
add_filter('template_include', 'use_templates_folder', 99);



/** ------------------------------------------ */
/** --------------- カスタム関数 --------------- */
/** ------------------------------------------ */


/**
 * カスタム関数: components フォルダからテンプレートファイルを読み込む
 * 
 * @param string $name ファイル名（拡張子は省略）
 */
function get_component($name)
{
	$file = get_template_directory() . "/components/{$name}.php";

	// ファイルが存在すれば読み込む
	if (file_exists($file)) {
		include($file);
	} else {
		// デバッグ用にファイルが見つからない場合のメッセージ
		echo "<!-- Component {$file} not found in components directory -->";
	}
}