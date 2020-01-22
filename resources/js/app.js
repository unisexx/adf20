require('./bootstrap');

import io from 'socket.io-client';

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    data() {
        return {
            // เรียกใช้ socket.io-client ใช้งานผ่าน port 6999 ตรงกับ file server.js
            socket : io(':6999')
        }
    }
});