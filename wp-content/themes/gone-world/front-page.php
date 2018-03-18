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
		<div id="thumbnail-container">
			<?php 
   // the query
			$the_query = new WP_Query( array(
				'posts_per_page' => 4,
			)); 
			?>

			<?php if ( $the_query->have_posts() ) : ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div id="article-container-<?php the_ID(); ?>" class="article-container" style="background-color:#3b444f;background-position:50%;background-repeat:no-repeat;background-size:cover;overflow:hidden;position:absolute;top:0;bottom:0;right:0;left:0;background-image:url(<?php echo get_the_post_thumbnail_url() ?>);">
						<div class="text-container">
							<div class="title-container">
								<h1><?php the_title(); ?></h1>
								<div class="sep"></div>
								<blockquote><?php the_field('resume_de_larticle') ?></blockquote>
								<a href="<?php the_permalink(); ?>">
									<button class="view-more">Voir l'article</button>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Il n\'y a pas d\'articles :\'(' ); ?></p>
			<?php endif; ?>

			<div id="slider-buttons">
				<div id="slider-container">
					<?php if ( $the_query->have_posts() ) : ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div id="button-article-<?php the_ID(); ?>" class="button-article"></div>
						<?php endwhile; endif; ?>				
					</div>
				</div>

			</div>
			<div id="article-container">


				<div id="article-block">
					<h1>ARTICLES</h1>
				</div>

				<div id="article-list">
					<div id="article-categories">
						<li id="all">All</li>
						<?php
						foreach (get_categories() as $category){
							echo "<li id=".$category->name.">";
							echo $category->name;
							echo "</li>";
						} ?>
					</div>
					<div id="article-titles">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php $post_id = get_the_ID();
							$category_object = get_the_category($post_id);
							$category_name = $category_object[0]->name; ?>

							<a href="<?php the_permalink(); ?>"><h2 class="<?php echo $category_name; ?>"><?php the_title() ?></h2></a>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php get_footer(); ?>