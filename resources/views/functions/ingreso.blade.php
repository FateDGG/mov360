

<div class="row g-0 text-center">
    <div class="col-6 col-md-4">
      <img src="{{ asset('img/banner3.png') }}" class="card-img-top" alt="foto">
    </div>
    <div class="col-sm-6 col-md-8">

    <div class="container ingreso-titulo">
      <h1>
        Registrarse <br>o<br> Iniciar sesión
      </h1>
      @if (session('error'))
        <div id="popup" class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif
    </div>
    <div class="container p-2">
        <h1>
            <a href="{{ url('/Register') }}"><button type="button" class="btn btn-dark  btn-ingreso btn-rounded" data-mdb-ripple-init>Registrarme</button>
        </h1>
      </div>
    <div class="container p-2">
      <h1>
        <a href="{{ url('/LogIn') }}"><button type="button" class="btn btn-dark btn-ingreso btn-rounded" data-mdb-ripple-init>Ya tengo una cuenta</button></a>
      </h1>
    </div>
    
       
    

    
    
    
    </div>
    
  </div>