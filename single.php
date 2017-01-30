
<?php get_header(); ?>

	<div class="full-blog-post">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="full-blog-item">	
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>		
				<h5>By: <?php the_author(); ?> on <?php the_time( 'F jS, Y' ); ?></h5>
				<h5><span><?php the_category( ' |  ' ); ?></span></h5>
					<div class="full-blog-image">		
						<?php the_post_thumbnail('large'); ?>
					</div> <!---image -->

					<div class="blog-text">		
					
						<?php the_content(); ?>			

					</div>	<!-- blog-text -->


		</div> <!-- closes blog-item -->	

		<?php endwhile; endif; ?>

			<?php get_sidebar( 'stories'); ?>			

	</div> <!-- full-blog-post -->

	<div class="nav-stories">
	  	<p class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></p>
	  	<p class="nav-previous-small"><?php previous_post_link('%link', '&larr; previous' ); ?></p>
	  	<p><a href="<?php echo esc_url( home_url() ); ?>/?p=13"><i class="fa fa-th-large"></i></a></p>

	 	 <p class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></p>
	 	 <p class="nav-next-small"><?php next_post_link('%link', 'next &rarr;'); ?></p>
	</div><!-- #nav-stories -->


<?php get_footer(); ?>
