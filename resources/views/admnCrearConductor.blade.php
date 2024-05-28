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
          <form>
            <div class="form-group">
              <label for="driverName" class="text-primary font-weight-bold">Nombre del Conductor</label>
              <input type="text" class="form-control" id="driverName" placeholder="Ingrese el nombre del conductor">
            </div>
            <h3 class="card-subtitle mt-4 mb-2">Personal Information</h3>
              <div class="row g-3">
                  <input type="text" id="email" name="email" class="form-control" placeholder="Email Address">
                  <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                  <input type="text" id="idNumber" name="idNumber" class="form-control" placeholder="ID Number">
                  <input type="date" id="dob" name="dob" class="form-control" placeholder="Date of Birth">
                  <input type="file" id="licensePhoto" name="licensePhoto" class="form-control" placeholder="Upload License Photo">
              </div>
              <h3 class="card-subtitle mt-4 mb-2">Vehicle Information</h3>
              <div class="row g-3">
                  <input type="text" id="vehicleColor" name="vehicleColor" class="form-control" placeholder="Vehicle Color">
                  <input type="text" id="vehicleModel" name="vehicleModel" class="form-control" placeholder="Vehicle Model">
                  <input type="text" id="vehiclePlate" name="vehiclePlate" class="form-control" placeholder="Vehicle Plate Number">
                  <input type="text" id="vehicleBrand" name="vehicleBrand" class="form-control" placeholder="Vehicle Brand">
                  <input type="file" id="vehiclePhoto" name="vehiclePhoto" class="form-control" placeholder="Upload Vehicle Photo">
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
