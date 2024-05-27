<div class="card" style="width: 18rem;">
  <img src="{{$vehiculo->url_foto}}" class="card-img-top" alt="Fiat Mobi 1.0">
  <div class="card-body">
    <h5 class="card-title">{{$vehiculo->marca}}</h5>
    <p class="card-text"><strong>Precio por día por 30 días</strong></p>
    <p class="card-text text-danger fs-4 fw-bold">{{$vehiculo->precio}}</p>
    <p class="card-text"><strong>{{$vehiculo->modelo}}</strong> o similar</p>
  
    <a href="{{ url('/PagosAlquilado') }}" class="btn btn-danger">Alquilar</a>
  </div>
</div>
