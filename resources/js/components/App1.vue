<template>
<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/reservations" class="nav-link">Ver Reservaciones</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/services" class="nav-link">Gestionar las servicios</router-link>
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
</template>

<script>
export default {

}
</script>



