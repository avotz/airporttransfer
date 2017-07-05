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
        <div class="owl-carousel">
	  	 
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/picture1.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/picture2.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/picture3.jpg');">

	  	  </div>
	  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/picture4.jpg');">

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
	
<?php

get_footer();
