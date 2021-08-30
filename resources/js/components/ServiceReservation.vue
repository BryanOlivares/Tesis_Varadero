<template>
    <div>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
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
                    <button
                            @click="eliminar(ver.id)"
                            class="btn btn-success"
                        ><i class="fas fa-save"></i>
                        </button>
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
                async eliminar(id) {
                        const res = await axios.delete("/createreservations/" + id)
                        .then(response =>{
                        this.$swal({icon:'success', title:'Reservacion Guardada exitosamente'})
                         this.$router.push('/reservations')
                         this.listar();
                }).catch(error => {
                    if(error.response.status === 422){
                        this.$swal({icon:'error', title:'Ocurrio un error'})
                        this.errors = error.response.data.errors;
                    }
                });
                }
                
        },

        created() {
                this.listar();
        },
};
</script>

<style></style>
