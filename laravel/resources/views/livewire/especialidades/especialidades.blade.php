<div>

    @include('livewire.especialidades.create')
    @include('livewire.especialidades.update')

    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.especialidades.tabla')

</div>

