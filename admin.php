
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

    //Para entender el resultado hasta el momento de que es lo que hay dentro de $data pongo este print
    //acordate de mirarlo en chrome que esta mas claro que en pantalla
    print_r($data);
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
				
				//-----------------------
				// EN ESTE CASO SE ESTA ITERANDO SOBRE TODOS LOS BOTONES CON CLASE INSERTAR. EL TEMA ES QUE HAY UNO SOLO
				// NADA GRAVE, PERO PUEDE RESOLVERSE CON UN ID
				$.each($('.insertar'), function(i,v){
					//SE ASOCIA UN EVENTO DE CLICK A AL BOTON .INSERTAR
					$(v).click(function(){
						//APARECE UN ECHO DE PHP DESCOLGADO QUE SOLAMENTE VA A DAR UN ERROR CUANDO SE HAGA CLICK EN ESTE BOTON
						echo $newRow;
						//SE ALMACENA EN LA VARIABLE ID EL ID DEL BOTON QUE ESTA SIENDO TOCADO
						var id = this.id;
						// SE TRATA DE GUARDAR ESTE ID EN UN ARRAY QUE NUNCA FUE CREADO EN JAVASCRIPT
						newRow['id'] = id;
						$.each($('.' + id), function(index, val){
							newRow[$(val).data("key")] = val.value;
						})
						$.ajax({
							newRow: newRow,
							url: "insert.php",
							type: "POST",
							success: function(d){
								console.log(d);
							}
						});
					});
				});
				//---------------------------------
			});
		</script>
	</head>
	<body>
    
    	<div>
			<?php 
				//ACA SE ESTA CREANDO UN ARRAY VACIO, QUE NO ESTA TOMANDO DATOS DE NINGUN LUGAR
				$newRow = Array();
			?>
			<ul>
				<br>
				<p>Agregar</p>
				<br>
				<label>Vimeo Id</label>
				<br>
				<!-- EN CADA UNA DE LA LINEAS EN LAS QUE SE USA  <?php echo $newRow ...  ?> SE ESTAN TOMANDO DATOS INEXISTENTES
				YA QUE EL ARRAY ESTA VACIO-->
				<input type='text' data-key="vimeo_id" class="<?php echo $newRow['id']?>" value='<?php echo $newRow['vimeo_id']?>'>
				<br>
				<br>
				<label>Nombre</label>
				<br>
				<input type='text' data-key="nombre" class="<?php echo $newRow['id']?>" value='<?php echo $newRow['nombre']?>'>
				<br>
				<br>
				<label>Director</label>
				<br>
				<input type='text' data-key="director" class="<?php echo $newRow['id']?>" value='<?php echo $newRow['director']?>'>
				<br>
				<br>
				<label>Pais</label>
				<br>
				<input type='text' data-key="pais" class="<?php echo $newRow['id']?>" value='<?php echo $newRow['pais']?>'>
				<br>
				<br>
				<label>Duracion</label>
				<br>
				<input type='text' data-key="duracion" class="<?php echo $newRow['id']?>" value='<?php echo $newRow['duracion']?>'>
				<br>
				<br>
				<label>Comentario</label>
				<br>
				<textarea data-key="comentario" class="<?php echo $newRow['id']?>"><?php $newRow['comentario']?></textarea>
				<br>
				<br>
				<input id="<?php echo $newRow['id']?>" type="button" value="insertar" class="insertar">
			</ul>
		</div>

	<!-- El array de datos $data contiene los datos que son enviados por el servidor, o sea los datos que pedimos y ordenamos
		mas arriba en este codigo. A continuacion, se itera sobre ese array de datos, escrbiendo el codigo que esta debajo
		del foreach, por cada una de las entradas del array data. En todas las lineas donde aparece la plabra echo precedida 
		del tag de php es porqe se esta imprimiendo el valor de una variable. En este caso $v corresponde con el elemento sobre
		el que se esta iterando. -->
	<?php foreach($data as $v):?>
		<div>
			<!-- En esta linea se arma un iframe que va a contener el video de vimeo, se utiliza el id correspondiente
			a la entrada del array que esta siendo iterada, ese valor esta representado por  <?php echo $v['vimeo_id']?> 
			sonde $v es el elemento sonre el que se esta iterando (o sea uno de los arrays asociativos que corresponden a una
			de las filas en la DB) y ['vimeo_id'] es el indice que corresponde con la columna de la DB donde esta guardado el
			id de vimeo-->
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