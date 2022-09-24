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
	 Template Name: Inspiration
 */
get_header();
?>

<main class="page blog">
      <div class="container">
        <div class="item-heading"> 
          <div class="row">
            <div class="col-md-6 item-heading__wrap">
              <div class="item-heading__content">
                <h1>Inšpirácie</h1>
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
					'taxonomy' => 'dining-category',
					'orderby' => 'name',
					'order'   => 'ASC'
				);

				$cats = get_categories($args);

				foreach($cats as $cat) {
			?>
				<a href="<?php echo get_category_link( $cat->term_id ) ?>">
				<?php echo $cat->name; ?>
				</a>
			<?php	
				}
			?>

			
            <a href="" class="btn-small btn-small__red">Adrenalín</a>
            <a href="" class="btn-small btn-small__blue">Trekking </a>
            <a href="" class="btn-small btn-small__green">Rekax</a>
            <a href="" class="btn-small btn-small__green2">Pamiatky</a>
            <a href="" class="btn-small btn-small__violet2">Kultúra</a>
            <a href="" class="btn-small btn-small__gray">Cupcake</a>
          </div>
        </div>
      </section>
       
      <section class="advise">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-4 col-12">
              <a href="" class="item-inspiration">
                <img src="/assets/images/ref_01.png" alt="">
                <div class="item-inspiration__content">
                  <h3 class="h4">
                    CHEGAGA DUNES
                  </h3>
                  <div class="d-flex justify-content-between align-items-center">
                    <span>10. 8. 2022</span>
                    <span class="badge badge__green">
                      Relax
                    </span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-6 col-lg-4 col-12">
              <a href="" class="item-inspiration">
                <img src="/assets/images/ref_01.png" alt="">
                <div class="item-inspiration__content">
                  <h3 class="h4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </h3>
                  <div class="d-flex justify-content-between align-items-center">
                    <span>10. 8. 2022</span>
                    <span class="badge badge__green">
                      Relax
                    </span>
                  </div>
                </div>
              </a>
            </div>
              
             
          </div>
          <div class="text-center more-trip">
            <a href="" class="btn btn__blue">ZOBRAZIŤ ĎALŠIE</a>
          </div>
        </div>
      </section>
      <section class="for-you">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="/assets/images/ref_04.png" alt="">
            </div>
            <div class="col-md-6 d-flex align-items-center">
              <div class="for-you__content">
                <h3 class="yellow">Vytvorené pre vás</h3>
                <h2>Chcete dovolenku na mieru?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
                <a href="" class="btn btn__blue">MÁM ZÁUJEM</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br>
      <br>


    </main>

<?php

get_footer();
