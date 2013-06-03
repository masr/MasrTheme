<? get_header(); ?>
<div id="content">
    <? the_post();
    require MZ_THEME_PATH . '/post.php';
    comments_template();
    ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
