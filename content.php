   <h3 class="text-lg text-danger"><?php the_title(); ?></h3>
    <?php the_category(); ?>
    <p class="text-primary bg-primary"><?php the_content(); ?></p> 
    <div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?><!--<span>This is post thumbnail.</span>--></div>
    <small class="text-primary">Posted On: <?php the_time( 'F j,Y' );   the_time('g:i a') ?>
    </small>
  
    <?php //the_category(); ?>