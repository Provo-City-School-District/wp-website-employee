<?php
	get_header();
?>
     <main id="mainContent">

   		<section class="content page">
   		<?php custom_breadcrumbs(); ?>
   			<article class="activePost postgrid">
   				<h1><?php printf( __( 'Search Results for: %s'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
				<?php
					if (function_exists('relevanssi_didyoumean')) { relevanssi_didyoumean(get_search_query(), "<p>Did you mean: ", "</p>", 5);}
					if(have_posts()) :
						while (have_posts()) : the_post();?>
							<article class="post">
						   			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					   				<?php
						   				the_excerpt();
					   				?>

							</article>
					   	<?php endwhile;
							else :
								echo '<p>There are no results for your current search</p>';
					endif;
				?>
   			</article>
   		</section>
   		<?php get_sidebar( 'employeeglobalsidebar' ); ?>
   </main>
<?php
	get_footer();
?>