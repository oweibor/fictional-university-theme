<?php get_header(); ?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php if(get_the_post_thumbnail_url()) {
         echo get_the_post_thumbnail_url(get_the_ID(  )); } 
         else {
            echo get_theme_file_uri( '/images/ocean.jpg' );
         }
      ?>)">
      </div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Welcome to our Blog!</h1>
        <div class="page-banner__intro">
          <p>DONT FORGET TO REPLACE ME WITH A CUSTOM FIELD</p>
        </div>
      </div>
</div>

<div class="container container--narrow page-section">
   <?php while(have_posts(  )) {
      the_post(  );?>
      post<br>
   <?php }?>
</div>

 <?php get_footer(); ?>
