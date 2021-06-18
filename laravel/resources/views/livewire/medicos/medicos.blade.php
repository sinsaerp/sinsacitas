<div>

    @include('livewire.medicos.create')
    @include('livewire.medicos.update')

    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.medicos.tabla')

</div>

