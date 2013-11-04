<?php 
	include('connect.php');
	//Se almacena en variables individuales cada valor que esta en el array $POST[] que contiene todos los datos
	//enviados mediante POST a este script. En cada caso se utiliza la funcion mysql_real_escape_string() para escapar
	// el texto. Escapar viene a ser, solucionar los problemas que peude generar que ese texto tenga comillas o cosas 
	// que caguen el codigo mas abajo.
	$nombre = mysql_real_escape_string($_POST['nombre']);
	$director = mysql_real_escape_string($_POST['director']);
	$pais = mysql_real_escape_string($_POST['pais']);
	$duracion = mysql_real_escape_string($_POST['duracion']);
	$comentario = mysql_real_escape_string($_POST['comentario']);
	$vimeoId = $_POST['vimeo_id'];
	$id = $_POST['id'];

	// Se arma un string con la query sql
	$sql = "UPDATE videos SET nombre='".$nombre."', director='".$director."', pais='".$pais."', duracion='".$duracion."', comentario='".$comentario."', vimeo_id=".$vimeoId." WHERE id=".$id;
	
	// Se ejecuta la query y se hace el update
	$rawData = mysql_query($sql);
	if (!$rawData ) {
    	echo "Could not successfully run query ($rawData ) from DB: " . mysql_error();
    	exit;
	}
?>