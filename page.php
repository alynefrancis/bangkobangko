
<?php get_header() ?>

	<h1 class = "page-title"><?php the_title(); ?></h1>

	<div class = "about-content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<!-- by default the content is placed in <p> tags -->
			    <?php the_content(); ?>

			<?php endwhile; ?>

	</div> <!-- about-content -->
	<div class="about-images">	
	
	<?php 

	$images = get_field('image');

		if( $images ): ?>
		
	        <?php foreach( $images as $image ): ?>
	         <div class="about-image">
	              <!--   <a href="<?php echo $image['url']; ?>"> -->
	                     <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
	                <!-- </a> -->
	                <!-- <p><?php echo $image['caption']; ?></p> -->
	         </div>	
	        <?php endforeach; ?>
			  
			<?php endif; ?>								
	</div> <!-- about-images -->

<?php get_footer() ?>
<?php 

/*
	Template Name: Page.php
*/

 ?>

 <?php get_header(); ?>
page.php This is the template that displays all pages by default and is also the "default template" in the dropdown

 	<h1 class = "page-title"><?php the_title(); ?></h1>
 		<div class="gallery-intro" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
 				<p><?php the_content(); ?></p>
 			<?php endwhile; ?>

 		</div> <!-- gallery-intro -->

<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'themeTextDomain' ) . '</span>', 'after' => '</div>' ) ); ?>

 		

 		

		<div class="wrapper-gallery" itemscope itemtype="http://schema.org/ImageGallery">
 		<?php 

 		$images = get_field('photos');

 		if( $images ): ?>

 			<div class="gallery-image" id="imageGallery">
 		        <?php foreach( $images as $image ): ?>
 		            
 		            	<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		               		 <a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="1600x1066" data-index="0">
 		                     <img src="<?php echo $image['url']; ?>" height="auto" width="600" itemprop="thumbnail" alt="Image description">
 		                	</a>
 		                <p><?php echo $image['caption']; ?></p>
 		                <!-- <figcaption itemprop="caption description"><?php echo $image['caption']; ?></figcaption> -->
 		              </figure>
 					
 		        <?php endforeach; ?>
 		    </div>
 		<?php endif; ?>



 <!-- 	<div class="wrapper-gallery" itemscope itemtype="http://schema.org/ImageGallery">
 	
 		<div class="gallery-image" id="imageGallery">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="<?php echo $image['url']; ?>" itemprop="contentUrl" data-size="1600x1066" data-index="0">
 		          <img src="<?php echo $image['url']; ?>" height="auto" width="600" itemprop="thumbnail" alt="Image description">
 		      </a>
 		      
 		  </figure>
 		</div> -->


<!-- 

 		<div class="gallery-image" id="imageGallery">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats01.jpg" itemprop="contentUrl" data-size="1600x1066" data-index="0">
 		          <img src="img/Boats/boats01.jpg" height="auto" width="600" itemprop="thumbnail" alt="Image description">
 		      </a>
 		      	<figcaption itemprop="caption description">Image caption</figcaption>
 		  </figure>
 		</div>
 		<div class="gallery-image" id="imageGallery">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats02.jpg" itemprop="contentUrl" data-size="1600x1069" data-index="1">
 		          <img src="img/Boats/boats02.jpg" height="auto" width="600" itemprop="thumbnail" alt="Image description">
 		      </a>
 		      	
 		  </figure>
 		</div>
 		<div class="gallery-image" id="imageGallery">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats03.jpg" itemprop="contentUrl" data-size="1600x1061" data-index="2">
 		          <img src="img/Boats/boats03.jpg" height="auto" width="600" itemprop="thumbnail" alt="Image description">
 		      </a>

 		  </figure>
 		</div>

 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats04.jpg" itemprop="contentUrl" data-size="1600x1079" data-index="3">
 		          <img src="img/Boats/boats04.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats05.jpg" itemprop="contentUrl" data-size="1600x1063" data-index="4">
 		          <img src="img/Boats/boats05.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats06.jpg" itemprop="contentUrl" data-size="1600x1078" data-index="5">
 		          <img src="img/Boats/boats06.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats07.jpg" itemprop="contentUrl" data-size="1800x1081" data-index="6">
 		          <img src="img/Boats/boats07.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats08.jpg" itemprop="contentUrl" data-size="1600x1081" data-index="7">
 		          <img src="img/Boats/boats08.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats09.jpg" itemprop="contentUrl" data-size="1600x1063" data-index="8">
 		          <img src="img/Boats/boats09.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats10.jpg" itemprop="contentUrl" data-size="1600x1080" data-index="9">
 		          <img src="img/Boats/boats10.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats11.jpg" itemprop="contentUrl" data-size="1600x1013" data-index="10">
 		          <img src="img/Boats/boats11.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats12.jpg" itemprop="contentUrl" data-size="1600x1071" data-index="11">
 		          <img src="img/Boats/boats12.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image"> 
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats13.jpg" itemprop="contentUrl" data-size="1068x1600" data-index="12">
 		          <img src="img/Boats/boats13.jpg" height="600" width="auto" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats14.jpg" itemprop="contentUrl" data-size="1600x1074" data-index="13">
 		          <img src="img/Boats/boats14.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats15.jpg" itemprop="contentUrl" data-size="1600x1052" data-index="14">
 		          <img src="img/Boats/boats15.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats16.jpg" itemprop="contentUrl" data-size="1600x1088" data-index="15">
 		          <img src="img/Boats/boats16.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats17.jpg" itemprop="contentUrl" data-size="1600x1003" data-index="16">
 		          <img src="img/Boats/boats17.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats18.jpg" itemprop="contentUrl" data-size="1600x1078" data-index="17">
 		          <img src="img/Boats/boats18.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats19.jpg" itemprop="contentUrl" data-size="1600x1065" data-index="18">
 		          <img src="img/Boats/boats19.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats20.jpg" itemprop="contentUrl" data-size="1600x1035" data-index="19">
 		          <img src="img/Boats/boats20.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats21.jpg" itemprop="contentUrl" data-size="1600x1065" data-index="20">
 		          <img src="img/Boats/boats21.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats22.jpg" itemprop="contentUrl" data-size="1600x1064" data-index="21">
 		          <img src="img/Boats/boats22.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats23.jpg" itemprop="contentUrl" data-size="1600x1040" data-index="22">
 		          <img src="img/Boats/boats23.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats24.jpg" itemprop="contentUrl" data-size="1600x1018" data-index="23">
 		          <img src="img/Boats/boats24.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats25.jpg" itemprop="contentUrl" data-size="1600x1076" data-index="24">
 		          <img src="img/Boats/boats25.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats26.jpg" itemprop="contentUrl" data-size="1600x1062" data-index="25">
 		          <img src="img/Boats/boats26.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats27.jpg" itemprop="contentUrl" data-size="1600x1061" data-index="26">
 		          <img src="img/Boats/boats27.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats28.jpg" itemprop="contentUrl" data-size="1600x1044" data-index="27">
 		          <img src="img/Boats/boats28.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image"> 
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats29.jpg" itemprop="contentUrl" data-size="1087x1600" data-index="28">
 		          <img src="img/Boats/boats29.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats30.jpg" itemprop="contentUrl" data-size="1600x1041" data-index="29">
 		          <img src="img/Boats/boats30.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats31.jpg" itemprop="contentUrl" data-size="1600x1058" data-index="30">
 		          <img src="img/Boats/boats31.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats32j.jpg" itemprop="contentUrl" data-size="1600x1069" data-index="31">
 		          <img src="img/Boats/boats32j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats33j.jpg" itemprop="contentUrl" data-size="1600x1050" data-index="32">
 		          <img src="img/Boats/boats33j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats34j.jpg" itemprop="contentUrl" data-size="1600x1072" data-index="33">
 		          <img src="img/Boats/boats34j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats35j.jpg" itemprop="contentUrl" data-size="1600x1073" data-index="34">
 		          <img src="img/Boats/boats35j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats36j.jpg" itemprop="contentUrl" data-size="1600x1072" data-index="35">
 		          <img src="img/Boats/boats36j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats37j.jpg" itemprop="contentUrl" data-size="1600x1071" data-index="36">
 		          <img src="img/Boats/boats37j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats38j.jpg" itemprop="contentUrl" data-size="1600x1067" data-index="37">
 		          <img src="img/Boats/boats38j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div>
 		<div class="gallery-image">
 		  <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
 		      <a href="img/Boats/boats39j.jpg" itemprop="contentUrl" data-size="1600x1071" data-index="38">
 		          <img src="img/Boats/boats39j.jpg" height="auto" width="600" itemprop="thumbnail" alt="">
 		      </a>
 		  </figure>
 		</div> -->
 	</div> <!-- gallery-wrapper -->
 </div> <!-- wrapper -->

<?php get_footer(); ?>