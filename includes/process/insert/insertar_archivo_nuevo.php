<?php
$servername = "localhost";
$database = "u415020159_mantizb";
$username = "u415020159_mantizb";
$password = "Mantizb*#17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
$codigo_proyecto=$_POST["codigo"];
$nombre_proyecto=$_POST["nombre_proyecto"];
$id_entregable=$_POST["id_entregable"];
$descripcion=$_POST["descripcion"];
$id_miembro=$_POST["id_miembro"];
$link=$_POST["link"];
$nombre_entregable=$_POST["nombre_entregable"];
$usuario_seguimiento=$_POST["usuario"];

$nombre_documento=$_FILES['documento']['name'];
$guardado=$_FILES['documento']['tmp_name'];


$fecha=$_POST["fecha"];

$direccion=$_POST["id_p"]; /* codigo de proyecto */
$carpeta='../../../archivos/'.$codigo_proyecto.'/'.$id_entregable;



 
echo "Connected successfully";


 


/* $carpeta='archivos/proyectos/'.$direccion; */
$sql = "INSERT INTO archivos (a_codigo_proyecto, documento,id_seg,a_descripcion,id_miembros,link,a_usuario,a_estado_seguimiento, nombre_proyecto)
VALUES ('$codigo_proyecto', '$nombre_documento','$id_entregable','$descripcion','159','$link','$usuario_seguimiento','0','$nombre_proyecto')";

if (mysqli_query($conn, $sql)) {

    if(!file_exists($carpeta)){
        mkdir($carpeta,0777,true);
        if(file_exists($carpeta)){
            if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
                echo "Archivo guardado con exito";
            }else{
                echo "Archivo no se pudo guardar";
            }
    
        }
    }else{
        if(move_uploaded_file($guardado, $carpeta.'/'.$nombre_documento)){
        
            echo "Archivo guardado con exito";
        }else{
            echo "Archivo no se pudo guardar o no seleciono ningun archivo";
        }
    }
    /* header("Location: ver_entregables.php?var1=$direccion"); */
    header("Location: ../../../entregables.php?id_p=$codigo_proyecto");
    exit;
    
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("Location: ../../../entregables.php?id_p=$codigo_proyecto&a_mensaje=1");
    }
    mysqli_close($conn);
    ?>




