 <!-- Modal Nuevo user -->
 <div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <form action="controlador.php" method="POST" id="fnc">
                    <div class="form-floating">
                        <label for="floatingInput">Id</label>
                         <input type="text" class="form-control" name="id">
                     </div>
                     <div class=" form-floating">
                         <label for="floatingInput">Nombre</label>
                         <input type="text" class="form-control" name="nombre">
                     </div>
                     <div class="form-floating">
                         <label for="floatingInput">Fecha Inicio</label>
                         <input type="date" class="form-control" name="fechaInicio">
                     </div>
                     <div class="form-floating">
                        <label for="floatingInput">Fecha Fin Prevista</label>
                        <input type="date" class="form-control" name="fechaFin"">
                     </div>
                      <div class="form-floating">
                         <label for="floatingInput">Dias Transcurridosil</label>
                         <input type="number" class="form-control" name="diasT">
                     </div>
                      <div class="form-floating">
                         <label for="floatingInput">Porcentaje Completadoail</label>
                         <input type="number" class="form-control" name="porcentajeC">
                     </div>
                      <div class="form-floating">
                        <label for="floatingInput">Importancia</label>
                         <input type="number" class="form-control" name="importancia">
                     </div>
                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary" name="nuevo" form="fnc">Guardar</button>
             </div>
         </div>
     </div>
 </div>



<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/bootstrap.bundle.min.js"></script>
