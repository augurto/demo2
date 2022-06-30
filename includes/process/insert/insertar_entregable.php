<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$nombre_entregable=$_GET["nombre"];
$codigo_proyecto2=$_GET["nombre"];
$codigo_proyecto=$_GET["codigo"];
$nombre_proyecto=$_GET["nombre_proyecto"];

$fecha=$_GET["fecha"];



$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO entregables (codigo_proyecto, nombre, fecha_entrega, estado, usuario,nombre_proyecto) 

VALUES ('$codigo_proyecto','$nombre_entregable', '$fecha', '0','$usuario', '$nombre_proyecto')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$codigo_proyecto'";
    echo "</script>";
} else {
      echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$codigo_proyecto&mensaje=1'";
    echo "</script>";
}
mysqli_close($conn);
?>