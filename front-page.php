<?php


get_header();
?>

<main class="page">
      <div class="container">
        <?php 
          $slider = get_field('slider');
          // var_dump($slider);
        ?>
 
        <div class="home-slider">
          <?php foreach($slider as $slide): ?>
            <div class="home-slider__content">
              <img src="<?php echo $slide['obrazok']  ?>" alt="">
              <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                  <h3><?php echo $slide['zlty_nadpis']  ;?></h3>
                  <h2><?php echo $slide['biely_nadpis'];  ?></h2>
                  <p>
                    <?php echo $slide['text']  ?>
                  </p>
                  <div class="d-flex home-slider__buttons" >
                    <?php if($slide['1button_link']): ?>
                        <a href="<?php echo $slide['1button_link']  ?>" class="btn btn__yellow"><?php echo $slide['1button_text']  ?></a>
                      <?php endif; ?>
                      <?php if($slide['2button_link']): ?>
                        <a href="<?php echo $slide['2button_link']  ?>" class="btn btn__transparent"><?php echo $slide['2button_text']  ?></a>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

      </div>
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
      <section class="why-us">
        <?php 
          $whyus = get_field('preco_prave_my'); 
        ?>
        <div class="container">
          <div class="row">
            <div class=" col-lg-4 col-12">
              <h3 class="yellow"><?= $whyus['zlty_nadpis']  ?></h3>
              <h2><?= $whyus['nadpis']  ?></h2>
              <p>
              <?= $whyus['text']  ?>  
              </p>
              <br>
            </div>
            <div class=" col-lg-8">
              <div class="row">
                <?php foreach ($whyus['polozky'] as $key => $value): ?>
                  <div class="col-md-6 col-xl-4 why-us__item">
                    <div class="image"> 
                      <img src="<?= $value['ikona'] ?> " alt="">
                    </div>
                    <strong><?= $value['nazov'] ?></strong>
                    <p><?= $value['text'] ?></p>
                  </div>
                <?php endforeach; ?>
               

              </div>
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
      <section class="tolding-about">
        <div class="container">
          <div class="text-center">
            <h2>Povedali o nás</h2>
          </div>
          <div class="tolding-about__wrapper">
            <?php 
              $tolding = get_field('povedali_o_nas'); 
            ?>
            <?php foreach ($tolding as $key => $value): ?>
              <div>
              <div class="tolding-about__content">
                <img src="/assets/images/ico_quote1.svg" alt="">
                <p><?= $value['text']  ?></p>
                <div class="text-right">
                  <img src="/assets/images/ico_quote2.svg" alt="">
                </div> 
              </div>
              <div class="text-center tolding-about__name">

                <strong><?= $value['name']  ?></strong>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
      <section class="last-blog">
        <div class="container">
          <div class="heading  ">
            <?php $blogNews = get_field('najnovsie_z_blogu'); ?>
            <div>
              <span class="h3 yellow"><?php echo $blogNews['zlty_nadpis']; ?> </span>
              <h2><?php echo $blogNews['biely_nadpis']; ?>  </h2>
            </div>
            <a href="<?php bloginfo('template_url');  ?>/blog" class="btn btn__transparent btn__transparent--black">
              ZOBRAZIŤ BLOG
            </a>
          </div>

          <?php 

            $args = array( 
			      	'post_type'   => 'post',
              'posts_per_page' => '2',
              'orderby'=> 'post_date', 
            ); 

             query_posts( $args );;


            // var_dump(get_posts());
          ?>


          <div class="row">
            <?php while (  have_posts() ) :  the_post(); ?>
               

              <a href="<?php echo the_permalink() ;?>"  class="col-md-6 item-blog"> 
              <div class="row">
                <div class="col-md-4">
                  <?php echo get_the_post_thumbnail(); ?> 
                </div>
                <div class="col-md-8">
                  <h4><?php the_title(); ?></h4>
                  <p>
                    Jedna z týchto úžasných vecí, ktoré sú v tejto prírode stále živé a stále si nachádzajú spôsob, ako sa časom aktualizovať a vyvíjať, Nomádi ju poznajú ako Shershmala, zatiaľ čo iní ľudia ju nazývajú Piesočná ryba.
                  </p>
                  <span><?php echo get_the_date('d. m. Y') ?></span>
                </div>
              </div>
            </a>     

            <?php endwhile; ?>
                                                                
             
            
             
          </div> 
        </div> 
      </section>
      <section class=" ">
        <div class="container">
          <div class="health">
          <?php 
              $health = get_field('zdravotne_informacie'); 
            ?>
            <h2>Zdravotné informácie</h2>
            <?= $value['text']  ?> 
      
              <br>
              <br>
            <div class="text-right">
              <a href="<?= $value['link']  ?>" class="link-arrow">Zobraziť viac <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </section>

      <section class="write-us">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="<?php bloginfo('template_url');  ?>/assets/images/contact.png" alt="">
            </div>
            <div class="col-md-6">
              <h3 class="yellow">
                Máte otázky?
              </h3>
              <h2>
                Napíšte nám
              </h2>
              <p>
                <?php echo get_field('napiste_nam_text'); ?>
              </p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">With textarea</span>
                </div>
                <textarea class="form-control" aria-label="With textarea"></textarea>
              </div>
              

              <div class="input-group">
                <button type="submit" class="btn btn__violet"> 
                  ODOSLAŤ SPRÁVU
                </button>
              </div>
              
            </div>
          </div>
        </div>

      </section>


    </main>

<?php 
get_footer();
