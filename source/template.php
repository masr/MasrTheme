<?php

function mz_par_pagenavi($range = MZ_PAGINATION_SHOW)
{

    function mz_add_url_param($url, $name, $value)
    {
        $parsed_url = parse_url($url);
        $query = isset($parsed_url['query']) ? $parsed_url['query'] : '';
        parse_str($query, $arr);
        $arr[$name] = $value;
        $query = http_build_query($arr);
        $path = $parsed_url['path'];
        return $path . '?' . $query;
    }

    function mz_get_my_pagenum_link($i)
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = mz_add_url_param($uri, 'page', $i);
        $host = $_SERVER['HTTP_HOST'];
        $port = $_SERVER['SERVER_PORT'] != '80' ? ':' . $_SERVER['SERVER_PORT'] : '';
        $url = "http://$host$port$uri";
        return $url;
    }


    $paged = MZ_CUR_PAGED;
    $max_page = MZ_MAX_NUM_PAGES;
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        if ($paged != 1) {
            echo "<a href='" . mz_get_my_pagenum_link(1) . "' class='extend' title='" . mz_e('return_to_home_page') . "'> " . mz_e('return_to_home_page') . " </a>";
        }
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<a href='" . mz_get_my_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<a href='" . mz_get_my_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<a href='" . mz_get_my_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<a href='" . mz_get_my_pagenum_link($i) . "'";
                if ($i == $paged) echo " class='current'";
                echo ">$i</a>";
            }
        }
        if ($paged != $max_page) {
            echo "<a href='" . mz_get_my_pagenum_link($max_page) . "' class='extend' title='" . mz_e('return_to_last_page') . "'> " . mz_e('return_to_last_page') . " </a>";
        }
    }
}

function mz_get_cached_avatar($email, $size)
{

    global $wpdb;
//    $default_url = MZ_THEME_HOME . "/fv-gravatar-cache/images/default.png";
    if (empty($size))
        $size = MZ_ARTICLE_COMMENT_GRAVATAR_SIZE;

    $result = $wpdb->get_results("select * from wp_gravatars where email='$email'");
    if ($result && !empty($result[0]->url)) {
        $result = $result[0];
        $url = $result->url;
        return "<img src='$url' alt='' width='$size'/>";
    } else {
        return get_avatar($email, $size);
    }
}

function mz_meta_generator()
{
    $version = get_bloginfo('version');
    return <<<EOF
  <meta name="generator" content="WordPress $version"/>

EOF;
}

function mz_meta_author($author)
{
    return <<<EOF
   <meta name="author" content="$author" />

EOF;
}

function mz_head_title()
{
    $title = MZ_PAGE_TITLE;
    return <<<EOF
  <title>$title</title>

EOF;
}

function mz_style_css()
{
    $home = MZ_THEME_HOME;
    return <<<EOF
  <link rel="stylesheet" href="$home/css/mazr.css" type="text/css" media="screen" />

EOF;
}

function mz_meta_robot()
{
    return <<<EOF
  <meta name="Robots" content="all" />

EOF;
}

function mz_le_ie7_css()
{
    $home = MZ_THEME_HOME;
    return <<<EOF
<!--[if lte IE 7]>
    <link rel="stylesheet" href="$home/css/lte-ie7.css" type="text/css"
          media="screen"/>
    <![endif]-->

EOF;
}

function mz_head_rss2_link()
{
    $url = get_bloginfo('rss2_url');
    return <<<EOF
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="$url"/>

EOF;
}

function mz_head_rss092_link()
{
    $url = get_bloginfo('rss_url');
    return <<<EOF
  <link rel="alternate" type="text/xml" title="RSS .92" href="$url"/>

EOF;
}

function mz_head_atom_link()
{
    $url = get_bloginfo('atom_url');
    return <<<EOF
  <link rel = "alternate" type = "application/atom+xml" title = "Atom 0.3" href ="$url" />

EOF;
}


function mz_content_type()
{
    $html_type = get_bloginfo('html_type');
    $charset = get_bloginfo('charset');
    return <<<EOF
  <meta http-equiv="Content-Type"
          content="$html_type; charset=$charset"/>

EOF;
}

function mz_head_pingback_link()
{
    $url = get_bloginfo('pingback_url');
    return <<<EOF
  <link rel="pingback" href="$url"/>

EOF;
}

function mz_jquery_script()
{
    $home = MZ_THEME_HOME;
    return <<<EOF
     <script type="text/javascript"
            src="$home/js/jquery-1.7.2.min.js"></script>

EOF;
}

function mz_get_category_link_block($id)
{
    $name = get_the_category_by_ID($id);
    $cat_link = get_category_link($id);
    $title = mz_e('see_all_articles_of_category', $name);
    return <<<EOF
   <li class="item"><a title="$title" href="$cat_link">$name</a></li>

EOF;

}


function mz_get_gallery_single_obj($post)
{
    $id = $post->ID;
    $featured = get_post_meta($id, 'featured', true);
    return array('src' => $featured, 'link' => get_permalink($id), 'title' => $post->post_title, 'txt' => $post->post_excerpt);
}

function mz_get_gallery_slider_block($gallery, $posts)
{
    $opt = json_encode(array('objs' => $posts, 'width' => 528, 'height' => 285, 'count' => MZ_GALLERY_PIC_COUNT));
    $home = MZ_THEME_HOME;
    return <<<EOF
        <script type="text/javascript" src="$home/js/gallery.js"></script>
    <script type="text/javascript">
    $(function(){
    $('#$gallery').gallery_slider($opt);
    })
    </script>

EOF;
}

function mz_get_index_post_featured_block()
{
    $url = get_permalink();
    $title = get_the_title();
    $featured = mz_get_post_featured();
    if (empty($featured))
        return '';
    return <<<EOF
      <div class="featured_block">
      <a href="$url" class="post_featured" title="$title">
      <img src="$featured" alt="$title" />
      </a>
      </div>

EOF;

}


function mz_get_index_post_date_block()
{
    $y = get_the_time('Y');
    $m = get_the_time('M');
    $j = get_the_time('j');
    return <<<EOF
  <div class="meta_date"><span class="year">$y</span> <span
    class="month">$m</span> <span class="day">$j</span>
  </div>

EOF;
}

function mz_get_index_post_excerpt_block()
{
    $excerpt = get_the_excerpt();
    $featured = mz_get_post_featured();
    if (!empty($featured)) {
        return <<<EOF
    <div class="excerpt narrow">
    <p>
            $excerpt
    </p>
    </div>
EOF;
    } else {
        return <<<EOF
   <div class="excerpt wide">
   <p>
            $excerpt
   </p>
   </div>

EOF;
    }
}


function mz_get_index_post_title_block()
{
    $url = get_permalink();
    $title = get_the_title();
    return <<<EOF
  <h3><a href="$url" title="$title">$title</a></h3>

EOF;
}


function mz_get_index_post_author_block()
{
    $author_link = get_the_author_link();
    return <<<EOF
    <h4 class="author"><span class="by">BY </span> <span>$author_link</span></h4>

EOF;
}

function mz_get_index_post_tags_block()
{
    $tags = get_the_tag_list(mz_e('tag') . '：', ' , ', '');
    return <<<EOF
    <div class="post_tags">$tags</div>

EOF;
}


function mz_get_index_post_comment_num_block()
{
    $comments_num = mz_fetch_echo(function () {
        comments_number(mz_e('no_comment'), mz_e('one_comment'), mz_e('%_comments'));
    });
    return <<<EOF
          <span class="comment_number"> $comments_num </span>

EOF;

}

function mz_get_index_post_edit_link_block()
{
    $url = get_edit_post_link();
    $edit_article = mz_e('edit_article');
    $edit = mz_e('edit');
    return <<<EOF
   <a class="post_edit_link" href="$url" title="$edit_article">$edit</a>

EOF;

}


function mz_get_single_post_syntax_css()
{
    $home = MZ_PLUGIN_HOME;
    return <<<EOF
  <link rel="stylesheet" href="$home/syntaxhighlighter2/styles/syntaxhighlighter.css" type="text/css"
      media="screen"/>

EOF;

}

function mz_get_index_post_category_block()
{
    return mz_fetch_echo(function () {
        the_category();
    });
}

function mz_get_single_post_title_block()
{
    return mz_get_index_post_title_block();
}

function mz_get_single_post_date_block()
{
    return mz_get_index_post_date_block();
}


function mz_get_single_post_author_block()
{
    return mz_get_index_post_author_block();
}

function mz_get_single_post_tags_block()
{
    return mz_get_index_post_tags_block();
}

function mz_get_single_post_comment_num_block()
{
    return mz_get_index_post_comment_num_block();
}

function mz_get_single_post_edit_link_block()
{
    return mz_get_index_post_edit_link_block();
}

function mz_get_single_post_syntax_script()
{
    $home = MZ_PLUGIN_HOME;
    return <<<EOF
   <script type="text/javascript"
        src="$home/syntaxhighlighter2/scripts/shCore.js"></script>
   <script type="text/javascript"
        src="$home/syntaxhighlighter2/scripts/shBrushAll.js"></script>
   <script type="text/javascript">
    $(function () {
        SyntaxHighlighter.all();
    })
</script>

EOF;
}

function mz_get_single_post_audiojs_script()
{
    $home = MZ_PLUGIN_HOME;
    return <<<EOF
    <script src="$home/audiojs/audiojs/audio.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function(){
        audiojs.events.ready(function() {
    var as = audiojs.createAll();
  });
    })
    </script>
EOF;
}


function mz_get_single_post_category_block()
{
    return mz_get_index_post_category_block();
}

function mz_get_single_post_pagination_block()
{
    return mz_fetch_echo(function () {
        wp_link_pages('<p><strong>Pages:</strong> ', '</p>', 'number');
    });
}

function mz_get_recent_comment_post_link($comment)
{
    $comment_id = $comment->comment_ID;
    $link = get_permalink($comment->comment_post_ID);
    $author = $comment->comment_author;
    $post_title = mz_get_post_title($comment->comment_post_ID);
    return <<<EOF
  <a class="post_title" href="$link#comment-$comment_id" title="$author | $post_title "> $post_title </a>

EOF;
}


function mz_get_comment_pagination_block()
{
    $previous_comments_link = mz_fetch_echo(function () {
        previous_comments_link();
    });
    $next_comment_link = mz_fetch_echo(function () {
        next_comments_link();
    });
    return <<<EOF
  <div class="navigation">
        <div class="alignleft">$previous_comments_link</div>
        <div class="alignright">$next_comment_link</div>
    </div>

EOF;

}

function mz_get_single_post_comment_list()
{
    $list = mz_fetch_echo(function () {
        wp_list_comments(array('avatar_size' => '' . MZ_ARTICLE_COMMENT_GRAVATAR_SIZE, 'type' => 'comment'));
    });
    return <<<EOF
     <ul class="commentlist">
     $list
    </ul>

EOF;

}


function mz_get_single_post_comment_form()
{
    return mz_fetch_echo(function () {
        comment_form(array('comment_notes_after' => ''));
    });
}

function mz_404_meta_refresh()
{
    $time = MZ_404_REFRESH_TIME;
    $home = MZ_HOME;
    return <<<EOF
    <meta http-equiv="refresh" content="$time;url=$home" />

EOF;
}

function mz_get_cnzz_analysis()
{
//    return <<<EOF
// <script src="http://s96.cnzz.com/stat.php?id=4908741&web_id=4908741&show=pic1" language="JavaScript"></script>
//
//EOF;
}

function mz_meta_description()
{
    $desc = mz_get_page_description();
    return <<<EOF
  <meta name="description" content="$desc" />
  
EOF;
}

function mz_get_favicon()
{
    $path = MZ_THEME_HOME . '/images/favicon.png';
    return <<<EOF
 <link href="$path" rel="icon"/>

EOF;
}

?>