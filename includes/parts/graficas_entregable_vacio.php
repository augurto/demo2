<?php

      $tp=mysqli_query($con,"SELECT count(*) as tp FROM entregables ");
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
      $tp2=mysqli_query($con,"SELECT COUNT(DISTINCT id_seg) as tp2 FROM archivos ");
      $rwp2=mysqli_fetch_array($tp2);
      $tps2=$rwp2["tp2"];
      $cod1=$_GET["id_p"];
      $tp3=mysqli_query($con,"SELECT COUNT(DISTINCT a_usuario) as tp3 FROM archivos where a_codigo_proyecto= $id_p");
      $rwp3=mysqli_fetch_array($tp3);
      $tps3=$rwp3["tp3"];

      $te=mysqli_query($con,"SELECT count(*) te from archivos a inner join entregables e on a.id_seg=e.id");
      $rwe=mysqli_fetch_array($te);
      $tes=$rwe["te"];

      $ti=mysqli_query($con,"SELECT count(*) ti from archivos a right join entregables e on a.id_seg=e.id where a.id_seg IS NULL");
      $rwi=mysqli_fetch_array($ti);
      $tin=$rwi["ti"];

		$sql="SELECT * FROM  proyecto order by id desc";
		$query = mysqli_query($con, $sql);       
      
			?>
<div class="container">
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="../../reporte_entregable.php">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Entregables</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tes;?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-clipboard-list  fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </div>
                    </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="../../reporte_entregable0.php">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Entregables vacios</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tin;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Colaborador</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $tes;?></div>
                        </div>
                        <div class="col">
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jefe de Proyecto</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tin;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>