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
            .table-container {
              margin-bottom: 30px;
            }
          </style>
    </head>
    <body class="bg-light text-dark">
       
       @include("components.navbarAdmin") 
       <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="container-custom col-12 col-md-10 col-lg-8">
          <h1 class="text-center text-primary">Filtrar y Ver Listados</h1>
          
          <!-- Filtro de Pedidos -->
          <div class="table-container">
            <h2 class="text-center text-secondary">Listado de Pedidos</h2>
            <form class="mb-4">
              {{-- <div class="form-group">
                <label for="searchPedidos" class="text-primary">Buscar por ID de Pedido o Usuario</label>
                <input type="text" class="form-control" id="searchPedidos" placeholder="Ingrese ID de Pedido o Nombre de Usuario">
              </div> --}}
            </form>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID de Orden</th>
                  <th scope="col">Nombre de Usuario</th>
                  <th scope="col">Monto</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Ejemplo de Fila de Pedido -->
                @foreach ($compras as $compra)
                  <tr>
                    <td>{{ $compra->id }}</td>
                    <td>
                      @foreach ($clientes as $cliente)
                        @if ($cliente->id == $compra->id_usuario)
                            {{ $cliente->nombre }}
                            @break
                        @endif
                      @endforeach
                    </td>
                    <td>{{$compra->valor}}</td>
                    <td>
                      <button class="btn btn-info btn-sm">Ver Ubicación</button>
                      <form method="POST" action="{{ route('cancelar_compra', ['id' => $compra->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')" >Cancelar Servicio</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <!-- Más filas aquí -->
              </tbody>
            </table>
          </div>
          
          <!-- Filtro de Transportes -->
          <div class="table-container">
            <h2 class="text-center text-secondary">Listado de Transportes</h2>
            {{-- <form class="mb-4">
              <div class="form-group">
                <label for="searchTransportes" class="text-primary">Buscar por ID de Pedido o Usuario</label>
                <input type="text" class="form-control" id="searchTransportes" placeholder="Ingrese ID de Pedido o Nombre de Usuario">
              </div>
            </form> --}}
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID de Servicio</th>
                  <th scope="col">Nombre de Usuario</th>
                  <th scope="col">Conductor</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Ejemplo de Fila de Transporte -->
                @foreach($transportes as $transporte)
                <tr>
                  <td>{{ $transporte->id }}</td>
                  <td>
                    @foreach ($clientes as $cliente)
                        @if ($cliente->id == $transporte->id_usuario)
                            {{ $cliente->nombre }}
                            @break
                        @endif
                      @endforeach
                  </td>
                  <td>{{$transporte->nombre_conductor}}</td>
                  <td>{{$transporte->precio}}</td>
                  <td>
                    <button class="btn btn-info btn-sm">Ver Ubicación</button>
                    <form method="POST" action="{{ route('cancelar_viaje', ['id' => $transporte->id]) }}" style="display: inline;">
                      @csrf
                      @method('DELETE')
                      <button  type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')" >Cancelar Servicio</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                <!-- Más filas aquí -->
              </tbody>
            </table>
          </div>
          
          <!-- Filtro de Alquileres -->
          <div class="table-container">
            <h2 class="text-center text-secondary">Listado de Alquileres</h2>
            {{-- <form class="mb-4">
              <div class="form-group">
                <label for="searchAlquileres" class="text-primary">Buscar por ID de Pedido o Usuario</label>
                <input type="text" class="form-control" id="searchAlquileres" placeholder="Ingrese ID de Pedido o Nombre de Usuario">
              </div>
            </form> --}}
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID de Alquiler</th>
                  <th scope="col">Nombre de Usuario</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Vehículo</th>
                  <th scope="col">Fecha de Entrega</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <!-- Ejemplo de Fila de Alquiler -->
                @foreach($alquileres as $alquiler)
                  <tr>
                    <td>{{$alquiler->id}}</td>
                    <td>
                      @foreach ($clientes as $cliente)
                        @if ($cliente->id == $alquiler->id_usuario)
                            {{ $cliente->nombre }}
                            @break
                        @endif
                      @endforeach
                    </td>
                    <td>{{$alquiler->precio_total}}</td>
                    <td>{{$alquiler->vehiculo_nombre}} {{$alquiler->vehiculo_modelo}}</td>
                    <td>{{$alquiler->fecha_entrega}}</td>
                    <td>
                      <button class="btn btn-info btn-sm">Ver Ubicación</button>
                      <form method="POST" action="{{ route('cancelar_alquiler', ['id' => $alquiler->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button  type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')" >Cancelar Servicio</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                <!-- Más filas aquí -->
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
