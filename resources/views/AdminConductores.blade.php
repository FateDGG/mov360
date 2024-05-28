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
        <style>
            .card-custom {
              margin: 20px 0;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
          </style>
    </head>
    <body>
        @include("components.navbarAdmin") 
        <div class="container mt-5">
            <h1 class="text-center text-primary">Administrar Conductores</h1>
            <div class="card p-4 card-custom">
              <div class="form-group p-2">
                <label for="filterName" class="text-primary">Filtrar por Nombre</label>
                <input type="text" class="form-control" id="filterName" placeholder="Ingrese el nombre del conductor">
              </div>
              <div class="form-group p-2">
                <label for="filterCedula" class="text-primary">Filtrar por Número de Cédula</label>
                <input type="text" class="form-control" id="filterCedula" placeholder="Ingrese el número de cédula del conductor">
              </div>
              
              <div class="text-center mt-4">
                <a class="btn btn-primary btn-block ">Filtrar</a>

                <div class="text-center mt-4">

                    <a href="{{url('/AgregarConductor')}}" class="btn  btn-block btn-success pt-2">Agregar Nuevo Conductor</a>
                  </div>
                  <div class="text-center mt-4">

                    <a href="{{url('/PostulacionesConductores')}}" class="btn  btn-block btn-success pt-2">Ver Postulaciones</a>
                  </div>
              </div>
            </div>
            
        
            <div class="card mt-4 p-4 card-custom pt-2">
              <h2 class="text-primary">Lista de Conductores</h2>
              <ul class="list-group">
                <!-- Aquí se deben generar dinámicamente los conductores -->
                @include("components.cardConductorAdmin")
                @include("components.cardConductorAdmin")
                <!-- Fin de la generación dinámica -->
              </ul>
            </div>
        
        
          </div>
        
       




       @extends("components.footer")  
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
