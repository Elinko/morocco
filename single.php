<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package morocco
 */

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
            // var_dump($previous);
              $next = get_next_post();
            ?>
            <a href="<?php echo get_the_permalink($previous->ID) ?>" class="d-flex align-items-center"><span class="slick-arroww slick-prev"></span><strong>Predošlí článok</strong>  </a>  
            <a href="<?php echo get_the_permalink($next->ID) ?>    " class="d-flex align-items-center"><strong>Nasledujúci článok</strong> <span class="slick-arroww slick-next"></span></a> 
          </div>
        </div>
      </section>
      <section class="advise">
        <div class="container">
          <div class="heading ">
          <?php 
            $args = array( 
              'post_type'   => 'zajazdy',
              'posts_per_page' => '3',
              'orderby'=> 'post_date', 
            ); 

            query_posts( $args );;


            // var_dump(get_posts());
            ?> 

            <div>
              <span class="h3 yellow">Vreľo</span>
              <h2>Odporúčame</h2>
            </div>
            <a href="" class="btn btn__transparent btn__transparent--black">
              ZOBRAZIŤ VŠETKY PONUKY
            </a>
          </div>
          <div class="row">

          <?php while(  have_posts() ) :   ?>
            <?php the_post(); ?>
            <div class="col-md-6 col-lg-4 col-12">
              <div class="item-trip">
                <div class="item-trip__head d-flex justify-content-between align-items-center">
                  <h3 class="h4">
                    <?php the_title() ?>
                  </h3>
                  <?php $mycat = get_the_terms(get_the_ID(), 'zajazdy_category') ?>
                  <?php foreach($mycat as $postCat): ?>
                    <span class="badge" style="background: <?php echo $postCat->description; ?>">
                      <?php echo $postCat->name; ?>
                    </span>
                  <?php endforeach; ?>
                </div>
                <?php if($location = get_field('oblast')): ?>
                <p><?php echo $location ; ?></p>
                <?php endif; ?>
                <?php $price = get_field('terminy'); 
                  // var_dump($price[0]);
                ?>
                <div class="d-flex justify-content-between price">
                  <h3>od&nbsp;<?php echo $price[0]['cena'] ;?>&nbsp;€</h3>
                  <a href="" class="link-arrow">Zobraziť viac&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <?php echo get_the_post_thumbnail(); ?>
  
              </div>
            </div>
          <?php endwhile; ?>

          </div>
        </div>
      </section>
       
       
       
      <br>
      <br>


    </main>

<?php 
get_footer();
