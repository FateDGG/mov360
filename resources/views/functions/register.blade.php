<div class="row g-0 text-center">
  <div class="col-6 col-md-4">
      <img src="{{ asset('img/banner3.png') }}" class="card-img-top" alt="foto">
  </div>
  <div class="col-sm-6 col-md-8">
      <div class="container ingreso-titulo ">
          <h1 class="login-title">
              Ingrese sus datos para continuar
          </h1>
          <form action="{{ route('register.post') }}" method="post" id="register-form">
              @csrf <!-- Agrega el token CSRF -->

              <div class="container p-1 login-form">
                  <h3><label for="nombre" class="form-label">Nombre</label></h3>
                  <input type="text" class="form-control container" id="nombre" name="nombre" aria-describedby="emailHelp" style="width: 20rem">
              </div>
              <div class="container p-1 login-form">
                  <h3><label for="telefono" class="form-label">Celular</label></h3>
                  <input type="text" class="form-control container" id="telefono" name="telefono" aria-describedby="emailHelp" style="width: 20rem">
              </div>
              <div class="container p-1 login-form">
                  <h3><label for="email" class="form-label">Ingresa tu correo</label></h3>
                  <input type="email" class="form-control container" id="email" name="email" aria-describedby="emailHelp" style="width: 20rem">
              </div>
              <div class="container p-1 login-form">
                  <h3><label for="confirmar_email" class="form-label">Confirma tu correo</label></h3>
                  <input type="email" class="form-control container" id="confirmar_email" name="confirmar_email" aria-describedby="emailHelp" style="width: 20rem">
              </div>
              <div class="container p-2 login-form">
                  <h3><label for="password" class="form-label">Contraseña</label></h3>
                  <input type="password" class="container form-control" id="password" name="password" style="width: 20rem;">
              </div>
              <div class="container p-2 login-form">
                  <h3><label for="password_confirmation" class="form-label">Repita su contraseña</label></h3>
                  <input type="password" class="container form-control" id="password_confirmation" name="password_confirmation" style="width: 20rem;">
              </div>
              <div class="container p-5 login-form">
                  <button type="submit" class="btn btn-primary">Registrarse</button>
              </div>
          </form>
      </div>
  </div>
</div>