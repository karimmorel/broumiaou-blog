
<!-- Get SouvenirsDeRoute.fr Api -->
<?php 


// Récupérer les photos en local ou sur le site en ligne
// $sdrApi = wp_remote_get('http://localhost/pics/web/app_dev.php/lastpublishedpics');
$sdrApi = wp_remote_get('https://souvenirsderoute.fr/app_dev.php/lastpublishedpics');


//Lien vers les photos en local ou sur le site en ligne
// $picsLink = 'http://localhost/pics/web/uploads/non_publiee/';
$picsLink = 'https://souvenirsderoute.fr/uploads/non_publiee/';


$sdrObj = json_decode($sdrApi['body']);
?>
<footer id="footer" role="contentinfo">
	
	<div id="souvenirsderoute-div" style="display:none">
		<?php
		foreach($sdrObj as $s)
		{
			?>
			<a href="https://souvenirsderoute.fr" target="_blank"><img src="<?php echo $picsLink.$s->type; ?>" alt="<?php echo $s->name; ?>"/></a>
			<?php
		}
		?>
	</div>
	<div id="footer-block-container">
			<div class="footer-block">
				<h2>Les autres trucs à moi</h2>
				<a href="https://souvenirsderoute.fr/" target="_blank"><i class="icon fas fa-camera fa-3x"></i></a>
				<a href="https://www.youtube.com/channel/UCbFB4IHyLqwcz_VVKAaJbaw/videos" target="_blank"><i class="icon fab fa-youtube fa-3x"></i></a>
				<a href="https://www.instagram.com/insta_rimka/" target="_blank"><i class="icon fab fa-instagram fa-3x"></i></a>
			</div>
		</div>
		<!-- <div class="sep"></div>
		<blockquote>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		</blockquote> -->
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>