<template>
    <div class="Main">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="flex_row">
                            <b class="text-white">LISTA DE PRODUCTOS</b>
                            <button class="btn btn-success" v-on:click="Modal_new_categoria()">Agregar Producto</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                        <th>Categoria</th>
                                        <th>Stock</th>
                                        <th>Precio de compra</th>
                                        <th>Precio de venta</th>
                                        <th>Agregado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="http://vibradosnavarrete.cl/wp-content/uploads/2019/09/bloque-curvo-768x1024.jpg" alt="" width="80" height="70">
                                        </td>
                                        <td>Bloque curvo</td>
                                        <td>Bloques</td>
                                        <td>100</td>
                                        <td>15.000 CLP</td>
                                        <td>21.000 CLP</td>
                                        <td>25-08-2020 9:10:54 am</td>
                                        <td>
                                            <button class="btn btn-warning">Editar</button>
                                            <button class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="http://vibradosnavarrete.cl/wp-content/uploads/2019/09/placa-humita-1024x303.jpg" alt="" width="80" height="70">
                                        </td>
                                        <td>Placa Humita</td>
                                        <td>Panderetas</td>
                                        <td>100</td>
                                        <td>15.000 CLP</td>
                                        <td>21.000 CLP</td>
                                        <td>25-08-2020 9:10:54 am</td>
                                        <td>
                                            <button class="btn btn-warning">Editar</button>
                                            <button class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.') 
        },
        methods: {
            
        }
    }
</script>
