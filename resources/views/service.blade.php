{{-- @extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table, th, td {
            width: 100%;
            border: 1px solid #999999;
            background-color: antiquewhite;
            border-collapse: collapse;
        }
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }
    </style>
</head>
<body>
<table class="table" id="productos">
    <thead>
        <tr>
                <th scope="col" >#</th>
                <th scope="col">Servicio</th>
                <th scope="col">Nombre</th>  
                <th scope="col">Email</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">cant.Usarios</th>
                <th scope="col">Estado</th>
                <th scope="col">Observaciones</th>
                <th scope="col">Valor a pagar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($aceptreservations as $aceptreservation)
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
            <td>{{$aceptreservation->pay}}</td> 
        </tr>
        @endforeach
    </tbody>
</table>
</body>
@endsection


 --}}
