<?php
get_header();

$maniva_meetup_tzSidebar          =   ot_get_option('maniva-meetup' . '_TZBlogSidebar','show');
$maniva_meetup_on_off_Breadcrumb    =   ot_get_option('maniva-meetup'. 'tzBreadcrumb_on_off','on');
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

                    $maniva_meetup_item_type      = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE);
                    $maniva_meetup_image          = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_fullsize_image', TRUE);
                    $maniva_meetup_slideshows     = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_slideshows',true);
                    $maniva_meetup_bgvideo_image  = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_bgvideo_image',true);
                    $maniva_meetup_video_type     = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_type',true);
                    $maniva_meetup_video_id       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video',true);
                    $maniva_meetup_soundcloud_id  = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_soundCloud_id',true);

                    ?>
                    <div id='post-<?php the_ID(); ?>' class="tz-blogItem">
                        <div class="tz-blogContent">
                            <div class="tz-blogBox">
                                <?php
                                if($maniva_meetup_item_type == 'slideshows'){
                                    ?>
                                    <div class="tz-blogSlider">
                                        <ul class="slides">
                                            <?php
                                            foreach ( $maniva_meetup_slideshows as $maniva_meetup_slide ):
                                                ?>
                                                <li>
                                                    <img src="<?php echo esc_url($maniva_meetup_slide['maniva-meetup' . '_portfolio_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                                                </li>
                                            <?php
                                            endforeach;
                                            ?>
                                        </ul>

                                        <?php if ( is_sticky() ): ?>
                                            <span class="tz_stickyPost">
                                            <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                        </span>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                <?php
                                }elseif($maniva_meetup_item_type == 'video'){
                                    ?>
                                    <div class="tz-blogVideo">
                                        <?php
                                        if($maniva_meetup_video_type == 'youtube'){
                                            ?>
                                            <iframe  class="iframe-full"
                                                     src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque&amp;autoplay=0">
                                            </iframe>
                                        <?php
                                        }else{
                                            ?>
                                            <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen>
                                            </iframe>
                                        <?php
                                        }
                                        ?>

                                        <?php if ( is_sticky() ): ?>
                                            <span class="tz_stickyPost">
                                            <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                        </span>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                <?php
                                }elseif($maniva_meetup_item_type == 'audio'){
                                    ?>
                                    <div class="tz-blogAudio">
                                        <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true">
                                        </iframe>

                                        <?php if ( is_sticky() ): ?>
                                            <span class="tz_stickyPost">
                                            <?php esc_html_e('Most Popular', 'maniva-meetup'); ?>
                                        </span>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                <?php
                                }else{
                                    ?>
                                    <div class="tz-BlogImage">
                                        <?php the_post_thumbnail();?>

                                        <?php if ( is_sticky() ): ?>
                                            <div class="tz_stickyPost">
                                                <span><?php esc_html_e('Most Popular', 'maniva-meetup'); ?></span>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                <span class="tzinfomation">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>"><?php esc_html_e('by ','maniva-meetup' );?><?php the_author();?></a>
                                    <small><i>|</i><?php echo get_the_time('M j, Y',$post->ID);?></small>
                                    <small>
                                        <i>|</i>
                                        <?php
                                        comments_popup_link( '0 '. esc_html__('Comments','maniva-meetup'),'1 '. esc_html__('Comments','maniva-meetup'), '% '. esc_html__('Comments','maniva-meetup') );
                                        ?>
                                    </small>
                                    <?php
                                    if(get_the_category() !=false){
                                        ?>
                                        <span class="tzcategory">
                                            <i>|</i>
                                            <?php
                                            the_category(', ');
                                            ?>
                                        </span>
                                    <?php } ?>
                                    <?php
                                    if(get_the_tags() != false){
                                        ?>
                                        <span class="tztag">
                                                <i>|</i>
                                            <?php
                                            the_tags('',', ');
                                            ?>
                                            </span>
                                    <?php } ?>
                                </span>
                                <?php
                                if ( ! has_excerpt() ) {
                                    the_content( sprintf('<a href="%s" class="tzreadmore">%s<i class="fa fa-long-arrow-right"></i></a>',esc_url(get_permalink()),esc_html__('READ MORE','maniva-meetup' ),false ));
                                    wp_link_pages();
                                } else {
                                    the_excerpt();
                                    ?>
                                    <a href="<?php the_permalink();?>" class="tzreadmore"><?php esc_html_e('READ MORE','maniva-meetup' );?><i class="fa fa-long-arrow-right"></i></a>
                                <?php
                                }
                                ?>
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
        </div>
        <?php
        if($maniva_meetup_tzSidebar == 'show'){
            get_sidebar();
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>