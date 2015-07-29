<?php get_header(); ?>
<div class="dnn_layout">
<section id="news">


		<?php if (have_posts()) : ?>

			<div id="primary">

								   <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

				<?php /* If this is a category archive */ if (is_category()) { ?>
					<h1 class="page-title">Category&#58; <?php single_cat_title(); ?></h1>

				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					<h1 class="page-title"><?php single_tag_title(); ?></h1>

				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h1 class="page-title">Archive for <?php the_time('F jS, Y'); ?></h1>

				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h1 class="page-title">Archive for <?php the_time('F, Y'); ?></h1>

				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h1 class="page-title">Archive for <?php the_time('Y'); ?></h1>

				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<h1 class="page-title">Author Archive</h1>

				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1 class="page-title">News Archives</h1>
				
				<?php } ?>
				<?php query_posts($query_string); ?>
				<?php while (have_posts()) : the_post(); ?>
			
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
						
						</header>	
					
						<div class="entry-content">
							<?php the_excerpt(); ?>
						</div>
					</div>	
				</article>

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
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>
</section>
</div>
<?php get_footer(); ?>
