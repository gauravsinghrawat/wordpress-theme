<?php get_header(); ?>
<body>
<!--<hr>-->
<!--<h1>This index page of our wordpress theme.</h1>-->

   
    <div class="container-fluid post-container">
        <div class="row">
            <div class="col-md-9 p-5 index-content" >
            
    <!--home page navbar primary-->
        <!-- <nav class=" navbar">
    
    <?//php  wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=> 'nav navbar',)); ?>
       </nav>-->
       
    <?php
    
    if( have_posts() ):
        while( have_posts() ): the_post();  ?>
               
                <?php get_template_part('content',get_post_format()); ?>
                <!--above will look for 'content-aside.php' file  -->
                <hr><hr>    
         <?php endwhile; endif;  ?>
         
    </div>
      
           <div class="col-md-3 p-3 sidebar">
                <?php dynamic_sidebar('starwar-right-sidebar'); ?>
            </div>
        </div>
    </div>
    <hr>
    
    
    
<?php get_footer(); ?>