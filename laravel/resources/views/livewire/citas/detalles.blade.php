

<!-- Modal -->
@php
use Carbon\Carbon;
@endphp
<div wire:ignore.self class="modal fade bs-example-modal-lg" id="detallesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETALLES DE CITA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               <table class="table">
                   <tr>
                       <th colspan="4"><b><center>DATOS DEL PACIENTE</center></b></th>
                   </tr>
                   <tr>
                       <th>PACIENTE: </th>
                       <td>{{ $user->FullName }}</td>
                   </tr>
                   <tr>
                    <th>DOCUMENTO: </th>
                    <td>{{ $user->tipidafil.'  '.$user->afcodigo }}</td>
                    </tr>
                    <tr>
                        <th>EPS: </th>
                        <td>{{ $nombreEps }}</td>
                    </tr>
                    <tr>
                        <th>TELEFONO: </th>
                        <td>{{ $user->telefono }}</td>

                    </tr>
                    <tr>
                        <th>DIRECCION: </th>
                        <td>{{ $user->direccion }}</td>
                    </tr>
                    <tr>
                        <th>CORREO: </th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th colspan="4"><b><center>DATOS DE LA CITA</center></b></th>
                    </tr>
                   <tr>
                       <th>TIPO CONSULTA</th>
                       <td>{{ $nombreConsulta }}</td>
                   </tr>
                   <tr>
                    <th>ESPECIALIDAD</th>
                    <td>{{ $nespecialidad }}</td>
                </tr>

                <tr>
                    <th>MEDICO</th>
                    <td>{{ $nmedico }}</td>
                </tr>

                @if(!empty($seleccion))
                <tr>
                    <th>FECHA</th>
                    <td>{{ $fechaFormato }}</td>
                </tr>

                <tr>
                    <th>HORA</th>
                    <td>{{Carbon::parse($horas[$seleccion-1]->hora)->format('h:i A')  }}</td>
                </tr>
                @endif
                @if(!empty($autorizacion))
                <tr>
                    <th>AUTORIZACION</th>
                    <td>{{$autorizacion }}</td>
                </tr>
                @endif
               </table>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">ACEPTAR</button>
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">CERRAR</button>


            </div>
        </div>
    </div>
</div>
