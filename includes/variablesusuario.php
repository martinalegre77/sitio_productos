<?php

$_SESSION['usuariotemporal']= "admin";

$conexion = mysql_connect("localhost","cursophp","123");
if(!$conexion){ die('No he podido conectar: '.mysql_error()); }
mysql_select_db("ex2db",$conexion);

$sql = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuariotemporal']."';";

$ejecuto = mysql_query($sql,$conexion);

while ($fila = mysql_fetch_array($ejecuto)){
$_SESSION['usuario']=$fila['usuario'];
$_SESSION['nombre']=$fila['nombre'];
$_SESSION['permisos']=$fila['permisos'];
}
mysql_close($conexion);
?>
