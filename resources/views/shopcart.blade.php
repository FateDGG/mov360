<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOV360</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   @include("components.navbar") 
   <section class="vh-100" style="background-color: #ffffff;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <p><span class="h2">Shopping Cart </span></p>
          @if(session('carrito'))
            @php
                $total = session('total', 0); // Obtener el valor total actual o 0 si no existe
            @endphp

            @foreach(session('carrito') as $key => $item)
              <div class="card mb-4">
                <div class="card-body p-4">

                  <div class="row align-items-center">
                    <div class="col-md-2">
                      <img src="{{ asset($item['plato']->url_imagen) }}" class="img-fluid" alt="Imagen del plato">
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Name</p>
                        <p class="lead fw-normal mb-0">{{ $item['plato']->nombre_plato }}</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
  
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Quantity</p>
                        <p class="lead fw-normal mb-0">{{ $item['cantidad'] }}</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Price</p>
                        <p class="lead fw-normal mb-0">{{ $item['plato']->precio }}</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Total</p>
                        <p class="lead fw-normal mb-0">{{ $item['plato']->precio * $item['cantidad'] }}</p>
                      </div>
                    </div>
                    <!-- Botón para eliminar el producto -->
                    <div class="col-md-2 d-flex justify-content-center">
                        <form action="{{ route('carrito.eliminar', ['key' => $key]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                  </div>

                </div>
              </div>

              @php
                  // No es necesario calcular el total aquí ya que se ha calculado previamente en el controlador
              @endphp
              
            @endforeach
            <div class="card mb-5">
              <div class="card-body p-4">
                <div class="float-end">
                  <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal">${{ $total }}</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-end">
              <a href="{{ url('/') }}"><button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg me-2">Continue shopping</button></a>
              <form id="paymentForm" method="POST" action="{{ url('/Pagos') }}">
                @csrf
                <input type="hidden" name="total" value="{{ $total }}">
                @foreach(session('carrito') as $item)
                    <input type="hidden" name="productos[{{ $item['plato']->id }}][nombre]" value="{{ $item['plato']->nombre_plato }}">
                    <input type="hidden" name="productos[{{ $item['plato']->id }}][cantidad]" value="{{ $item['cantidad'] }}">
                    <input type="hidden" name="productos[{{ $item['plato']->id }}][precio]" value="{{ $item['plato']->precio }}">
                @endforeach
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('paymentForm').submit();">
              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Ir a Pagar</button>
            </a>
          
            </div>
          @else
          <div class="float-end">
            <p class="mb-0 me-5 d-flex align-items-center">
              <span class="small text-muted me-2"></span> <span class="lead fw-normal">Su carrito está vacío</span>
            </p>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@include("components.footer")  
</body>
</html>
