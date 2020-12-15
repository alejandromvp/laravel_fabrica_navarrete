<template>
    <div class="Main_Categorias">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="flex_row">
                            <b class="text-white">LISTA DE CATEGORIAS</b>
                            <button class="btn btn-success" v-on:click="Modal_new_categoria()">Agregar Categoria</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="table_categorias">
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
                                    <th v-text="categoria.id_categoria"></th>
                                    <th v-text="categoria.descripcion"></th>
                                    <th>
                                        <button class="btn btn-warning" v-on:click="Modal_edit_categoria(categoria, index)">Editar</button>
                                        <button class="btn btn-danger" v-on:click="onClickDelete(categoria.id_categoria, index, categoria.descripcion)">Eliminar</button>
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
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar nombre categoria: <span style="color:red;">{{form.categoria}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateCategoria() : AddCategorias()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control mb-3" type="text" placeholder="Nombre de la categoria">
                                <small style="color:red;font-weight: bold;">{{ error_input_categoria }} </small>
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
               array_categorias: [],
               editmode:false,
               form:{
                    index: '',
                    id:'',
                    categoria:'',
                    created_at:'',
                    updated_at:''
                },
                error_input_categoria: '',
            };
        },
        async mounted() {
                await axios.get('/categorias').then((response) => {
                    this.array_categorias = response.data;
                });
                this.carge_dataTable('#table_categorias');
        },
        methods: {
            Modal_edit_categoria(_categoria, _index){
                this.editmode = true;
                this.error_input_categoria = "";
                this.new_input_categoria = _categoria.descripcion;
                this.form.id = _categoria.id_categoria;
                this.form.categoria = _categoria.descripcion;
                this.form.index = _index;
                $('#edit_new_categoria_modal').modal('show');
                
            },
            Modal_new_categoria(){
                this.editmode = false;
                this.error_input_categoria = "";
                this.form.id = '';
                this.form.categoria = '';
                this.new_input_categoria = '';
                $('#edit_new_categoria_modal').modal('show');
            },
            updateCategoria(){
                const params = {
                    descripcion: this.form.categoria
                };
                this.new_input_categoria = ''; 
                axios.put(`/categorias/${this.form.id}`, params).then((response) => {
                    this.array_categorias.splice(this.form.index, 1, response.data);
                    $('#edit_new_categoria_modal').modal('hide');
                    Swal.fire('Success', "Categoria editada con exito.", 'success', 1500);
                },
                (error) => { 
                    this.error_input_categoria = error.response.data.error.descripcion
                    }
                );
            },
            async AddCategorias(){
                const params = {
                    descripcion : this.form.categoria
                };
                
                await axios.post('/categorias', params).then((response) => {
                    $('#table_categorias').DataTable().destroy();
                    //$("#table_categorias tbody").children().remove();
                    this.form.categoria = ''; 
                    this.array_categorias.unshift(response.data);
                    $('#edit_new_categoria_modal').modal('hide');
                    Swal.fire('Success', "Categoria agregada con exito.", 'success', 1500);
                    },
                    (error) => { 
                        this.error_input_categoria = error.response.data.error.descripcion
                     }
                );
                this.carge_dataTable('#table_categorias');

            },
            onClickDelete(_id, _index, _descripcion){
                Swal.fire({
                    title: 'Seguro que deseas eliminar categoria: '+_descripcion,
                    text: "No podras revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar!'
                    }).then((result) => {
                    if (result.value) {
                        axios.delete(`/categorias/${_id}`).then(() => {
                                this.$emit('delete');
                                this.array_categorias.splice(_index, 1);
                            });
                        Swal.fire(
                        'Eliminado!',
                        'La categoria: '+_descripcion+' ha sido eliminada exitosamente',
                        'success'
                        )
                    }
                })
            }, //fin funcion delete

            carge_dataTable(_id_table){
                $(_id_table).DataTable({
                "sPaginationType": "full_numbers",
                "bInfo": false,
                "bDestroy": true,
                "bSort": false, 
                "language": {
                  "decimal": "",
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                  "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                  "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Entradas",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscar:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                  }
                }
              });
            }//fin function carge_dataTable
        }
    }
</script>


