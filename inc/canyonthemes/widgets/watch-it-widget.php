<?php

class GlowMag_Watch_It_Widget extends WP_Widget{
    
    private function defaults()
        {
            $defaults = array(
                'title'       =>  esc_html__('DONT MISS IT', 'glowmag'),
                'cat_id'      => 0,
                'no_of_post'  => 4,
                'show_date'   =>1

            );
            return $defaults;
        }

     public function __construct(){
          parent::__construct(
               'glowmag-watch-it-widget',
               esc_html__( 'GlowMag DONT MISS IT Widget', 'glowmag' ),
               array( 'description' => esc_html__( 'Place anywhere in the widget area.', 'glowmag' ) )
          );
     }
    
     public function widget( $args, $instance )
     {
          extract( $args );
        
         $instance   = wp_parse_args( (array) $instance, $this-> defaults() );
        
         $catid      = absint($instance['cat_id']);
        
         $title      = apply_filters('widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base );
         $show_date  = absint( $instance['show_date'] ? 1 : 0);
         $no_of_post = absint( $instance['no_of_post']);
        
          $category  = get_category( $catid );

         if($catid !=-1)
           {
            $count         = $category->category_count;
           }
           else
           {
            $count=0;
           }
   
          if( !empty( $title ) && $count > 0 ) 
          {
           ?>

            <div style="height: 40px;"></div>
              <div class="col-sm-12 col-md-12">
                <div class="content-col">
                  <div class="news-carousel post-video wow animated fadeInUp" data-wow-delay="0.2s">
                      <h3 class="main-title"><?php echo $title; ?></h3>
                        <div id="post-video" class="owl-carousel">
                
                           <?php
                           $watchit_args = array(
                                                'cat'                   => $catid,
                                                'posts_per_page'        => absint( $no_of_post ),
                                                'no_found_rows'         => true,
                                                'post__not_in'          => get_option( 'sticky_posts' ),
                                                'ignore_sticky_posts'   => true,
                                                'post_status'           => 'publish', 
                                                'order'                 => 'desc',
                                            );

                            $watchit_posts = new WP_Query( $watchit_args );

                            if ( $watchit_posts->have_posts() ) :


                                while ( $watchit_posts->have_posts() ) :

                                    $watchit_posts->the_post(); ?>
                        
                                      <div>
                                          <div class="column-post">
                                            <a href="<?php the_permalink(); ?>" class="img-thumbnail"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?> </a>
                                              
                                                <div class="news-overlay"> 
                                                
                                              
                                                    <?php glowmag_blog_list(); ?>
                                                  <a href="<?php the_permalink(); ?>"> <h3><?php the_title(); ?></h3></a>
                                                  <span class="date"><?php echo esc_html( get_the_date('M d, Y') ); ?></span>
                                                 
                                                  <span class="view"> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></span>
                                                
                                              </div>

                                          </div>
                                      </div>
                                      <!--item-->
                          <?php endwhile; 

                                wp_reset_postdata();
                           endif; ?>

                        </div>
                    </div>
                </div>
              </div>
           
          
          <?php
        }
     }
   

     public function update( $new_instance, $old_instance )
     {
        $instance = $old_instance;
        $instance['cat_id']     = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
        $instance['title']      = sanitize_text_field( $new_instance['title'] );
        $instance['show_date']  = isset($new_instance['show_date']) ? 1:0;
        $instance['no_of_post'] = absint( $new_instance['no_of_post'] );
        return $instance;
     }

     public function form($instance ){
       $instance = wp_parse_args((array)$instance, $this->defaults());
            $catid     = absint($instance['cat_id']);
            $show_date = absint( $instance['show_date'] );
          ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><strong><?php _e( 'Title', 'glowmag' ); ?></strong></label><br />
             
                <input type="text" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" id="<?php echo esc_attr( $this->get_field_id('title')); ?>" value="<?php
                 if (isset($instance['title']) && $instance['title'] != '' ) :
                   echo esc_attr($instance['title']);
                  endif;

                  ?>" class="widefat" />
            </p>
             
             <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>"><?php esc_html_e('Select Category', 'glowmag'); ?></label><br/>
                <?php
                $cat_dropown = array(
                    'show_option_none'     => esc_html__('Select Category', 'glowmag'),
                    'orderby'              => 'name',
                    'order'                => 'asc',
                    'show_count'           => 1,
                    'hide_empty'           => 1,
                    'echo'                 => 1,
                    'selected'             => $catid,
                    'hierarchical'         => 1,
                    'name'                 => esc_attr( $this->get_field_name('cat_id')),
                    'id'                   => esc_attr( $this->get_field_name('cat_id')),
                    'class'               => 'widefat',
                    'taxonomy           ' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($cat_dropown);
                ?>
            </p>
            <hr>
     
             <p>
                 <label for="<?php echo $this->get_field_id('no_of_post'); ?>"><strong><?php _e( 'Number of posts to show:', 'glowmag' ); ?></strong></label><br />
            
                 <input type="number" name="<?php echo $this->get_field_name('no_of_post'); ?>" id="<?php echo $this->get_field_id('no_of_post'); ?>" value="<?php 
                   if (isset($instance['no_of_post']) && $instance['no_of_post'] != '' ) :
                    echo esc_html( $instance['no_of_post'] ); 
                    else :
                      echo "2";
                 endif;
              
                 ?>" class="widefat" />
              
                 <span class="small"></span>
              </p>
              <p>
                
                <input class="widefat" id="<?php echo  esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'show_date' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $show_date ); ?>" <?php checked( 1, esc_attr( $show_date ), 1 ); ?>/>
              
                <label for="<?php echo  esc_attr( $this->get_field_id( 'active_slider' ) ); ?>"><strong><?php echo esc_html__( 'Show Post Date' ,'glowmag'); ?></strong></label>

            </p>
          <?php
     }
}
add_action( 'widgets_init', 'GlowMag_Watch_It_Widget' ); 
function GlowMag_Watch_It_Widget(){     
    register_widget( 'GlowMag_Watch_It_Widget' );

}