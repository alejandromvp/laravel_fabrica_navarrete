<template>
    <div class="row">
        <div class="col-md-8">

            <form-pensamiento @new="add_pensamiento"></form-pensamiento>

            <pensamiento-component v-for="(pensamiento, index) in pensamientos" 
                :key="pensamiento.id"
                :pensamiento="pensamiento"
                 @delete="eliminar_pensamiento(index)">
            </pensamiento-component>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                pensamientos: [/* {
                    'id': 1,
                    'descripcion': 'abc',
                    'created_at': '20-09-2010'
                },
                {
                    'id': 2,
                    'descripcion': 'abc',
                    'created_at': '20-09-2010'
                } */]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            add_pensamiento(_pensamiento){
                this.pensamientos.push(_pensamiento);
            },
            eliminar_pensamiento(index){
                this.pensamientos.splice(index, 1);
            }
        }
    }
</script>