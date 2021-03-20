<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <div class="tz-Comment">
            <span class="TzCommentTitle">
                <?php echo get_comments_number();?>&nbsp;<?php esc_html_e('Comments','maniva-meetup');?>
            </span>
            <ol class="commentlist">
                <?php wp_list_comments( array( 'callback' => 'maniva_meetup_comment', 'style' => 'ol' ) ); ?>
            </ol><!-- .commentlist -->

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
                <nav id="comment-nav-below" class="navigation" role="navigation">
                    <h1 class="assistive-text section-heading"><?php esc_html_e( 'Comment navigation', 'maniva-meetup' ); ?></h1>
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'maniva-meetup' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'maniva-meetup' ) ); ?></div>
                </nav>
            <?php endif; // check for comment navigation ?>

            <?php
            /* If there are no comments and comments are closed, let's leave a note.
             * But we only want the note on posts and pages that had comments in the first place.
             */
            if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="nocomments"><?php esc_html_e( 'Comments are closed.' , 'maniva-meetup' ); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; // have_comments() ?>

    <?php
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $args = array(

        'fields' => apply_filters( 'comment_form_default_fields',
            array(

                'comment_notes_before' => '<div class="row">',

                'author' => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-comment-item"><i class="fa fa-user"></i><input id="author" placeholder="'.esc_html__('Your Name...','maniva-meetup').'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div></div>',

                'email' => '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><div class="form-comment-item"><i class="fa fa-envelope"></i><input id="email" placeholder="'.esc_html__('Email Address...','maniva-meetup').'" class="form-control" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',

                'comment_notes_after' => '</div>',

            )
        ),


        'comment_field' => '<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="form-comment-item"><i class="fa fa-comment"></i><textarea rows="5" id="comment" placeholder="'.esc_html__('Your Comment...','maniva-meetup').'" name="comment" class="form-control"></textarea></div></div></div><div class="clearfix"></div>',



    );

    comment_form( $args );

    ?>
</div><!-- #comments .comments-area -->