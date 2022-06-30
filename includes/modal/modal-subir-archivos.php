
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>


<!-- Modal -->
<form action="../../includes/process/insert/insertar_archivo.php" method="post"  enctype="multipart/form-data" >
<div class="modal fade" id="modal-subir-archivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Archivos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
                        <?php 

                        $sss2=mysqli_query($con,"SELECT * FROM proyecto where id=$id_p");
                                while($f2=mysqli_fetch_assoc($sss2)){    

                                  $nombre_proyecto=$f2['nombre_proyecto'];

                        }
                        
                        ?>
      <div class="modal-body">
      <div class="input-group mb-3">
      <input type="hidden" value="<?php echo $_GET["id_p"]; ?>" id="codigo" name="codigo" >
      <input type="hidden" value="<?php echo $nombre_proyecto; ?>" id="nombre_proyecto" name="nombre_proyecto" >
      <input type="hidden" value="<?php echo $usuario; ?>" id="usuario" name="usuario" >
        <input type="file" class="form-control"  id="documento" name="documento" aria-label="Username" aria-describedby="basic-addon1">
      </div>  
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Descripcion</span>
        <input type="text" class="form-control" placeholder="Breve descripcion" aria-label="Username" id="descripcion" name="descripcion" aria-describedby="basic-addon1">
      </div>
      
      
      <!-- <b>Marca la casilla para agregar link</b>
      <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
      <br>
      <div class="input-group mb-3" id="content" style="display: none;">
        
        <input type="text" class="form-control" placeholder="Pegue aca el link del drive" aria-label="Username" aria-describedby="basic-addon1">
      </div> -->
       
        
            <div class="input-group mb-3">
              <label class="input-group-text" for="inputGroupSelect01">Entregable...</label>
              <select class="form-control" name="id_entregable" id="id_entregable" required="">
                        <option disabled="disabled" value="" selected>Clic para ver entregables</option>
                        <?php 

                        $sss=mysqli_query($con,"SELECT * FROM entregables where codigo_proyecto=$id_p");
                                while($f=mysqli_fetch_assoc($sss)){    

                                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';

                        }
                        
                        ?>
              </select>
                       
            </div>
              <div class="input-group mb-3">
        
                <input type="hidden" value="<?php echo $f['nombre'];?>" id="nombre_entregable" name="nombre_entregable" class="form-control">
             </div>
             <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Link  Drive</span>
                <input type="text" class="form-control" placeholder="Pegue aqui el link del dirve" id="link" name="link"  aria-label="Username" aria-describedby="basic-addon1">
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar Entregable</button>
      </div>
    </div>
  </div>
</div>

</form>
