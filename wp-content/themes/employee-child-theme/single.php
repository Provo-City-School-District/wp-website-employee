<?php
get_header();
?>
<main id="mainContent">
	<section class="content singlePost">
		<?php custom_breadcrumbs(); ?>
		<div class="postwrapper">
			<article class="activePost">

				<?php
				// $galleryArray = get_post_gallery_ids($post->ID);
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<header class="postmeta">
							<h1><?php the_title(); ?></h1>
							<ul>
								<li><img src="//globalassets.provo.edu/image/icons/calendar-ltblue.svg" alt="" /><?php the_time(' F jS, Y') ?> /</li>
								<li><img src="//globalassets.provo.edu/image/icons/person-ltblue.svg" alt="" /><?php the_author_posts_link() ?> /</li>
								<li><img src="//globalassets.provo.edu/image/icons/hamburger-ltblue.svg" alt="" /><?php the_category(', ') ?></li>
							</ul>
						</header>
						<?php
						/*
						   if(get_post_gallery_ids($post->ID)) { ?>
							   <div class="featured-gallery">
								   <div class="featured-for">
								   <?php foreach ($galleryArray as $id) { ?>
									   <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" />
								   <?php } ?>
								   </div>
								   <div class="featured-nav">
								   <?php foreach ($galleryArray as $id) { ?>
									   <img src="<?php echo wp_get_attachment_url( $id ); ?>" alt="" />
								   <?php } ?>
								   </div>
							   </div>
						   <?php } else { ?>
							<div class="featured-image-full">
								<?php the_post_thumbnail(); ?>
							   </div>
								   <?php }	
								   
								 */  ?>

						<?php the_content(); ?>

				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';
				endif;
				if (!is_singular('tech_faq')) {
					echo do_shortcode('[social_warfare]');
				}
				?>
				<div class="bottom"></div>
			</article>
		</div>
		<section class="postgrid">
			<?php
			$currentID = get_the_ID();
			// $posts_to_show = get_option('single_post_count_data');
			// 				if ($posts_to_show <= 3) {
			// 					$posts_to_show = 3;
			// 				}
			$my_query = new WP_Query(array('showposts' => '6', 'post__not_in' => array($currentID)));
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<article class="post">
					<div class="featured-image">
						<a href="<?php the_permalink(); ?>">
							<?php
							if (get_field('featured_image', $post_id)) {
							?>
								<img src="<?php echo get_field('featured_image'); ?>" alt="" class="" /></a>
					<?php
							} elseif (has_post_thumbnail()) {
								the_post_thumbnail();
							} else { ?>
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/building-image.jpg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" width="217" height="175">
					<?php } ?>
					</a>
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
		</section>

	</section>
	<?php get_sidebar('employeeglobalsidebar'); ?>
</main>
<?php
get_footer();
?>