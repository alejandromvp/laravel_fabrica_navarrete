/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('table-pensamientos', require('./components/Table_pensamientos.vue').default);
Vue.component('container', require('./components/Sistema_Main.vue').default);
Vue.component('pensamiento-component', require('./components/PensamientoComponent.vue').default);
Vue.component('form-pensamiento', require('./components/Form_pensamiento.vue').default);
Vue.component('panel-left-main', require('./components/Panel_sistema.vue').default);

//################### secciones Panel Menu ###################################################
Vue.component('panel-control', require('./components/secciones_panel/Panel_control.vue').default);
Vue.component('component-accesos', require('./components/secciones_panel/Accesos.vue').default);
Vue.component('seccion-categoria', require('./components/secciones_panel/Categorias.vue').default);
Vue.component('seccion-producto', require('./components/secciones_panel/Productos.vue').default);
Vue.component('component-multimedia', require('./components/secciones_panel/Multimedia.vue').default);
Vue.component('ventas', require('./components/secciones_panel/Ventas.vue').default);
Vue.component('reporte-ventas', require('./components/secciones_panel/Reporte_ventas.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
