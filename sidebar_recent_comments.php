<li class="sidebar_recent_comments widget">

    <? $comments = mz_get_recent_visitor_comments(MZ_SIDEBAR_RECENT_COMMENTS);
    if ($comments) :?>
        <h2><?=mz_e('recent_comments')?></h2>
        <ul>
            <? foreach ($comments as $comment) : ?>
            <li class="comment">
                <div class="user_head">
                    <?  if ($comment->comment_author_url) : ?>
                    <a href="<?=$comment->comment_author_url?>" class="user_img">
                        <?=mz_get_cached_avatar($comment->comment_author_email, MZ_SIDEBAR_COMMENT_GRAVATAR_SIZE) ?>
                    </a>
                    <a href="<?=$comment->comment_author_url?>">
                        <?=$comment->comment_author?>
                    </a>
                    <? else: ?>

                    <?= mz_get_cached_avatar($comment->comment_author_email, MZ_SIDEBAR_COMMENT_GRAVATAR_SIZE) ?>
                    <?= $comment->comment_author ?>
                    <?  endif ?> <?=mz_e('in')?>
                    <?=mz_get_recent_comment_post_link($comment)?><?=mz_e('say_comment')?>：
                </div>
                <div class="txt">
                    <?=$comment->comment_content?>
                </div>
            </li>
            <? endforeach; ?>
        </ul>
        <? else:
        echo mz_e("no_comments_in_site");
    endif;
    ?></li>
