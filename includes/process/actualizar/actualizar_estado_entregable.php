<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
$id=$_GET["id"];
$id_p=$_GET["id_p"];
$estado_entregable=$_GET["estado_entregable1"];





if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "UPDATE  archivos set  a_estado_seguimiento = '".$estado_entregable."' where a_id = '".$id."'";
/* $sql = "UPDATE  users set  tipo_user = '1' where id = '".$id_users."'"; */
if (mysqli_query($conn, $sql)) {
    echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$id_p'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>