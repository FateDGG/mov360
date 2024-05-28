  @foreach($conductores as $conductor)
    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
      <div>
        <h5>Nombre del Conductor: {{$conductor->nombre}}</h5>
        <p>Teléfono: {{$conductor->telefono}}</p>
        <p>Placa del Vehículo: {{$conductor->placa}}</p>
      </div>
      {{-- <img src="ruta/a/la/foto.jpg" alt="Foto del Conductor" class="img-thumbnail" style="width: 100px; height: auto;"> --}}
      <form method="POST" action="{{ route('eliminar_conductor', ['id' => $conductor->id]) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este conductor?')">Delete</button>
      </form>
    </li>
  @endforeach