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
      <h5 class="card-title text-black dark:text-white">Información del vehiculo</h5>
      <p class="card-text text-black dark:text-zinc-300">Marca del auto: {{ $modelo }}</p>
      <p class="card-text text-black dark:text-zinc-300">Modelo: {{ $marca }}</p>
      <p class="card-text text-black dark:text-zinc-300">Tarifa Diaria: {{ $precio }}</p>
      <h5 class="card-text text-black dark:text-white">Fecha de Recogida: {{ $fechaRecogida }}</h5>
      <p class="card-text text-black dark:text-zinc-300">Hora de Recogida: {{ $horaRecogida }}</p>
      <p class="card-text text-black dark:text-zinc-300">Aeropuerto/Ciudad de recogida: {{ $aeropuertoCiudad }}</p>
      <p class="card-text text-black dark:text-zinc-300">Lugar de Devolución: {{ $devolucion }}</p>
      <p class="card-text text-black dark:text-zinc-300">Fecha de Devolución: {{ $fechaEntrega }}</p>
      <p class="card-text text-black dark:text-zinc-300">Hora de Devolución: {{ $horaEntrega }}</p>
    </div>
  </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fechaRecogida = new Date("{{ $fechaRecogida }}");
        const fechaEntrega = new Date("{{ $fechaEntrega }}");
        const precioStr = "{{ $precio }}"; // Precio obtenido del backend como cadena
        const precio = parseFloat(precioStr); // Convertir el precio a un número decimal

        // Calcular la diferencia en milisegundos
        const diferenciaMs = fechaEntrega - fechaRecogida;

        // Convertir la diferencia en días
        const diasDiferencia = Math.ceil(diferenciaMs / (1000 * 60 * 60 * 24));

        // Calcular el precio total multiplicando la cantidad de días por el precio
        const precioTotal = diasDiferencia * precio;

        // Seleccionar el elemento donde mostrar el precio total
        const precioTotalElemento = document.getElementById('precioTotal');

        // Mostrar el precio total dentro del elemento seleccionado
        precioTotalElemento.textContent = "$" + precioTotal;
    });
</script>
  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        Información del Usuario
      </h5>
      <p class="card-text text-black dark:text-zinc-300">Nombre: {{ Auth::user()->nombre }}</p>
      <p class="card-text text-black dark:text-zinc-300">Documento: {{ Auth::user()->documento }}</p>
      <p class="card-text text-black dark:text-zinc-300">Teléfono de Contacto: {{ Auth::user()->telefono }}</p>
      <p class="card-text text-black dark:text-zinc-300">E-Mail: {{ Auth::user()->email }}</p>
      <p class="card-text text-black dark:text-zinc-300">Total a pagar: <p id="precioTotal"></p></p>
    </div>
  </div>

  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        <i class="bi bi-check-circle-fill text-success"></i> Método de pago
      </h5>
      <p class="card-text text-black dark:text-zinc-300">Métodos disponibles:</p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="efectivo" checked>
        <label class="form-check-label" for="efectivo" class="text-black dark:text-white">
          <i class="bi bi-cash"></i> Efectivo
        </label>
      </div>
      @foreach ($tarjetas as $tarjeta)
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="visa">
          <label class="form-check-label" for="visa" class="text-black dark:text-white">
            <i class="bi bi-credit-card"></i> **** **** **** {{ substr($tarjeta->numero, -4) }} {{ $tarjeta->titular }}
          </label>
        </div>
      @endforeach
        <div class="form-check">
          <input class="form-check-input" type="radio" name="paymentMethod" id="visa">
          <label class="form-check-label" for="visa" class="text-black dark:text-white">
            <i class="bi bi-credit-card"></i> 409355 •••• 3763 JUAN YEPES
          </label>
        </div>
      <p class="card-text mt-3 text-black dark:text-zinc-300">Agregar método de pago:</p>
      <button class="btn btn-outline-secondary dark:bg-zinc-700 w-100 mb-2">
        <i class="bi bi-plus-circle"></i> Agregar tarjeta de crédito o débito
      </button>
      <p class="card-text text-black dark:text-zinc-300">Métodos no disponibles:</p>
      <button class="btn btn-outline-danger dark:bg-red-600 w-100">
        <i class="bi bi-exclamation-circle"></i> Rappi Pay <span class="text-danger">Tu cuenta no tiene fondos.</span>
      </button>
    </div>
  </div>

  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        <i class="bi bi-ticket-perforated"></i> Cupón: <a href="#" class="text-success dark:text-green-300 float-end">+ Agregar</a>
      </h5>
    </div>
  </div>

</div>

       @extends("components.footer")  
    </body>
</html>
