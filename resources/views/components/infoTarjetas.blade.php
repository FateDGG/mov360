<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div class="container mt-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="text-success text-lg"><i class="bi bi-credit-card"></i> Métodos de pago</h5>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="card border-success text-center">
      <div class="card-body flex items-center justify-center">
        <i class="bi bi-plus-circle text-4xl"></i>
      </div>
    </div>
    <div class="card bg-success text-white">
      <div class="card-body flex flex-col items-center justify-center">
        <div class="flex items-center justify-between">
          <i class="bi bi-cash-coin"></i>
          
        </div>
        <h5 class="mt-3 text-lg">Efectivo</h5>
      </div>
    </div>
    @foreach ($tarjetas as $tarjeta)
      @include ("components.tarjetaCard", ['tarjetas' => $tarjetas])
    @endforeach
  </div>
</div>
  </body>
</html>