<script type="text/javascript" src="js/jquery.js"></script>
<form method="POST" action="insert.php">
<!-- <input type="text" name="test1"/>
<input type="text" name="test2"/> -->
	<br>
	<br>
	<label>Nuevo Video</label>
	<br>
	<br>
	<label>Vimeo Id</label>
	<br>
	<input type='text' name="vimeo_id">
	<br>
	<br>
	<label>Nombre</label>
	<br>
	<input type='text' name="nombre">
	<br>
	<br>
	<label>Director</label>
	<br>
	<input type='text' name="director">
	<br>
	<br>
	<label>Pais</label>
	<br>
	<input type='text' name="pais">
	<br>
	<br>
	<label>Duracion</label>
	<br>
	<input type='text' name="duracion">
	<br>
	<br>
	<label>Comentario</label>
	<br>
	<textarea name="comentario"></textarea>
	<br>
	<br>
	<input id="insertar" type="submit" value="submit"/> 	
	<!--<input data-key="test1" type="text" id="test1" class="env"/>
 	<input data-key="test2" type="text" id="test2" class="env"/>-->

</form>
<!-- <script type="text/javascript">
// $(document).ready(function(){
// 	$('#insertar').click(function(){	
// //		var data = {
// //			test1: $("#test1").val(),
// //			test2: $("#test2").val()
// //		}
// 		var data = {}
//  		$.each($(".env"), function(i,v){
//  	 		data[$(v).data("key")] = v.value;
//  		});
// 		$.ajax({
// 			data: data,
// 			url: "insert.php",
// 			type: "POST",
// 			success: function(d){
// 				console.log(d);
// 			},
// 			error: function(x, err){
// 				console.log(err);
// 			}
// 		});
// 	})
// });
// </script> -->