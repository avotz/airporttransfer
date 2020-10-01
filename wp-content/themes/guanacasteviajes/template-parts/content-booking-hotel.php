<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package airporttransfer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="product-header">
        <div class="main-hotel-photo">
            <figure class="main-hotel-photo-figure">
                <?php if (has_post_thumbnail()) :

                    $id = get_post_thumbnail_id($post->ID);
                    $thumb_url = wp_get_attachment_image_src($id, 'large', true);
                ?>



                <?php endif; ?>

                <div class="woocommerce-product-gallery__wrapper tour-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">

                </div>
            </figure>

        </div>

        <div id="slider-gallery" class="slider-gallery owl-carousel">
            <?php $photos = rwmb_meta('rw_gallery_thumb', 'type=image&size=tour-slider-gallery');
            if ($photos) {

                foreach ($photos as $photo) {

            ?>
                    <div class="woocommerce-product-gallery__image">
                        <a href="<?php echo $photo['url'] ?>"> <img src="<?php echo $photo['url'] ?>" alt="Title"></a>
                    </div>



            <?php }
            }
            ?>

        </div>
        <div class="product-title-container">
            <?php the_title('<h1 class="product_title entry-title">', '</h1>'); ?>
        </div>


    </div>
    <div class="container mx-auto">
        <div class="entry-content hotel-content">
            <div class="hotel-content-main">
                <h2 class="entry-title hasBorder inline-block">Information</h2>
                <?php
                the_content();


                ?>
            </div>
            <div class="hotel-content-sidebar">
                
            </div><!-- .entry-content -->
        </div>



</article><!-- #post-<?php the_ID(); ?> -->