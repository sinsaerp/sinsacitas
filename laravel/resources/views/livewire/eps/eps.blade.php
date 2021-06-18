<div>

    @include('livewire.eps.create')
    @include('livewire.eps.update')

    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.eps.tabla')

</div>

