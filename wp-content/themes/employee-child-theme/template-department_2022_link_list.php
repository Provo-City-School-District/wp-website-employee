<?php
/*
		Template Name: 2022 Page - Link List
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
		if (get_field('content_location') == 'before') {
			the_content();
		}

		// check if the repeater field has rows of data
		if (have_rows('link_info')) :
		?>
			<ul class="imageListGrid">
				<?php
				// loop through the rows of data
				while (have_rows('link_info')) : the_row();

				?>
					<li>
						<img src="<?php the_sub_field('link_img'); ?>" alt="<?php the_sub_field('link_label'); ?>" />
						<a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_label'); ?></a>
					</li>
				<?php
				endwhile;
				?>
			</ul>
		<?php
		else :
		// no rows found
		endif;
		if (get_field('content_location') == 'after') {
			the_content();
		}
		?>
			
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