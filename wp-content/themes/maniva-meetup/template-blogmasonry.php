<?php
/*
 * Template Name: Template Blog Masonry
 */

get_header();

// OPTION FOR PAGE PORFOLIO
$maniva_meetup_catid          =  get_post_meta( get_the_ID(), 'maniva-meetup'.'_blogMasonry_catid', true ) ;
$maniva_meetup_limit          =  get_post_meta( get_the_ID(), 'maniva-meetup'.'_blogMasonry_limit', true ) ;
$maniva_meetup_orderby        =  get_post_meta( get_the_ID(), 'maniva-meetup'.'_blogMasonry_orderby', true ) ;
$maniva_meetup_order          =  get_post_meta( get_the_ID(), 'maniva-meetup'.'_blogMasonry_order', true ) ;
$maniva_meetup_desktop_page   =  get_post_meta( get_the_ID(), 'maniva-meetup'.'_blogMasonry_desktop', true );

$maniva_meetup_grid = '';
if ( $maniva_meetup_desktop_page == 4 ):
    $maniva_meetup_grid = 'tz-grid-4';
elseif ( $maniva_meetup_desktop_page == 3 ) :
    $maniva_meetup_grid = 'tz-grid-3';
elseif ( $maniva_meetup_desktop_page == 2 ) :
    $maniva_meetup_grid = 'tz-grid-2';
else:
    $maniva_meetup_grid = 'tz-grid-1';
endif;

?>

    <section class="tz-sectionBreadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="tz_breadcrumb_single_cat_title">
                        <h4>
                            <?php the_title(); ?>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="tz-breadcrumb">
                        <h4>
                            <?php if(function_exists('bcn_display')):  bcn_display(); endif; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div><!--end class container-->
    </section><!--end class tzbreadcrumb-->

    <section class="container tz-blogMasonry">
        <div class="row">
            <div class="col-md-12">
                <div class="tzBlogmasonry">

                    <?php

                    if ( get_query_var('paged') ):
                        $maniva_meetup_paged = get_query_var('paged');
                    else:
                        $maniva_meetup_paged = 1;
                    endif;

                    $maniva_meetup_tzcat = array();

                    if(is_array($maniva_meetup_catid)){
                        sort($maniva_meetup_catid);
                        $maniva_meetup_count_cat  =   count($maniva_meetup_catid);

                        for($maniva_meetup_i=0; $maniva_meetup_i<$maniva_meetup_count_cat; $maniva_meetup_i++){
                            $maniva_meetup_tzcat[]  =   (int)$maniva_meetup_catid[$maniva_meetup_i];
                        }

                    }else{
                        $maniva_meetup_tzcat[]    = (int)$maniva_meetup_catid;
                    }

                    $maniva_meetup_args = array(
                        'post_type'         =>  'post',
                        'paged'             =>  $maniva_meetup_paged,
                        'posts_per_page'    =>  $maniva_meetup_limit,
                        'orderby'           =>  $maniva_meetup_orderby,
                        'order'             =>  $maniva_meetup_order,
                        'tax_query'         =>  array(
                            array(
                                'taxonomy'  =>  'category',
                                'filed'     =>  'id',
                                'terms'      =>  $maniva_meetup_tzcat
                            )
                        )
                    );
                    $maniva_meetup_query = new WP_Query( $maniva_meetup_args ) ;
                    if ( $maniva_meetup_query -> have_posts() ): while ( $maniva_meetup_query -> have_posts() ): $maniva_meetup_query -> the_post() ;

                        $maniva_meetup_item_type      = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE);
                        $maniva_meetup_image          = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_fullsize_image', TRUE);
                        $maniva_meetup_slideshows     = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_slideshows',true);
                        $maniva_meetup_bgvideo_image  = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_bgvideo_image',true);
                        $maniva_meetup_video_type     = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_type',true);
                        $maniva_meetup_video_id       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video',true);
                        $maniva_meetup_soundcloud_id  = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_soundCloud_id',true);

                        $maniva_meetup_feature        = get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_featured', true );

                        $maniva_meetup_class_icon = '';
                        if($maniva_meetup_item_type == 'images'){
                            $maniva_meetup_class_icon = 'fa-camera';
                        }elseif($maniva_meetup_item_type == 'slideshows'){
                            $maniva_meetup_class_icon = 'fa-picture-o';
                        }elseif($maniva_meetup_item_type == 'video'){
                            $maniva_meetup_class_icon = 'fa-video-camera';
                        }elseif($maniva_meetup_item_type == 'audio'){
                            $maniva_meetup_class_icon = 'fa-soundcloud';
                        }else{
                            $maniva_meetup_class_icon = 'fa-pencil-square-o';
                        }

                        $maniva_meetup_class_feature = '';

                        if ( $maniva_meetup_feature == 'yes' ) :
                            $maniva_meetup_class_feature = 'tz_feature_item';
                        endif;


                    ?>

                        <div id="post-<?php the_ID() ; ?>" <?php post_class("blogMasonry-item $maniva_meetup_class_feature $maniva_meetup_grid") ; ?>>
                            <div class="tz-blogInner">

                                <?php if ( $maniva_meetup_item_type == 'slideshows' ) : ?>

                                    <div class="tz-blogSlider owl-carousel owl-theme">

                                        <?php foreach ( $maniva_meetup_slideshows as $maniva_meetup_slide ): ?>

                                            <div class="tz-blogSlider__item">
                                                <img src="<?php echo esc_url($maniva_meetup_slide['maniva-meetup' . '_portfolio_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                                            </div>

                                        <?php endforeach; ?>
                                    </div>

                                    <div class="tz-blogDate">
                                        <div class="tz-DateText">
                                            <span class="tz-TextDay"><?php echo get_the_time('j',get_the_ID() );?></span>
                                            <span class="tz-TextMonth"><?php echo get_the_time('M',get_the_ID() );?></span>
                                        </div>
                                        <div class="tz-blogIcon">
                                            <i class="fa <?php echo esc_attr($maniva_meetup_class_icon);?>"></i>
                                        </div>
                                    </div>

                                <?php elseif ( $maniva_meetup_item_type == 'video' ) : ?>

                                    <div class="tz-blogVideo">

                                        <?php if ( $maniva_meetup_video_type == 'youtube' ) :?>

                                            <iframe  class="iframe-full"
                                                     src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque&amp;autoplay=0">
                                            </iframe>

                                        <?php else: ?>

                                            <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen></iframe>
                                        <?php endif; ?>

                                        <div class="tz-blogDate">
                                            <div class="tz-DateText">
                                                <span class="tz-TextDay"><?php echo get_the_time('j', get_the_ID() );?></span>
                                                <span class="tz-TextMonth"><?php echo get_the_time('M', get_the_ID() );?></span>
                                            </div>
                                            <div class="tz-blogIcon">
                                                <i class="fa <?php echo esc_attr($maniva_meetup_class_icon);?>"></i>
                                            </div>
                                        </div>
                                    </div>

                                <?php elseif($maniva_meetup_item_type == 'audio') : ?>

                                    <div class="tz-blogAudio">

                                        <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                                        </iframe>

                                        <div class="tz-blogDate">
                                            <div class="tz-DateText">
                                                <span class="tz-TextDay"><?php echo get_the_time('j', get_the_ID() );?></span>
                                                <span class="tz-TextMonth"><?php echo get_the_time('M', get_the_ID() );?></span>
                                            </div>
                                            <div class="tz-blogIcon">
                                                <i class="fa <?php echo esc_attr($maniva_meetup_class_icon);?>"></i>
                                            </div>
                                        </div>

                                    </div>

                                <?php else : ?>

                                    <div class="tz-BlogImage">

                                        <?php the_post_thumbnail('medium');?>
                                        <div class="tz-ImageOverlay"></div>

                                        <?php if ( $maniva_meetup_item_type == 'images' && $maniva_meetup_image !='' ) : ?>
                                            <a class="tz-ViewImage" href="<?php echo esc_url($maniva_meetup_image);?>" data-rel="prettyPhoto[worksGallery]">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php

                                        else:
                                            $maniva_meetup_img_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                                        ?>

                                            <a class="tz-ViewImage" href="<?php echo esc_url($maniva_meetup_img_thumbnail);?>" data-rel="prettyPhoto[worksGallery]">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                        <?php endif; ?>

                                        <a class="tz-ViewDetail" href="<?php the_permalink();?>">
                                            <i class="fa fa-link"></i>
                                        </a>

                                        <div class="tz-blogDate">
                                            <div class="tz-DateText">
                                                <span class="tz-TextDay"><?php echo get_the_time('j', get_the_ID() );?></span>
                                                <span class="tz-TextMonth"><?php echo get_the_time('M', get_the_ID() );?></span>
                                            </div>
                                            <div class="tz-blogIcon">
                                                <i class="fa <?php echo esc_attr($maniva_meetup_class_icon);?>"></i>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <div class="tz-blogInfo">

                                    <h4 class="title">
                                        <a href="<?php the_permalink();?>">
                                            <?php the_title();?>
                                        </a>
                                    </h4>

                                    <span class="tzinfomation">

                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                                            <?php esc_html_e('by ','maniva-meetup' ); the_author(); ?>
                                        </a>

                                        <small>
                                            <i class="fa fa-calendar"></i>
                                            <?php echo get_the_time('M j, Y', get_the_ID() );?>
                                        </small>

                                        <small>
                                            <i class="fa fa-comments"></i>
                                            <?php comments_popup_link( '0 ' ,'1 ' , '% ' ); ?>
                                        </small>

                                    </span>

                                    <?php the_excerpt();?>

                                    <a href="<?php the_permalink();?>" class="tzreadmore">
                                        <?php esc_html_e('READ MORE','maniva-meetup' );?>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </a>

                                </div>

                            </div>
                        </div>

                    <?php

                    endwhile;

                    endif;

                    wp_reset_postdata();

                    ?>

                </div>

                <?php

                if ( function_exists('wp_pagenavi') ):
                    wp_pagenavi( array( 'query'    =>  $maniva_meetup_query ) );
                endif;

                ?>

            </div><!--end class col-md-9-->
        </div>
    </section><!--end class container-->

<?php get_footer(); ?>