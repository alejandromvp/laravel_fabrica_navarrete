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
    <div class="Main_sistema">
        <div class="row">
            <div class="col-sm-2 fondo_panel p-0">
                <panel-left-main @active_menu="fondo_contenido" :user="user_autentication" :user_icon="user_icon"></panel-left-main>
            </div>
            <div class="col-sm-10 fondo_contenido">
                <div class="p-2">
                    <panel-control v-if="menu_active[0]"></panel-control>
                    <component-accesos v-if="menu_active[1]"></component-accesos>
                    <seccion-categoria v-if="menu_active[2]"></seccion-categoria>
                    <seccion-producto v-if="menu_active[3]"></seccion-producto>
                    <component-multimedia v-if="menu_active[4]"></component-multimedia>
                    <ventas v-if="menu_active[5]"></ventas>
                    <reporte-ventas v-if="menu_active[6]"></reporte-ventas>
                    <bienvenida-vue v-if="menu_active[7]"></bienvenida-vue>
                </div>
            </div>
        </div>       
        <div class="row">
            <div class="col-sm-12 p-0 fondo_footer">
                <footer class="fondo_footer"> 
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            © 2020 Alejandro Villagran
                        </div>
                    </div>  
                </footer>
            </div>
        </div>
    </div>
    

</template>

<script>
    export default {
        props: ['user_autentication', 'user_icon'],
        data(){
            return {
                pensamientos: [],
                menu_active: [false, false, false, false, false, false, false, true]
            }
        },
        mounted() {
        },
        methods:{
                fondo_contenido(index){
                    this.menu_active = [false, false, false, false, false, false, false, false];
                    this.menu_active[index] = true;
                }
            /* add_pensamiento(_pensamiento){
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
            } */
        }
    }
</script>