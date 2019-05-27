<template>    
    <div>        
        <button v-on:click = "asignarParalelos"  class="btn btn-secondary"><i class="fal fa-sitemap fa-lg"></i>
            Distribuir paralelos            
            <ping-pong-spinner-component v-show="loading"></ping-pong-spinner-component>
        </button>        
    </div>
</template>

<script>
    export default {
        data(){
            return {
                loading: false
            }            
        },
        props: [
            'periodoAcademicoId',
            'carreraId'
        ],
        mounted() {
            console.log('en el mar la vida es más sabrosa.');
        },
        methods: {
             asignarParalelos: function (event) {     
                 this.loading = true;
                 console.log('http://big.test/admin/paralelos/estudiantes/create/'+this.periodoAcademicoId+'/'+this.carreraId);
                axios
                    .get('http://big.test/admin/paralelos/estudiantes/create/'+this.periodoAcademicoId+'/'+this.carreraId )
                    .then(response => {
                        console.log("datos insertados: " + response.data.count);
                        console.log('fin de proceso');
                        this.loading = false;
					});
             }
        },
    }
</script>
