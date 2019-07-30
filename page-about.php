<?php get_header(); ?>
<body>
<!--<hr>
<h1>This index page of our wordpress theme.</h1>-->
<?php
    
    if( have_posts() ):
    while( have_posts() ): the_post();
    ?>
 
    <p><?php the_content(); ?></p>
      
    <h3><?php the_title();  ?></h3>
        
    <hr>
    
    <?php endwhile; endif;  ?>
    
<?php get_footer(); ?>