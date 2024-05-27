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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    </head>
    <body>
       @include("components.navbar") 
       <div style="background-image: url('{{ asset('img/bannerTransporte.png') }}'); background-size: cover; background-repeat: no-repeat; height: 600px; display: flex; justify-content: center; align-items: center;">
    
        {{-- @include("components.transportes", ['tarjetas' => $tarjetas, 'conductores' => $conductores]) --}}
        <div class="container mt-5 alquilerTitle">
            <h1 class="mb-3 ">Solicitar transporte</h1>
        
            <form id="formulario-transporte" action="{{ route('solicitar_transporte') }}" class="pb-4" method="POST">
                @csrf <!-- Agrega el token CSRF para proteger tu formulario -->
                <div class="form-group">
                    <input
                      type="text"
                      class="form-control mb-2"
                      placeholder="Introduce lugar de recogida"
                      name="lugar_recogida" 
                    />
            
                    <input
                      type="text"
                      class="form-control mb-2"
                      placeholder="Introduce destino"
                      name="destino" 
                    />
                    <select class="form-control mb-2" aria-placeholder="Seleccione metodo de pago" name="metodo_pago"> 
                        <option>Efectivo</option>
                        @foreach($tarjetas as $tarjeta)
                            <option>Tarjeta</option>
                        @endforeach
                    </select>
            
                    <button type="submit" class="btn btn-warning btn-block">Buscar</button>
                </div>
            </form>
        
            
        
            <div class="row">
              <div class="col-md-3 pb-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ahorra hasta un 38%</h5>
                    <p class="card-text">Obtien el mejor precio para todos tus viajes.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Uso gratuito</h5>
                    <p class="card-text">No hay cargos ni tasas ocultos en nuestra plataforma.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Facil acceso</h5>
                    <p class="card-text">Rapido tiempo de respuesta para tus solicitudes</p>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Reserva con flexibilidad</h5>
                    <p class="card-text">
                      Usa el filtro "Cancelación gratis" para encontrar opciones flexibles.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
       </div>
       @extends("components.footer")  
    </body>
</html>
