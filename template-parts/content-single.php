<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GlowMag
 */
$post_id            = get_the_ID();
$categories         = get_the_category( $post_id );
$show_date          = glowmag_get_option( 'single_show_date' );
$show_time          = glowmag_get_option( 'single_show_post_time' );
$show_author        = glowmag_get_option( 'single_show_author' );
$show_category      = glowmag_get_option( 'single_show_category' );
$show_comments      = glowmag_get_option( 'single_show_comments' );
$show_featured_img  = glowmag_get_option( 'show_featured_img' );
$show_author_info   = glowmag_get_option( 'single_show_author_info' );
$related_post_text  = glowmag_get_option( 'realated_post_txt' );

?>
   <div class="single-post">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	             
                 
                        <div class="topic"> 
                            <?php
						       	if( $show_category == 1 )
						       	{

						          glowmag_blog_list(); 

						       	} ?>
	                            <h3><?php the_title(); ?></h3>
	                          
	                            <ul class="post-tools">

		                          	<?php    
		                               
		                               if( $show_date == 1 )
			             
			                			{ 

			                			?>
			                  
						                	 <li> <?php  glowmag_posted_on(); ?> </li>

		                                <?php

		                                }
		                                
		                                if( $show_author == 1 )

		                                	{

		                                ?>

				                              <li> <?php esc_html_e('by','glowmag'); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong> <?php the_author(); ?></strong> </a></li>

				                      <?php } 

				                      		if( $show_time == 1 )

		                                	{

				                        ?>

				                              <li> <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></li>

				                      <?php 

				                            } 


				                            if( $show_comments == 1 )

		                                	{

				                      ?>
				                             
				                              <li><a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a> </li>
				                      <?php } ?>   
		                          
                                </ul>
                        </div>
                        <?php if ( has_post_thumbnail() && $show_featured_img == 1 )  : ?>

				      		    <a href="<?php the_permalink(); ?>" class="img-thumbnail">    
				      		        <?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
				      		    </a>

				       <?php endif; ?>
                        <div class="post-text">
                          
                            <?php the_content(); ?>
                        
                        </div>
                     
                        <?php 

                         the_post_navigation();

                          if( $show_author_info == 1 )
                          {
                          	  get_template_part( 'template-parts/content', 'author' );
                          }
                           
                        ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tag-list"> 
                                   <?php
										if( get_the_tag_list() )
										{
										    echo get_the_tag_list();
										}
									?>
                                </div>
                            </div>
                           
                        </div>
                       
 						<?php 
				      
			           
			             wp_link_pages( array(
			                'before' => '<div class="page-links">' . esc_html__( 'Pages:','glowmag' ),
			                'after'  => '</div>',
			              ) );

			           if ( get_edit_post_link() ) : ?>
					        <footer class="entry-footer">
					          <?php
					            edit_post_link(
					              sprintf(
					                /* translators: %s: Name of current post */
					                esc_html__( 'Edit %s','glowmag'),
					                the_title( '<span class="screen-reader-text">"', '"</span>', false )
					              ),
					              '<span class="edit-link">',
					              '</span>'
					            );
					          ?>
					        </footer><!-- .entry-footer -->

					    <?php endif;

                         $count_number = get_comments_number();

                     
					      
					      ?>                     

	                        <div class="comments">
	                            <div>
	                                <!-- Nav tabs -->
	                                <ul class="nav nav-tabs" role="tablist">
	                                    <li role="presentation" class="active"><a href="#comment" aria-controls="home" role="tab" data-toggle="tab"> <?php comments_number(); ?> </a></li>
	                                    <li role="presentation"><a href="#l-comment" aria-controls="profile" role="tab" data-toggle="tab"><?php esc_html_e('Leave a Comment','glowmag');?></a></li>
	                                </ul>

	                                <!-- Tab panes -->
	                                <div class="tab-content">
	                                    <div role="tabpanel" class="tab-pane active" id="comment">
	                                     <?php
	                                     if ( comments_open() || get_comments_number() ) :
		                                     comments_template( '/tab-comments.php' );
	                                     endif;
	                                     ?>
                                        </div>
	                                    <div role="tabpanel" class="tab-pane" id="l-comment">
	                                        <div class="login">
	                                           
	                                           <?php comment_form();?>
	                                        
	                                        </div>
	                                    </div>
	                                </div>

	                            </div>
	                        </div>

	                 
                   

                <?php
                  if ($categories)
        			{
         	           $category_ids = array();
			            foreach ( $categories as $category )
			            {
			                $category_ids[]  = $category->term_id;
			                $category_name[] = $category->slug;
			            }
			            $realted_post_args   = array(
			                'category__in'        => $category_ids,
			                'post__not_in'        => array($post_id),
			                'post_type'           => 'post',
			                'posts_per_page'      => 3,
			                'post_status'         => 'publish',
			                'ignore_sticky_posts' => true
			            );
			           $realted_post_query = new WP_Query( $realted_post_args );
			           
			             if ( $realted_post_query->have_posts() ) :
			    ?>
		                   <h4 class="page-title"><?php echo $related_post_text; ?></h4>
		                    <div id="post-carousel" class="owl-carousel">
		                    	<?php
				                    while ($realted_post_query->have_posts()) :
				                         
				                         $realted_post_query->the_post(); ?>
				                        
				                        <div> 
				                            
				                            <div class="column-post">
								               
								               <a href="<?php the_permalink(); ?>" class="img-thumbnail">    
								      		        <?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
								      		    </a>

				                                <div class="topic">
				                                     <?php glowmag_blog_list(); ?>
				                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				                                </div>
				                            </div>
				                        </div><!--item-->

		                             <?php endwhile; wp_reset_postdata();?>
		                    
		            	   </div><!--post slider-->
		            <?php
		                    
		                 endif;    
                   }   

                   ?> 
               
					     
                

</div>    
