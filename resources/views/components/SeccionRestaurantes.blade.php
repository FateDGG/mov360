<div class="container-fluid text-center p-4">
    <div class="row">
        <div class="col">
            <img src="{{ asset('img/Bannercomidarapida.png') }}" class="img-fluid" style="max-height: 300px; width: 100%;" alt="Banner de comida rápida">
        </div>
    </div>
    <div class="row p-4">
        <div class="col">
            <h1>
                Restaurantes de comida {{$tipoCocina}}
            </h1>
        </div>
    </div>
    <div class="container text-center">
        <div class="row row-cols-3 pb-2">
          @foreach($restaurantes as $restaurante)  
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
          @endforeach
        </div>
      </div>
</div>
