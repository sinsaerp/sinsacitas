<div>

    @include('livewire.tipoconsultas.create')
    @include('livewire.tipoconsultas.update')

    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.tipoconsultas.tabla')

</div>

