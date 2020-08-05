<template>
    <div class="panel">
        <nav style="width: inherit;">
            <li class="flex_column_center selected_li_button">
                <button class="btn btn-default" v-on:click="onClickControl_Panel()">
                    Panel de control
                </button>
                <button class="btn btn-default" v-on:click="onClickAccesos()">
                    Accesos
                </button>
                <button class="btn btn-default" v-on:click="onClickCategorias()">
                    Categorias
                </button>
                <button class="btn btn-default" v-on:click="onClickProductos()">
                    Productos
                </button>
                <button class="btn btn-default" v-on:click="onClickMultimedia()">
                    Multimedia
                </button>
                <button class="btn btn-default" v-on:click="onClickVentas()">
                    Ventas
                </button>
                <button class="btn btn-default" v-on:click="onClickReporte()">
                    Reporte de ventas
                </button>
            </li>
        </nav>
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
            console.log('panel m0ntado') 
        },
        methods: {
            onClickCategorias(){
                console.log("seccion categorias");
            },
            onClickProductos(){
                console.log("seccion productos");
            }
        }
    }
</script>
