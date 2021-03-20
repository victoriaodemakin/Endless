<?php
/**
 * Product Quick View
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$maniva_meetup_attachment_ids = $product->get_gallery_image_ids();

?>

<div class="tzQuickview_img">

    <?php

    if ( maniva_meetup_out_of_stock() ) :

        echo '<span class="tzOut-of-stock">' . esc_html__( 'Out of Stock', 'maniva-meetup' ) . '</span>';

    else:

        if ($product->is_on_sale()) {
            echo apply_filters('woocommerce_sale_flash', '<span class="tzProductSale">'.esc_html__( 'On Sale', 'maniva-meetup' ).'</span>', $post, $product);
        }

        if (maniva_meetup_featured()){
            echo '<div class="tzFeatured_product"><span>' . esc_html__('Featured', 'maniva-meetup' ) . '</span></div>';
        }

    endif;

    ?>

    <div id="slider" class="flexslider">
        <ul class="slides">

            <?php

            if ( $maniva_meetup_attachment_ids ) :
                foreach( $maniva_meetup_attachment_ids as $maniva_meetup_attachment_id ) :

            ?>
                    <li>
                        <?php echo wp_get_attachment_image($maniva_meetup_attachment_id, 'full'); ?>
                    </li>
            <?php

                endforeach;
            else:

            ?>

                <li>
                    <?php the_post_thumbnail('full') ?>
                </li>

            <?php endif; ?>

        </ul>
    </div>

    <?php if ( $maniva_meetup_attachment_ids ) : ?>

    <div id="carousel" class="flexslider">
        <ul class="slides">
            <?php

            foreach( $maniva_meetup_attachment_ids as $maniva_meetup_attachment_id ) :

            ?>
                <li>
                    <?php echo wp_get_attachment_image($maniva_meetup_attachment_id, 'full'); ?>
                </li>
            <?php

            endforeach;

            ?>
        </ul>
    </div>

    <?php endif; ?>

</div>
