<?php get_header(); ?>

<div class="container">
	<section id="content" role="main">


		<!-- Article's Thumbnail container -->
		<div id="thumbnail-container">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
			<?php endwhile; endif; ?>

			<div id="slider-buttons">
				<div id="slider-container">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
						<h2 class="<?php the_category() ?>"><?php the_title() ?></h2>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>