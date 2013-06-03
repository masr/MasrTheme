<?php

function mz_e($name, $value = '')
{
    switch (trim($name)) {
        case 'message_board';
            return 'Messages';
        case 'no_comments_in_site':
            return "No comments yet";
        case 'use_rss_to_sync_article':
            return 'Use RSS 2.0 to sync the articles';
        case 'use_rss_to_sync_comment':
            return 'Use RSS 2.0 to sync comments';
        case 'article':
            return 'Article';
        case 'comment':
            return 'Comment';
        case 'recent_comments':
            return 'Recent Comments';
        case 'say_comment':
            return 'says';
        case 'return_to_home_page':
            return 'Return to home page';
        case 'return_to_last_page':
            return 'The last page';
        case 'see_all_articles_of_category':
            return 'browser all the articles of ' . $value;
        case 'tag':
            return 'Tag';
        case 'no_comment':
            return 'No comments';
        case 'one_comment':
            return 'One comment';
        case '%_comments':
            return '% comments';
        case 'edit_article':
            return 'Edit article';
        case 'edit':
            return 'Edit';
        case 'in':
            return 'in';
        default;
            return '';
    }
}

?>