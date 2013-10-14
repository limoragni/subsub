<?php 
	$fuck = '2,3,4,5';
	$fuck2 = explode(',', $fuck);

	print_r($fuck2);

	foreach($fuck2 as $key => $value){
		echo $key . ' ' . $value;
	}
?>