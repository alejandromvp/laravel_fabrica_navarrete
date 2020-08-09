<template>
    <div class="panel">
        <nav style="width: inherit;">
            <li class="flex_column_center selected_li_button">
                <button v-bind:class="[boton_style, class_active[0]]" v-on:click="onClickControl_Panel()">
                    Panel de control
                </button>
                <button v-bind:class="[boton_style, class_active[1]]" v-on:click="onClickAccesos()">
                    Accesos
                </button>
                <button v-bind:class="[boton_style, class_active[2]]" v-on:click="onClickCategorias()">
                    Categorias
                </button>
                <button v-bind:class="[boton_style, class_active[3]]" v-on:click="onClickProductos()">
                    Productos
                </button>
                <button v-bind:class="[boton_style, class_active[4]]" v-on:click="onClickMultimedia()">
                    Multimedia
                </button>
                <button v-bind:class="[boton_style, class_active[5]]" v-on:click="onClickVentas()">
                    Ventas
                </button>
                <button v-bind:class="[boton_style, class_active[6]]" v-on:click="onClickReporte_Ventas()">
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
                class_active: ['', '', '', '', '', '', ''],
                editMode: false
            };
        },
        mounted() {
            console.log('panel m0ntado') 
        },
        methods: {
            onClickControl_Panel(){
                console.log("seccion categorias");
                 this.class_active = ['active','', '', '', '', '', ''];
                this.$emit('active_menu', 0);
            },
            onClickAccesos(){
                console.log("seccion categorias");
                this.class_active = ['','active', '', '', '', '', ''];
                this.$emit('active_menu', 1);
            },
            onClickCategorias(){
                console.log("seccion categorias");
                this.class_active = ['', '', 'active', '', '', '', ''];
                this.$emit('active_menu', 2);
            },
            onClickProductos(){
                console.log("seccion productos");
                this.class_active = ['', '', '', 'active', '', '', ''];
                this.$emit('active_menu', 3);
            },
            onClickMultimedia(){
                console.log("seccion categorias");
                this.class_active = ['', '', '', '', 'active', '', ''];
                this.$emit('active_menu', 4);
            },
            onClickVentas(){
                console.log("seccion categorias");
                this.class_active = ['', '', '', '', '', 'active', ''];
                this.$emit('active_menu', 5);
            },
            onClickReporte_Ventas(){
                console.log("seccion categorias");
                this.class_active = ['', '', '', '', '', '', 'active'];
                this.$emit('active_menu', 6);
            },
        }
    }
</script>
