
<!DOCTYPE html>
<html>
    <head>
        @include('theme.estilos')
        @livewireStyles
        <title>REGISTRO DE DATOS </title>
    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div class="wrapper-page2">

            <div class="card" style="width: 100%">
                <div class="card-header">
                    <h4>REGISTRO DE DATOS</h4>
                </div>
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin">

                        </a>
                    </h3>
                    <center>
                        <img src="{{ asset('theme/assets/images/f3.png') }}" alt="">
                        <h2><b>AGENDAMIENTO DE CITAS</b></h2>

                    </center>
                    <div class="p-3" >
                        <livewire:register />
                    </div>

                </div>
            </div>
        </div>
        @include('theme.scripts')
        @livewireScripts
        <script>
            function mensaje(valor){
             swal(
                 {
                     title: 'EXITOSO',
                     text: valor,
                     type: 'success',
                     showCancelButton: true,
                     confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger m-l-10'
                 }
             )
            }
            function advertencia(valor){
                swal(
                    {
                        title: 'SINSA ERP',
                        text: valor,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10'
                    }
                )
               }

               window.livewire.on('notificacion', () => {
                $('#notificacionModal').modal('show');
            });
         </script>
    </body>
</html>
