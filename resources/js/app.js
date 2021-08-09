
require('./bootstrap');
window.Vue = require('vue').default;
import Form from 'vform'

// Sweet Alert
// import VueSweetalert2 from 'vue-sweetalert2';
// import 'sweetalert2/dist/sweetalert2.min.css';
// Vue.use(VueSweetalert2);


// component
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('product-component', require('./components/product/create.vue').default);


const app = new Vue({
    el: '#app',

});
