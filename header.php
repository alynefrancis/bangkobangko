<?php
/**
 * The header template
 *
 * Contains the opening of <div id="main"> and all content after.
 *
 * @package bangkobangkoTheme
 */
?>

<!DOCTYPE html>
<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( "charset" ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <title><?php wp_title( "|", true, "right" ); ?></title>

    <!-- favicon & links -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo( "pingback_url" ); ?>" />

    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head(); ?>

<body <?php body_class(); ?>>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    
    <header class="header" id="site-header" role="banner">
        <div class="wrapper-header">
            <div class="header-content">

                <a href="<?php echo esc_url( home_url( "/" ) ); ?>">
                    <h1 class="header-title"><?php bloginfo('name'); ?></h1> 
                </a> 
                        
                <div class="header-description">
                    <p><?php bloginfo('description'); ?></p>
                </div> <!-- /description -->
                        <div href="#" class="hamburger">
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>         
            </div> <!-- /header-content -->

            <nav class="nav" id ="access" role="navigation">
                <?php 
                    
                    $args = array(
                        'container'         => false,
                        'theme_location'    => 'primary-menu',
                        'menu_class'        => 'menu'
                        );
                    
                    wp_nav_menu( $args );
                 ?>
                        
            </nav> <!-- /nav -->
            
        </div> <!-- /wrapper-header  -->  
    </header><!-- /header -->
<div class="wrapper" id = "main">
<div class ="back-to-top"><i class="fa fa-chevron-up"></i></div>


