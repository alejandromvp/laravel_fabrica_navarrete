<template>
    <div class="Main_Categorias">
        <div class="row">
            <div class="col-sm-12">
                  <Card>
                      <template #header>
                          <div class="flex_row" style="padding:0.5cm;background:#33415c;">
                              <b style="color:white;">LISTA DE CATEGORIAS</b>
                              <Button label="Agregar Categoria" class="p-button-success" v-on:click="Modal_new_categoria()"/>
                          </div>
                      </template>
                      <template #content>
                          <DataTable :value="array_categorias" responsiveLayout="scroll">
                              <Column field="id_categoria" header="Code"></Column>
                              <Column field="descripcion" header="Name"></Column>
                              <Column :exportable="false">
                                <template #body="slotProps">
                                    <Button icon="pi pi-pencil" class="p-button-rounded p-button-success p-mr-2" @click="Modal_edit_categoria(slotProps.data)" v-tooltip.top="'Editar Categoria'"/>
                                    <Button icon="pi pi-trash" class="p-button-rounded p-button-warning" @click="onClickDelete(slotProps.data)" v-tooltip.top="'Eliminar Categoria'"/>
                                </template>
                            </Column>
                          </DataTable>
                      </template>
                  </Card>
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
                                <input class="form-control mb-3" type="text" placeholder="Nombre de la categoria" v-model="descripcion_categoria">
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
                descripcion_categoria:''
            };
        },
        async mounted() {
                await axios.get('/categorias').then((response) => {
                    this.array_categorias = response.data;
                });
                this.carge_dataTable('#table_categorias');
        },
        methods: {
            Modal_edit_categoria(_categoria){
                this.editmode = true;
                this.form.id = _categoria.id_categoria;
                this.form.categoria = _categoria.descripcion;
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
                    descripcion: this.descripcion_categoria
                };
                axios.put(`/categorias/${this.form.id}`, params).then((response) => {
                    this.array_categorias.findIndex((elemento, indice) => {
                      if (elemento.id_categoria === response.data.id_categoria) {
                        this.array_categorias.splice(indice, 1, response.data);
                      }
                    });
                    //this.array_categorias.splice(this.form.index, 1, response.data);
                    $('#edit_new_categoria_modal').modal('hide');
                    Swal.fire('Success', "Categoria editada con exito.", 'success', 1500);
                    this.descripcion_categoria = '';
                },
                (error) => {
                    this.error_input_categoria = error.response.data.error.descripcion
                    }
                );
            },
            async AddCategorias(){
                const params = {
                    descripcion : this.descripcion_categoria
                };

                await axios.post('/categorias', params).then((response) => {
                    //$('#table_categorias').DataTable().destroy();
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
            onClickDelete(_objeto_categoria){
                Swal.fire({
                    title: 'Seguro que deseas eliminar categoria: '+ _objeto_categoria.descripcion,
                    text: "No podras revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar!'
                    }).then((result) => {
                    if (result.value) {
                        axios.delete(`/categorias/${_objeto_categoria.id_categoria}`).then((response) => {
                          console.log(response.data);
                                //this.$emit('delete');
                                //this.array_categorias.splice(_index, 1);
                            });
                        Swal.fire(
                        'Eliminado!',
                        'La categoria: '+_objeto_categoria.descripcion+' ha sido eliminada exitosamente',
                        'success'
                        )
                    }
                })
            }, //fin funcion delete
        }
    }
</script>
