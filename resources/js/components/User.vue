<template>
  <div >

<!-- The Modal -->
<div class="modal" :class="{ mostrar: modal }">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="cerrarModal();" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="my-1">
                <label for="nombre">Nombre del Usuario</label>
                    <input v-model="user.name" 
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Nombre de Usuario">
            </div>
            <div class="my-1">
                <label for="nombre">Email</label>
                    <input v-model="user.email" 
                    type="text"
                    class="form-control"
                    id="email"
                    placeholder="Email">
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button  @click="cerrarModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button   @click="guardar();" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>

    </div>
  </div>
</div>
        <table class="table table-success table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre de usuario</th>
                    <th scope="col">Email</th>  
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{user.id}}</th>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <button @click="modificar = true; abrirModal(user)" class="btn btn-warning"><i class="fas fa-edit"></i>
                    </button>
                    <button @click="eliminar(user.id)" type="button" class="btn btn-danger"><i class="fas fa-trash"></i>
                    </button>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
let user = document.head.querySelector('meta[name="user"]');


export default {
  
  data() {
    return {
      users: {
          name:'',
          email:'',
      },
      modificar:true,
      tituloModal:'',
      modal:0,
      id:0,
    }
  },

  computed: {
      user(){
          return JSON.parse(user.content);
      }

  },

  methods: {
      async eliminar(user) {
            const res = await axios.delete("/users/" + user)
            .then(response =>{
                        this.$swal({icon:'success', title:'Usuario eliminado con éxito'})
                         this.$router.push("/register")
                }).catch(error => {
                    if(error.response.status === 422){
                        this.$swal({icon:'error', title:'Ocurrio un error'})
                        this.errors = error.response.data.errors;
                    }
                });
        },
        async guardar(){
            if(this.modificar){
                const res=await axios.put('/users/'+ this.id, this.user)
            }else{
                const res=await axios.post('/users', this.user)
            }
            this.cerrarModal();


        },
        abrirModal(data={}){
            this.modal=1;
            if(this.modificar){
                this.id=data.id,
                this.tituloModal="Actualizar Usuario"
                this.users.name=data.name;
                this.users.email=data.email;

            }else{
                this.id=0,
                this.tituloModal="Crear Usuario"
                this.users.name='';
                this.users.email='';
            }
        },
        cerrarModal(){
            this.modal=0;
        },
        
  },  
}
</script>

<style></style>
