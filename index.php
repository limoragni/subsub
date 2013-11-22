<?php
	if(!isset($_GET['lang'])){
		$lang = 'EN';
	}else{
		$lang = $_GET['lang'];
	}
?>
<!DOCTYPE>

<html>

<head>
	<title>subsub.com</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link type="text/css" href="css/style.css" rel="stylesheet"></link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.each($('.bots'), function(i, v){
				$(v).click(function(){
					window.location.href = 'index.php?page=' + v.id + '&lang=<?php echo $lang ?>';
				})
			})
			$('#indi').click(function(){
				window.location.href = 'index.php?lang=<?php echo $lang ?>';
			});
		});
	</script>
	<meta charset='utf-8'> 
</head>

<body>
	<div id="grey">
	
	</div>
			<div id="botonera2">
				<div id="face" class="bots2" onclick="location.href='https://www.facebook.com/sub.subtitles?fref=ts';"></div>
				<div id="paypal" class="bots2"onclick="location.href='https://www.paypal.com';"></div>
			</div>
	<div id="container">
		<div id="barra">
			<div id="botonera">
			<?php   if($lang == 'EN'): ?>			
				<div id="mission" class="bots">
					<div id="missionEN" class="bots"></div>
				</div>
				<div id="privacy" class="bots">
					<div id="privacyEN" class="bots"></div>
				</div>
				<div id="prices" class="bots">
					<div id="pricesEN" class="bots"></div>
				</div>
				<div id="trailers" class="bots">
					<div id="trailersEN" class="bots"></div>
				</div>
				<div id="contact" class="bots">
					<div id="contactEN" class="bots"></div>
				</div>
			<?php 	endif; ?>
			<?php   if($lang == 'SP'): ?>
				<div id="mission" class="bots">
					<div id="missionSP"  class="bots"></div>
				</div>
				<div id="privacy" class="bots">
					<div id="privacySP" class="bots"></div>
				</div>
				<div id="prices" class="bots" class="bots">
					<div id="pricesSP" class="bots"></div>
				</div>
				<div id="trailers" class="bots">
					<div id="trailersSP" class="bots"></div>
				</div>
				<div id="contact" class="bots">
					<div id="contactSP" class="bots"></div>
				</div>
			<?php 	endif; ?>
			<?php   if($lang == 'GR'): ?>
				<div id="mission" class="bots">
					<div id="missionGR" class="bots"></div>
				</div>
				<div id="privacy" class="bots">
					<div id="privacyGR" class="bots"></div>
				</div>
				<div id="prices" class="bots">
					<div id="pricesGR" class="bots"></div>
				</div>
				<div id="trailers" class="bots">
					<div id="trailersGR" class="bots"></div>
				</div>
				<div id="contact" class="bots">
					<div id="contactGR" class="bots"></div>
				</div>
			<?php 	endif; ?>
			<?php   if($lang == 'IT'): ?>
				<div id="mission" class="bots">
					<div id="missionIT" class="bots"></div>
				</div>
				<div id="privacy" class="bots">
					<div id="privacyIT" class="bots"></div>
				</div>
				<div id="prices" class="bots">
					<div id="pricesIT" class="bots"></div>
				</div>
				<div id="trailers" class="bots">
					<div id="trailersIT" class="bots"></div>
				</div>
				<div id="contact" class="bots">
				<div id="contactIT" class="bots"></div>
				</div>
			<?php 	endif; ?>
		</div>
			
	</div>
	<div id="indi"></div>
		<?php 
			
			if(!isset($_GET['page'])){
				include('center.php');
			}else{
				$page = $_GET['page'];
				$path = $page . '.php';
				include($path);
			}

		?>
	</div>

</body>

</html>
