<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/");
    exit;
}
require_once ('config/conexion_tabla.php');
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos

foreach ($link->query('SELECT * from proyecto') as $rowp){ // aca se hace la consulta e iterarla con each. ?> 
 <?php  
    
    $id=$rowp['id'];
    $estado_proyecto=$rowp['estado'];

 }
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];

/* requiere para la extraer la informacion */
        $id_p=$_GET['id_p'];
        $sql=mysqli_query($con,"SELECT * FROM proyecto WHERE codigo='".$id_p."'");
         $rws=mysqli_fetch_array($sql);
         $nombre=$rws["nombre_proyecto"];
        

         $gd2=mysqli_query($con,"SELECT * FROM entregables WHERE  codigo_proyecto='".$id_p."'");
            $rwd2=mysqli_fetch_array($gd2);
            $nom2=$rwd2["nombre"];
            
            $id_ent2=$rwd2["id"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- incluyendo bootstrap -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <!-- inicio datatables -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  

    <!-- fin datatable -->
    <title>Mantiz-Entregables</title>
</head>
<body>


    <?php include 'includes/header.php';?>
    <div style="height:50px"></div>
    <!-- Inicio de Graficas -->
   
    <?php include 'includes/parts/graficas_entregables.php'; ?>
    <?php include 'includes/modal-eliminar/eliminar_entregable.php'; ?>
    <?php include 'includes/modal-editar/editar_entregable.php'; ?>
    <!-- Fin de graficas -->
    <!-- Boton agregar proyecto -->

    
    <?php if ($_GET['mensaje']==1) {
        echo 'Ya existe un entregable con ese nombre';
    }?>
    
          <br>
   
          <div class="container">
              <div class="row justify-content-between">
                  <div class="col-6">
                      <!-- Button trigger modal -->
                      
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-entregable">
                            <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                        
                            </span>Entregables
                            </button>
               
                    
                  </div>    
                  <div class="col-6">
                      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-subir-archivos">
                      <span class="icon text-white-50">
                                  <i class="fas fa-plus"></i>
                      </span>Archivos
                      </button>
                    
                            <?php include 'includes/modal/modal_entregable.php' ?>
                            <?php include 'includes/modal/modal-subir-archivos.php' ?>
                       
                  <!-- Fin Boton agregar proyecto -->
                  </div>     
              </div>    
          </div>
  
       
          
    
    <br>
    <!-- Contenido de la tabla -->
    <?php include 'includes/parts/contenido_entregable.php'; ?>
    <!-- Fin del contenido de la tabla -->

  
    <?php  include 'includes/footer.php'?>


    <!-- Inicio de Script para datatables -->

      <!-- jQuery, Popper.js, Bootstrap JS -->
      <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>   

    <!-- Fin de Script para datatables -->
</body>
</html>