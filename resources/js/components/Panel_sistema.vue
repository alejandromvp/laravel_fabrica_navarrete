<template>
    <div class="panel">
        <nav style="width: inherit;">
            <div class="perfil">
                <div class="flex_row_perfil">
                    <img v-bind:src="'img/profile/'+[user_icon]" class="rounded-circle" alt="Cinque Terre" width="50" height="50"> 
                    <div class="usuario_perfil">
                        <p style="color:#001845;margin-bottom:0px;">{{user}}</p>
                        <p style="color:#979dac;margin-bottom:0px;">Administrador</p>
                    </div>
                </div>
            </div>
            <hr style="margin-top:0;margin-bottom:0;">
            <li class="flex_column_center selected_li_button">
                <button v-bind:class="[boton_style, class_active[0]]" v-on:click="onClickControl_Panel()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-home"></i>
                    </span>Panel de control
                </button>
                <button v-bind:class="[boton_style, class_active[1]]" v-on:click="onClickAccesos()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-user"></i>
                    </span>Accesos
                </button>
                <button v-bind:class="[boton_style, class_active[2]]" v-on:click="onClickCategorias()">
                    <span style="margin-right:10px;">
                        <i class="fab fa-buffer"></i>
                    </span>Categorias 
                </button>
                <button v-bind:class="[boton_style, class_active[3]]" v-on:click="onClickProductos()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-border-all"></i>
                    </span>Productos  
                </button>
                <button v-bind:class="[boton_style, class_active[4]]" v-on:click="onClickMultimedia()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-list"></i>
                    </span>Multimedia
                </button>
                <button v-bind:class="[boton_style, class_active[5]]" v-on:click="onClickVentas()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-list"></i>
                    </span>Ventas
                </button>
                <button v-bind:class="[boton_style, class_active[6]]" v-on:click="onClickReporte_Ventas()">
                    <span style="margin-right:10px;">
                        <i class="fas fa-list"></i>
                    </span>Reporte de ventas
                </button>
            </li>
        </nav>
    </div>
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: ['user', 'user_icon'],
        data(){
            return{
                boton_style: 'btn btn-default',
                class_active: ['', '', '', '', '', '', ''],
                editMode: false
            };
        },
        mounted() {
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
