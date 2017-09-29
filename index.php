<?php get_header(); ?>

  <div id="main" class="container">

    <?php
  	if ( have_posts() ) :

  		/* Start the Loop */
  		while ( have_posts() ) : the_post(); ?>

  		  <section class="post-wrapper row">

    		  <div class="post-container col-md-7">

  			    <h2 class="post-title"><?php the_title(); ?></h2>

  			    <div class="post-content">

  			      <?php the_content(); ?>

  			    </div>

    		  </div>

  		  </section>

  		<?php endwhile;

  	endif;
  	?>

  </div>

<?php get_footer(); ?>