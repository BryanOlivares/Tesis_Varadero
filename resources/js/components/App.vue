<template>
<div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav nav-tabs" style="border-bottom-width: 0px;" >

                    <li class="nav-item">
                        <router-link to="/home" aria-current="page" href="#" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/view_reservations" aria-current="page" href="#" class="nav-link">Ver reservaciones</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/services" aria-current="page" href="#" class="nav-link">Gestionar servicios</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/aceptreservations" aria-current="page" href="#" class="nav-link">Reservaciones aceptadas</router-link>
                    </li>
                    <!-- <li class="nav-item">
                        <router-link to="/reports/pdf" aria-current="page" href="#" class="nav-link">Descargar reporte</router-link>
                    </li> -->
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
</template>

<script>
export default {

}
</script>
<style>
a {
    color: #B2FEFA;
    text-decoration: none;
    background-color: transparent;
}
</style>



