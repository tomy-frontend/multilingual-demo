<?php

// WordPressの機能を拡張する処理
function my_setup()
{
    // 投稿のアイキャッチ画像を表示する処理
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
}
add_action("after_setup_theme", "my_setup");


// CSS読み込み
function my_script_init()
{
    error_log("my_script_init");

    // CSS
    wp_enqueue_style("my-reset-style", "https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css", array(), null, "all");
    wp_enqueue_style("my-style", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path("/css/style.css")), "all");
    wp_enqueue_script("my-script", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path("/js/script.js")), true);
}
add_action("wp_enqueue_scripts", "my_script_init");


//カスタム投稿をBOGO対応に
function my_localizable_post_types($localizable)
{
    $custom_post_types = array('location', 'members');
    return array_merge($localizable, $custom_post_types);
}
add_filter('bogo_localizable_post_types', 'my_localizable_post_types', 10, 1);

// Bogoの言語スイッチャーの国旗を非表示
add_filter('bogo_use_flags', 'bogo_use_flags_false');
function bogo_use_flags_false()
{
    return false;
}

// Bogoの言語スイッチャーの表記を変更
add_filter('bogo_language_switcher_links', function ($links) {
    for ($i = 0; $i < count($links); $i++) {
        if ('ja' === $links[$i]['locale']) { // 日本語の場合
            $links[$i]['title'] = 'JP'; // JPが変更後のテキスト
            $links[$i]['native_name'] = 'JP'; // JPが変更後のテキスト
        }
        if ('en_US' === $links[$i]['locale']) { // 英語の場合
            $links[$i]['title'] = 'EN'; // ENが変更後のテキスト
            $links[$i]['native_name'] = 'EN'; // ENが変更後のテキスト
        }
        if ('ar' === $links[$i]['locale']) { // アラビア語の場合
            $links[$i]['title'] = 'AR'; // ARが変更後のテキスト
            $links[$i]['native_name'] = 'AR'; // ARが変更後のテキスト
        }
    }
    return $links;
});
