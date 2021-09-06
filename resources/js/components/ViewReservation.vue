<template>
    <div >
      <img src="img/1.jpg" width="50" height="50" style="margin-left: 290px;margin-bottom: 30px; border-radius: 40%;">
      <img src="img/2.jpg" width="50" height="50" style="margin-left: 30px;margin-bottom: 30px; border-radius: 40%;">
      <img src="img/3.jpg" width="50" height="50" style="margin-left: 30px;margin-bottom: 30px; border-radius: 40%;">
      <img src="img/7.png" width="50" height="50" style="margin-left: 30px;margin-bottom: 30px; border-radius: 40%;">
      <img src="img/6.jpg" width="50" height="50" style="margin-left: 30px;margin-bottom: 30px; border-radius: 40%;">
      <img src="img/9.png" width="50" height="50" style="margin-left: 30px;margin-bottom: 30px; border-radius: 40%;">
        <table class="table table-success table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Descripción</th>  
                    <th scope="col">Aforo Max</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="crear in services" :key="crear.id">
                    <th scope="row">{{crear.id}}</th>
                    <td>{{crear.service}}</td>
                    <td>{{crear.description}}</td>
                    <td>{{crear.capacity}}</td> 
                    <td>{{crear.time}}</td> 
                    <td>{{crear.date}}</td> 
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
