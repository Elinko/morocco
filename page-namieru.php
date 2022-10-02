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
	 Template Name: Zájazd na mieru
 */
get_header();
?>

<main class="page">
  <div class="container">
    <div class="item-heading"> 
      <div class="row">
        <div class="col-md-6 item-heading__wrap">
          <div class="item-heading__content yellow">
            <h1>Zájazd na mieru</h1>
            <?php echo the_content(); ?> 
          </div>
        </div>
        <div class="col-md-6 item-heading__img">
          <?php echo get_the_post_thumbnail() ?>
        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row">
        <?php $advantages = get_field('advantages') ?>
        
        <?php foreach ($advantages as $key => $value): ?>
          <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>

          <p><strong><?php echo $value['vyhoda_nadpis'] ?></strong></p>
          <p><?php echo $value['vyhoda'] ?></p>
        </div>
        <?php endforeach; ?>
          
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <h2>Kontaktujte nás</h2>
      <div class="row">
        <div class="col-md-8">
          <?php 
            echo do_shortcode('[contact-form-7 id="206" title="Zajazd na mieru"]') 
          ?>

        </div>
      </div>
    </div>
  </section>
    
  
   
  <br>
  <br>


</main>
<?php

get_footer();
