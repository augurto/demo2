<script >
                                      $(document).on("click", "#btnmodal",function () {
                                        
                                              var codigo =$(this).data('cod');
                                          var apellido =$(this).data('ape');

                                        $("#codigo").val(codigo);
                                        $("#apellido").val(apellido);
                          
                                      })
                                      var objetivo = document.getElementById('texto_nav1');
                                      objetivo.innerHTML = apellido;
                                    </script>
<!-- Modal -->
<!-- <form action="../../includes/process/eliminar/eliminar_proyecto.php" method=""> -->
<form action="#" method="">
    <div class="modal fade" id="ModalBorrarEntregable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Borrar Entregable</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                        <div class="modal-body">
                        <input type="text" id="codigo" name="codigo" ><br>
                        <input type="text" id="apellido" name="apellido" ><br>
                            
                            <div class="alert alert-danger" role="alert">
                              <center>
                            <label for=""> Estas seguro que quieres eliminar el Entregable <?php ?> </label>
                            <label id="texto_nav1"></label>          
                            
                            </center>
                          </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Arrugo</button>
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </div>
            </div>
        </div>
    </div>
  </form>