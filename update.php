<?php 
	include('connect.php');
	
	$nombre = mysql_real_escape_string($_POST['nombre']);
	$director = mysql_real_escape_string($_POST['director']);
	$pais = mysql_real_escape_string($_POST['pais']);
	$duracion = mysql_real_escape_string($_POST['duracion']);
	$comentario = mysql_real_escape_string($_POST['comentario']);
	$vimeoId = $_POST['vimeo_id'];
	$id = $_POST['id'];

	$sql = "UPDATE videos SET nombre='".$nombre."', director='".$director."', pais='".$pais."', duracion='".$duracion."', comentario='".$comentario."', vimeo_id=".$vimeoId." WHERE id=".$id;
	
	$rawData = mysql_query($sql);
	if (!$rawData ) {
    	echo "Could not successfully run query ($rawData ) from DB: " . mysql_error();
    	exit;
	}
?>