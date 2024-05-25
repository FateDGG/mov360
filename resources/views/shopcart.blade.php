<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MOV360</title>
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="">
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
        />
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
        ></script>
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css"
        rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
       @include("components.navbar") 
       <section class="vh-100" style="background-color: #ffffff;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p>
      
              <div class="card mb-4">
                <div class="card-body p-4">
      
                  <div class="row align-items-center">
                    <div class="col-md-2">
                      <img src=""
                        class="img-fluid" alt="Generic placeholder image">
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Name</p>
                        <p class="lead fw-normal mb-0">iPad Air</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Color</p>
                        <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2" style="color: #fdd8d2;"></i>
                          pink rose</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Quantity</p>
                        <p class="lead fw-normal mb-0">1</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Price</p>
                        <p class="lead fw-normal mb-0">$799</p>
                      </div>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                      <div>
                        <p class="small text-muted mb-4 pb-2">Total</p>
                        <p class="lead fw-normal mb-0">$799</p>
                      </div>
                    </div>
                  </div>
      
                </div>
              </div>
      
              <div class="card mb-5">
                <div class="card-body p-4">
      
                  <div class="float-end">
                    <p class="mb-0 me-5 d-flex align-items-center">
                      <span class="small text-muted me-2">Order total:</span> <span
                        class="lead fw-normal">$799</span>
                    </p>
                  </div>
      
                </div>
              </div>
      
              <div class="d-flex justify-content-end">
                <a href="{{ url('/') }}" > <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg me-2" >Continue shopping</button></a>
                <a href="{{ url('/Pagos') }}" > <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Ir a Pagar</button> </a>
              </div>
      
            </div>
          </div>
        </div>
      </section>
       @include("components.footer")  
    </body>
</html>
