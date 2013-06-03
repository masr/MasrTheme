<?php
define('MZ_LANGUAGE', 'zh-cn');
//define('MZ_LANGUAGE', 'en-us');
define('MZ_404_REFRESH_TIME', 5);
define('MZ_GALLERY_PIC_COUNT', 6);
define('MZ_PAGINATION_SHOW', 6);
define('MZ_SIDEBAR_RECENT_COMMENTS', 8);
define('MZ_SIDEBAR_COMMENT_GRAVATAR_SIZE', 30);
define('MZ_ARTICLE_COMMENT_GRAVATAR_SIZE', 48);

define('MZ_HOME', get_bloginfo('url'));
define('MZ_THEME_HOME', get_bloginfo('template_url'));
define('MZ_PATH', ABSPATH);
//define('MZ_PLUGIN_HOME', MZ_HOME . '/wp-content/plugins');
define('MZ_PLUGIN_HOME', MZ_THEME_HOME);
define('MZ_THEME_PATH', TEMPLATEPATH);

require MZ_THEME_PATH . '/source/template.php';
require MZ_THEME_PATH . '/source/funcs.php';
require MZ_THEME_PATH . '/source/cache_index_page.php';

define('MZ_BLOG_NAME', get_bloginfo('name'));
define('MZ_BLOG_SUB_TITLE', get_bloginfo('description'));
define('MZ_POSTS_PER_PAGE', get_option('posts_per_page'));


register_sidebar(array('name' => 'sidebar1'));
register_sidebar(array('name' => 'sidebar2'));

if (defined('MZ_LANGUAGE')) {
    $file = MZ_THEME_PATH . '/language/' . MZ_LANGUAGE . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        exit('No language file found!!!');
    }
} else {
    require_once  MZ_THEME_PATH . '/language/en-us.php';
}

?>
