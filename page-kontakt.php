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
                <h1>Kontakt</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.</p>
              </div>
            </div>
            <div class="col-md-6 item-heading__img">
              <img src="<?php bloginfo('template_url');  ?>/assets/images/ref_04.png" alt="">
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
              <h4>Kontakt</h4>
              <p><a href="tel:0907 654 321" class="link">0907 654 321</a></p>
              <p><a href="tel:0907 654 321" class="link">0907 654 321</a></p>
            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-clock"></i>
              </div>
              <h4>Otváracie hodiny</h4> 
              <p>Pon – Štv: <strong>08:00 – 15:00</strong></p> 
              <p>Pon – Štv: <strong>08:00 – 15:00</strong></p> 
            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-location-arrow"></i>
              </div>
              <h4>
                <strong>Adresa</strong>
              </h4>
              <p>Morocco Dream Tour s.r.o</p> 
              <p>Morocco Dream Tour s.r.o</p> 
              <p>Morocco Dream Tour s.r.o</p> 
            </div>
            <div class="col-md-6 col-lg-3 contact__info">
              <div class="icon">
                <i class="fa-solid fa-list"></i>
              </div>
              <h4>
                <strong>Fakturačné údaje</strong>
              </h4>
              <p>IČO: <strong>45654321</strong></p> 
              <p>IČO: <strong>45654321</strong></p> 
              <p>IČO: <strong>45654321</strong></p> 
              <p>IČO: <strong>45654321</strong></p> 
            </div>
          </div>
        </div>
      </section>
      
      <section class="write-us">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2>Napíšte nám</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo.</p>
            </div>
            <div class="col-md-6 write-us__map">
              <img src="/assets/images/mapa.png" alt="">
            </div>
          </div>
        </div>
      </section>
       
       

    </main>
<?php

get_footer();