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
            Añadir Servicio
        </button>

        <!-- The Modal -->
        <div class="modal" :class="{ mostrar: modal }">
            <div class="modal-dialog">
                <div class="modal-content">
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
                    <div class="modal-body">
                        <div class="my-4">
                            <label for="nombre">Nombre del servicio</label>
                            <input
                                v-model="service.service"
                                type="text"
                                class="form-control"
                                id="service"
                                placeholder="Nombre del servicio"
                            >
                        </div>

                        <div class="my-4">
                            <label for="Descripción">Descripción</label>
                            <input
                                v-model="service.description"
                                type="text"
                                class="form-control"
                                id="description"
                                placeholder="Descripción del servicio"
                            >
                        </div>

                        <div class="my-4">
                            <label for="Aforo">Aforo</label>
                            <input
                                v-model="service.capacity"
                                type="number"
                                class="form-control"
                                id="capacity"
                                placeholder="Aforo del servicio"
                            >
                        </div>
                        <div class="my-4">
                            <label for="hora">Hora</label>
                            <input
                                v-model="service.time"
                                type="time"
                                class="form-control"
                                id="time"
                                placeholder="Hora de inicio-Hora de fin"
                            >
                        </div>
                        <div class="my-4">
                            <label for="fecha">Fecha</label>
                            <input
                                v-model="service.date"
                                type="date"
                                class="form-control"
                                id="date"
                                placeholder="Fecha de inicio-Fecha de fin"
                            >
                        </div>
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
                    <th scope="col">Aforo</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col" colspan="2" style="padding-left: 60px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ser in services" :key="ser.id">
                    <th scope="row">{{ ser.id }}</th>
                    <td>{{ ser.service }}</td>
                    <td>{{ ser.description }}</td>
                    <td>{{ ser.capacity }}</td>
                    <td>{{ ser.time }}</td>
                    <td>{{ ser.date }}</td>
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
                capacity: "",
                time: "",
                date: ""
            },
            id: 0,
            modificar: true,
            modal: 0,
            tituloModal: "",
            services: []
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
        },

        abrirModal(data = {}) {
            this.modal = 1;
            if (this.modificar) {
                (this.id = data.id), (this.tituloModal = "Modificar Servicio");
                this.service.service = data.service;
                this.service.description = data.description;
                this.service.capacity = data.capacity;
                this.service.time = data.time;
                this.service.date = data.date;
            } else {
                (this.id = 0), (this.tituloModal = "Crear Servicio");
                this.service.service = "";
                this.service.description = "";
                this.service.capacity = "";
                this.service.time = "";
                this.service.date = "";
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
