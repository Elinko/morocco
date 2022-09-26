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
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor.
            </p>
          </div>
        </div>
        <div class="col-md-6 item-heading__img">
          <img src="/assets/images/ref_04.png" alt="">
        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>
          <p><strong>Lorem ipsum dolor sit amet</strong></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>
          <p><strong>Lorem ipsum dolor sit amet</strong></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>
          <p><strong>Lorem ipsum dolor sit amet</strong></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>
          <p><strong>Lorem ipsum dolor sit amet</strong></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-6 col-lg-25 include">
          <span class="include__check"><i class="fa-solid fa-check"></i></span>
          <p><strong>Lorem ipsum dolor sit amet</strong></p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
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
