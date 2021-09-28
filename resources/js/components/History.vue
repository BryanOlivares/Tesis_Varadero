<template>
    <div >
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
                    <th scope="col">Observación</th>
                    <th scope="col">Valor a Pagar</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ser in createreservations" :key="ser.id" style=" font-weight: bolder;">
                    <th scope="row">{{ser.id}}</th>
                    <!-- <td>{{user.service}}</td> -->
                    <td>{{ser.service}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{ser.date}}</td>
                    <td>{{ser.time}}</td>
                    <td>{{ser.capacity}}</td>
                    <td>{{ser.state}}</td>
                    <td>{{ser.comment}}</td>
                    <td>${{ser.pay}}</td>
                     <button @click="eliminar(ser.id)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i>
                    </button>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
let user = document.head.querySelector('meta[name="user"]');
// let createreservation = document.head.querySelector('meta[name="createreservation"]');
export default {
    data() {
        return {
            createreservations:{},
    
           
    };
    
    },
    computed: {
      user(){
          return JSON.parse(user.content);
      }

  },
//    computed: {
//       createreservation(){
//           return JSON.parse(createreservation.content);
//       }

//   },

    methods: {
        async listar() {
            const res = await axios.get("/createreservations");
            this.createreservations = res.data;
        },
        async eliminar(id) {
            const res = await axios.delete("/createreservations/" + id);
            this.listar();
        },
    
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