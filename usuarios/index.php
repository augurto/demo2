<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/");
    exit;
}

require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
$sald=mysqli_query($con,"SELECT Sum(presupuesto) as saldo FROM proyecto where estado='terminado'");
        $rwt=mysqli_fetch_array($sald);
        $saldo=$rwt['saldo'];
        $usuario=$_SESSION["username"];
        $id_usuario=$_SESSION["id"];
        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- incluyendo bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">

    <!-- inicio datatables -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  

    <!-- fin datatable -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Mantiz</title>
</head>
<body>
  <!-- datos de sesion -->
  <input type="hidden" value="<?php echo $usuario;?>">
  <input type="hidden" value="<?php echo $id_usuario;?>">
  <!-- fin de datos sesion -->
    <!-- procesos de modal -->
    

    
    <!-- fin de procesos de modal -->

    <?php include '../includes/header.php';?>
    <div style="height:50px"></div>

<div class="container mt-5" style="background-color: #f9f9f9;">
  <br>
  <h1 class="text-center">
    <strong>Campos dinamicos para asignar usuarios</strong>
  </h1>
  <hr /><br>

<form action="recib.php" method="POST">

  <div class="row text-right">
    <div class="col-md-12">
      <button class="btn add-btn btn-info">+</button>
    </div>
  </div>

  <div class="form-row">
    <div class="col-md-3">
      <label>Proyecto</label>
      <select name="PRODUCTO[]" class="form-control">
        <option value="Pan">Proyecto1</option>
        <option value="Harina">Proyecto2</option>
        <option value="Pasta">Proyecto3</option>
      </select>
    </div>

    <div class="col-md-3">
      <label># ORDEN</label>
      <input type="number" name="NUMERO_ORDEN[]" class="form-control">
    </div>

    <div class="col-md-3">
      <label>Rol</label>
      <select name="ESTADO[]" class="form-control">
        <option value="ACTIVO">Colaborador</option>
        <option value="INACTIVO">Jefe de Proyecto</option>
      </select>
    </div>
</div>

<div class="newData"></div>

  <div class="row text-center mt-5">
     <div class="col-md-12">
    <input type="submit" class="btn btn-primary" value="Registrar"/>
  </div>
  </div>
  <br>
</form>
</div>
 
<?php include '../includes/footer.php';?>
  <script type="text/javascript">
    $(function () { 
      var i = 1;
      $('.add-btn').click(function (e) {
        e.preventDefault();
          i++;

        $('.newData').append('<div id="newRow'+i+'" class="form-row">'
        
            +'<div class="col-md-6">'
              +'<label># ORDEN</label>'
              +'<input type="number" name="NUMERO_ORDEN[]" value="'+i+'" class="form-control">'
            +'</div>'
            +'<div class="col-md-6">'
              +'<label>Rol</label>'
              +'<select name="ESTADO[]" class="form-control">'
              +'<option value="">Selecciona un rol</option>'
              +'<option value="ACTIVO">Colaborador</option>'
              +'<option value="INACTIVO">Jefe de Proyecto</option>'
              +'</select>'
            +'</div>'
            +'<a href="#" class="remove-lnk" id="'+i+'">Eliminar "'+i+'"</a>'
            +'</div>'
          );  
      });
 

       $(document).on('click', '.remove-lnk', function(e) {
         e.preventDefault();

          var id = $(this).attr("id");
           $('#newRow'+id+'').remove();
        });
 
    });
  </script>
</body>
</html>