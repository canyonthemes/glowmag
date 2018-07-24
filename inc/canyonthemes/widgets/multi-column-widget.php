<?php
if (!class_exists('Multi_Column_News_Widget')) {
   
    class Multi_Column_News_Widget extends WP_Widget
   
    {

        private function defaults()
        {

            $defaults = array(
                'title'                  => esc_html__( 'Latest News', 'glowmag' ),
                'cat_id'                 => 1,
                'view_all_text'          => esc_html__( 'View All', 'glowmag' ),
                'full_excerpt_length'    => 20,
                'colmn_excerpt_length'   => 12,
                'no_of_post'             => 5,
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'glowmag-multi-column-news-widget',
                esc_html__('GlowMag  Multi Column News ', 'glowmag'),
                array('description' => esc_html__( 'Widget Big image at Top and 2 columns Post at bottom.', 'glowmag' ))
            );
        }

        public function widget($args, $instance)
        {

            if ( !empty( $instance )) {
                $instance             = wp_parse_args((array )$instance, $this->defaults());
                $title                = apply_filters( 'widget_title', !empty( $instance['title'] ) ? esc_html( $instance['title'] ) : '', $instance, $this->id_base);
                $catid                = absint($instance['cat_id']);
                $view_all_text        =  esc_html( $instance['view_all_text'] );
                $full_excerpt_length  = absint( $instance['full_excerpt_length'] );
                $colmn_excerpt_length = absint( $instance['colmn_excerpt_length'] );
                $no_of_post           = absint($instance['no_of_post']);
                $category             = get_category( $catid );
              
                   if($catid !=-1)
                   {
                    $count         = $category->category_count;
                   }
                   else
                   {
                    $count=0;
                   }
               
                echo $args['before_widget'];

                if ($count > 0) {
                    
                    ?>
                 
               <!--popular post-->
                        <div style="height: 40px;"></div>
                          <div class="news-columns">
                           
                             <?php if(!empty($title)){?> <h3 class="main-title"><?php 

                                 echo $title; ?></h3>
                          
                            <?php } 

                            $multi_colmn_args = array(
                                        'cat'                   => $catid,
                                        'posts_per_page'        => absint( $no_of_post ),
                                        'no_found_rows'         => true,
                                        'post__not_in'          => get_option( 'sticky_posts' ),
                                        'ignore_sticky_posts'   => true,
                                    );
                            $multi_colm_posts = new WP_Query( $multi_colmn_args );
                           
                            if ( $multi_colm_posts->have_posts() ) :

                                $colm_count = 1;
                            ?> 
                            
                            <div class="row">
                               <?php
                                
                                while ( $multi_colm_posts->have_posts() ) :

                                    $multi_colm_posts->the_post(); 

                                    if( 1 == $colm_count ) { ?>
  
                                        <div class="col-sm-12 wow animated fadeInUp" data-wow-delay="0.2s">
                                            
                                            <div class="column-post">
                                               
                                                <a href="<?php the_permalink(); ?>" class="img-thumbnail"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?> </a>
                                               
                                                <div class="topic"> 
                                                     
                                                     <?php glowmag_blog_list(); ?>
                                                  
                                                    <h4>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <p><?php                                       
                                                    $content =  wp_trim_words(get_the_excerpt(),$full_excerpt_length) ;
                                                      echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';
                                                    ?> </p>
                                                   
                                                    <ul class="post-tools">
                                                    
                                                      <li> by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong> <?php the_author(); ?></strong> </a></li>
                                                    
                                                      <li>  <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?> </li>
                                                      
                                                      <li><a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                   else
                                   {

                                  ?>              
                                         <!--column post col-4-->
                                    <div class="col-sm-6 wow animated fadeInUp" data-wow-delay="0.4s">
                                       
                                        <div class="column-post">
                                           
                                            <a href="<?php the_permalink(); ?>" class="img-thumbnail"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                             </a>
                                          
                                            <div class="topic"> 
                                             
                                                <?php glowmag_blog_list(); ?>
                                             
                                                <h4><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h4>
                                               
                                                <p>  <?php 
                                                    
                                                    $content =  wp_trim_words(get_the_content(),$colmn_excerpt_length,'') ;
                                                      
                                                     echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';

                                                    ?></p>
                                               
                                                <ul class="post-tools">
                                                
                                                  <li> by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><strong>  <?php the_author(); ?></strong> </a></li>
                                                 
                                                  <li>  <?php printf( _x( '%s ago', '%s = human-readable time difference', 'glowmag' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></li>
                                                 
                                                  <li>
                                                    <a href="<?php comments_link(); ?>"> <i class="ti-thought"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></a>
                                                   </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--column post col-4-->
                                              
                                  <?php 
                                    } 
                            
                                    $colm_count++;

                                  endwhile; 

                                 wp_reset_postdata(); ?>  

                            </div>

                        <?php endif; ?>  

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
            $instance['title']                  = sanitize_text_field( $new_instance['title'] );
            $instance['cat_id']                 = absint( $new_instance['cat_id'] );
            $instance['view_all_text']          = sanitize_text_field( $new_instance['view_all_text'] );
            $instance['full_excerpt_length']    = absint( $new_instance['full_excerpt_length'] );
            $instance['colmn_excerpt_length']   = absint( $new_instance['colmn_excerpt_length'] );
            $instance['no_of_post']             = absint( $new_instance['no_of_post'] );
            return $instance;
        }

        public function form($instance)
        {
            $instance              =  wp_parse_args((array )$instance, $this->defaults());
            $title                 =  $instance['title'] ;
            $catid                 =  $instance['cat_id'] ;
            $view_all_text         =  $instance['view_all_text'] ;
            $full_excerpt_length   =  $instance['full_excerpt_length'] ;
            $colmn_excerpt_length  =  $instance['colmn_excerpt_length'] ;
            $no_of_post            =  $instance['no_of_post'];
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
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $catid,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('cat_id')),
                    'id'               => esc_attr( $this->get_field_name('cat_id')),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
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
                <label for="<?php echo esc_attr( $this->get_field_name('full_excerpt_length') ); ?>">
                    <?php esc_html_e(' Full Width Excerpt Length:', 'glowmag'); ?>
                </label>
              
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('full_excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('full_excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['full_excerpt_length'] ); ?>" />
            </p>

            <hr/>

             <p>
                <label for="<?php echo esc_attr( $this->get_field_name('colmn_excerpt_length') ); ?>">
                    <?php esc_html_e('2 Column Excerpt Length:', 'glowmag'); ?>
                </label>
              
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('colmn_excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('colmn_excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['colmn_excerpt_length'] ); ?>" />
            </p>

            <hr/>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('no_of_post')); ?>"><strong><?php esc_html_e('No Of Post To Display', 'glowmag'); ?></strong></label><br/>
                <?php
                $this->glowmag_post_number( array(
                    'id'       => $this->get_field_id( 'no_of_post' ),
                    'name'     => $this->get_field_name( 'no_of_post' ),
                    'selected' => absint( $instance['no_of_post'] ),
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
                '5' => 5,
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


add_action('widgets_init', 'Multi_Column_News_Widget');
function Multi_Column_News_Widget()
{
    register_widget('Multi_Column_News_Widget');

}