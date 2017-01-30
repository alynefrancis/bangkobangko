
<?php 

/*
	Template Name: Book Page
*/

 ?>
 <?php get_header(); ?>

<h1 class = "page-title"><span class = "legends-font"><?php the_title(); ?></span></h1>
	
	<div class="wrapper-legends">
				
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			    <?php the_content(); ?>
			  
	</div> <!-- wrapper-legends -->

	<div class="wrapper-bookcover">

		  <?php echo get_the_post_thumbnail(); ?>

	</div>  <!-- wrapper-bookcover -->

	<?php endwhile; ?>

<?php get_footer(); ?>