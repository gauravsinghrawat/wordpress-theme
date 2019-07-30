<!DOCTYPE html >
<html <?php  language_attributes(); ?> >  <!--lang="en"-->
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<?php
    //it will check whether we in home or not
    //custom functions for specific pages 
    if( is_home() ): //is_front_page()
        $starwar_classes = array('starwarclass', 'my-class');
    else:
        $starwar_classes = array( 'no-starwar-class' );
    endif;
    //var_dump(get_custom_header());
    ?>

<body <?php body_class( $starwar_classes ); ?>> 
  
  <!--sidebar toggler-->
  <div>
  <button class="btn btn-primary nav-toggle" id="navi-toggler" >nav</button>
  <button id="toggle" class="btn btn-warning bg-warning">sidebar</button>
  </div>
   <!--providing body to specific class of specific page-->
   
   <!------------------------------------------------------------------>
   <!--nav bar primary-->
   
  <div class="container " id="navigation">
   <nav class="navbar">
    <?php 
       wp_nav_menu(array('theme_location'=>'primary',
                            'container'=>false,
                            'menu_class'=> 'nav navbar',
                           )); 
       ?>
       </nav>
    </div>
    <!------------------------------------------------------------------------->
    <!-- header background image -->
    <img src="<?php header_image(); ?>" style="width:100%;height:100px; " height="<?php get_custom_header()->height;?> " width="<?php get_custom_header()->width; ?>" alt="">
    
    <!--side bar hidden-->
    <div class="starwar-sidebar star" id="star-sidebar">
       <span id="sidebar">&times;</span>
            <div class="sidebar-scroll">
                 <?php dynamic_sidebar('starwar-right-sidebar'); ?>
                  <?php dynamic_sidebar('starwar-left-sidebar'); ?>
                  <?php dynamic_sidebar('footer-first-sidebar'); ?>
                  <?php dynamic_sidebar('footer-second-sidebar'); ?>
             </div> 
        </div>
    