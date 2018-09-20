
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

Vue.component('v-questoes', require('./components/v-questoes'));

const app = new Vue({
    el: '#app',
    data: {
        multiplaEscolha: false,
        dissertativa: false,
        errors: [],
        //Nova Questão
        tipo: '',
        categoria: '',
        dificuldade: '',
        palavras_chave: null,
        //Nova Lista
        nomeLista: null,
        descricaoLista: null,
        //Compartilhar Lista
        emailCompartilhar: null,
        //Novo Curso
        nomeCurso: null,
        tipoCurso: '',
        //Novo Usuario
        matriculaUsuario: null,
        nomeUsuario: null,
        emailUsuario: null,
        senhaUsuario: null,
        cursoUsuario: ''


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
        },
        getCheck(e){
            if(this.tipo && this.categoria && this.dificuldade && this.palavras_chave && CKEDITOR.instances.enunciado.getData()){
                return true
            }

            this.errors = []

            if(!this.tipo){
                this.errors.push('Selecione o tipo de questão')
            }

            if(!this.categoria){
                this.errors.push('Selecione a categoria da questão')
            }

            if(!this.dificuldade){
                this.errors.push('Selecione a dificuldade da questão')
            }

            if(!this.palavras_chave){
                this.errors.push('Campo palavras chave é obrigatório')
            }
            
            if(!CKEDITOR.instances.enunciado.getData()){
                this.errors.push('Campo enunciado é obrigatório')
            }
            e.preventDefault()
        },
        getCheckLista(e){
            if(this.nomeLista && this.descricaoLista){
                return true
            }

            this.errors = []

            if(!this.nomeLista){
                this.errors.push('Campo nome é obrigatório')
            }
            
            if(!this.descricaoLista){
                this.errors.push('Campo descrição é obrigatório')
            }
            e.preventDefault()
        },
        getCheckCompartilhar(e){
            if(this.emailCompartilhar){
                return true
            }

            this.errors = []

            if(!this.emailCompartilhar){
                this.errors.push('Campo email é obrigatório')
            }
            e.preventDefault()
        },
        getCheckCurso(e){
            if(this.nomeCurso && this.tipoCurso){
                return true
            }

            this.errors = []

            if(!this.nomeCurso){
                this.errors.push('Campo nome curso é obrigatório')
            }
            if(!this.tipoCurso){
                this.errors.push('Selecione o tipo do curso')
            }
            e.preventDefault()
        },
        getCheckUsuario(e){
            if(this.matriculaUsuario && this.nomeUsuario && this.emailUsuario && this.senhaUsuario && this.cursoUsuario){
                return true
            }

            this.errors = []

            if(!this.matriculaUsuario){
                this.errors.push('Campo matricula é obrigatório')
            }
            if(!this.nomeUsuario){
                this.errors.push('Campo nome é obrigatório')
            }
            if(!this.emailUsuario){
                this.errors.push('Campo email curso é obrigatório')
            }
            if(!this.senhaUsuario){
                this.errors.push('Campo senha curso é obrigatório')
            }
            if(!this.cursoUsuario){
                this.errors.push('Selecione o curso')
            }
            e.preventDefault()
        },
    },


});
