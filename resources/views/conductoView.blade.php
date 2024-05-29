<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MOV360</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet"/>
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
        .table-container {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="bg-light text-dark">
    @include("components.navbarConductor")
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-custom col-12 col-md-10 col-lg-8">
            <h1 class="text-center text-primary">Panel de Conductor</h1>

            <!-- Solicitudes de Servicio Entrantes -->
            <div class="table-container">
                <h2 class="text-center text-secondary">Solicitudes de Servicio Entrantes</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID de Solicitud</th>
                            <th scope="col">Nombre de Usuario</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterar sobre las solicitudes de servicio entrantes -->
                        @forelse ($solicitudesEntrantes as $solicitud)
                            <tr>
                                <td>{{ $solicitud->id }}</td>
                                <td>{{ $clientes[$solicitud->id_usuario]->nombre ?? 'Usuario desconocido' }}</td>
                                <td>{{ $solicitud->lugar_destino }}</td>
                                <td>
                                    <!-- Acciones como aceptar o rechazar la solicitud -->
                                  <form action="{{ route('rechazar_servicio', ['id' => $solicitud->id]) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres rechazar este servicio?')">Rechazar</button>
                                  </form>
                      
                                  <form action="{{ route('aceptar_servicio', ['id' => $solicitud->id]) }}" method="POST" style="display: inline;">
                                      @csrf
                                      <button type="submit" class="btn btn-success" onclick="return confirm('¿Estás seguro de que quieres aceptar este servicio?')">Aceptar</button>
                                  </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay solicitudes entrantes</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="table-container">
              <h2 class="text-center text-secondary">Servicios Activos</h2>
              <table class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th scope="col">ID de Servicio</th>
                          <th scope="col">Nombre de Usuario</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      <!-- Iterar sobre el historial de servicios -->
                      @forelse ($serviciosActivos as $activo)
                          <tr>
                              <td>{{ $activo->id }}</td>
                              <td>{{ $clientes[$activo->id_usuario]->nombre ?? 'Usuario desconocido' }}</td>
                              <td>{{ $activo->precio }}</td>
                              <td>
                                <!-- Acciones como aceptar o rechazar la solicitud -->
                                <form action="{{ route('rechazar_servicio', ['id' => $activo->id]) }}" method="POST" style="display: inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres cancelar este servicio?')">Cancelar</button>
                                </form>
                                <form action="{{ route('finalizar_servicio', ['id' => $activo->id]) }}" method="POST" style="display: inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de que quieres finalizar este servicio?')">Finalizar</button>
                                </form>
                            </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="4" class="text-center">No hay servicios Activos</td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
            </div>
            <!-- Historial de Servicios -->
            <div class="table-container">
                <h2 class="text-center text-secondary">Historial de Servicios</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID de Servicio</th>
                            <th scope="col">Nombre de Usuario</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterar sobre el historial de servicios -->
                        @forelse ($historialServicios as $servicio)
                            <tr>
                                <td>{{ $servicio->id }}</td>
                                <td>{{ $clientes[$servicio->id_usuario]->nombre ?? 'Usuario desconocido' }}</td>
                                <td>{{ $servicio->precio }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay historial de servicios</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @extends("components.footer")
</body>
</html>
