<!-- Modal Nueva Incidencia -->
 <div class="modal fade" id="nuevaIncidencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Incidencia</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <form action="controlador.php" method="POST" id="fni">
                     <div class=" form-floating">
                         <input type="text" class="form-control" name="id" placeholder="00001">
                         <label for="floatingInput">ID</label>
                     </div>
                     <div class="form-floating">
                         <input type="text" class="form-control" name="dni" placeholder="41234785-F">
                         <label for="floatingInput">DNI</label>
                     </div>
                     <div class="form-floating">
                         <input type="text" class="form-control" name="descr" placeholder="No va Internet">
                         <label for="floatingInput">Descripción</label>
                     </div>
                 </form>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary" name="nuevaIncidencia" form="fni">Guardar</button>
             </div>
         </div>
     </div>
 </div>


 <!-- Modal Nuevo Cliente -->
 <div class="modal fade" id="nuevoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <form action="controlador.php" method="POST" id="fnc">
                     <div class=" form-floating">
                         <input type="text" class="form-control" name="nombre" placeholder="javier perez">
                         <label for="floatingInput">Nombre</label>
                     </div>
                     <div class="form-floating">
                         <input type="text" class="form-control" name="dni" placeholder="41234785-F">
                         <label for="floatingInput">DNI</label>
                     </div>
                     <div class="form-floating">
                         <input type="email" class="form-control" name="email" placeholder="javper@gmail.com">
                         <label for="floatingInput">Email</label>
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




 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/bootstrap.bundle.min.js"></script>