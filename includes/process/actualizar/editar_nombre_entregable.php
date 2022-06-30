<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection

$nombre_proyecto=$_GET["nuevo_nombre"];
$id_entregable=$_GET["id_entregable"];
$id_p=$_GET["id_p"];
$id_p2=trim($id_p);
$usuario=$_GET["usuario"];
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  entregables set  nombre = '".$nombre_proyecto."',usuario = '".$usuario."' where id = '".$id_entregable."'";
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$id_p2'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>