<?php  
    $post = get_field('reklama', 11);
 
?>

<section class="for-you">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $post['obrazok'] ?>" alt="">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div class="for-you__content">
            <h3 class="yellow"><?php echo $post['zlty_nadpis'] ?></h3> 
            <h2><?php echo $post['nadpis'] ?></h2>
            <?php echo $post['kratky_popis'] ?>
            <a href="<?php echo get_permalink('11') ?>" class="btn btn__blue"><?php pll_e( 'Mám záujem' ); ?></a>
            </div>
        </div>
        </div>
    </div>
</section>