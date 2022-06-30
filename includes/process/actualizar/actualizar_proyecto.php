<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$nombre_proyecto=$_GET["nombre_proyecto"];
$extension=$_GET["id_entregable"];
$codigo=$_GET["codigo"];
$presupuesto=$_GET["presupuesto"];
$estado=$_GET["estado"];
$fecha=$_GET["fecha"];



$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  proyecto set  extencion = '".$extension."',nombre_proyecto = '".$nombre_proyecto."',presupuesto = '".$presupuesto."',estado = '".$estado."' where codigo = '".$codigo."'";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>