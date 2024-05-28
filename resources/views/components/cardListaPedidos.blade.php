<tr>
    <td>{{ $compra->id }}</td>
    <td>
      @foreach ($usuarios as $usuario)
        @if ($usuario->id == $compra->id_usuario)
            {{ $usuario->nombre }}
            @break
        @endif
      @endforeach
    </td>
    <td>{{$compra->valor}}</td>
    <td>
      <button class="btn btn-info btn-sm">Ver Ubicación</button>
      <button class="btn btn-danger btn-sm">Cancelar Servicio</button>
    </td>
  </tr>