<?php
session_start();
include "../includes/variablesusuario.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles.css" rel="stylesheet" type="text/css" />
<title>Panel de Control: Lista Productos</title>
</head>

<body>
<div id="container">


<div class="header">

 <div class="nombre"><?php  echo "Usuario: ".$_SESSION['nombre'] ?></div> 
 </div>
<div class="box"><a href="listaproductos.php">Ver Lista de Productos</a> | <a href="listausuarios.php">Ver Lista de Usuarios</a></div>
<div class="box"><a href="altaproductos.php">Alta de Productos</a> | <a href="altausuarios.php">Alta de Usuarios</a></div>

  <h1>Panel de Control : Lista de Productos</h1>
  
  <div id="seleccion"> 
<form id="form1" name="form1" method="post" action="">
    <label>
      <select name="categorias" id="categorias">
        <option value="0">Seleccionar la categoria</option>
        <option value="Notebook">Notebook</option>
        <option value="Monitores">Monitores</option>
        <option value="Otros">Otros</option>
      </select>
    </label>
    <label>
    <input type="submit" name="button" id="button" value="Enviar" />
    </label>
  </form>
 </div>


 
 <div id="listado">
   
   <?php
   
    
   
//Lista los productos segun su categoria
$conexion = mysql_connect("localhost","cursophp","123");
if(!$conexion){ die('No he podido conectar: '.mysql_error()); }
mysql_select_db("ex2db",$conexion);

$sql = "SELECT * FROM productos WHERE categoria='Notebook';";

$ejecuto = mysql_query($sql,$conexion);

while ($fila = mysql_fetch_array($ejecuto)){
echo 
"
<div class='item'>
<h2>".$fila['titulo']."</h2>

<div class='col_izq'>
	      <div class='foto'><img src=\"productos/".$fila['foto'].".jpg\" width=\"100\" height=\"100\" alt=\"Productos\" /></div>

 <div class='precio'>u\$s ".$fila['precio']."</div> 
 
  </div>
      <div class='col_der'>
 	    <div class='descripcion'>".$fila['descripcion']."</div>
	    <div class='enlace'><a href=\"".$fila['fabricante']."\"><em>".$fila['fabricante']."</em></a></div>
      </div>" 
;
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