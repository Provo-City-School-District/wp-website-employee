<?php
/*
	Template Name: Department Tile - Slider, with Repeating Tiles
*/

get_header();
?>
<main id="mainContent">
	<section class="content">
		<?php custom_breadcrumbs(); ?>
		<article class="currentContent">
			<?php
			if (have_posts()) :
				while (have_posts()) : the_post(); ?>
					<article class="post">

						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</article>
			<?php endwhile;
			else :
				echo '<p>No Content Found</p>';
			endif;
			wp_reset_query();
			?>
		</article>
		<article class="slider">
			<div class="departmentNews">
				<?php
				$slidercat = get_field('slider_category');
				$args = array('posts_per_page' => 3, 'category_name'  => $slidercat);
				// Variable to call WP_Query.
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>">
							<div class="slide" style="background-image: url('<?php
																				if (get_field('featured_image', $post_id)) {
																					echo get_field('featured_image');
																				} elseif (has_post_thumbnail()) {
																					the_post_thumbnail_url();
																				} else {
																					echo 'https://provo.edu/wp-content/uploads/2023/05/district-office-building-1.jpg';
																				}
																				?>')">
								<span>
									<h2><?php the_title(); ?></h2>
									<p><?php echo get_excerpt(); ?></p>
								</span>
							</div>
						</a>

				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';

				endif;
				wp_reset_query();
				?>
			</div>
		</article>
		<section class="departmentTiles">
			<?php
			$pageTiles = get_field('page_tiles');

			if ($pageTiles) {
				foreach ($pageTiles as $tile) {
					$image = $tile['tile_photo'];
			?>
					<aside class="tile">
						<div class="featured-image">
							<img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="" />
						</div>
						<?php echo wpautop($tile['tile_content']); ?>
					</aside>
			<?php
				}
			}
			?>
		</section><!-- departmentResources end -->
	</section>
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>