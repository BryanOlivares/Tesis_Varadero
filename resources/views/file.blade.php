{{-- <!DOCTYPE html>
<html >
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>El varadero</title>
       
    </head>
    <body>
        <h1>Exportar PDF</h1>
        <p>
            Clic <a href="{{route('reports')}}">
            Aqui
        </a>
        Para descargar a las reservas
        </p> 
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 PDF</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Reportes "El Varadero"</h2>
            </div>
            <div class="col-md-4">
                <div class="mb-4 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{route('reports.pdf')}}">Exportar PDF</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    
                    <thead>
                      <tr>
                        <th scope="col" >#</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Nombre</th>  
                        <th scope="col">Email</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Cant.Usarios</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Observaciones</th>
                        <th scope="col">Valor a pagar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($aceptreservations as $aceptreservation)
                        <tr>
                            <th scope="row">{{$aceptreservation->id}}</th>
                <td>{{$aceptreservation->service}}</td>
                <td>{{$aceptreservation->name}}</td>
                <td>{{$aceptreservation->email}}</td> 
                <td>{{$aceptreservation->date}}</td> 
                <td>{{$aceptreservation->time}}</td> 
                <td>{{$aceptreservation->capacity}}</td>
                <td>{{$aceptreservation->state}}</td> 
                <td>{{$aceptreservation->comment}}</td> 
                <td>${{$aceptreservation->pay}}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>