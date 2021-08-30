<template>
    <div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#.</th>
                    <th scope="col">Service</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Cant.Usuarios</th>
                    <th scope="col">Accion</th>


                </tr>
            </thead>
            <tbody>
                <tr v-for="ver in createreservations" :key="ver.id">
                    <th scope="row">{{ver.id}}</th>
                    <td>{{ver.service}}</td>
                    <td>{{ver.name}}</td>
                    <td>{{ver.lastname}}</td>
                    <td>{{ver.date}}</td>
                    <td>{{ver.time}}</td>
                    <td>{{ver.capacity}}</td>
                </tr>
            </tbody>
        </table>
        
    </div>
</template>

<script>
export default {
        data(){
          return {
                  createreservations:{},
          }
        },
        methods: {
                async listar (){
                        const res=await axios.get('createreservations');
                        this.createreservations=res.data;
                },

        },

        created() {
                this.listar();
        },
};
</script>

<style></style>
