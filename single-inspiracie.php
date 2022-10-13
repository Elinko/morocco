<?php
get_header();
?>

<main class="page inspiration-detail">
      <div class="container">
         <div class="inspiration-detail__heading">
          <img src=" <?= get_the_post_thumbnail_url();  ?> " alt="">
          <div class="d-flex  flex-column justify-content-between">
            <span class="btn-small btn-small__gray">
              <?= get_the_date();  ?>
            </span>
            <div> 


            <?php
              $categories  = get_the_terms( $post->ID, 'Inspiration_category' );
              foreach ($categories as $key => $value) {
                # code...
              }
            // var_dump(get_the_terms( $post->ID, 'Inspiration_category' )); ?>
            <?php  foreach ($categories as $key => $value): ?>
              <a href="<?php echo get_home_url() . '/inspiration_category/'. $value->slug;  ?>" class="btn-small" style="background: <?php echo $value->description; ?>">
                <?php echo  $value->name; ?>
              </a>
            <?php endforeach; ?>
               
              <h1>
                <?php echo get_the_title(); ?>
              </h1>
            </div>
          </div>
         </div>
      </div>

      <section class="inspiration-detail__content">
        <div class="container">
          <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <?php echo the_content() ?>


            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="d-flex justify-content-between slick-slider" >
            <?php  $previous = get_previous_post() ;
              $next = get_next_post();
            ?>
            <a href="<?php echo $previous->guid; ?>" class="d-flex align-items-center"><span class="slick-arroww slick-prev"></span><strong>Predošlí článok</strong>  </a>  
            <a href="<?php echo $next->guid; ?>    " class="d-flex align-items-center"><strong>Nasledujúci článok</strong> <span class="slick-arroww slick-next"></span></a> 
          </div>
        </div>
      </section>
      <?php include('inc/advise.php') ?>
       
       
       
       
      <br>
      <br>


    </main>

<?php

get_footer();
