<?php get_header(); ?>

     <div class="search-results">   
            <?php if ( have_posts() ) : ?>

                <h1>Search Results for: <span><?php echo get_search_query(); ?></span></h1>

            <div class = "new-search">
            <p>Try a new search, if you like:</p>
                <?php get_search_form(); ?>
            </div>
               
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
                                        <!-- <h5><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></h5> -->
                                        <!-- need to add strip tags bc without it the output of the excerpt is inside p tags inside the h2 and all the font is huge -->
                                            <!-- <hr> -->
                                            <p class="blog-descript"><?php echo strip_tags( get_the_excerpt() ); ?></p>
                                            <a href="<?php the_permalink(); ?>" class="read-more">Read more <i class="fa fa-long-arrow-right"></i></a>  
                                            <!-- <h5><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></h5> -->                
                                    </div>  <!-- blog-info -->

                                
                                </div> <!-- closes blog-item -->
                            
                <?php endwhile; // End the loop. Whew. ?>       
        </div> <!-- /blog-stories -->
                
            <?php else : ?>

                <h1 class="entry-title">Not Found</h1>
                    <div class="not-found">
                       <p>Apologies, but no results were found for the requested search. Perhaps searching with a different keyword will help find a related post.</p>

                           <?php get_search_form(); ?>

                   </div><!-- not-found -->

            <?php endif; ?>

 </div><!-- /.search-results -->


<?php get_footer(); ?>