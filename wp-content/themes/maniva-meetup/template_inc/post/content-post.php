<div class="tz-blogContainer">
    <?php

    if ( have_posts() ) : while (have_posts()) : the_post() ;

        global $post;

        $maniva_meetup_item_type        =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE );
        $maniva_meetup_image            =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_fullsize_image', TRUE );
        $maniva_meetup_slideshows       =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_slideshows',true );
        $maniva_meetup_bgvideo_image    =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_bgvideo_image',true );
        $maniva_meetup_video_type       =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_video_type',true );
        $maniva_meetup_video_id         =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_video',true );
        $maniva_meetup_soundcloud_id    =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_soundCloud_id',true );
        $maniva_meetup_quote            =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_Quote_Autor', true );

        $maniva_meetup_class_blog_type = '';

        if( $maniva_meetup_item_type == 'slideshows' ) :
            $maniva_meetup_class_blog_type = 'tz-blogBoxSlider';
        elseif( $maniva_meetup_item_type == 'video' ) :
            $maniva_meetup_class_blog_type = 'tz-blogBoxVideo';
        elseif ( $maniva_meetup_item_type == 'quote' ) :
            $maniva_meetup_class_blog_type = 'tz-blogBoxQuote';
        elseif( $maniva_meetup_item_type == 'audio' ) :
            $maniva_meetup_class_blog_type = 'tz-blogBoxSoundcloud';
        endif;

        ?>

        <div id="post-<?php the_ID(); ?>" class="tz-blogItem">
            <div class="tz-blogContent">
                <div class="tz-blogBox <?php echo esc_attr( $maniva_meetup_class_blog_type ); ?>">

                    <?php if ( $maniva_meetup_item_type == 'slideshows' ) :?>

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

                    <?php elseif ( $maniva_meetup_item_type == 'video' ) : ?>

                        <div class="tz-blogVideo">

                            <?php if( $maniva_meetup_video_type == 'youtube' ) : ?>

                                <iframe  class="iframe-full" src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque">
                                </iframe>

                            <?php else: ?>

                                <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen>
                                </iframe>

                            <?php endif; ?>

                            <?php if ( is_sticky() ): ?>

                                <span class="tz_stickyPost">
                                    <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                </span>

                            <?php endif; ?>

                        </div>

                    <?php elseif ( $maniva_meetup_item_type == 'audio' ) : ?>

                        <div class="tz-blogAudio">
                            <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true&amp;visual=true">
                            </iframe>

                            <?php if ( is_sticky() ): ?>

                                <span class="tz_stickyPost">
                                    <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                </span>

                            <?php endif; ?>

                        </div>

                    <?php elseif ( $maniva_meetup_item_type == 'quote' ) : ?>

                        <div class="tz-blogQuote">
                            <div class="tz-blogQuote-img">
                                <?php the_post_thumbnail('full'); ?>
                            </div>

                            <div class="tz-blogQuote_detail">
                                <div class="ds-table">
                                    <div class="ds-table-cell">
                                        <i class="fa fa-quote-right"></i>

                                        <?php

                                        if ( ! has_excerpt() ) :

                                            the_content();

                                        else :

                                            the_excerpt();

                                        endif;

                                        echo '<span class="tz-blogQuote_author">'.wp_kses_allowed_html( $maniva_meetup_quote ).'</span>';

                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="tz_blogQuote_information">
                                <span class="tzinfomation">
                                    <small class="tzinfomation_time">

                                        <?php the_time(get_option('date_format')); ?>

                                    </small>

                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                                        <i>|</i><?php esc_html_e('by ','maniva-meetup' ); the_author(); ?>
                                    </a>

                                    <small>

                                        <i>|</i>

                                        <?php
                                        comments_popup_link( '0 '. esc_html__('Comments','maniva-meetup'),'1 '. esc_html__('Comments','maniva-meetup'), '% '. esc_html__('Comments','maniva-meetup') );
                                        ?>

                                    </small>

                                    <?php if( get_the_category() != false ) : ?>

                                        <span class="tzcategory">

                                            <i>|</i>
                                            <?php the_category(', '); ?>

                                        </span>

                                    <?php endif; ?>

                                    <?php if(get_the_tags() != false) : ?>

                                        <span class="tztag">

                                            <i>|</i>
                                            <?php the_tags('',', '); ?>

                                        </span>

                                    <?php endif; ?>

                                </span>
                            </div>

                            <div class="tz_blogQuote_link">
                                <a href="<?php the_permalink(); ?>" class="tzreadmore">
                                    <span>
                                        <?php esc_html_e('KEEP READING','maniva-meetup' );?>
                                        <i class="fa fa-long-arrow-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>

                    <?php else: ?>

                        <div class="tz-BlogImage">

                            <?php if ( $maniva_meetup_item_type == 'images' && $maniva_meetup_image !='' ) : ?>

                                <img src="<?php echo esc_url( $maniva_meetup_image ); ?>" alt="<?php the_title(); ?>">

                            <?php else: ?>

                                <?php the_post_thumbnail('full');?>

                            <?php endif; ?>

                            <div class="tz-ImageOverlay"></div>

                            <?php if ( $maniva_meetup_item_type == 'images' && $maniva_meetup_image !='' ) : ?>

                                <a class="tz-ViewImage" href="<?php echo esc_url($maniva_meetup_image);?>" data-rel="prettyPhoto[worksGallery]">
                                    <i class="fa fa-"></i>
                                </a>

                            <?php

                            else:

                                $maniva_meetup_img_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

                            ?>

                                <a class="tz-ViewImage" href="<?php echo esc_url($maniva_meetup_img_thumbnail);?>" data-rel="prettyPhoto[worksGallery]">
                                    <i class="fa fa fa-search"></i>
                                </a>

                            <?php endif; ?>

                            <a class="tz-ViewDetail" href="<?php the_permalink();?>">
                                <i class="fa fa-link"></i>
                            </a>

                        </div>

                    <?php endif; ?>


                    <?php if ( $maniva_meetup_item_type != 'quote' ) : ?>

                        <div class="tz_blog_box_content">

                            <h4 class="title">
                                <a href="<?php the_permalink();?>">
                                    <?php the_title();?>
                                </a>
                            </h4>

                            <span class="tzinfomation">

                                 <small class="tzinfomation_time">

                                     <?php the_time(get_option('date_format')); ?>

                                 </small>

                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                                    <i>|</i><?php esc_html_e('by ','maniva-meetup' ); the_author(); ?>
                                </a>

                                <small>

                                    <i>|</i>

                                    <?php
                                    comments_popup_link( '0 '. esc_html__('Comments','maniva-meetup'),'1 '. esc_html__('Comments','maniva-meetup'), '% '. esc_html__('Comments','maniva-meetup') );
                                    ?>

                                </small>

                                <?php if( get_the_category() != false ) : ?>

                                    <span class="tzcategory">
                                        <i>|</i>
                                        <?php the_category(', '); ?>
                                    </span>

                                <?php endif; ?>

                                <?php if( get_the_tags() != false ) : ?>

                                    <span class="tztag">
                                        <i>|</i>
                                        <?php the_tags('',', '); ?>
                                    </span>

                                <?php endif; ?>

                            </span>

                            <?php

                            if ( ! has_excerpt() ) :

                                the_content();

                            else :

                                the_excerpt();

                            endif;

                            ?>

                            <a href="<?php the_permalink();?>" class="tzreadmore">
                                <span>
                                    <?php esc_html_e('KEEP READING','maniva-meetup' );?>
                                    <i class="fa fa-long-arrow-right"></i>
                                </span>
                            </a>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>

    <?php

        endwhile; // end while ( have_posts )
    endif; // end if ( have_posts )

    ?>

</div>

<?php

    if ( function_exists('wp_pagenavi') ):
        wp_pagenavi();
    else:
        maniva_meetup_content_nav('bottom-nav');
    endif;

?>