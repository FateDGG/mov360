<div class="">
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Información de tu cuenta</h4>
        </div>
        <div class="row mt-2">
            <div class="col-md-6"><label class="labels">Nombre(s)</label><input name="nombre" type="text" class="form-control" placeholder="first name" value="{{ Auth::user()->nombre }}"></div>
            
        </div>
        <div class="row mt-3">
            <div class="col-md-6"><label class="labels">Correo Electrónico</label><input name="email" type="email" class="form-control" placeholder="email" value="{{ Auth::user()->email }}"></div>
            <div class="col-md-6"><label class="labels">Celular</label><input name="telefono" type="text" class="form-control" value="{{ Auth::user()->telefono }}"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6"><label class="labels">Número de identidad</label><input name="documento" type="text" class="form-control" value="{{ Auth::user()->documento }}"></div>
            <div class="col-md-6"><label class="labels">Fecha de nacimiento</label><input name="fechaNac" type="date" class="form-control" value="{{ Auth::user()->fechaNac }}"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Género</label>
                <div class="d-flex">
                    <div class="custom-control custom-radio custom-control-inline"><input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked><label class="custom-control-label" for="customRadioInline1">Hombre</label></div>
                    
                    <div class="custom-control custom-radio custom-control-inline"><input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input"><label class="custom-control-label" for="customRadioInline2">Mujer</label></div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Guardar</button></div>
    </form>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Cerrar Sesión</button></div>
    </form>
    
    
</div>