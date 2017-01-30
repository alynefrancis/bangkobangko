

<?php 

/*
	Template Name: (Single)Galleries Page
*/
/// don't really need template name as by default custom post types will display using single.php. Creating a special single post template for a custom post type, require you give it the name of the post type in the file name. 
 ?>

 <?php get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
 	<h1 class = "page-title"><?php the_title(); ?></h1>
 		<div class="gallery-intro">
 			
 				<?php the_content(); ?>
 			
 		</div> <!-- gallery-intro -->


	<div class="gallery-filter navigate columns" >
	        <ul id="filters" >
	            <?php
	                $images = get_field('images');
	                $image_terms = array();
	                $all_used_terms = array();
	                foreach( $images as $image ) {
	                    $image_terms = wp_get_post_terms($image['ID'], 'media_category', array('fields' => 'slugs'));

	                    $all_used_terms = array_unique( array_merge( $all_used_terms, $image_terms ) );
	                }
                  // if ( $all_used_terms >1) {
	                foreach ( $all_used_terms as $term ) {
                        if ( count($all_used_terms) >1) {
	                    echo '<li><a href="#" class = "buttonlink" data-filter=".'.$term.'">' . ucwords(preg_replace('/-/', ' ', $term)) . '</a></li>';
	                       }
                  }
	            ?>
	        </ul>
	    </div><!-- /gallery-filter -->

    

 	<div class="gallery_container isotope" id = "gallery_container" itemscope itemtype="http://schema.org/ImageGallery">
  <div id="preloader">
    <div class="loader"></div>
  </div>
  		<?php 
  		$images = get_field('images');
	
  		if( $images ) : ?>		
	        <?php foreach( $images as $image ) : 
	        	$terms = wp_get_object_terms($image['ID'], 'media_category');
	    	?>

	            <figure class="grid-sizer gallery-image image-item <?php if($terms) { foreach ($terms as $term) { echo $term->slug . ' ';}}?>" data-category="<?php if($terms) { foreach ($terms as $term) { echo $term->slug . ' ';}}?>" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
               		<a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="<?php echo $image['width'] . 'x' . $image['height']; ?>">
               		   	<img  src="<?php echo $image['sizes']['gallery-med']; ?>" itemprop="thumbnail" alt="<?php echo $image['alt']; ?>" />
               		</a>
               		<figcaption itemprop="caption description"><?php echo $image['caption']; ?></figcaption>                
	             </figure>
		
	        <?php endforeach; ?>		    
  		<?php endif; ?>
 </div> <!-- container_gallery -->


 <?php endwhile; ?>


 <div class="gallery-intro">
  
    <?php the_field('ketut_ceremony'); ?>
  
 </div> <!-- gallery-intro -->



<div class="gallery-nav">

<!--   	<?php next_post_link ('%link', '<i class="fa fa-long-arrow-left"></i>'); ?> -->
    <?php previous_post_link('%link', '&larr; %title'); ?>

  	<a href="<?php echo esc_url( home_url() ); ?>/?p=44"><i class="fa fa-th-large"></i></a>
     <?php next_post_link('%link', '%title &rarr;'); ?>
<!-- 
  	<?php previous_post_link ('%link', '<i class="fa fa-long-arrow-right"></i>'); ?> -->
</div>

<!-- end orig gallery html-->


<!-- Photoswipe HTML.  Now put all of the following somewhere on the page. -->
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>
<!-- end Photoswipe HTML -->


<?php get_footer(); ?>