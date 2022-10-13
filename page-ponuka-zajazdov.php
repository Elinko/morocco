<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package morocco
 */
  /*
	 Template Name: Ponuka Zajazdov
 */
get_header();
?>

<main class="page blog">
      <div class="container">
        <div class="item-heading"> 
          <div class="row">
            <div class="col-md-6 item-heading__wrap">
              <div class="item-heading__content">
                <h1><?php echo get_the_title(); ?></h1>
                <?php echo get_the_content() ?>

              </div>
            </div>
            <div class="col-md-6 item-heading__img">
            <?php echo get_the_post_thumbnail() ?>

            </div>
          </div>
        </div>
      </div>

      <?php 

        $args = array( 
          'post_type'   => 'zajazdy',
          'posts_per_page' => '-1',
          'orderby'=> 'post_date', 
        ); 

        query_posts( $args );;


        // var_dump(get_posts());
      ?>

       
      <section class="advise">
        <div class="container">
          <div class="row">
          <?php while (  have_posts() ) :  the_post(); ?> 
            <div class="col-md-6 col-lg-4 col-12">
              <a href="<?php the_permalink(); ?>" class="item-trip" href="<?php echo the_permalink(); ?>">
                <div class="item-trip__head d-flex justify-content-between align-items-center">
                  <h3 class="h4">
                  <?php echo the_title(); ?>
                  </h3>
                  <?php $mycat = get_the_terms(get_the_ID(), 'zajazdy_category') ?>
                  <?php foreach($mycat as $postCat): ?>
                    <?php 
                    // var_dump($postCat ) ;
                    ?>
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
                  <h3><?php pll_e('od'); ?>&nbsp;<?php echo $price[0]['cena'] ;?>&nbsp;€</h3>
                  <div class="link-arrow"><?php pll_e('Zobraziť viac'); ?>&nbsp;<i class="fa-solid fa-arrow-right"></i></div>
                </div>
                <?php echo get_the_post_thumbnail(); ?> 
              </a>
            </div>
          <?php endwhile; ?>

          </div>
          <div class="text-center more-trip">
            <a href="" class="btn btn__blue"><?php pll_e('ZOBRAZIŤ ĎALŠIE'); ?> </a>
          </div>
        </div>
      </section>
      <?php include('inc/trip-for-you.php') ?>

      <br>
      <br>


    </main>


<?php

get_footer();
