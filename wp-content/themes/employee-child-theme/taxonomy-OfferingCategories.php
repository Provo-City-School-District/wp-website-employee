<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content page">
	   		<article class="activePost">
	   		<h1>District Offerings : <?php single_cat_title(); ?></h1>
	   			<?php
					$today = date('Ymd', strtotime('-1 day'));
					
					$single_category = single_cat_title('', false);		
					$args = array( 'post_type' => 'develop_offerings', 'tax_query' => array(array('taxonomy' => 'OfferingCategories','field'    => 'slug', 'terms' => $single_category)) ,'posts_per_page' => -1 , 'meta_key' => 'event_date', 'orderby' => 'meta_value_num', 'order' => 'ASC','meta_query' => array( array( 'key' => 'event_date', 'value' => $today, 'compare' => '>' )));
					$the_query = new WP_Query( $args );
						if($the_query->have_posts()) :
							while ($the_query->have_posts()) : $the_query->the_post();?>
								<article class="pd-offering">
						   			<div class="offering-content">
							   			<h2><?php the_title(); ?></h2>
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
							   				<?php 
								   				$audience = get_the_terms( $post->ID , 'OfferingCategories' ); 
								   				$offering_subject = get_the_terms( $post->ID , 'offering_subject' );
								   			
								   			
								   			if(!empty($audience)){
									   			?>
									   			<h3>Target Audience</h3>
									   				<ul>
											   			<?php 
										                    foreach ( $audience as $term ) {
										                        $term_link = get_term_link( $term, 'OfferingCategories' );
										                        if( is_wp_error( $term_link ) )
																continue;
																	echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
										                    } 
												   		?>
									   				</ul>	
									   			<?php
								   			}
								   			if(!empty($offering_subject)) {
									   			?>
									   			<h3>Subjects</h3>
									   				<ul>
											   			<?php
										                    foreach ( $offering_subject as $term ) {
										                        $term_link = get_term_link( $term, 'offering_subject' );
										                        if( is_wp_error( $term_link ) )
																continue;
																	echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
										                    } 
												   		?>
									   				</ul>	
									   			<?php
								   			}
								   			?>
						   				</aside>
								</article>
				   	<?php endwhile;?>
					   	<nav class="archiveNav">
					   	<?php echo paginate_links(); ?>
					   	</nav>
						<?php else :
							echo '<p>Please check back at a later date for updated list</p>';
				endif;
			?>
	   		</article>
   		</section>
   		<?php get_sidebar( 'employeeglobalsidebar' ); ?>
   </main>
<?php
	get_footer();
?>