<div class="container mt-5 alquilerTitle">
      <h1 class="mb-3 ">Carros de alquiler en Colombia</h1>
  
      <form class="pb-4">
        <div class="form-group">
          <select class="form-control mb-2">
            <option>Devolución en el mismo punto</option>
            <option>Otra sucursal</option>
          </select>
  
          <select class="form-control mb-2">
            <option>Edad del conductor: 26-65</option>
            <option>Menos de 25</option>
            <option>Más de 65</option>
          </select>
  
          <select class="form-control mb-2">
            <option>Seleccionar aeropuerto o ciudad</option>
            @foreach ($aeropuertos as $aeropuerto)
              <option>{{ $aeropuerto->nombre }}</option>
            @endforeach
          </select>
  
          <div class="d-flex justify-content-between">
            <input type="date" class="form-control mb-2 calendary" placeholder="lun. 13/5" />
            {{-- <input type="text" class="form-control mb-2 timepicker" placeholder="Mediodía" /> --}}
            <select name="hora" id="hora" class="form-control mb-2 timepicker">
              <option>Selecciona la hora de recogida</option>
              <?php
              // Generar las opciones para las horas (0-23)
              for ($i = 8; $i < 24; $i++) {
                  $hora = str_pad($i, 2, "0", STR_PAD_LEFT);
                  echo "<option value=\"$hora\">$hora</option>";
              }
              ?>
            </select>
            <input type="date" class="form-control mb-2 calendary" placeholder="lun. 20/5" />
            <select name="hora" id="hora" class="form-control mb-2 timepicker">
              <option>Selecciona la hora de entrega</option>
              <?php
              // Generar las opciones para las horas (0-23)
              for ($i = 8; $i < 24; $i++) {
                  $hora = str_pad($i, 2, "0", STR_PAD_LEFT);
                  echo "<option value=\"$hora\">$hora</option>";
              }
              ?>
            </select>
          </div>
  
          <button type="submit" class="btn btn-warning btn-block">Buscar</button>
        </div>
      </form>
  
      
  
      <div class="row">
        <div class="col-md-3 pb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ahorra hasta un 38%</h5>
              <p class="card-text">Compara varias webs de viajes con una sola búsqueda.</p>
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
              <h5 class="card-title">Filtra tus ofertas</h5>
              <p class="card-text">Filtra por tipo de carro, marca y otras características.</p>
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
