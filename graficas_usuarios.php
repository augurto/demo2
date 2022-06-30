<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/");
    exit;
}

require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];

/* array para la grafica */

$dataPoints1 = array();
$dataPoints2 = array();
$dataPoints3 = array();

//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=u415020159_mantizb;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'u415020159_mantizb', //'root',
                        'Mantizb*#17', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
                    $handle = $link->prepare('SELECT  usuario,proyecto, COUNT(valor3) AS VAL from auditoria where valor3=2 GROUP BY proyecto'); 
                    $handle->execute(); 
                    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
                        
                    foreach($result as $row){
                        
                        array_push($dataPoints1, array("label"=> $row->VAL, "y"=> $row->proyecto));
                    }

                    $handle1 = $link->prepare('SELECT   usuario,proyecto, COUNT(valor3) AS VAL from auditoria where valor3=1 GROUP BY proyecto '); 
                    $handle1->execute(); 
                    $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);
                        
                    foreach($result1 as $row1){
                      
                        array_push($dataPoints2, array("label"=> $row1->VAL, "y"=> $row1->proyecto));
                    }

                    $handle2 = $link->prepare('SELECT  usuario, proyecto, COUNT(valor3) AS VAL from auditoria where valor3=0 GROUP BY proyecto'); 
                    $handle2->execute(); 
                    $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);
                        
                    foreach($result2 as $row2){
                      
                        array_push($dataPoints3, array("label"=> $row2->VAL, "y"=> $row2->proyecto));
                    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

 
/* $dataPoints1 = array(
	array("label"=> "2010", "y"=> 36.12),
	array("label"=> "2011", "y"=> 34.87),
	array("label"=> "2012", "y"=> 40.30),
	array("label"=> "2013", "y"=> 35.30),
	array("label"=> "2014", "y"=> 39.50),
	array("label"=> "2015", "y"=> 50.82),
	array("label"=> "2016", "y"=> 74.70)
); 
$dataPoints2 = array(
	array("label"=> "PROYECTO1", "y"=> 64.61),
	array("label"=> "PROYECTO2", "y"=> 70.55),
	array("label"=> "PROYECTO3", "y"=> 72.50),
	array("label"=> "PROYECTO4", "y"=> 81.30),
	array("label"=> "PROYECTO5", "y"=> 63.60),
	array("label"=> "PROYECTO6", "y"=> 69.38),
	array("label"=> "PROYECTO7", "y"=> 98.70)
);
$dataPoints3 = array(
	array("label"=> "PROYECTO1", "y"=> 64),
	array("label"=> "PROYECTO2", "y"=> 70),
	array("label"=> "PROYECTO3", "y"=> 72),
	array("label"=> "PROYECTO4", "y"=> 81),
	array("label"=> "PROYECTO5", "y"=> 63),
	array("label"=> "PROYECTO6", "y"=> 69),
	array("label"=> "PROYECTO7", "y"=> 98)
);
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



    <script>
            window.onload = function () {
            
                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        exportEnabled: true,
                        theme: "light1", // "light1", "light2", "dark1", "dark2"
                        title:{
                            text: "Most Number of Centuries across all Formats till 2017"
                        },
                        axisX:{
                            reversed: true
                        },
                        axisY:{
                            includeZero: true
                        },
                        toolTip:{
                            shared: true
                        },
                        data: [{
                            type: "stackedBar",
                            name: "Test",
                            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                        },{
                            type: "stackedBar",
                            name: "ODI",
                            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                        },{
                            type: "stackedBar",
                            name: "T20",
                            indexLabel: "#total",
                            indexLabelPlacement: "outside",
                            indexLabelFontSize: 15,
                            indexLabelFontWeight: "bold",
                            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
                        }]
                    });

                chart.render();
            
            }
    </script>
</head>
<title>Mantiz-Grafica</title>
<body>
      <!-- datos de sesion -->
  <input type="hidden" value="<?php echo $usuario;?>">
  <input type="hidden" value="<?php echo $id_usuario;?>">
  <!-- fin de datos sesion -->
    <!-- procesos de modal -->
    

    <!-- fin de procesos de modal -->

    <?php include 'includes/header.php';?>
    
    <br>
    <!-- Contenido de la tabla -->
    <?php include 'includes/parts/graficas_entregable_vacio.php'; ?>
  
    <!-- Fin del contenido de la tabla -->

  
   
<div class="container">
  <div class="row">
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>

  </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php  include 'includes/footer.php'?>
</body>
</html>  