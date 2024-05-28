

  <div style="background-image: url('{{ asset('img/banner.png') }}'); background-size: cover; background-repeat: no-repeat; height: 550px; display: flex; justify-content: center; align-items: center;"class="img-fluid">
    <div class="container banner" style="max-width: 80%;">
        <h1 class="banner-text">¡Adquiere un 10% de descuento!</h1>
    <h5 class="banner-text">
        Registrate y obten descuentos especiales en tus primeros servicios
    </h5>
    <a href="{{ url('/Ingreso') }}">
      <button id="registerButton" class="btn btn-primary banner-button" type="button">Registrate</button>
    </a>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="loggedInModal" tabindex="-1" role="dialog" aria-labelledby="loggedInModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loggedInModalLabel">Información</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ya estás logueado.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ESC</button>
                </div>
            </div>
        </div>
    </div>
<div class="container text-center home-page-cards">
    <h3 > ¿Que servicios necesitas? </h3>

    <div class="row home-page-cards col-space">
      <div class="col e">
        <div class="card" style="width: 18rem;height: 24rem;">
            <a href="{{ url('/Domicilios') }}"><img src="{{ asset('img/domicilios.png') }}" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Pide comida en tu restaurante favorito y recibla en la puerta de tu casa</p>
            </div>
          </div>
      </div>
      <div class="col ">
        <div class="card" style="width: 18rem; height: 24rem;">
            <a href="{{ url('/Solicitar_Transporte') }}"><img src="{{ asset('img/Transporte.jpeg') }}" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text">¿Necetas ir a algun lado? Pide aqui un transporte seguro y rapido</p>
            </div>
          </div>
      </div>
      <div class="col ">
        <div class="card" style="width: 18rem;height: 24rem;">
            <a href="{{ url('/Alquilar_Vehiculo') }}"><img src="{{ asset('img/renta.png') }}" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text">¿Necesitas un vehiculo? Renta uno para desplazarte mas facilmente</p>
            </div>
          </div>
      </div>
    </div>
  </div>

<div class="clearfix">
    <div class="container">
        <img src="{{ asset('img/logoMOV360.png') }}" class="col-md-6 float-md-end mb-3 ms-md-3" alt="..." style="display: flex; justify-content: center; align-items: center;">
        <br>
        <h3 > ¿Quienes somos? </h3>
        <p>
            Somos una plataforma de coordinación de transporte multimodal diseñada para transformar la forma en que las ciudades modernas gestionan sus necesidades de transporte. Nuestro objetivo es proporcionar una solución integral que abarque todas las facetas del transporte, desde las entregas a domicilio hasta el transporte municipal y urbano.
        </p>
    
        <p>
            Mov360 es más que un simple sistema de gestión de transporte. Es una solución completa que integra diversas fuentes de información, como alarmas y datos de GPS, para proporcionar un servicio de transporte seguro, eficiente y fácil de usar. Nuestra plataforma es accesible para todos, independientemente de su nivel de habilidad tecnológica, y ofrece una amplia gama de servicios de transporte que se pueden personalizar para satisfacer las necesidades individuales de cada usuario.
        </p>
    
        <p>
            Además de gestionar los servicios de transporte, Mov360 también ofrece la opción de alquilar diversos medios de transporte, como bicicletas, patinetas eléctricas, taxis y aviones. Los usuarios pueden reservar y pagar estos servicios de alquiler en línea, lo que hace que el proceso sea conveniente y sin complicaciones.
        </p>
        <p>
            Estamos comprometidos con la innovación y la mejora continua, y estamos constantemente buscando formas de hacer que nuestro sistema sea aún mejor. Creemos en el poder de la tecnología para transformar nuestras ciudades y hacer que el transporte sea más eficiente, seguro y accesible para todos.


        </p>
  </div>
</div>

<div class="container text-center home-page-cards">
    <h3 > Trabaja con nosotros </h3>

    <div class="row home-page-cards col-space">
      <div class="col e">
        <div class="card mb-3">
            <img src="{{ asset('img/registrarConductor.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Postulate como conductor</h5>
              <p class="card-text">Solicita el registro como conductor para hacer parte de nuestra plataforma</p>
              <a href="{{url('/RegistroDeConductor')}}" class="btn btn-primary">Registrate</a>
            </div>
          </div>
      </div>
      <div class="col ">
        <div class="card mb-3">
            <img src="{{ asset('img/registraEmpresa.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Postula tu comercio/restaurante</h5>
              <p class="card-text">Registra tu comercio o restaurante para ampliar la cobertura de tu negocio haciendo parte de nuestra plataforma</p>
              <a href="{{url('/RegistroDeEmpresa')}}" class="btn btn-primary">Registrate</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const isLoggedIn = @json(auth()->check());
          const registerButton = document.getElementById('registerButton');
          
          registerButton.addEventListener('click', function(event) {
              if (isLoggedIn) {
                  event.preventDefault();
                  $('#loggedInModal').modal('show');
              }
          });
      });
  </script>
