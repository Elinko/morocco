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
	 Template Name: Blog
 */
get_header();
?>
 
<main class="page blog">
      <div class="container">
        <div class="item-heading"> 
          <div class="row">
            <div class="col-md-6 item-heading__wrap">
              <div class="item-heading__content">
                <h1> 
					<?php echo get_the_title(); ?>
				</h1>
				<?php echo get_the_content() ?>
              </div>
            </div>
            <div class="col-md-6 item-heading__img">
              <img src="<?= get_field('obrazok'); ?>	" alt="">
            </div>
          </div>
        </div>
      </div>

      <section class="categories">
        <div class="container">
          <div class="categories__wrap">
			<?php 

				$args = array(
					'taxonomy' => 'category',
					'orderby' => 'name',
					'order'   => 'ASC'
				);

				$cats = get_categories($args);

        // var_dump($cats );

				foreach($cats as $cat) {
			?>
				<a href="<?php echo get_category_link( $cat->term_id ) ?>" class="btn-small" style="background: <?php echo $cat->description; ?>">
				<?php echo $cat->name; ?>
				</a>
			<?php	
				}
			?>

			
            <!-- <a href="" class="btn-small btn-small__red">Adrenalín</a>
            <a href="" class="btn-small btn-small__blue">Trekking </a>
            <a href="" class="btn-small btn-small__green">Rekax</a>
            <a href="" class="btn-small btn-small__green2">Pamiatky</a>
            <a href="" class="btn-small btn-small__violet2">Kultúra</a>
            <a href="" class="btn-small btn-small__gray">Cupcake</a> -->
          </div>
        </div>
      </section>
       
      <section class="advise">
        <div class="container">
          <div class="row">

          <?php 
            $args = array( 
            );
            $my_posts = get_posts( $args );
            
            if( ! empty( $my_posts ) ){
              $output = '<ul>';
              foreach ( $my_posts as $p ){
                $output .= '<li><a href="' . get_permalink( $p->ID ) . '">' 
                . $p->post_title . '</a></li>';
              }
              $output .= '</ul>';
            }
          ?>

          <?php if( ! empty( $my_posts ) ): ?>
            <?php foreach ( $my_posts as $p ): ?> 
              <?php  
                  // var_dump($p);
                ?>
              <div class="col-md-6 col-lg-4 col-12">
                <a href="<?php echo get_permalink( $p->ID ) ?>" class="item-inspiration">
                <?php echo get_the_post_thumbnail( $p->ID)  ?>
                  <!-- <img src="/assets/images/ref_01.png" alt=""> -->
                  <div class="item-inspiration__content">
                    <h3 class="h4">
                      <?php echo $p->post_title ?>
                    </h3>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>
                        <?php 
                          $mydate = new DateTime($p->post_date)  ; 
                          $mydate = date_format($mydate, 'd. m. Y');

                          echo $mydate;
                        ?>

                      </span>
                      <?php $mycat =get_the_category($p->ID); ?>
                      <?php foreach($mycat as $postCat): ?>
                        <span class="badge" style="background: <?php echo $postCat->description; ?>">
                          <?php echo $postCat->name; ?>
                        </span>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </a>
              </div> 
            <?php endforeach; ?>
          <?php endif; ?>

             
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
