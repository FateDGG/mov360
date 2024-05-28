<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Nueva Empresa</title>
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
</body>
</html>
