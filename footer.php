<?php
/**
 * The footer template
 *
 * Contains the closing of <div id="main"> and all content after.
 *
 * @package bangkobangkoTheme
 */
?>
</div><!---wrapper id="main"-->

<footer id="colophpone" role="contentinfo">
	<div class="wrapper-footer">

		<div class="contact-info">

			<div class="footer-left">  		
				<h4>More Goodies</h4>
					<ul class="more-info">
						<li><i class="fa fa-youtube-play"></i><a href="<?php echo get_page_link(312); ?>"><p>Watch classic videos</p></a></li>
						<li><i class="fa fa-pencil"></i><a href="mailto:<?php bloginfo('admin_email'); ?>"><p>Submit your own story</p></a></li>
						<li><i class="fa fa-book"></i><p>The Book: <a href="<?php echo get_page_link(164); ?>"><span class= "legends-footer-font">Legends of Desert Point</span></a></p></li> 
					</ul>
			</div> <!-- footer-left -->

				
			<div class="footer-middle">
					
				<h4>Please get in touch</h4>
					<ul class="contact">
						<li><i class="fa fa-map-marker"></i><p> Box 41. Stewart's Pt CA. 95480</p></li>
						<li><i class="fa fa-phone"></i><p><a href="tel:1-707-847-3653">+1-707-847-3653</a></p></li>

						<li><i class="fa fa-envelope"></i><p><?php 
						    $content = "legendsofdesertpoint@gmail.com"; 
						    $args = array('text' => '',
						                              'css_class' => '',
						                              'css_id' => '',
						                              'echo' => 1); 
						    if (function_exists('encryptx')) { 
						        encryptx($content, $args); 
						    } else { 
						        echo sprintf('<li><i class="fa fa-envelope"></i><p><a href="mailto:%s" id="%s" class="%s">%s</a></p>', $content, $args['css_id'], $args['css_class'], ($args['text'] != '' ? $args['text'] : $content)); 
						    } 
						?></p></li>
			
					</ul>
			</div> <!-- footer-middle	 -->
		</div> <!-- contact info -->

			<div class="footer-right">
				<a href="<?php echo get_page_link(44); ?>"><h2><?php bloginfo('name'); ?></h2></a>
				<p class="footer-links">

				 <?php 
				 	$args = array(
				 	  'container'       => false,
				 	  'echo'            => false,
				 	  'items_wrap'      => '%3$s',
				 	  'depth'           => 0,
				 	);

				 	echo strip_tags(wp_nav_menu( $args ), '<a>' );

				  ?>

				</p>
				<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><br></p>
				
			</div> <!-- footer-right -->

		<div class ="designer">
			<p> website designed and developed<br class="small"> by <a href="http://alynefrancis.com">alyne francis</a></p>

		</div>

	</div>

</footer> <!-- footer-background -->


<?php wp_footer(); ?> 
</body>

</html>