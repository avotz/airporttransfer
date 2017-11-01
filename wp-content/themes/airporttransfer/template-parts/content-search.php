<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package airporttransfer
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		
		<?php 
		 if ( has_post_thumbnail() ) :

          $id = get_post_thumbnail_id($post->ID);
          $big_url = wp_get_attachment_image_src($id,'tour-gallery', true);
          $thumb_url = wp_get_attachment_image_src($id,'large', true);
          ?>
          
      	<?php  if(wp_is_mobile()){ ?>
       		<figure class="post-banner blog-banner" style="background-image: url('<?php echo $thumb_url[0] ?>');">
				<?php  if ( !is_single() ) :?>
					<a href="<?php echo get_permalink() ?>"></a>
				
				<?php  endif;?>
			</figure>

		<?php  }else{ ?>
			<figure class="post-banner blog-banner" style="background-image: url('<?php echo $big_url[0] ?>');">
				<?php  if ( !is_single() ) :?>
					<a href="<?php echo get_permalink() ?>"></a>
				
				<?php  endif;?>
			</figure>
         <?php } ?>

      <?php endif; 
		
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php airporttransfer_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php airporttransfer_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
