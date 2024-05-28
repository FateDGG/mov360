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
       
       @include("components.navbarAdmin") 
       <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-custom col-12 col-md-8 col-lg-6">
            <h1 class="text-center text-primary">Crear Nueva Empresa</h1>
            <form method="POST" action="{{ route('crear_empresa') }}">
                @csrf
                <div class="form-group">
                    <label for="nit" class="text-primary font-weight-bold">NIT</label>
                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Enter NIT" required>
                </div>
                <div class="form-group">
                    <label for="creationDate" class="text-primary font-weight-bold">Creation Date</label>
                    <input type="date" class="form-control" id="creationDate" name="creation_date" required>
                </div>
                <div class="form-group">
                    <label for="legalRepresentative" class="text-primary font-weight-bold">Legal Representative</label>
                    <input type="text" class="form-control" id="legalRepresentative" name="legal_representative" placeholder="Enter legal representative name" required>
                </div>
                <div class="form-group">
                    <label for="locations" class="text-primary font-weight-bold">Location</label>
                    <input type="text" class="form-control" id="locations" name="location" placeholder="Enter the company's address" required>
                </div>
                <div class="form-group">
                    <label for="contactEmail" class="text-primary font-weight-bold">Contact Email</label>
                    <input type="email" class="form-control" id="contactEmail" name="contact_email" placeholder="Enter contact email" required>
                </div>
                <div class="form-group">
                    <label for="contactPhone" class="text-primary font-weight-bold">Contact Phone</label>
                    <input type="tel" class="form-control" id="contactPhone" name="contact_phone" placeholder="Enter contact phone number" required>
                </div>
                <div class="form-group">
                    <label for="companyName" class="text-primary font-weight-bold">Company Name</label>
                    <input type="text" class="form-control" id="companyName" name="company_name" placeholder="Enter company name" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Crear Empresa</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


       @extends("components.footer")  
       
    </body>
</html>
