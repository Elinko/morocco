<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package morocco
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
                  <?php echo get_the_title(13); ?>
                </h1>
                <?php 
                the_archive_title( '<h3 class="page-title">', '</h3>' );
                ?>    
                <?php echo  apply_filters('the_content', get_post_field('post_content', 13)); ?>
              </div>
            </div>
            <div class="col-md-6 item-heading__img">
              <img src="<?= get_field('obrazok', 13); ?>	" alt="">
            </div>
          </div>
        </div>
      </div>

      <section class="categories">
        <div class="container">
          <div class="categories__wrap">
            <?php 

              $args = array(
                'taxonomy' => 'Inspiration_category',
                'orderby' => 'name',
                'order'   => 'ASC'
              );

              $cats = get_categories($args);

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
 
          ?>
 
            <?php while ( have_posts() ): ?>
				<?php the_post(); ?> 
              <?php  
                  // var_dump($p);
                ?>
              <div class="col-md-6 col-lg-4 col-12">
                <a href="<?php echo get_permalink( get_the_ID() ) ?>" class="item-inspiration">
                <?php echo get_the_post_thumbnail( get_the_ID())  ?>
                  <!-- <img src="/assets/images/ref_01.png" alt=""> -->
                  <div class="item-inspiration__content">
                    <h3 class="h4">
                      <?php echo the_title() ?>
                    </h3>
                    <div class="d-flex justify-content-between align-items-center">
                      <span>
                        <?php 
                           
                          echo get_the_date('d. m. Y');
                        ?>

                      </span>
                      <?php $mycat =get_the_category(get_the_ID()); ?>
                      <?php foreach($mycat as $postCat): ?>
                        <span class="badge" style="background: <?php echo $postCat->description; ?>">
                          <?php echo $postCat->name; ?>
                        </span>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </a>
              </div> 
            <?php endwhile; ?> 

             
          </div>
          <div class="text-center more-trip">
            <a href="" class="btn btn__blue">ZOBRAZIŤ ĎALŠIE</a>
          </div>
        </div>
	</section>

  <?php include('inc/trip-for-you.php') ?>
	 
      <br>
      <br>


    </main>

<?php
get_footer();
