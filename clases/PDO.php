<?php
global $dbh;

try {
  //mysql:host=HOST;dbname=NOMBRE_DB', 'USUARIO', 'PASSWORD'
  $dbh = new PDO('mysql:host=localhost;dbname=encuestarm', 'root', 'admin123');
  $dbh->exec("set names utf8");
} catch(Exception $e) {
  exit('Error al conectarse con la base de datos: ' . $e->getMessage());
}
?>