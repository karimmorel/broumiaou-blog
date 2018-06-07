<?php get_header(); ?>
<?php $next_post = get_next_post(); 
$previous_post = get_previous_post(); 

if (!empty($next_post)){
	$next_thumbnail = get_the_post_thumbnail_url($next_post->ID);
}

if (!empty($previous_post)){
	$previous_thumbnail = get_the_post_thumbnail_url($previous_post->ID);
}
?>
<style type="text/css">
#main-photo
{
	background-image: url('<?php the_field('image_top_article'); ?>');
}
<?php if (!empty($previous_post)){ ?>
	#article-more-prev
	{
		background-image: url('<?php echo $previous_thumbnail; ?>');
	}
	<?php } ?>
	<?php if (!empty($next_post)){ ?>
		#article-more-next
		{
			background-image: url('<?php echo $next_thumbnail; ?>');
		}
		<?php } ?>
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
					<div id="article-share">
						Partager sur : 

						<?php 
						if ( function_exists( 'sharing_display' ) ) {
							sharing_display( '', true );
						}
						
						if ( class_exists( 'Jetpack_Likes' ) ) {
							$custom_likes = new Jetpack_Likes;
							echo $custom_likes->post_likes( '' );
						} ?>


						<a href="#" class="facebook-logo"><i class="fab fa-facebook-f"></i></a>
						<a href="#" class="twitter-logo"><i class="fab fa-twitter"></i></a>
						<a href="#" class="google-plus-logo"><i class="fab fa-google-plus-g"></i></a>
					</div>
					<div id="article-more">


						<?php if (!empty ($next_post)) : ?>
							<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><div id="article-more-next" class="article-more-bloc">
								<div class="article-more-text-container">
									<h2><?php echo $next_post->post_title; ?></h2><blockquote>Article Suivant</blockquote>
								</div>
							</div></a>
						<?php endif; ?>


						<?php if (!empty($previous_post)) : ?>
							<a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>"><div id="article-more-prev" class="article-more-bloc">
								<div class="article-more-text-container">
									<h2><?php echo $previous_post->post_title; ?></h2><blockquote>Article Précédent</blockquote>
								</div>
							</div></a>
						<?php endif; ?>


					</div>
				</div>
				<!-- <?php get_template_part( 'entry' ); ?> -->
			<?php endwhile; endif; ?>
		</section>
	</div>
	<?php get_footer(); ?>