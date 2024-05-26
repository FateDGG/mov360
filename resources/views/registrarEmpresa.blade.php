<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV360</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            }
            .form-section {
              margin-bottom: 20px;
            }
            .form-section:last-of-type {
              margin-bottom: 0;
            }
            .form-check {
              margin-bottom: 10px;
            }
          </style>
    </head>
    <body class="bg-light text-dark">
       
       @include("components.navbar") 
       

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="container-custom col-12 col-md-8 col-lg-6">
        <form>
          <div class="form-section">
            <label for="companyName" class="text-primary font-weight-bold">Company Name</label>
            <input type="text" class="form-control" id="companyName" placeholder="Enter company name">
          </div>
          <div class="form-section">
            <label for="nit" class="text-primary font-weight-bold">NIT</label>
            <input type="text" class="form-control" id="nit" placeholder="Enter NIT">
          </div>
          <div class="form-section">
            <label for="creationDate" class="text-primary font-weight-bold">Creation Date</label>
            <input type="date" class="form-control" id="creationDate">
          </div>
          <div class="form-section">
            <label for="legalRepresentative" class="text-primary font-weight-bold">Legal Representative</label>
            <input type="text" class="form-control" id="legalRepresentative" placeholder="Enter legal representative name">
          </div>
          <div class="form-section">
            <label for="coverage" class="text-primary font-weight-bold">Coverage</label>
            <input type="text" class="form-control" id="coverage" placeholder="Enter coverage information">
          </div>
          <div class="form-section">
            <label for="locations" class="text-primary font-weight-bold">Locations</label>
            <input type="text" class="form-control" id="locations" placeholder="Enter locations where the company is present">
          </div>
          <div class="form-section">
            <label for="contactEmail" class="text-primary font-weight-bold">Contact Email</label>
            <input type="email" class="form-control" id="contactEmail" placeholder="Enter contact email">
          </div>
          <div class="form-section">
            <label for="contactPhone" class="text-primary font-weight-bold">Contact Phone</label>
            <input type="tel" class="form-control" id="contactPhone" placeholder="Enter contact phone number">
          </div>
          <div class="form-section">
            <label for="companyLogo" class="text-primary font-weight-bold">Company Logo</label>
            <input type="file" class="form-control-file" id="companyLogo">
          </div>
          <div class="form-section">
            <label for="companyBanner" class="text-primary font-weight-bold">Company Banner</label>
            <input type="file" class="form-control-file" id="companyBanner">
          </div>
          <div class="form-section">
            <label for="tipo_empresa" class="text-primary font-weight-bold">Tipo de Empresa</label>
            <select id="tipo_empresa" name="tipo_empresa" class="form-control">
              <option value="restaurante">Restaurante</option>
              <option value="vehiculos">Empresa de Renta de Vehículos</option>
            </select>
          </div>
          <div id="vehiculos_fields" class="form-section d-none">
            <label for="menu" class="text-primary font-weight-bold">Upload Catalogo PDF</label>
            <input type="file" id="menu" accept=".pdf" class="form-control-file">
          </div>
          <div id="restaurante_fields" class="form-section d-none">
            <label class="text-primary font-weight-bold">Select Categories</label>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="category1">
              <label class="form-check-label" for="category1">Rapida</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="category2">
              <label class="form-check-label" for="category2">Italiana</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category3">
                <label class="form-check-label" for="category3">China</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category4">
                <label class="form-check-label" for="category4">Asiatica</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category5">
                <label class="form-check-label" for="category5">Mexicana</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category6">
                <label class="form-check-label" for="category6">Colombiana</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category7">
                <label class="form-check-label" for="category7">Peruana</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category8">
                <label class="form-check-label" for="category8">Panaderia</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category9">
                <label class="form-check-label" for="category9">Cafeteria</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category10">
                <label class="form-check-label" for="category10">Reposteria</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category11">
                <label class="form-check-label" for="category11">Vegana</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category12">
                <label class="form-check-label" for="category12">Arabe</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category13">
                <label class="form-check-label" for="category13">Desayunos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category14">
                <label class="form-check-label" for="category14">Fritos</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category15">
                <label class="form-check-label" for="category15">Pollo</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="category16">
                <label class="form-check-label" for="category16">Parrilla</label>
            </div>
          
            <label for="menu" class="text-primary font-weight-bold">Upload Menu PDF</label>
            <input type="file" id="menu" accept=".pdf" class="form-control-file">
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4">Enviar</button>
        </form>
      </div>
    </div>
  
    <script>
      const tipoEmpresaSelect = document.getElementById('tipo_empresa');
      const restauranteFields = document.getElementById('restaurante_fields');
      const vehiculosFields = document.getElementById('vehiculos_fields');
  
      tipoEmpresaSelect.addEventListener('change', () => {
        if (tipoEmpresaSelect.value === 'restaurante') {
          restauranteFields.classList.remove('d-none');
          vehiculosFields.classList.add('d-none');
        } else {
          restauranteFields.classList.add('d-none');
          vehiculosFields.classList.remove('d-none');
        }
      });
    </script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
       @extends("components.footer")  
       
    </body>
</html>
