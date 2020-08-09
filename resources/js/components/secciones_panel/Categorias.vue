<template>
    <div class="Main_Categorias">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="flex_row">
                            <b class="text-white">LISTA DE CATEGORIAS</b>
                            <button class="btn btn-success" v-on:click="Modal_new_categoria()">Agregar Categoria</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(categoria, index) in array_categorias"
                                :key="categoria.id">
                                    <th v-text="categoria.id"></th>
                                    <th v-text="categoria.descripcion"></th>
                                    <th>
                                        <button class="btn btn-info" v-on:click="Modal_edit_categoria(categoria, index)">Editar</button>
                                        <button class="btn btn-danger" v-on:click="onClickDelete(categoria.id, index)">Eliminar</button>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_new_categoria_modal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar Nueva Categoria</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar categoria: <span style="color:red;">{{form.categoria}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategoria() : AddCategorias()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control mb-3" type="text" placeholder="Nombre de la categoria" v-model="new_input_categoria">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Actualizar</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Agregar categoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- cierre modal -->
    </div> <!-- cierre main categorias  -->
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: [],
        data(){
            return{
               new_input_categoria: '',
               array_categorias: [],
               editmode:false,
               form:{
                    id:'',
                    categoria:'',
                    index: '',
                    created_at:'',
                    updated_at:''
                }
            };
        },
        mounted() {
            axios.get('/categorias').then((response) => {
                this.array_categorias = response.data;
            });
        },
        methods: {
            Modal_edit_categoria(_categoria, _index){
                this.editmode = true;
                this.form.id = _categoria.id;
                this.form.categoria = _categoria.descripcion;
                this.new_input_categoria = _categoria.descripcion;
                this.form.index = _index;
                $('#edit_new_categoria_modal').modal('show');
                
            },
            Modal_new_categoria(){
                this.editmode = false;
                this.form.id = '';
                this.form.categoria = '';
                this.new_input_categoria = '';
                $('#edit_new_categoria_modal').modal('show');
            },
            updateCategoria(){
                const params = {
                    descripcion: this.new_input_categoria
                };
                this.new_input_categoria = ''; 
                axios.put(`/categorias/${this.form.id}`, params).then((response) => {
                    this.array_categorias.splice(this.form.index, 1, response.data);
                    console.log(response.data);
                });
                $('#edit_new_categoria_modal').modal('hide');
            },
            AddCategorias(){
                const params = {
                    descripcion : this.new_input_categoria
                };
                this.new_input_categoria = ''; 
                 axios.post('/categorias', params).then((response) => {
                     this.array_categorias.unshift(response.data);
                });
                $('#edit_new_categoria_modal').modal('hide');
            },
            onClickDelete(_id, _index){
                    axios.delete(`/categorias/${_id}`).then(() => {
                    this.$emit('delete');
                    this.array_categorias.splice(_index, 1);
                });
            }
        }
    }
</script>


