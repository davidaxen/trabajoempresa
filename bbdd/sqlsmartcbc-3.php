<?php
$server = "localhost";
$username="root";
$password="";
$dbname ="bbddsmartcbc";


try{
$conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conexion realizada";

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>