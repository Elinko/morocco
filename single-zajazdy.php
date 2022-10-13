<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package morocco
 */

get_header();

$thumbnail = get_the_post_thumbnail();
$title =  get_the_title();
$desc = get_field('kratky_popis');
?>
                 

<main class="page trip">
      <section >
        <div class="container">
          <h1> 
            <?php echo $title  ?>
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
              <?php echo $desc; ?> 

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
          <h2><?php pll_e('Informácie'); ?> </h2>
          <div class="row">
            <div class="col-md-6 ">
              <?php if($info['v_cene']): ?>
                <?php $info = get_field('informacie') ?>
                <div class="trip__info trip__info--green">
                  <h3 class=""><?php pll_e('V cene'); ?> <i class="fa-solid fa-check"></i></h3>
                  <ul> 

                    <?php foreach( $info['v_cene'] as $item): ?>
                      <li>- <?php echo $item['polozka'] ?></li>
                    <?php endforeach; ?> 
                  </ul>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if($info['nie_je_v_cene']): ?>
                <div class="trip__info trip__info--red">
                  <h3 class=""><?php pll_e('V cene nie je zahrnuté '); ?> <i class="fa-solid fa-xmark"></i></h3>
                  <ul>
                    <?php foreach( $info['nie_je_v_cene'] as $item): ?>
                        <li>- <?php echo $item['polozka'] ?></li>
                      <?php endforeach; ?>    
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          </div> 
          <div class=" trip__desc">
          <?php echo the_content(); ?>
             
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <!-- Button trigger modal -->
 
          <h2><?php pll_e('Termíny'); ?></h2>
          <div class="schhedule">
            <?php $schedule = get_field('terminy'); ?>
            <?php foreach($schedule as $key => $termin): ?>
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
                  <a href="" class="link-arrow" data-toggle="modal" data-target="#modal<?php echo $key ?>"  data-termin="<?php echo $termin['datum']['od']; ?> - <?php echo $termin['datum']['do']; ?>" data-title="<?php echo $title; ?>" data-url="<?php echo get_the_permalink(); ?>">Mám záujem <i class="fa-solid fa-arrow-right"></i></a> 

                  <!-- Modal -->
                  <div class="modal fade" id="modal<?php echo $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header"> 
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i class="fa-solid fa-xmark"></i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h2><?php pll_e('Záujem o zájazd'); ?></h2>
                          <div class="modal__head">
                            <?php echo $thumbnail; ?>
                            <div>
                              <h3 class="h4 yellow">
                              <?php echo $termin['datum']['od']; ?> - <?php echo $termin['datum']['do']; ?>
                              </h3> 
                              <h3 class="h4">
                                <?php echo $title; ?>
                              </h3>
                            </div>

                          </div>
                          <p><?php echo $desc; ?></p>
                          <br>
                          <?php 
                            echo do_shortcode(pll__('[contact-form-7 id="195" title="Zájazd"]')) 
                          ?> 
                          
                        </div>
                         
                      </div>
                    </div>
                  </div>
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
