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

<main class="page trip">
      <section >
        <div class="container">
          <h1>
            <?php echo the_title(); ?>
          </h1> 
          <div class="row">
            <div class="col-md-5">
              <div class="trip__badges">
                <?php $badges = get_field('nalepky'); ?> 
                <?php 
                  foreach($badges as $badge) {
                    if($badge == 'Letecky') {
                      echo '<span class="badge badge__gray">
                        <img src="'; bloginfo('template_url') ;
                        echo '/assets/images/ico_lietadlo.svg" alt="">
                        Letecky
                      </span> '; 
                    } elseif ($badge == '7-14 dní'  || $badge == '7 dní' || $badge == '10 dní'  || $badge == '14 dní' ) {
                      echo '<span class="badge badge__gray">
                        <img src="'; bloginfo('template_url') ;
                      echo '/assets/images/ico_kalendar.svg" alt="">
                        '. $badge .'
                      </span> '; 
                    }elseif($badge == 'Autobusom' || $badge == 'Autom') {
                      echo '<span class="badge badge__gray">
                      <i class="fa-solid fa-car"></i>&nbsp;
                      '. $badge .'
                      </span> '; 
                    } else {
                      echo '<span class="badge badge__gray">
                      <i class="fa-solid fa-circle-info"></i>&nbsp;
                      '. $badge .'
                      </span> '; 
                      
                    } 
                  }
                ?>
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
              <?php echo get_field('kratky_popis'); ?> 

            </div>
            <div class="col-md-7">
              <?php $gallery = get_field('galeria') ?>
              <div class="trip__slider">
                <?php foreach( $gallery  as $img): ?>
                  <img src="<?php echo $img; ?>" alt="">
                <?php endforeach; ?> 
              </div>
            </div>
          </div>
        </div>
      </section>
      <section >
        <div class="container">
          <h2>Informácie</h2>
          <div class="row">
            <div class="col-md-6 ">
              <?php $info = get_field('informacie') ?>
              <div class="trip__info trip__info--green">
                <h3 class="">V cene <i class="fa-solid fa-check"></i></h3>
                <ul> 

                  <?php foreach( $info['v_cene'] as $item): ?>
                    <li>- <?php echo $item['polozka'] ?></li>
                  <?php endforeach; ?> 
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="trip__info trip__info--red">
                <h3 class="">V cene nie je zahrnuté <i class="fa-solid fa-xmark"></i></h3>
                <ul>
                  <?php foreach( $info['nie_je_v_cene'] as $item): ?>
                      <li>- <?php echo $item['polozka'] ?></li>
                    <?php endforeach; ?>    
                </ul>
              </div>
            </div>
          </div> 
          <div class=" trip__desc">
          <?php echo the_content(); ?>
             
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <h2>Termíny</h2>
          <div class="schhedule">
            <?php $schedule = get_field('terminy'); ?>
            <?php foreach($schedule as $termin): ?>
              <div class="schhedule__item">
                <div class="schhedule__item--col">
                  <strong><?php echo $termin['datum']['od']; ?> - <?php echo $termin['datum']['do']; ?> </strong>
                </div>
                <div class="schhedule__item--col">
                  <strong><?php echo $termin['pocet_noci'] ;?></strong>
                </div>
                <div class="schhedule__item--col room">
                  <strong><?php echo $termin['izba']; ?></strong>
                </div>

                <div class="schhedule__item--col price">
                  <h3><?php echo $termin['cena']; ?>&nbsp;€</h3>
                </div>
                <div class="schhedule__item--col totrip">
                  <a href="" class="link-arrow">Mám záujem <i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
       
       
      <?php include('inc/trip-for-you.php') ?>
      
      <br>
      <br>
      <br>


    </main>

<?php 
get_footer();
