<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GlowMag
 */

$copyright_text = glowmag_get_option( 'copyright_text' );

?>
 <!--footer-->
  <?php
  
	if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) 
	{
	    
	   	$count = 0;
			
			for ( $i = 1; $i <= 4; $i++ )
			    
			    {
				  if ( is_active_sidebar ( 'footer-' . $i ) )
				        {
							$count++;
						}
				}
			$column=3;
			if( $count == 4 ) 
			
			{
			   	$column = 3;  
		   
			}

	        elseif( $count == 3)
	     
	        {
	             	$column = 4;
	        }

	        elseif( $count == 2) 
	        
	        {
	             	$column = 6;
	        }

	       elseif( $count == 1) 
	       
	        {
	             	$column = 12;
	        }
	?>

		    <div class="footer">
		    	<div class="container">
		    		<div class="row">
		             
		               	<?php
						 	for ( $i = 1; $i <= 4 ; $i++ )
					    	{
		    				  	if ( is_active_sidebar( 'footer-' . $i ) )
		    				  	{
						?> 
						            <div class="col-md-<?php echo  absint( $column ); ?> col-sm-6">
						                <?php dynamic_sidebar( 'footer-' . $i ); ?>

						            </div>
			        <?php

			        			}
			        	    }		

			        ?> 
			           
			           
		        	</div>
		    	</div>
		    </div>
		    <?php
				/*
				 * Go to Top Option
				*/
				do_action('glowmag_go_to_top_hook');

		    ?>
<?php 

    } 

if ( !empty( $copyright_text ) )
{
  ?>    
		    <div class="footer-copyright"> 
		    	<div class="container">
		    		<span> <?php echo wp_kses_post( $copyright_text ); ?> </span>
                               <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'glowmag' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'glowmag' ), 'WordPress' ); ?>
				
			</a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s', 'glowmag' ), 'GlowMag ', '<a href="http://canyonthemes.com" target="_blank">CanyonThemes</a>' ); ?>

                             
		    	</div>
		    </div>
		    <!--footer-->

<?php } wp_footer(); ?>

</body>
</html>
