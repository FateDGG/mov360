@foreach ($transportes as $transporte)
    <div class="card mb-3">
        <div class="row g-0">
        <div class="col-md-2">
            <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="Combo Coca Cola">
        </div>
            <div class="col-md-10">
                <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Marca: {{$transporte->lugar_recogida }}</h5>
                    <h5 class="card-title">Modelo: {{$transporte->lugar_destino}}</h5>
                </div>
                @php
                $conductor = $conductores->firstWhere('nombre', $transporte->nombre_conductor);
                @endphp
                <p class="card-text mb-1"><small class="text-muted">Nombre conductor: {{$conductor->nombre}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Vehículo: {{$conductor->vehiculo}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Placa: {{$conductor->placa}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Precio: {{$transporte->precio}}</small></p>
                <div class="d-flex">
                    <button class="btn btn-success me-2 bg-danger ml-2">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach