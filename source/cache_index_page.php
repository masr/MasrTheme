<?php
/*
Description: cache your wordpress home page into static html page to speed up
Author: CoolMore
Version: 1.0
Author URI: http://www.mazr.in/
*/
function just_cache_home_page()
{
    $blog_url = get_bloginfo('url') . '?page=1';
    $blog_home = ABSPATH;
    $html = file_get_contents($blog_url);
    $file = $blog_home . 'index.cache.html';
    file_put_contents($file, $html);
}

add_filter('cron_schedules', 'my_corn_schedules');
function my_corn_schedules()
{
    return array(
        'in_per_minute' => array(
            'interval' => 60,
            'display' => 'In every mintue'
        )
    );
}

if (!wp_next_scheduled('mz_cache_home_page')) {
    wp_schedule_event(time(), 'in_per_minute', 'mz_cache_home_page');
}

add_action('mz_cache_home_page', 'just_cache_home_page');

?>
