require('./bootstrap');

window.Vue = require('vue');

Vue.component('mensagem-component', require('./components/MensagensComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('minhas-mensagens-component', require('./components/MinhasMensagensComponent.vue').default);

const app = new Vue({
    el: '#app',
});
