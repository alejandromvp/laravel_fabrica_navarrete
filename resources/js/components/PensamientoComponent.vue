<template>
    <div class="card" style="margin-top:5px;border-color:blue;">
        <div class="card-header">Publicado en {{pensamiento.created_at}}</div>
        <div class="card-body">
            <input v-if="editMode" type="text" class="form-control" v-model ="pensamiento.descripcion">

            <p v-else><b>Nombre herramienta:</b> <b style="color:blue;">{{pensamiento.descripcion}}</b></p>
        </div>
        <div class="panel-footer" style="padding:20px;">
            <button v-if="editMode" class="btn btn-danger"  v-on:click="onClickUpdate()">
                Guardar cambios
            </button>

            <button v-else class="btn btn-default" v-on:click="onClickEdicion()">
                Editar
            </button>
            
            
            <button v-if="editMode" class="btn btn-danger" v-on:click="onClickCancel()">
                cancelar
            </button>
            <button v-else class="btn btn-danger" v-on:click="onClickDelete()">
                eliminar    
            </button>
            
        </div> 
    </div>
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: ['pensamiento'],
        data(){
            return{
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.') 
        },
        methods: {
            onClickDelete(){
                    axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdicion(){
                this.editMode = true;
            },
            onClickUpdate(){
                const params = {
                    descripcion: this.pensamiento.descripcion
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`, params).then((response) => {
                    this.editMode = false;
                    const thought = response.data;
                    this.$emit('update', thought);
                });
            },
            onClickCancel(){
                 this.editMode = false;
            }
        }
    }
</script>
