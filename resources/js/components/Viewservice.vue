<template>
    <div >
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Descripción</th>  
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                    <th scope="col">Desde</th>
                    <th scope="col">Hasta</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="crear in services" :key="crear.id" style=" font-weight: bolder;">
                    <th scope="row">{{crear.id}}</th>
                    <td>{{crear.service}}</td>
                    <td>{{crear.description}}</td>
                    <td>{{crear.time1}}</td> 
                    <td>{{crear.time2}}</td> 
                    <td>{{crear.date1}}</td>
                    <td>{{crear.date2}}</td> 
                    <button
                            @click="dirigir()"
                            type="button"
                            class="btn btn-danger">
                            Reservalo ya!!
                        </button>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
  data(){
    return{
      services:'',
    }
    
  },
  methods: {
    async listar (){
      const res=await axios.get('services');
      this.services=res.data;
    },

    dirigir(){
                this.$router.push('/createreservations')
            }
   
  },

  created(){
    this.listar();
    
  },
   
};
</script>

<style></style>
