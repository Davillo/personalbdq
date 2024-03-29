
require('./bootstrap');

window.Vue = require('vue');


Vue.component('v-multiplaescolha', require('./components/v-multiplaEscolha.vue'));

Vue.component('v-questoes', require('./components/v-questoes.vue'));

Vue.component('v-questoesavaliacao', require('./components/v-questoesAvaliacao.vue'));

const app = new Vue({
    el: '#app',
    data: {
        multiplaEscolha: false,
        dissertativa: false,
        errors: {}, 
        btnDisabled: true,       
        //Nova Questão
        tipoQuestao: '',
        categoriaQuestao: '',
        dificuldadeQuestao: '',
        palavras_chaveQuestao: null,
        resposta: '',
        quantidadeLinhas: '',
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
        cursoUsuario: '',
        //Nova Avaliação
        tituloAvaliacao: null,
        //Adicionar Sugestão
        sugestaoQuestao: null,
        //Clonar Questao
        nomeListaQuestao: ''
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
            if((this.tipoQuestao && this.categoriaQuestao 
                && this.dificuldadeQuestao && this.palavras_chaveQuestao 
                && CKEDITOR.instances.enunciado.getData() && !this.resposta && !this.quantidadeLinhas) || (this.tipoQuestao && this.categoriaQuestao 
                && this.dificuldadeQuestao && this.palavras_chaveQuestao 
                && CKEDITOR.instances.enunciado.getData() && this.resposta && this.quantidadeLinhas)){
                return true
            }

            this.errors = {}

            if(!this.tipoQuestao){
                this.errors.tipoQuestao = 'Este campo é obrigatório'
            }
            if(!this.categoriaQuestao){
                this.errors.categoriaQuestao = 'Este campo é obrigatório'
            }
            if(!this.dificuldadeQuestao){
                this.errors.dificuldadeQuestao = 'Este campo é obrigatório'
            }
            if(!this.palavras_chaveQuestao){
                this.errors.palavras_chaveQuestao = 'Este campo é obrigatório'
            }           
            if(!CKEDITOR.instances.enunciado.getData()){
                this.errors.enunciadoQuestao = 'Este campo é obrigatório'
            }
            if(!this.resposta){
                this.errors.respostaQuestao = 'Este campo é obrigatório'
            } 
            if(!this.quantidadeLinhas){
                this.errors.quantidadeLinhasQuestao = 'Este campo é obrigatório'
            } 

            this.errors.botao = 'Preencha os campos obrigatórios'

            e.preventDefault()
        },
        getCheckLista(e){
            if(this.nomeLista && this.descricaoLista){
                return true
            }

            this.errors = {}

            if(!this.nomeLista){
                this.errors.nomeLista = 'Este campo é obrigatório'
            }            
            if(!this.descricaoLista){
                this.errors.descricaoLista = 'Este campo é obrigatório'
            }

            this.errors.botao = 'Preencha os campos obrigatórios'

            e.preventDefault()
        },
        getCheckCompartilhar(e){
            this.errors = {}

            if(this.emailCompartilhar){
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                if(!re.test(this.emailCompartilhar)){                                                              
                    this.errors.emailCompartilhar = 'Utilize um email válido'                     
                    e.preventDefault()                                    
                    return false
                }     
               
                axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                axios.get('/usuario/verificarEmail/'+this.emailCompartilhar)
                    .then(response => {                        
                        if(!response.data){  
                            this.errors.emailCompartilhar = 'Email inexistente' 
                            this.$forceUpdate()                                                                           
                            e.preventDefault()
                            return false
                        }
                        if(response.data){   
                            document.forms["form_compartilhar"].submit()                                                     
                            return true                                                    
                        }
                    })
                    .catch(error => console.log(error))
                
                
                                
            }

            if(!this.emailCompartilhar){
                this.errors.emailCompartilhar = 'Este campo é obrigatório'
                this.errors.botao = 'Preencha os campos obrigatórios'
            }

            

            e.preventDefault()
        },
        getCheckCurso(e){
            if(this.nomeCurso && this.tipoCurso){
                return true
            }

            this.errors = {}

            if(!this.nomeCurso){
                this.errors.nomeCurso = 'Este campo é obrigatório'
            }
            if(!this.tipoCurso){
                this.errors.tipoCurso = 'Este campo é obrigatório'
            }

            this.errors.botao = 'Preencha os campos obrigatórios'

            e.preventDefault()
        },
        getCheckUsuario(e){
           
            if(this.matriculaUsuario && this.nomeUsuario && this.emailUsuario && this.senhaUsuario && this.cursoUsuario){
                return true
            }
            
            this.errors = {}

            if(!this.matriculaUsuario){
                this.errors.matriculaUsuario = 'Este campo é obrigatório'
            }
            if(!this.nomeUsuario){
                this.errors.nomeUsuario = 'Este campo é obrigatório'
            }
            if(!this.emailUsuario){
                this.errors.emailUsuario = 'Este campo é obrigatório'
            }
            if(!this.senhaUsuario){
                this.errors.senhaUsuario = 'Este campo é obrigatório'
            }
            if(!this.cursoUsuario){
                this.errors.cursoUsuario = 'Este campo é obrigatório'
            }

            this.errors.botao = 'Preencha os campos obrigatórios'

            e.preventDefault()
        },
        getCheckAvaliacao(e){
            if(this.tituloAvaliacao){
                return true
            }            

            this.errors = {}

            if(!this.tituloAvaliacao){
                this.errors.tituloAvaliacao = 'Este campo é obrigatório'
            } 
    
            this.errors.botao = 'Preencha os campos obrigatórios'

            e.preventDefault()
        },
        getCheckSugestao(e){
            if(this.sugestaoQuestao){
                return true
            }

            this.errors = {}

            if(!this.sugestaoQuestao){
                this.errors.sugestaoQuestao = 'Este campo é obrigatório'
            }

            e.preventDefault()
        },
        getCheckClonarQuestao(e){
            if(this.nomeListaQuestao){
                return true
            }

            this.errors = {}

            if(!this.nomeListaQuestao){
                this.errors.clonarQuestao = 'Este campo é obrigatório'
            }            

            e.preventDefault()
        },
        verificarEmail(){            
            this.errors.emailUsuario = ''
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            if(re.test(this.emailUsuario)){              
            
            axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                axios.get('/usuario/verificarEmail/'+this.emailUsuario)
                .then(response => {
                    if(response.data){
                        this.errors.emailUsuario = 'Email já existente' 
                        this.$forceUpdate()                       
                    }
                    if(!response.data){
                        this.errors.emailUsuario = false;  
                        this.btnDisabled = !this.btnDisabled;
                        this.$forceUpdate()                     
                    }
                })
                .catch(error => console.log(error))
            }else{
                this.errors.emailUsuario = 'Utilize um email válido'
                this.$forceUpdate()                
            }
            
        }
    },
    


});
