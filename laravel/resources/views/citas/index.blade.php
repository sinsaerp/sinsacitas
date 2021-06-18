@extends('theme.app')
@section('titulo')
    CITAS
@endsection
@section('estilos')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')

<livewire:cita />

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    window.livewire.on('fecha', (fechas) => {
        var array = fechas
        $( "#datepicker" ).datepicker({
           dateFormat: "yy-mm-dd",
            minViewMode: 1,
            todayBtn: "linked",
            onSelect: function(dateText) {
                window.livewire.emit('say-hello', { name : this.value} );
            },
            beforeShowDay: function(date){
                var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                return [ array.indexOf(string) !=-1 ]
            }
        });


    });











    </script>
@endsection
