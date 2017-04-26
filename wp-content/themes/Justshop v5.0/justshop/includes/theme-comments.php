<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Fist full of comments
if ( ! function_exists( 'custom_comment' ) ) {
	function custom_comment( $comment, $args, $depth ) {
	   $GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?>>

	    	<a name="comment-<?php comment_ID() ?>"></a>

	      	<div id="li-comment-<?php comment_ID() ?>" class="comment_container">

				<?php if( get_comment_type() == 'comment' ) { ?>
		             <div class="avatar"><?php echo get_avatar( $comment, apply_filters( 'woo_comment_avatar_size', $size = 88 ) ); ?></div>
	            <?php } ?>

	            <div class="comment-text">

		            <span class="name"><?php the_commenter_link(); ?></span>
			      	<div class="comment-head">

		                <span class="date"><?php echo get_comment_date( get_option( 'date_format' ) ); ?> <?php _e( 'at', 'templatation' ); ?> <?php echo get_comment_time( get_option( 'time_format' ) ); ?></span>
		                <span class="perma"><a href="<?php echo get_comment_link(); ?>" title="<?php esc_attr_e( 'Direct link to this comment', 'templatation' ); ?>">#</a></span>
		                <span class="edit"><?php edit_comment_link(__( 'Edit', 'templatation' ), '', '' ); ?></span>

					</div><!-- /.comment-head -->

			   		<div class="comment-entry"  id="comment-<?php comment_ID(); ?>">
					<?php comment_text(); ?>
					<?php if ( $comment->comment_approved == '0' ) { ?>
		                <p class='unapproved'><?php _e( 'Your comment is awaiting moderation.', 'templatation' ); ?></p>
		            <?php } ?>

					</div><!-- /comment-entry -->

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- /.reply -->

				</div><!--/.comment-text-->

			</div><!-- /.comment-container -->

	<?php
	} // End custom_comment()
}

// PINGBACK / TRACKBACK OUTPUT
if ( ! function_exists( 'list_pings' ) ) {
	function list_pings( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment; ?>

		<li id="comment-<?php comment_ID(); ?>">
			<span class="author"><?php comment_author_link(); ?></span> -
			<span class="date"><?php echo get_comment_date( get_option( 'date_format' ) ); ?></span>
			<span class="pingcontent"><?php comment_text(); ?></span>

	<?php
	} // End list_pings()
}

if ( ! function_exists( 'the_commenter_link' ) ) {
	function the_commenter_link() {
	    $commenter = get_comment_author_link();
	    if ( preg_match( '/]* class=[^>]+>/', $commenter ) ) {$commenter = preg_replace( '(]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else { $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );}
	    echo $commenter ;
	} // End the_commenter_link()
}


?>