<nav class="navbar navbar-expand-lg bg-color-navbar">
    <div class="container-fluid">
        <a class="navbar-brand " href="{{ url('/') }}">
            <img src="{{ asset('img/logo2.png') }}" alt="MOV360" width="160" height="36">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        
        </div>
        <ul class="nav">
            @guest <!-- Comprueba si el usuario no está autenticado -->
                <li class="nav-item perfil-button">
                    <a class="nav-color" href="{{ url('/Ingreso') }}">Ingresar</a>
                </li>
            @else <!-- Si el usuario está autenticado -->
                <li class="nav-item perfil-button">
                    @if(Auth::user()->role === 'driver' || Auth::user()->role === 'admin')
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-color" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Cerrar Sesión
                        </a>
                    @else
                        <a class="nav-color" href="{{ url('/Profile') }}"> {{ Auth::user()->nombre }}</a>
                    @endif
                </li>
            @endguest
          
        
      </div>
      
    </div>
  </nav>