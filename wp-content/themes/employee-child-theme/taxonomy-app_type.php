<?php
/*
	Template Name: Approved Applications Pages
*/
	get_header();
?>
   <main id="mainContent">
   		<section class="content newsBlog approvedApps">
   			<?php custom_breadcrumbs(); ?>
   			<div class="postgrid">
   			<h1>Apps by Category: <?php single_cat_title(); ?></h1>
				<?php	
				// WP_Query arguments
				$app_kind = single_cat_title('', false);
				
				$args = array (
					'post_type'              => array( 'approved_application' ),
					'post_status'            => "published",
					'nopaging'               => true,
					'order'                  => 'ASC',
					'orderby'                => 'title',
					'tax_query' => array(
				        array(
				            'taxonomy' => 'app_type',
				            'field' => 'slug',
				            'terms' => $app_kind
				        )
				    )
				);
				// The Query
				$applications = new WP_Query( $args );
		
				// The Loop
				if ( $applications->have_posts() ) {
					while ( $applications->have_posts() ) {
						$applications->the_post();
						?>
							<article class="post">
							<h2><?php the_title(); ?></h2>
							<?php 
								if ( has_post_thumbnail() ) {
								    the_post_thumbnail();
								} else {
									echo '<img src="https://employee.provo.edu/wp-content/uploads/2019/12/no_uploaded.png" alt="" />';
								}
							?>
							<ul>
								<li><a href="<?php the_permalink(); ?>">View More Information about <?php the_title(); ?></a></li>
							</ul>
							</article>
						<?php
					}
				} else {
					// no posts found
					?> <h1>There are no <?php the_title(); ?> to display</h1><?php
				}
				// Restore original Post Data
				wp_reset_postdata();
				?>
   			</div>	
      	</section>
   		<?php
	   		//$sidebar = get_field('sidebar');
	   		get_sidebar( 'approvedApplications' );
	   	?>
   </main>
<?php
	get_footer();
?>