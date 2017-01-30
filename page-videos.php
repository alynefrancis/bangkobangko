<?php 

/*

Template Name: Classic Videos Template

*/


 ?>

 <?php get_header(); ?>

 <h1 class = "page-title"><?php the_title(); ?></h1>

 <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
 	
 	<div class = "intro-content">

		<?php the_content(); ?>

 	</div> <!-- intro-content -->

 <?php endwhile; ?>


 	<?php if( have_rows('video_info') ): ?>


 		<?php while( have_rows('video_info') ): the_row(); 

	 		// vars
	 		$video_title = get_sub_field('video_title');
	 		$video_url = get_sub_field('video_url');
	 		$description = get_sub_field('description');

	 		?>
			<div class="each-video">

				<?php if( $description ): ?>

			 		<div class="video-description">	
			 
			 			<h1><?php echo $video_title; ?></h1>
		
							<?php echo $description; ?>
					
					</div> <!-- video-description -->
				<?php endif; ?>


				
				<?php if( $video_url ): ?>
					<div class="video-container">	
						<?php

						the_sub_field('video_url'); 

						?>
					</div><!-- video-container -->
				<?php endif; ?>
			
	   
			</div> <!-- /each-video -->
 		<?php endwhile; ?>

 	<?php endif; ?>
 
 <?php get_footer(); ?>