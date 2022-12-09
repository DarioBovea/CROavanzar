<?php
  $servername = 'localhost';//'127.0.0.1:3307'
  $username = 'root';
  $password = 'JoseSamuel2@';
  $dbname = 'croavanzar_db';
  try{
    $conn =  new PDO ("mysql:host=$servername; dbname=$dbname", $username, $password);
  }catch (PDOException $Exception){
    die('Conexion Fallida: '.$Exception->getMessage ());
  }
?>