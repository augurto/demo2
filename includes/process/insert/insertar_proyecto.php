<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$nombre_proyecto=$_GET["nombre-proyecto"];

$codigo=$_GET["codigo"];

$nuevo_nombre=$extension.'-'.$nombre_proyecto;
$presupuesto=$_GET["presupuesto"];
$ext=$_GET["id_extension"];
$fecha=date("Y-m-d"); 
$fecha_ini=$_GET["fecha_ini"];
$fecha_fin=$_GET["fecha_fin"];
$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "INSERT INTO proyecto (codigo,extencion,nombre_proyecto, presupuesto, estado,usuario_maker, fecha_agregado, fecha_ini, fecha_fin) 

VALUES ('$codigo','$ext', '$nombre_proyecto', '$presupuesto', '0','Ego','$fecha','$fecha_ini','$fecha_fin')";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../index.php'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>