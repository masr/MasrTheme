<div id="comments">
    <?=mz_get_single_post_comment_list()?>
    <?=mz_get_comment_pagination_block()?>
</div>

<? if ('open' == $post->comment_status) : ?>
    <?= mz_get_single_post_comment_form() ?>
<? endif; ?>
