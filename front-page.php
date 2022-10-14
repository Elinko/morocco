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
      
      <?php include('inc/advise.php') ?>

      <section class="why-us">
        <?php 
          $whyus = get_field('preco_prave_my'); 
          // var_dump($whyus);
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
      <?php include('inc/trip-for-you.php') ?>

      <section class="tolding-about">
        <div class="container">
          <div class="text-center">
            <h2><?php pll_e('Povedali o nás'); ?> </h2>
          </div>
          <div class="tolding-about__wrapper">
            <?php 
              $tolding = get_field('povedali_o_nas', pll__('16')); 
              ?>
              <?php 
            // var_dump($tolding);
              
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
            <?php $blogNews = get_field('najnovsie_z_blogu', pll__('16')); ?>
            <div>
              <span class="h3 yellow"><?php echo $blogNews['zlty_nadpis']; ?> </span>
              <h2><?php echo $blogNews['biely_nadpis']; ?>  </h2>
            </div>
            <a href="<?php pll_e('/blog') ?>" class="btn btn__transparent btn__transparent--black">
            <?php pll_e('ZOBRAZIŤ BLOG'); ?> 
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
                    <?php echo get_the_excerpt(); ?>  
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
              $health = get_field('zdravotne_informacie', pll__('16')); 
            ?>
            <h2><?php pll_e('Zdravotné informácie'); ?> </h2>
            <?= $health['text']  ?> 
      
              <br> 
            <div class="text-right">
              <a href="<?= $health['link']  ?>" class="link-arrow"><?php pll_e('Zobraziť viac'); ?>  <i class="fa-sharp fa-solid fa-arrow-right"></i></a>
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
              <?php pll_e('Máte otázky?'); ?> 
              </h3>
              <h2>
              <?php pll_e('Napíšte nám'); ?> 
              </h2>
              <p>
                <?php echo get_field('napiste_nam_text', pll__('16')); ?>
              </p>
               
              

              <?php 
                echo do_shortcode(pll__('[contact-form-7 id="191" title="Kontakt"]')) 
              ?> 
              
            </div>
          </div>
        </div>

      </section>


    </main>

<?php 
get_footer();
