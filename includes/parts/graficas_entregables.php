<?php

      $tp=mysqli_query($con,"SELECT count(*) as tp FROM entregables where codigo_proyecto= $id_p");
      $rwp=mysqli_fetch_array($tp);
      $tps=$rwp["tp"];

     

      $tp4=mysqli_query($con,"SELECT count(*) as tp4 FROM archivos where codigo_proyecto= $id_p");
      $rwp4=mysqli_fetch_array($tp4);
      $tps4=$rwp4["tp4"];
      $aprob=mysqli_query($con,"SELECT count(*) as apro FROM archivos where estado_seguimiento= 1");
      $apro=mysqli_fetch_array($aprob);
      $aprobado=$apro["apro"];
      $porcentaje=100/$tps;
      $aprobados=($aprobado/$tps4)*100;
      $tp2=mysqli_query($con,"SELECT COUNT(DISTINCT id_seg) as tp2 FROM archivos where a_codigo_proyecto= $id_p");
      $rwp2=mysqli_fetch_array($tp2);
      $tps2=$rwp2["tp2"];
      $cod1=$_GET["id_p"];
      $tp3=mysqli_query($con,"SELECT COUNT(DISTINCT a_usuario) as tp3 FROM archivos where a_codigo_proyecto= $id_p");
      $rwp3=mysqli_fetch_array($tp3);
      $tps3=$rwp3["tp3"];

      $te=mysqli_query($con,"SELECT count(*) te FROM miembros where rol='estudiante'");
      $rwe=mysqli_fetch_array($te);
      $tes=$rwe["te"];

      $ti=mysqli_query($con,"SELECT count(*) ti FROM miembros where rol='investigador'");
      $rwi=mysqli_fetch_array($ti);
      $tin=$rwi["ti"];

   

		$sql="SELECT * FROM  proyecto order by id desc";
		$query = mysqli_query($con, $sql);       
      
			?>
      
              <div class="container">
                <div class="row">
                        <div class="col-lg-12">

                            <!-- 
                                <div class="col-xl-3 col-md-6 mb-4">
                                  <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de entregables</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tps ;?></div>
                                        </div>
                                        <div class="col-auto">
                                        
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                               
                                <div class="col-xl-3 col-md-6 mb-4">
                                  <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entregables usadas</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tps2;?></div>
                                        </div>
                                        <div class="col-auto">
                                         
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                               
                                <div class="col-xl-3 col-md-6 mb-4">
                                  <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Entregables no utilizadas</div>
                                          <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tps-$tps2;?></div>
                                            </div>
                                            <div class="col">
                                              
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-auto">
                                       
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              
                                <div class="col-xl-3 col-md-6 mb-4">
                                  <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                      <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usarios activos en este proyecto</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tps3;?></div>
                                        </div>
                                        <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usarios activos en este proyecto</div>
                                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tps3;?></div>
                                        </div>
                                        <div class="col-auto">
                                          <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div> -->

                              <?php
                                    
                                    $link = new PDO('mysql:host=localhost;dbname=u415020159_mantizb', 'u415020159_mantizb', 'Mantizb*#17'); 

                              ?>

          <div class="container">
                <div class="row">
                        <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table  class="table table-sm" cellspacing="0" width="100%">
                    
                                  <thead>
                                  <tr>
                                    
                                    <th>Entregable</th>
                                    <th>Progreso</th>
                                    <th>Accion</th>
                                    
                                  </tr>
                                  </thead>
                              <?php foreach ($link->query('SELECT * from entregables where codigo_proyecto="'.$cod1.'"') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
                                <?php 
                                    $bar=mysqli_query($con,"SELECT COUNT(id_seg) as tp2 FROM archivos where id_seg= '".$row['id']."' AND a_estado_seguimiento = 1");
                                    $rwp21=mysqli_fetch_array($bar);
                                    $tps21=$rwp21["tp2"];

                                    $obs0=mysqli_query($con,"SELECT COUNT(a_estado_seguimiento) as obs FROM archivos where id_seg= '".$row['id']."' AND a_estado_seguimiento = 1");
                                    $obs1=mysqli_fetch_array($obs0);
                                    $obs2=$obs1["obs"];
                                    $porcentaje_entregable=100/$obs2;
                                    
                                    $pen0=mysqli_query($con,"SELECT COUNT(a_estado_seguimiento) as pen FROM archivos where id_seg= '".$row['id']."' AND a_estado_seguimiento = 0");
                                    $pen1=mysqli_fetch_array($pen0);
                                    $pen2=$pen1["pen"];
                                    $porcentaje_entregable_pen=100/$pen2;

                                    $red0=mysqli_query($con,"SELECT COUNT(a_estado_seguimiento) as red FROM archivos where id_seg= '".$row['id']."' AND a_estado_seguimiento = 2");
                                    $red1=mysqli_fetch_array($red0);
                                    $red2=$red1["red"];
                                    $porcentaje_entregable_red=100/$red2;


                                    $porcentaje_entregable=100/$tps21;
                                    $bar2=mysqli_query($con,"SELECT a_estado_seguimiento as tp22 FROM archivos where id_seg= '".$row['id']."' AND estado_seguimiento=1");
                                    $rwp21=mysqli_fetch_array($bar2);
                                    $tps211=$rwp211["tp22"];
                                  
                                    $a=($obs2/($obs2+$pen2+$red2))*100 ;
                                    $b=($pen2/($obs2+$pen2+$red2))*100 ;
                                    $c=($red2/($obs2+$pen2+$red2))*100 ;
                                    $total=$a+$b+$c;
                                    $nom_entregable=$row['nombre'];
                                    $id_entr=$row['id'];
                                    $estado_ent=$row['estado'];
                                    ?>
                              <tr>
                                  <?php  if ($estado_ent==2) { ?>
                                  <td class="table-danger"><?php echo $nom_entregable.'-'.$estado_ent; ?></td>

                                  <?php } else {?>
                                  <td>
                                    <style>
                                      #editar_entregable{
                                        border-color: transparent !important;
                                        border-radius: 2px !important;
                                        
                                      }
                                      #editar_entregable:focus {
                                        border-bottom: 1px solid red !important;
                                        
                                        
                                      }
                                    </style>
                                    
                                        <form action="../../includes/process/actualizar/editar_nombre_entregable.php">
                                        <div class="input-group input-group-sm mb-3" >
                                     <div class="input-group">
                                          <input id="editar_entregable" type="text" value=" <?php echo $nom_entregable ?>" name="nuevo_nombre">
                                          <input type="hidden" value=" <?php echo $id_entr ?>" name="id_entregable" >
                                          <input type="hidden" value=" <?php echo $usuario ?>" name="usuario" >
                                          <input type="hidden" value=" <?php echo $id_p ?>" name="id_p" >
                                        <button class="btn btn-outline-primary" type="submit" ><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                        </form>
                                     
                                  </td>
                                  <?php }?>
                                  <td>
                                    

                                  <!-- <div class="progress">
                                  <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $a;?>%;" aria-valuenow="<?php echo $a;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $a ;?>% </div>
                                  <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $b;?>%;" aria-valuenow="<?php echo $b;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $b ;?>% </div>
                                  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $c;?>%;" aria-valuenow="<?php echo $c;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $c ;?>% </div>
                                  </div> -->
                                  <?php if ($total>0) {?>
                                
                                  
                                  <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $a;?>%;" aria-valuenow="<?php echo $a;?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($a,1) ;?>% Aprobado </div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $b;?>%;" aria-valuenow="<?php echo $b;?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($b,1) ;?>% Pendiente</div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $c;?>%;" aria-valuenow="<?php echo $c;?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($c,1) ;?>% Observado</div>
                                  </div>
                                  <?php }else {?>

                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>No existen entregables
                                    </div>
                                    <?php } ?>

                                  </td>
                                  
                                  <?php if ($tipo_user==1) { ?>
                                    <td>
                                      <form action="../../includes/process/actualizar/actualizar_estado_entregable_tabla.php">
                                            <div class="input-group input-group-sm mb-3">
                                              <input type="hidden" value="<?php echo $id_entr; ?>" id="id_entregable" name="id_entregable" >
                                              <input type="hidden" value="<?php echo $id_p; ?>" id="id_p" name="id_p" >
                                              
                                            </div>
                                              <div class="input-group input-group-sm mb-3" >
                                                  <div class="input-group" style="padding: 0px 20px !important;">

                                                      <?php if ($estado_ent==0) { ?>
                                                        <select class="form-select .text-primary" style="border-color: #0275d8 !important;color: #0275d8 !important; "  aria-label="Example select with button addon" id="estado_entregable1" name="estado_entregable1">
                                                        <!-- <option selected></option> -->
                                                          <option selected="selected" value="0">Pendiente</option>
                                                          <option value="1">Aprobado</option>
                                                          <option value="2">Observado</option>
                                                        </select>
                                                      <?php } elseif ($estado_ent==1) { ?>
                                                        <select class="form-select .text-primary" style="border-color: #0275d8 !important;color: #0275d8 !important; "  aria-label="Example select with button addon" id="estado_entregable1" name="estado_entregable1">
                                                        <!-- <option selected></option> -->
                                                          <option  value="0">Pendiente</option>
                                                          <option selected="selected" value="1">Aprobado</option>
                                                          <option value="2">Observado</option>
                                                        </select>
                                                      <?php }else { ?>
                                                        <select class="form-select .text-primary" style="border-color: #0275d8 !important;color: #0275d8 !important; "  aria-label="Example select with button addon" id="estado_entregable1" name="estado_entregable1">
                                                          <!-- <option selected></option> -->
                                                            <option  value="0">Pendiente</option>
                                                            <option value="1">Aprobado</option>
                                                            <option selected="selected"  value="2">Observado</option>
                                                          </select>
                                                      <?php } ?>



                                                      
                                                      <button class="btn btn-outline-primary" type="submit" ><i class="fa fa-check" aria-hidden="true"></i></button>
                                              
                                              
                                                  </div>
                                              </div>
                                    
                                      </form>
                                      </td>                  
                                  <?php } ?>
                                  
                              </tr>
                              <?php
                                }
                              ?>
                </table>


                  
                          <br>
        
                  </div>
            </div>
            </div>
    </div>

