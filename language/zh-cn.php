<?php
function mz_e($name, $value)
{
    switch (trim($name)) {
        case 'message_board';
            return '留言板';
        case 'no_comments_in_site':
            return "本站点暂无评论";
        case 'use_rss_to_sync_article':
            return '使用 RSS 2.0 同步站点近期文章';
        case 'use_rss_to_sync_comment':
            return '使用 RSS 2.0同步站点近期评论';
        case 'article':
            return '文章';
        case 'comment':
            return '评论';
        case 'recent_comments':
            return '最新评论';
        case 'say_comment':
            return '评论道';
        case 'return_to_home_page':
            return '回到首页';
        case 'return_to_last_page':
            return '最后一页';
        case 'see_all_articles_of_category':
            return '查看' . $value . '下的所有文章';
        case 'tag':
            return '标签';
        case 'no_comment':
            return '尚无评论';
        case 'one_comment':
            return '一个评论';
        case '%_comments':
            return '% 个评论';
        case 'edit_article':
            return '编辑文章';
        case 'edit':
            return '编辑';
        case 'in':
            return '在';
        default;
            echo '';
    }
}

?>