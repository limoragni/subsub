
<?php	
	include('connect.php');
	
	$rawData = mysql_query("SELECT * FROM videos");
	if (!$rawData ) {
    	echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    	exit;
	}

	$data = Array();
	$i = 0;
	while ($row = mysql_fetch_assoc($rawData)) {
        $data[$i] = $row;
        $i++;
    }
?>
    
<html>
	<head>
		<title>Admin Sub-sub</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var data = {};
				$.each($('.enviar'), function(i,v){
					$(v).click(function(){
						var id = this.id;
						data['id'] = id;
						$.each($('.' + id), function(index, val){
							data[$(val).data("key")] = val.value;
						})
						$.ajax({
							data: data,
							url: "update.php",
							type: "POST",
							success: function(d){
								console.log(d);
							}
						});
					});
				});
				
			});
		</script>
	</head>
	<body>
    
    
	<?php foreach($data as $v):?>
		<div>
			<iframe src="http://player.vimeo.com/video/<?php echo $v['vimeo_id']?>" width="250" height="150" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			<ul>
				<label>Vimeo Id</label>
				<br>
				<input type='text' data-key="vimeo_id" class="<?php echo $v['id']?>" value='<?php echo $v['vimeo_id']?>'>
				<br>
				<br>
				<label>Nombre</label>
				<br>
				<input type='text' data-key="nombre" class="<?php echo $v['id']?>" value='<?php echo $v['nombre']?>'>
				<br>
				<br>
				<label>Director</label>
				<br>
				<input type='text' data-key="director" class="<?php echo $v['id']?>" value='<?php echo $v['director']?>'>
				<br>
				<br>
				<label>Pais</label>
				<br>
				<input type='text' data-key="pais" class="<?php echo $v['id']?>" value='<?php echo $v['pais']?>'>
				<br>
				<br>
				<label>Duracion</label>
				<br>
				<input type='text' data-key="duracion" class="<?php echo $v['id']?>" value='<?php echo $v['duracion']?>'>
				<br>
				<br>
				<label>Comentario</label>
				<br>
				<textarea data-key="comentario" class="<?php echo $v['id']?>"><?php echo $v['comentario']?></textarea>
				<br>
				<br>
				<input id="<?php echo $v['id']?>"" type="button" value="enviar" class="enviar">
			</ul>
		</div>
	<?php endforeach; ?>

	</body>
</html>