
<?php  
	/*
	Template Name: About Page
*/
?>

<?php get_header() ?>

	<h1 class = "page-title"><?php the_title(); ?></h1>

	<div class = "intro-content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			    <?php the_content(); ?>

			<?php endwhile; ?>

	</div> <!-- intro-content -->
	<div class="about-images">	
	
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