<?php 
function conectarse ($host,$user,$pass,$db) {
	if (!$link=mysql_connect($host,$user,$pass)) {
		echo "No se pude conectar";
		exit();
	}
	if (!mysql_select_db($db)) {
		echo "Error al seleccionar la base de datos";
		exit();
	}
	return $link;
}
?>