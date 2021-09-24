<template>
   <div >
       <button @click="createPDF" type="button" class="btn btn-dark"><i class="fas fa-plus-circle"></i>
            Descargar Reporte
        </button>
    </div>
</template>

<script>
export default {

 methods: {
    
    createPDF(){
       this.$router.push('/reports');
       
    }
 }
}
</script>

<style>

</style>