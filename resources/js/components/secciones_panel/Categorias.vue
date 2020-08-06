<template>
    <div class="Main_Categorias">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        AGREGAR CATEGORIA
                    </div>
                    <div class="card-body">
                        <form action="" v-on:submit.prevent="onClickAddCategorias()">
                            <input class="form-control mb-3" type="text" placeholder="Nombre de la categoria" v-model="categoria">
                            <button type="submit" class="btn btn-primary">Agregar categoria</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        LISTA DE CATEGORIAS
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item) in array_categorias"
                                :key="item.id">
                                    <th v-text="item.id"></th>
                                    <th v-text="item.descripcion"></th>
                                    <th>
                                        <button class="btn btn-info">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: [],
        data(){
            return{
               categoria:'',
               array_categorias: []
            };
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/categorias').then((response) => {
                this.array_categorias = response.data;
            });
        },
        methods: {
            onClickAddCategorias(){
                const params = {
                    descripcion : this.categoria
                };
                this.categoria = ''; 
                 axios.post('/categorias', params).then((response) => {
                     console.log("categoria agregada");
                     this.array_categorias.push(response.data);
                });
            }
        }
    }
</script>
