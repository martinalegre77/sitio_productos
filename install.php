<?php

//CREAR BASE DE DATOS ex2db ------------------------------------
// Conexión--------------------------------------
$conexion = mysql_connect("localhost","cursophp","123"); // Crear el usuario admin en phpMyAdmin y darle todos los privilegios.
if(!$conexion){ die('No he podido conectar: '.mysql_error()); }
if(mysql_query("CREATE DATABASE ex2db", $conexion)) { 
echo "Se ha creado la base de datos<br /><hr />";
}else{
echo "No se ha podido crear la base de datos por el siguiente error: ". mysql_error()."<hr />";
}
mysql_select_db("ex2db",$conexion);

//CREAR UNA TABLA DE USUARIOS------------------------------------
$sql = "CREATE TABLE usuarios(
usuario Char(40) Not Null,
contrasena Char(40) Not Null,
nombre Char(40),
telefono bigint,
email Char(80),
permisos Int
)";

if(mysql_query($sql, $conexion)) { 
echo "Se ha creado la tabla usuarios <br />"; }else{
echo "No se ha podido crear la tabla usuarios por el siguiente error: ". mysql_error(). "<br />";
}

//CONTENIDO DE PRUEBA PARA LA TABLA USUARIOS
//Insertar
 mysql_query("INSERT INTO usuarios (usuario, contrasena, nombre, telefono, email, permisos) 
 VALUES ('admin', '123', 'AndresYaz',291154220855, 'andresyaz@gmail.com', 1);", $conexion) 
 or die("Problemas en INSERTAR".mysql_error()); 
 
   
//CREAR UNA TABLA DE productos------------------------------------

$sql = "CREATE TABLE productos(
utc Int Not Null,
titulo Char(200),
descripcion Blob(4000),
categoria Char(200),
foto Char(50),
precio Int,
fabricante Char(200)
)";

if(mysql_query($sql, $conexion)) { 
echo "Se ha creado la tabla post <br />";
}else{
echo "No se ha podido crear la tabla post por el siguiente error: ". mysql_error()."<br />";
}

//CONTENIDO DE PRUEBA PARA LA TABLA productos
//Insertar
mysql_query("INSERT INTO productos (utc, titulo, descripcion, categoria, foto, precio, fabricante)
 VALUES (00000000,'Notebook Acer', 'Acer MODELO: Aspire 7551G-7466','Notebook', 'producto1', 875, 'http://www.acer.com');", $conexion) 
   or die("Problemas en INSERTAR".mysql_error());
   
 //Cerrar 
mysql_close($conexion);
