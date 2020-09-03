<template>
    <div class="Main_productos">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex_row">
                            <b class="text-white">LISTA DE PRODUCTOS</b>
                            <button class="btn btn-success" v-on:click="Modal_new_producto()">Agregar Producto</button>
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
        <div class="modal fade" id="edit_new_categoria_modal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar nuevo producto</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar producto: <span style="color:red;">{{form.categoria}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategoria() : AddCategorias()">
                        <div class="modal-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                        <i class="fas fa-border-all"></i>
                                    </div>
                                </div>
                                <input type="text" v-model="form.nombre_producto" class="form-control" placeholder="Nombre producto">
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                        <i class="fab fa-buffer"></i>
                                    </div>
                                </div>
                                <select class="form-control" v-model="form.id_categoria" id="form_select_categoria">
                                    <option disabled value="" selected>Seleccione categoria</option>
                                </select>
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                        <i class="fas fa-cash-register"></i>
                                    </div>
                                </div>
                                <input type="text" v-model="form.stock_productos" class="form-control" placeholder="Stock">
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                        <i class="fas fa-hand-holding-usd"></i>
                                    </div>
                                </div>
                                <input type="text"  v-model="form.precio_compra" class="form-control" placeholder="Precio compra">
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                       <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <input type="text" v-model="form.precio_venta" class="form-control" placeholder="Precio venta">
                            </div><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width:40px;">
                                        <i class="fas fa-image"></i>
                                    </div>
                                </div>
                                <input type="text" v-model="form.url_img_producto" class="form-control" placeholder="Imagen">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Agregar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- cierre modal -->
    </div> <!-- cierre main_productos -->
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: [],
        data(){
            return{
               editmode:false,
               form:{
                    index: '',
                    nombre_producto:'',
                    id_producto:'',
                    url_img_producto:'',
                    id_categoria:'',
                    stock_productos:'',
                    precio_compra:'',
                    precio_venta:'',
                    created_at:'',
                    updated_at:''
                }
            };
        },
        mounted() {
            axios.get('/categorias').then((response) => {
                $.each(response.data, function (key, item) {
                    $("#form_select_categoria").append('<option value="' + item['id_categoria'] + '">' + item['descripcion'] + '</option>');
                });
            }); 
        },
        methods: {
            Modal_edit_categoria(_categoria, _index){
                
            },
            Modal_new_producto(){
                this.editmode = false;
                this.form.nombre_producto = '';
                this.form.id_producto = '';
                this.form.url_img_producto = '';
                this.form.id_categoria = '';
                this.form.stock_productos = '',
                this.form.precio_compra = '',
                this.form.precio_venta = '',
                $('#edit_new_categoria_modal').modal('show');
            },
            updateCategoria(){
                
            },
            AddCategorias(){
               console.log(this.form.id_categoria);
            },
            onClickDelete(_id, _index, _descripcion){

            } //fin funcion delete
        }
    }
</script>
