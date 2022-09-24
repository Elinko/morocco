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
              <h2>Soufflé sweet roll croissant</h2>
              <p>Soufflé sweet roll croissant oat cake tart pie. Carrot cake sugar plum cotton candy jelly beans icing apple pie chupa chups. 
              </p>
              
              <p>
                    Shortbread oat cake bear claw pie caramels. Halvah chocolate icing wafer dragée apple pie sweet marzipan. Dessert gingerbread chocolate bar lemon drops sweet jelly beans. Candy lollipop brownie donut pastry. Muffin liquorice cookie tart soufflé jelly-o carrot cake jelly. Muffin topping chocolate cake dessert jelly-o cookie croissant donut. Bear claw jelly tootsie roll jelly candy canes ice cream caramels muffin candy. Sesame snaps lemon drops dessert chocolate muffin jelly-o chocolate bar cookie. Cookie jelly-o chupa chups toffee caramels. Caramels jelly beans brownie gummies cake sweet danish candy canes. Bear claw biscuit marshmallow marshmallow cake croissant jelly. Cookie sweet roll biscuit bonbon cotton candy macaroon ice cream. Jelly-o sweet roll powder ice cream oat cake chocolate cake tart jelly beans macaroon. Icing dessert candy canes biscuit gingerbread lemon drops. Jelly-o caramels gummi bears ice cream soufflé brownie pudding. Danish powder toffee tootsie roll jelly beans cake tiramisu. Sweet tiramisu oat cake icing macaroon pastry muffin wafer. Wafer chocolate fruitcake jelly beans icing jelly. Cheesecake candy chocolate bar jelly beans dragée halvah biscuit pie. Marzipan donut powder pudding gummies candy. Donut bonbon bonbon lemon drops apple pie sugar plum danish powder pastry. Bonbon icing caramels jelly beans biscuit macaroon cheesecake fruitcake muffin. Jelly beans cheesecake sweet roll pastry gingerbread macaroon cotton candy soufflé sweet roll. Caramels marzipan sweet roll caramels pudding. Halvah biscuit pie cake ice cream sweet roll.</p>
              


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
            <a href="<?php echo $previous->guid; ?>">Predošlí článok</a>  
            <a href="<?php echo $next->guid; ?>    " class="d-flex align-items-center"><strong>Nasledujúci článok</strong> <span class="slick-arroww slick-next"></span></a> 
          </div>
        </div>
      </section>
      <section class="advise">
        <div class="container">
          <div class="heading ">
            <div>
              <span class="h3 yellow">Vreľo</span>
              <h2>Odporúčame</h2>
            </div>
            <a href="" class="btn btn__transparent btn__transparent--black">
              ZOBRAZIŤ VŠETKY PONUKY
            </a>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4 col-12">
              <div class="item-trip">
                <div class="item-trip__head d-flex justify-content-between align-items-center">
                  <h3 class="h4">
                    CHEGAGA DUNES
                  </h3>
                  <span class="badge badge__green">
                    Relax
                  </span>
                </div>
                <p>M'Hamid El Ghizlane</p>
                <div class="d-flex justify-content-between price">
                  <h3>od 1.200 €</h3>
                  <a href="" class="link-arrow">Zobraziť viac&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <img src="/assets/images/ref_01.png" alt="">
  
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12">
              <div class="item-trip">
                <div class="item-trip__head d-flex justify-content-between align-items-center">
                  <h3 class="h4">
                    CHEGAGA DUNES
                  </h3>
                  <span class="badge badge__blue">
                    Relax
                  </span>
                </div>
                <p>M'Hamid El Ghizlane</p>
                <div class="d-flex justify-content-between price">
                  <h3>od 1.200 €</h3>
                  <a href="" class="link-arrow">Zobraziť viac&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <img src="/assets/images/ref_01.png" alt="">
  
              </div>
            </div>
            <div class="col-md-6 col-lg-4 col-12">
              <div class="item-trip">
                <div class="item-trip__head d-flex justify-content-between align-items-center">
                  <h3 class="h4">
                    CHEGAGA DUNES
                  </h3>
                  <span class="badge badge__red">
                    Relax
                  </span>
                </div>
                <p>M'Hamid El Ghizlane</p>
                <div class="d-flex justify-content-between price">
                  <h3>od 1.200 €</h3>
                  <a href="" class="link-arrow">Zobraziť viac&nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <img src="/assets/images/ref_01.png" alt="">
  
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
