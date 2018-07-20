<?php

class GlowMag_Recent_Post_Widget extends WP_Widget{
    
    private function defaults()
        {
            $defaults = array(
                'title'      =>  esc_html__('Recent Posts', 'glowmag'),
                'no_of_post' => 4,
                'date_option' =>1

            );
            
            return $defaults;
        }

     public function __construct(){
         
          parent::__construct(
               'glowmag-recent-post-widget',
               esc_html__( 'GlowMag Recent Post Widget', 'glowmag' ),
               array( 'description' => esc_html__( 'Place anywhere in the widget area.', 'glowmag' ) )
          );
     }
    
     public function widget( $args, $instance )
     {
          extract( $args );
         if(!empty( $instance ) )
        { 
          $instance   = wp_parse_args( (array) $instance, $this-> defaults() );
         $title       = apply_filters('widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base );
         $date_option   = absint( $instance['date_option'] ? 1 : 0);
         $no_of_post  = absint( $instance['no_of_post']);
         
          if( !empty( $title ) ) 
          
          {
            ?>

             <div class="sidebar-box wow animated fadeInUp glow-mag-recent-post" data-wow-delay="0.4s">
                <h3><?php echo $title; ?> </h3>
                
                   <?php
                  $recent_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $no_of_post) );
                   if ( $recent_posts->have_posts() )
                    {
                        while ( $recent_posts->have_posts() )
                         {
                            $recent_posts->the_post();
                  ?> 
                              <div class="media">
                                  
                                  <div class="media-left">
                                      <a href="<?php the_permalink(); ?>">
                                         <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive' ) ); ?>
                                      </a>
                                  </div>
                                 
                                  <div class="media-body">                                    
                                      <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                                       <?php
                                        if( $date_option == 1 )
                                        {
                                       ?>   
                                          <span class="date"><?php echo esc_html( get_the_date ( 'd M' ) ) ?>, <?php echo esc_html( get_the_date ( 'Y' ) ) ?></span> 

                                 <?php  } ?>
                                  </div>
                              </div>
                              <!--media-->
                  <?php
                         }
                           wp_reset_postdata();
                    }
                  ?>  
   
            </div>
          
          <?php
        }
     }
   } 

     public function update( $new_instance, $old_instance )
     {
        $instance               = $old_instance;
        $instance['title']      = sanitize_text_field( $new_instance['title'] );
        $instance['date_option']  = isset($new_instance['date_option']) ? 1:0;
        $instance['no_of_post'] = absint( $new_instance['no_of_post'] );
        return $instance;
     }

     public function form($instance ){
       $instance = wp_parse_args((array)$instance, $this->defaults());
             $date_option = absint( $instance['date_option'] );
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
                <input class="widefat" id="<?php echo  esc_attr( $this->get_field_id( 'date_option' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'date_option' ) ); ?>" type="checkbox" value="<?php echo esc_attr( $date_option ); ?>" <?php checked( 1, esc_attr( $date_option ), 1 ); ?>/>
                
                <label for="<?php echo  esc_attr( $this->get_field_id( 'active_slider' ) ); ?>"><strong><?php echo esc_html__( 'Show Post Date' ,'glowmag'); ?></strong></label>

            </p>
          <?php
     }
}
add_action( 'widgets_init', 'GlowMag_recent_post_widget' ); 
function GlowMag_recent_post_widget(){     
    register_widget( 'GlowMag_Recent_Post_Widget' );

}














