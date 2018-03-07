<?php get_header(); ?>
<style type="text/css">
#main-photo
{
	background-image: url('<?php the_field('homepage_thumbnail'); ?>');
}
</style>
<div class="container">
	<section id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="main-photo">
			</div>
			<div id="article-content">
				<div id="article-title">
					<h1><?php the_title(); ?></h1>
				</div>
				<div id="article-text">
					<?php the_content(); ?>
				</div>
			</div>
			<!-- <?php get_template_part( 'entry' ); ?> -->
		<?php endwhile; endif; ?>
	</section>
</div>
<?php get_footer(); ?>