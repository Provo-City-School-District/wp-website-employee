<?php
	get_header();
?>
   <main id="mainContent">
   		<section class="content singlePost">
	   		<ol class="breadcrumbs" id="breadcrumbs">
		   		<li><a href="https://employee.provo.edu/">Home</a> / </li>
		   		<li><a href="https://employee.provo.edu/technology/">Technology Support</a> / </li>
		   		<li><a href="https://employee.provo.edu/technology/tech_faq/">Tech FAQ</a> / </li>
		   		<li><?php single_cat_title(); ?></li>
	   		</ol>
	   		<article class="activePost">
	   		<h1>Tech FAQ Category : <?php single_cat_title(); ?></h1>
			
			<?php
			
				$cat = single_cat_title('', false);
				$args = array(
					'post_type' => 'tech_faq',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1,
					'tax_query' => array(array('taxonomy' => 'tech_faq_categories','field' => 'name', 'terms' => $cat))
				);
				$query = new WP_query($args);
				if($query->have_posts()) :
					while ($query->have_posts()) : $query->the_post();?>
				   		<ul>
					   		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				   		</ul>
				   	<?php 
					endwhile;
					else :
						echo '<p>No Content Found</p>';
				endif;
			?>
	   		</article>
   		</section>
   		<?php get_sidebar( 'technology' ); ?>
   </main>
<?php
	get_footer();
?>