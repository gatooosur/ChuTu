<?php 

require('conexion.php');
$host='localhost';
$user='root';
$pass='';
$db='progresardb';
$patente=$_GET['id'];

if ($link=conectarse($host,$user,$pass,$db)) {
	$sql='delete from vehiculos where patente='.$patente;
	$query=mysql_query($sql,$link); //se inserta la consulta y la conexion
	if ($query) {
		echo "<script>window.location.href='listado.php';</script>";
	}else{
		echo "Registro no eliminado";
		echo '<a href="listado.php">Volver</a>';
	}
}
?>