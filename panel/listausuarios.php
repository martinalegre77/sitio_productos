<?php
session_start();
include "../includes/variablesusuario.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles.css" rel="stylesheet" type="text/css" />
<title>Panel de Control: Lista Usuarios</title>
</head>

<body>
<div id="container">


<div class="header">

 <div class="nombre"><?php  echo "Usuario: ".$_SESSION['nombre'] ?></div> 
 </div>

<div class="box"><a href="listaproductos.php">Ver Lista de Productos</a> | <a href="listausuarios.php">Ver Lista de Usuarios</a></div>
<div class="box"><a href="altaproductos.php">Alta de Productos</a> | <a href="altausuarios.php">Alta de Usuarios</a></div>

  <h1>Panel de Control : Lista de Usuarios</h1>
  

 <div id="listado">

<div class="item">
    <div class="celda"><strong>Usuario</strong></div>
    <div class="celda"><strong>Nombre</strong></div>
    <div class="celda"><strong>Telefono</strong></div>
    <div class="celda"><strong>Email</strong></div>
    <div class="celda"><strong>Permisos</strong></div>
</div>
  
<?php
   
    
   
//Lista los productos segun su categoria
$conexion = mysql_connect("localhost","cursophp","123");
if(!$conexion){ die('No he podido conectar: '.mysql_error()); }
mysql_select_db("ex2db",$conexion);

$sql = "SELECT * FROM usuarios;";

$ejecuto = mysql_query($sql,$conexion);

while ($fila = mysql_fetch_array($ejecuto)){
echo 
"
<div class='item'>
    <div class='celda'>".$fila['usuario']."</div>
    <div class='celda'>".$fila['nombre']."</div>
    <div class='celda'>".$fila['telefono']."</div>
    <div class='celda'>".$fila['email']."</div>
    <div class='celda'>".$fila['permisos']."</div>";
  

     echo" <div class='borrar'>Borrar</div>";
	 echo" <div class='modificar'>Modificar</div>";
 

echo "</div>";
}

mysql_close($conexion);

?>

 </div><!-- Cierra Listado -->
 
</div>
</body>
</html>