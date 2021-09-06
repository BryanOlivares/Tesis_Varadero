@extends('layouts.app')

@section('content')
<div class="container">
   <nav class="navbar navbar-dark bg-dark">
      <div class="container">
          <div class="justify-content-center">
              <ul class="nav nav-tabs" style="padding-left: 360px;padding-right: 290px;">

                  <li class="nav-item">
                      <router-link to="/home"  class="nav-link">Home</router-link>
                  </li>
                  <li class="nav-item">
                      <router-link to="/createreservations" class="nav-link">Realiza tu Reservación</router-link>
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




