<?php 

/*
	Archive
	
	Creates the iFeature archive pages.
	
	Copyright (C) 2011 CyberChimps
*/

get_header(); ?>

<div id="content_wrap">

	<div id="content_left">
		
		<div class="content_padding">
		
		<?php if (function_exists('ifeature_breadcrumbs')) ifeature_breadcrumbs(); ?>
		
		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h2><font size="5">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category:</font></h2><br />

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2><font size="5">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;:</font></h2><br />

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2><font size="5">Archive for <?php the_time('F jS, Y'); ?>:</font></h2><br />

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2><font size="5">Archive for <?php the_time('F, Y'); ?>:</font></h2><br />

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="pagetitle"><font size="5">Archive for <?php the_time('Y'); ?>:</font></h2><br />

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="pagetitle"><font size="5">Author Archive:</font></h2><br />

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="pagetitle"><font size="5">Blog Archives:</font></h2><br />
			
			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>
			
			<div class="post_container">

				<div <?php post_class() ?>>
				
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					
						<?php get_template_part('meta', 'archive'); ?>

						<div class="entry">
							<?php the_excerpt(); ?>
						</div>
				<div class="tags">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
							</div><!--end tags-->

							<div class="postmetadata">
										<?php get_template_part('share', 'index' ); ?>
								<div class="comments">
									<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
								</div><!--end comments-->	
							</div><!--end postmetadata-->
							
				</div><!--end post-->
			</div><!--end post_container-->

			<?php endwhile; ?>

			<?php get_template_part('pagination', 'archive' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
		</div><!--end content_padding-->
	</div><!--end content_left-->

	<div id="sidebar_right"><?php get_sidebar(); ?></div>
</div><!--end content_wrap-->

<div style=clear:both;></div>
<?php get_footer(); ?>