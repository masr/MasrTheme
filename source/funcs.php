<?php
function mz_get_category_slug()
{
    $mycategory = get_the_category();
    if (empty($mycategory))
        return '';
    return $mycategory[0]->slug;
}

function mz_get_post_featured()
{
    $featured = get_post_meta(get_the_ID(), 'featured', true);
    return $featured;
}

function mz_fetch_echo($callback)
{
    ob_start();
    call_user_func($callback);
    $str = ob_get_contents();
    ob_end_clean();
    return $str;
}


function mz_get_recent_visitor_comments($count = MZ_SIDEBAR_RECENT_COMMENTS)
{
    global $wpdb;
    $query = "SELECT * from $wpdb->comments WHERE comment_approved= '1' and user_id not in (1,2) ORDER BY comment_date DESC LIMIT 0 ,$count";
    return $wpdb->get_results($query);
}

function mz_get_post_title($post_id)
{
    $post = get_post($post_id);
    return $post->post_title;
}

function mz_get_page_title()
{
    $title = trim(wp_title('', false));
    $name = get_bloginfo('name');
    if (empty($title)) {
        return $name;
    } else {
        return $title . '---' . $name;
    }
}

function mz_get_page_description()
{
    if (is_single()) {
        return get_the_excerpt();
    } else {
        return get_bloginfo('description');
    }
}

function mz_get_max_num_pages()
{
    global $wp_query;
    $max_page = $wp_query->max_num_pages;
    return $max_page;
}


?>
