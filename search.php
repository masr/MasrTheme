<?php get_header(); global $wp_theme_options; ?>

	<div id="content">
    
<?php if (have_posts()) : // the loop ?>

<h1 class="pagetitle"><?php if (is_search()) { _e('Search Results for "'); echo the_search_query().'"'; } ?></h1>


<?php while (have_posts()) : the_post(); ?>


<?php endwhile;  ?>
    
			<div class="page-nav">
				<div class="alignleft"><?php previous_posts_link(__('&laquo; Previous Page')) ?></div>
				<div class="alignright"><?php next_posts_link(__('Next Page &raquo;')); ?></div>
			</div>

<?php else : //do not delete ?>

			<h3><?php _e("Page Not Found"); ?></h3>
			<p><?php _e("We're sorry, but the page you are looking for isn't here."); ?></p>
			<p><?php _e("Try searching for the page you are looking for or using the navigation in the header or sidebar"); ?></p>

<?php endif; //do not delete ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
