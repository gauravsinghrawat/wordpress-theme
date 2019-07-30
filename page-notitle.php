<!-- this is generic template for only specific to developer use it will not effect our other pages in any way. we made this beacuse if user changes something in original then we have option to regain it.-->

<?php get_header(); 
/*
    Template Name: Page No Title
*/
?>
<body>

<!--<hr>
<h1>This index page of our wordpress theme.</h1>-->
<?php
    
    if( have_posts() ):
    while( have_posts() ): the_post();
    ?>
    <div class="conatiner">
    <div class="row">
    <div class="col-md-3">
         <?php dynamic_sidebar('starwar-left-sidebar'); ?>
    </div>
    <div class="col-md-6">
    <small>Posted On: <?php the_time( 'F j,Y' );   the_time('g:i a') ?>
    
    <?php the_category(); ?>
    </small>
    <p><?php the_content(); ?></p>
    </div>
     <div class="col-md-3 contact-sidebar" >
      <div class="contact-widget bg-warning " >
       <h1 class="bg-danger">Sidebar</h1>
               <?php dynamic_sidebar('starwar-right-sidebar'); ?>
        </div>
    </div>
    
    </div>
    </div>
    <hr>
    
    <?php endwhile; endif;  ?>
    
<?php get_footer(); ?>
    
