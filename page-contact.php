
<?php 

/*
	Template Name: Contact Page
*/

 ?>
 <?php get_header(); ?>

<h1 class = "page-title"><?php the_title(); ?></h1>

	<!-- <div class="wrapper-contact"> -->
	
			<!-- the wrapper has been inserted in the WP content editor -->
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<p>
					<?php the_content(); ?>
				</p>
			    
			<?php endwhile; ?>
	
	<!-- </div> wrapper-contact -->

<!-- 	<div class="wrapper-form">
		
	</div>  --><!-- wrapper-form -->


<?php get_footer(); ?>