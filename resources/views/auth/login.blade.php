
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Page Title -->
        <title>Portalwebunimar</title>
        <link rel="shortcut icon" href="https://portalunimar.unimar.edu.ve/image/unimar.ico">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="Z32k93PvODy7vydkaZNlWHNn6LwAcfNBLmstjXw7">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <!-- App Styles -->
        <link rel="stylesheet" href="https://portalunimar.unimar.edu.ve/css/fix.css">
        <!-- Page Styles -->
        <link href="https://portalunimar.unimar.edu.ve/css/app.css" rel="stylesheet">
        <!-- App Scripts -->
        <script src="https://portalunimar.unimar.edu.ve/js/app.js" defer></script>
        <!-- Page Styles -->
            <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- Sweet Alert 2 Css -->
    <link rel="stylesheet" href="https://portalunimar.unimar.edu.ve/plugins/sweetalert2/sweetalert2.css">
    <!-- Page Custom Styles -->
    <link rel="stylesheet" href="https://portalunimar.unimar.edu.ve/css/portalunimar/auth/login.css">
    </head>
    <body>
        <!-- Navigation Header -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="https://portalunimar.unimar.edu.ve/home"><img class="img-nav-app" src="https://portalunimar.unimar.edu.ve/./image/unimar.jpg" style="width:150px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <span class="title-app">Bienvenid@</span>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navigation-header -->

        <!-- Page Content -->
        <main class="zy-6">
                <div class="container">
        <!-- Login Section -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-5">
                <div class="card">
                    <div class="card-header" id="login-card">
                        <div><img class="img-login" src="https://portalunimar.unimar.edu.ve/./image/user.png"></div>
                        <span class="title-login">Inicio de sesión</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf                            
                            <!-- Form Inputs -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    Correo electrónico
                                </label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>
                                                                    </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" minlength="5" class="form-control " name="password" required autocomplete="current-password">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                                                    </div>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- /.form-inputs -->

                            <!-- Remember Checkbox -->

                            <!-- /.remember-checkbox -->

                            <!-- Login Button -->
                            <div class="form-group row flex-center">
                                <div class="col-7 col-sm-5">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Ingresa
                                    </button>
                                </div>
                            </div>
                            <!-- /.login-button -->

                            <!-- Reset And Register Buttons -->

                            <!-- /.reset-and-register-buttons -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-section -->
    </div>
        </main>
        <!-- /.page-content -->
        
        <!-- Page Scripts -->
            <!-- Sweet Alert 2 JS -->
    <script src="https://portalunimar.unimar.edu.ve/plugins/sweetalert2/sweetalert2.js"></script>
    <!-- Page Custon Scripts -->
    </body>
</html>