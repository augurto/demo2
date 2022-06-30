<?php require_once ('./config/conexion_tabla.php') ?>
<div class="modal fade" id="compromisos" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Sub tipo Proyecto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                        <form action="../../includes/process/insert/insertar_tipo_codigo_proyecto.php">
                        
                        <div class="modal-body">
                        <label for="inputProyec">Nombre del Sub Tipo de Proyecto</label>
                        <div class="input-group mb-3">
                          
                          <br>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-sitemap" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Nombre del Proyecto" id="nombre-tipo" name="nombre-tipo" >
                          
                        </div>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                        
                        </form>

                        
                       


                <div class="modal-body">
                    <table id="example2" class="table table-hover" cellspacing="0" width="100%">
                      
                    <thead>
                          <tr>
                              <th>ID</th>
                              <th>Nombre</th>
                              <th>Accion</th>
                              
                          </tr>
                        </thead>
                        <?php 
                        $count=1;
                        foreach ($link->query('SELECT * from codigo_generado_proyecto order by id_cod_gen_pro desc') as $sub){  ?>
                        <?php
                        
                        $id_codgen=$sub['id_cod_gen_pro'];
                        $variable=$sub['variable'];
                        
                        ?>
                        <tr>    
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $variable;?></td>
                        <?php if ($tipo_user==1) { ?>
                        <td>
                       
                                
                              
                                <a href="../../includes/process/eliminar/eliminar_subtipo.php?id=<?php echo $id_codgen ; ?>&variable=<?php echo $variable ;?>" >
                                  <i class="fas fa-trash" style="color: red;"></i>
                                  <!-- Counter - Messages -->
                                </a>
                               

                        </td>
                        <?php } ?>
                        </tr>
                         <?php } ?>       
                        
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#compromisos > .modal-body').css({width:'auto',height:'auto', 'max-height':'100%'});
                        
                        $('#example2').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar cualquier dato :",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		]	        
    }); 
                    });
                </script>
            </div>
        </div>
    </div>
    <center>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#compromisos">
    <i class="fa fa-plus" aria-hidden="true"></i> sub tipo de Proyecto
</button>
</center>