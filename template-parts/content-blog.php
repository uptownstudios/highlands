<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post', 'posts_per_page' => 9, 'paged' => $paged );
$loop = new WP_Query( $args );

?>
			<?php if ( $loop->have_posts()) : while ( $loop->have_posts()) : $loop->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('index-card bs-isotope-item'); ?>>
					<div class="entry-content">
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="blog-page-featured-image">
							<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
						</div>
						<?php } ?>
						<div class="blog-page-title-excerpt">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<p class="author-date">Published on <?php the_date(); ?></p>
							<p class="author-byline"><span class="avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></span><span class="byline">By <a href="<?php echo get_author_posts_url( $author_id ); ?>" title=""><?php the_author_meta( 'display_name', $author_id ); ?></a></span>
							<?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More &raquo;</a>
						</div>
					</div>
				</article>
			<?php endwhile; endif; ?>
