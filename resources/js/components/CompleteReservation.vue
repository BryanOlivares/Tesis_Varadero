<template>

<div>
    <img src="img/logo 2.png" width="200" height="150" style="margin-left: 430px;margin-bottom: 30px;width: 200px;">
    <form>
          
     
        <h5 class="text-center" style="padding-right: 175px;  font-weight: bold;">Servicio:</h5>
            <select class="custom-select" v-model="fields.service" style="
            width: 226px;
            margin-left: 420px;">
            <option selected>Selecciona un servicio</option>
            <option value="Piscinas">Piscinas</option>
            <option value="Canchas de Futbol">Canchas de Futbol</option>
            <option value="Baños de Cajon">Baños de Cajon</option>
            <option value="Gymnasio">Gymnasio</option>
            <option value="Karate">Karate</option>
            <option value="Canchas de Basquet">Canchas de Basquet</option>
            </select>
        <div class="alert alert-danger" v-if="errors && errors.service" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.service[0]}}
        </div>
        <br>
        <h5 class="text-center" style="padding-right: 170px;  font-weight: bold;">Nombre:</h5>
        <input type="text" v-model="fields.name" class="form-control" style="
            width: 226px;
            margin-left: 420px;">
        <div class="alert alert-danger" v-if="errors && errors.name" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.name[0]}}
        </div>
        <br>
        <h5 class="text-center" style="padding-right: 165px;  font-weight: bold;">Apellido:</h5>
        <input type="text"  v-model="fields.lastname" class="form-control" style="
            width: 226px;
            margin-left: 420px;">
        <div class="alert alert-danger" v-if="errors && errors.lastname" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.lastname[0]}}
        </div>
        <br>
        <h5 class="text-center" style="padding-right: 70px;  font-weight: bold;">Fecha dereservación:</h5>
        <input type="date"  v-model="fields.date" class="form-control" style="
            width: 226px;
            margin-left: 420px;">
        <div class="alert alert-danger" v-if="errors && errors.date" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.date[0]}}
        </div>
        <br>
        <h5 class="text-center" style="padding-right: 70px;  font-weight: bold;">Hora de reservación:</h5>
        <input type="time"  v-model="fields.time" class="form-control" style="
            width: 226px;
            margin-left: 420px;">
        <div class="alert alert-danger" v-if="errors && errors.time" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.time[0]}}
        </div>
        <br>
        <h5 class="text-center" style="padding-right: 100px;   font-weight: bold;">Cant. de usuarios</h5>
        <input type="number"  v-model="fields.capacity" class="form-control" style="
            width: 226px;
            margin-left: 420px;">
        <div class="alert alert-danger" v-if="errors && errors.capacity" style="
            width: 226px;
            margin-left: 420px;">
            {{errors.capacity[0]}}
        </div>
      
        <br>
            <button
                            @click="cerrarform()"
                            type="button"
                            class="btn btn-secondary"
                            style="margin-left: 450px;"

                        >
                            Cancelar
                        </button>
                        <button
                            @click="guardar()"
                            type="button"
                            class="btn btn-success"
                        >
                            Guardar
                        </button>             
    </form>
</div>
</template>

<script>
export default{
    data(){
        return {    
                fields: {
                service: "",
                name: "",
                lastname: "",
                date: "",
                time: "",
                capacity: "",
            },
            errors:{}
        };
    },

    methods: {
            guardar(){
                axios.post('createreservations', this.fields)
                .then(response =>{
                    this.$swal({icon:'success', title:'Reservación realizada con exito'})
                    this.$router.push('/home')
                }).catch(error => {
                    if(error.response.status === 422){
                        this.$swal({icon:'error', title:'Ocurrio un error'})
                        this.errors = error.response.data.errors;
                    }
                });
            },

            cerrarform(){
                this.$router.push('/home')
            }
    }

}
</script>
