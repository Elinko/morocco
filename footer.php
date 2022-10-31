<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package morocco
 */

?>

<footer >
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-xl-3 ">
              <strong><?php pll_e('KONTAKT'); ?> </strong>
              <p><?php pll_e('Na ulici 16, Bratislava, Slovakia'); ?> </p>
              <p>
                <a href="tel: +421 907 654 321">+421 907 654 321</a>
              </p>  
              <a href="mailto: info@moroccodreamtour.com">info@moroccodreamtour.com</a>
            </div>
            <div class="col-md-4 col-xl-3 ">
              <strong><?php pll_e('INFORMÁCIE'); ?> </strong>
              <p>IČO: 53655869</p>
              <p>DIČ: SK2121481879</p>
              <p>Č.Ú.: SK40 8360 5207 0042 0001 2345</p>
            </div>
            <div class="col-md-4 col-xl-3 social">
              <strong><?php pll_e('SOCIÁLNE SIETE'); ?> </strong>
              <div class="d-flex">
                <a href="https://www.facebook.com/Morocco-dream-tour-112309864910282" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                <a href="https://www.instagram.com/morocco_dream_tour/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="after-footer">
        <div  class="container">
          <div class="row">
            <div class="col-lg-6">
              <a href="<?php echo get_home_url() ?>">
                <img src="<?php bloginfo('template_url');  ?>/assets/images/logo-morocco.png" width="100px" alt="">
              </a>
            </div>
            <div class="col-lg-6">
               
            </div>
          </div>
        </div>
      </div> 
    </footer>

    <?php wp_footer(); ?>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="<?php bloginfo('template_url');  ?>/assets/dist/js/all.js?_v=6ju0w" async></script>
    <?php 
      $lang = get_locale();
      if($lang == 'sk_SK') { 
        echo'<script src="'. get_bloginfo('template_url').'/assets/src/js/includes/cookiebar-sk.js" async></script>';
      } else { 
        echo'<script src="'. get_bloginfo('template_url').'/assets/src/js/includes/cookiebar-en.js" async></script>';
        
      }
    ?> 

</body>
</html>
