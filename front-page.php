<?php get_header() ?>


	<div class="gallery-links">	
		<?php
		 $args = array(
	 		'post_type' => 'galleries'
	 	);
	 	$the_query = new WP_Query( $args );
	 	 ?>

		<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<div class="section-image">
				<h4><?php the_title(); ?></h4>

				<div class="item">	
				
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>


				</div> <!--  item -->

			</div> <!--  section-image -->

		<?php endwhile; else: wp_reset_postdata();?>
		           
		        <h1 class ="title-page">Oh no!</h1>
		           
		           <p>Sorry, no content is appearing for the page!</p>

		<?php endif; ?>

			
	</div> <!-- gallery-links -->

<?php get_footer() ?>