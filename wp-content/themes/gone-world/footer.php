
<!-- Get SouvenirsDeRoute.fr Api -->
<?php $sdrApi = wp_remote_get('https://souvenirsderoute.fr/app_dev.php/lastpublishedpics');
$sdrObj = json_decode($sdrApi['body']);
?>

<div id="souvenirsderoute-div">
			<?php
			foreach($sdrObj as $s)
			{
				?>
				<a href="https://souvenirsderoute.fr" target="_blank"><img src="https://souvenirsderoute.fr/uploads/non_publiee/<?php echo $s->type; ?>" alt="<?php echo $s->name; ?>"/></a>
				<?php
			}
			?>
		</div>
<footer id="footer" role="contentinfo">
	<div id="footer-block-container">
		<div class="footer-block">
			<h2>Qui suis-je</h2>
			<a href="https://karimmorel.fr" target="_blank"><img class="portrait" src="<?php echo get_stylesheet_directory_uri() ?>/img/petit_portrait.jpg" alt="Portrait Karim Morel"/></a>
			<p>Karim Morel<br/>
			<small>Développeur Web Indépendant</small></p>
		</div>
		<div class="footer-block">
			<h2>Qu'est-ce que je fais</h2>
			<a href="https://souvenirsderoute.fr/" target="_blank"><i class="icon fas fa-camera fa-3x"></i></a>
			<a href="https://www.youtube.com/channel/UCbFB4IHyLqwcz_VVKAaJbaw/videos" target="_blank"><i class="icon fab fa-youtube fa-3x"></i></a>
			<a href="#" target="_blank"><i class="icon fab fa-instagram fa-3x"></i></a>
			<p><small>Je fais des vidéos, des sites internet et j'en profite pour voir le monde.</small></p>
		</div>
		<div class="footer-block">
			<h2>Me contacter</h2>
			<i class="icon fas fa-at fa-3x"></i>
			<br/>
			<a href="mailto:karim-morel@outlook.fr"><button class="mail-button">Contactez-moi</button></a>
		</div>
	</div>
	<div class="sep"></div>
	<blockquote>
		<div id="site-description"><?php bloginfo( 'description' ); ?></div>
	</blockquote>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>