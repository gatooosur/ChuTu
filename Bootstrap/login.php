<?php
session_start(); //incio de sesion
require('conexion.php');

//parte donde se crea las variables con el signo '$'
$host='localhost';
$user='root';
$pass= '';
$db='progresardb';
//datos recibidos del formulario: usuario y contraseña
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

if ($link=conectarse($host, $user, $pass, $db)) {
	$sql = 'SELECT * FROM usuarios WHERE usuario = "'.$usuario.'" AND contrasena ="'.$contrasena.'"';
	$query = mysql_query($sql,$link);
	//lo recuperado de la consulta lo guardamos en un array
	$row = mysql_fetch_array($query);

	if (mysql_num_rows($query)==1) {
		$_SESSION['id'] = $row['usuario'];
		echo "<script>window.location.href='listado.php';</script>";
	} else {

		header('Location:login.html');
	}
}
?>