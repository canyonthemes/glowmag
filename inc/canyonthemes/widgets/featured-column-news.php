<?php
if (!class_exists('GlowMag_Featured_Column_News_Widget')) {
    
    class GlowMag_Featured_Column_News_Widget extends WP_Widget
    
    {

        private function defaults()
    
        {

            $defaults = array(
                'title'             => esc_html__( 'Latest News','glowmag' ),
                'cat_id'            => '',
                'view_all_text'     => esc_html__( 'View All', 'glowmag' ),
                'excerpt_length'    => 20,
                'post_number'       => 5,
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'glowmag-featured-column-news-widget',
             
                esc_html__('GlowMag Featured Column News ', 'glowmag'),
                array('description' => esc_html__( 'Widget To big image at left and small image at right.', 'glowmag' ))
            );
        }

        public function widget($args, $instance)
    
        {

            if ( !empty( $instance ))

            {
                $instance       = wp_parse_args((array )$instance, $this->defaults());
              
                $title          = apply_filters( 'widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base);
               
                $catid          = absint($instance['cat_id']);
              
                $view_all_text  = esc_html( $instance['view_all_text'] );
               
                $excerpt_length = absint( $instance['excerpt_length'] );
               
                $no_of_post     = absint($instance['post_number']);
               
                $category       = get_category( $catid );
               
                if($catid != -1)
                {
                    
                    $count = $category->category_count;
                
                }
                else
                
                {
                   $count=0;
                
                }

                
                echo $args['before_widget'];

                if ($count > 0) {
                    
                    ?>
                 
                 <!--latest post-->
                        <div class="news-by_category">
                      
                          <?php if(!empty($title)) { ?> 
                            
                               <h3 class="main-title"><?php echo $title; ?></h3>
                           
                            <?php } 
                         
                            if (!empty($catid)) 
                              
                                {
                                    $feature_args = array(
                                                'cat'                     => $catid,
                                                'posts_per_page'          => ( $no_of_post ),
                                                'no_found_rows'           => true,
                                                'post__not_in'            => get_option( 'sticky_posts' ),
                                                'ignore_sticky_posts'     => true,
                                            );    
                                }
                                            
                                else
                               
                                {
                                     $feature_args = array(
                                               'posts_per_page'         => ( $no_of_post ),
                                                'no_found_rows'         => true,
                                                'post__not_in'          => get_option( 'sticky_posts' ),
                                                'ignore_sticky_posts'   => true,
                                            );  

                                }


                            $feature_colm_posts = new WP_Query( $feature_args );
                         
                            if ( $feature_colm_posts->have_posts() ) :

                                $colm_count = 1;
                            ?> 
                            <div class="row">
                              
                                <?php
                             
                                 while ( $feature_colm_posts->have_posts() ) :

                                    $feature_colm_posts->the_post(); 

                                    if( 1 == $colm_count ) { ?>
  
                                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.2s">
                                            
                                            <div class="column-post">
                                               
                                                <a href="<?php the_permalink(); ?>" class="img-thumbnail"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></a>
                                               
                                                <div class="topic"> 
                                                
                                                    <?php glowmag_blog_list(); ?>
                                                
                                                    <h4><a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?></a></h4>
                                                 
                                                   <p><?php 
                                                     
                                                    $content =  wp_trim_words(get_the_excerpt(),$excerpt_length) ;
                                                      
                                                     echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';

                                                    ?></p>
                                                   
                                                    <ul class="post-tools">
                                                    
                                                      <li> <?php esc_html_e( 'by','glowmag' ); ?> 
                                                          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
                                                          <strong> <?php the_author(); ?></strong> </a>
                                                      </li>
                                                    
                                                      <li>  <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
                                                          
                                                      </li>
                                                    <li>
                                                        <a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?>
                                                        </a> 
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                   else
                                   {

                                   
                                      if( $colm_count==2 )
                                    { 

                                ?>

                                        <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.4s">
                                  
                              <?php }
                                    
                                         $image_id = get_post_thumbnail_id();
                                         $image_url = wp_get_attachment_image_src($image_id,'thumbnail',true);

                                ?>              

                                        <div class="media">
                                            
                                            <div class="media-left">
                                             
                                                <a href="<?php the_permalink(); ?>"> 
                                              
                                                <img class="media-object" src="<?php echo $image_url[0];   ?>" width="150" alt="...">
                                              </a>
                                          
                                            </div>
                                           
                                            <div class="media-body">
                                              
                                                <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title();?> </a></h4>
                                             
                                                <ul class="post-tools">
                                                
                                                  <li> <?php esc_html_e( 'by','glowmag' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong> <?php the_author(); ?></strong> </a>
                                                  </li>
                                                
                                                  <li>  <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> </li>
                                                  <li>
                                                    <a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a> 
                                                  </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--media-->
                                               
                             <?php 
                             }
                           
                                                         
                                 $colm_count++;

                                endwhile; 

                                wp_reset_postdata(); ?>  

                            </div>

                        <?php endif; ?>  
                        </div> 
                        </div>
                        <!--latest post end--> 
                 

                    <?php
                }
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
       
        {
            $instance = $old_instance;
           
            $instance['title']           = sanitize_text_field( $new_instance['title'] );
           
            $instance['cat_id']          = absint( $new_instance['cat_id'] );
          
            $instance['view_all_text']   = sanitize_text_field( $new_instance['view_all_text'] );
           
            $instance['excerpt_length']  = absint( $new_instance['excerpt_length'] );
          
            $instance['post_number']     = absint( $new_instance['post_number'] );
            return $instance;
        }

        public function form($instance)
        {
            $instance        =  wp_parse_args((array )$instance, $this->defaults());
            $title           =  $instance['title'] ;
            $catid           =  $instance['cat_id'] ;
            $view_all_text   =  $instance['view_all_text'] ;
            $excerpt_length  =  $instance['excerpt_length'] ;
            $no_of_post      =  $instance['post_number'];
            ?>
   

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'glowmag' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
            </p>
           
            <hr/>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>"><?php esc_html_e('Select Category', 'glowmag'); ?></label><br/>
                <?php
                $cat_dropown = array(
                    'show_option_none' => esc_html__('Select Category', 'glowmag'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr( $this->get_field_name('cat_id')),
                    'id' => esc_attr( $this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                
                wp_dropdown_categories($cat_dropown);
                
                ?>
            </p>
            <hr/>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>"><strong><?php esc_html_e( 'View All Text:', 'glowmag' ); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'view_all_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'view_all_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['view_all_text'] ); ?>" />
                
            </p>

            <hr/>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
                    <?php esc_html_e('Excerpt Length:', 'glowmag'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
            </p>

            <hr/>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('no_of_post')); ?>"><strong><?php esc_html_e('No Of Post To Display', 'glowmag'); ?></strong></label><br/>
                <?php
                $this->glowmag_post_number( array(
                    'id'       => $this->get_field_id( 'post_number' ),
                    'name'     => $this->get_field_name( 'post_number' ),
                    'selected' => absint( $instance['post_number'] ),
                    )
                );
                ?>
            </p>
     
            <?php
        }


        function glowmag_post_number( $args ) {
            $defaults = array(
                'id'       => '',
                'name'     => '',
                'selected' => 0,
            );

            $result = wp_parse_args( $args, $defaults );
            $output = '';

            $choices = array(
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
            );

            if ( ! empty( $choices ) ) {

                $output = "<select name='" . esc_attr( $result['name'] ) . "' id='" . esc_attr( $result['id'] ) . "'>\n";
                foreach ( $choices as $key => $choice ) {
                    $output .= '<option value="' . esc_attr( $key ) . '" ';
                    $output .= selected( $result['selected'], $key, false );
                    $output .= '>' . esc_html( $choice ) . '</option>\n';
                }
                $output .= "</select>\n";
            }

            echo $output;
        }
    

  }

  }  



add_action('widgets_init', 'GlowMag_Featured_Column_News_widget');
function GlowMag_Featured_Column_News_widget()
{
    register_widget('GlowMag_Featured_Column_News_Widget');

}