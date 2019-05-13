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
                 console.log('http://big.test/admin/paralelos/estudiantes/create/'+this.periodoAcademicoId+'/'+this.carreraId);
            axios
                .get('http://big.test/admin/paralelos/estudiantes/create/'+this.periodoAcademicoId+'/'+this.carreraId )
                
                //.then(response => response.count)
                .then(response => {
						console.log(response.data.count)
					});
             }
        },
    }
</script>
