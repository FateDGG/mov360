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
    <form method="GET" action="{{ route('restaurante.show') }}">
        <button type="submit" style="border: none; background: none; padding: 0;">
            <input type="hidden" name="nombre" value="{{ $restaurante->nombre }}">
            <div class="card" style="width: 20rem;">
                <img src="{{ asset($restaurante->url_foto) }}" class="card-img-top fixed-size-img" alt="..." style="width: 100%; height: 10rem; object-fit: cover; object-position: center;">
                <div class="card-body">
                    <p class="card-text">{{ $restaurante->nombre }}</p> <!-- Mostrar el nombre del restaurante -->
                    <!-- Puedes mostrar más información del restaurante aquí -->
                </div>
            </div>
        </button>
    </form>
</div>
