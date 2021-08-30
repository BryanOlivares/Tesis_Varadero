require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSweetalert2 from "vue-sweetalert2"
Vue.use(VueSweetalert2)
import "sweetalert2/dist/sweetalert2.min.css"


import App from './components/App.vue'
import Crear from './components/CompleteReservation.vue'
import Service from './components/Service.vue'
import ServiceReservation from './components/ServiceReservation.vue'
import View from './components/ViewReservation.vue'
import View1 from './components/ViewR1.vue'

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode: 'history',
    routes:[
        { path: '/services',
          name: 'services',
          component: Service,
        },

        { path: '/reservations',
          name: 'reservations',
          component: ServiceReservation,
        },
        { path: '/createreservations',
          name: 'createreservations',
          component: Crear
        },

        { path: '/reservations1',
          name: 'reservations1',
          component: View1
        },
        { path: '/home',
          name: 'home',
          component: View,
        },
    ]
})
const app = new Vue({
    el: '#app',
    components:{App},
    router
});
