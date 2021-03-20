<?php

$maniva_meetup_archive_product_col      =   ot_get_option( 'maniva-meetup-archive-product-columns', 4 );
$maniva_meetup_archive_product_width1   =   ot_get_option( 'maniva-meetup-archive-product-width1', 3 );
$maniva_meetup_archive_product_width2   =   ot_get_option( 'maniva-meetup-archive-product-width2', 3 );
$maniva_meetup_archive_product_width3   =   ot_get_option( 'maniva-meetup-archive-product-width3', 3 );
$maniva_meetup_archive_product_width4   =   ot_get_option( 'maniva-meetup-archive-product-width4', 3 );

if ( is_active_sidebar( 'maniva-meetup-archive-product-column-1' ) || is_active_sidebar('maniva-meetup-archive-product-column-2' ) || is_active_sidebar( 'maniva-meetup-archive-product-column-3' ) || is_active_sidebar( 'maniva-meetup-archive-product-column-4' ) ) :

?>

    <div class="tz-sidebar-archive-product tz-sidebar">
        <div class="row">

            <?php

            for( $maniva_meetup_archive_product_i = 0; $maniva_meetup_archive_product_i < $maniva_meetup_archive_product_col; $maniva_meetup_archive_product_i++ ):

                $maniva_meetup_archive_product_j = $maniva_meetup_archive_product_i + 1;

                if( $maniva_meetup_archive_product_i == 0 ) :

                    $maniva_meetup_col = $maniva_meetup_archive_product_width1;

                elseif( $maniva_meetup_archive_product_i == 1 ) :

                    $maniva_meetup_col = $maniva_meetup_archive_product_width2;

                elseif( $maniva_meetup_archive_product_i == 2 ) :

                    $maniva_meetup_col = $maniva_meetup_archive_product_width3;

                else :

                    $maniva_meetup_col = $maniva_meetup_archive_product_width4;

                endif;

                if ( is_active_sidebar( 'maniva-meetup-archive-product-column-'.$maniva_meetup_archive_product_j ) ) :

            ?>

                <div class="col-md-<?php echo esc_attr( $maniva_meetup_col ); ?>">

                    <?php dynamic_sidebar( 'maniva-meetup-archive-product-column-'.$maniva_meetup_archive_product_j ); ?>

                </div><!--end class footermenu-->

            <?php

                endif;

            endfor;

            ?>

        </div>
    </div>

<?php endif; ?>