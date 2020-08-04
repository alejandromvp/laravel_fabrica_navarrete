<template>
    <div class="card" style="margin-top:5px;border-color:blue;">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>descripcion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in pensamiento"
                :key="item.id">
                    <th v-text="item.id"></th>
                    <th v-text="item.descripcion"></th>
                </tr>
            </tbody>
        </table>

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
