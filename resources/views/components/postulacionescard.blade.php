<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Postulaciones de Empresas</title>
  <style>
    .card-custom {
      margin: 20px 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-light text-dark">
  <div class="container mt-5">
    <h1 class="text-center text-primary">Postulaciones de Empresas</h1>
    <div class="card p-4 card-custom">
      <h2 class="text-primary">Lista de Postulaciones</h2>
      <ul class="list-group">
        <!-- Aquí se deben generar dinámicamente las postulaciones -->
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <h5>Nombre del Negocio</h5>
            <p>NIT: 123456789</p>
            <p>Estado: Pendiente</p>
          </div>
          <button class="btn btn-primary">Ver Detalles</button>
        </li>
        <!-- Fin de la generación dinámica -->
      </ul>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
