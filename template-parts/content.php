<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlowMag
 */

$show_date         = glowmag_get_option( 'blog_show_date' );
$show_time         = glowmag_get_option( 'blog_show_post_time' );
$show_author       = glowmag_get_option( 'blog_show_author' );
$show_category     = glowmag_get_option( 'blog_show_category' );
$show_comments     = glowmag_get_option( 'blog_show_comments' );
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

	       <?php
	       	if( $show_category == 1 )
	       	{

	          glowmag_blog_list(); 

	       	}

	        the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
	        <ul class="post-tools">
	           <?php 
	                 
	                if( $show_date == 1 )
	             
	                { ?>
	                  
	                   <li> <?php  glowmag_posted_on(); ?>

	                    </li>

	                <?php } 

                    if( $show_author == 1 )
	             
	                { 

	                ?>  
				         
				        <li> <?php esc_html_e( 'by' ,'glowmag' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong> <?php the_author(); ?></strong> </a></li>

				   <?php

				    }

				    if( $show_time == 1 )
	             
	                {

				   ?>       
				        <li> <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> </li>
				   <?php

				   	}

				   	if( $show_comments == 1 )
                    
                    {

				    ?>
				        <li><a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a> </li>
				  <?php
				  
				  	} 

				   ?>        

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
