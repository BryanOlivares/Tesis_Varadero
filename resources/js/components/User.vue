<template>

    <div>
        <table class="table table-success table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th> 
                    <th scope="col">Acción</th> 
                </tr>
            </thead>
            <tbody>
                <tr v-for="crear in users" :key="crear.id">
                    <th scope="row">{{crear.id}}</th>
                    <td>{{crear.name}}</td>
                    <td>{{crear.email}}</td>
                    <td width="10px">
                        <button
                            @click="
                                editar(crear);
                            "
                            class="btn btn-primary"
                        >
                            Editar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
</template>

<script>
export default {
  data(){
    return{
      users:[
        'name',
        'email',
      ],
    }
    
  },
  methods: {
    async listar (){
      const res=await axios.get('users');
      this.users=res.data;
    },
    async editar(){
         const res = await axios.put(
                    "/users/" + this.id,
                );
    }
  },

  created(){
    this.listar();
  },
};
</script>

<style></style>
