<div <?post_class()?>>

    <?=mz_get_index_post_title_block()?>
    <?=mz_get_index_post_date_block()?>
    <div class="entry clear_float">
        <div class="post_content fix_height">
            <?= mz_get_index_post_featured_block() ?>
            <?= mz_get_index_post_excerpt_block()?>
        </div>
        <div class="meta_bottom fix_height clear_float">

            <?=mz_get_index_post_author_block()?>
            <?= mz_get_index_post_tags_block()?>
            <?=mz_get_index_post_comment_num_block()?>
            <?//=mz_get_index_post_edit_link_block()?>
            <?=mz_get_index_post_category_block()?></div>
    </div>
</div>
