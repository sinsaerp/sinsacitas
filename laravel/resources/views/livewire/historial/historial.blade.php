<div>
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}")
    </script>
    @endif
    <div class="card m-b-30 m-t-10">
        <div class="card-body bootstrap-select-1">
            <h4 class="header-title mt-0">AGENDAMIENTO DE CITAS</h4>
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
        </table>
        </div>
    </div>

    @if(count($data)>0)
    <div class="card m-b-30 m-t-10">
        <div class="card-body bootstrap-select-1">
            <h4 class="header-title mt-0">DETALLES DE CITAS</h4>
            @include('livewire.historial.tabla')
        </div>
    </div>
    @endif



</div>
