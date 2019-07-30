
<?php get_header(); ?>
    <body>

    <div class="container post-container">
        <div class="row">
            <div class="col-md-12 p-2 index-content text-center" >
<?php
    
    if( have_posts() ):
    while( have_posts() ): the_post();
 ?>
         <h3><?php the_title();  ?></h3>
            <p><?php the_content(); ?></p>
    
    <?php endwhile; endif; 
    ?>
         
            </div>
        </div>
    </div>

<?php get_footer(); ?>