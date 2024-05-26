<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>
    <div class="container mt-4 p-4 bg-light rounded">
  <div class="row">
    <div class="col-md-6">
      <div class="d-flex align-items-center mb-3">
        <button class="btn btn-outline-secondary me-2">&lt;</button>
        <img src="https://placehold.co/100x100" alt="Car Image" class="img-fluid">
        <button class="btn btn-outline-secondary ms-2">&gt;</button>
      </div>
      <h5>CARRO ALQUILADO</h5>
      <p><strong>Lugar Recogida</strong><br>Bucaramanga Aeropuerto<br>Fecha <strong>FECHA</strong><br>Hora <strong>HORA</strong></p>
      <p><strong>Lugar Entrega</strong><br>Bucaramanga Aeropuerto<br>Fecha <strong>FECHA</strong><br>Hora <strong>HORA</strong></p>
      <p><strong>Método de pago</strong><br>Tarjeta de crédito en sede</p>
      <p>El valor incluye:<br> Kilometraje ilimitado<br> Lavada básica<br> Seguro básico</p>
      <p>Tarifa Diaria<br><del>$ 250.000</del><br><span class="badge bg-success">Dto Hoy 42%</span><br><strong>$ 144.385</strong></p>
      <p><strong>Total por TIEMPO</strong><br><strong>TOTAL</strong></p>
    </div>
    <div class="col-md-6">
      <form>
        <div class="mb-3">
          <label for="firstName" class="form-label">Nombres*</label>
          <input type="text" class="form-control" id="firstName" required>
        </div>
        <div class="mb-3">
          <label for="lastName" class="form-label">Apellidos*</label>
          <input type="text" class="form-control" id="lastName" required>
        </div>
        <div class="mb-3">
          <label for="idType" class="form-label">ID Tipo*</label>
          <select class="form-select" id="idType" required>
            <option selected>Seleccionar</option>
            <option value="1">Cédula</option>
            <option value="2">Pasaporte</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="idNumber" class="form-label">ID Número*</label>
          <input type="text" class="form-control" id="idNumber" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email*</label>
          <input type="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Teléfono*</label>
          <div class="input-group">
            <span class="input-group-text"><img src="https://placehold.co/20x20" alt="Country Flag"> +57</span>
            <input type="text" class="form-control is-invalid" id="phone" required>
          </div>
          <div class="invalid-feedback">
            No es un whatsapp o teléfono móvil válido.
          </div>
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input" id="terms" required>
          <label class="form-check-label" for="terms">He leído y estoy de acuerdo con los términos y condiciones como de la política de tratamiento de la información. <a href="#">Ver políticas</a></label>
        </div>
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-primary">Anterior</button>
          <button type="submit" class="btn btn-primary">Enviar solicitud</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>