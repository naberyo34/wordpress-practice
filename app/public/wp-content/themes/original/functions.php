<?php
// スタイルシートの読み込み
function add_files()
{
    wp_enqueue_style('default', get_stylesheet_uri());
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

// カスタムフィールド「サムネイル」の作成
function insert_thumbnail_fields() {
    global $post;
    $thumbnail = get_post_meta($post->ID, 'thumbnail', true);
    echo 'サムネイル画像: <input type="file" name="thumbnail" accept="image/*" />'
    // $thumbnail に値が格納されている場合はプレビューを表示する
    if(isset($thumbnail) && strlen($thumbnail) > 0){
        echo '<img style="width: 200px;" src="'.wp_get_attachment_url($thumbnail).'">';
    }
}

// カスタムフィールド「サムネイル」の保存処理
function save_thumbnail_fields($post_id) {

}

// 作成したカスタムフィールドをカスタム投稿タイプに紐付ける
function add_custom_fields()
{
    
}

add_action('admin_menu', 'add_custom_fields');

