<?php
if (!class_exists('GlowMag_Slider_Widget')) {
    class GlowMag_Slider_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id'     => 0,
                'no_of_post' => '4',
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'glowmag-slider-widget',
                esc_html__('GlowMag Slider Widget', 'glowmag'),
                array('description' => esc_html__( 'Widget to display Slider News.', 'glowmag' ))
            );
        }

        public function widget($args, $instance)
        {

            if ( !empty( $instance )) {
                $instance      = wp_parse_args((array )$instance, $this->defaults());
                $catid         = absint($instance['cat_id']);
                $no_of_post    = absint($instance['no_of_post']);
                $category      = get_category( $catid );
                $count         = $category->category_count;
                echo $args['before_widget'];

                if ($count > 0) {
                    ?>
                 
                    <!--flex slider-->
                        <div class="flex-slider2">
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php
                                       $sticky = get_option('sticky_posts');

                                       if (!empty($catid)) 
                                           {
                                               
                                                $glowmag_slider_section = array(
                                                    'cat'                 => $catid,
                                                    'posts_per_page'      =>  $no_of_post,
                                                    'ignore_sticky_posts' => true,
                                                    'post__not_in'        => $sticky,

                                                );
                                            }
                                            
                                            else
                                            {
                                                $glowmag_slider_section = array(
                                                    'ignore_sticky_posts' => true,
                                                    'post__not_in'        => $sticky,
                                                    'post_type'           => 'post',
                                                    'posts_per_page'      =>  $no_of_post,
                                                    'order' => 'DESC'
                                                );
                                            }   
                                                $glowmag_slider_query = new WP_Query( $glowmag_slider_section );
                                                if ( $glowmag_slider_query->have_posts())
                                                {
                                                    while ( $glowmag_slider_query->have_posts() ) 
                                                    {
                                                        $glowmag_slider_query->the_post();
                                                        ?>
                                                            <li>
                                                               
                                                                    <?php
                                                                        if ( has_post_thumbnail() )
                                                                        {
                                                                            $image_id = get_post_thumbnail_id();
                                                                            $image_url = wp_get_attachment_image_src($image_id, 'home-slider', true);
                                                                    ?>
                                                                         <a href="<?php the_permalink(); ?>" class="news-slider">     <img src="<?php echo esc_url($image_url[0]); ?>" alt="" class="img-responsive"> </a>
                                                                <?php   } ?>     


                                                                    <div class="news-overlay"> 
                                                                        <?php glowmag_slider(); ?>
                                                                      
                                                                       <a href="<?php the_permalink(); ?>">    <h3><?php the_title(); ?></h3></a>
                                                                       
                                                                        <span class="date"><?php echo esc_html( get_the_date() ); ?></span>
                                                                        <span class="comments"><i class="fa fa-comment"></i> <?php comments_number( '0 comments', '1 comments', '% comments' ); ?></span> 
                                                                    </div>
                                                               
                                                            </li>
                                               <?php 
                                                    }
                                               } 
                                            wp_reset_postdata();
                                           
                                                ?>        
                                    
                                </ul>
                            </div>
                        </div>
                        <!--flex slider end-->

                    <?php
                }
                echo $args['after_widget'];
            }
        }

        public function update($new_instance, $old_instance)
        {
            $instance                 = $old_instance;
            $instance['cat_id']       = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';
            $instance['no_of_post']   = absint($new_instance['no_of_post']);
            return $instance;
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);
            $no_of_post = absint($instance['no_of_post']);
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>"><?php esc_html_e('Select Category', 'glowmag'); ?></label><br/>
                <?php
                $cat_dropown = array(
                    'show_option_none'    => esc_html__('Select Category', 'glowmag'),
                    'orderby         '    => 'name',
                    'order'               => 'asc',
                    'show_count'          => 1,
                    'hide_empty'          => 1,
                    'echo'                => 1,
                    'selected'            => $catid,
                    'hierarchical'        => 1,
                    'name'                => esc_attr( $this->get_field_name('cat_id')),
                    'id'                  => esc_attr( $this->get_field_name('cat_id')),
                    'class'               => 'widefat',
                    'taxonomy'            => 'category',
                    'hide_if_empty'       => false,
                );
                wp_dropdown_categories($cat_dropown);
                ?>
            </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('no_of_post')); ?>"><strong><?php esc_html_e('No Of Post To Display', 'glowmag'); ?></strong></label><br/>
                
                <input type="number" name="<?php echo esc_attr( $this->get_field_name('no_of_post')); ?>" class="quality-cons" id="<?php echo esc_attr( $this->get_field_id('no_of_post')); ?>" value="<?php echo $no_of_post ?>">
            </p>

            <?php
        }
    }

}

add_action('widgets_init', 'GlowMag_Slider_widget');
function GlowMag_Slider_widget()
{
    register_widget('GlowMag_Slider_Widget');

}















