<?php get_header(); ?>
<body>
<!--<hr>-->
<!--<h1>This index page of our wordpress theme.</h1>-->
   <div class="row">
        <div class="col-md-9 p-5 index-content" >
 
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
                <div class="container-fluid post-container">
     
       <!--Latest posts data  -->    
           
 <div class="col-sm-12 p-5 index-content" >
    <h3 class="text-center bg-danger">Latest Post</h3>
    <?php
    $args = array(
                'type'=>'post',
               'posts_per_page'=>1,
                'offset'=>3,
                'category_in'=>array(1,12,3),
                'category_not_in'=>array(10),
    );
    //$lastBlog = new WP_Query('type=post&posts_per_page=1&offset=2');
    $lastBlog = new WP_Query($args);
    //by using offset we can prevent any of the post to display
                
    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post();  ?>
                
                <?php get_template_part('content',get_post_format()); ?>
                <!--above will look for 'content-aside.php' file  -->
                <hr><hr>    
    <?php endwhile; 
        endif; 
        wp_reset_postdata(); 
     ?>
         
         <!--this will print the post according to wordpress build in setting  reading option-->
         <hr>
          <h3 class="bg-danger">Print all posts according to setting reading post options</h3>
           <?php
    $lastBlog = new WP_Query('type=post&posts_per_page=-1&category_name=wordpress');
    //by using offset we can prevent any of the post to display
                
    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post();  ?>
                
                <?php get_template_part('content',get_post_format()); ?>
                <!--above will look for 'content-aside.php' file  -->
                <hr><hr>    
<?php endwhile; 
        endif;
        wp_reset_postdata(); 
     ?>
         
    </div>
        </div>
    </div>
    <hr>
    
    
    
<?php get_footer(); ?>