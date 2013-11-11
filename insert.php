<?php 
	include('connect.php');
	//print_r($_POST);
	$VimeoId = $_POST["vimeo_id"];
 	 $Nombre = $_POST["nombre"];
 	 $Director = $_POST["director"];
 	 $Pais = $_POST["pais"];
 	 $Duracion = $_POST["duracion"];
 	 $Comentario = $_POST["comentario"];
 	 
 	 //mysql_query("INSERT INTO Test (test1, test2) VALUES (".$test1.", ".$test2.")");

	$query = mysql_query("INSERT INTO videos (nombre, director, pais, duracion, comentario, vimeo_id) VALUES ('$Nombre', '$Director', '$Pais', '$Duracion', '$Comentario', '$VimeoId')");
 	 if(!$query){
 	 echo mysql_error();
 	}else{
 	header("Location: agregar.php");
die();
}
?>
