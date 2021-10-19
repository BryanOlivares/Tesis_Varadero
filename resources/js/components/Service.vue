<template>
    <div >
        <button
            @click="
                modificar = false;
                abrirModal();
            "
            type="button"
            class="btn btn-dark"
        ><i class="fas fa-plus-circle"></i>
            Añadir servicio
        </button>

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
                    <div class="modal-body" style="top: -20px;">
                        <div class="my-1">
                            <label for="nombre">Nombre del servicio</label>
                            <input
                                v-model="service.service"
                                type="text"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio">
                            <span class="text-danger" v-if="errores.service">{{errores.service[0]}}</span>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripción</label>
                        <textarea class="form-control" id="description" rows="2" v-model="service.description" placeholder="Descripción del servicio"></textarea>
                         <span class="text-danger" v-if="errores.description">{{errores.description[0]}}</span>
                        </div>
                        <div class="my-1">
                            <label for="Hora">Hora de Inicio</label>
                            <input
                                v-model="service.time1"
                                type="time"
                                class="form-control"
                                id="time1"
                                placeholder="Hora de inicio"
                            >
                             <span class="text-danger" v-if="errores.time1">{{errores.time1[0]}}</span>
                        </div>
                        <div class="my-1">
                            <label for="hora">Hora Final</label>
                            <input
                                v-model="service.time2"
                                type="time"
                                class="form-control"
                                id="time2"
                                placeholder="Hora final"
                            >
                             <span class="text-danger" v-if="errores.time2">{{errores.time2[0]}}</span>
                        </div>
                        <div class="my-1">
                            <label for="fecha">Fecha de Inicio</label>
                            <input
                                v-model="service.date1"
                                type="date"
                                class="form-control"
                                id="date1"
                                placeholder="Fecha de inicio"
                            >
                             <span class="text-danger" v-if="errores.date1">{{errores.date1[0]}}</span>
                        </div>
                        <div class="my-1">
                            <label for="fecha">Fecha Final</label>
                            <input
                                v-model="service.date2"
                                type="date"
                                class="form-control"
                                id="date2"
                                placeholder="Fecha final"
                            >
                             <span class="text-danger" v-if="errores.date2">{{errores.date2[0]}}</span>
                        </div>
                        <!-- <div class="my-1">
                            <label for="fecha">Uusario</label>
                            <input
                                v-model="service.user_id"
                                type="number"
                                class="form-control"
                                id="user_id"
                                placeholder="Uusariol"
                            >
                        </div> -->
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button
                            @click="cerrarModal()"
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Cancelar
                        </button>
                        <button
                            @click="guardar()"
                            type="button"
                            class="btn btn-success"
                            data-dismiss="modal"
                        >
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Hora de Inicio</th>
                    <th scope="col">Hora Final</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Fecha de Final</th>
                    <!-- <th scope="col">Uusuario</th> -->
                    <th scope="col" colspan="2" style="padding-left: 60px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ser in services" :key="ser.id" style=" font-weight: bolder;">
                    <th scope="row">{{ ser.id }}</th>
                    <td>{{ ser.service }}</td>
                    <td>{{ ser.description }}</td>
                    <td>{{ ser.time1}}</td>
                    <td>{{ ser.time2 }}</td>
                    <td>{{ ser.date1 }}</td>
                    <td>{{ ser.date2 }}</td>
                    <!-- <td>{{ ser.user_id }}</td> -->
                    <td>
                        <button
                            @click="
                                modificar = true;
                                abrirModal(ser);
                            "
                            class="btn btn-warning" title="Eliminar"
                        ><i class="fas fa-edit"></i>
                        </button>
                        <button @click="eliminar(ser.id)" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash"></i></button>
                    </td>
                   
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            service: {
                service: "",
                description: "",
                time1: "",
                time2: "",
                date1: "",
                date2: "",
                
            },
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            services: [],
            errores:{},
        };
    },
    methods: {
        async listar() {
            const res = await axios.get("/services");
            this.services = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/services/" + id);
            this.listar();
        },
        async guardar() {
            try {
                if (this.modificar) {
                const res = await axios.put(
                    "/services/" + this.id,
                    this.service
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
                (this.id = data.id), (this.tituloModal = "Modificar Servicio");
                this.service.service = data.service;
                this.service.description = data.description;
                this.service.time1 = data.time1;
                this.service.time2 = data.time2;
                this.service.date1 = data.date1;
                this.service.date2 = data.date2;
                // this.service.user_id = data.user_id;
            } else {
                (this.id = 0), (this.tituloModal = "Crear Servicio");
                this.service.service = "";
                this.service.description = "";
                this.service.time1 = "";
                this.service.time2 = "";
                this.service.date1 = "";
                this.service.date2 = "";
                // this.service.user_id = "";
            }
        },
        cerrarModal() {
            this.modal = 0;
            this.errores={};
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