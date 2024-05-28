@foreach ($transportes as $transporte)
    <div class="card mb-3">
        <div class="row g-0">
        <div class="col-md-2">
            <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="Combo Coca Cola">
        </div>
            <div class="col-md-10">
                <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Dirección de recogida: {{$transporte->lugar_recogida }}</h5>
                    <h5 class="card-title">Dirección de llegada: {{$transporte->lugar_destino}}</h5>
                </div>
                @php
                $conductor = $conductores->firstWhere('nombre', $transporte->nombre_conductor);
                @endphp
                <p class="card-text mb-1"><small class="text-muted">Nombre conductor: {{$conductor->nombre}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Vehículo: {{$conductor->vehiculo}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Placa: {{$conductor->placa}}</small></p>
                <p class="card-text mb-1"><small class="text-muted">Precio: {{$transporte->precio}}</small></p>
                <div class="d-flex">
                    <a href="{{ url('/Ubicacion') }}" class="btn btn-info btn-sm">Ver Ubicación</a>
                    <form action="{{ route('formularioCancelacionTransporte') }}" method="GET">
                        <input type="hidden" name="id" value="{{ $transporte->id }}">
                        <button type="submit" class="btn btn-danger">Cancelar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach