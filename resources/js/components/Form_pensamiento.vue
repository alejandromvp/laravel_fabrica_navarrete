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
                var f=new Date();
                var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                let pensamiento = {
                    id: 3,
                    descripcion: this.descripcion,
                    created_at: f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear()
                };
                this.$emit('new', pensamiento);
                this.descripcion = '';
            }
        }
    }
</script>