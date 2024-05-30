<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MOV360</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
   @include("components.navbar")

   <div style="background-image: url('{{ asset('img/bannerAlquilar.png') }}'); background-size: cover; background-repeat: no-repeat; height: 600px; display: flex; justify-content: center; align-items: center;">
    <div class="container mt-5 alquilerTitle">
        <h1 class="mb-3 ">Vehículos de alquiler en Colombia</h1>

        <form id="formularioAlquiler" class="pb-4">
          <div class="form-group">
            <select class="form-control mb-2" name="devol" id="devol" required>
              <option>Selecciona el lugar de devolución</option>
              <option>Devolución en el mismo punto</option>
              <option>Otra sucursal</option>
            </select>

            <select class="form-control mb-2" name="edad" id="edad" required>
              <option>Selecciona la edad del conductor</option>
              <option>Menos de 25</option>
              <option>26-65</option>
              <option>Más de 65</option>
            </select>

            <select class="form-control mb-2" name="aeropuerto" id="aeropuerto" required placeholder="Seleccionar aeropuerto o">
              <option value=''>Seleccionar aeropuerto o ciudad</option>
              @foreach ($aeropuertos as $aeropuerto)
                <option>{{ $aeropuerto->nombre }}</option>
              @endforeach
            </select>

            <div class="d-flex justify-content-between">
              <input type="date" class="form-control mb-2 calendary" name="recogida" id="recogida" placeholder="lun. 13/5" required/>
              <select name="hora_recogida" id="hora_r" class="form-control mb-2 timepicker">
                <option>Selecciona la hora de recogida</option>
                <?php
                for ($i = 8; $i < 24; $i++) {
                    $hora = str_pad($i, 2, "0", STR_PAD_LEFT);
                    echo "<option value=\"$hora\">$hora</option>";
                }
                ?>
              </select>
              <input type="date" class="form-control mb-2 calendary" name="entrega" id="entrega" placeholder="lun. 20/5" required/>
              <select name="hora_entrega" id="hora_e" class="form-control mb-2 timepicker">
                <option>Selecciona la hora de entrega</option>
                <?php
                for ($i = 8; $i < 24; $i++) {
                    $hora = str_pad($i, 2, "0", STR_PAD_LEFT);
                    echo "<option value=\"$hora\">$hora</option>";
                }
                ?>
              </select>
            </div>

          </div>
        </form>

        <div class="row">
          <div class="col-md-3 pb-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Ahorra hasta un 38%</h5>
                <p class="card-text">Comparado con otras webs que brindan servicios similares.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Uso gratuito</h5>
                <p class="card-text">No hay cargos ni tasas ocultos en ninguno de nuestros servicios.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Diversidad de ofertas</h5>
                <p class="card-text">Encuentra diveridad de vehículos, marcas y otras características.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Reserva con flexibilidad</h5>
                <p class="card-text">
                  Usa el filtro "Cancelación gratis" para encontrar opciones flexibles.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="container text-center">
    <div class="row row-cols-4 pb-2">
        @foreach($vehiculos as $vehiculo)
            <div class="col pb-4 pt-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{$vehiculo->url_foto}}" class="card-img-top" alt="{{$vehiculo->marca}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$vehiculo->marca}}</h5>
                        <p class="card-text"><strong>Precio por día por 30 días</strong></p>
                        <p class="card-text text-danger fs-4 fw-bold">{{$vehiculo->precio}}</p>
                        <p class="card-text"><strong>{{$vehiculo->modelo}}</strong> o similar</p>
                        
                        <form method="POST" action="{{ route('procesarFormulario') }}" class="alquilar-form">
                            @csrf
                            <!-- Campos ocultos para la información del vehículo -->
                            <input type="hidden" name="devolucion" value="">
                            <input type="hidden" name="edadConductor" value="">
                            <input type="hidden" name="aeropuertoCiudad" value="">
                            <input type="hidden" name="fechaRecogida" value="">
                            <input type="hidden" name="horaRecogida" value="">
                            <input type="hidden" name="fechaEntrega" value="">
                            <input type="hidden" name="horaEntrega" value="">
                            <input type="hidden" name="marca" value="{{$vehiculo->marca}}">
                            <input type="hidden" name="modelo" value="{{$vehiculo->modelo}}">
                            <input type="hidden" name="precio" value="{{$vehiculo->precio}}">                         
                            <button type="submit" class="btn btn-danger">Alquilar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const devolSelect = document.getElementById('devol');
        const edadSelect = document.getElementById('edad');
        const aeropuertoSelect = document.getElementById('aeropuerto');
        const recogidaInput = document.getElementById('recogida');
        const horaRSelect = document.getElementById('hora_r');
        const entregaInput = document.getElementById('entrega');
        const horaESelect = document.getElementById('hora_e');

        function asignarValores(form) {
            const devolucionCampoOculto = form.querySelector('input[name="devolucion"]');
            const edadConductorCampoOculto = form.querySelector('input[name="edadConductor"]');
            const aeropuertoCiudadCampoOculto = form.querySelector('input[name="aeropuertoCiudad"]');
            const fechaRecogidaCampoOculto = form.querySelector('input[name="fechaRecogida"]');
            const horaRecogidaCampoOculto = form.querySelector('input[name="horaRecogida"]');
            const fechaEntregaCampoOculto = form.querySelector('input[name="fechaEntrega"]');
            const horaEntregaCampoOculto = form.querySelector('input[name="horaEntrega"]');

            devolucionCampoOculto.value = devolSelect.options[devolSelect.selectedIndex].text;
            edadConductorCampoOculto.value = edadSelect.options[edadSelect.selectedIndex].text;
            aeropuertoCiudadCampoOculto.value = aeropuertoSelect.options[aeropuertoSelect.selectedIndex].text;
            fechaRecogidaCampoOculto.value = recogidaInput.value;
            horaRecogidaCampoOculto.value = horaRSelect.options[horaRSelect.selectedIndex].text;
            fechaEntregaCampoOculto.value = entregaInput.value;
            horaEntregaCampoOculto.value = horaESelect.options[horaESelect.selectedIndex].text;
        }

        document.querySelectorAll('.alquilar-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                asignarValores(form);
            });
        });
    });
</script>

@extends("components.footer")
</body>
</html>

