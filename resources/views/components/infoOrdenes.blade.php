<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-3">¡Mis últimos pedidos!</h2>
    <p class="text-muted mb-4">Hazle seguimiento al detalle a tus pedidos anteriores y solicita ayuda si hay algún inconveniente con una de tus compras.</p>

    @foreach($compras as $compra)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="Combo Coca Cola">
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Pedido número: {{$compra->id}}</h5>
                        
                    </div>
                    <p class="card-text mb-1"><small class="text-muted">Fecha y hora del pedido: {{$compra->created_at}}</small></p>
                    

                    <!-- Iterar sobre los elementos de la descripción -->
            @foreach(explode(', ', $compra->descripcion) as $item)
              @php
                  // Dividir cada elemento en cantidad y precio
                  $detalle = explode('(Cantidad: ', $item);

                  // Verificar si la división fue exitosa
                  $nombre = $detalle[0];
                  $cantidadPrecio = isset($detalle[1]) ? rtrim($detalle[1], ')') : '';
              @endphp

              @if (!empty($cantidadPrecio))
                  <p class="card-text mb-1"><small class="text-muted">{{$nombre}} - (Cantidad: {{$cantidadPrecio}})</small></p>
              @else
                  <p class="card-text mb-1"><small class="text-muted">{{$nombre}}</small></p>
              @endif
            @endforeach


                    <p class="card-text mb-1"><small class="text-muted">Total: $ {{$compra->valor}}</small></p>
                    <div class="d-flex">
                        <button class="btn btn-success me-2 bg-danger ml-2">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
</body>
</html>
