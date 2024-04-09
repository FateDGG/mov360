<div class="row g-0 text-center">
  <div class="col-6 col-md-4">
    <img src="{{ asset('img/banner3.png') }}" class="card-img-top" alt="foto">
  </div>
  <div class="col-sm-6 col-md-8">

  <div class="container ingreso-titulo ">
    <h1 class="login-title">
      Ingrese sus datos para continuar
    </h1>
    <form>
      <div class="container p-4 login-form">
        <h3><label for="exampleInputEmail1" class="form-label">Ingresa tu numero o correo</label></h3>
        <input type="email" class="form-control container" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 20rem">
      </div>
      <div class="container p-2 login-form">
        <h3><label for="exampleInputPassword1" class="form-label">Password</label></h3>
        <input type="password" class="container form-control" id="exampleInputPassword1" style="width: 20rem;">
      </div>
      <div class="container p-5 login-form">
      <a href="{{ url('/home') }}"><button type="submit" class="btn btn-primary">Ingresar</button></a>
    </div>
    </form>
  </div>
</div>