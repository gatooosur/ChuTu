<?php 

session_start();
require('conexion.php');

$host='localhost';
$user='root';
$pass='';
$db='progresardb';

//if (!empty($_SESSION['patente'])) {
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {	
	if ($link=conectarse($host,$user,$pass,$db)) {
	$sql="select * from vehiculos";
	$query=mysql_query($sql,$link);
	if (mysql_num_rows($query)>0) { ?>
		<table border='5'>
			<tr>
				<th>Modelo</th>
				<th>Año</th>
				<th>Patente</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Estado</th>
				<th>Fecha de Ingreso</th>
				<th>Fecha de Egreso</th>
				<th>Observación</th>
			</tr>
			<?php 
				while($row=mysql_fetch_array($query)) { ?>
					<tr>
						<td><?php echo $row['modelo'];?></td>
						<td><?php echo $row['year'];?></td>
						<td><?php echo $row['patente'];?></td>
						<td><?php echo $row['nombre'];?></td>
						<td><?php echo $row['apellido'];?></td>
						<td><?php echo $row['estado'];?></td>
						<td><?php echo $row['ifecha'];?></td>
						<td><?php echo $row['efecha'];?></td>
						<td><?php echo $row['obs'];?></td>
						<td><a href="eliminar.php?id=<?=$row['patente']?>">Eliminar</a>
							<a href="modificar.php?id=<?=$row['patente']?>">Editar</a>
							<a href="alta.php?id=<?=$row['patente']?>">Agregar</a></td> <!-- va por via GET-->
					</tr>
				<?php } ?>
		</table>
		<br><br><a href="salir.php">Salir</a>		
	<?php }		//separar los corchetes, sino da sintaxis de error
	}
} else {
	echo "Sesion no iniciada";
}	
//} else {
	//echo "<script>window.location.href='listado.php';</script>";
//}
?>