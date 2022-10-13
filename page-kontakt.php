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
	 Template Name: Kontakt
 */
get_header();
?>

<main class="page contact">
      <div class="container">
        <div class="item-heading"> 
          <div class="row">
            <div class="col-md-6 item-heading__wrap">
              <div class="item-heading__content">
                <h1><?php echo the_title() ?></h1>
                <?php echo the_content() ?>     
              </div>
            </div>
            <div class="col-md-6 item-heading__img">
               <?php echo get_the_post_thumbnail() ?>
            </div>
          </div>
        </div>
      </div>

      <section class=" ">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-address-card"></i> 
              </div>
              <h4><?php pll_e('Kontakt'); ?> </h4>
              <?php echo get_field('kontakt') ?> 
            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-clock"></i>
              </div>
              <h4><?php pll_e('Otváracie hodiny'); ?> </h4> 
              <?php echo get_field('otvaracie_hodiny') ?> 

            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-location-arrow"></i>
              </div>
              <h4>
                <strong><?php pll_e('Adresa'); ?> </strong>
              </h4>
              <?php echo get_field('adresa') ?> 
              
            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-list"></i>
              </div>
              <h4>
                <strong><?php pll_e('Fakturačné údaje'); ?> </strong>
              </h4>
              <?php echo get_field('fakturacne_udaje') ?> 
              
            </div>
          </div>
        </div>
      </section>
      
      <section class="write-us">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2><?php pll_e('Napíšte nám'); ?></h2>

               <?php 
                $writUs = get_field('napiste_nam_text', pll__('16'))
               ?>
                <p>
                  <?php echo $writUs; ?>
                </p>
              <?php 
                echo do_shortcode(pll__('[contact-form-7 id="191" title="Kontakt"]')) 
              ?> 

               

            </div>
            <div class="col-md-6 write-us__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1549.5315617441188!2d17.12336982426233!3d48.128466760040915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c891020f49143%3A0x21b64d20be176a8!2s%C5%A0ustekova%202689%2F5%2C%20851%2004%20Petr%C5%BEalka!5e0!3m2!1ssk!2ssk!4v1664545398047!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <!-- <iframe
              width="600"
              height="450"
              style="border:0"
              loading="lazy"
              allowfullscreen
              referrerpolicy="no-referrer-when-downgrade"
              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBq-L9Jwr8cRCUA8AO3nvoLwlIci2zwSqk
                &q=Space+Needle,Seattle+WA">
            </iframe> -->
            </div>
          </div>
        </div>
      </section>
       
       

    </main>
<?php

 

get_footer();
