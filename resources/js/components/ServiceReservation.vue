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

                    <!-- Modal body -->
                    <div class="modal-body" style="top: -20px; font-weight: bold;">
                        <!-- <div class="my-1">
                            <label for="nombre">Nombre del servicio</label>
                            <input
                                v-model="createreservation.service"
                                disabled type="text"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        <div class="my-1">
                            <label for="nombre">Nombre</label>
                            <input
                                v-model="createreservation.name"
                                disabled type="text"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        <div class="my-1">
                            <label for="nombre">Email</label>
                            <input
                                v-model="createreservation.email"
                                disabled type="email"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        <div class="my-1">
                            <label for="nombre">Date</label>
                            <input
                                v-model="createreservation.date"
                                disabled type="date"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        <div class="my-1">
                            <label for="nombre">Time</label>
                            <input
                                v-model="createreservation.time"
                                disabled type="time"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div> -->
                        <div class="my-1">
                            <label for="nombre">Cant.Usuarios</label>
                            <input
                                v-model="reservation.capacity"
                                disabled type="number"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                        </div>
                        <div class="my-1">
                           <h5 class="text-center" style="padding-right: 1115px;  font-weight: bold;">Estado:</h5>
                            <select class="custom-select" v-model="reservation.state" style="width: 237px; margin-left: 0px;">
                            <option>Pendiente</option>
                            <option>Reserva Rechazada</option>
                            <option>Reserva Aceptada</option>
                            </select>
                        </div>
                        <div class="my-1">
                            <label for="nombre">Observaciones</label>
                            <input
                                v-model="reservation.comment"
                                type="text"
                                class="form-control"
                                id="comment"
                                placeholder="Observaciones">
                        </div>
                        <div class="my-1">
                            <label for="nombre">Valor a pagar</label>
                            <input
                                v-model="reservation.pay"
                                type="number"
                                class="form-control"
                                id="pay"
                                placeholder="Valor a pagar">
                        </div>
                        <!-- <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripción</label>
                        <textarea class="form-control" id="description" rows="2" v-model="service.description" placeholder="Descripción del servicio"></textarea>
                        </div>
                        <div class="my-1">
                            <label for="Hora">Hora</label>
                            <input
                                v-model="service.time1"
                                type="time"
                                class="form-control"
                                id="time1"
                                placeholder="Hora de inicio"
                            >
                        </div> -->
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
                        <button
                            @click="guardar()"
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                        ><i class="fas fa-save"></i>
                            Aceptar Reservación
                        </button>
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
                <tr v-for="ver in reservations" :key="ver.id">
                    <th scope="row">{{ver.id}}</th>
                    <td>{{ver.service}}</td>
                    <td>{{ver.name}}</td>
                    <td>{{ver.email}}</td>
                    <td>{{ver.date}}</td>
                    <td>{{ver.time}}</td>
                    <td>{{ver.capacity}}</td>
                    <td>{{ver.state}}</td>
                    <td>{{ver.comment}}</td>
                    <td>{{ver.pay}}</td>
                     <button
                            @click="
                                modificar = true;
                                abrirModal(ver);
                            "
                            class="btn btn-warning" title="Eliminar"
                        ><i class="fas fa-edit"></i>
                        </button>
                        <button @click="eliminar(ver.id)" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button>
                        
                    <!-- <button
                            @click="eliminar2(ver.id)"
                            class="btn btn-danger"
                        ><i class="fas fa-trash"></i>
                    </button> -->
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            reservation: {
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
            reservations: [],
        };
    },
    methods: {
        async listar() {
            const res = await axios.get("/reservations");
            this.reservations = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/reservations/" + id);
            this.listar();
        },
        async guardar() {
                const res = await axios.post("/aceptreservations", this.reservation)
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
            const res=await axios.put('/reservations/'+ this.id, this.reservation)
            this.listar();
        },

        abrirModal(data = {}) {
            this.modal = 1;
            if (this.modificar) {
                (this.id = data.id), (this.tituloModal = "Modificar Estado");
                this.reservation.service = data.service;
                this.reservation.name = data.name;
                this.reservation.email = data.email;
                this.reservation.date = data.date;
                this.reservation.time = data.time;
                this.reservation.capacity = data.capacity;
                this.reservation.state = data.state;
                this.reservation.comment = data.comment;
                this.reservation.pay = data.pay;
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