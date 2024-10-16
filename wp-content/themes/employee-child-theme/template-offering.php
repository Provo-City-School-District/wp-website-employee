<?php
	/*
	Template Name: Professional Development Offerings Page
*/	
	get_header();	
?>
     <main id="mainContent">
   		<section class="content page">
   		<?php custom_breadcrumbs(); ?>
   			<article class="activePost">
   				<?php
					if(have_posts()) :
						while (have_posts()) : the_post();?>
							<h1><?php the_title(); ?></h1>
					   		<?php the_content(); ?>

					   	<?php endwhile;
							else :
								
					endif;
					wp_reset_query();
				?>
				<h2>Upcoming Offerings</h2>
				<?php
						$today = date('Ymd', strtotime('-1 day'));
						$args = array( 'post_type' => 'develop_offerings' ,'posts_per_page' => -1 , 'meta_key' => 'event_date', 'orderby' => 'meta_value_num', 'order' => 'ASC','meta_query' => array( /*array( 'key' => 'event_date', 'value' => $today, 'compare' => '>' )*/));
						$the_query = new WP_Query( $args );
							if($the_query->have_posts()) :
								while ($the_query->have_posts()) : $the_query->the_post();
				?>	
								<article class="pd-offering">
						   			<div class="offering-content">
							   			<h3><?php the_title(); ?></h3>
							   				
							   				
								   				<?php
										   			$terms = get_the_terms( $post->ID , 'offering_type' ); 
								                    foreach ( $terms as $term ) {
								                        $term_link = get_term_link( $term, 'Offering Type' );
								                        if( is_wp_error( $term_link ) )
														continue;
															echo '<p>Offering Type: <a href="' . $term_link . '">' . $term->name . '</a></p>';
								                    } 
										   		?>
							   				
							   				
								   			<p><?php echo get_field('descriptions'); ?></p>
								   			<ul>
									   			<li><strong>Course ID</strong>: <?php echo get_field('course_id'); ?></li>
									   			<li><strong>Location: </strong><?php echo get_field('location'); ?></li>
									   			<li><strong>Sponsor/Instructor</strong>: <?php echo get_field('sponsorinstructor'); ?></li>
									   			<?php
										   			$oldtime = get_field('event_date');
										   			$oldtime_timestamp = strtotime($oldtime);	
									   			?>
									   			
									   			<li><strong>Date & Time</strong>: <?php echo date('F j, Y', $oldtime_timestamp).', ' . get_field('start_time') . ' - ' . get_field('end_time'); ?></li>
									   			<?php
										   			if(get_field('registration_link')) {
								   						?>
								   						<li><a href="<?php echo get_field('registration_link'); ?>">Registration For <?php the_title(); ?></a></li>
								   						<?php		
										   			} else {
											   			echo '<li>Registration Link Coming Soon</li>';
										   			}	
										   		?>
									   			
								   			</ul>
						   			</div>
							   			<aside class="target-audience">
							   				<h4>Target Audience</h4>
							   				<ul>
									   			<?php
										   			$terms = get_the_terms( $post->ID , 'OfferingCategories' ); 
								                    foreach ( $terms as $term ) {
								                        $term_link = get_term_link( $term, 'OfferingCategories' );
								                        if( is_wp_error( $term_link ) )
														continue;
															echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
								                    } 
										   		?>
							   				</ul>
						   				</aside>
								</article>
					   	<?php 	endwhile;
							else :
								echo '<p>There are currently no upcoming events</p>';
							endif;
						wp_reset_query();
						?>
				<div class="clear"></div>
   			</article>
   		</section>
   		<?php
	   		$sidebar = get_field('sidebar');
	   		get_sidebar( $sidebar );
	   	?>
   </main>
<?php
	get_footer();
?>



