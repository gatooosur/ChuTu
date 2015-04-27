<?php 

require('conexion.php');

$host='localhost';
$user='root';
$pass='';
$db='progresardb';
$patente=@$_GET['id'];


$link=conectarse($host,$user,$pass,$db);

if(@$_POST['editar']) {
	$modelo= $_POST['modelo'];
	$year= $_POST['year'];
	$patente= $_POST['patente'];
	$nombre= $_POST['nombre'];
	$apellido= $_POST['apellido'];
	$estado= $_POST['estado'];
	$ifecha= $_POST['ifecha'];
	$efecha= $_POST['efecha'];
	$obs= $_POST['obs'];

	$sql="UPDATE vehiculos SET modelo='$modelo',year='$year',patente='$patente',nombre='$nombre',apellido='$apellido',estado='$estado',ifecha='$ifecha',efecha='$efecha',obs='$obs' where patente=$patente";
	//echo $sql; exit;
	//echo "<pre>";
	//print_r($_POST);
	//echo "</pre>";
	//exit();

	$query=mysql_query($sql,$link);
	
	if ($query) {
		echo '<script>window.location.href="listado.php";</script>';
	} else {
		echo '<script javascript>alerta("Datos no Modificados")</script>';
	}
} else {

	$patente=@$_GET['id'];
	
	$sql='select * from vehiculos where patente='.(int)$patente; //verificar .(int)
	$query=mysql_query($sql,$link);
	$row=mysql_fetch_array($query); 

	?> <!--me convierte la consulta en un arreglo-->
	
	<form action="" method="post">
		<legend>Datos del Vehiculo registrado</legend><br><br>
		<input type="hidden" name="patente" value="<?=$row['patente']?>">
		<label for="modelo">Modelo del vehículo</label>
		<input type="text" name="modelo" value="<?=$row['modelo']?>">
		<label for="year">Año de fabricación</label>
		<input type="number" name="year" maxlength="4" value="<?=$row['year']?>"><br><br>
		Datos del Propietario <br><br>
		<label for="nombre">Nombre/s: </label>
		<input type="text" name="nombre" value="<?=$row['nombre']?>">
		<label for="apellido">Apellido/s: </label>
		<input type="text" name="apellido" value="<?=$row['apellido']?>"><br><br>
		<label for="estado">Estado del vehículo</label>
		<input type="radio" name="estado" value="ingresado" <?php echo ($row['estado']=='ingresado')?'checked':'';?>> Ingresado
		<input type="radio" name="estado" value="revisado"> <?php echo ($row['estado']=='revisado')?'checked':'';?> Revisado
		<input type="radio" name="estado" value="retirado"> <?php echo ($row['estado']=='retirado')?'checked':'';?> Retirado <br><br>
		Fecha de Ingreso 
		<input type="date" name="ifecha" value="<?=$row['ifecha']?>">
		Fecha de Egreso 
		<input type="date" name="efecha" value="<?=$row['efecha']?>"><br><br>
		<label for="obs">Observaciones</label><br>
		<input type="text" name="obs" value="<?=$row['obs']?>"><br><br>
		<!--<textarea name="<?=$row['name']?>" id="" cols="30" rows="10"></textarea><br><br>
		Nombre:<input type="text" name="nombre" value="<?=$row['nombre']?>"/><br><br>
		Apellido:<input type="text" name="apellido" value="<?=$row['apellido']?>"/><br><br>-->
		<input type="submit" name="editar">
	</form>
	<?php
	
}
?>