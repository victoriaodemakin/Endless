<?php
/**
 * Initialize the meta boxes.
 */

add_action( 'admin_init', 'maniva_meetup_custom_meta_boxes' );

/*
 * Methor add meta boxes for custom post type
 */
function maniva_meetup_custom_meta_boxes(){

    /**
     * Create a custom meta boxes array that we pass to
     * the OptionTree Meta Box API Class.
     */

    $portfolio_meta_box =   array(
        'id'          =>  'portfolio_meta_box',
        'title'       =>  esc_html__('Porfolio Option','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'portfolio'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(

            array(
                'label'     => esc_html__('Feature Image PNG','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_feature_imagepng',
                'type'      => 'upload',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'portfolioImage'
            ),

            array(
                'label'     => esc_html__('Is Featured ?','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_featured',
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'no',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes','maniva-meetup'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No','maniva-meetup'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'label'     =>  esc_html__('Portfolio Type','maniva-meetup'),
                'id'        =>  'maniva-meetup' . '_portfolio_type',
                'type'      =>  'select',
                'desc'      =>  esc_html__('Option type potfolio','maniva-meetup'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('None','maniva-meetup'),
                    ),
                    array(
                        'value' => 'images',
                        'label' => esc_html__('Images','maniva-meetup'),
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' => esc_html__('Slideshows','maniva-meetup'),
                    ),
                    array(
                        'value' => 'video',
                        'label' => esc_html__('Video','maniva-meetup'),
                    ),
                    array(
                        'value' => 'audio',
                        'label' => esc_html__('Audio','maniva-meetup'),
                    ),
                ),

            ),

            array(
                'label'     => esc_html__('Full Size Image','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_fullsize_image',
                'type'      => 'upload',
                'desc'      => esc_html__('This is the full size image.','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'portfolioImage'
            ),
            array(
                'label'     => esc_html__('Slideshow','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'maniva-meetup' . '_portfolio_slideshow_item',
                        'label'     => esc_html__('Image','maniva-meetup'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(

                'id'        => 'maniva-meetup' . '_portfolio_video_type',
                'label'     => esc_html__('Video Type','maniva-meetup'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',

                'choices' =>  array(
                    array(
                        'value'   =>  'youtube',
                        'label'   =>  esc_html__('Youtube','maniva-meetup'),
                    ),
                    array(
                        'value'  =>  'vimeo',
                        'label'   =>  esc_html__('vimeo','maniva-meetup'),
                    ),
                ),

            ),

            array(
                'label'     => esc_html__('Video ID','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_video',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '4',
            ),

            array(
                'label'     => esc_html__('SoundCloud ID','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the SoundCloud','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),


        )
    );

    $post_meta_box =   array(
        'id'          =>  'post_meta_box',
        'title'       =>  esc_html__('Post Option','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     => esc_html__('Is Featured ?','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_featured',
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'no',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   => array(
                    array(
                        'value' => 'yes',
                        'label' => esc_html__('Yes','maniva-meetup'),
                        'src'   => ''
                    ),
                    array(
                        'value' => 'no',
                        'label' => esc_html__('No','maniva-meetup'),
                        'src'   => ''
                    )
                ),
            ),
            array(
                'label'     =>  esc_html__('Post Type','maniva-meetup'),
                'id'        =>  'maniva-meetup' . '_portfolio_type',
                'type'      =>  'select',
                'desc'      =>  esc_html__('Option type Post','maniva-meetup'),
                'std'       =>  'none',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => '',
                'choices'   =>  array(
                    array(
                        'value' => 'none',
                        'label' => esc_html__('None','maniva-meetup'),
                    ),
                    array(
                        'value' => 'images',
                        'label' => esc_html__('Images','maniva-meetup'),
                    ),
                    array(
                        'value' => 'slideshows',
                        'label' => esc_html__('Slideshows','maniva-meetup'),
                    ),
                    array(
                        'value' => 'video',
                        'label' => esc_html__('Video','maniva-meetup'),
                    ),
                    array(
                        'value' => 'audio',
                        'label' => esc_html__('Audio','maniva-meetup'),
                    ),
                    array(
                        'value' => 'quote',
                        'label' => esc_html__('Quote','maniva-meetup'),
                    )
                ),

            ),

            array(
                'label'     => esc_html__('Full Size Image','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_fullsize_image',
                'type'      => 'upload',
                'desc'      => esc_html__('This is the full size image.','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'portfolioImage'
            ),
            array(
                'label'     => esc_html__('Slideshow','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_slideshows',
                'type'      => 'list-item',
                'desc'      => '',
                'class'     => 'portfolio-slideshows',
                'settings'  => array(
                    array(
                        'id'        => 'maniva-meetup' . '_portfolio_slideshow_item',
                        'label'     => esc_html__('Image','maniva-meetup'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    )
                )
            ),
            array(

                'id'        => 'maniva-meetup' . '_portfolio_video_type',
                'label'     => esc_html__('Video Type','maniva-meetup'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',

                'choices' =>  array(
                    array(
                        'value'   =>  'youtube',
                        'label'   =>  esc_html__('Youtube','maniva-meetup')
                    ),
                    array(
                        'value'  =>  'vimeo',
                        'label'   => esc_html__('vimeo','maniva-meetup'),
                    ),
                ),

            ),

            array(
                'label'     => esc_html__('Video ID','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_video',
                'type'      => 'textarea',
                'desc'      => '',
                'std'       => '',
                'rows'      => '4',
            ),

            array(
                'label'     => esc_html__('SoundCloud ID','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_soundCloud_id',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the SoundCloud','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'SoundCloudImage'
            ),

            array(
                'label'     => esc_html__('Quote Author','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_Quote_Autor',
                'type'      => 'text',
                'desc'      => esc_html__('Only use for the quote','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'Quote_Autor'
            ),

            array(
                'label'     => esc_html__('Link Title','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_Link_Title',
                'type'      => 'text',
                'desc'      => esc_html__('Link title','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'Link_Title'
            ),
            array(
                'label'     => esc_html__('Link Url','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_portfolio_Link_Url',
                'type'      => 'text',
                'desc'      => esc_html__('Link title','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'Link_Url'
            ),
        )
    );

    $blogMasonry_meta_box =   array(
        'id'          =>  'blogMasonry_meta_box',
        'title'       =>  esc_html__('Blog Masonry Option','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id' =>  'maniva-meetup'.'_blogMasonry_column',
                'label'     => esc_html__('Config Blog Masonry Column','maniva-meetup'),
                'desc'      => '------------------',
                'std'       => '',
                'type'      => 'textblock-titled',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_desktop',
                'label'     => esc_html__('Desktop column','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '3',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_tabletportrait',
                'label'     => esc_html__('Tablet Portrait Column','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_mobilelandscape',
                'label'     => esc_html__('Mobile Landscape Column','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_mobile',
                'label'     => esc_html__('Mobile Portrait Column','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  '1',
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  '2',
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  '3',
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  '4',
                    ),
                )
            ),

            array(
                'id'        => 'maniva-meetup'.'_blogMasonry_catid',
                'label'     => esc_html__('Category Blog','maniva-meetup'),
                'desc'      => esc_html__('Choose category blog','maniva-meetup'),
                'std'       => '',
                'type'      => 'taxonomy-checkbox',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => 'category',
                'class'     => ''
            ),
            array(
                'id'        => 'maniva-meetup'.'_blogMasonry_limit',
                'label'     => esc_html__('Limit Blog','maniva-meetup'),
                'desc'      => esc_html__('Limit Blog','maniva-meetup'),
                'std'       => '10',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_orderby',
                'label'     => esc_html__('Orderby','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  'date',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'date',
                        'label' =>  esc_html__('Date','maniva-meetup'),
                    ),
                    array(
                        'value' =>  'title',
                        'label' =>  esc_html__('Title','maniva-meetup'),
                    ),
                    array(
                        'value' =>  'id',
                        'label' =>  esc_html__('ID','maniva-meetup'),
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_blogMasonry_order',
                'label'     => esc_html__('Order','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  'desc',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  'desc',
                        'label' =>  esc_html__('Z ---> A','maniva-meetup'),
                    ),
                    array(
                        'value' =>  'asc',
                        'label' =>  esc_html__('A ---> Z','maniva-meetup'),
                    ),
                )
            ),

        ) // end fields
    );

    $page_home =   array(
        'id'          =>  'page_home',
        'title'       =>  esc_html__('Option Of Home Page','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id'        =>  'maniva-meetup'.'_footerHome_type',
                'label'     => esc_html__('Footer Type','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '2',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  esc_html__('Type 1 - One Column Center','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  esc_html__('Type 2 - Multi column','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  esc_html__('Type 3 - One Column Center & Multi column','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '4',
                        'label' =>  esc_html__('Type 4 - Footer Single','maniva-meetup'),
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_styleHome_type',
                'label'     => esc_html__('Home style','maniva-meetup'),
                'desc'      =>  'Select style for Homepage',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  esc_html__('Default','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  esc_html__('Home 8','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '3',
                        'label' =>  esc_html__('Home 9','maniva-meetup'),
                    ),
                )
            ),
        ) // end fields
    );

    $page_default =   array(
        'id'          =>  'page_default',
        'title'       =>  esc_html__('Option Footer Of Page Default','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'id'        =>  'maniva-meetup'.'_PageDefault_width',
                'label'     => esc_html__('Option Width of Page','maniva-meetup'),
                'desc'      =>  '',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  esc_html__('In Grid','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  esc_html__('Full Width','maniva-meetup'),
                    ),
                )
            ),
            array(
                'id'        =>  'maniva-meetup'.'_PageDefault_Padding',
                'label'     => esc_html__('Option Padding of Page','maniva-meetup'),
                'desc'      =>  'Choose default padding or customer padding.If you choose customer,you can set padding top and padding bottom of page content.',
                'sdt'       =>  '1',
                'type'      =>  'select',
                'class'     =>  '',
                'choices'   =>  array(
                    array(
                        'value' =>  '1',
                        'label' =>  esc_html__('Default','maniva-meetup'),
                    ),
                    array(
                        'value' =>  '2',
                        'label' =>  esc_html__('Customer','maniva-meetup'),
                    ),
                )
            ),
            array(
                'id'        => 'maniva-meetup'.'_PageDefault_paddingTop',
                'label'     => esc_html__('Padding Top(px)','maniva-meetup'),
                'desc'      => esc_html__('You can set padding top for page content. Default:100px','maniva-meetup'),
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'maniva-meetup'.'_PageDefault_paddingBottom',
                'label'     => esc_html__('Padding Bottom(px)','maniva-meetup'),
                'desc'      => esc_html__('You can set padding bottom for page content. Default:100px','maniva-meetup'),
                'std'       => '',
                'type'      => 'text',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'        => 'maniva-meetup' . '_PageDefault_slideshows_show',
                'label'     => esc_html__('Show hide slider client','maniva-meetup'),
                'type'      => 'select',
                'desc'      => '',
                'std'       => 'hide',
                'section'   => 'TZBlog',
                'choices'   =>  array(
                    array(
                        'value' =>  'hide',
                        'label' =>  esc_html__('Hide','maniva-meetup'),
                    ),
                    array(
                        'value' =>  'show',
                        'label' =>  esc_html__('Show','maniva-meetup'),
                    ),
                ),
            ),
            array(
                'id'        => 'maniva-meetup' . '_PageDefault_background_image_slider_client',
                'label'     => esc_html__('Image Background slider client','maniva-meetup'),
                'std'       => '',
                'type'      => 'upload',
                'section'   => 'TZBlog',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => ''
            ),
            array(
                'id'          => 'maniva-meetup' . '_PageDefault_item_slideshows_client',
                'label'       => esc_html__( 'Number item slider', 'maniva-meetup' ),
                'type'        => 'numeric-slider',
                'std'         => 5,
                'section'     => 'TZBlog',
                'min_max_step'=> '1,100',
            ),
            array(
                'label'     => esc_html__('Slides Client','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_PageDefault_slideshows',
                'type'      => 'list-item',
                'section'   => 'TZBlog',
                'class'     => '',
                'settings'  => array(
                    array(
                        'id'        => 'maniva-meetup' . '_PageDefault_slideshow_item',
                        'label'     => esc_html__('Image','maniva-meetup'),
                        'type'      => 'upload',
                        'class'     => 'portfolio-slideshow-item',
                    ),
                    array(
                        'label'     => esc_html__('Link image client','maniva-meetup'),
                        'id'        => 'maniva-meetup' . '_PageDefault_slideshow_item_link',
                        'type'      => 'text',
                        'class'     => '',
                    ),
                )
            ),
        ) // end fields
    );

    $tribe_events_default =   array(
        'id'          =>  'tribe_events_default',
        'title'       =>  esc_html__('Option tribe events Default','maniva-meetup'),
        'desc'        =>  '',
        'pages'       => array( 'tribe_events'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'     => esc_html__('Image Slide use of slide event element','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_tribe_events_slide_image',
                'type'      => 'upload',
                'desc'      => esc_html__('This is Slide image of element slide event (1920x770).','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'tribe_events_image'
            ),
            array(
                'label'     => esc_html__('Thumbnail Image use of slide event element','maniva-meetup'),
                'id'        => 'maniva-meetup' . '_tribe_events_thumbnail_image',
                'type'      => 'upload',
                'desc'      => esc_html__('This is Thumbnail image of element slide event (360x200).','maniva-meetup'),
                'std'       => '',
                'rows'      => '',
                'post_type' => '',
                'taxonomy'  => '',
                'class'     => 'tribe_events_image'
            ),
            array(
                'label'       => __( 'Schedule', 'maniva-meetup' ),
                'id'          => 'maniva-meetup-schedule-event',
                'type'        => 'textarea',
                'desc'        => __( 'Please enter your event schedule, separated by new line.', 'maniva-meetup' )
            )
        ) // end fields
    );

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    ot_register_meta_box( $portfolio_meta_box );

    ot_register_meta_box( $post_meta_box );

    ot_register_meta_box( $blogMasonry_meta_box );

    ot_register_meta_box( $page_home );
    ot_register_meta_box( $page_default );

    ot_register_meta_box( $tribe_events_default );

}
?>