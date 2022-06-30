
<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection


$entregable=$_GET["entregable"];
$proyecto=$_GET["proyecto"];
$id_entregable=$_GET["id_entregable"];


if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$sql = "DELETE from archivos WHERE a_codigo_proyecto='".$proyecto."' and documento='".$entregable."' ";
if (mysqli_query($conn, $sql)) {
    unlink('../../../archivos/'.$proyecto.'/'.$id_entregable.'/'.$entregable.'');

    echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$proyecto'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>
