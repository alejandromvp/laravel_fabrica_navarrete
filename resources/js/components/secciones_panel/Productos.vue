<template>
    <div class="Main_productos">
        <div class="row">
            <div class="col-sm-12">
              <Card>
                  <template #header>
                      <div class="flex_row" style="padding:0.5cm;background:#33415c;">
                          <b style="color:white;">LISTA DE PRODUCTOS</b>
                          <Button label="Agregar Producto" class="p-button-success" v-on:click="Modal_new_categoria()"/>
                      </div>
                  </template>
                  <template #content>
                      <DataTable :value="array_productos" responsiveLayout="scroll">
                          <Column field="id_producto" header="#id producto"></Column>
                          <Column field="nombre_producto" header="nombre producto"></Column>
                          <Column header="Image">
                               <template #body="slotProps">
                                  <img :src="slotProps.data.url_img_producto" :alt="slotProps.data.nombre_producto" class="product-image" width="70" height="70"/>
                              </template>
                          </Column>
                          <Column header="stock_productos">
                            <template #body="slotProps">
                                 <InputNumber v-model="slotProps.data.stock_productos" mode="decimal" />
                            </template>
                          </Column>
                          <Column header="Precio Venta">
                            <template #body="slotProps">
                                 <InputNumber v-model="slotProps.data.precio_venta" mode="currency" currency="USD" locale="en-US" />
                            </template>
                          </Column>
                          <Column :exportable="false">
                            <template #body="slotProps">
                                <Button icon="pi pi-pencil" class="p-button-rounded p-button-success p-mr-2" v-tooltip.top="'Editar Producto'"/>
                                <Button icon="pi pi-trash" class="p-button-rounded p-button-warning" v-tooltip.top="'Eliminar Producto'"/>
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
               array_productos: [],
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
        async mounted() {
          await axios.get('/productos').then((response) => {
              this.array_productos = response.data;
              console.log(this.array_productos);
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
