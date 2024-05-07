<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV360</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="">
        <script src="{{ asset('scripts/custom.js') }}"></script>
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
        ></script>
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
        rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
       @include("components.navbar") 

          
            @auth <!-- Verifica si el usuario está autenticado -->
                
                <!-- Agrega más campos de información del usuario aquí según tu necesidad -->
                <div class="container mt-5 pb-5">
                    <div class="row">
                        <div class="col-md-3 col-9">
                            @include("components.profileImage") 
                            <div class="col-md-9 pt-6 ">

                            </div>
                        </div>
                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-md-3 col-9">
                            <div class="d-flex flex-column align-items-center text-center ">
                                @include("components.profileBar") 
                            </div>
                        </div>
                        <div class="col-md-9 pt-6">
                            @include("components.infoTarjetas") 
                        </div>
                    </div>
                </div>
                
            @else
                <h1>Perfil De Usuario</h1>
                <p>Por favor, inicia sesión para ver tu perfil.</p>
            @endauth
        </div>

       @extends("components.footer")  
    </body>
</html>
