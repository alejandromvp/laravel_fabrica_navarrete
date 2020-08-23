<template>
    <div class="Main">
        <div class="section_1">
            <div class="box_users">
                <div class="row_flex">
                    <div class="seccion_icono">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="seccion_box_content">
                        Usuarios
                        <span>3</span>
                    </div>
                </div>
            </div>
            <div class="box_category">
                <div class="row_flex">
                    <div class="seccion_icono">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="seccion_box_content">
                        <p>Categorias</p>
                        <span>1</span>
                    </div>
                </div>
            </div>
            <div class="box_productos">
                <div class="row_flex">
                    <div class="seccion_icono">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="seccion_box_content">
                        Productos
                        <span>0</span>
                    </div>
                </div>
            </div>
            <div class="box_ventas">
                <div class="row_flex">
                    <div class="seccion_icono">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="seccion_box_content">
                        Ventas
                        <span>0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: [],
        data(){
            return{
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.') 
        },
        methods: {
            
        }
    }
</script>