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
          {{-- <div class="col pb-4 pt-4">@include("components.restauranteCard")</div>
          <div class="col pb-4 pt-4">@include("components.restauranteCard")</div>
          <div class="col pb-4 pt-4">@include("components.restauranteCard")</div>
          <div class="col pb-4 pt-4">@include("components.restauranteCard")</div>
          <div class="col pb-4 pt-4">@include("components.restauranteCard")</div> --}}
        </div>
      </div>
</div>
