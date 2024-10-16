<?php
get_header();
?>
<main id="mainContent">
	<section class="content singlePost">
		<ol id="breadcrumbs" class="breadcrumbs">
			<li><a class="bread-link bread-home" href="https://employee.provo.edu" title="Home">Home</a></li>
			<li> / </li>
			<li><a class="bread-parent bread-parent-3445" href="https://employee.provo.edu/technology/" title="Technology Support">Technology Support</a></li>
			<li> / </li>
			<li> <a href="https://employee.provo.edu/technology/approved-applications/">Approved Apps</a></li>
			<li> / </li>
			<li><?php the_title(); ?></li>
		</ol>
		<div class="postwrapper">
			<article class="activePost">
				<?php
				// $galleryArray = get_post_gallery_ids($post->ID);
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<header class="postmeta">
							<h1><?php the_title(); ?></h1>
						</header>
						<div class="featured-image">

							<?php
							if (get_field('featured_image', $post_id)) {
							?>
								<img src="<?php echo get_field('featured_image'); ?>" alt="" class="" />
							<?php
							} elseif (has_post_thumbnail()) {
								the_post_thumbnail();
							} else { ?>
								<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/building-image.jpg'; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" width="217" height="175">
							<?php } ?>

						</div>
						<ul class="noblt">
							<?php

							//NDA Date
							if (get_field('signed_nda') == 'no') { ?>
								<li>No NDA signed</li> <?php
													} else { ?>
								<li>NDA signed on <?php echo get_field('nda_date');
													}
													//NDA link
													if (get_field('signed_ndadpa')) { ?>
								<li><a href="<?php echo get_field('signed_ndadpa') ?>">Download Signed NDA/DPA for <?php the_title(); ?></a></li>
							<?php }
													// Website Link
													if (get_field('link_to_application')) { ?>
								<li><a href="<?php echo get_field('link_to_application') ?>"><?php the_title(); ?> Website</a></li>
							<?php }
													// Privacy Policy Link 
													if (get_field('privacy_policy_link')) { ?>
								<li><a href="<?php echo get_field('privacy_policy_link') ?>"><?php the_title(); ?> Privacy Policy</a></li>
							<?php }
													// Terms of Use Link 
													if (get_field('terms_of_use_link')) { ?>
								<li><a href="<?php echo get_field('terms_of_use_link') ?>"><?php the_title(); ?> Terms of Use</a></li>
							<?php } ?>
						</ul>
						<!-- Brief Description -->
						<h2 class="noclear">Description of <?php the_title(); ?></h2>
						<?php
						if (get_field('description')) {
							echo get_field('description');
						} else {
							echo '<p>No Description provided</p>';
						}
						?>
						<!-- Additional Information  -->
						<h2 class="noclear">Additional Information About <?php the_title(); ?></h2>
						<?php
						if (get_field('additional_information')) {
							echo get_field('additional_information');
						} else {
							echo '<p>No additional information provided</p>';
						}
						?>
				<?php endwhile;
				else :
					echo '<p>No Content Found</p>';
				endif;
				?>
				<div class="bottom"></div>
			</article>
		</div>
	</section>
	<?php get_sidebar('approvedApplications'); ?>
</main>
<?php
get_footer();
?>