<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlowMag
 */
$user_ID    = $post->post_author;
$udata      = get_userdata( $user_ID );
$registered = $udata->user_registered;
?>

<div class="authorbox <?php echo ( 1 != get_option( 'show_avatars' ) ) ? 'no-author-avatar' : ''; ?>">
  <div class="author-bg">
    <div class="tg-author">
        <div class="tg-authorbox">
	        <figure class="tg-authorimg"><?php echo ( get_avatar( get_the_author_meta( 'user_email' ), '80', '' )); ?></figure>
	        <div class="tg-authorhead">
	          <div class="tg-leftarea">
	            <h3 class="author-name"><?php  the_author_posts_link(); ?></h3>
	            <span><?php esc_html_e( 'Author Since:','glowmag' ) ?> <?php echo date( "M d, Y", strtotime( $registered ) );?></span>
	          </div>
	         
	        </div>
	        <div class="tg-description">
	          <p><?php the_author_meta( 'description' ); ?></p>
	        </div>
        </div>

  </div>
</div> 
</div> 
