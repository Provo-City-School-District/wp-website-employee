<?php
/*
	Template Name: Department Tile
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
		<section class="departmentResources">
			<?php if (get_field('square_1')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_1_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_1'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_2')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_2_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_2'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_3')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_3_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_3'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_4')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_4_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_4'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_5')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_5_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_5'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_6')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_6_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_6'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_7')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_7_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_7'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_8')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_8_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_8'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_9')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_9_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_9'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_10')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_10_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_10'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_11')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_11_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_11'); ?>
				</aside>
			<?php }	?>
			<?php if (get_field('square_12')) { ?>
				<aside class="threeColumn menu-Tile">
					<div class="featured-image">
						<img src="<?php the_field('square_12_photo'); ?>" alt="" />
					</div>
					<?php the_field('square_12'); ?>
				</aside>
			<?php }	?>
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