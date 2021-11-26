<template>
    <div class="contenedor">
        <form>
            <div class="row">
                <div class="col">
                    <h5
                        class="text-center"
                        style="padding-right: 0px;font-weight: bold;padding-left: 185px;margin-bottom: 0px;"
                    >
                        Servicio:
                    </h5>
                    <select
                        class="custom-select"
                        v-model="fields.service"
                        style="width: 237px;margin-left: 355px;"
                    >
                        <option v-for="ser in services" :key="ser.id">
                            {{ ser.service }}
                        </option>
                    </select>
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.service"
                        style="width: 237px;margin-left: 355px;margin-bottom: 16px;"
                    >
                        {{ errors.service[0] }}
                    </div>
                    <br />
                    <h5
                        class="text-center"
                        style="font-weight: bold;margin-top: 0px;padding-left: 180px;margin-bottom: 0px;"
                    >
                        Email:
                    </h5>
                    <select
                        class="custom-select"
                        v-model="fields.email"
                        style="width: 237px;margin-left: 355px;"
                    >
                        <option>
                            {{ user.email }}
                        </option>
                    </select>
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.email"
                        style="width: 237px;margin-left: 355px;margin-bottom: 0px;"
                    >
                        {{ errors.email[0] }}
                    </div>
                    <br />
                    <h5
                        class="text-center"
                        style="font-weight: bold;padding-left: 290px;margin-bottom: 0px;"
                    >
                        Hora de reservación:
                    </h5>
                    <input
                        type="time"
                        v-model="fields.time"
                        class="form-control"
                        style="width: 230px;margin-left: 355px;"
                    >
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.time"
                        style="width: 230px;margin-left: 355px;margin-bottom: 0px;"
                    >
                        {{ errors.time[0] }}
                    </div>
                    <br />
                    <h5
                        class="text-center"
                        style="font-weight: bold;padding-left: 180px;margin-bottom: 0px;"
                    >
                        Estado:
                    </h5>
                    <input
                        disabled
                        type="text"
                        v-model="fields.state"
                        class="form-control"
                        style="width: 245px;margin-left: 350px;"
                    />
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.state"
                        style="
                    width: 237px;"
                    >
                        {{ errors.state[0] }}
                    </div>
                </div>
                <div class="col">
                    <h5
                        class="text-center"
                        style="padding-right: 385px;font-weight: bold;margin-bottom: 0px;"
                    >
                        Nombre:
                    </h5>
                    <select
                        class="custom-select"
                        v-model="fields.name"
                        style="width: 237px;"
                    >
                        <option>
                            {{ user.name }}
                        </option>
                    </select>
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.name"
                        style="width: 237px;"
                    >
                        {{ errors.name[0] }}
                    </div>
                    <br />
                    <h5
                        class="text-center"
                        style="font-weight: bold;padding-right: 275px;margin-bottom: 0px;"
                    >
                        Fecha de Reservación:
                    </h5>
                    <input
                        type="date"
                        v-model="fields.date"
                        lang="es" 
                        format="YYYY-MM-dd"
                        class="form-control"
                        style="width: 230px;"
                    >
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.date"
                        style="width: 230px;margin-bottom: 23px;"
                    >
                        {{ errors.date[0] }}
                    </div>
                    <h5
                        class="text-center"
                        style="font-weight: bold;padding-right: 300px;margin-bottom: 0px;"
                    >
                        Cant. de Usuarios:
                    </h5>
                    <input
                        type="number"
                        v-model="fields.capacity"
                        class="form-control"
                        style="width: 230px;"
                    />
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.capacity"
                        style="width: 230px;margin-bottom: 0px;padding-right: 0px;"
                    >
                        {{ errors.capacity[0] }}
                    </div>
                    <br />
                    <h5
                        class="text-center"
                        style="font-weight: bold;padding-right: 330px;margin-bottom: 0px;"
                    >
                        Observaciones:
                    </h5>
                    <input
                        disabled
                        type="text"
                        v-model="fields.comment"
                        class="form-control"
                        style="width: 245px;"
                    />
                    <div
                        class="alert alert-danger"
                        v-if="errors && errors.comment"
                        style="
            width: 237px;"
                    >
                        {{ errors.comment[0] }}
                    </div>
                </div>
            </div>
        </form>
        <form>
            <br />
            <h5
                class="text-center"
                style="padding-right: 0px;font-weight: bold;margin-bottom: 0px;"
            >
                Valor a pagar:
            </h5>
            <input
                disabled
                type="float"
                v-model="fields.pay"
                class="form-control"
                style="width: 245px;margin-left: 480px;"
            />
            <div
                class="alert alert-danger"
                v-if="errors && errors.pay"
                style="width: 237px;margin-left: 420px;"
            >
                {{ errors.pay[0] }}
            </div>

            <br />
            <button
                @click="cerrarform()"
                type="button"
                class="btn btn-secondary"
                style="margin-left: 490px;"
            >
                Cancelar
            </button>
            <!-- <button @click="guardar()" type="button" class="btn btn-primary">
                Guardar Reservación
            </button> -->
            <button @click="guardar1()" type="button" class="btn btn-success">
                Enviar Reservación
            </button>
        </form>
    </div>
</template>

<script>
let user = document.head.querySelector('meta[name="user"]');

export default {
    data() {
        return {
            fields: {
                service: "",
                name: "",
                email: "",
                date: "",
                time: "",
                capacity: "",
                state: "Pendiente",
                comment: "Pendiente",
                pay: 0
            },
            users: [],
            services: [],
            errors: {}
        };
    },
    computed: {
        user() {
            return JSON.parse(user.content);
        }
    },

    methods: {
        async guardar1() {
            const res = await axios
                .post("createreservations", this.fields)
                .then(response => {
                    this.$swal({
                        icon: "success",
                        title: "Su reservación fue enviada, revise su historial"
                    });
                    this.$router.push("/history");
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        // async guardar() {
        //     const res = await axios
        //         .post("createreservations", this.fields)
        //         .then(response => {
        //             this.$swal({
        //                 icon: "success",
        //                 title: "Reservación Guardada"
        //             });
        //             this.$router.push("/createreservations");
        //         })
        //         .catch(error => {
        //             if (error.response.status === 422) {
        //                 this.errors = error.response.data.errors;
        //             }
        //         });
        // },
        async listar() {
            const res = await axios.get("/services");
            this.services = res.data;
        },

        cerrarform() {
            this.$router.push("/home");
            this.errores={};
        }
    },
    created() {
        this.listar();
    }
};
</script>
<style>
.contenedor {
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
}
</style>
