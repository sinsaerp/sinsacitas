<div class="card table-responsive m-t-15">
    <div class="card-body">
        <div class="w-full flex pb-10">
            <div class="w-3/6 mx-1">
              @if($orderBy=="c.fechaCita")
            <input wire:model.debounce.300ms="search" type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Buscar">

            @else
            <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Buscar">
              @endif
            </div>
            <div class="w-1/6 relative mx-1">
                <select wire:model="orderBy" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="c.especialidad_id">ESPECIALIDAD</option>
                    <option value="c.medico_id">MEDICO</option>
                    <option value="c.fechaCita">FECHA CITA</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <div class="w-1/6 relative mx-1">
                <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option value="1">Ascendente</option>
                    <option value="0">Descendete</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <div class="w-1/6 relative mx-1">
                <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>1</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="px-4 py-2">MEDICO</th>
                    <th class="px-4 py-2">FECHA</th>
                    <th class="px-4 py-2">HORA</th>
                    <th class="px-4 py-2">DESCRIPCION</th>
                    <th class="px-4 py-2">ESTADO</th>
                    <th class="px-4 py-2">OBSERVACIONES</th>

                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                    <tr>
                        <td class=" px-4 py-2">{{ $value->medico }}</td>
                        <td class=" px-4 py-2">{{ $value->fechaCita }}</td>
                        <td class=" px-4 py-2">{{ $value->horaCita }}</td>
                        <td class=" px-4 py-2">{{ $value->descripcion }}</td>
                        @if($value->estado==1)
                        <td class=" px-4 py-2 table-warning">ESPERANDO CONFIRMACION</td>
                        @elseif($value->estado==2)
                        <td class=" px-4 py-2 table-danger">RECHAZADA</td>
                        @else
                        <td class=" px-4 py-2 table-success">CONFIRMADA</td>
                        @endif
                        <td class=" px-4 py-2">{{ $value->observaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $data->links() !!}
    </div>

  </div>
