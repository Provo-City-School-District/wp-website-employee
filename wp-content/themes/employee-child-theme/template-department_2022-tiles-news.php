<?php
/*
	Template Name: 2022 Department w/ sidebar tiles top - news below
*/

get_header();
?>
<main id="mainContent">

	<section class="content page">
		<?php custom_breadcrumbs(); ?>
		<div class="postwrapper">
			<article class="activePost">

				<h1><?php the_title(); ?></h1>
				<?php
				if (get_field('display_tiles') == 1) {
				?>
					<section class="departmentTiles grid3 altColors">
						<?php
						$pageTiles = get_field('page_tiles');
						if ($pageTiles) {
							foreach ($pageTiles as $tile) {
								$image = $tile['tile_photo'];
						?>
								<aside class="tile">
									<?php
									if ($image) {
									?>
										<div class="featured-image">
											<img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="" />
										</div>
									<?php
									}
									?>
									<h2><?php echo wpautop($tile['tile_title']); ?> </h2>
									<?php echo wpautop($tile['tile_content']); ?>
								</aside>
						<?php
							}
						}
						?>
					</section><!-- departmentResources end -->
				<?php
				}
				?>



				<nav class="successTools">
					<?php
					wp_reset_query();
					$topMenu = get_field('select_a_menu');
					// $menu_args = array('menu' => '1009');
					wp_nav_menu(array('menu' => $topMenu));
					?>
					</nav>

					


<?php
		$newscat = get_field('select_news_cat');
		// print_r($newscat."adfadfasdfasdfaf");
		if ($newscat) {
			$the_query = new WP_Query(array('posts_per_page' => 1, 'cat' => $newscat));
			if ($the_query->have_posts()) :
				while ($the_query->have_posts()) : $the_query->the_post();
		?>
					<article class="activePost">
						<a href="<?php the_permalink(); ?>">
							<h1><?php the_title(); ?></h1>
						</a>
						<header class="postmeta">
							<ul>
								<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>

							</ul>
						</header>
						<?php
						the_content();
						?>
					</article>

				<?php endwhile; ?>

			<?php else :
				echo '<p>No Content Found</p>';
			endif;


			//reset wp_query to current page
			wp_reset_query();



			?>


			<section class="postList">
				<div class="grid3">
					<?php
					$currentID = get_the_ID();
					//Removes news category from get_the_category
					$categoryID = get_the_category($post->ID);
					foreach ($categoryID as $category) {
						if ($category->term_id == 192) {
							continue;
						}
						$postcategories = '"' . $category->name . '"' . ',';
					}
					//use $postcategories for category_name if you want to display category related posts only. Use actual category name if you want to only use that category
					$my_query = new WP_Query(array('showposts' => 3, 'cat' => $newscat, 'post__not_in' => array($currentID)));
					while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<article class="post">
							<div class="featured-image">
								<?php

								if (get_field('featured_image', $post_id)) {
								?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('featured_image'); ?>" alt="" class="" /></a>
								<?php
								} elseif (has_post_thumbnail()) {
								?>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								<?php
								}
								?>
							</div>
							<header class="postmeta">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<ul>
									<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?></li>
								</ul>
							</header>
							<?php echo get_excerpt(); ?>
						</article>
					<?php endwhile; ?>
				</div>
			</section>


		<?php


		}

		?>




					<div class="clear"></div>
			</article>
		</div>
	</section>
	<?php
	wp_reset_postdata(  );
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>