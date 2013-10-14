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
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link type="text/css" href="css/style.css" rel="stylesheet"></link>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.each($('.bots'), function(i, v){
				console.log(v);
				$(v).click(function(){
					window.location.href = 'index.php?page=' + v.id + '&lang=<?php echo $lang ?>';
				})
			})
			$('#indi').click(function(){
				console.log('X');
				window.location.href = 'index.php?lang=<?php echo $lang ?>';
			});
		});
	</script>
	<meta charset='utf-8'> 
</head>

<body>
	<div id="grey">
	
	</div>
	<div id="container">
		<div id="barra">
			<div id="botonera">
				
				<div id="mission" class="bots"></div>
				<div id="privacy" class="bots"></div>
				<div id="prices" class="bots"></div>
				<div id="trailers" class="bots"></div>
				<div id="contact" class="bots"></div>
				
			</div>
		</div>
		<div id="indi"></div>
		<?php 
			
			if(!isset($_GET['page'])){
				include('center.php');
			}else{
				$page = $_GET['page'];
				$url = $page . '.php';
				include($url);
			}

		?>
	</div>

</body>

</html>
