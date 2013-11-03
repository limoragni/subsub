<?php 
	include('connect.php');

	mysqli_query($con,"INSERT INTO videos (nombre, director, pais, duracion, comentario, vimeo_id) VALUES ('.$nombre.', '.$director.','.$pais.','.$duracion.','.$comentario.', '.vimeo_id.' WHERE id= $.id)");

<?php 

	echo $newRow
	mysqli_close($con);

?>