<template>
    <!-- <div class="row">
        <div class="col-md-12">
            <table-pensamientos :pensamiento="pensamientos"></table-pensamientos>
            <form-pensamiento @new_pensamiento="add_pensamiento"></form-pensamiento>
            <pensamiento-component v-for="(pensamiento, index) in pensamientos" 
                :key="pensamiento.id"
                :pensamiento="pensamiento"
                 @delete="eliminar_pensamiento(index)"
                 @update="update_pensamiento(index, arg)">
            </pensamiento-component>
        </div>
    </div> -->
    <div class="Main">
        <div class="row">
            <div class="col-sm-2 fondo_panel p-0">
                <panel-left-main></panel-left-main>
            </div>
            <div class="col-sm-10 fondo_contenido">
                <div class="p-2" style="height:540px;">
                    <seccion-categoria></seccion-categoria>
                    <seccion-producto v-if="false"></seccion-producto>
                </div>
            </div>
        </div>       
        <div class="row">
            <div class="col-sm-12 p-0 fondo_contenido">
                <footer class="fondo_footer"> 
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            © 2020 Vibrados Navarrete 
                        </div>
                    </div>  
                </footer>
            </div>
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
           axios.get('/pensamientos').then((response) => {
                this.pensamientos = response.data;
            });
        },
        methods:{
            add_pensamiento(_pensamiento){
                this.pensamientos.push(_pensamiento);
            },
            eliminar_pensamiento(index){
                this.pensamientos.splice(index, 1);
            },
            update_pensamiento(index, pensamiento){
                this.pensamientos[index] = pensamiento;
            },
            obtener_pensamientos(){
                return this.pensamientos;
            }
        }
    }
</script>