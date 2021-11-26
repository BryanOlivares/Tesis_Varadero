<template>
    <div >
      
        <!-- The Modal -->
        <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog">
                <div class="modal-content" style="bottom: 25px;">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ tituloModal }}</h4>
                        <button
                            @click="cerrarModal()"
                            type="button"
                            class="close"
                            data-dismiss="modal"
                        >
                            &times;
                        </button>
                    </div>

              
                    <div class="modal-body" style="top: -20px; font-weight: bold;">
                        
                        <div class="my-1">
                            <label for="nombre">Cant.Usuarios</label>
                            <input
                                v-model="createreservation.capacity"
                                disabled type="number"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        
                        <div class="my-1">
                           <h5 class="text-center" style="padding-right: 1115px;  font-weight: bold;">Estado:</h5>
                            <select class="custom-select" v-model="createreservation.state"   style="width: 237px; margin-left: 0px;">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Reserva Rechazada">Reserva Rechazada</option>
                            <option value="Reserva Aceptada">Reserva Aceptada</option>
                            </select>
                        </div>
                        <div class="my-1">
                            <label for="nombre">Observaciones</label>
                            <input
                                v-model="createreservation.comment"
                                type="text"
                                class="form-control"
                                id="comment"
                                placeholder="Observaciones">
                                <span class="text-danger" v-if="errores.comment">{{errores.comment[0]}}</span>
                        </div>
                        <div v-if="createreservation.state =='Reserva Aceptada'" class="my-1">
                            <label for="nombre">Valor a pagar</label>
                            <input
                                v-model="createreservation.pay"
                                type="number"
                                class="form-control"
                                id="pay"
                                placeholder="Valor a pagar">
                                <span class="text-danger" v-if="errores.pay">{{errores.pay[0]}}</span>
                        </div>
                        <button
                            @click="cerrarModal()"
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Cancelar
                        </button>
                        <button
                            @click="guardar1()"
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        ><i class="fas fa-edit"></i>
                            Actualizar
                        </button>
                        <!-- <button v-if="createreservation.state =='Reserva Aceptada'"
                            @click="guardar()"
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                        ><i class="fas fa-save"></i>
                            Aceptar Reservación
                        </button> -->
                    </div>

                </div>
            </div>
        </div>

        <table class="table table-striped" style="font-weight: bold;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">email</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Cant.Usuarios</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Valor a pagar</th>
                    <th scope="col" colspan="2" style="padding-left: 60px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ver in createreservations" :key="ver.id" style=" font-weight: bolder;">
                    <th scope="row">{{ver.id}}</th>
                    <td>{{ver.service}}</td>
                    <td>{{ver.name}}</td>
                    <td>{{ver.email}}</td>
                    <td>{{ver.date}}</td>
                    <td>{{ver.time}}</td>
                    <td>{{ver.capacity}}</td>
                    <td>{{ver.state}}</td>
                    <td>{{ver.comment}}</td>
                    <td>${{ver.pay}}</td>
                    <button  v-if="ver.state !=='Reserva Rechazada'" @click="modificar = true; abrirModal(ver);" class="btn btn-warning" title="Editar"><i class="fas fa-edit"></i>
                    </button>
                    <button @click="eliminar(ver.id)" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button>
                    <button v-if="ver.state =='Reserva Aceptada'"
                            @click="guardar()"
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                        ><i class="fas fa-save"></i>
                            Aceptar Reservación
                        </button>   
                   
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        
        return {
            // reservation: {
            //     service: "",
            //     name: "",
            //     email: "",
            //     date: "",
            //     time: "",
            //     capacity: "",
            //     state: "",
            //     comment: "",
            //     pay: ""
            // },
            createreservation: {
                service: "",
                name: "",
                email: "",
                date: "",
                time: "",
                capacity: "",
                state: "",
                comment: "",
                pay: ""
            },
            
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            // reservations: [],
            createreservations: [],
            errores:{},
        };
    },
    methods: {
        async listar() {
            const res = await axios.get("/createreservations");
            this.createreservations = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/createreservations/" + id);
            this.listar();
        },
        async guardar() {
                const res = await axios.post("/aceptreservations", this.createreservation)
                .then(response =>{
                        this.$swal({icon:'success', title:'Reservación Aceptada'})
                         this.$router.push("/aceptreservations")
                }).catch(error => {
                    if(error.response.status === 422){
                        this.$swal({icon:'error', title:'Ocurrio un error'})
                        this.errors = error.response.data.errors;
                    }
                });
            this.cerrarModal();
            this.listar();
        },
        async guardar1(){
            try {
                if (this.modificar) {
                const res = await axios.put(
                    "/createreservations/" + this.id,
                    this.createreservation
                );
            } else {
                const res = await axios.post("/services", this.service);
            }
            this.cerrarModal();
            this.listar();
                
            } catch (error) {
                if(error.response.data){
                    this.errores=error.response.data.errors
                }
            }
        },
        abrirModal(data = {}) {
            this.modal = 1;
            if (this.modificar) {
                (this.id = data.id), (this.tituloModal = "Modificar Estado");
                this.createreservation.service = data.service;
                this.createreservation.name = data.name;
                this.createreservation.email = data.email;
                this.createreservation.date = data.date;
                this.createreservation.time = data.time;
                this.createreservation.capacity = data.capacity;
                this.createreservation.state = data.state;
                this.createreservation.comment = data.comment;
                this.createreservation.pay = data.pay;
            } else {
                (this.id = 0), (this.tituloModal = "Crear Servicio");
                this.reservation.state = "";
            }
        },
        cerrarModal() {
            this.modal = 0;
        }
    },
    created() {
        this.listar();
    }
};
</script>

<style>
.mostrar {
    display: list-item;
    opacity: 1;
    background: rgba(44, 38, 75, 0.849);
}
.table .thead-dark th {
    color: #B2FEFA;
    background-color: #343a40;
    border-color: #454d55;
}
.btn-dark {
    color: #B2FEFA;
    background-color: #343a40;
    border-color: #343a40;
}
</style>