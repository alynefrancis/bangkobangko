<?php get_header(); ?>

      <div class="category-results">
          <h1>Archived stories categorized as : <span><?php single_cat_title(); ?></span></h1>
    	<?php // If there are no posts to display, such as an empty archive page ?>
       
        <?php if ( ! have_posts() ) : ?>

            <h1 class="entry-title">Not Found</h1>
                <div class="not-found">
                  <p>Apologies, but no results were found for the requested archive. Perhaps searching with a different keyword will help find a related post.</p>

                    <?php get_search_form(); ?>

                </div><!-- not-found -->

        <?php endif; // end if there are no posts ?>
        <?php rewind_posts(); ?>
          
<div class="blog-stories">
        <?php // if there are posts, Start the Loop. ?>
            <?php // Start the loop ?>
                    <?php  while ( have_posts() ) : the_post(); ?>

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
                                                   
                            </div>  <!-- blog-info -->

                        
                        </div> <!-- closes blog-item -->
                    
        <?php endwhile; // End the loop. Whew. ?>   
    </div> <!-- blog-stories -->

       

    </div> <!-- /.category-resuts -->

   <div class="new-category">
     <p>Check out another category:</p>
          <?php 
               $args = array(  
                 'style'              => 'none',   
                 'title_li'           => __( '' )
               );

               wp_list_categories( $args ); 
           ?>
   
   <p>or</p>
   <a href="<?php echo get_page_link(13); ?>"><h5>Back to stories</h5></a>

   </div>


 


<?php get_footer(); ?>