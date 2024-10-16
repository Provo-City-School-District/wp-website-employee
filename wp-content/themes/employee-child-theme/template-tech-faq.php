<?php
/*
	Template Name: Tech FAQ
*/
	get_header();
?>
   <main id="mainContent">
   		<section class="content page">
   			<ol class="breadcrumbs" id="breadcrumbs">
		   		<li><a href="https://employee.provo.edu/">Home</a> / </li>
		   		<li><a href="https://employee.provo.edu/teaching-learning/">Technology Support</a> / </li>
		   		<li>Tech FAQ</li>
	   		</ol>
   			<article class="activePost schoolFeesMenu">
				<?php
					if(have_posts()) :
						while (have_posts()) : the_post();?>
					   		<h1><?php the_title(); ?></h1>
					   		<div>
					   				<?php 
						   				
						   				the_content(); 
						   				?>
						   				<h2>By Category</h2>
						   				<?php
						   				// Get the taxonomy's terms
										$terms = get_terms(
										    array(
										        'taxonomy'   => 'tech_faq_categories',
										        'hide_empty' => false,
										    )
										);
										// Check if any term exists
									if ( ! empty( $terms ) && is_array( $terms ) ) {
										// Run a loop and print them all
										    ?>
										    <div class="postgrid">
										    <?php
										foreach ( $terms as $term ) { 
										    ?>
										    	<article class="post">
										        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>"><?php echo $term->name; ?></a>
										        </article>
										    <?php
										}
										    ?>
										    
										    <?php
									} 
					   				?>
					   											
						   				</div>
					   		</div>
					   	<?php endwhile;
							else :
								echo('No tech FAQs currently found for this location');
					endif;
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