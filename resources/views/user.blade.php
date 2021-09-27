@extends('layouts.app')

@section('content')

<div class="container">
   <nav class="navbar navbar-dark bg-dark" >
      <div class="container">
          <div class="justify-content-center">
              <ul class="nav nav-tabs" style="
              border-bottom-width: 0px;">
                  <li class="nav-item">
                      <router-link to="/home"  class="nav-link" style="
                      margin-left: 400px;">Home</router-link>
                  </li>
                  <li class="nav-item">
                      <router-link to="/createreservations" class="nav-link">Realiza tu Reservación</router-link>
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



