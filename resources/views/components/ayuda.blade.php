@foreach ($alquileres as $alquiler)
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="Combo Coca Cola">
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Marca: {{ $alquiler->vehiculo_modelo }}</h5>
                        <h5 class="card-title">Modelo: {{ $alquiler->vehiculo_nombre}}</h5>
                    </div>
                    <p class="card-text mb-1"><small class="text-muted">Fecha de recogida: {{ $alquiler->fecha_recogida}}</small></p>
                    <p class="card-text mb-1"><small class="text-muted">Hora de recogida: {{ $alquiler->hora_recogida}}</small></p>
                    <p class="card-text mb-1"><small class="text-muted">Fecha de Entrega: {{ $alquiler->fecha_entrega}}</small></p>
                    <p class="card-text mb-1"><small class="text-muted">Hora de Entrega: {{ $alquiler->hora_entrega}}</small></p>
                    <p class="card-text mb-1"><small class="text-muted">Lugar de entrega: {{ $alquiler->lugar_entrega}}</small></p>
                    <p class="card-text mb-1"><small class="text-muted">Precio: {{ $alquiler->precio_total}}</small></p>
                    <div class="d-flex">
                        <form action="{{ route('mostrarFormularioCancelacion') }}" method="GET">
                            <input type="hidden" name="id" value="{{ $alquiler->id }}">
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach