<? get_header(); ?>
<? if (MZ_IS_HOME_PAGE): ?>

<? $posts = array(); ?>
<? query_posts('meta_key=featured&showposts=' . MZ_GALLERY_PIC_COUNT . '&category_name=poem,life,geek,music'); ?>
<? if (have_posts()) : ?>
    <div id="gallery"></div>
    <? while (have_posts()) : the_post(); ?>
        <? $posts[] = mz_get_gallery_single_obj($post) ?>
        <? endwhile; ?>
    <? endif; ?>
    <?= mz_get_gallery_slider_block('gallery', $posts) ?>
<? endif; ?>
<div class="index_post">
    <?
    if (MZ_IS_TAG_PAGE) {
        query_posts("showposts=" . MZ_POSTS_PER_PAGE . "&paged=" . MZ_CUR_PAGED . "&tag=" . MZ_TAG . "&post_status=publish");
    } elseif (MZ_IS_CAT_PAGE) {
        query_posts("showposts=" . MZ_POSTS_PER_PAGE . "&paged=" . MZ_CUR_PAGED . "&category_name=" . MZ_CATEGORY . "&post_status=publish");
    } else {
        query_posts("showposts=" . MZ_POSTS_PER_PAGE . "&paged=" . MZ_CUR_PAGED . "&category_name=geek,life,poem,music&post_status=publish");
    }
    while (have_posts()) : the_post();?>
        <? require MZ_THEME_PATH . '/index_post.php'; ?>
        <? endwhile; ?>

    <div class="par_page_navi"><?
        mz_par_pagenavi(MZ_PAGINATION_SHOW); ?></div>
</div>
<? get_sidebar(); ?>
<? get_footer(); ?>
