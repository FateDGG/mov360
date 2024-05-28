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
            .container-custom {
              background-color: #f8f9fa;
              padding: 30px;
              border-radius: 10px;
              box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
              margin-top: 50px;
            }
          </style>
    </head>
    <body class="bg-light text-dark">
       
       @include("components.navbarAdmin") 

       <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-custom col-12 col-md-8 col-lg-6">
          <h1 class="text-center text-primary">Agregar Nuevo Conductor</h1>
          <form action="{{ route('conductor.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="driverName" class="text-primary font-weight-bold">Nombre del Conductor</label>
                <input type="text" class="form-control" id="driverName" name="driverName"
                       placeholder="Ingrese el nombre del conductor" required>
            </div>
            <h3 class="card-subtitle mt-4 mb-2">Información Personal</h3>
            <div class="row g-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Número de Teléfono"
                           required>
                </div>
            </div>
            <h3 class="card-subtitle mt-4 mb-2">Información del Vehículo</h3>
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" class="form-control" id="vehicleColor" name="vehicleColor"
                           placeholder="Color del Vehículo" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="vehicleModel" name="vehicleModel"
                           placeholder="Modelo del Vehículo" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="vehiclePlate" name="vehiclePlate"
                           placeholder="Número de Placa" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-4">Agregar Conductor</button>
        </form>
        </div>
      </div>
    
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

       @extends("components.footer")  
       
    </body>
</html>
