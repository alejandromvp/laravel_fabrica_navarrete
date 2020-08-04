<template>
<div class="card">
    <div class="card-header">Formulario</div>

    <div class="card-body">
        <!-- @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif -->

        <form action="" v-on:submit.prevent="new_pensamiento()">
            <div class="form-group">
                <label for="thought">Nombre herramienta</label>
                <input type="text" class="form-control" name="thought" v-model="descripcion">
            </div>
            <button type="submit" class="btn btn-primary">
                Agregar Material
            </button>
        </form>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                 descripcion:''
            }
        },
        mounted() {
            console.log('Component mounted.');
        },
        methods:{
            new_pensamiento(){
                const params = {
                    descripcion : this.descripcion
                };
                this.descripcion = ''; 

                axios.post('/pensamientos', params).then((response) => {
                    const pensamiento = response.data;
                    this.$emit('new_pensamiento', response.data);
                });  
            }
        }
    }
</script>