<?php
/*ディレクトリー*/

function current_directory()
{

    if ($_SERVER['REMOTE_ADDR'] == '143.189.103.239')
    {
        echo "/blog";
    }
    else
    {
        echo "";
    }

}
/* 投稿アーカイブページの作成 */
function post_has_archive($args, $post_type)
{

    if ('post' == $post_type)
    {
        $args['rewrite'] = true;
        $args['has_archive'] = 'news'; //任意のスラッグ名
        
    }
    return $args;

}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);
wp_enqueue_style('style', get_stylesheet_uri());

//Pagination
function pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages)
        {
            $pages = 1;
        }
    }

    if (1 != $pages)
    {
        echo "<div class=\"pagination\"><div class=\"pagination-box\"><span class=\"page-of\">Page " . $paged . " of " . $pages . "</span>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
        if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";

        for ($i = 1;$i <= $pages;$i++)
        {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
            {
                echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"" . get_pagenum_link($paged + 1) . "\">&rsaquo;</a>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
        echo "</div></div>\n";
    }
}
//アイキャッチ機能を有効にする
add_theme_support('post-thumbnails');

//カスタムフィールドのメタボックス
function add_custom_fields()
{
    add_meta_box('meta_id', '独自のカスタムフィールド', 'insert_custom_fields', 'post', 'normal');
}
add_action('admin_menu', 'add_custom_fields');
//カスタムフィールドの入力エリア
function insert_custom_fields()
{
    global $post;
    echo '<p>テキストの入力： <input type="text" name="custom_fields" value="' . get_post_meta($post->ID, 'custom_fields', true) . '" size="50"></p>';
    if (get_post_meta($post->ID, 'custom_new_label_checkbox', true) == "is-on")
    { //チェックされていたらチェックボックスの$custom_new_label_checkbox_checkにcheckedを挿入
        $custom_new_label_checkbox_check = "checked";
    }
    echo '<p>チェックボックス： <input type="checkbox" name="custom_new_label_checkbox" value="is-on" ' . $custom_new_label_checkbox_check . '></p>';
}

//カスタムフィールドの値を保存
function save_custom_fields($post_id)
{
    if (!empty($_POST['custom_fields']))
    { //入力済みの場合
        update_post_meta($post_id, 'custom_fields', $_POST['custom_fields']); //値を保存
        
    }
    else
    { //未入力の場合
        delete_post_meta($post_id, 'custom_fields'); //値を削除
        
    }
    if (!empty($_POST['custom_new_label_checkbox']))
    { //チェックされている場合
        update_post_meta($post_id, 'custom_new_label_checkbox', $_POST['custom_new_label_checkbox']);
        $date = new DateTime();
        update_post_meta($post_id, 'custom_new_label_timestamp', $date->getTimestamp());
    }
    else
    { //チェックされていない場合
        delete_post_meta($post_id, 'custom_new_label_checkbox');
        delete_post_meta($post_id, 'custom_new_label_timestamp');
    }
}
add_action('save_post', 'save_custom_fields');

