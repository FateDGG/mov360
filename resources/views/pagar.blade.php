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
      <h5 class="card-title text-black dark:text-white">Dirección de entrega <a href="#" class="text-success dark:text-green-300 float-end">Cambiar</a></h5>
      <p class="card-text text-black dark:text-zinc-300">Calle 200 # 12 - 528</p>
      <p class="card-text text-muted dark:text-zinc-400">Instrucciones de entrega (opcional)</p>
      <div class="input-group">
        <input type="text" class="form-control" value="apartamento 901 torre 4">
        <button class="btn btn-outline-secondary dark:bg-zinc-700" type="button">✖</button>
      </div>
    </div>
  </div>

  
  <div class="card bg-white dark:bg-zinc-800 mb-3">
    <div class="card-body">
      <h5 class="card-title text-black dark:text-white">
        <img src="https://placehold.co/30" alt="McDonald's" class="rounded-circle me-2">
        McDonald's
        <span class="badge bg-secondary dark:bg-zinc-600 float-end">1 producto</span>
      </h5>
      <p class="card-text text-black dark:text-zinc-300">Entrega estimada: <strong>42 - 57 min</strong></p>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="deliveryOption" id="prioritaria">
        <label class="form-check-label" for="prioritaria" class="text-black dark:text-white">
          Prioritaria ⚡ Envío directo a ti <span class="float-end">+$4,000</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="deliveryOption" id="basica" checked>
        <label class="form-check-label" for="basica" class="text-black dark:text-white">
          Básica Entrega habitual <span class="float-end">$0</span>
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="deliveryOption" id="economica">
        <label class="form-check-label" for="economica" class="text-black dark:text-white">
          Económica Espera y ahorra <span class="float-end">-$4,000</span>
        </label>
      </div>
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
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="visa">
        <label class="form-check-label" for="visa" class="text-black dark:text-white">
          <i class="bi bi-credit-card"></i> 409355 •••• 3763 JUAN YEPES
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="mastercard">
        <label class="form-check-label" for="mastercard" class="text-black dark:text-white">
          <i class="bi bi-credit-card"></i> 525358 •••• 5409 JUAN YEPES
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
