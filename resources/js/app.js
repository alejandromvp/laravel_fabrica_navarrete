/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import PrimeVue from 'primevue/config';

import Button from 'primevue/button';
import Card from 'primevue/card';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';     //optional for column grouping
import Fieldset from 'primevue/fieldset';
import InputNumber from 'primevue/inputnumber';
import Dropdown from 'primevue/dropdown';
import Tooltip from 'primevue/tooltip';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';


import 'primevue/resources/themes/saga-blue/theme.css';      //theme
import 'primevue/resources/primevue.min.css';              //core css
import 'primeicons/primeicons.css';                           //icons

Vue.use(PrimeVue);

Vue.component('table-pensamientos', require('./components/Table_pensamientos.vue').default);
Vue.component('container', require('./components/Sistema_Main.vue').default);
Vue.component('pensamiento-component', require('./components/PensamientoComponent.vue').default);
Vue.component('form-pensamiento', require('./components/Form_pensamiento.vue').default);
Vue.component('panel-left-main', require('./components/Panel_sistema.vue').default);

//################### secciones Panel Menu ###################################################
Vue.component('bienvenida-vue', require('./components/secciones_panel/Bienvenida.vue').default);
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

Vue.component('Button', Button);
Vue.component('Card', Card);
Vue.component('DataTable', DataTable);
Vue.component('Column', Column);
Vue.component('ColumnGroup', ColumnGroup);
Vue.component('Fieldset', Fieldset);
Vue.component('InputNumber', InputNumber);
Vue.component('Dropdown', Dropdown);
Vue.component('Dialog', Dialog);
Vue.component('InputText', InputText);



Vue.directive('tooltip', Tooltip);

const app = new Vue({
    primevue: PrimeVue,
    el: '#app',
});
