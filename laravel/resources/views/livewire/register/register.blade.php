<div>
    @include('livewire.register.notificacion')
    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif

    @if (session()->has('warning'))
        <script>
            advertencia("{{ session('warning') }}")
        </script>
    @endif

        <div class="form-group row">
            <div class="col-6">
                <label for="">Primer Nombre</label>
                <input class="form-control" type="text" required="" placeholder="Primer Nombre" wire:model="afnom1">
                @error('afnom1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-6">
                <label for="">Segundo Nombre</label>
                <input class="form-control" type="text" placeholder="Segundo Nombre" wire:model="afnom2">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <label for="">Primer Apellido</label>
                <input class="form-control" type="text" required="" placeholder="Primer Apellido" wire:model="afape1">
                @error('afape1') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-6">
                <label for="">Segundo Apellido</label>
                <input class="form-control" type="text" required="" placeholder="Segundo Apellido" wire:model="afape2">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label for="">Tipo de Documento</label>
               <select class="form-control" wire:model="tipidafil">
                   <option value="">SELECCIONE</option>
                   <option value="RC">REGISTRO CIVIL</option>
                   <option value="TI">TARJETA DE IDENTIDAD</option>
                   <option value="CC">CEDULA DE CIUDADANIA</option>
                   <option value="PEP">PERMISO ESPECIAL DE PERMANENCIA</option>
                   @error('tipidafil') <span class="text-danger error">{{ $message }}</span>@enderror
               </select>
            </div>

            <div class="col-6">
                <label for="">N° Documento</label>
                <input class="form-control" type="number" required="" placeholder="N° Documento" wire:model.debounce.200ms="afcodigo">
                @error('afcodigo') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>


        <div class="form-group row">
            <div class="col-6">
                <label for="">Fecha Nacimiento</label>
                <input class="form-control" type="date" required="" placeholder="Fecha Nacimiento" wire:model="fecha_nacimiento">
                @error('fecha_nacimiento') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="col-6">
                <label for="">Sexo</label>
               <select class="form-control" wire:model="sexo">
                   <option value="">SELECCIONE</option>
                   <option value="M">MASCULINO</option>
                   <option value="F">FEMENINO</option>
               </select>
               @error('sexo') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>


        <div class="form-group row">
            <div class="col-6">
                <label for="">Teléfono</label>
                <input class="form-control" type="number" required="" placeholder="Teléfono" wire:model="telefono">
                @error('telefono') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="col-6">
                <label for="">Dirección</label>
                <input class="form-control" type="text" required="" placeholder="Dirección" wire:model="direccion">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <label for="">EPS</label>
                <select class="form-control" wire:model="codeps">
                    <option value="">SELECCIONE</option>
                    @foreach ($epss as $item)
                        <option value="{{ $item->codeps }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <label for="">Correo</label>
                <input class="form-control" type="email" required="" placeholder="correo" wire:model="email">
                @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <label for="">Contraseña</label>
                <input class="form-control" type="password" required="" placeholder="Contraseña" wire:model="password">
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <label for="">Confirmar Contraseña</label>
                <input class="form-control" type="password" required="" placeholder="Confirmar Contraseña" wire:model="password2">
                @error('password2') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>

        <div class="form-group text-center row m-t-20">
            <div class="col-12">
                <button type="button" wire:click.prevent="store()" class="btn btn-primary btn-block waves-effect waves-light">GUARDAR</button>

            </div>
        </div>

        <div class="form-group m-t-10 mb-0 row">
            <div class="col-12 m-t-20 text-center">
                <a href="{{ url('/') }}" class="text-muted">Ya tengo Cuenta </a>
            </div>
        </div>

</div>
