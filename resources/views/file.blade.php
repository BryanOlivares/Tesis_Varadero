<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El varadero</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script {{ asset('script.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
         .table {
            width: 100%;
            border: 1px solid #999999;
            background-color: antiquewhite;
            border-collapse: collapse;
        },
        body {
            margin: 3cm 2cm 2cm;  
        }


    </style>
</head>
<body>
    <header>
        <h3 style="text-align: center;background-color: #81c6cf;">Centro Recreacional "El Varadero" </h3>
    </header>
    <div class="container mt-4" style="background-color: #81c6cf">
        <div class="row">
            <div class="col-md-8">
                        {{ Form::open(['route' => 'reports.ver', 'method' => 'GET', 'class' => 'form-inline pull-right'])}}
                        
                        <div class="col-sm-3" style="right: 15px;">
                        <label  class="col-form-label" style="font-weight: bold;margin-right: 100px;padding-bottom: 0px;">Desde:</label>
                            <input class="hidden" type="date" value="{{old('fecha_ini')}}" name="fecha_ini" id="fecha_ini">      
                        </div>
                        <div class="col-sm-3">
                            <label  class="col-form-label" style="font-weight: bold;margin-right: 100px;padding-bottom: 0px;">Hasta:</label>
                            <input class="hidden"  type="date" value="{{old('fecha_fin')}}" name="fecha_fin" id="fecha_fin"> 
                        </div>  
                        <div class="col-sm-3" >
                            <button type="submit" class="btn btn-primary" style="margin-left: 15px;border-bottom-width: 4px;margin-top: 27px;">Buscar</button>
                        </div>          
                    {{ Form::close()}}
            </div>
            <div class="col-md-4" style="right: 150px;top: 25px;">
                <div class="form-inline my-2 my-lg-0 float-right">
                    {{-- <button class="btn btn-primary" href="{{route('reports.descargar')}}">Exportar PDF</button> --}}
                    <button class="btn btn-secondary" onclick="window.location.href='/view_reservations'">Regresar</button>
                    <button class="btn btn-danger" id="btnCrearPdf">Generar Reporte</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead style="color: crimson;">
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
                    <tbody style="color: mediumblue;">
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
                  <table class="table">
                    @php
                            $total=0;
                            foreach($aceptreservations as $item)
                            $total += $item['pay']
                    @endphp
                    <thead>
                        <tr>
                                <th scope="col" style="color: crimson;">Reporte Total:</th>
                                <th style="color: mediumblue;">${{$total}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
       document.addEventListener("DOMContentLoaded", () => {
        // Escuchamos el click del botón
        const $boton = document.querySelector("#btnCrearPdf");
        $boton.addEventListener("click", () => {
            const $elementoParaConvertir = document.body; // <-- Aquí puedes elegir cualquier elemento del DOM
            html2pdf()
                .set({
                    margin: 1,
                    filename: 'Reportes_Varadero.pdf',
                    jsPDF: {
                        // unit: "in",
                        format: "a4",
                        orientation: 'landscape' // landscape o portrait
                    }
                })
                .from($elementoParaConvertir)
                .save()
                .catch(err => console.log(err));
        });
    });
 
</script>
</html>