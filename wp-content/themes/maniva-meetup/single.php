<?php
get_header();

$maniva_meetup_tzSidebar                =   ot_get_option( 'maniva-meetup' . '_TZSingleBlogSidebar','show' );
$maniva_meetup_on_off_image             =   ot_get_option( 'maniva-meetup'. '_TZSingleBlogImage','on' );
$maniva_meetup_on_off_image_slider      =   ot_get_option( 'maniva-meetup'. '_TZSingleBlogSliderImage','on' );
$maniva_meetup_on_off_video             =   ot_get_option( 'maniva-meetup'. '_TZSingleBlogVideo','on' );
$maniva_meetup_on_off_audio             =   ot_get_option( 'maniva-meetup'. '_TZSingleBlogAudio','on' );
$maniva_meetup_slider_client_blog       =   ot_get_option( 'maniva-meetup' . 'blog_single_slideshows_show','hide') ;
$maniva_meetup_slideshows_blog          =   ot_get_option( 'maniva-meetup' . '_blog_single_slideshows' );
$maniva_meetup_on_off_Breadcrumb        =   ot_get_option( 'maniva-meetup'. 'tzBreadcrumb_on_off','on' );
$maniva_meetup_on_off_avata             =   ot_get_option( 'maniva-meetup'. 'tzAvata_blog_on_off','off' );
$maniva_meetup_on_off_avata_social      =   ot_get_option( 'maniva-meetup'. '_TzSingleAvatarSocial','off' );
$maniva_meetup_on_off_number_comment    =   ot_get_option( 'maniva-meetup'. '_TzSingleNumberComment','on' );
$maniva_meetup_on_off_btn_share         =   ot_get_option( 'maniva-meetup'. '_TzSingleBtnShare','on' );
$maniva_meetup_on_off_tag               =   ot_get_option( 'maniva-meetup'. '_TzSingleTag','on' );
$maniva_meetup_on_off_author            =   ot_get_option( 'maniva-meetup'. '_TzSingleAuthor','on' );
$maniva_meetup_on_off_Related_Post      =   ot_get_option( 'maniva-meetup'. 'tzRelated_Post_on_off','off' );
$maniva_meetup_on_off_comment_form      =   ot_get_option( 'maniva-meetup'. '_TzSingleCommentForm','on' );
$maniva_meetup_on_off_pre_next          =   ot_get_option( 'maniva-meetup'. '_TzSinglePreNext','on' );

$maniva_meetup_class_sidebar ='';
$maniva_meetup_classt_avata_hide = '';

if($maniva_meetup_tzSidebar == 'show'){
    $maniva_meetup_class_sidebar = 'col-md-9';
}else{
    $maniva_meetup_class_sidebar = 'col-md-12';
}

if ( $maniva_meetup_on_off_avata == 'off' ) :

    $maniva_meetup_classt_avata_hide = 'tz_SingleContentBox_author_hide';

endif;


?>
<?php
if ( $maniva_meetup_on_off_Breadcrumb == 'on' ) :
    get_template_part('template_inc/inc','breadcrumb');
endif;
?>

<section class="container tz-blogSingle">
    <div class="row">
        <div class="<?php echo esc_attr( $maniva_meetup_class_sidebar );?>">

            <?php
            if ( have_posts() ) : while (have_posts()) : the_post() ;

                global $post;
                maniva_meetup_setPostViews(get_the_ID());

                $maniva_meetup_item_type        = get_post_meta(get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE);
                $maniva_meetup_imagefull        = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_fullsize_image',true);
                $maniva_meetup_slideshows       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_slideshows',true);
                $maniva_meetup_bgvideo_image    = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_bgvideo_image',true);
                $maniva_meetup_video_webm       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_webm',true);
                $maniva_meetup_video_mp4        = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_mp4',true);
                $maniva_meetup_video_ogv        = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_ogv',true);
                $maniva_meetup_video_type       = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video_type',true);
                $maniva_meetup_video_id         = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_video',true);
                $maniva_meetup_soundcloud_id    = get_post_meta(get_the_ID(),'maniva-meetup' . '_portfolio_soundCloud_id',true);

                $maniva_meetup_twitter    =  get_the_author_meta('twitter');
                $maniva_meetup_facebook   =  get_the_author_meta('facebook');
                $maniva_meetup_gplus      =  get_the_author_meta('gplus');
                $maniva_meetup_dribbble   =  get_the_author_meta('instagram');
                $maniva_meetup_linkedin   =  get_the_author_meta('linkedin');

                $maniva_array = array();
                if(get_the_author_meta('twitter')){
                    array_push($maniva_array,get_the_author_meta('twitter').'||fa-twitter');
                }
                if(get_the_author_meta('facebook')){
                    array_push($maniva_array,get_the_author_meta('facebook').'||fa-facebook');
                }
                if(get_the_author_meta('gplus')){
                    array_push($maniva_array,get_the_author_meta('gplus').'||fa-google-plus');
                }
                if(get_the_author_meta('instagram')){
                    array_push($maniva_array,get_the_author_meta('instagram').'||fa-instagram');
                }
                if(get_the_author_meta('linkedin')){
                    array_push($maniva_array,get_the_author_meta('linkedin').'||fa-linkedin');
                }

                ?>

                <div class="tz-blogSingleContent">
                    <div class="tz-SingleContentBox">
                        <div class="tz_SingleContentBox_general">

                            <?php if ( $maniva_meetup_item_type == 'slideshows' && $maniva_meetup_slideshows != '' && $maniva_meetup_on_off_image_slider == 'on' ) : ?>

                                <div class="tz-blogSlider tz-blogSlider__single owl-carousel owl-theme">


                                    <?php foreach ( $maniva_meetup_slideshows as $maniva_meetup_slide ) : ?>

                                        <div class="tz-blogSlider__item">
                                            <img src="<?php echo esc_url($maniva_meetup_slide['maniva-meetup' . '_portfolio_slideshow_item']) ; ?>" alt="<?php the_title();?>">
                                        </div>

                                    <?php endforeach; ?>


                                </div>

                            <?php elseif ( $maniva_meetup_item_type == 'video' && $maniva_meetup_video_id != '' && $maniva_meetup_on_off_video == 'on' ) : ?>

                                <div class="tz-blogVideo">

                                    <?php if($maniva_meetup_video_type == 'youtube') : ?>

                                        <iframe  class="iframe-full"
                                                 src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque&amp;autoplay=0">
                                        </iframe>

                                    <?php else : ?>

                                        <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen>
                                        </iframe>

                                    <?php endif; ?>

                                </div>

                            <?php elseif ( $maniva_meetup_item_type == 'audio' && $maniva_meetup_soundcloud_id != '' && $maniva_meetup_on_off_audio == 'on' ) : ?>

                                <div class="tz-blogAudio">
                                    <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true&amp;visual=true">
                                    </iframe>
                                </div>

                            <?php elseif ( $maniva_meetup_item_type == 'images' && $maniva_meetup_imagefull != '' && $maniva_meetup_on_off_image == 'on' ) :?>

                                <div class="tz-BlogImage">
                                    <img src="<?php echo esc_url($maniva_meetup_imagefull); ?>" alt="<?php the_title(); ?>">
                                    <div class="tz-ImageOverlay"></div>
                                </div>

                            <?php

                            else:
                                if( has_post_thumbnail() && $maniva_meetup_on_off_image == 'on' ) :

                            ?>

                                <div class="tz-BlogImage">
                                    <?php the_post_thumbnail('full');?>
                                    <div class="tz-ImageOverlay"></div>
                                </div>

                            <?php

                                endif;

                            endif;

                            ?>

                            <?php if ( $maniva_meetup_on_off_avata == 'on' || $maniva_meetup_on_off_avata_social == 'on' || !empty($maniva_meetup_facebook) || !empty($maniva_meetup_twitter) || !empty($maniva_meetup_linkedin) || !empty($maniva_meetup_dribbble) || !empty($maniva_meetup_gplus) ) : ?>

                            <div class="tz_SingleContentBox_author <?php echo esc_attr( $maniva_meetup_classt_avata_hide ); ?>">
                                <div class="author-box">

                                    <?php if ( $maniva_meetup_on_off_avata == 'on' ) : ?>

                                        <div class="author-avata">

                                            <?php echo get_avatar( get_the_author_meta('ID'),117); ?>

                                        </div>

                                    <?php endif; ?>

                                    <?php if ( $maniva_meetup_on_off_avata_social == 'on' ) : ?>

                                        <span class="author-social">

                                            <?php if( isset ($maniva_meetup_facebook) && !empty($maniva_meetup_facebook) ) : ?>

                                                <a class="TzSocialLink" href="<?php echo esc_url($maniva_meetup_facebook);?>">
                                                    <span class="TzSocialLink_fa">
                                                        <i class="fa fa-facebook"></i>
                                                    </span>
                                                </a>

                                            <?php endif; ?>

                                            <?php if( isset($maniva_meetup_twitter) && !empty($maniva_meetup_twitter) ) : ?>

                                                <a class="TzSocialLink" href="<?php echo esc_url($maniva_meetup_twitter);?>">
                                                    <span class="TzSocialLink_twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </span>
                                                </a>

                                            <?php endif; ?>

                                            <?php if( isset($maniva_meetup_linkedin) && !empty($maniva_meetup_linkedin) ) : ?>

                                                <a class="TzSocialLink" href="<?php echo esc_url($maniva_meetup_linkedin);?>">
                                                    <span class="TzSocialLink_linkedin">
                                                        <i class="fa fa-linkedin"></i>
                                                    </span>
                                                </a>

                                            <?php endif; ?>

                                            <?php if( isset($maniva_meetup_dribbble) && !empty($maniva_meetup_dribbble) ) : ?>

                                                <a class="TzSocialLink" href="<?php echo esc_url($maniva_meetup_dribbble);?>">
                                                    <span class="TzSocialLink_dribbble">
                                                        <i class="fa fa-dribbble"></i>
                                                    </span>
                                                </a>

                                            <?php endif; ?>

                                            <?php if( isset($maniva_meetup_gplus) && !empty($maniva_meetup_gplus) ) : ?>

                                                <a class="TzSocialLink" href="<?php echo esc_url($maniva_meetup_gplus);?>">
                                                    <span class="TzSocialLink_gp">
                                                        <i class="fa fa-google-plus"></i>
                                                    </span>
                                                </a>

                                            <?php endif; ?>

                                        </span>

                                    <?php endif; ?>

                                </div>
                            </div>

                            <?php endif; ?>

                            <?php if ( $maniva_meetup_on_off_number_comment == 'on' || $maniva_meetup_on_off_btn_share == 'on' ) : ?>

                                <div class="tz_SingleContentBox_like">

                                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && $maniva_meetup_on_off_number_comment == 'on' ) : ?>

                                        <span class="entry-single-comment">

                                            <?php
                                                comments_popup_link( '0 <i class="fa fa-comment"></i>','1 <i class="fa fa-comment"></i>', '% <i class="fa fa-comment"></i>' );
                                            ?>

                                        </span>

                                    <?php endif; ?>

                                    <?php if ( $maniva_meetup_on_off_btn_share == 'on' ) : ?>

                                        <div class="share-wrap">

                                            <p class="p-share"><?php esc_html_e('Share', 'maniva-meetup'); ?></p>

                                            <div class="share-wrap-content">
                                                <!-- Facebook Button -->
                                                <a href="javascript: void(0)" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" id="fb-share" class="tz_social_facebook"><i class="fa fa-facebook"></i></a>

                                                <!-- Twitter Button -->
                                                <a href="javascript: void(0)" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social_twitter" id="tw-share"><i class="fa fa-twitter"></i></a>

                                                <!-- Google +1 Button -->
                                                <a href="javascript: void(0)" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social_gplus" id="g-share"><i class="fa fa-google-plus"></i></a>

                                                <!-- Pinterest Button -->
                                                <a href="javascript: void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink() ; ?>&amp;description=<?php the_title(); ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social_pinterest" id="p-share"><i class="fa fa-pinterest"></i></a>
                                            </div>

                                        </div>

                                    <?php endif; ?>

                                </div>

                            <?php endif; ?>

                        </div>

                        <h4 class="tzSingleBlog_title">
                            <?php the_title();?>
                        </h4>
                        <span class="tzinfomation">

                            <small class="tzinfomation_time">
                                <?php the_time(get_option('date_format')); ?>
                            </small>
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                                <i>|</i>
                                <?php the_author();?>
                            </a>
                            <?php if(get_the_category() !=false) : ?>
                                <span class="tzcategory">
                                    <i>|</i>
                                    <?php
                                    the_category(', ');
                                    ?>
                                </span>
                            <?php endif; ?>

                        </span>
                        <div class="single-content">
                            <?php
                            the_content();
                            wp_link_pages();
                            ?>
                        </div>

                        <?php if( get_the_tags() != false && $maniva_meetup_on_off_tag == 'on' ) : ?>

                            <span class="tztag">

                                <?php esc_html_e('Tags:','maniva-meetup'); the_tags('',' '); ?>

                            </span>

                        <?php endif; ?>

                    </div>
                </div><!--end class blog-single-content-->
            <?php
            endwhile;
            endif;
            ?>

            <!-- Start Author -->
            <?php if ( $maniva_meetup_on_off_author == 'on' ) : ?>

                <div class="author">
                    <div class="author-box">
                        <div class="author-avata">
                            <div class="tz_author_avata">
                                <span class="tz_author_avata_img">
                                    <?php echo get_avatar( get_the_author_meta('ID'),185); ?>
                                </span>
                            </div>
                            <div class="tz-author-social">

                                <?php

                                    $so = count($maniva_array);

                                    for ( $i = 0; $i < $so ; $i ++ ) :

                                        $number = $so%2;

                                        if ( $number !=0 ):
                                            $class[$i]  =   'tz_blog_meetup_social_odd_'.$i;
                                        else:
                                            $class[$i]  =   'tz_blog_meetup_social_even_'.$i;
                                        endif;
                                        $socal_meetup_arr =explode("||",$maniva_array[$i]);

                                ?>

                                        <a class="<?php echo esc_attr( $class[$i] ); ?>" href="<?php echo esc_url( $socal_meetup_arr[0] );?>">
                                            <span class="TzSocialLink-<?php echo esc_attr( $socal_meetup_arr[1] ); ?>">
                                                <i class="fa <?php echo esc_attr( $socal_meetup_arr[1] ); ?>"></i>
                                            </span>
                                        </a>

                                <?php endfor; ?>

                            </div>
                        </div>
                        <div class="author-info">
                            <h3>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'))?>">
                                    <?php the_author();?>
                                </a>
                                <span class="tz_author_meetup">
                                        <?php esc_html_e('author', 'maniva-meetup'); ?>
                                </span>
                            </h3>
                            <p><?php the_author_meta('description'); ?></p>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <!-- End Author -->

            <!-- Start Related Posts -->
            <?php if ( $maniva_meetup_on_off_Related_Post == 'on' ) : ?>

                <div class="tz_meetup_related_posts">
                    <h4>
                        <?php esc_html_e('Related Posts', 'maniva-meetup'); ?>
                    </h4>
                    <div class="tz_meetup_related_posts_content">
                        <div class="row">

                            <?php
                            if ( is_single() ) :

                                $categories = get_the_category();

                                if ( $categories ) :
                                    foreach ( $categories as $cate ) {
                                        $cat = $cate->term_id;
                                    }

                                    $maniva_meetup_args = array(
                                        'cat'               => $cat,
                                        'post__not_in'      => array( get_the_ID() ),
                                        'posts_per_page'    => 4,
                                        'orderby'           => 'date',
                                        'order'             => 'desc',
                                    );
                                    $maniva_meetup_my_query = null;
                                    $maniva_meetup_my_query = new WP_Query( $maniva_meetup_args );

                                    if ( $maniva_meetup_my_query->have_posts() ):
                                        while ( $maniva_meetup_my_query->have_posts() ) :
                                            $maniva_meetup_my_query->the_post();

                                            $maniva_meetup_item_type        =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_type', TRUE );
                                            $maniva_meetup_image            =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_fullsize_image', TRUE );
                                            $maniva_meetup_slideshows       =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_slideshows',true );
                                            $maniva_meetup_bgvideo_image    =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_bgvideo_image',true );
                                            $maniva_meetup_video_type       =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_video_type',true );
                                            $maniva_meetup_video_id         =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_video',true );
                                            $maniva_meetup_soundcloud_id    =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_soundCloud_id',true );
                                            $maniva_meetup_quote            =   get_post_meta( get_the_ID(), 'maniva-meetup' . '_portfolio_Quote_Autor', true );
                                            $maniva_meetup_img_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                            ?>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <!-- Recent blog start -->
                                                <article class="tz-blog-item">
                                                    <div class="tz-blog-thubnail-item tz-blog-thubnail-item-img">


                                                        <?php if ( $maniva_meetup_item_type == 'video' ) : ?>

                                                            <div class="tz-blogVideo-related">

                                                                <?php if( $maniva_meetup_video_type == 'youtube' ) : ?>

                                                                    <iframe  class="iframe-full"
                                                                             src="http://www.youtube.com/embed/<?php echo esc_attr($maniva_meetup_video_id); ?>?hd=1&amp;wmode=opaque">
                                                                    </iframe>

                                                                <?php else: ?>

                                                                    <iframe class="iframe-full" src="http://player.vimeo.com/video/<?php echo esc_attr($maniva_meetup_video_id) ; ?>" allowFullScreen>
                                                                    </iframe>

                                                                <?php endif; ?>

                                                            </div>

                                                        <?php elseif ( $maniva_meetup_item_type == 'audio' ) : ?>

                                                            <div class="tz-blogAudio-related">
                                                                <iframe  class="iframe-full-audio" allowfullscreen="" src="http://w.soundcloud.com/player/?url=http://api.soundcloud.com/tracks/<?php echo esc_attr($maniva_meetup_soundcloud_id); ?>&amp;show_artwork=true&amp;auto_play=false&amp;sharing=true&amp;buying=true&amp;download=true&amp;show_user=true&amp;show_playcount=true&amp;show_comments=true&amp;visual=true">
                                                                </iframe>

                                                            </div>

                                                        <?php else: ?>

                                                            <?php
                                                            if ( has_post_thumbnail() ) :
                                                                the_post_thumbnail('large' );
                                                            else:
                                                                echo '<img src="'.get_template_directory_uri().'/images/noimage.jpg" alt="'.esc_html__('noimage','maniva-meetup').'" />';
                                                            endif;
                                                            ?>

                                                        <?php endif; ?>

                                                        <?php if ( $maniva_meetup_item_type != 'slideshows' && $maniva_meetup_item_type != 'video' && $maniva_meetup_item_type != 'audio'  ) : ?>

                                                            <div class="tz-blog-icon-item-img">
                                                                <div class="ds-table">
                                                                    <div class="ds-table-cell">
                                                                        <?php if ( $maniva_meetup_img_thumbnail !='' ) : ?>
                                                                            <a href="<?php echo esc_url($maniva_meetup_img_thumbnail);?>" data-rel="prettyPhoto[worksGallery]">
                                                                                <i class="fa fa-search"></i>
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <a href="<?php echo get_template_directory_uri().'/images/noimage.jpg' ;?>" data-rel="prettyPhoto[worksGallery]">
                                                                                <i class="fa fa-search"></i>
                                                                            </a>
                                                                        <?php endif; ?>

                                                                        <a href="<?php the_permalink(); ?>">
                                                                            <i class="fa fa-link"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endif; ?>

                                                    </div>
                                                    <div class="tz-blog-thubnail-item tz-blog-thubnail-item-content">

                                                        <span class="entry-blog-meta">
                                                            <small class="tzinfomation_time">
                                                                <?php the_time(get_option('date_format')); ?>
                                                            </small>
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>">
                                                                <i>|</i>
                                                                <?php esc_html_e('by', 'maniva-meetup'); ?>  <?php the_author();?>
                                                            </a>
                                                        </span>
                                                        <h4>
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php echo wp_trim_words( get_the_title(), 8, '...' ); ?>
                                                            </a>
                                                        </h4>

                                                        <?php
                                                        if ( !empty( $post->post_excerpt ) ) :
                                                            echo '<p>'. wp_trim_words( get_the_excerpt(), 15, '...' ) .'</p>';
                                                        else:
                                                            echo '<p>'. wp_trim_words( get_the_content(), 15, '...' ) .'</p>';
                                                        endif;
                                                        ?>

                                                        <small class="tz_meetup_single_comment">
                                                            <?php
                                                            comments_popup_link( '0 <i class="fa fa-comment"></i>','1 <i class="fa fa-comment"></i>', '% <i class="fa fa-comment"></i>' );
                                                            ?>
                                                        </small>

                                                    </div>
                                                </article>
                                                <!-- Recent blog end -->
                                            </div>

                            <?php
                                        endwhile;
                                    endif;
                                    wp_reset_postdata();
                                endif;
                            endif;
                            ?>

                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <!-- End Related Posts -->

            <!-- Start Comments -->
            <?php if ( (comments_open() || get_comments_number()) && $maniva_meetup_on_off_comment_form == 'on' ) : ?>

                <div class="tzComments">
                    <?php comments_template( '', true ); ?>
                </div>

            <?php endif; ?>
            <!-- End Comments -->

            <!-- Start Pre Next -->
            <?php if ( $maniva_meetup_on_off_pre_next == 'on' ) : ?>

                <div class="tzpost-pagenavi">
                    <?php previous_post_link('%link','<i class="fa fa-long-arrow-left"></i>'.'<span>'.esc_html__('previous post', 'maniva-meetup').'</span>' ); ?>
                    <?php next_post_link('%link', '<span>'.esc_html__('next post', 'maniva-meetup').'</span>'.'<i class="fa fa-long-arrow-right"></i>' ); ?>
                </div>

            <?php endif; ?>
            <!-- End Pre Next -->

        </div>

        <?php

            if($maniva_meetup_tzSidebar == 'show'):
                get_sidebar();
            endif;

        ?>

    </div>
</section>

<?php if ( $maniva_meetup_slider_client_blog == 'show' && $maniva_meetup_slideshows_blog !='' ) : ?>

    <section class="maniva_meetup_slider_blog">

        <?php
        get_template_part('template_inc/inc','slider-blog');
        ?>

    </section>

<?php endif; ?>

<?php


get_footer();
?>