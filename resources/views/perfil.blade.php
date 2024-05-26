<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV360</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            
                        </div>

                        <div class="w-100 d-none d-md-block"></div>
                        <div class="col-md-3 col-9">
                            <div class="d-flex flex-column align-items-center text-center ">
                                @include("components.profileBar") 
                            </div>
                        </div>
                        <div class="col-md-9 pt-6">
                            {{-- @include("components.profileInfo")  --}}
                                <div id="profileInfo" style="display: none;">
                                <!-- Aquí se cargará dinámicamente el contenido de la pestaña seleccionada -->
                                <!-- Contenido del componente profileInfo -->
                                    @include('components.profileInfo')
                                </div>
                                <!-- Contenido del componente de tarjetas -->
                                <div id="cardsContent" style="display: none;">
                                    <!-- Aquí va el contenido de las tarjetas -->
                                    @include('components.infoTarjetas')
                                </div>

                                <!-- Contenido del componente de últimas órdenes -->
                                <div id="ordersContent" style="display: none;">
                                    <!-- Aquí va el contenido de las últimas órdenes -->
                                    <p>Contenido de las últimas órdenes</p>
                                    @include('components.infoOrdenes')
                                </div>

                                <!-- Contenido del componente de centro de ayuda -->
                                <div id="helpContent" style="display: none;">
                                    <!-- Aquí va el contenido del centro de ayuda -->
                                    <p>Contenido del centro de ayuda</p>
                                    @include('components.ayuda')
                                </div>
                            </div>
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

<script>
    // Escucha el evento personalizado enviado desde profileBar
    document.addEventListener('DOMContentLoaded', function() {
        const selectedTab = 'v-pills-home-tab';
        // Llama a la función loadProfileContent con la pestaña predeterminada
        loadProfileContent(selectedTab);

        // Escucha el evento personalizado enviado desde profileBar
        document.addEventListener('profileTabSelected', function(e) {
            const selectedTab = e.detail.tabId;
            // Carga el contenido correspondiente a la pestaña seleccionada
            loadProfileContent(selectedTab);
        });
    });

    // Función para cargar dinámicamente el contenido de la pestaña seleccionada
    function loadProfileContent(tabId) {
        // Ocultar todos los contenidos
        document.getElementById('profileInfo').style.display = 'none';
        document.getElementById('cardsContent').style.display = 'none';
        document.getElementById('ordersContent').style.display = 'none';
        document.getElementById('helpContent').style.display = 'none';

        // Mostrar el contenido correspondiente a la pestaña seleccionada
        switch (tabId) {
            case 'v-pills-home-tab':
                document.getElementById('profileInfo').style.display = 'block';
                break;
            case 'v-pills-messages-tab':
                document.getElementById('cardsContent').style.display = 'block';
                break;
            case 'v-pills-orders-tab':
                document.getElementById('ordersContent').style.display = 'block';
                break;
            case 'v-pills-help-tab':
                document.getElementById('helpContent').style.display = 'block';
                break;
            default:
                document.getElementById('profileInfo').style.display = 'block';
                break;
        }
    }
</script>