

require('./bootstrap');

window.Vue = require('vue').default;


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('users', require('./components/users.vue').default);
Vue.component('checkstart', require('./components/checkstart.vue').default);
Vue.component('results', require('./components/results.vue').default);


const app = new Vue({
    el: '#app',
});
