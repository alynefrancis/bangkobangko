 
<?php get_header(); ?>


	<h1 class = "page-title"><?php echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
<!-- 
	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bangko-theme' ) . '</span>', 'after' => '</div>' ) ); ?>  -->
		
		<div class="intro-content">
				<?php echo apply_filters( 'the_content', get_post_field( 'post_content', get_option( 'page_for_posts' ) ) ); ?>
		</div> <!-- intro-content -->

			<div class=" submit-story">
				<p><a href="mailto:<?php bloginfo('admin_email'); ?>"><i class="fa fa-pencil"></i>submit your own story for consideration</a></p>
			</div> <!-- wrapper submit-story -->

		<div class="blog-stories">

			<?php // Start the loop ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<div class="blog-item">	
			
					<div class="blog-image">		
						
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
					</div> <!-- blog-image -->
					<div class="blog-info">			
						<h4 ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<h5>By: <?php the_author(); ?> on <?php the_time( 'F jS, Y' ); ?></h5>
						<h5><span><?php the_category( ' | ' ); ?></span></h5>
							<p class="blog-descript"><?php echo strip_tags( get_the_excerpt() ); ?></p>
							<a href="<?php the_permalink(); ?>" class="read-more">Read more <i class="fa fa-long-arrow-right"></i></a>			
					</div>	<!-- blog-info -->

				
				</div> <!-- closes blog-item -->
			<?php endwhile; endif; ?>
		

		</div> <!-- blog-stories -->


<?php get_footer(); ?>
