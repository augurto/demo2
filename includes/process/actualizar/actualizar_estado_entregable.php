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
$usuario=$_GET["usuario"];
$estado_entregable=$_GET["estado_entregable1"];
$hoy = date("Y-m-d H:i:s"); 




if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
 
$insertarUno=$conn->query("UPDATE  archivos set  a_estado_seguimiento = '".$estado_entregable."' where a_id = '".$id."'");
if ($insertarUno==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA 2
                    {
                        $insertarDos=$conn->query("INSERT INTO auditoria (valor1, valor2, valor3, fecha_modificacion, tipo_dato, usuario, proyecto) VALUES ('$id','$id_p','$estado_entregable', '$hoy', 'Actualizacion de entregables','$usuario', '$id_p' ) ");}

/* $sql = "UPDATE  users set  tipo_user = '1' where id = '".$id_users."'"; */
 if($insertarDos=true)// MENSAJE DE CONFIRMACIÓN DE INSERCIÓN
                    {
    
    echo"<script language ='JavaScript'>";
      echo "location='../../../entregables.php?id_p=$id_p'";
    echo "</script>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>