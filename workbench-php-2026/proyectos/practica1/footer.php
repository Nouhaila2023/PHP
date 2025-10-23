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
                         <input type="text" class="form-control" name="dni" placeholder="41234785-F">
                         <label for="floatingInput">Id</label>
                     </div>
                     <div class=" form-floating">
                         <input type="text" class="form-control" name="nombre" placeholder="javier perez">
                         <label for="floatingInput">Nombre</label>
                     </div>
                     <div class="form-floating">
                         <input type="text" class="form-control" name="fechaInicio" placeholder="41234785-F">
                         <label for="floatingInput">Fecha Inicio</label>
                     </div>
                     <div class="form-floating">
                         <input type="email" class="form-control" name="fechaFin" placeholder="javper@gmail.com">
                         <label for="floatingInput">Fecha Fin Prevista</label>
                     </div>
                      <div class="form-floating">
                         <input type="email" class="form-control" name="diasT" placeholder="javper@gmail.com">
                         <label for="floatingInput">EmaDias Transcurridosil</label>
                     </div>
                      <div class="form-floating">
                         <input type="email" class="form-control" name="porcentajeC" placeholder="javper@gmail.com">
                         <label for="floatingInput">EmPorcentaje Completadoail</label>
                     </div>
                      <div class="form-floating">
                         <input type="email" class="form-control" name="importancia" placeholder="javper@gmail.com">
                         <label for="floatingInput">Email</label>
                     </div>
                      <div class="form-floating">
                         <input type="email" class="form-control" name="email" placeholder="javper@gmail.com">
                         <label for="floatingInput">Importancia</label>
                     </div>
                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary" name="nuevoCliente" form="fnc">Guardar</button>
             </div>
         </div>
     </div>
 </div>



<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
