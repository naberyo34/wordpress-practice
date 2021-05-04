<?php
// スタイルシートの読み込み
function add_files()
{
    wp_enqueue_style('slick', get_template_directory_uri() . '/vendors/slick/slick.css');
    wp_enqueue_style('slick_theme', get_template_directory_uri() . '/vendors/slick/slick-theme.css');
    wp_enqueue_style('default', get_stylesheet_uri());
    wp_enqueue_script('jq', get_template_directory_uri() . '/vendors/jquery-3.6.0.min.js');
    wp_enqueue_script('slick', get_template_directory_uri() . '/vendors/slick/slick.js');
    wp_enqueue_script('index', get_template_directory_uri() . '/js/index.js');
}
add_action('wp_enqueue_scripts', 'add_files');

// カスタム投稿タイプの作成
function add_post_type()
{
    register_post_type('works', [
        'labels' => [
            'name' => '実績紹介',
            'singular_name' => 'work',
        ],
        'public' => true,
        'has_archive' => true,
    ]);

    register_post_type('news', [
        'labels' => [
            'name' => 'ニュース',
            'singular_name' => 'news',
        ],
        'public' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'add_post_type');

// 執筆者のカスタムフィールドを作成する
function insert_author_fields()
{
    global $post;
    $author = get_post_meta($post->ID, 'author', true);
    echo '<input type="text" name="author" value="' . $author . '" />';
}

// 作成したカスタムフィールドを対象の投稿タイプに追加する
function add_custom_fields()
{
    add_meta_box(
        'author_fields',
        '執筆者',
        'insert_author_fields',
        'works',
    );
}

add_action('admin_menu', 'add_custom_fields');

// カスタムフィールドを保存する際に走る処理
function save_custom_fields($post_id)
{
    // 執筆者の追加時に走る処理
    if (isset($_POST['author'])) {
        update_post_meta($post_id, 'author', $_POST['author']);
    }
}

add_action('save_post', 'save_custom_fields');
