<?php get_header(); ?>

<div class="wrap"><?php 
 while(have_posts()){
    the_post();
    ?>
    <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php if(get_the_post_thumbnail_url()) {
         echo get_the_post_thumbnail_url(get_the_ID(  ));
      } else {
         echo get_theme_file_uri( '/images/ocean.jpg' );
      }
      ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>DONT FORGET TO REPLACE ME WITH A CUSTOM FIELD</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

    <?php
    $postParentID = wp_get_post_parent_id(get_the_ID());
    if ($postParentID) {
       ?>
      <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_the_permalink( $postParentID );?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title(wp_get_post_parent_id(get_the_ID())); ?></a> <span class="metabox__main"><?php echo get_the_title(); ?></span>
        </p>
      </div>
      <?php } ?>

      <?php 

      $isParent = get_pages( array(
            'child_of'=> get_the_ID()
         ) );
       if ($postParentID || $isParent) { ?>
      <div class="page-links">
        <h2 class="page-links__title"><a href="<?php echo get_the_permalink($postParentID );?>"><?php echo get_the_title($postParentID);?></a></h2>
        <ul class="min-list">
          <?php 
             if ($postParentID) {
               $subPageof = $postParentID; 
            } else {
               $subPageof = get_the_ID();
            }
          wp_list_pages( array(
             'title_li'=> NULL,
             'child_of'=> $subPageof,
             'sort_column'=>'menu_order',
             'show_date'=> '',
             'item_spacing' => 'preserve'
          )); ?>
        </ul>
      </div>
       <?php }  ?>


      <div class="generic-content">
        <?php the_content(); ?>
      </div>
    </div>
 <?php } ?>
 </div>

 <?php get_footer(); ?>

