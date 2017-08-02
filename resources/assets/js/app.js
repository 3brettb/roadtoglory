
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//     el: '#app',
//     data: {
//         testvue: 'TestingVue'
//     }
// });

import {ServerTable, ClientTable, Event} from 'vue-tables-2';
Vue.use(ClientTable, {
    filterByColumn: true,
    compileTemplates: true,
}, false, null); 
// var VueTables = require('vue-tables');
// Vue.use(VueTables.client, {
//     filterByColumn: true,
//     compileTemplates: true,
// });

require('./addins');

var methods = {
    
    axiosOnResponse: function(data){
        if(data.hasError){
            alert(data.message);
        }
        else if(data.hasRedirect){
            confirm(data.message)
            window.location = data.redirect; 
        }
    }
}