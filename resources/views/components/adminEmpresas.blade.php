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
          <button class="btn btn-success" onclick="window.location.href='{{ url('/CrearEmpresa') }}'">Añadir Restaurante</button>
        </div>
      </div>
      {{-- <div id="businessList" class="mb-4">
        <h2 class="text-center text-secondary">Listado de Empresas</h2>  
        @foreach ($empresas as $empresa)
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <!-- Aquí puedes mostrar la foto de la empresa -->
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $empresa->nombre }}</h5>
                        <p class="card-text">NIT: {{ $empresa->nit }}</p>
                        <!-- Agrega otros detalles de la empresa que desees mostrar -->
                        <form method="POST" action="{{ route('eliminar_empresa', ['id' => $empresa->id]) }}" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta empresa?')">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach --}}
      
        <div id="businessList" class="mb-4">
          <h2 class="text-center text-secondary">Listado de Restaurantes</h2>  
          @foreach ($restaurantes as $restaurante)
          <div class="card mb-3">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <!-- Aquí puedes mostrar la foto de la empresa -->
                      <img src="{{ asset($restaurante->url_foto) }}" class="card-img-top fixed-size-img" alt="..." style="width: 100%; height: 10rem; object-fit: cover; object-position: center;">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h5 class="card-title">{{ $restaurante->nombre }}</h5>
                          <p class="card-text">Dirección: {{ $restaurante->direccion }}</p>
                          <p class="card-text">Tipo de comida: {{ $restaurante->tipo_cocina }}</p>
                          <!-- Agrega otros detalles de la empresa que desees mostrar -->
                          <form method="POST" action="{{ route('eliminar_restaurante', ['id' => $restaurante->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este restaurante?')">Delete</button>
                          </form>
  
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
    </div>
  </div>

  <script>
    function deleteBusiness(businessId) {
      // Implementa la lógica para eliminar la empresa con el ID proporcionado
      // Puedes enviar una solicitud AJAX o redirigir a una ruta específica para manejar la eliminación
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
