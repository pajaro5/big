<template>
    
    <button v-on:click = "asignarParalelos"  class="btn btn-secondary"><i class="fal fa-sitemap fa-lg"></i> Distribuir paralelos</button>
</template>

<script>
    export default {
        props: [
            'periodoAcademicoId',
            'carreraId'
        ],
        mounted() {
            console.log('listo el pollo.');
        },
        methods: {
             asignarParalelos: function (event) {
                 alert('Se ejecuta el algoritmo: periodo: ' + this.periodoAcademicoId + ' carrera: ' + this.carreraId);
             }
        },
    }
</script>
