
<?php	
	include('connect.php');
	
	//Se seleccionadn todos los campos y filas en la tabla videos yse almacenan en la variable rawData
	$rawData = mysql_query("SELECT * FROM videos");
	if (!$rawData ) {
    	echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    	exit;
	}

	// Se inicializa un array de datos vacio
	$data = Array();
	$i = 0;
	//Se loopea sobre el array de datos que contiene rawData, pasando los datos a un array asociativo.
	// Esto se logra con la funcion mysql_fetch_assoc();
	while ($row = mysql_fetch_assoc($rawData)) {
        $data[$i] = $row;
        $i++;
    }
    //print_r($data);
?>
    
<html>
	<head>
		<title>Admin Sub-sub</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var data = {};
				//Itera sobre todos los botones con clase "enviar"
				$.each($('.enviar'), function(i,v){
					
					//Asocia al evento click de cada elemento la siguiente funcion
					$(v).click(function(){
						//Se almacena el id del boton, que corresponde al del id del video (id que se construye cuando
						// se traen los datos de la DB
						var id = this.id;
						//se agrega el id al array de datos data
						data['id'] = id;
						//se itera sobre todos los elementos que tienen como clase el ID de vimeo correspondiente al 
						//boton presionado, como se indica en el punto de mas arriba
						$.each($('.' + id), function(index, val){

							//para cada elemento con esta clase, se recupera el valor alamcenado en data-key, este se utiliza como
							//indice para el armado del array data, completando asi todos los datos que van a ser actualizados.
							//val.value corresponde con el valor (entrada del usuario) de cada input sobre el que se esta iterando
							data[$(val).data("key")] = val.value;
							
						})
						//Se procede a enviar los datos utilizando el metodo POST, a la url update.php que procesara los datos enviados
						$.ajax({
							data: data,
							url: "update.php",
							type: "POST",
							success: function(d){
								//Esta funcion se ejecuta cuando la conexion y el envio de datos fue exitoso, imprimira en
								//consola la respuesta de parte del servidor
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
				<input id="<?php echo $v['id']?>" type="button" value="enviar" class="enviar">
			</ul>
		</div>

	<?php endforeach; ?>

	 		
		

	</body>
</html>