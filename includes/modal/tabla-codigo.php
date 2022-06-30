
        <!--Ejemplo tabla con DataTables-->
  
              
       
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        
                        <thead>
                    <tr>
                    	<th>ID</th>
                      <th>Proyecto</th>
                      <th>Codigo</th>
                      <th>Presupuesto</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
				<?php
				$count=1;
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id'];
						$nombre=$row['nombre_proyecto'];
						$codigo_=$row['codigo'];
						$estado=$row['estado'];
						$fecha=$row['fecha_agregado'];
            $descripcion=$row['descripcion'];
						$presupuesto=$row['presupuesto'];
						if ($estado=='terminado'){$label_class='primary'; $ico='check';}
						else if ($estado=='activo'){$label_class='warning '; $ico='info';}
						else{$text_estado="inactivo";$label_class='danger'; $ico='exclamation-triangle';}

						$g=mysqli_query($con,"SELECT count(*) as total FROM entregables WHERE codigo_proyecto='".$codigo_."'");
            $rw=mysqli_fetch_array($g);
            $total=$rw["total"];

                   		$s=mysqli_query($con,"SELECT count(*) as total_seg FROM seguimientos WHERE codigo_proyecto='".$codigo_."'");
                   		$rws=mysqli_fetch_array($s);
                   		$total_s=$rws["total_seg"];
          				
          				if($total_s!=0){
          					$r=100/$total;
          					$rst=$r*$total_s;
          				}else{
          					$r=0;
          					$rst=$r*$total;
          				}
          				
					?>
		

                    <tr>
                    	<td><?php echo $count++; ?></td>
                      <td><a href="t_entregables.php?id_p=<?php echo $codigo_; ?>"><?php echo $nombre; ?></a></td>
                      <td width="4%"><?php echo $codigo_; ?></td>
                      <td width="5%">S/<?php echo number_format($presupuesto); ?></td>
                      <td><?php echo $fecha; ?></td>
                      <td><a href="#" class="btn btn-<?php echo $label_class;?> btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-<?php echo $ico; ?>"></i>
                    </span>
                    <span class="text"><?php echo $estado; ?></span>
                  </a></td>
                      <td>

                      	 <!-- <a href="entregables.php?id_p=<?php echo $codigo_; ?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Entregables</span>
                  </a> -->
				<span class="pull-right">
					<a href="#" class='btn btn-primary' data-toggle="modal" data-target="#editProyecto" title='Editar proyecto'  onclick="obtener_datos(<?php echo $id;?>);"><i class="fa fa-edit"></i></a>
						<a href="#" class='btn btn-primary' title='Borrar proyectoooo' onclick="eliminar('<?php echo $codigo_;?>');"><i class="fa fa-trash"></i></a> 
					</span>
					<p></p>
				</td>
				<input type="hidden" value="<?php echo $nombre;?>" id="nombre<?php echo $id;?>">
					<input type="hidden" value="<?php echo $codigo_;?>" id="codigo<?php echo $id;?>">
					<input type="hidden" value="<?php echo $estado;?>" id="estado<?php echo $id;?>">
					<input type="hidden" value="<?php echo $codigo_;?>" id="cod<?php echo $id;?>">
          <input type="hidden" value="<?php echo $descripcion;?>" id="descripcion<?php echo $id;?>">
					<input type="hidden" value="<?php echo $presupuesto;?>" id="presupuesto<?php echo $id;?>">
                    </tr>

					<?php
				}
				?>
				</tbody>
                </table>          
       
  