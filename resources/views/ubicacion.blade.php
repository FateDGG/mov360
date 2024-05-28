<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV360</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="">
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
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
            .container-custom {
              background-color: #f8f9fa;
              padding: 30px;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              margin-top: 50px;
            }
            .table-container {
              margin-bottom: 30px;
            }
            #map {
                height: 400px;
                width: 100%;    
                margin-top: 20px; 
            }
          </style>
    </head>
    <body class="bg-light text-dark">
       
       @include("components.navbarAdmin") 
       <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-custom col-12 col-md-10 col-lg-8">
          <h1 class="text-center text-primary">Ubicacion</h1>
          
          <!-- Filtro de Pedidos -->
          <div class="table-container">
            <h2 class="text-center text-secondary">Esta es la ubicacion de tu servicio</h2>
            <div class="table-container">
                <div id="map" class="mt-4">
                    
                </div> 
                <div class="container">
                    <div>
                        <button type="button" id="alertButton" class="btn btn-danger pt-2 mt-5" aria-label="Close">Alertar a policía</button>
                    </div>
                </div>
            
            </div>
           
          </div>
        </div>
      </div>
    <script>
        document.getElementById('alertButton').addEventListener('click', function() {
            alert("Se ha enviado una alerta a la policía correctamente");
        });
    </script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
      <script src="https://atlas.microsoft.com/sdk/javascript/mapcontrol/2/atlas.min.js?api-key=7otSdSkuJa4yKxek0nRU9h5mbgt8rLwRJIpk8MlRSmUAomfkTHJIJQQJ99AEACYeBjFa4UkmAAAgAZMPuoLW"></script>
      <script src="https://atlas.microsoft.com/sdk/js/atlas.min.js?api-version=2.0"></script>

      <script>
        let map;
        let marker;
        let currentPosition;
        const subscriptionKey = '7otSdSkuJa4yKxek0nRU9h5mbgt8rLwRJIpk8MlRSmUAomfkTHJIJQQJ99AEACYeBjFa4UkmAAAgAZMPuoLW';

        // Inicializa el mapa
        function initializeMap() {
            map = new atlas.Map('map', {
                center: [-73.1198, 7.1254],
                zoom: 14,
                view: 'Auto',
                authOptions: {
                    authType: 'subscriptionKey',
                    subscriptionKey: subscriptionKey
                }
            });

            // Espera a que el mapa esté listo
            map.events.add('ready', () => {
                // Inicializa una posición aleatoria dentro de Bucaramanga
                currentPosition = getRandomPosition();

                // Añade un marcador en la ubicación inicial
                marker = new atlas.HtmlMarker({
                    position: currentPosition,
                    text: 'A',
                    color: 'DodgerBlue'
                });
                map.markers.add(marker);

                // Actualiza la ubicación cada 5 segundos
                setInterval(updateLocation, 5000);
            });
        }

        // Genera una posición aleatoria dentro de una región específica
        function getRandomPosition() {
            const minLat = 7.10;
            const maxLat = 7.15;
            const minLon = -73.15;
            const maxLon = -73.10;

            const lat = Math.random() * (maxLat - minLat) + minLat;
            const lon = Math.random() * (maxLon - minLon) + minLon;

            return [lon, lat];
        }

        // Actualiza la ubicación del marcador
        function updateLocation() {
            // Ajusta la posición actual ligeramente
            const latChange = (Math.random() - 0.5) * 0.002; // Cambio pequeño en latitud
            const lonChange = (Math.random() - 0.5) * 0.002; // Cambio pequeño en longitud

            currentPosition[0] += lonChange;
            currentPosition[1] += latChange;

            // Asegúrate de que la nueva posición esté dentro de los límites
            currentPosition[0] = Math.max(Math.min(currentPosition[0], -73.10), -73.15);
            currentPosition[1] = Math.max(Math.min(currentPosition[1], 7.15), 7.10);

            marker.setOptions({
                position: currentPosition
            });
            map.setCamera({
                center: currentPosition
            });
        }

        // Inicializa el mapa al cargar la página
        window.onload = initializeMap;
    </script>


       @extends("components.footer")  
       
    </body>
</html>
