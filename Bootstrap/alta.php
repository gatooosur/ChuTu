<?php 

require('conexion.php');

$modelo=$_POST['modelo'];
$year=$_POST['year'];
$patente=$_POST['patente'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$estado=$_POST['estado'];
$ifecha=$_POST['ifecha'];
$efecha=$_POST['efecha'];
$obs=$_POST['obs'];

$host='localhost';
$user='root';
$pass='';
$db='progresardb';

if ($patente=="") {				//para validar que se ingrese la patente
	echo "<script>window.location.href='formulario.html';</script>";
}

if ($link=conectarse($host,$user,$pass,$db)) {
	echo "Correcto";
	echo "<br>";
	$sql='insert into vehiculos(modelo,year,patente,nombre,apellido,estado,ifecha,efecha,obs) 
	values("'.$modelo.'","'.$year.'","'.$patente.'","'.$nombre.'","'.$apellido.'","'.$estado.'","'.$ifecha.'","'.$efecha.'","'.$obs.'")';
	//$sql='insert into personas(id,nombre,apellido,sexo,estudia,observacion) values(null,"asdasd","ppasd","h",1,"assad")';
	$query=mysql_query($sql,$link);
	echo "<br>";
	if ($query) {
		echo "Datos guardados";
		echo "<script>window.location.href='listado.php';</script>";
		echo "<br>";
	}else{
		echo "Los datos no se guardaron";
		echo '<a href="formulario.php">Volver</a>';
		echo "<br>";
	}
}

?>