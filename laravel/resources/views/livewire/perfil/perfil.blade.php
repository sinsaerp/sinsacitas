<div>
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}")
    </script>
@endif
    <div class="card m-b-30 m-t-10 table-responsive">
        <div class="card-body bootstrap-select-1">

            <h4 class="header-title mt-0">AGENDAMIENTO DE CITAS</h4>
            <br>
            @if(!$updateMode)
            <button class="btn btn-info btn-sm m-b-15" wire:click="edit()">
                EDITAR
            </button>
            <br>
        @endif
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
             <td>{{ $user->codeps }}</td>
         </tr>
         <tr>
            <th>FECHA NACIMIENTO: </th>
            <td>
                @if($updateMode)
                <input class="form-control" type="date" wire:model="fecha_nacimiento" >
                @error('fecha_nacimiento') <span class="text-danger error">{{ $message }}</span>@enderror
                @else
                <input class="form-control" readonly type="date" value="{{ $user->fecha_nacimiento }}" >
                @endif
            </td>
        </tr>
        <tr>
            <th>TELEFONO: </th>
            <td>
                @if($updateMode)
                <input class="form-control" type="number" wire:model="telefono" >
                @error('telefono') <span class="text-danger error">{{ $message }}</span>@enderror
                @else
                <input class="form-control" readonly type="text" value="{{ $user->telefono }}" >
                @endif
            </td>
        </tr>
        <tr>
            <th>DIRECCIÓN: </th>
            <td>
                @if($updateMode)
                <input class="form-control" type="text" wire:model="direccion" >
                @error('direccion') <span class="text-danger error">{{ $message }}</span>@enderror
                @else
                <input class="form-control" readonly type="text" value="{{ $user->direccion }}" >
                @endif
            </td>
        </tr>
        <tr>
            <th>CORREO: </th>
            <td>
                @if($updateMode)
                <input class="form-control" type="email" wire:model="email" >
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                @else
                <input class="form-control" readonly type="email" value="{{ $user->email }}" >
                @endif
            </td>

        </tr>

        @if($updateMode)
        <tr>
            <td colspan="2">
                <center>
                    <button type="button" wire:click="update()" class="btn btn-success btn-block">ACTUALIZAR DATOS</button>
                </center>
            </td>
        </tr>
        @endif
        </table>
        </div>
    </div>





</div>
