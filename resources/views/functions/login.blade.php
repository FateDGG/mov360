<div class="row g-0 text-center">
  <div class="col-6 col-md-4">
    <img src="{{ asset('img/banner3.png') }}" class="card-img-top" alt="foto">
  </div>
  <div class="col-sm-6 col-md-8">

  <div class="container ingreso-titulo ">
    <h1 class="login-title">
      Ingrese sus credenciales
    </h1>
    @if (session('error'))
    <div id="popup" class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <form action="{{ route('login') }}" method="post">
      @csrf <!-- Agrega el token CSRF -->
      <div class="container p-4 login-form">
          <h3><label for="email" class="form-label">Ingresa tu correo</label></h3>
          <input type="text" class="form-control container" id="email" name="email" aria-describedby="emailHelp" style="width: 20rem" required>
      </div>
      <div class="container p-2 login-form">
          <h3><label for="password" class="form-label">Contraseña</label></h3>
          <input type="password" class="container form-control" id="password" name="password" style="width: 20rem;" required>
      </div>
      <div class="container p-5 login-form">
          <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
  </form>
  </div>
</div>