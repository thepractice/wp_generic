<?php get_header(); ?>
<div class="dnn_layout">
<section id="news">





	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

							   <?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
			
				<!--video embed code-->
				<div class="single-image-wrapper">

					<?php if (!get_post_meta( get_the_ID(), 'brafton_video', true )): ?>
						<div class="figure"><?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>	
						</div>
					<?php else: ?>
	                 			<?php echo get_post_meta( get_the_ID(), 'brafton_video', true ) ?>
					<?php endif; ?>
				</div>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="byline-div">
					<time datetime="<?php echo date(DATE_W3C); ?>" pubdate ><?php the_time('F jS, Y') ?></time>
					&nbsp;/&nbsp;
					<?php echo get_the_category_list( ", "); ?>
				
					<span class="byline author vcard">by <span class="fn"><?php the_author() ?></span></span>
				
				</div>	

			</header>

			<div class="entry-content">


					

					
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>

				<div class="bottom-article-links">

					<a href="http://blog.gms.ca/"><i class="fa fa-chevron-left"></i> BACK TO BLOG</a>

					<?php next_post_link( '%link', 'NEXT ARTICLE <i class="fa fa-chevron-right"></i>'); ?>
				</div>


			</div>
		
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>

		</article>

	<?php endwhile; endif; ?>
	
<?php get_sidebar(); ?>

</section>
</div>

<?php get_footer(); ?>

<script type="text/javascript">stLight.options({publisher: "aacb296d-9bee-48e8-bfe6-aa5bbd7ddaf1", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "aacb296d-9bee-48e8-bfe6-aa5bbd7ddaf1", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "pinterest", "linkedin", "googleplus", "email"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
