<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage GlowMag
 */



if (!function_exists('glowmag_braeking_news')) :

    function glowmag_braeking_news($post_id)
    {
        $glowmag_title_text         = glowmag_get_option( 'breaking_title' );

        $glowmag_section_cat_id     = absint( glowmag_get_option( 'breaking_category_id' ) ) ;

        $no_of_slider                 = glowmag_get_option( 'breaking_post_number' ); 


          if( !empty( $glowmag_section_cat_id ))  
           {
                $glowmag_breaking_news = array('cat' => $glowmag_section_cat_id, 'posts_per_page' => $no_of_slider);
                
                 $breaking_news_query = new WP_Query($glowmag_breaking_news);
                
                if ($breaking_news_query->have_posts()):
                 
    ?>
                    <!--breaking slide-->
                    <div class="breaking-news-slide clearfix">
                        <h5 class="bg1"><?php echo esc_html($glowmag_title_text ); ?></h5>
                        <div class="newsslider">
                            <ul class="slides">
                               <?php

                               while ($breaking_news_query->have_posts()):
                                    $breaking_news_query->the_post();

                               ?>
                                       <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </li>
                                <?php

                                endwhile;
                                
                                wp_reset_postdata();

                                ?>       
                              
                            </ul>
                        </div>
                    </div>
                    <!--breaking slide end-->

               <?php endif;    
            }

    }
endif;

add_action('glowmag_braeking_news', 'glowmag_braeking_news', 10, 1);    