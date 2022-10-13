<section class="advise">
    <div class="container">
        <div class="heading ">
        <?php 
        $args = array( 
            'post_type'   => 'zajazdy',
            'posts_per_page' => '3',
            'orderby'=> 'post_date', 
        ); 

        query_posts( $args );;


        // var_dump(get_posts());
        ?> 

        <div>
            <span class="h3 yellow"><?php pll_e('Vreľo'); ?> </span>
            <h2><?php pll_e('Odporúčame'); ?> </h2>
        </div>
        <a href="<?php bloginfo('template_url');  ?><?php pll_e('/zajazdy'); ?>" class="btn btn__transparent btn__transparent--black">
        <?php pll_e('ZOBRAZIŤ VŠETKY PONUKY'); ?> 
        </a>
        </div>
        <div class="row">

        <?php while(  have_posts() ) :   ?>
        <?php the_post(); ?>
        <div class="col-md-6 col-lg-4 col-12">
            <a class="item-trip" href="<?php echo get_the_permalink() ?>">
            <div class="item-trip__head d-flex justify-content-between align-items-center">
                <h3 class="h4">
                <?php the_title() ?>
                </h3>
                <?php $mycat = get_the_terms(get_the_ID(), 'zajazdy_category') ?>
                <?php foreach($mycat as $postCat): ?>
                <span class="badge" style="background: <?php echo $postCat->description; ?>">
                    <?php echo $postCat->name; ?>
                </span>
                <?php endforeach; ?>
            </div>
            <?php if($location = get_field('oblast')): ?>
            <p><?php echo $location ; ?></p>
            <?php endif; ?>
            <?php $price = get_field('terminy'); 
                // var_dump($price[0]);
            ?>
            <div class="d-flex justify-content-between price">
                <?php if($price): ?>
                    <h3><?php pll_e('od'); ?> &nbsp;<?php echo $price[0]['cena'] ;?>&nbsp;€</h3>
                <?php endif; ?>
                <span class="link-arrow"><?php pll_e('Zobraziť viac'); ?> &nbsp;<i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <?php echo get_the_post_thumbnail(); ?>

            </a>
        </div>
        <?php endwhile; ?>

        </div>
    </div>
</section>