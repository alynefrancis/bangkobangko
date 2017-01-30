<?php 

/*
	Template Name: Thankyou Page
*/

 ?>
<?php get_header(); ?>

 	<h1 class = "page-title"><?php the_title(); ?></h1>

 		<blockquote> <?php the_field( 'quote' ); ?></blockquote>

 	<div class = "intro-content">

 		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			    <?php the_content(); ?>
			    
		<?php endwhile; ?>

 	</div> <!-- intro-content -->

 	<?php
  /* Since we called the_post() above, we need to
   * rewind the loop back to the beginning that way
   * we can run the loop properly, in full.
   */
  rewind_posts(); ?>
 	<div class="thankyou-images">	

 	<?php 

 		$images = get_field('image');

 			if( $images ): ?>
 			
 		        <?php foreach( $images as $image ): ?>
 		         <div class="about-image">

 		            <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />

 		         </div>	
 		        <?php endforeach; ?>
 				  
 				<?php endif; ?>			
 								
 	</div> <!-- about-images -->

<?php get_footer() ?>

