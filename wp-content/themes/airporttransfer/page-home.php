<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package airporttransfer
 */

get_header(); ?>
	 <section id="slider">
        <div class="home-slider owl-carousel">
	  	 
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/Arenal-Volcano.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/Beach-Family.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/Rio-Celeste.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/Sunset-Surfing.jpg');">

	  	  </div>
	  	  
	  	 
	  	  	  
		</div>
        <em class="border-colors"></em>
    </section>
    <section class="top-info">
             
             <div class="inner">
            
                <div class="top-info-container">
                   <article class="top-info-item info-main">
                   	    <h2>
                   	    	About <br>
                   	    	<span>Costa Rica</span>
                   	    </h2>
                   	    <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=5' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                   <article class="top-info-item info-main">
                   		<h2>
                   	    	Liberia <br>
                   	    	<span>Airport (LIR)</span>
                   	    </h2>
                   		 <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=7' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                   <article class="top-info-item info-main">
                   		<h2>
                   	    	Local <br>
                   	    	<span>Attraction</span>
                   	    </h2>
                   		 <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=9' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                </div>
            
            </div>
            
        </section>
        <section class="services-box">
            <div class="inner">
                
                <div class="services-box-container">
                   <article class="services-box-item service">
                   	    <h2>
                   	    	Day  <br>
                   	    	<span>Tours To</span>
                   	    </h2>
                   	    <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=11' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                   <article class="services-box-item service">
                   		<h2>
                   	    	Liberia <br>
                   	    	<span>Airport Transfer</span>
                   	    </h2>
                   		 <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=13' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                   <article class="services-box-item service">
                   		<h2>
                   	    	Costa Rica <br>
                   	    	<span>Destination</span>
                   	    </h2>
                   		 <?php rewind_posts(); ?>
			            <?php query_posts( 'post_type=page&page_id=15' ); ?>
			            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			                    
			                        <?php the_content(); ?>
			                   
			    
			                <?php endwhile; ?>
			                <!-- post navigation -->
			              
			            <?php endif; ?>
			          
                   </article>
                </div>
               
            </div>
        </section>

		<!-- <div id="cupon-popup" class="cupon-popup white-popup mfp-hide mfp-with-anim" style="max-width: 490px;">
			<img src="<?php echo get_template_directory_uri();  ?>/img/cupon.png" alt="cupon">

		</div> -->
	
<?php

get_footer();
