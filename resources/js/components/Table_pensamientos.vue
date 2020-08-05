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
                editMode:false,
                items: []
            };
        },
        mounted() {
            this.items = this.$emit('obtener_pensamiento');
        }
    }
</script>
