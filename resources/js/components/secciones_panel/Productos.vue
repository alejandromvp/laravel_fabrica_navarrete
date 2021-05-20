<template>
    <div class="Main_productos">
        <div class="p-grid">
            <div class="p-col-12">
              <Card>
                  <template #header>
                      <div class="flex_row" style="padding:0.5cm;background:#33415c;">
                          <b style="color:white;">LISTA DE PRODUCTOS</b>
                          <Button label="Agregar Producto" class="p-button-success" v-on:click="Modal_new_producto()"/>
                      </div>
                  </template>
                  <template #content>
                      <DataTable :value="array_productos" class="p-datatable-lg" :rows="10" responsiveLayout="scroll">
                          <Column field="id_producto" header="#id producto"></Column>
                          <Column field="nombre_producto" header="nombre producto"></Column>
                          <Column header="Image">
                               <template #body="slotProps">
                                  <img :src="slotProps.data.url_img_producto" :alt="slotProps.data.nombre_producto" class="product-image" width="70" height="70"/>
                              </template>
                          </Column>
                          <Column header="stock_productos">
                            <template #body="slotProps">
                                 <InputNumber v-model="slotProps.data.stock_productos" mode="decimal" class="p-inputtext-sm" :minFractionDigits="0"/>
                            </template>
                          </Column>
                          <Column header="Precio Venta">
                            <template #body="slotProps">
                                 <InputNumber v-model="slotProps.data.precio_venta" mode="currency" currency="USD" locale="en-US" class="p-inputtext-sm" :minFractionDigits="0"/>
                            </template>
                          </Column>
                          <Column field="categoria_descripcion" header="Categoria"></Column>
                          <Column :exportable="false">
                            <template #body="slotProps">
                                <Button icon="pi pi-pencil" class="p-button-rounded p-button-warning p-mr-2" v-on:click="Modal_ver_producto(slotProps.data)" v-tooltip.top="'Ver Producto'"/>
                                <Button icon="pi pi-trash" class="p-button-rounded p-button-danger" v-tooltip.top="'Eliminar Producto'"/>
                            </template>
                        </Column>
                      </DataTable>
                  </template>
              </Card>
            </div>
        </div>
        <div class="modal fade" id="edit_new_producto_modal" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Agregar nuevo producto</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Actualizar producto: <span style="color:red;">{{producto.nombre_producto}}</span></h5>
                        <Button label="Editar Producto" class="p-button-success p-button-sm" v-on:click="Modal_edit_producto()" style="margin-left:1cm;" v-show="editmode"/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="CloseModel()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmode ? updateProducto() : AddProducto()">
                        <div class="modal-body">
                            <div class="p-col-12">
                                <div class="p-inputgroup">
                                    <span class="p-inputgroup-addon" style="width:133px;">Nombre Producto</span>
                                    <InputText v-model="producto.nombre_producto" :disabled="!edit_ficha" placeholder="Ingrese nombre producto ..." required/>
                                </div>
                            </div><br>
                            <div class="p-col-12">
                                <div class="p-inputgroup">
                                    <span class="p-inputgroup-addon" style="width:133px;">Categoria</span>
                                    <Dropdown v-model="selectedCategory" :options="array_categorias" optionLabel="descripcion"  placeholder="Seleccione categoria ..." :filter="true" filterPlaceholder="Seleccione categoria" :disabled="!edit_ficha" style="width:90%;" required/>
                                </div>
                            </div><br>
                            <div class="p-col-12">
                                <div class="p-inputgroup">
                                    <span class="p-inputgroup-addon" style="width:145px;">Stock</span>
                                    <InputNumber placeholder="ingrese stock ..." v-model="producto.stock_productos" :disabled="!edit_ficha" style="width:100%;" required/>
                                </div>
                            </div><br>
                            <div class="p-col-12">
                                <div class="p-inputgroup">
                                    <span class="p-inputgroup-addon" style="width:145px;">Precio Venta</span>
                                    <!-- <input type="text"  v-model="producto.precio_compra" class="form-control" placeholder="Precio compra" :disabled="!edit_ficha"> -->
                                    <InputNumber placeholder="Ingrese precio de compra ..." v-model="producto.precio_compra" :disabled="!edit_ficha" style="width:100%;" mode="currency" currency="USD" :minFractionDigits="0" required/>
                                </div>
                            </div><br>
                            <div class="p-col-12">
                                <div class="p-inputgroup">
                                    <span class="p-inputgroup-addon" style="width:145px;">Precio Compra</span>
                                    <!-- <input type="text"  v-model="producto.precio_compra" class="form-control" placeholder="Precio compra" :disabled="!edit_ficha"> -->
                                    <InputNumber placeholder="Ingrese precio venta ..." v-model="producto.precio_venta" :disabled="!edit_ficha" style="width:100%;"  mode="currency" currency="USD" :minFractionDigits="0" required/>
                                </div>
                            </div><br>
                            <!-- ###################### FILA 5 #######################-->
                               <div class="row">
                                   <div class="col-sm-2">
                                       <label> {{form.id_producto}}</label>
                                   </div>
                                   <div class="col-sm-10" v-if="!editmode">
                                       <div class="input-group">
                                           <div class="input-group-prepend">
                                               <div class="input-group-text" style="width:140px;">
                                               <i class="fas fa-camera-retro"> Foto producto</i>
                                               </div>
                                           </div>
                                           <input type="file" class="form-control" @change="onFileSelected" placeholder="foto alumno" accept="image/gif, image/jpeg, image/png" required>
                                       </div>
                                   </div>
                                   <div class="col-sm-10" v-else="editmode">
                                       <img :src="producto.url_img_producto" alt="" class="product-image" width="300" height="200">
                                       <br><br>
                                       <div class="row_flex_edit_foto" v-show="edit_ficha">
                                           <label><input type="checkbox" id="checkbox1" value="" style="margin-right:10px;">check para cambiar foto</label>
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                   <div class="input-group-text" style="width:180px;">
                                                   <i class="fas fa-camera-retro"> Cambiar foto producto</i>
                                                   </div>
                                               </div>
                                               <input type="file" class="form-control" @change="onFileSelected" placeholder="foto alumno" id="input_foto_alumno2" accept="image/gif, image/jpeg, image/png" required>
                                           </div>
                                       </div>
                                   </div>
                               </div><br>
                            <!-- ######################################################-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" @click="CloseModel()">Close</button>
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
               selectedFile: null,
               editmode:false,
               edit_ficha:false,
               array_productos: [],
               array_categorias: [],
               selectedCategory: null,
               display: false,
               producto: {},
               form:{
                    index: '',
                    nombre_producto:'',
                    id_producto:'',
                    url_img_producto:'',
                    id_categoria:'',
                    stock_productos: null,
                    precio_compra:null,
                    precio_venta: null,
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
          await axios.get('/categorias').then((response) => {
              this.array_categorias = response.data;
          });
          // ######## funcion para activar o desactivar input foto ######
          $('#checkbox1').change(function() {
            if(this.checked) {
                $('#input_foto_alumno2').prop('disabled', false);
            }else{
                $('#input_foto_alumno2').prop('disabled', true);
            }
          });
          //#############################################################
        },
        methods: {
          onFileSelected(event){
            this.selectedFile = event.target.files[0];
          },
          async Modal_ver_producto(_Producto){
            await axios.get(`/productos/${_Producto.id_producto}`).then((response) => {
                this.form = response.data;
                this.producto = this.form[0];
            });
            this.editmode = true;
            $('#edit_new_producto_modal').modal('show');
            //this.display = true;
          },
          Modal_edit_producto(){
            this.edit_ficha = true;
          },
          Modal_new_producto(){
            this.editmode = false;
            this.edit_ficha = true;
            this.form = {
              index: '',
              nombre_producto: this.producto.nombre_producto,
              id_producto:'',
              url_img_producto:'',
              id_categoria:'',
              stock_productos:null,
              precio_compra: null,
              precio_venta: null,
              created_at:'',
              updated_at:''
            };
            this.producto = this.form;
            $('#edit_new_producto_modal').modal('show');
            //this.display = true;
          },
          updateProducto(){

          },
          AddProducto(){
            var parametros = new FormData();
            parametros.append('nombre_producto',  this.producto.nombre_producto);
            parametros.append('url_img_producto',  this.producto.url_img_producto);
            parametros.append('id_categoria',  this.selectedCategory.id_categoria);
            parametros.append('stock_productos',  this.producto.stock_productos);
            parametros.append('precio_compra',  this.producto.precio_compra);
            parametros.append('precio_venta',  this.producto.precio_venta);
            parametros.append('file', this.selectedFile);
            axios.post('/productos', parametros).then((response) => {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
          },
          onClickDelete(_id, _index, _descripcion){

          }, //fin funcion delete
          CloseModel(){
            this.edit_ficha = false;
          }
        }
    }
</script>
