
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('v-multiplaescolha', require('./components/v-multiplaEscolha.vue'));

Vue.component('v-dissertativa', require('./components/v-dissertativa.vue'));

Vue.component('v-questoes', require('./components/v-questoes'));

const app = new Vue({
    el: '#app',



    data: {
        multiplaEscolha: false,
        dissertativa: false
    },

    methods: {
        getForm(e) {
            if(e.target.options.selectedIndex == 0) {
                this.multiplaEscolha = false
                this.dissertativa = false
            }
            if(e.target.options.selectedIndex == 1) {
                this.multiplaEscolha = false
                this.dissertativa = true
            }
            if(e.target.options.selectedIndex == 2){
                this.multiplaEscolha = true
                this.dissertativa = false
            }
            if(e.target.options.selectedIndex == 3){
                this.multiplaEscolha = true
                this.dissertativa = false
            }
            if(e.target.options.selectedIndex == 4){
                this.multiplaEscolha = true
                this.dissertativa = false
            }
        }


    },


});
