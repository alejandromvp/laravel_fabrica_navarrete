<template>
 <div class="card" style="margin-top:5px;border-color:blue;">
    <div class="card-header">Publicado en {{pensamiento.created_at}}</div>

    <div class="card-body">
        <p><b>Nombre herramienta:</b> <b style="color:blue;">{{pensamiento.descripcion}}</b></p>
    </div>
     <div class="panel-footer" style="padding:20px;">
        <!--<button class="btn btn-default">
            Editar
        </button>-->
        <button class="btn btn-danger" v-on:click="onClickDelete()">
            eliminar
        </button>
    </div> 
</div>
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: ['pensamiento'],
        data(){
            return{
            };
        },
        mounted() {
            console.log('Component mougnted.')
        },
        methods: {
            onClickDelete(){
                this.$emit('delete');
            }
        }
    }
</script>
