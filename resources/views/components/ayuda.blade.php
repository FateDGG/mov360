@foreach ($alquileres as $alquiler)
    <div class="card mb-3">
        <div class="row g-0">
        <div class="col-md-2">
            <img src="https://placehold.co/100x100" class="img-fluid rounded-start" alt="Combo Coca Cola">
        </div>
            <div class="col-md-10">
                <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Nombre restaurante</h5>
                    <span class="badge bg-warning text-dark">Estado</span>
                </div>
                <p class="card-text mb-1"><small class="text-muted">Fecha: Viernes, 9 de febrero de 2024</small></p>
                <p class="card-text mb-1"><small class="text-muted">Cantidad: 1</small></p>
                <p class="card-text mb-1"><small class="text-muted">Total: $ 11.900</small></p>
                <div class="d-flex">
                    <button class="btn btn-success me-2">Ver resumen</button>
                    <button class="btn btn-outline-success">Imprimir comprobante</button>
                    <button class="btn btn-success me-2 bg-danger ml-2">Cancelar</button>
                </div>
                </div>
            </div>
        </div>
    </div>
@endforeach