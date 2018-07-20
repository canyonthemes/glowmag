<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlowMag
 */
$show_readme_text  = glowmag_get_option( 'blog_read_more' );
$readmore_text     = glowmag_get_option( 'blog_read_more_text' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="column-post">
    	<?php if ( has_post_thumbnail() ) : ?>

      		    <a href="<?php the_permalink(); ?>" class="img-thumbnail">                           
      		     <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' )); ?>
      		    </a>

       <?php endif; ?>
        <div class="topic"> 
        <?php  glowmag_blog_list(); 

	        the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
	        <ul class="post-tools">
	                  
               <li> <?php  glowmag_posted_on(); ?>

                </li>

                <li> <?php esc_html_e( 'by' ,'glowmag' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong> <?php the_author(); ?></strong> </a></li>

		       
		        <li> <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> </li>
		   
		        <li><a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a> </li>
				         

	        </ul>
	        <p><?php the_excerpt(); ?> </p>
	        
	        <?php 
	         if( !empty( $readmore_text ) && $show_readme_text == 1  )
	         {

	         ?>
	            <a href="<?php the_permalink(); ?>" class="btn btn-red btn-sm"><?php echo esc_html( $readmore_text ); ?></a>
	        <?php 
	        
	         } 

	        ?>
	     
        </div>
    </div>
	<div class="entry-content">
		<?php
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glowmag' ),
				'after'  => '</div>',
			) );

		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-<?php the_ID(); ?> -->