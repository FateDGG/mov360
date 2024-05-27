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
        {{-- @include("components.RestauranteDetail", ['restaurante' => $restaurante]) --}}
        <div class="container-fluid text-center p-4">
            <div class="row">
                <div class="col">
                    <img src="{{ asset($restaurante->url_foto) }}" class="img-fluid" style="max-height: 300px; width: 100%;" alt="Banner de pinchadas">
                </div>
            </div>
            <div class="row p-4">
                <div class="col">
                    <h1>
                       ({{$restaurante->nombre}})
                    </h1>
                </div>
            </div>
            <div class="container text-center">
                <div class="row row-cols-4 pb-2">
                  <div class="col pb-4 pt-4">@include("components.PlatoCard")</div>
                  <div class="col pb-4 pt-4">@include("components.PlatoCard")</div>
                  <div class="col pb-4 pt-4">@include("components.PlatoCard")</div>
                  <div class="col pb-4 pt-4">@include("components.PlatoCard")</div>
                  <div class="col pb-4 pt-4">@include("components.PlatoCard")</div>
                </div>
              </div>
        </div>
        
       @extends("components.footer")  
    </body>
</html>
