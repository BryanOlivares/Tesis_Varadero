@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="
    margin-left: 100px;
    margin-right: 100px;
">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav nav-tabs" style="border-bottom-width: 0px;" >
                    <li class="nav-item">
                        <router-link to="/home"  class="nav-link" style="
                        margin-left: 0px;">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/createreservations" class="nav-link">Realiza tu reservación</router-link>
                    </li>   
                     
                    <li class="nav-item">
                        <router-link to="/users" class="nav-link">Gestionar perfil</router-link>
                    </li> 
                    <li class="nav-item">
                        <router-link to="/history" class="nav-link">Historial</router-link>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
</div>


@endsection



