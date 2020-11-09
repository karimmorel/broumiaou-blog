<?php get_header(); ?>


<?php
$args = array(
	'numberposts' => 3,
	'offset' => 0,
	'category' => 0,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'include' => '',
	'exclude' => '',
	'meta_key' => '',
	'meta_value' =>'',
	'post_type' => 'post',
	'post_status' => 'draft, publish, future, pending, private',
	'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
?>

<div class="container">

	<section id="content" role="main">
		<!-- Article's Thumbnail container -->
			<?php 
   		// the query
			$the_query = new WP_Query( array(
				'posts_per_page' => 40,
			)); 
			?>
			<div id="articles-container">
			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="thumbnail-container">

					<img src="<?php echo get_the_post_thumbnail_url() ?>"/>
					<div id="article-container-<?php the_ID(); ?>" class="article-container">
						<div class="text-container">
							<div class="title-container">
								<h1><?php the_title(); ?></h1>
								<div class="sep"></div>
								<blockquote><?php the_field('resume_de_larticle') ?></blockquote>
								<a href="<?php the_permalink(); ?>">
									<button class="view-more">Lire l'article</button>
								</a>
							</div>
						</div>
					</div>
			</div>

				<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Il n\'y a pas d\'articles :\'(' ); ?></p>
			<?php endif; ?>
				</div>
		</div>
	</section>

					</div>
					</header>
	<?php get_footer(); ?>