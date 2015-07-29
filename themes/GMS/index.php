<?php get_header(); ?>
<div class="dnn_layout">
	<section id="news">

		<div id="primary">

							   <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>

		<!--	<h1 class="page-title">Latest News</h1> -->

			<section id="latest-news"> <!-- Start #latest-news -->

				<?php $latest_news_show = 4; // How many latest news posts should be displayed?
					  $latest_news_post_ids = array();
					  $latest_news_query = new WP_Query(array('posts_per_page' => $latest_news_show, 'paged' => $paged)); 
					//  $latest_news_query = new WP_Query();
					//  $latest_news_query->query(array(
					//  	'paged' =>
					//  	))


					  ?>
		
				<?php if ($latest_news_query->have_posts()) : while ($latest_news_query->have_posts()) : $latest_news_query->the_post(); ?>
				
					<?php array_push($latest_news_post_ids, $post->ID); ?>
					<?php if( $latest_news_query->current_post == 0 && !is_paged() ) { ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('feature-post') ?>>
								<header class="entry-header">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
										<div class="brafton-image-wrapper">
											<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
										</div>
									</a>
									<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
									<div class="byline-div">
										<time datetime="<?php echo date(DATE_W3C); ?>" pubdate ><?php the_time('F jS, Y') ?></time>
										&nbsp;/&nbsp;
										<?php echo get_the_category_list( ", "); ?>
										&nbsp;/&nbsp;

										<!-- share this social plugins -->
										<div class="social-sharing">
											<span class='st_facebook'></span>
											<span class='st_twitter'></span>
											<span class='st_pinterest'></span>
											<span class='st_linkedin'></span>
											<span class='st_googleplus'></span>
											
											
										</div>
									</div>


									<span class="byline author vcard">
										<span>by </span><span class="fn"><?php the_author() ?></span>
									</span>
								</header>		
								<div class="entry-content">
									<?php the_excerpt(); ?>
								</div>
							</article>					

					<?php } else { ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('non-feature-post') ?>>
								<div class="article-image">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
										<div class="brafton-image-wrapper">
											<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
										</div>
									</a>									
								</div>
								<div class="article-right">
									<header class="entry-header">

										<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										<div class="byline-div">
											<time datetime="<?php echo date(DATE_W3C); ?>" pubdate ><?php the_time('F jS, Y') ?></time>
											&nbsp;/&nbsp;
											<?php echo get_the_category_list( ", "); ?>
											&nbsp;/&nbsp;	
											<!-- share this social plugins -->
											<div class="social-sharing">
												<span class='st_facebook'></span>
												<span class='st_twitter'></span>
												<span class='st_pinterest'></span>
												<span class='st_linkedin'></span>
												<span class='st_googleplus'></span>
											</div>
										</div>																	
										<span class="byline author vcard">
											<span>by </span><span class="fn"><?php the_author() ?></span>
										</span>
									</header>	

									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div>
								</div>	
							</article>

					<?php } ?>
			
				<?php endwhile; ?>


			<?php

			/* Pagination for WordPress http://codex.wordpress.org/Function_Reference/paginate_links */
			global $wp_query;
			$big = 999999999; // need an unlikely integer
			$args = array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			)

			?>

			<div class="navigation"><?php echo paginate_links( $args ); ?></div>

			
			</section><!-- End #latest-news -->
			



			<?php else : ?> <!-- No Articles -->

				<h2>No articles posted yet! Come back soon.</h2>

			<?php endif; ?> 

		</div>
	
	
<?php get_sidebar(); ?>
</section><!-- End #news -->



</div>
<?php get_footer(); ?>
