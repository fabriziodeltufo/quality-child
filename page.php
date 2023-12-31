<?php
/**
* The main template file
*/
get_header();
?>


<?php if ( is_front_page() ) { ?>

<!-- CUSTOM CODE  -->

<section class="section">
    <?php

$args = array(
    'posts_per_page' => '3',
    'order' => 'DESC'
);

$recent_post = new WP_query( $args );

if ( $recent_post->have_posts() ) {
    while( $recent_post->have_posts() ) {
        $recent_post->the_post();

        // var_dump($post);
        ?>

    <article class="article">

        <a href="<?php the_permalink($post->ID) ?>">
            <h1><?php the_title(); ?></h1>
        </a>

        <p><?php the_excerpt();?></p>

    </article>

    <?php

    }

}

?>
</section>

<!-- CUSTOM CODE  -->

<?php } ?>


<!-- Blog & Sidebar Section -->
<section id='section-block' class='site-content'>
    <div class='container'>
        <div class='row'>
            <!--Blog Section-->
            <?php
if ( class_exists( 'WooCommerce' ) ) {

    if ( is_account_page() || is_cart() || is_checkout() ) {
        echo '<div class="col-md-' . ( !is_active_sidebar( 'woocommerce' ) ? '12' : '8' ) . ' col-xs-12">';
    } else {

        echo '<div class="col-md-' . ( !is_active_sidebar( 'sidebar-primary' ) ? '12' : '8' ) . ' col-xs-12">';
    }
} else {

    echo '<div class="col-md-' . ( !is_active_sidebar( 'sidebar-primary' ) ? '12' : '8' ) . ' col-xs-12">';
}
?>

            <?php
if ( class_exists( 'WooCommerce' ) ) {

    if ( is_account_page() || is_cart() || is_checkout() ) {

        // Include the page
        ?>
            <div class='news'>
                <article class='post'>
                    <div class='post-content'>
                        <?php
        the_post();
        the_content();
        ?>
                    </div>
                </article>
            </div>

            <?php
    } else {

        // Include the page
        ?>
            <div class='news'>
                <article class='post'>
                    <div class='post-content'>
                        <?php
        the_post();
        the_content();
        ?>
                    </div>
                </article>
            </div>

            <?php
    }
} else {
    // Include the page
    ?>
            <div class='news'>
                <article class='post'>
                    <div class='post-content'>
                        <?php
    the_post();
    the_content();
    ?>
                    </div>
                </article>
            </div>

            <?php
    comments_template( '', true );
    // show comments
}

// Start the Loop.
?>
        </div>
        <!--/Blog Section-->
        <?php
if ( class_exists( 'WooCommerce' ) ) {

    if ( is_account_page() || is_cart() || is_checkout() ) {
        get_sidebar( 'woocommerce' );
    } else {

        get_sidebar();
    }
} else {

    get_sidebar();
}
?>
    </div>
    <!--</div>-->
</section>
<!-- /Blog & Sidebar Section -->

<?php
get_footer();