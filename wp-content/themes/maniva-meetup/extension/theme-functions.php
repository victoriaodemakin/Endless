<?php

    function maniva_meetup_get_social_url(){
        $social_networks = maniva_meetup_get_social_network();

        echo"<ul>";
        foreach($social_networks as $social) {
            $social_url = ot_get_option('maniva-meetup' . '_social_network_' . $social['id']);
            if($social_url) {
                ?>

            <li>
                <a target="_blank" href="<?php echo esc_url($social_url); ?>"><i class="fa fa-<?php echo esc_attr($social['id']); ?>"></i></a>
            </li>

            <?php
            }
        }
        echo"</ul>";
    }

    function maniva_meetup_get_social_header_3_url(){
        $social_networks = maniva_meetup_get_social_network();

        foreach($social_networks as $social) {
            $social_url = ot_get_option('maniva-meetup' . '_social_network_' . $social['id']);
            if($social_url) {
                ?>

                <li>
                    <a target="_blank" href="<?php echo esc_url($social_url); ?>"><i class="fa fa-<?php echo esc_attr($social['id']); ?>"></i></a>
                </li>

                <?php
            }
        }
    }


    function maniva_meetup_get_social_network(){
        return array(
            array('id' => 'facebook', 'title' => 'Facebook'),
            array('id' => 'twitter', 'title' => 'Twitter'),
            array('id' => 'flickr', 'title' => 'Flickr'),
            array('id' => 'behance', 'title' => 'behance'),
            array('id' => 'instagram', 'title' => 'instagram'),
            array('id' => 'digg', 'title' => 'digg'),
            array('id' => 'dribbble', 'title' => 'Dribbble'),
            array('id' => 'dropbox', 'title' => 'Dropbox'),
            array('id' => 'google-plus', 'title' => 'Google Plus'),
            array('id' => 'linkedin', 'title' => 'linkedin'),
            array('id' => 'foursquare', 'title' => 'Foursquare'),
            array('id' => 'pinterest', 'title' => 'Pinterest'),
            array('id' => 'skype', 'title' => 'Skype'),
            array('id' => 'tumblr', 'title' => 'Tumblr'),
            array('id' => 'vimeo', 'title' => 'Vimeo'),
            array('id' => 'youtube', 'title' => 'Youtube'),
        );
    }

if ( ! function_exists( 'maniva_meetup_comment' ) ) :
    function maniva_meetup_comment( $comment, $args, $depth ) {
      $GLOBALS['comment'] = $comment;
      switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
          <p><?php esc_html__('Pingback:', 'maniva-meetup'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'maniva-meetup' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
          break;
        default :
          // Proceed with normal comments.
          global $post;
          ?>
          <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <header class="comment-meta comment-author vcard">
                            <?php echo get_avatar( $comment, 80 ); ?>
                        </header><!-- .comment-meta -->
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'maniva-meetup' ); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <div class="comment-content comment">
                            <div class="tz_comment_single_meetup pull-left">

                                <?php
                                printf( '<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( '- Post Author ', 'maniva-meetup' ) . '</span>' : ''
                                );
                                ?>

                                <?php
                                printf( '<a class="comments-datetime" href="%1$s"> '.esc_html__('Posted on', 'maniva-meetup').' <time datetime="%2$s">%3$s</time></a>',
                                    esc_url( get_comment_link( $comment->comment_ID ) ),
                                    get_comment_time( 'c' ),
                                    /* translators: 1: date, 2: time */
                                    sprintf(  '%1$s at %2$s' , get_comment_date('d M Y'), get_comment_time() )
                                );
                                ?>

                            </div>

                            <div class="tz-commentInfo pull-right">
                                <?php
                                edit_comment_link( esc_html__( 'Edit ', 'maniva-meetup' ) );
                                comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'maniva-meetup' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                                ?>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            comment_text();
                            ?>

                        </div><!-- .comment-content -->
                    </div>
                </div>

            </article><!-- #comment-## -->
          <?php
          break;
      endswitch; // end comment_type check
    }
  endif;

  if ( ! function_exists( 'maniva_meetup_content_nav' ) ) :
    /**
     * Displays navigation to next/previous pages when applicable.
     */
    function maniva_meetup_content_nav( $html_id ) {
      global $wp_query;

      $html_id = esc_attr( $html_id );

      if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav id="<?php echo esc_attr($html_id); ?>" class="plazart-navigation" role="navigation">
          <div class="nav-previous alignleft"><?php next_posts_link(  '<span class="meta-nav">&larr;&nbsp;</span>' .esc_html__('Older posts', 'maniva-meetup') ); ?></div>
          <div class="nav-next alignright"><?php previous_posts_link( esc_html__('Newer posts','maniva-meetup'). '&nbsp;<span class="meta-nav">&rarr;</span>' ); ?></div>
        </nav><!-- #<?php echo esc_attr($html_id); ?> .navigation -->
      <?php endif;
    }
  endif;