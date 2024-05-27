<div class="card bg-primary text-white">
    <div class="card-body flex flex-col items-center justify-center">
      <div class="flex items-center justify-between">
        <i class="bi bi-credit-card-2-back"></i>

      </div>
      <div class="mt-3 text-lg">
        <p class="mb-1">**** **** **** {{ substr($tarjeta->numero, -4) }}</p>
        <small>{{ $tarjeta->titular }}</small>
        <br>
        <small class="float-end">{{ str_pad($tarjeta->mes, 2, '0', STR_PAD_LEFT) }}/{{ substr($tarjeta->anio, -2) }}</small>
      </div>
    </div>
  </div>