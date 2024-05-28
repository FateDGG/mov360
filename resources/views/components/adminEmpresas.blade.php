<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Dashboard</title>
  <style>
    .container-custom {
      background-color: #f8f9fa;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-light text-dark">
  <div class="container my-5">
    <div class="container-custom">
      <h1 class="text-center text-primary mb-4">Admin Dashboard</h1>
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Filter Businesses</h5>
          <div class="form-group">
            <input type="text" id="filterName" class="form-control" placeholder="Filter by Name">
          </div>
          <div class="form-group">
            <input type="text" id="filterNIT" class="form-control" placeholder="Filter by NIT">
          </div>
          <button class="btn btn-primary" onclick="filterBusinesses()">Filter</button>
          <button class="btn btn-success" onclick="window.location.href='{{url('/CrearEmpresa')}}'">Create New Business</button>
          <button class="btn btn-success" onclick="window.location.href='{{url('/PostulacionesEmpresas')}}'">Ver postulaciones</button>
        </div>
      </div>
      <div id="businessList" class="mb-4">
        <!-- Business list will be populated here -->
      </div>
    </div>
  </div>

  <script>
    function filterBusinesses() {
      // Implement the filter functionality here
    }

    function deleteBusiness(businessId) {
      // Implement the delete functionality here
    }

    // Example data, replace with actual data from your backend
    const businesses = [
      { id: 1, name: 'Business One', nit: '123456', photo: 'photo1.jpg' },
      { id: 2, name: 'Business Two', nit: '789012', photo: 'photo2.jpg' }
    ];

    function populateBusinessList() {
      const businessList = document.getElementById('businessList');
      businessList.innerHTML = '';
      businesses.forEach(business => {
        const businessCard = `
          <div class="card mb-3">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="${business.photo}" class="card-img" alt="${business.name}">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">${business.name}</h5>
                  <p class="card-text">NIT: ${business.nit}</p>
                  <button class="btn btn-danger" onclick="deleteBusiness(${business.id})">Delete</button>
                </div>
              </div>
            </div>
          </div>
        `;
        businessList.innerHTML += businessCard;
      });
    }

    document.addEventListener('DOMContentLoaded', populateBusinessList);
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
