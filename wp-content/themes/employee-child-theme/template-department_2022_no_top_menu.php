<?php
/*
	Template Name: 2022 Department Template includes news, tiles,sidebar, no top menu
*/

get_header();
?>
<main id="mainContent">

	<section class="content page">
		<?php custom_breadcrumbs(); ?>
		<div class="postwrapper">
			<article class="activePost">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<section class="teasers">

					<?php
					$slidercat = get_field('slider_category');
					$the_query = new WP_Query(array('posts_per_page' => 3, 'category_name'  => $slidercat));
					if ($the_query->have_posts()) :
						while ($the_query->have_posts()) : $the_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" style="background-image: url('<?php
																								if (get_field('featured_image', $post_id)) {
																									echo get_field('featured_image');
																								} elseif (has_post_thumbnail()) {
																									the_post_thumbnail_url();
																								} else {
																									echo get_stylesheet_directory_uri() . '/assets/images/building-image.jpg';
																								}
																								?>')">
								<article>
									<p><?php the_title();  ?></p>
									<!-- <i class="arrow"></i> -->
								</article>
							</a>
					<?php endwhile;
					else :
						echo '<p>No Content Found</p>';
					endif;
					wp_reset_postdata();
					?>
				</section>
				<nav class="employeeHighlights">
					<ul class="menu">
						<?php
						wp_reset_query();
						// Check rows existexists.
						if (have_rows('highlight_links')) :
							// Loop through rows.
							while (have_rows('highlight_links')) : the_row();
						?>
								<li><a href="<?php echo get_sub_field('highlight_link_address'); ?>"><strong><?php echo get_sub_field('highlight_link_label'); ?></strong><i class="<?php echo get_sub_field('highlight_link_class'); ?>"></i></a></li>
						<?php
							// End loop.
							endwhile;

						// No value.
						else :
						// Could Do something...
						endif;
						?>

					</ul>
				</nav>
				<?php
				wp_reset_query();
				if (get_field('display_tiles') == 1) {
				?>
					<section class="employeeLinks">
						<?php
						$pageTiles = get_field('page_tiles');

						if ($pageTiles) {
							foreach ($pageTiles as $tile) {
								$image = $tile['tile_photo'];
						?>
								<aside class="tile">


									<?php
									if ($tile['tile_photo']) {
									?>
										<div class="featured-image">
											<img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" alt="" />
										</div>
									<?php
									}
									?>
									<!-- <h2><?php echo wpautop($tile['tile_title']); ?> </h2> -->
									<h2><?php echo $tile['tile_title']; ?> </h2>
									<!-- <?php echo wpautop($tile['tile_content']); ?> -->
									<?php echo $tile['tile_content']; ?>
								</aside>
						<?php
							}
						}
						?>
					</section><!-- departmentResources end -->

				<?php
				} ?>

				<div class="clear"></div>
			</article>
		</div>
	</section>
	<?php
	$sidebar = get_field('sidebar');
	get_sidebar($sidebar);
	?>
</main>
<?php
get_footer();
?>