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
       @include("components.navbar") 

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

    <div class="container mt-4">
  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        Información del Usuario
      </h5>
      <p class="card-text text-black dark:text-zinc-300">Nombre: {{ Auth::user()->nombre }}</p>
      <p class="card-text text-black dark:text-zinc-300">Documento: {{ Auth::user()->documento }}</p>
      <p class="card-text text-black dark:text-zinc-300">Teléfono de Contacto: {{ Auth::user()->telefono }}</p>
      <p class="card-text text-black dark:text-zinc-300">E-Mail: {{ Auth::user()->email }}</p>
    </div>
  </div>

  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h1>Confirmación de Pago</h1>
      <p>Total: ${{ $total }}</p>
      <h2>Productos:</h2>
      <ul>
          @foreach($productos as $producto)
              <li>{{ $producto['nombre'] }} - Cantidad: {{ $producto['cantidad'] }} - Precio Unidad: ${{ $producto['precio'] }} </li>
          @endforeach
      </ul>
    </div>
  </div>

  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        <i class="bi bi-check-circle-fill text-success"></i> Método de pago
      </h5>
      <p class="card-text mt-3 text-black dark:text-zinc-300">Confirmar Pago:</p>
      <form method="POST" action="{{ route('pagar') }}">
        @csrf <!-- Agrega el token CSRF para protección contra falsificación de solicitudes entre sitios -->
        
        <!-- Información del usuario -->
        <input type="hidden" name="nombre" value="{{ Auth::user()->nombre }}">
        <input type="hidden" name="documento" value="{{ Auth::user()->documento }}">
        <input type="hidden" name="telefono" value="{{ Auth::user()->telefono }}">
        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
        
        <!-- Total y productos -->
        <input type="hidden" name="total" value="{{ $total }}">
        @foreach($productos as $key => $producto)
            <input type="hidden" name="productos[{{ $key }}][nombre]" value="{{ $producto['nombre'] }}">
            <input type="hidden" name="productos[{{ $key }}][cantidad]" value="{{ $producto['cantidad'] }}">
            <input type="hidden" name="productos[{{ $key }}][precio]" value="{{ $producto['precio'] }}">
        @endforeach
    
        <!-- Método de pago -->
        <select class="form-select" name="paymentMethod" id="paymentMethodSelect" required>
            <option selected>Escoge un medio de pago</option>
            <option value="efectivo">Efectivo</option>
            @foreach ($tarjetas as $tarjeta)
                <option value="{{ $tarjeta->id }}">**** **** **** {{ substr($tarjeta->numero, -4) }} {{ $tarjeta->titular }}</option>
            @endforeach
        </select>
        <br>
        <!-- Botón de pago -->
        <button type="submit" class="btn btn-outline-secondary dark:bg-zinc-700 w-100 mb-2">
            <i class="bi bi-plus-circle"></i> Pagar
        </button>
    </form>
    </div>
  </div>

</div>

       @extends("components.footer")  
    </body>
</html>
