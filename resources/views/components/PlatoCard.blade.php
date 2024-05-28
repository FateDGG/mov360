<form method="POST" action="{{ route('carrito.agregar') }}">
  @csrf
  <input type="hidden" name="plato_id" value="{{ $plato->id }}">
  <div class="card" style="width: 18rem;">
      <img src="{{ asset($plato->url_imagen) }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">{{ $plato->nombre_plato }}</h5>
          <p class="card-text">{{ $plato->descripcion }}</p>
          <p class="card-text">{{ $plato->precio }}</p>
          <input type="number" name="cantidad" value="1" min="1">
          <p> </p>
          <button type="submit" class="btn btn-primary">Añadir al carrito</button>
      </div>
  </div>
</form>

