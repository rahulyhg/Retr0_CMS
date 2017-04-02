<?php
/******************************************************
*#####################################################*
*#													 #*
*# PluxCMS | Private version | Derechos reservados   #*	
*#													 #*
*# @Author: Genaro Carrillo Pérez <Genarito> 		 #*
*#													 #*
*#####################################################*
*******************************************************/

## Conexion a la base de datos 

//Servidor del host
$host = "localhost";
//Usuario del host
$user = "root";
//Password del host
$pass = "";
//Password del host
$db = "cms";
// Url de tu sitio CON http:// IMPORTANTE.
$Url = "http://localhost"; 
// Url de Sitio SIN http:// IMPORTANTE
$Link = "localhost"; 
// Nombre de tu sitio web
$hotelname = "Habbo";
// Misión que tendran los usuarios al registrarse
$Mision = "Soy nuevo en el hotel"; 
// Portada predeterminada
$Portada = "/content/img/portada.jpg"; 
// Foto de perfil predeterminada
$PerfilD = "/content/img/avatar.png";
// Link para entrar al client, por si quieres poner adf.ly
$Client = "client";  
// Rango minimo para VER la HK.
$Minhkr = "7"; 
// Link de la red social Facebook del holo
$Facebook = "https://www.facebook.com/Kekolays?ref=hl"; 
// Link de la red social Twitter del holo
$Twitter = "http://twitter.com"; 


## NO TOCAR
mysql_connect("$host", "$user", "$pass") or die("Ha ocurrido un error mysql: ".mysql_error()); 
mysql_select_db("$db") or die("Ha ocurrido un error mysql: ".mysql_error()); 

## Usuarios online NO TOQUE
$users = mysql_query("SELECT * FROM server_status");
$on = mysql_fetch_assoc($users);
$UsersOnline = $on['users_online'];
?>