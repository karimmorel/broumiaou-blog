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
	background-image: url('<?php the_field('image_article'); ?>');
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
			<?php $article_type = get_field('article_type'); if( $article_type == 'parcours') { ?>
				<div id="main-map">
				</div>
				<div id="article-content">
					<div id="article-title-map">
						<h1><?php the_title(); ?></h1>
					</div>
				<?php } else { ?>
					<div id="main-photo">
					</div>
					<div id="article-content">
						<div id="article-title">
							<h1><?php the_title(); ?></h1>
						</div>
					<?php } ?>






					<div id="article-text">
						<?php the_content(); ?>
					</div>
					<!-- <div id="article-share">
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
					</div> -->
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

	<!-- Lancement script GMaps -->

	<script>



		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		function initMap() {


			<?php 
			$object_itineraire = get_field('itineraire'); 
			$parcours_list = array();
			?>

			<?php foreach($object_itineraire as $itineraire)
			{
				$object_parcours = get_field('liste_parcours', $itineraire->ID);
				foreach($object_parcours as $parcours)
				{
					$parcours_data = get_post_custom($parcours->ID);
					$parcours_list[] = array("lat_depart" => $parcours_data['lat_depart'][0], "lng_depart" => $parcours_data['lng_depart'][0], "lat_arrivee" => $parcours_data['lat_arrivee'][0], "lng_arrivee" => $parcours_data['lng_arrivee'][0]);
				}
			}

			echo 'var start = { lat : '.$parcours_list[0]['lat_depart'].', lng : '.$parcours_list[0]['lng_depart'].'};';
			echo 'var end = { lat : '.$parcours_list[0]['lat_arrivee'].', lng : '.$parcours_list[0]['lng_arrivee'].'};';
			?>

			var directionsDisplay = new google.maps.DirectionsRenderer;
			var directionsService = new google.maps.DirectionsService;
			var map = new google.maps.Map(document.getElementById('main-map'), {
				zoom: 14,
				center: start
			});
			directionsDisplay.setMap(map);

			calculateAndDisplayRoute(directionsService, directionsDisplay, start, end);


			<?php foreach(array_slice($parcours_list,1) as $key=>$value){
				?>
				<?php $key++; ?>
				var start<?php echo $key; ?> = { lat : <?php echo $value['lat_depart']; ?>, lng : <?php echo $value['lng_depart']; ?>};
				var end<?php echo $key; ?> = { lat : <?php echo $value['lat_arrivee']; ?>, lng : <?php echo $value['lng_arrivee']; ?>};
				var directionsDisplay<?php echo $key; ?> = new google.maps.DirectionsRenderer;
				var directionsService<?php echo $key; ?> = new google.maps.DirectionsService;
				var map = new google.maps.Map(document.getElementById('article-map-<?php echo $key; ?>'), {
					zoom: 14,
					center: start
				});
				directionsDisplay<?php echo $key; ?>.setMap(map);

				calculateAndDisplayRoute(directionsService<?php echo $key; ?>, directionsDisplay<?php echo $key; ?>, start<?php echo $key; ?>, end<?php echo $key; ?>);

				<?php 
			}
			?>


		}

		function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end) {
			var selectedMode = 'DRIVING';
			directionsService.route({
          origin: start,  // Haight.
          destination: end,  // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
      }, function(response, status) {
      	if (status == 'OK') {
      		directionsDisplay.setDirections(response);
      	} else {
      		window.alert('Directions request failed due to ' + status);
      	}
      });
		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4g0cb5tUdU0VCay2EcRR1fuWRZGYZrD4&callback=initMap"></script>