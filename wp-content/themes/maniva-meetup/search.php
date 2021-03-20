<?php

get_header();

$maniva_meetup_tzSidebar    =   ot_get_option('maniva-meetup' . '_TZBlogSidebar','show');

$maniva_meetup_class_sidebar ='';
if($maniva_meetup_tzSidebar == 'show'){
    $maniva_meetup_class_sidebar = 'col-md-9';
}else{
    $maniva_meetup_class_sidebar = 'col-md-12';
}

?>

<?php
if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :
    get_template_part('template_inc/inc','breadcrumb');
endif;
?>

<section class="container tz-blogDefault">

    <div class="row">
        <div class="<?php echo esc_attr($maniva_meetup_class_sidebar);?>">

            <div class="tz-blogContainer">
                <?php

                if ( have_posts() ) : while (have_posts()) : the_post() ;

                    $maniva_meetup_post_type        = get_post_type( get_the_ID() );
                    $maniva_meetup_item_type        = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE);
                    $maniva_meetup_image            = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_fullsize_image', TRUE);
                    $maniva_meetup_slideshows       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_slideshows',true);
                    $maniva_meetup_bgvideo_image    = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_bgvideo_image',true);
                    $maniva_meetup_video_type       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_type',true);
                    $maniva_meetup_video_id         = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video',true);
                    $maniva_meetup_soundcloud_id    = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_soundCloud_id',true);
                    $maniva_meetup_comment_count    = wp_count_comments( get_the_ID() );

                ?>

                    <div id='post-<?php the_ID(); ?>' class="tz-blogItem">
                        <div class="tz-blogContent">
                            <div class="tz-blogBox">
                                <?php

                                if( $maniva_meetup_post_type != 'page' ) :

                                    if($maniva_meetup_item_type == 'slideshows') :
                                ?>

                                        <div class="tz-blogSlider owl-carousel owl-theme">

                                            <?php foreach ( $maniva_meetup_slideshows as $maniva_meetup_slide ): ?>

                                                <div class="tz-blogSlider__item">
                                                    <img src="<?php echo esc_url($maniva_meetup_slide['maniva-meetup' . '_portfolio_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                                                </div>

                                            <?php endforeach; ?>

                                            <?php if ( is_sticky() ): ?>

                                                <span class="tz_stickyPost">
                                                    <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                                </span>

                                            <?php endif; ?>

                                        </div>

                                    <?php elseif( $maniva_meetup_item_type == 'video' ) : ?>

                                        <div class="tz-blogVideo">

                                            <?php if( $maniva_meetup_video_type == 'youtube' ) : ?>

                                                <iframe  class="iframe-full" src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque&amp;autoplay=0"></iframe>

                                            <?php else: ?>

                                                <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen></iframe>

                                            <?php endif; ?>

                                        </div>

                                    <?php elseif( $maniva_meetup_item_type == 'audio' ) : ?>

                                        <div class="tz-blogAudio">
                                            <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true"></iframe>
                                        </div>

                                    <?php else: ?>

                                        <div class="tz-BlogImage">

                                            <?php the_post_thumbnail();?>

                                            <div class="tz-ImageOverlay"></div>

                                            <a class="tz-ViewImage" href="<?php echo esc_url($maniva_meetup_image);?>" data-rel="prettyPhoto[worksGallery]">
                                                <i class="fa fa-eye"></i>
                                                <span class="tz-lineBottom"></span>
                                            </a>
                                            <a class="tz-ViewDetail" href="<?php the_permalink();?>">
                                                <i class="fa fa-link"></i>
                                                <span class="tz-lineTop"></span>
                                            </a>
                                        </div>
                                <?php
                                    endif; // end if type post
                                endif; // end if check page
                                ?>
                                <div class="tz_search_content">
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

                                        <?php if( get_the_category() !=false) : ?>

                                            <span class="tzcategory">
                                            <i class="fa fa-folder"></i>
                                                <?php the_category(', '); ?>
                                        </span>

                                        <?php endif; ?>

                                        <?php if(get_the_tags() != false) : ?>

                                            <span class="tztag">
                                            <i class="fa fa-tag"></i>
                                                <?php the_tags('',', '); ?>
                                        </span>

                                        <?php endif; ?>

                                </span>

                                    <?php if( $maniva_meetup_post_type != 'page' ) :

                                        if ( ! has_excerpt() ) :

                                            the_content( sprintf('<a href="%s" class="tzreadmore">%s<i class="fa fa-long-arrow-right"></i></a>',esc_url( get_permalink() ),esc_html__('READ MORE','maniva-meetup' ),false ));
                                            wp_link_pages();

                                        else :

                                            the_excerpt();
                                            ?>

                                            <a href="<?php the_permalink();?>" class="tzreadmore">
                                                <?php esc_html_e('READ MORE','maniva-meetup' );?>
                                                <i class="fa fa-long-arrow-right"></i>
                                            </a>

                                            <?php

                                        endif;
                                    endif;

                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>

                <?php

                endwhile; // end while ( have_posts )

                else:

                ?>
                    <div class="tzserach_notda">
                        <h3>
                            <?php esc_html_e('No Data','maniva-meetup' );?>
                        </h3>

                        <div class="page-content">

                            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                                <p>
                                    <?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'maniva-meetup' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
                                </p>

                            <?php elseif ( is_search() ) : ?>

                                <p>
                                    <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'maniva-meetup' ); ?>
                                </p>

                                <?php get_search_form(); ?>

                            <?php else : ?>

                                <p>
                                    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'maniva-meetup' ); ?>
                                </p>
                                <?php get_search_form(); ?>

                            <?php endif; ?>

                        </div><!-- .page-content -->
                    </div>

                <?php endif; // end if ( have_posts ) ?>

            </div>

            <?php

            if ( function_exists('wp_pagenavi') ):
                wp_pagenavi();
            else:
                maniva_meetup_content_nav('bottom-nav');
            endif;

            ?>

        </div>

        <?php

            if( $maniva_meetup_tzSidebar == 'show' ) :
                get_sidebar();
            endif;

        ?>

    </div>

</section>

<?php get_footer(); ?>

