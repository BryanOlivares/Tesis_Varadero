<template>
  <div >

<!-- The Modal -->
<div class="modal" :class="{ mostrar: modal }">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{tituloModal}}</h4>
        <button @click="cerrarModal();" onclick="window.location.href='/users'" type="button" class="close" data-dismiss="modal">&times;</button>
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
                    <span class="text-danger" v-if="errores.name">{{errores.name[0]}}</span>
            </div>
            <div class="my-1">
                <label for="nombre">Email</label>
                    <input v-model="user.email" 
                    type="text"
                    class="form-control"
                    id="email"
                    placeholder="Email">
                    <span class="text-danger" v-if="errores.email">{{errores.email[0]}}</span>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
       
       <button  @click="cerrarModal();"  onclick="window.location.href='/users'" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button   @click="guardar();"   type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
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
                    <th scope="row" >{{user.id}}</th>
                    <td> {{user.name}}</td>
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
      errores:{},
    }
  },

  computed: {
      user(){
          return JSON.parse(user.content);
      }

  },

  methods: {
      async eliminar(user) {
          Swal.fire({
            title: "¿Está seguro de eliminar?",
            text: "Su usuario se eliminará permanentemente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete("/users/" + user)
                Swal.fire(
                'Eliminado!',
                'Usuario eliminado correctamente',
                'success'
                )  
               window.location.href='/register';
            }
            })
          
            
        },
        async guardar(){
            try {
            if(this.modificar){
                const res=await axios.put('/users/'+ this.id, this.user)
            }
            this.cerrarModal();
            } catch (error) {
                if(error.response.data){
                    this.errores=error.response.data.errors
                }
            }

        },
        abrirModal(data={}){
            this.modal=1;
            if(this.modificar){
                (this.id=data.id),(this.tituloModal="Actualizar Usuario");
                this.users.name=data.name;
                this.users.email=data.email;

            }else{
                
            }
        },
        cerrarModal(){
            this.modal=0;
            this.errores={};
        },
        
  },  
}
</script>

<style></style>
