<div>

    @include('livewire.horariom.create')
    @include('livewire.horariom.update')

    @if (session()->has('message'))
        <script>
            mensaje("{{ session('message') }}")
        </script>
    @endif
    @include('livewire.horariom.tabla')

</div>

