<template>
    <div class="panel">
        <nav style="width: inherit;">
            <li class="flex_column_center selected_li_button">
                <button v-bind:class="[boton_style, active[0]]" v-on:click="onClickControl_Panel()">
                    Panel de control
                </button>
                <button v-bind:class="[boton_style, active[1]]" v-on:click="onClickAccesos()">
                    Accesos
                </button>
                <button v-bind:class="[boton_style, active[2]]" v-on:click="onClickCategorias()">
                    Categorias
                </button>
                <button v-bind:class="[boton_style, active[3]]" v-on:click="onClickProductos()">
                    Productos
                </button>
                <button v-bind:class="[boton_style, active[4]]" v-on:click="onClickMultimedia()">
                    Multimedia
                </button>
                <button v-bind:class="[boton_style, active[5]]" v-on:click="onClickVentas()">
                    Ventas
                </button>
                <button v-bind:class="[boton_style, active[6]]" v-on:click="onClickReporte()">
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
                boton_style: 'btn btn-default',
                active: ['', '', '', '', '', '', ''],
                editMode: false
            };
        },
        mounted() {
            console.log('panel m0ntado') 
        },
        methods: {
            onClickCategorias(){
                console.log("seccion categorias");
                this.active[2] = 'active';
            },
            onClickProductos(){
                console.log("seccion productos");
            }
        }
    }
</script>
