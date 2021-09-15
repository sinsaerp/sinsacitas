<div>
@php
use Carbon\Carbon;
@endphp
    @include('livewire.citas.detalles')
    @include('livewire.citas.notificacion')
    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    <div class="card m-b-30 m-t-10">
        <div class="card-body bootstrap-select-1">
            <h4 class="header-title mt-0">AGENDAMIENTO DE CITAS</h4>
            <div class="row form-material">
                <div class="col-md-6">
                    <h6 class="text-muted fw-400 mt-3">ESPECIALIDAD</h6>
                    <select class="form-control" wire:model="especialidad">
                        <option value="">SELECCIONE</option>
                        @foreach ($especialidades as $item)
                            <option value="{{ $item->id.'-'.$item->nombre }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <h6 class="text-muted fw-400 mt-3">TIPO CONSULTA</h6>
                    <select class="form-control" wire:model="tipo">
                        <option value="">SELECCIONE</option>
                        @foreach ($tipos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="row form-material">
                <div class="col-md-12">
                    <h6 class="text-muted fw-400 mt-3">MEDICO</h6>
                    <select class="form-control" wire:model="medico">
                            <option value="">SELECCIONE</option>
                            @foreach ($medicos as $item)
                                <option value="{{ $item->codigo.'-'.$item->nombre }}">{{ $item->nombre }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

   @if(count($horarios)>0)

   <div class="card m-b-30 m-t-10">
    <div class="card-body bootstrap-select-1">
        <h4 class="header-title mt-0">AGENDA DISPONIBLE</h4>
        <h4 class="header-title mt-0">FECHA SELECCIONADA <b>{{ $fechaFormato }}</b></h4>
        <div class="row form-material">

            <table  class="table table-hover">
                <tr>
                    <td>
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                <div class="input-group-append bg-custom b-0"><span class="input-group-text"><i class="mdi mdi-calendar"></i></span></div>
                            </div><!-- input-group -->
                        </div>
                    </td>
                </tr>
            </table>
                @if(count($horas)>0)
                <table>
                <tr>
                    <td colspan="3"></td>
                @foreach ($horas as $item)
                @if($loop->iteration==$seleccion)

                    <td >
                        <button class="btn btn-danger" wire:click="select({{ $loop->iteration }}, {{ $item->id }})"> {{ Carbon::parse($item->hora)->format('h:i A') }}</button></a>
                    </td>
                @else

                        <td>
                            <button class="btn btn-primary" wire:click="select({{ $loop->iteration }}, {{ $item->id }})"> {{ Carbon::parse($item->hora)->format('h:i A') }}</button></a>
                        </td>



                @endif
                @endforeach
            </tr>
        </table>
               @endif




        </div>


    </div>
</div>
   @endif

    <div class="card m-b-30 m-t-10">
        <div class="card-body bootstrap-select-1">
            <h4 class="header-title mt-0">INFORMACION EXTRA</h4>
            <div class="row form-material">
                <div class="col-md-12">
                    <h6 class="text-muted fw-400 mt-3">AUTORIZACIÓN</h6>
                  <input type="text" class="form-control" wire:model="autorizacion">
                </div>

               @if(!empty($especialidad) && !empty($tipo) && !empty($medico) && !empty($seleccion))
               <div class="col-md-6 m-t-15">
                <center>
                    <button data-toggle="modal" data-target="#detallesModal"   class="btn btn-success">RESERVAR CITA</button>
                </center>
            </div>

               @endif
               <div class="col-md-6 m-t-15">
                <center>
                    <a href="{{ route('citas') }}" class="btn btn-danger">CANCELAR</a>
                </center>
            </div>

            </div>


        </div>
    </div>





</div>
