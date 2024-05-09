{{-- <div class="col top-pad">
    <a href="{{ url('/Restaurante') }}">
    <div class="card" style="width: 20rem;">
        <img src="{{ asset('img/restaurantes.jpeg')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Restaurante name</p>
        </div>
      </div>
    </a>
  </div> --}}
<div class="col top-pad">
    <a href="{{ url('/Restaurante') }}">
    <div class="card" style="width: 20rem;">
        <img src="{{ asset('img/restaurantes.jpeg')}}" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">{{ $restaurante->nombre }}</p> <!-- Mostrar el nombre del restaurante -->
            <!-- Puedes mostrar más información del restaurante aquí -->
        </div>
    </div>
  </a>  
</div>