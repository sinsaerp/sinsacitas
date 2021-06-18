
<!DOCTYPE html>
<html>
    <head>
        @include('theme.estilos')
        <title>INICIO DE SESIÓN</title>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                        <center>
                            <img src="{{ asset('theme/assets/images/f3.png') }}" alt="">
                            <h2><b>INICIO DE SESION</b></h2>
                            <h2><b>AGENDAMIENTO DE CITAS</b></h2>

                        </center>

                    <div class="p-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form class="form-horizontal m-t-20" autocomplete="off" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email"  name="email" placeholder="Correo ">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password"  name="password" placeholder="Contraseña">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Recordarme</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">INGRESAR</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Recuperar Contraseña </small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="{{ url('/registrar') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Registrarse Ahora</small></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('theme.scripts')
    </body>
</html>
