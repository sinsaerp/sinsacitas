
<!-- Modal -->
<div wire:ignore.self class="modal fade bs-example-modal-lg" id="notificacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">RESERVA DE CITA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               <h3>Se ha CREADO el usuario en el sistema.  </h3>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="redireccionar()"  class="btn btn-primary close-btn" data-dismiss="modal">ACEPTAR</button>

            </div>
        </div>
    </div>
</div>
