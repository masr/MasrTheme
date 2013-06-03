<?= mz_get_single_post_syntax_css() ?>
<div <? post_class(); ?>>
    <div class="single_post">
        <?=mz_get_single_post_title_block()?>
        <?=mz_get_single_post_date_block()?>
        <div class="entry clear_float"><?php the_content(); ?>
            <div class="meta_bottom fix_height clear_float">
                <?=mz_get_index_post_author_block()?>
                <?=mz_get_single_post_tags_block()?>
                <?=mz_get_single_post_comment_num_block()?>
                <?=mz_get_single_post_edit_link_block() ?>
                <?=mz_get_single_post_category_block()?>
            </div>
        </div>
    </div>
</div>
<?= mz_get_single_post_syntax_script() ?>
