<template>
    <div >
      <div class="pdf">
       <button @click="createPDF" type="button" class="btn btn-dark"><i class="fas fa-directions"></i>
            Ir a la Descarga
        </button>
      </div>
        <table class="table table-success table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Nombre</th>  
                    <th scope="col">Email</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Cant.Usuarios</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col">Valor a pagar</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="crear in aceptreservations" :key="crear.id">
                    <th scope="row">{{crear.id}}</th>
                    <td>{{crear.service}}</td>
                    <td>{{crear.name}}</td>
                    <td>{{crear.email}}</td> 
                    <td>{{crear.date}}</td> 
                    <td>{{crear.time}}</td> 
                    <td>{{crear.capacity}}</td>
                    <td>{{crear.state}}</td> 
                    <td>{{crear.comment}}</td> 
                    <td>${{crear.pay}}</td> 
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

// import jsPDF from 'jspdf'
export default {
  // name:'pdf',
  data(){
    return{
      aceptreservations:[],
    }
    
  },
  methods: {
    async listar (){
      const res=await axios.get('aceptreservations');
      this.aceptreservations=res.data;
    },
    async createPDF() {

      this.$router.push("/reports/pdf");
      this.listar();
    },
    

  //   createPDF () {
  //   let pdfName = 'test'; 
  //   var doc = new jsPDF();
  //   doc.text("Hello World", 10, 10);
  //   doc.save(pdfName + '.pdf');
  // }
   
  },

  created(){
    this.listar();
    
  },
   
};
</script>

<style></style>
